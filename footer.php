<!-- <div class="clear"></div> -->
</div>
</div>
<footer class="footer">
<?php
if ( is_single() ) :
	get_footer( 'shop' );
	get_footer( 'related' );
else :
	wp_footer();
endif;
?>
</footer>
</body>
</html>
