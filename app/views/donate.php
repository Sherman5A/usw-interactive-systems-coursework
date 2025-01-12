<?php
  $title = "Preloved Pets - Donate";
  include __DIR__ . "/../private/head.php";
?>
<body xmlns="http://www.w3.org/1999/html">
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Donate</h1>
      <p>Preloved Pets is entirely self-funded by you, the community, and greatly
        appreciated. If you need any assistance with donating, please
        <a href="/contact-us">contact us</a>
      </p>
      <form action="/donation/confirm" method="post" class="donation-form">
        <h2>Donation form</h2>
        <fieldset>
          <legend>Details:</legend>
          <label for="donor-name">
            Name:<span class="form-required">*</span>
            <input type="text" id="donor-name" name="donator-name" required>
          </label>
          <label for="donor-email">
            Email:<span class="form-required">*</span>
            <input type="email" id="donor-email" name="donator-email" required>
          </label>
          <fieldset>
            <legend class="donation-type">Donation type:<span class="form-required">*</span></legend>
            <label for="donation-type-one-time">
              <input type="radio" id="donation-type-one-time" name="donation-type" value="one-time" required>
              One time
            </label>
            <label for="donation-type-monthly">
              <input type="radio" id="donation-type-monthly" name="donation-type" value="monthly" checked>
              Monthly - <span class="bold-text">Gain access to supporters club area!</span>
            </label>
            <label for="donation-type-will">
              <input type="radio" id="donation-type-will" name="donation-type" value="will">
              Will
            </label>
          </fieldset>
          <label for="donation-amount">
            Amount:<span class="form-required">*</span> (£)
            <input type="number" min="1" step="0.01" value="5" required id="donation-amount" name="donation-amount">
          </label>
          <label for="donator-message">
            Donation message:
            <textarea id="donator-message" name="donation-message" rows="4"></textarea>
          </label>
          <fieldset>
            <legend>Show donation on thank you banner above:<span class="form-required">*</span></legend>
            <label for="show-billboard-yes">
              <input type="radio" id="show-billboard-yes" name="show-billboard" value="1" required checked>
              Yes
            </label>
            <label for="show-billboard-no">
              <input type="radio" id="show-billboard-no" name="show-billboard" value="0">
              No
            </label>
          </fieldset>
          <fieldset>
            <legend>
              (Optional)
              Communication preferences:
            </legend>
            <label for="comm-newsletter">
              <input type="checkbox" id="comm-newsletter" name="comm-preference" value="newsletter">
              Newsletter
            </label>
            <label for="comm-email">
              <input type="checkbox" id="comm-email" name="comm-preference" value="email" checked>
              Email
            </label>
            <label for="comm-phone">
              <input type="checkbox" id="comm-phone" name="comm-preference" value="phone">
              Phone
            </label>
          </fieldset>
        </fieldset>
        <button type="submit">Submit donation</button>
      </form>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
