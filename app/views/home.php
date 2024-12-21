<?php
  require_once __DIR__ . "/../data/database.php";

  // Setup database connection
  use data\database;

  require __DIR__ . "/../config/config.php";
  $db = new database(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS, DB_SOCK);
  // Title
  $title = "Home";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Home</h1>
      <?php
        $conn = $db->getConn();
        foreach ($conn->query("SELECT t.* FROM public.donation t LIMIT 501") as $row) {
          print $row["donator_name"];
        };
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
