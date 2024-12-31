<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../data/donation_repo.php";

  use data\database;
  use data\donation_repo;

  $donation_repo = new donation_repo($db);
  $donations = $donation_repo->get_banner_donations();
?>
<header class="top-header">
  <div class="header-content-wrapper">
    <nav class="header-content">
      <ul class="nav-links header-links">
        <li class="header-logo">
          <a href="/">
            <img src="../public/img/logo-text.svg" alt="Preloved pets logo" width="225"/>
            <span class="hidden-text">Preloved Pets</span>
          </a>
        </li>
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="/donate">Donate</a>
        </li>
        <li>
          <a href="/pets">Pets</a>
        </li>
        <li>
          <a href="/news">News</a>
        </li>
        <li>
          <a href="/about-us">About us</a>
        </li>
        <li class="right-nav-links">
          <a href="/contact-us">Contact us</a>
        </li>
        <?php if (isset($_SESSION["supporter_details"])) {
          ?>
          <li>
            <a class="anchor-button" href="/supporters/home">Supporters home</a>
          </li>
          <?php
        }
        ?>
        <li>
          <?php
            if (is_null($_SESSION["supporter_details"])) {
              ?>
              <a class="anchor-button" href="/supporters/signin">Supporters sign in</a>
            <?php } else {
              ?>
              <a class="anchor-button" href="/supporters/signout">Sign out</a>
              <?php
            }
          ?>
        </li>
      </ul>
    </nav>
  </div>
  <div class="donation-alerts">
    <p class="scroll-text">
      <?php
        foreach ($donations as $donation) {
          if (strlen($donation->donationMessage) == 0) {
            $donationText = htmlspecialchars("{$donation->donationName} donated £{$donation->donationAmount}");
          } else {
            $donationText = htmlspecialchars("{$donation->donationName} donated £{$donation->donationAmount} saying '$donation->donationMessage'");
          }
          echo "<span class='scroll-text-donation'>$donationText</span>";
        }
      ?>
    </p>
  </div>
</header>
