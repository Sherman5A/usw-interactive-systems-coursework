<?php
  $title = "Preloved Pets - Supporters sign in";
  include __DIR__ . "/../private/head.php";
?>
<body xmlns="http://www.w3.org/1999/html">
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Supporters Club Login</h1>
      <p>
        Supporters club members are donors who selected the monthly donation
        option on the <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>">donate form</a>.
      </p>
      <form action="<?php echo BASE_URL . BASE_FILE . "/supporters/home" ?>" method="post" class="donation-form">
        <h2>Sign in details</h2>
        <label for="email">
          Email:
          <input type="email" id="email" name="email" required>
        </label>
        <button type="submit">Sign in to supporters club</button>
      </form>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
