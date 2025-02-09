<?php
  declare(strict_types=1);

  namespace data;

  use model\donation;

  require_once __DIR__ . "/database.php";
  require_once __DIR__ . "/../models/donation.php";

  class donation_repo
  {
    public database $database;

    public function __construct(database $database)
    {
      $this->database = $database;
    }

    /**
     * @return array<donation>
     */
    public function get_banner_donations(): array
    {
      $donation_types = $this->get_donation_types();
      $conn = $this->database->getConn();
      $result = $conn->query("
        SELECT donation_id, 
               donation_type_id, 
               donator_name, 
               donation_email, 
               donation_amount, 
               donation_message,
               comm_preference,
               show_billboard
        FROM public.donation
        WHERE show_billboard = 1    
        LIMIT 20"
      );
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      /** @var array<donation> $donations */
      $donations = array();
      foreach ($rows as $row) {
        $new_donation = new donation(
          intval($row["donation_id"]),
          $donation_types[intval($row["donation_type_id"])],
          $row["donator_name"],
          $row["donation_email"],
          floatval($row["donation_amount"]),
          $row["donation_message"],
          $row["comm_preference"],
          boolval($row["show_billboard"])
        );
        $donations[] = $new_donation;
      }
      return $donations;
    }

    /**
     * @return array<int,string>
     */
    public function get_donation_types(): array
    {
      $conn = $this->database->getConn();
      $result = $conn->query("
        SELECT donation_type_id, donation_type
        FROM public.donation_type"
      );
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      /** @var array<int, string> $donation_types */
      $donation_types = array();
      foreach ($rows as $row) {
        $donation_types[$row["donation_type_id"]] = $row["donation_type"];
      }
      return $donation_types;
    }

    public function add_donation(donation $donation): bool
    {
      $conn = $this->database->getConn();
      switch ($donation->donationType) {
        case "monthly":
          $donation_type_id = 1;
          break;
        case "will":
          $donation_type_id = 3;
          break;
        case "one-time":
        default:
          $donation_type_id = 2;
          break;
      }

      $sql = $conn->prepare("
        INSERT INTO public.donation
            (donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard)
        VALUES (?, ?, ?, ?, ?, ?, ?);"
      );
      // Convert to int before passing to database
      $show_billboard_int = intval($donation->showBillboard);
      $sql->bind_param("issdssi",
        $donation_type_id,
        $donation->donationName,
        $donation->donationEmail,
        $donation->donationAmount,
        $donation->donationMessage,
        $donation->commPreference,
        $show_billboard_int
      );

      return $sql->execute();
    }

    /**
     * @param string $email
     * @return donation|null
     */
    public function in_supporters_club(string $email): ?donation
    {
      $conn = $this->database->getConn();
      $sql = $conn->prepare("
        SELECT donation_id, 
               donation_type_id, 
               donator_name,
               donation_email, 
               donation_amount, 
               donation_message,
               comm_preference,
               show_billboard
        FROM public.donation WHERE donation_email = ?"
      );
      $sql->bind_param("s", $email);
      $sql->execute();

      $result = $sql->get_result();
      $rows = $result->fetch_all(MYSQLI_ASSOC);

      if (count($rows) < 1) {
        return null;
      }

      $row = $rows[0];
      return new donation(
        intval($row["donation_id"]),
        $row["donation_type_id"] == 1 ? "monthly" : "one_off",
        $row["donator_name"],
        $row["donation_email"],
        floatval($row["donation_amount"]),
        $row["donation_message"],
        $row["comm_preference"],
        boolval($row["show_billboard"])
      );
    }

    public function update_donation(int $donation_id, string $donation_name, string $donation_email, string $comm_preference): bool
    {
      $conn = $this->database->getConn();
      $sql = $conn->prepare("
        UPDATE public.donation SET 
          donator_name = ?,
          donation_email = ?,
          comm_preference = ?
        WHERE donation_id = ?"
      );
      $sql->bind_param("sssi", $donation_name, $donation_email, $comm_preference, $donation_id);
      return $sql->execute();
    }
  }