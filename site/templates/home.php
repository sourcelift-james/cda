<?php
/**
 * Templates render the content of your pages.
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page.
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php
// we always use an if-statement to check if a page exists to prevent errors
// in case the page was deleted or renamed before we call a method like `children()` in this case
if ($homePage = page('home')): ?>

<?php snippet('header', array(
    'indexed' => $homePage->indexed(),
    'page' => $homePage
)) ?>

<main>
  <div id="feature">
      <img id="featureImg" src="<?= $homePage->backgroundimage()->toFile()->url() ?>" />
      <div id="bannerContainer">
          <div id="bannerText"><?= $homePage->bannertext() ?></div>
      </div>
  </div>
  <div id="pageContent">
      <div class="contentHeader">
          <?= $homePage->contentHeader() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentOverview()->kt() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentPurpose()->kt() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentHistory()->kt() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentQuestions()->kt() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentCompetencies()->markdown() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentStructure()->kt() ?>
      </div>
      <div class="contentSection">
          <?= $homePage->contentReference()->kt() ?>
      </div>
  </div>
  <?php endif ?>
</main>

<?php snippet('footer') ?>
