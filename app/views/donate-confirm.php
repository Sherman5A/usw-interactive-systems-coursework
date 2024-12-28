<?php
  $title = "Preloved Pets - Confirm Donation";
  include __DIR__ . "/../private/head.php";
  //  Put post into session to submit on form submit
  if (isset($_POST)) {
    $_SESSION = array_merge($_SESSION, $_POST);
  }
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Confirm donation</h1>
      <table>
        <caption>
          Overview
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
                echo htmlspecialchars($_POST["donator-name"]);
              ?>
            </td>
          </tr>
          <tr>
            <th scope="col">Email</th>
            <td>
              <?php
                echo htmlspecialchars($_POST["donator-email"]);
              ?>
            </td>
          </tr>
          <tr>
            <th scope="col">Type</th>
            <td>
              <?php
                echo htmlspecialchars(ucfirst($_POST["donation-type"]));
              ?>
            </td>
          </tr>
          <tr>
            <th scope="col">Amount (£)</th>
            <td>
              <?php
                echo htmlspecialchars(ucfirst($_POST["donation-amount"]));
              ?>
            </td>
          </tr>
          <tr>
            <th scope="col">Donation message</th>
            <td>
              <?php
                echo htmlspecialchars(ucfirst($_POST["donation-message"]));
              ?>
            </td>
          </tr>
          <tr>
            <th scope="col">Communication preferences</th>
            <td>
              <?php
                echo htmlspecialchars(ucfirst($_POST["comm-preference"]));
              ?>
            </td>
          </tr>
        </tbody>
      </table>
      <?php
        foreach ($_POST as $key => $value) {
          echo "$key = $value";
          echo "<br>";
        }
      ?>
      <form class="hidden-form" action="./submitted" method="post">
        <button type="submit">Submit donation</button>
      </form>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
