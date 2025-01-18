<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../controllers/donation_controller.php";

  use controllers\donation_controller;
  use data\database;
  use model\donation;

  $donation_controller = new donation_controller($db);

  if (isset($_POST["email"])) {
    $missing_vars = false;
    $email = $_POST["email"];
    $supporter_details = $donation_controller->is_supporters_member($email);
  } else {
    /** @var donation $donator_details */
    $supporter_details = $_SESSION["supporter_details"];
  }

  $title = "Preloved Pets - Supporters Home";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <?php
        if (is_null($supporter_details)) {
          ?>
          <h1>Unauthorised. You are not a member</h1>

          <p>You can become a member by submitting a monthly donation
            <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>">here</a>
          </p>
          <?php
        } else {
          ?>
          <h1>Supporters home</h1>
          <a class="anchor-button large-anchor-button" style="margin-bottom: 1rem"
             href="<?php echo BASE_URL . BASE_FILE . "/supporters/update" ?>">
            Update supporter details
          </a>
          <h2>Supporters news</h2>
          <div class="news-article">
            <div class="reverse-header-img">
              <h2>Large trust donation</h2>
              <div class="news-article-img">
                <img src="<?php echo BASE_URL . "/public/img/cheque-handover.jpg" ?>"
                     alt="Person handing cheque to another person">
              </div>
            </div>
            <p>We have received a £2,000 donation from a local charity trust to help continue housing more pets!</p>
            <p>
              Today, Preloved Pets has received a generous donation of £2000 from a local charity
              trust. This incredible support will help us continue our mission of providing a safe and loving home for
              cats
              and dogs whose owners have passed away.
            </p>
            <p>
              We extend our heartfelt thanks to the trust for their kindness and generosity. Their contribution will
              make
              a significant difference in the lives of the pets we care for, ensuring they receive the love and
              attention
              they deserve.
            </p>
            <p>
              Moreover, the money will contribute to our goal of supporting reptiles and fish, as detailed
              <a href="<?php echo BASE_URL . BASE_FILE ?>">here</a>. All pets, regardless of species, deserve a
              loving home, and with the continued support of our community, we hope to create these facilities soon.
            </p>
            <p>
              Thank you to everyone who supports Preloved Pets. Together, we can help these pets find a new forever
              home.
              If you would like to donate, please visit our <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>">donation
                page</a>. Volunteers are extremely appreciated and should contact us using one of the methods outlined
              <a href="<?php echo BASE_URL . BASE_FILE . "/contact-us" ?>">here</a> or with this email
              <a href="mailto:23056792@students.southwales.ac.uk?subject=Volunteer%20Request">23056792@students.southwales.ac.uk</a>.
            </p>
            <p>
          <span class="bold-text">
            Monthly donors can join the members club and receive a monthly exclusive newsletter!
          </span>
            </p>
            <p>
              Your support is invaluable,
              <br>
              Preloved Pets
            </p>
          </div>
          <div class="news-article">
            <div class="reverse-header-img">
              <h2>Update on reptile housing goal</h2>
              <div class="news-article-img">
                <img src="<?php echo BASE_URL . "/public/img/leopard-gecko.jpg" ?>"
                     alt="Picture of a pet Leopard Gecko in a enclosure">
              </div>
            </div>
            <p>Our reptile housing goal has progressed to 50% completion due to all of your support.</p>
            <p>
              We are happy to announce our goal to house reptiles has reached 50% completion. This allows us to expand
              our
              accepted animals from dogs and cats, to dogs, cats, and reptiles. We would like to issue a gigantic thank
              you
              our supporters and volunteers.
            </p>
            <p>
              If this goal success, we intend to start construction immediately, and aim to take reptiles as soon as
              possible.
            </p>
            <p>
              After the creation of the reptile enclosure, we intend to create an area to fish; this greatly expands our
              coverage of pets.
            </p>
            <p>
              To continue contributing to the goal, please donate
              <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>">here</a>.<span class="bold-text">
                Monthly donors can join the members club and receive a monthly exclusive newsletter!
              </span>
            </p>
          </div>
          <div class="news-article">
            <div class="reverse-header-img">
              <h2>New pet area</h2>
              <div class="news-article-img">
                <img src="<?php echo BASE_URL . "/public/img/pet-area.jpg" ?>" alt="Picture of pet play area">
              </div>
            </div>
            <p>
              Due to your donations, we have installed a new internal pet area. This allows our staff to entertain
              housed cats and dogs during bad, rainy conditions
            </p>
            <p>
              We are excited to announce the creation of a new indoor play area at Preloved Pets! This dedicated space
              will
              provide an area for cats and dogs without owners to play, regardless of the weather outside.
            </p>
            <p>
              The play area is open to everyone. People interested in adopting a pet are deeply encouraged to visit and
              play
              with their desired pet to see their personality, behaviour, and style. Also, people who just simply want
              to
              spend time playing with pets are welcome too; no obligations required!
            </p>
            <p>
              We are incredibly grateful to our generous donors who made this play area possible. Their contributions
              have
              helped us create a space where the pets can remain active even on rainy days. Thank you deeply for your
              continued support. If you would like to donate, please visit our
              <a href="<?php echo BASE_URL . BASE_FILE . "/donate" ?>">donation page</a>.
              Volunteers are extremely appreciated and should contact us using one of the methods outlined
              <a href="<?php echo BASE_URL . BASE_FILE . "/contact-us" ?>">here</a> or with this email
              <a href="mailto:23056792@students.southwales.ac.uk?subject=Volunteer%20Request">23056792@students.southwales.ac.uk</a>.
            </p>
            <p>
          <span class="bold-text">
            Monthly donors can join the members club and receive a monthly exclusive newsletter!
          </span>
            </p>
          </div>
          <?php
        }
      ?>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
