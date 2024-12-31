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
            Help us house pets until they find a new, loving family
          </p>
          <a href="/donate" class="anchor-button large-anchor-button">Donate today</a>
        </div>
        <div class="sideways-banner-img">
          <img src="/public/img/man-with-dog.jpg" alt="Man playing with a brown dog">
        </div>
      </div>
      <div class="sideways-banner sideways-banner-reverse">
        <div class="sideways-banner-text">
          <h2 class="secondary-title">
            We are a local charity that finds new, loving families for pets after their owners have died.
          </h2>
          <p class="main-title-subtitle">We currently accept cats, dogs, and rodents.</p>
          <a href="/about-us" class="anchor-button large-anchor-button grey-anchor">About us</a>
        </div>
        <div class="sideways-banner-img">
          <img src="/public/img/held-cat.jpg" alt="Member of staff holding an upside down cat">
        </div>
      </div>
      <div class="sideways-banner">
        <div class="sideways-banner-text">
          <h2 class="secondary-title">Help us keep reptiles and fish</h2>
          <a href="/donate" class="anchor-button large-anchor-button">Donate today</a>
        </div>
        <div class="sideways-banner-img">
          <img src="/public/img/fish.jpg" alt="Goldfish in aquarium">
        </div>
      </div>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
