<?php
  //  $title = "Home";
  //echo '<p>test</p>';
  //  Take target URI
  //  echo $_GET('rt');
  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  //        echo $request;
  // Routing
  switch ($request) {
    case "":
    case "/":
      $view = __DIR__ . "/views/home.php";
      break;
    case "/donate":
      $view = __DIR__ . "/views/donate.php";
      break;
    case "/pets":
      $view = __DIR__ . "/views/pets.php";
      break;
    case "/contact-us":
      $view = __DIR__ . "/views/contact-us.php";
      break;
    default:
      http_response_code(404);
      $view = __DIR__ . "/views/404.php";
      break;
  }
  //  function setPageTitle($newTitle)
  //  {
  //    global $title;
  //    str_replace('<title></title>', '<title>' . $title . '</title>');
  //  }

  //  echo "<p>Title $title</p>";

?>
<html lang="en">
  <?php require $view; ?>
</html>
