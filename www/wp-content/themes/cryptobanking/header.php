<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
  <title><?php wp_title(); ?></title>
  <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/styles/styles.min.css?ver=1.2">
  
  <script>
    if(/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
        {
          document.write('<script src="<?= get_template_directory_uri() ?>/scripts/svg4everybody.min.js"><\/script>');
          document.write('<script src="<?= get_template_directory_uri() ?>/scripts/picturefill.min.js"><\/script>');
          document.write('<script src="<?= get_template_directory_uri() ?>/scripts/fitie.min.js"><\/script>');
        }
  </script>
      
<script type="text/javascript">
    document.vocabulary = {
      validation: {
        required: "<?= __("This field is required", 'crypto-banking') ?>",
        remote: "<?= __("Please enter the valid value.", 'crypto-banking') ?>",
        email: "<?= __("Enter the correct email address", 'crypto-banking') ?>",
        url: "<?= __("Please enter the correct URL", 'crypto-banking') ?>",
        date: "<?= __("Please enter the correct date.", 'crypto-banking') ?>",
        dateISO: "<?= __("Please enter the correct ISO format date.", 'crypto-banking') ?>",
        number: "<?= __("Please enter the number.", 'crypto-banking') ?>",
        digits: "<?= __("Please enter only numbers.", 'crypto-banking') ?>",
        creditcard: "<?= __("Please enter the valid Credit Card Number.", 'crypto-banking') ?>",
        equalTo: "<?= __("Passwords do not match!", 'crypto-banking') ?>",
        extension: "<?= __("Please select a file with the correct extension.", 'crypto-banking') ?>",
        maxlength: "<?= __("Please enter no more than {0} characters.", 'crypto-banking') ?>",
        minlength: "<?= __("Please enter at least {0} characters.", 'crypto-banking') ?>",
        rangelength: "<?= __("Please enter a value between {0} and {1} characters long.", 'crypto-banking') ?>",
        range: "<?= __("Please enter a value between {0} and {1}.", 'crypto-banking') ?>",
        max: "<?= __("Please enter a number less than or equal to {0}.", 'crypto-banking') ?>",
        min: "<?= __("Please enter a number greater than or equal to {0}.", 'crypto-banking') ?>",
      }
    }
  </script>
      
  <?php wp_head()?>
</head>

<body class="body">

  <header class="page-header" id="js-pageHeader">
  <div class="page-header__inner">
    <div class="page-header__wrapper">
        <a href="<?= pll_home_url()?>" class="page-header__main-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="112" height="51" class="page-header__logo">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#logo" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
      </a>
      <div class="page-header__menu-wrapper">
        <nav class="page-header__menu page-header__menu--active">
            <a class="page-header__menu-link<?= (strpos($wp->request, 'about')!==false)?' page-header__menu-link--active':''?>" href="<?= get_pll_page_uri('about')?>"><?= __('About us', 'crypto-banking')?></a>
            <a class="page-header__menu-link<?= (strpos($wp->request, 'support')!==false)?' page-header__menu-link--active':''?>" href="<?= get_pll_page_uri('support')?>"><?= __('Technical support', 'crypto-banking')?></a>
          <a class="page-header__menu-link<?= (strpos($wp->request, 'faq')!==false)?' page-header__menu-link--active':''?>" href="<?= get_post_type_archive_link('faq');?>"><?= __('FAQ', 'crypto-banking')?></a>
          <a class="page-header__menu-link<?= (strpos($wp->request, 'news')!==false)?' page-header__menu-link--active':''?>" href="<?= get_post_type_archive_link('news');?>"><?= __('News', 'crypto-banking')?></a>
          <a class="page-header__menu-link<?= (strpos($wp->request, 'contacts')!==false)?' page-header__menu-link--active':''?>" href="<?= get_pll_page_uri('contacts')?>"><?= __('Contacts', 'crypto-banking')?></a>
          <div class="page-header__point"></div>
        </nav>
        <div class="socials page-header__socials">
            <?php 
            $tg = get_option('social-tg');
            if ($tg): 
            ?>
            <a href="<?= $tg ?>" class="socials__link page-header__socials-link">
            <svg class="socials__icon page-header__socials-icon" width="16" height="13">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_telegram" xmlns:xlink="http://www.w3.org/2000/svg"></use>
            </svg>
          </a>
            <?php endif;?>
            <?php 
            $ig = get_option('social-ig');
            if ($ig): 
            ?>
          <a href="<?= $ig?>" class="socials__link page-header__socials-link">
            <svg class="socials__icon page-header__socials-icon" width="16" height="16">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_inst" xmlns:xlink="http://www.w3.org/2000/svg"></use>
            </svg>
          </a>
            <?php endif;?>
            <?php
                $vk = get_option('social-vk');
                if ($vk): 
            ?>
          <a href="<?= $vk?>" class="socials__link page-header__socials-link">
            <svg class="socials__icon page-header__socials-icon" width="19" height="11">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_vk" xmlns:xlink="http://www.w3.org/2000/svg"></use>
            </svg>
          </a>
            <?php endif;?>
        </div>
      </div>
    </div>
    <div class="page-header__wrapper2">
        <?php 
            $lang = pll_the_languages(array('raw'=>1));
            $icon = (pll_current_language() == 'ru')?'en':'ru';
        ?>
        <a class="page-header__btn-lang" href="<?= (pll_current_language()=='ru') ? $lang['en']['url'] : $lang['ru']['url'] ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" class="auth__lang-icon">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#flag_<?= $icon?>" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
      </a>
      <div class="page-header__btn-box">
          <?php 
          $register_url = get_option('service-register');
          if( $register_url):?>
              <a class="page-header__btn-registration" href="<?= $register_url?>"><?= __('Register')?></a>
          <?php else:?>
              <a class="page-header__btn-registration  js-regBtn"><?= __('Register')?></a>
          <?php endif;?>
          <?php if( get_option('service-login')):?>
              <a class="page-header__btn-login" href="<?= get_option('service-login')?>"><?= __('Log in')?></a>
          <?php else:?>
              <a class="page-header__btn-login  js-regBtn"><?= __('Log in')?></a>
          <?php endif;?>
      </div>
      <a class="page-header__user-link" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="page-header__user-icon" width="18" height="18">
          <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#user" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
         </svg>
      </a>
      <button class="page-header__toggle" type="button" id="js-phToggle">
        <span class="page-header__toggle-line"></span>
      </button>
    </div>
  </div>
      
</header>

    