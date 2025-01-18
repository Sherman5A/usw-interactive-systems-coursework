<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../controllers/donation_controller.php";

  use controllers\donation_controller;
  use data\database;
  use model\donation;

  /** @var donation $donator_details */
  $donator_details = $_SESSION["supporter_details"];

  /** @var donation $updated_details */
  $updated_name = $_POST["donator-name"];
  $updated_email = $_POST["donator-email"];
  $updated_comm = $_POST["comm-preference"];

  $donation_controller = new donation_controller($db);
  $result = $donation_controller->update_donation(
    $donator_details->donationId,
    $updated_name,
    $updated_email,
    $updated_comm
  );

  $title = "Preloved Pets - Supporters Home";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <?php
        if (is_null($_SESSION["supporter_details"])) {
          ?>
          <h1>Unauthorised. You are not a member</h1>

          <p>You can become a member by submitting a monthly donation
            <a href="<?php echo BASE_URL . "/donate" ?>">
              here
            </a>
          </p>
          <?php
        } else {
          ?>
          <?php
          if (!$result) {
            ?>
            <h1>Updating details failed</h1>
          <?php } else {
            ?>
            <h1>Updated details submitted</h1>
            <table>
              <caption>
                Updated details
              </caption>
              <thead>
                <tr>
                  <th scope="row">Details</th>
                  <th scope="row">Previous</th>
                  <th scope="row">New</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="col">Id</th>
                  <td>
                    <?php
                      echo htmlspecialchars($donator_details->donationId);
                    ?>
                  </td>
                  <td>
                    <?php
                      echo htmlspecialchars($donator_details->donationId);
                    ?>
                  </td>
                </tr>
                <tr>
                  <th scope="col">Name</th>
                  <td>
                    <?php
                      echo htmlspecialchars(ucfirst($donator_details->donationName));
                    ?>
                  </td>
                  <td>
                    <?php
                      echo htmlspecialchars(ucfirst($updated_name));
                    ?>
                  </td>
                </tr>
                <tr>
                  <th scope="col">Email</th>
                  <td>
                    <?php
                      echo htmlspecialchars($donator_details->donationEmail);
                    ?>
                  </td>
                  <td>
                    <?php
                      echo htmlspecialchars($updated_email);
                    ?>
                  </td>
                </tr>
                <tr>
                  <th scope="col">Communication preferences</th>
                  <td>
                    <?php
                      echo htmlspecialchars(ucfirst($donator_details->commPreference));
                    ?>
                  </td>
                  <td>
                    <?php
                      echo htmlspecialchars(ucfirst($updated_comm));
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          <?php }
        }
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
