<?php
  $title = "Donation - Confirm";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <h1>Confirm donation</h1>
    <?php
      foreach ($_POST as $value) {
        echo $value;
      }
    ?>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
