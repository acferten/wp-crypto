<?php get_header (); ?>

  <main class="main">
    <div class="big-word  big-word--error">error</div>
    <section class="page-error">
      <div class="page-error__number">
        500
      </div>
      <p class="page-error__text">
        <?= __('Unexpected error', 'crypto-banking')?>
      </p>
      <a class="page-error__link" href="<?= pll_home_url()?>">
        <?= __('Main page', 'crypto-banking')?>
      </a>
    </section>

  </main>

<?php get_footer (); ?>
