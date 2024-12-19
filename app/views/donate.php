<?php
  $title = "Donate";
  include __DIR__ . "/../private/head.php";
?>
<body xmlns="http://www.w3.org/1999/html">
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Donate</h1>
      <form class="donation-form">
        <h2>Donation form</h2>
        <p>Details:</p>
        <fieldset>
          <label>
            Name
            <input type="text">
          </label>
          <label>
            Amount
            <input type="text">
          </label>
          <label>
            Message
            <input type="text">
          </label>
        </fieldset>
        <p>Communication preferences:</p>
        <fieldset>
          <label>
            <input type="checkbox">
            Newsletter
          </label>
          <label>
            <input type="checkbox">
            Email
          </label>
          <label>
            <input type="checkbox">
            Phone
          </label>
        </fieldset>
        <button type="submit">Submit donation</button>
      </form>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
