<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * This header snippet is reused in all templates.
 * It fetches information from the `site.txt` content file and contains the site navigation.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php if ($indexed  && $indexed == 'nonindexed'): ?>
    <meta name="robots" content="noindex">
    <?php endif; ?>

    <?php if ($metaDescription = $page->metaDescription()): ?>
    <meta name="description" content="<?= $metaDescription->toString() ?>">
    <?php endif; ?>

  <!-- The title tag we show the title of our site and the title of the current page -->
  <title><?= $site->title() ?> | <?= $page->title() ?></title>

  <!-- Stylesheets can be included using the `css()` helper. Kirby also provides the `js()` helper to include script file.
        More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers -->
  <?= css(['assets/css/index.css', '@auto']) ?>
    <script
        src="https://code.jquery.com/jquery-3.5.0.slim.min.js"
        integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs="
        crossorigin="anonymous"></script>
    <?= js(['assets/js/app.js']) ?>

</head>
<body>

  <div class="page">
    <header class="header">
      <!-- In this link we call `$site->url()` to create a link back to the homepage -->
      <a class="logoWrap" href="<?= $site->url() ?>"><img class="logo" src="<?= url('assets/css/logo.png') ?>" /></a>

      <nav id="menu" class="menu">
          <ul class="navigation">
              <li><a href="/">Main</a></li>
              <li><a href="#">How To Prepare</a></li>
              <li><a href="#">CDA Interview Questions</a></li>
              <li><a href="/contact">Contact Us</a></li>
          </ul>
      </nav>
    </header>

