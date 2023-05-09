<?php get_header(); ?>

    <main class="main">
      <div class="big-word big-word--article">news</div>
      
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
      
      <article class="article">
        <div class="article__container">
          <header class="article__header">
              <a href="<?= get_post_type_archive_link('news');?>" class="article__listing-link"><?= __('All news', 'crypto-banking')?></a>
              
              <time class="article__time" datetime="<?= the_time('Y-m-d')?>">
                  <?= the_time('d F Y')?>
              </time>
              
              <h1 class="article__title">
                  <?php the_title() ?>
              </h1>

              <?php 
                  $thumb = get_the_post_thumbnail_url();
                  $capt = get_the_post_thumbnail_caption();
                  if($thumb):
              ?>
                <figure class="article__figure">
                  <img
                    class="article__img"
                    src="<?= $thumb?>"
                    alt=""
                  />
                  <figcaption class="article__figcaption">
                    <?= $capt?>
                  </figcaption>
                </figure>
              <?php endif; ?>
              
          </header>
          <div class="article__content content">
              <?php the_content()?>
          </div>
        </div>
        <footer class="article__footer">
          <div class="article__social-box">
            <div class="article__social-title">
              <?= __('share on social networks', 'crypto-banking')?>
            </div>
            <div class="socials article__socials">
              <a class="socials__link sharer" data-sharer="facebook">
                <svg class="socials__icon" width="8" height="16">
                  <use
                    xlink:href="<?= get_template_directory_uri()?>/assets/icons/symbols.svg#soc_fb"
                    xmlns:xlink="http://www.w3.org/2000/svg"
                  ></use>
                </svg>
              </a>
              <a class="socials__link sharer" data-sharer="twitter">
                <svg class="socials__icon" width="16" height="13">
                  <use
                    xlink:href="<?= get_template_directory_uri()?>/assets/icons/symbols.svg#soc_twitter"
                    xmlns:xlink="http://www.w3.org/2000/svg"
                  ></use>
                </svg>
              </a>
              <a class="socials__link sharer" data-sharer="vk">
                <svg class="socials__icon" width="19" height="11">
                  <use
                    xlink:href="<?= get_template_directory_uri()?>/assets/icons/symbols.svg#soc_vk"
                    xmlns:xlink="http://www.w3.org/2000/svg"
                  ></use>
                </svg>
              </a>
            </div>
          </div>
          <div class="article__btn-box">
              <?php
                $prev = get_previous_post_link( '%link', __('Previous article', 'crypto-banking')); 
                if ($prev) { echo str_replace( '<a ', '<a class="article__btn" ', $prev ); }
                $next = get_next_post_link( '%link', __('Next article', 'crypto-banking')); 
                if ($next) { echo str_replace( '<a ', '<a class="article__btn" ', $next ); }

              ?>
          </div>
        </footer>
            
    </article>
    <?php } } ?>
      
    </main>

<?php get_footer(); ?>
