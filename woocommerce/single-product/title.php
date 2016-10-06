<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
global $post, $product,$bella_options;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$cat_count1 = get_the_terms( $post->ID, 'product_cat' ); 
?>


<div class="back-to-category">
  <span class="link"><i class="fa fa-angle-left"></i><?php _e(' Back to ','dikka');?><a href="/category/<?php echo $cat_count1[0]->slug; ?>"><?php _e('Category','dikka');?></a></span>
  <div class="pull-right">
      
	  <?php previous_post_link('%link','<div class="btn btn-theme btn-theme-transparent btn-previous"> <i class="fa fa-angle-left"></i></div>');	   ?>
     <?php next_post_link('%link','<div class="btn btn-theme btn-theme-transparent btn-next"> <i class="fa fa-angle-right"></i></div>');	   ?>
      </div>
</div>
 <h2 itemprop="name" class="product-title"><?php the_title(); ?></h2>

