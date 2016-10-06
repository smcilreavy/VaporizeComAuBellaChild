<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<div class="thumbnail no-border no-padding">
	<div class="media">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<a  href="<?php the_permalink(); ?>" class="" data-product_id="<?php echo $product->id; ?>">
			<?php
			/**
			* woocommerce_before_shop_loop_item_title hook
			*
			* @hooked woocommerce_show_product_loop_sale_flash - 10
			* @hooked woocommerce_template_loop_product_thumbnail - 10
			*/
			do_action( 'woocommerce_before_shop_loop_item_title' );	?>
		</a>

	</div>

	<div class="caption text-center">

		<a  href="<?php the_permalink(); ?>"><h4 class="caption-title"><?php the_title(); ?></h4></a>
		<?php
		/**
		* woocommerce_after_shop_loop_item_title hook
		*
		* @hooked woocommerce_template_loop_rating - 5
		* @hooked woocommerce_template_loop_price - 10
		*/
		do_action( 'woocommerce_after_shop_loop_item_title' );?>

	     <div class="buttons">
		     <?php if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {              
		                echo  do_shortcode('[yith_wcwl_add_to_wishlist]');               
		            }
			
			/**
			* woocommerce_after_shop_loop_item hook
			*
			* @hooked woocommerce_template_loop_add_to_cart - 10
			*/
			do_action( 'woocommerce_after_shop_loop_item' ); 
			if (is_plugin_active('yith-woocommerce-compare/init.php')) {
                echo do_shortcode('[yith_compare_button]');
                
            }
			?>
		</div>
	</div>	
</div>