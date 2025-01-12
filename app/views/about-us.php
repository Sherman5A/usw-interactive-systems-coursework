<?php
  $title = "Preloved Pets - About us";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main class="about-us">
      <div class="reverse-header-img">
        <h1>About us</h1>
        <div class="top-banner-img">
          <img src="/public/img/cat-licking-paw.jpg" alt="White and brown cat licking it's paw">
        </div>
      </div>
      <div>
        <video controls autoplay style="margin: 10px 0">
          <source src="/public/video/preloved-pets-sample.mp4">
        </video>
        <p>
          We are a local charity that finds new loving, families for pets after their owners have died.
        </p>
        <p>
          We are based in a small centre where the pets get a new forever home. We currently accept dogs and
          cats. But with your help, we want to include rodents, reptiles and fish. Unfortunately, we are lacking
          facilities for these animals. However, donations to support this goal are greatly appreciated.
        </p>
      </div>
      <h2>Who we are</h2>
      <div>
        <div class="center-img">
          <figure>
            <img src="/public/img/our-founder.jpg" alt="Preloved pets founder">
            <figcaption>John Doe, fouder of Preloved Pets</figcaption>
          </figure>
        </div>
        <h3>Our founder</h3>
        <p>
          The centre was founded by John Doe in 2009. Their career began as a nurse in the NHS. However, after
          seeing the affect an owners death had on pet's living conditions, they started Preloved Pets.
        </p>
      </div>
      <div>
        <div class="center-img">
          <figure>
            <img src="/public/img/our-staff.jpg" alt="3 of our staff with a dog">
            <figcaption>Staff with John Doe the dog</figcaption>
          </figure>
        </div>
        <h3>Our staff</h3>
        <p>
          The centre is run by unpaid volunteers, including local vets, students, and community members.
        </p>
        <p>
          If you want to volunteer please email at <a href="mailto:23056792@students.southwales.ac.uk">23056792@students.southwales.ac.uk</a>.
        </p>
      </div>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
