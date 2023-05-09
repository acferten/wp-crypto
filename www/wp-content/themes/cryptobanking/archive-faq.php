<?php get_header(); ?>

  <main class="main">
    <div class="big-word big-word--faq">questions</div>
    <section class="faq">
      <h1 class="faq__title title">
        <?= __('Frequently asked questions', 'crypto-banking')?>
      </h1>

      <div class="faq__wrapper">
      <?php
        while ( have_posts() ) :
                the_post();
      ?>
        <div class="faq__item js-faqItem">
          <div class="faq__item-line" id="">
            <div class="faq__item-question">
              <?= the_title();?>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="9" class="faq__arrow">
              <use xlink:href="<?= get_template_directory_uri()?>/assets/icons/symbols.svg#arrow_down" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
          </div>
            <div class="faq__item-text" id="<?= the_ID();?>">
              <?= the_content();?>
          </div>
        </div>
      <?php
          endwhile;
      ?>
      </div>
      <div class="faq__navigation">
<?php the_posts_pagination([
 'mid_size' => 2,
 'end_size' => 2,    
])?>

      </div>

      <div class="faq__question">
        <?= __("Can't find what you looking for?", 'crypto-banking')?>
      </div>
      <div class="faq__text">
        <?= __("Ask away!", 'crypto-banking')?>
      </div>
      <button class="faq__question-btn" type="button" id="js-questionBtn">
        <?= __("Ask a Question", 'crypto-banking')?>
      </button>
    </section>
  </main>


  <button type="button" class="btn-up" id="js-btnUp">
  <span class="btn-up__arrow"></span>
  <?= __('Up', 'crypto-banking')?>
</button>

  <div class="pp js-pp" id="js-ppForm">
    <div class="pp__container">
      <div class="pp__title">
        <?= __('Ask question', 'crypto-banking')?>
      </div>
      <div class="pp__description">
        <?= __('If you have any questions about our service, you can ask them by filling out the form below', 'crypto-banking')?>
      </div>

      <form action="/wp-admin/admin-ajax.php?action=send_form" method="POST" class="form" role="form  pp__form" id="js-faqForm" novalidate>
        <label class="form__el">
          <span class="form__caption">
            <?= __('Name', 'crypto-banking')?>
          </span>
          <span class="form__wrap">
            <input class="form__input" type="text" name="name" required>
          </span>
        </label>
        <label class="form__el">
          <span class="form__caption">
            E-mail
          </span>
          <span class="form__wrap">
            <input class="form__input" type="email" name="email" required>
          </span>
        </label>
        <label class="form__el">
          <span class="form__caption">
            <?= __('Your ask', 'crypto-banking')?>
          </span>
          <span class="form__wrap">
            <textarea class="form__textarea js-clear" name="question" required></textarea>
          </span>
        </label>
        <div class="form__actions">
          <button class="form__close  btn-close js-ppClose" type="button"><?= __('Close', 'crypto-banking')?></button>
          <button class="form__submit" type="submit"><?= __('Send question', 'crypto-banking')?></button>
        </div>
      </form>

    </div>
  </div>

<div class="pp js-pp" id="js-msgOk">
  <div class="pp__wrapper">
    <div class="pp__container">
       <div class="pp__message">
        <?= __('The question was successfully sent', 'crypto-banking')?>
      </div>
    </div>
    <div class="pp__actions">
      <button type="button" class="btn-close js-ppClose"><?= __('Close', 'crypto-banking')?></button>
      <a class="pp__link" href="<?= pll_home_url()?>"><?= __('Main page', 'crypto-banking')?></a>
    </div>
  </div>
</div>

<div class="pp js-pp" id="js-msgError">
  <div class="pp__wrapper">
    <div class="pp__container">
      <div class="pp__message pp__message--error">
        <?= __('Something went wrong, please try again later.', 'crypto-banking')?>
      </div>
    </div>
    <div class="pp__actions">
      <button type="button" class="btn-close js-ppClose"><?= __('Close', 'crypto-banking')?></button>
      <a class="pp__link" href="<?= pll_home_url()?>"><?= __('Main page', 'crypto-banking')?></a>
    </div>
  </div>
</div>


<?php get_footer(); ?>