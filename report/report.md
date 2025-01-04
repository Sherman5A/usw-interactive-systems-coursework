---
title: "IS1S484 - Designing and Implementing Interactive Systems - Design Brief"
author: [Jake Real - 23056792]
date: "13/12/2024"
toc-own-page: true
titlepage: true
table-use-row-colors: true
bibliography: "references.bib"
csl: "university-of-south-wales-harvard.csl"
nocite: |
...

# Designing and Implementing Interactive Systems Design Brief

## Design Brief

### The Objectives

### The Target Audience

### Personality and Tone

![Preloved Pets Sitemap](images/preloved-pets-erd.svg)

### Persuasive Tactics

### Single Minded Message

## Supporting Material

### Website URL

[Website URL](localhost:8080)

### Code Listings

The entire site is PHP,

`index.php`,

```php
<?php

  use data\database;

  require_once __DIR__ . "/data/database.php";
  require_once __DIR__ . "/config/config.php";
  //  Require classes for session_start to avoid __PHP_Incomplete_Class
  require_once __DIR__ . "/models/pet.php";
  require_once __DIR__ . "/models/donation.php";

  session_start();
  $request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  $db = new database(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS, DB_SOCK);
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
    case "/about-us":
      $view = __DIR__ . "/views/about-us.php";
      break;
    case "/news":
      $view = __DIR__ . "/views/news.php";
      break;
    case "/donation/confirm":
      $view = __DIR__ . "/views/donate-confirm.php";
      break;
    case "/donation/submitted":
      $view = __DIR__ . "/views/donate-submitted.php";
      break;
    case "/supporters/signin":
      $view = __DIR__ . "/views/supporters-signin.php";
      break;
    case "/supporters/home":
      $view = __DIR__ . "/views/supporters-home.php";
      break;
    case "/supporters/update":
      $view = __DIR__ . "/views/supporters-update-details.php";
      break;
    case "/supporters/update-submit":
      $view = __DIR__ . "/views/supporters-update-details-submitted.php";
      break;
    case "/supporters/signout":
      // Unset authentication
      unset($_SESSION["supporter_details"]);
      header("location:/");
      // Redirect to home
      break;
    default:
      header("location:/404");
      http_response_code(404);
      $view = __DIR__ . "/views/404.php";
      break;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <?php require $view; ?>
</html>
```

`home.php`

```php
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
          <p class="main-title-subtitle">
            With <span class="bold-text">your</span> help, we want to expand to housing rodents, reptiles and fish in
            need.
          </p>
          <a href="/donate" class="anchor-button large-anchor-button">Donate to our goal</a>
        </div>
        <div class="sideways-banner-img">
          <img src="/public/img/fish.jpg" alt="Goldfish in aquarium">
        </div>
      </div>
      <div>
        <h2 class="secondary-title">Latest News</h2>
        <div class="adjacent-articles">
          <a href="/news" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>Large trust donation</h3>
              <img src="/public/img/cheque-handover.jpg" alt="Person handing cheque to another person">
            </div>
            <p>We have received a £2,000 donation from a local charity trust to help continue housing more pets.</p>
          </a>
          <a href="/news" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>Update on reptile housing goal</h3>
              <img src="/public/img/leopard-gecko.jpg" alt="Picture of a pet Leopard Gecko in a enclosure">
            </div>
            <p>Our reptile housing goal has progressed to 50% completion due to all of your support.</p>
          </a>
          <a href="/news" class="adjacent-article">
            <div class="adjacent-article-title">
              <h3>New pet area</h3>
              <img src="/public/img/pet-area.jpg" alt="Picture of pet play area">
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
```

### Images

Images used:

- Preloved Pets logo - [source](https://www.svgrepo.com/svg/172049/animal-shelter)
  - CC0
- Contact us
  - X icon - [source](https://simpleicons.org/icons/x.svg)
    - CCO
  - Instagram icon - [source](https://simpleicons.org/?q=instagram)
    - CC0
  - YouTube icon - [source](https://simpleicons.org/?q=Youtube)
    - CC0
  - Facebook icon - [source](https://simpleicons.org/?q=Facebook)
    - CC0
- Pets page
  - Gwen image - [source](https://humanepro.org/sites/default/files/styles/article_new/public/images/hero/Sampa_12626.jpg?itok=oR45nIIo)
  - Lulu image - [source](https://commons.wikimedia.org/wiki/File:Dog-2016-11-a.jpg)
  - Cat image - [source](https://www.operationkindness.org/wp-content/uploads/blog-june-adopt-shelter-cat-month-operation-kindness.jpg)
  - Rodent image - [source](https://www.pexels.com/photo/white-rat-on-a-blanket-26158915/)
- Home
  - Dog image - [source](https://pxhere.com/en/photo/934965)
  - Staff holding cat - [source](https://www.shutterstock.com/image-photo/cat-animal-shelter-1773024227)
  - Fish - [source](https://pixabay.com/photos/goldfish-lion-head-aquarium-2285528/)
- News:
  - News article - trust cheque - [source](https://pixahive.com/photo/filling-a-bank-cheque/)
  - News article -  Leopard Gecko - [source](https://www.thesprucepets.com/thmb/otgtEGZo0xa4jLjIiKUoh3PRwTw=/4543x0/filters:no_upscale():strip_icc()/leopard-geckos-1236911-01-20aac80501f241f593afcaa7c835de33.jpg)
  - News article - dog park - [source](https://photos.bringfido.com/photo/2020/01/14/Gearhart_Indoor_Dog_Park.jpg)
- About us
  - Cat in about us - [source](https://freerangestock.com/sample/172313/tabby-cat-licking-its-paw-outdoor.jpg)
    - CC0
  - Our founder - [source](https://stock.adobe.com/search/images?k=vet+with+cat+and+dog&asset_id=395616844)
    - Adobe Standard licence
      - Include the asset in email marketing, mobile advertising, or a broadcast or digital program if the expected number of viewers is fewer than 500,000.
      - Post the asset to a website or social media site with no limitation on views.
  - Our staff - [source](https://media.istockphoto.com/id/521072827/photo/dog-at-the-vet.jpg?s=612x612&w=0&k=20&c=31QtBlqvv4f3xFftDL2i7avElZ8IeUFD3Bd7b2UaHw0=)
