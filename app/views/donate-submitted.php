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
  try {
    $result = $donation_controller->submit_donation();
    $title = "Donation successfully submitted";
  } catch (Exception $e) {
    $title = $e->getMessage();
    $missing_vars = true;
  }
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>
        <?php
          if ($result) {
            echo "Donation submitted";
          } else {
            echo "Error submitting donation";
          }
        ?>
      </h1>
      <p>
        <?php
          if ($result) {
          echo "Donation successfully submitted to Preloved Pets";
        } else if ($missing_vars) {
        ?>
      <p>Form data incomplete</p>
      <p>Resubmit form <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>"> here</a>
        <?php
          } else {
          echo "Error submitting to Preloved Pets";
        }
        ?>
      </p>
      <?php if (!$missing_vars) { ?>
        <table>
          <caption>
            Donation overview
          </caption>
          <thead>
            <tr>
              <th scope="row">Question</th>
              <th scope="row">Answer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">Name</th>
              <td>
                <?php
                  echo htmlspecialchars($_SESSION["donator-name"]);
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Email</th>
              <td>
                <?php
                  echo htmlspecialchars($_SESSION["donator-email"]);
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Type</th>
              <td>
                <?php
                  echo htmlspecialchars(ucfirst($_SESSION["donation-type"]));
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Amount (£)</th>
              <td>
                <?php
                  echo htmlspecialchars(ucfirst($_SESSION["donation-amount"]));
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Donation message</th>
              <td>
                <?php
                  echo htmlspecialchars(ucfirst($_SESSION["donation-message"]));
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Show donation on banner</th>
              <td>
                <?php
                  echo $_SESSION["show-billboard"] == "1" ? "Yes" : "No"
                ?>
              </td>
            </tr>
            <tr>
              <th scope="col">Communication preferences</th>
              <td>
                <?php
                  echo htmlspecialchars(ucfirst($_SESSION["comm-preference"]));
                ?>
              </td>
            </tr>
          </tbody>
        </table>
        <?php
      }
        // Clear session to prevent resubmitting
        session_unset();
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
