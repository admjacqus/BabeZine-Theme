<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <!-- conditional header -->
    <?php if(is_single()){?>

        <?php if ( is_singular() ) { echo '<h1 class="title">'; } else { echo '<h2 class="title">'; } ?>
          <?php the_title(); ?>
          <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>


              <?php }else{?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                  <div class="thumbnail"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
                  <?php if ( is_singular() ) { echo '<h1 class="title">'; } else { echo '<h2 class="title">'; } ?>
                    <?php the_title(); ?>
                    <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
                  </a>
                  <?php }?>
                  <?php edit_post_link(); ?>
                  <?php get_template_part( 'entry', 'meta' ); ?>
                  <!-- < ?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?> -->
                </header>
                <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
              </article>