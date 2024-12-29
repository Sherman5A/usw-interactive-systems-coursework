<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../controllers/donation_controller.php";

  use controllers\donation_controller;
  use data\database;
  use model\donation;

  $donation_controller = new donation_controller($db);

  if (isset($_POST["email"])) {
    $missing_vars = false;
    $email = $_POST["email"];
    $supporter_details = $donation_controller->is_supporters_member($email);
  } else {
    /** @var donation $donator_details */
    $supporter_details = $_SESSION["supporter_details"];
  }

  $title = "Preloved Pets - Supporters Home";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <?php
        if (is_null($supporter_details)) {
          ?>
          <h1>Unauthorised. You are not a member</h1>

          <p>You can become a member by submitting a monthly donation <a href="/donate">here</a></p>
          <?php
        } else {
          ?>
          <h1>Supporters Home</h1>
          <a href="/supporters/update-submit">Update details</a>
          <?php
        }
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
