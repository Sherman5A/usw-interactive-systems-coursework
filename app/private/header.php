<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../data/donation_repo.php";

  use data\database;
  use data\donation_repo;

  $donation_repo = new donation_repo($db);
  $donations = $donation_repo->get_donations();
?>
<header class="top-header">
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="header-logo">
        <a href="/">
          <img src="../public/img/logo.svg" alt="Logo - image of cat" width="100"/>
        </a>
      </div>
      <nav>
        <ul class="nav-links header-links">
          <li>
            <a href="/">Home</a>
          </li>
          <li>
            <a href="./pets">Pets</a>
          </li>
          <li>
            <a href="./donate">Donate</a>
          </li>
          <li>
            <a href="./contact-us">Contact us</a>
          </li>
          <li>
            <a href="./about-us">About us</a>
          </li>
          <li>
            <a href="./news">News</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="donation-alerts">
    <p class="scroll-text">
      <?php
        foreach ($donations as $donation) {
          $donationText = htmlspecialchars("{$donation->donationName} donated £{$donation->donationAmount} saying '$donation->donationMessage'");
          echo "<span class='scroll-text-donation'> $donationText</span>";
        }
      ?>
    </p>

  </div>
</header>
