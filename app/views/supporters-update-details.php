<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../controllers/donation_controller.php";

  use data\database;
  use model\donation;

  /** @var donation $donator_details */
  $donator_details = $_SESSION["supporter_details"];
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
            <a href="<?php echo BASE_URL . "/donate" ?>">here</a>
          </p>
          <?php
        } else {
          ?>
          <h1>Update supporters club details</h1>
          <form action="<?php echo BASE_URL . "/supporters/update-submit" ?>"
                method="post"
                class="donation-form">
            <h2>Donor details</h2>
            <fieldset>
              <label for="donor-name">
                Name:
                <input type="text" id="donor-name" name="donator-name"
                       value="<?php echo htmlspecialchars($donator_details->donationName) ?>"
                >
              </label>
              <label for="donor-email">
                Email:
                <input type="email" id="donor-email" name="donator-email"
                       value="<?php echo htmlspecialchars($donator_details->donationEmail) ?>">
              </label>
              <fieldset>
                <legend>
                  (Optional)
                  Communication preferences:
                </legend>
                <label for="comm-newsletter">
                  <input type="checkbox" id="comm-newsletter" name="comm-preference" value="newsletter"
                    <?php if ($donator_details->commPreference == "newsletter") {
                      echo "checked";
                    }
                    ?>
                  >
                  Newsletter
                </label>
                <label for="comm-email">
                  <input type="checkbox" id="comm-email" name="comm-preference" value="email"
                    <?php if ($donator_details->commPreference == "email") {
                      echo "checked";
                    }
                    ?>
                  >
                  Email
                </label>
                <label for="comm-phone">
                  <input type="checkbox" id="comm-phone" name="comm-preference" value="phone"
                    <?php if ($donator_details->commPreference == "phone") {
                      echo "checked";
                    }
                    ?>
                  >
                  Phone
                </label>
              </fieldset>
            </fieldset>
            <button type="submit">Update details</button>
          </form>
          <?php
        }
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
