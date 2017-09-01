<section class="entry-meta">
<!-- <span class="author vcard">< ?php echo get_the_author(); ?></span> -->
 <span class="author vcard"><?php echo the_author_posts_link(); ?> </span>
<span class="meta-sep"> | </span>
<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
</section>
