<?php 
    get_header(); 
    get_post();
?>
    <main class="main">
      <article class="article article--center">
        <div class="article__container">
          <header class="article__header">
            <h1 class="article__title"><?php the_title()?></h1>
          </header>
          <div class="article__content content">
              <?php the_content()?>
          </div>
        </div>
      </article>
    </main>

<?php get_footer(); ?>
