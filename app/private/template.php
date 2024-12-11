<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>
      <?php
        if (isset($title)) {
          echo $title;
        }
      ?>
    </title>
    <link href="../public/main.css" rel="stylesheet"/>
    <link href="../public/reset.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav>
        <ul class="nav-bar">
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="../pets.php">Pets</a>
          </li>
          <li>
            <a href="../donate.php">Donate</a>
          </li>
          <li>
            <a href="../contact-us.php">Contact us</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <?php
        if (empty($template)) {
          echo "<p>Template not set</p>";
          return;
        }
        //        if (!file_exists($template)) {
        //          echo "<p>File does not exist";
        //          return;
        //        }

        echo($template);
      ?>
    </main>
    <aside>
      <p>footer</p>
    </aside>
  </body>
</html>