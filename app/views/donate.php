<?php
  $title = "Donate";
  include __DIR__ . "/../private/head.php";
?>
<body xmlns="http://www.w3.org/1999/html">
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Donate</h1>
      <form action="./donation/confirm" method="post" class="donation-form">
        <h2>Donation form</h2>
        <fieldset>
          <legend>Details:</legend>
          <label for="donator-name">
            Name:
            <input type="text" id="donator-name" name="donator-name">
          </label>
          <label for="donator-email">
            Email:
            <input type="email" id="donator-email" name="donator-email">
          </label>
          <label for="donator-amount">
            Amount: (£)
            <input type="number" min="1" step="0.01" value="5" required id="donator-amount" name="donator-amount">
          </label>
          <label for="donator-message">
            Donation message:
            <textarea id="donator-message"></textarea>
          </label>
        </fieldset>
        <fieldset>
          <legend>
            (Optional)
            Communication preferences:
          </legend>
          <label for="comm-newsletter">
            <input type="checkbox" id="comm-newsletter" name="comm-preference">
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
