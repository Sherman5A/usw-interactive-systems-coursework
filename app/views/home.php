<?php
  // Setup database connection
  require __DIR__ . "/../config/config.php";
  $db = new \data\database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
