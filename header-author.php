<header class="header">
<?php the_post(); ?>
<h1 class="title author"><?php _e( 'all posts by', 'missguided' ); ?> <?php the_author_link(); ?></h1>
<?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
<?php rewind_posts(); ?>
</header>