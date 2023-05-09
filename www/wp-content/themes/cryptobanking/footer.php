<?php
$cookies_url = get_pll_page_uri('cookies'); //get_page_uri(pll_get_post($cookies->ID));
$terms_of_use_url = get_pll_page_uri('terms_of_use'); //get_page_uri(pll_get_post($cookies->ID));
$privacy_policy_url = get_pll_page_uri('privacy-policy'); //get_page_uri(pll_get_post($cookies->ID));
?>         

<div class="pp js-pp" id="js-msgPP">
  <div class="pp__wrapper">
    <div class="pp__container">
      <div
        class="pp__message"
        data-success="<?= __('The application has been successfully sent!', 'crypto-banking')?>"
        data-error="<?= __('Something went wrong, please try again later.', 'crypto-banking')?>"
        id="js-msgPPtext"
      ></div>
    </div>
    <div class="pp__actions">
      <button type="button" class="btn-close js-ppClose"><?= __('Close', 'crypto-banking')?></button>
    </div>
  </div>
</div>

<div class="pp js-pp" id="js-ppReg">
  <div class="pp__container">
    <div class="pp__title">
      <?= __('Registration subscription', 'crypto-banking')?>
    </div>
    <div class="pp__description">
        <?= __('Please leave us your E-mail. We will notify you when the service starts working.', 'crypto-banking')?>
    </div>

    <form action="/wp-admin/admin-ajax.php?action=save_register_mail" method="POST" class="form" role="form  pp__form" id="js-regForm" novalidate>

      <label class="form__el">
        <span class="form__caption">
          E-mail
        </span>
        <span class="form__wrap">
          <input class="form__input js-clear" type="email" name="email" required>
        </span>
      </label>

      <div class="form__actions">
        <button class="form__close  btn-close js-ppClose" type="button"><?= __('Close', 'crypto-banking')?></button>
        <button class="form__submit" type="submit"><?= __('Send message', 'crypto-banking')?></button>
      </div>
    </form>

  </div>
</div>


  <footer class="page-footer">
  <div class="page-footer__wrapper">
    <div class="page-footer__copyright">
      © 2020, CryptoBanker
    </div>
    <div class="page-footer__links-inner">
      <div class="page-footer__links-box">
          <a href="<?= $cookies_url?>" class="page-footer__link"><?= __('Cookies', 'crypto-banking')?></a>
          <a href="<?= $terms_of_use_url ?>" class="page-footer__link"><?= __('Terms of use', 'crypto-banking')?></a>
          <a href="<?= $privacy_policy_url?>" class="page-footer__link"><?= __('Privacy policy', 'crypto-banking')?></a>
      </div>
      <div class="page-footer__support-link">
        <p class="page-footer__support-text">
          <?= __('Support', 'crypto-banking')?>
        </p>
        <a class="page-footer__support-mail" href="mailto:<?= get_option('support-mail')?>"><?= get_option('support-mail')?></a>
      </div>
    </div>
    <a class="page-footer__copyright-link" target="_blank" href="https://tagree.ru/">
      <?= __('made by', 'crypto-banking')?>
      <svg class="page-footer__logo" width="40" height="14">
        <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#tagree" xmlns:xlink="http://www.w3.org/2000/svg"></use>
      </svg>
    </a>
  </div>
</footer>

  
  <?php wp_footer()?>
</body>

</html>
