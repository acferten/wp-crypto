<?php get_header(); ?>

  <main class="main">
    <div class="big-word  big-word--news">news</div>
    <div class="news">
      <h1 class="news__title title">
        <?= __('News', 'crypto-banking')?>
      </h1>
      <?php if (have_posts()): ?>

      <section class="news__listings" id="js-listing">
        <div class="news__list-one" id="js-listOne"></div>
        <div class="news__list-two" id="js-listTwo"></div>

        <div class="news__list"  id="js-list">
            <?php while ( have_posts() ): 
                 the_post();
            ?>
            
              <div class="news-card">
                  <a href="<?= get_post_permalink()?>" class="news-card__link"></a>
                  <div class="news-card__image-wrapper">
                    <img src="<?= (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : get_template_directory_uri()."/assets/images/examples/news_item3.jpg"?>" alt="img" class="news-card__image">
                  </div>
                  <h4 class="news-card__title"><?= the_title()?></h4>
                  <time class="news-card__time time" datetime="<?= the_time('Y-m-d') ?>">
                      <?= the_time('d F Y')?>
                    </time>
              </div>
            
            <?php endwhile;?>
        </div> 
      </section>
      <div class="news__navigation">
        <?php the_posts_pagination([
         'mid_size' => 2,
         'end_size' => 2,    
        ])?>
      </div>

        <?php else : ?>
              <p class="news__empty"><?= __('No news', 'crypto-banking')?></p>
            
        <?php endif; ?>
    </div>
  </main>
<?php get_footer(); ?>
