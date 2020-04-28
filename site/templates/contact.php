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
if ($contactPage = page('contact')): ?>

<?php snippet('header', array(
    'indexed' => $contactPage->indexed(),
    'page' => $contactPage
)) ?>

<main>
    <div id="feature">
        <img id="featureImg" src="<?= $contactPage->bannerimage()->toFile()->url() ?>" />
    </div>
    <div id="pageContent">
        <?php if($success): ?>
            <div class="success"> SUCCESS
                <p><?= $success ?></p>
            </div>
        <?php else: ?>
        <?php if (isset($alert['error'])): ?>
            <div><?= $alert['error'] ?></div>
        <?php endif ?>
        <div class="contentHeader">
            <?= $contactPage->contentHeader() ?>
        </div>
        <div class="contentSection"><p style="text-decoration: underline; font-weight: bold; display: inline-block">Toll Free:</p>
            <p style="display: inline-block"><?= $contactPage->phoneNumber() ?></p>
        </div>
        <div class="contentSection"><p style="display: inline-block; text-decoration: underline; font-weight: bold">Email:</p>
            <p style="display: inline-block"><?= $contactPage->email() ?></p>
        </div>
        <form style="text-align:center" id="contact" method="post" action="<?= $page->url() ?>">
            <label style="font-family: Arial; color: #373737; text-transform: uppercase; font-size: 0.9em; letter-spacing: 1px;">NAME:</label><br />
            <input style="margin-top: 7px; padding: 9px; outline: none; border: none; width: 85%; background-color: #CCC; color: #333" type="text" name="name"><br />
            <label style="font-family: Arial; color: #373737; text-transform: uppercase; font-size: 0.9em; letter-spacing: 1px;">EMAIL ADDRESS:</label><br />
            <input style="margin-top: 7px; padding: 9px; outline: none; border: none; width: 85%; background-color: #CCC; color: #333" type="text" name="email"><br />
            <label style="font-family: Arial; color: #373737; text-transform: uppercase; font-size: 0.9em; letter-spacing: 1px;">HOW CAN WE HELP YOU?</label><br />
            <textarea rows="8" cols="38" style="margin-top: 7px; padding: 9px; outline: none; border: none; width: 85%; background-color: #CCC; color: #333" name="help"></textarea><br />
            <button class="reset" name="reset">RESET</button>
            <button class="submit" name="submit" value="SUBMIT" type="submit">SUBMIT</button>
        </form>
        <div class="contentSection" style="text-align: center">
            <?= $contactPage->afterFormNote()->kt() ?>
        </div>
        <?php endif ?>
    </div>
    <?php endif ?>
</main>

<?php snippet('footer') ?>
