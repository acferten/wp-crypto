<?php 
    get_header(); 
    get_post();
?>
  <main class="main">
    <div class="big-word  big-word--support">support</div>
    <div class="support">
        <h1 class="support__title title"><?php the_title()?></h1>
      <p class="support__text">
          <?php
              $mail = get_option('support-mail');
          ?>
         E-mail any questions about our service on <a class="support__mail-link" href="mailto:<?= $mail?>"><?= $mail?></a>
         or fill out the form below
      </p>

        <form action="<?= get_template_directory_uri()?>/send_question.php" method="POST" class="form support__form" role="form" id="js-supForm" novalidate>
          <label class="form__el">
            <span class="form__caption">
              Name
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
              Your question
            </span>
            <span class="form__wrap">
              <textarea class="form__textarea js-clear" name="question" required></textarea>
            </span>
          </label>
          <button class="form__submit" type="submit">Send question</button>
        </form>
    </div>
  </main>

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
