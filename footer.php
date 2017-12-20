<!-- <div class="clear"></div> -->
</div>
<div class="totop"> <a href="#top"><svg viewBox="0 0 15.7 9.1" id="icon-arrow-up" width="100%" height="100%"> <path d="M7.8,0l7.6,7.6c0.3,0.3,0.3,0.9,0,1.2s-0.9,0.3-1.2,0L7.8,2.4L1.5,8.8c-0.3,0.3-0.9,0.3-1.2,0s-0.3-0.9,0-1.2L7.8,0z"></path> </svg></a> </div>
<footer class="footer">
<?php
if ( is_single() ) :
	get_footer( 'related' );
else :
	wp_footer();
endif;
?>
</footer>
</body>
</html>
