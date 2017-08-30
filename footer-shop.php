
  <!--< ?php get_template_part( 'nav', 'below-single' ); ?>-->
  <?php $entries = get_post_meta( get_the_ID(), 'product_group', true ); ?>
  <!-- < ?php echo '<p>' . var_dump($entries) . '</p>'?> -->
  <?php if ( $entries > 0) : ?>
    <h3 class="widget-title">shop the look</h3>
    <ul class="related_product flex_list">
      <?php
      // $entries = get_post_meta( get_the_ID(), 'product_group', true );
      foreach ( (array) $entries as $key => $entry ) {

        $img = $title = $price = $link = '';

        if ( isset( $entry['title'] ) ) {
          $title = esc_html( $entry['title'] );
        }

        if ( isset( $entry['image'] ) ) {
          //$img = wp_get_attachment_image( $entry['image'], 'share-pick', null, array(
          $img = esc_url( $entry['image'], 'share-pick', null, array(
            'class' => 'thumb',
          ) );
        }

        if ( isset( $entry['price'] ) ) {
          $price = esc_html( $entry['price'] );
        }

        if ( isset( $entry['link'] ) ) {
          $link = esc_url( $entry['link'] );
        }

        // Do something with the data

        echo '<li><a href="'. $link .'">';
        echo '<img class="product_img" src="'. $img .'" alt="product_img"/>';
        echo '<p class="product_title">'. $title .'</p>';
        echo '<p class="product_price">'. $price .'</p>';
        echo '</a></li>';
      }
      ?>
    </ul>

  <?php endif; ?>
