<?php
  /**
   * Included from index.php
   * @var database $db
   */
  require_once __DIR__ . "/../data/pet_repo.php";

  use data\database;
  use data\pet_repo;

  $pet_repo = new pet_repo($db);
  $pets = $pet_repo->get_pets();
  $title = "Preloved Pets - Pets";
  include __DIR__ . "/../private/head.php";
?>
<body>
  <?php include __DIR__ . "/../private/header.php"; ?>
  <div class="main-content">
    <main>
      <h1>Pets</h1>
      <p>These pets currently do not have a family due to their owners deaths.</p>
      <p>
        Visits to meet the pets can be scheduled by selecting the enquire button.
        Preloved Pets' location and contact details can be found
        <a href="<?php echo BASE_URL . BASE_FILE . "/contact-us#in-person" ?>">here</a>.
      </p>
      <ul class="list-pets">
        <?php
          foreach ($pets as $pet) {
            ?>
            <li>
              <div class="pet-title-image">
                <h2><?php echo htmlspecialchars(ucwords($pet->pet_name)) ?></h2>
                <img src="<?php echo BASE_URL . "/public/img/pets/" . $pet->image_path ?>"
                     alt="<?php echo "Picture of a {$pet->pet_type} called {$pet->pet_name}" ?>"
                >
              </div>
              <p><?php echo htmlspecialchars($pet->pet_description) ?></p>
              <table class="pet-details">
                <caption>Details:</caption>
                <tbody>
                  <tr>
                    <th scope="row">Type</th>
                    <td><?php echo htmlspecialchars(ucfirst($pet->pet_type)) ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Weight</th>
                    <td><?php echo htmlspecialchars($pet->pet_weight) ?> kg</td>
                  </tr>
                  <tr>
                    <th scope="row">Colour</th>
                    <td><?php echo htmlspecialchars(ucfirst($pet->pet_colour)) ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Previous owners</th>
                    <td><?php echo htmlspecialchars($pet->previous_owners) ?></td>
                  </tr>
                </tbody>
              </table>
              <a
                href="mailto:23056792@students.southwales.ac.uk?subject=Pet%20Enquiry%20<?php echo rawurlencode(ucfirst($pet->pet_name)) ?>"
                class="anchor-button large-anchor-button">
                Enquire about <?php echo htmlspecialchars(ucfirst($pet->pet_name)) ?>

              </a>
            </li>
            <?php
          }
        ?>
      </ul>
    </main>
  </div>
  <?php include __DIR__ . "/../private/footer.php"; ?>
</body>
