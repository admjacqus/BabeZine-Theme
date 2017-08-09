<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
<div id="primary" class="widget-area">
<ul class="flex_list">
<?php dynamic_sidebar( 'right-sidebar' ); ?>
</ul>
</div>
<?php endif; ?>
</aside>
