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
    public function get_donations(): array
    {
      $conn = $this->database->getConn();
      $result = $conn->query("
        SELECT donation_id, 
               donation_type_id, 
               donator_name, 
               donation_email, 
               donation_amount, 
               donation_message 
        from public.donation limit 20"
      );
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      /** @var array<donation> $donations */
      $donations = array();
      foreach ($rows as $row) {
        $new_donation = new donation(
          intval($row["donation_id"]),
          $row["donation_type_id"] == 1 ? "monthly" : "one_off",
          $row["donator_name"],
          $row["donation_email"],
          floatval($row["donation_amount"]),
          $row["donation_message"]
        );
        $donations[] = $new_donation;
      }
      return $donations;
    }

    public function add_donation(donation $donation): bool
    {
      $conn = $this->database->getConn();
      if ($donation->donationType == "monthly") {
        $donation_type_id = 1;
      } else {
        $donation_type_id = 2;
      }

      $sql = $conn->prepare("
        INSERT INTO public.donation
            (donation_type_id, donator_name, donation_email, donation_amount, donation_message)
        VALUES (?, ?, ?, ?, ?);"
      );
      $sql->bind_param("issds",
        $donation_type_id,
        $donation->donationName,
        $donation->donationEmail,
        $donation->donationAmount,
        $donation->donationMessage
      );

      return $sql->execute();
    }
  }