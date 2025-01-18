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
          <a href="<?php echo BASE_URL . "/" ?>">
            <img src="<?php echo BASE_URL . "/public/img/logo-text.svg" ?>" alt="Preloved pets logo" width="225"/>
            <span class="hidden-text">Preloved Pets</span>
          </a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . "/" ?>">Home</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . "/donate" ?>">Donate</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . "/pets" ?>">Pets</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . "/news" ?>"> News</a>
        </li>
        <li>
          <a href="<?php echo BASE_URL . "/about-us" ?>">About us</a>
        </li>
        <li class="right-nav-links">
          <a href="<?php echo BASE_URL . "/contact-us" ?>">Contact us</a>
        </li>
        <?php if (isset($_SESSION["supporter_details"])) {
          ?>
          <li>
            <a class="anchor-button" href="<?php echo BASE_URL . "/supporters/home" ?>">
              Supporters home
            </a>
          </li>
          <?php
        }
        ?>
        <li>
          <?php
            if (is_null($_SESSION["supporter_details"])) {
              ?>
              <a class="anchor-button" href="<?php echo BASE_URL . "/supporters/signin" ?>">
                Supporters sign in
              </a>
            <?php } else {
              ?>
              <a class="anchor-button" href="<?php echo BASE_URL . "/supporters/signout" ?>">
                Sign out
              </a>
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
