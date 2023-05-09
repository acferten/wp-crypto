<?php get_header (); ?>

    <main class="main">
      <div class="big-word big-word--error">error</div>
      <section class="page-error">
        <div class="page-error__number  page-error__number--gold">
          4
          <span class="page-error__stroke-num">0</span>
          4
        </div>
        <p class="page-error__text"><?= __("Page doesn't exist", 'crypto-banking')?></p>
        <a class="page-error__link" href="<?= pll_home_url()?>"> <?= __('Main page', 'crypto-banking')?> </a>
      </section>
    </main>

<?php get_footer (); ?>
