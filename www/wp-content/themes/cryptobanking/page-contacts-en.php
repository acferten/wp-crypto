<?php 
    get_header(); 
    get_post();
?>
    <main class="main">
      <div class="contacts">
        <div class="contacts__container">
          <h1 class="contacts__title title"><?php the_title()?></h1>
          <ul class="contacts__list">
            <?php
                $contact_number = get_option('contacts-number');
                if ($contact_number):
            ?>
            <li class="contacts__item">
              <span class="contacts__caption"><?= __('Contact number', 'crypto-banking')?></span>
              <a class="contacts__info" href="tel:<?= preg_replace("/[^0-9]/", '', $contact_number)?>">
                <?= $contact_number?>
              </a>
            </li>
            <?php endif;?>

            <?php
                $mail = get_option('contacts-mail');
                if ($mail):
            ?>
            <li class="contacts__item">
              <span class="contacts__caption">E-mail</span>
              <a class="contacts__info" href="mailto:<?= $mail?>">
                <?= $mail?>
              </a>
            </li>
            <?php endif;?>

            <?php
                $headquarter = get_option('contacts-headquarter-en');
                if ($mail):
            ?>
            <li class="contacts__item">
              <span class="contacts__caption"><?= __('Headquarter', 'crypto-banking')?></span>
              <div class="contacts__info">
                <?= $headquarter?>
              </div>
            </li>
            <?php endif;?>
          </ul>
        </div>

        <div class="contacts__img-wrapper">
          <img class="contacts__img" src="<?= get_template_directory_uri()?>/assets/images/bg_map.png" alt="" />
        </div>
      </div>
    </main>

<?php get_footer(); ?>
