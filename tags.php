
<?php 
if(has_tag()) {
    $tags = get_the_tags();
$html = '<div class="tags"><ul>';
foreach ( $tags as $tag ) {
    $tag_link = get_tag_link( $tag->term_id );
             
    $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
    $html .= "{$tag->name}</a></li>";
}
$html .= '</ul></div>';
echo $html;
} elseif(has_category()) {
//  do nothing
    //   the_category(); //show category
 
} else {
      //do something different
}

?>