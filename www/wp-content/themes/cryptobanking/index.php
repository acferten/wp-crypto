<?php get_header(); ?>

  <main class="promo">
  <section class="promo__about-wrapper">
    <div class="promo__about">
      <h1 class="promo__about-title">
        <?= bloginfo('description')?>
      </h1>
      <p class="promo__about-slogan">
        <?= __('reliable', 'crypto-banking')?> • <?= __('transparent', 'crypto-banking')?> • <?= __('safe', 'crypto-banking')?>
      </p>
    </div>
    <div class="promo__socials-wrapper">
      <div class="socials promo__socials">
        <?php 
        $tg = get_option('social-tg');
        if ($tg): 
        ?>
        <a href="<?= $tg?>" class="socials__link promo__socials-link">
          <svg class="socials__icon promo__socials-icon" width="16" height="13">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_telegram" xmlns:xlink="http://www.w3.org/2000/svg"></use>
          </svg>
        </a>
        <?php endif;?>
        <?php 
        $ig = get_option('social-ig');
        if ($ig): 
        ?>
        <a href="<?= $ig?>" class="socials__link promo__socials-link">
          <svg class="socials__icon promo__socials-icon" width="16" height="16">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_inst" xmlns:xlink="http://www.w3.org/2000/svg"></use>
          </svg>
        </a>
        <?php endif;?>
        <?php 
        $vk = get_option('social-vk');
        if ($vk): 
        ?>
        <a href="<?= $vk?>" class="socials__link promo__socials-link">
          <svg class="socials__icon promo__socials-icon" width="19" height="11">
            <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#soc_vk" xmlns:xlink="http://www.w3.org/2000/svg"></use>
          </svg>
        </a>
        <?php endif;?>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" class="auth__circle promo__circle" width="134" height="136">
        <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#crypto_circle" xmlns:xlink="http://www.w3.org/2000/svg"></use>
      </svg>
    </div>
  </section>
  <section class="promo__mobile-wrapper">
    <div class="promo__mobile-inner">
      <div class="promo__mobile-title"><?= __('Mobile app', 'crypto-banking')?></div>
      <div class="promo__mobile-box">
        <div class="promo__mobile-links">
          <?php 
              $google_play = get_option('mobile-google-play');
              $app_store = get_option('mobile-app-store');
              $qrgp = wp_get_attachment_image_src( get_option('QR-google-play'));
              $qrps = wp_get_attachment_image_src( get_option('QR-app-store'));
          ?>  
            
          <?php if($google_play):?>  
              <a class="promo__mobile-link" href="<?= $google_play?>">
          <?php else:?>
              <a class="promo__mobile-link js-appBtn">
          <?php endif;?>
            <svg xmlns="http://www.w3.org/2000/svg" class="promo__mobile-icon" width="40" height="40">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#app_gp" xmlns:xlink="http://www.w3.org/2000/svg">
              </use>
            </svg>
            <div class="promo__link-name">
              Google Play
            </div>
          </a>
          <?php if($app_store):?>  
              <a class="promo__mobile-link" href="<?= $app_store?>">
          <?php else:?>
              <a class="promo__mobile-link js-appBtn">
          <?php endif;?>
            <svg xmlns="http://www.w3.org/2000/svg" class="promo__mobile-icon" width="40" height="40">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#app_store" xmlns:xlink="http://www.w3.org/2000/svg">
              </use>
            </svg>
            <div class="promo__link-name">
              App Store
            </div>
          </a>
          <?php if($qrgp || $qrps):?>  
              <button class="promo__mobile-link promo__mobile-link--btn" type="button" id="js-QR">
          <?php else:?>
              <button class="promo__mobile-link promo__mobile-link--btn js-appBtn">
          <?php endif;?>
            <svg xmlns="http://www.w3.org/2000/svg" class="promo__mobile-icon" width="40" height="40">
              <use xlink:href="<?= get_template_directory_uri() ?>/assets/icons/symbols.svg#app_qr" xmlns:xlink="http://www.w3.org/2000/svg">
              </use>
            </svg>
            <div class="promo__link-name">
              QR
            </div>
          </button>
        </div>
          <a class="promo__mobile-about" href="<?= get_option('mobile-more-link')?>">
          <?= __('More', 'crypto-banking')?>
        </a>
      </div>
      <img class="promo__mobile-img" src="<?= get_template_directory_uri() ?>/assets/images/phone.png" alt="">
    </div>

    <?php get_template_part('template-parts/crypto/crypto', 'box' ) ?>
    
  </section>
  </main>

   <div class="pp pp--no-mobile js-pp" id="js-qrPP">
  <div class="pp__wrapper">
    <div class="pp__container">
      <div class="pp__app-qrs">
        <?php if($qrgp):?>  
        <figure class="pp__app-qr">
            <img src="<?= $qrgp[0] ?>" alt="Google Play" class="pp__app-qr-img">
          <figcaption class="pp__app-qr-caption">Google Play</figcaption>
        </figure>
        <?php endif;?>
        <?php if($qrps):?>  
        <figure class="pp__app-qr">
          <img src="<?= $qrps[0] ?>" alt="App Store" class="pp__app-qr-img">
          <figcaption class="pp__app-qr-caption">App Store</figcaption>
        </figure>
        <?php endif;?>
      </div>
    </div>
    <button type="button" class="btn-close js-ppClose"><?= __('Close')?></button>
  </div>
</div>

  <div class="pp js-pp" id="js-appPP">
    <div class="pp__wrapper">
      <div class="pp__container pp__container--400">
         <p class="pp__message">
          <?= __('The application is under development.', 'crypto-banking')?>
         </p>

         <p class="pp__sub-msg">
          <?= __('Follow our news!', 'crypto-banking')?>
         </p>
      </div>
      <div class="pp__actions">
        <button type="button" class="btn-close js-ppClose"><?= __('Close', 'crypto-banking')?></button>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
