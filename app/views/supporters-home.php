<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../controllers/donation_controller.php";

  use controllers\donation_controller;
  use data\database;

  $donation_controller = new donation_controller($db);
  $missing_vars = false;
  $supporter_details = $donation_controller->is_supporters_member($_POST["email"]);
  $title = "Preloved Pets - Supporters Home";
  include __DIR__ . "/../private/head.php";
  //  Put post into session to submit on form submit
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
          <?php
        }
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
