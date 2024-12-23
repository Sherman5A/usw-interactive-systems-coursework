<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../data/donation_repo.php";

  use data\database;
  use data\donation_repo;
  use model\donation;

  $missing_vars = false;
  if (!isset($_SESSION["donation-type"], $_SESSION["donator-name"], $_SESSION["donator-email"],
    $_SESSION["donation-amount"], $_SESSION["donation-message"], $_SESSION["comm-preference"]
  )) {
    $missing_vars = true;
    $title = "Form data incomplete";
  } else {
    $donation_repo = new donation_repo($db);
    $new_donation = new donation(
      null,
      $_SESSION["donation-type"],
      $_SESSION["donator-name"],
      $_SESSION["donator-email"],
      floatval(["donation-amount"]),
      $_SESSION["donation-message"],
      $_SESSION["comm-preference"]
    );
    $db_result = $donation_repo->add_donation($new_donation);
    $title = $db_result ? "Donation submitted" : "Error submitting donation";
    session_unset();
  }
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>
        <?php
          if ($db_result) {
            echo "Donation submitted";
          } else {
            echo "Error submitting donation";
          }
        ?>
      </h1>
      <p>
        <?php
          if ($db_result) {
            echo "Donation successfully submitted to company name";
          } else if ($missing_vars) {
            echo "Form data incomplete";
          } else {
            echo "Error submitting to company name";
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
                  echo htmlspecialchars(ucfirst($_SESSION["donator-amount"]));
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
              <th scope="col">Communication preferences</th>
              <td>
                <?php
                  echo htmlspecialchars(ucfirst($_SESSION["comm-preference"]));
                ?>
              </td>
            </tr>
          </tbody>
        </table>
      <?php } ?>
    </main>
  </div>
</body>
