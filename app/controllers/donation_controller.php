<?php
  declare(strict_types=1);

  namespace controllers;

  require_once __DIR__ . "/../data/donation_repo.php";

  use data\database;
  use data\donation_repo;
  use Exception;
  use model\donation;

  class donation_controller
  {
    private donation_repo $donation_repo;

    /**
     * @param database $db
     */
    public function __construct(database $db)
    {
      $this->donation_repo = new donation_repo($db);
    }

    function submit_donation(): bool
    {
      // Check that form data is in session storage
      if (!isset(
        $_SESSION["donation-type"],
        $_SESSION["donator-name"],
        $_SESSION["donator-email"],
        $_SESSION["donation-amount"],
        $_SESSION["donation-message"],
        $_SESSION["comm-preference"]
      )) {
        throw new Exception("Form data incomplete");
      }
      $new_donation = new donation(
        null,
        $_SESSION["donation-type"],
        $_SESSION["donator-name"],
        $_SESSION["donator-email"],
        floatval(["donation-amount"]),
        $_SESSION["donation-message"],
        $_SESSION["comm-preference"]
      );
      return $this->donation_repo->add_donation($new_donation);
    }

    function is_supporters_member(string $email): ?donation
    {
      $in_supporters_club = $this->donation_repo->in_supporters_club($email);
      if (isset($in_supporters_club)) {
        $_SESSION["supporter_details"] = $in_supporters_club;
      }
      return $in_supporters_club;
    }

    function update_donation(int $donation_id, string $donation_name, string $donation_email, string $comm_preference): bool
    {
      return $this->donation_repo->update_donation($donation_id, $donation_name, $donation_email, $comm_preference);
    }
  }