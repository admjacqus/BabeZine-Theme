<?php if( get_field('featured_post') ){ echo '<div class="item item-2">'; } else { echo '<div class="item">'; } ?>
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                      <?php if( get_field('bz_image') ){ ?>
                      <img src="<?php the_field('bz_image');?>" />
                        <?php } else { ?>
                            <div class="thumbnail"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></div>
                            <?php } ?>
                <h2 class="title"><?php the_title(); ?></h2>
                <h4 class="subtitle">
                <?php if( get_field('bz_excerpt') ){ ?>
                  <?php the_field('bz_excerpt'); ?>
                    <?php } else { ?>
                        <?php remove_filter( 'the_excerpt', 'wpautop' ); the_excerpt(); add_filter( 'the_excerpt', 'wpautop' );  ?>
                    <?php } ?>
                </h4>
                <?php if( get_field('bz_button') ){ ?>
                <button class="cta"><?php the_field('bz_button'); ?></button>
                  <?php } else { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                      <button class="cta">check it out</button>
                    </a>
                      <?php } ?>
              </a>
            </div>

<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
