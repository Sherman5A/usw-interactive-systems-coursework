<?php
  /**
   * Included from index.php
   * @var database $db
   */

  use data\database;

  $title = "Preloved Pets - Home";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <div class="sideways-banner">
        <div class="sideways-banner-text">
          <h1 class="main-title">Donate to give pets without owners a new family</h1>
          <p class="main-title-subtitle">
            Monthly donors get an exclusive newsletter and club area!
          </p>
          <a href="<?php echo BASE_URL . "/donate" ?>" class="anchor-button large-anchor-button">
            Donate today
          </a>
        </div>
        <div class="sideways-banner-img">
          <img src="<?php echo BASE_URL . "/public/img/man-with-dog.jpg" ?>"
               alt="Man playing with a brown dog">
        </div>
      </div>
      <div class="imageless-banner">
        <h2 class="secondary-title">Join the supporters club and visit our special Christmas party!</h2>
        <p class="main-title-subtitle">
          Supporters club members pay a monthly fee to receive a quarterly magazine and invitations to
          many special events.
        </p>
        <a href="<?php echo BASE_URL . "/donate" ?>" class="anchor-button large-anchor-button">
          Join the supporters club</a>
      </div>
      <div class="sideways-banner sideways-banner-reverse">
        <div class="sideways-banner-text">
          <h2 class="secondary-title">
            We are a local charity that finds new, loving families for pets after their owners have died.
          </h2>
          <p class="main-title-subtitle">We currently accept cats, dogs, and rodents.</p>
          <a href="<?php echo BASE_URL . "/about-us" ?>" class="anchor-button large-anchor-button grey-anchor">
            About us
          </a>
        </div>
        <div class="sideways-banner-img">
          <img src="<?php echo BASE_URL . "/public/img/held-cat.jpg" ?>"
               alt="Member of staff holding an upside down cat">
        </div>
      </div>
      <div class="sideways-banner">
        <div class="sideways-banner-text">
          <h2 class="secondary-title">Help us keep reptiles and fish</h2>
          <p class="main-title-subtitle">
            With <span class="bold-text">your</span> help, we want to expand to housing rodents, reptiles and fish in
            need.
          </p>
          <a href="<?php echo BASE_URL . "/donate" ?>" class="anchor-button large-anchor-button">
            Donate to our goal
          </a>
        </div>
        <div class="sideways-banner-img">
          <img src="<?php echo BASE_URL . "/public/img/fish.jpg" ?>" alt="Goldfish in aquarium">
        </div>
      </div>
      <div>
        <h2 class="secondary-title">Latest News</h2>
        <div class="adjacent-articles">
          <a href="<?php echo BASE_URL . "/news" ?>" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>Large trust donation</h3>
              <img src="<?php echo BASE_URL . "/public/img/cheque-handover.jpg" ?>"
                   alt="Person handing cheque to another person">
            </div>
            <p>We have received a £2,000 donation from a local charity trust to help continue housing more pets.</p>
          </a>
          <a href="<?php echo BASE_URL . "/news" ?>" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>Update on reptile housing goal</h3>
              <img src="<?php echo BASE_URL . "/public/img/leopard-gecko.jpg" ?>"
                   alt="Picture of a pet Leopard Gecko in a enclosure">
            </div>
            <p>Our reptile housing goal has progressed to 50% completion due to all of your support.</p>
          </a>
          <a href="<?php echo BASE_URL . "/news" ?>" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>New pet area</h3>
              <img src="<?php echo BASE_URL . "/public/img/pet-area.jpg" ?>" alt="Picture of pet play area">
            </div>
            <p>
              Due to your donations, we have installed a new internal pet area. This allows our staff to entertain
              housed cats and dogs during bad, rainy conditions
            </p>
          </a>
        </div>
      </div>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
