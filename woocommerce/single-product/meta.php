<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product,$bella_options;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?><?php do_action( 'woocommerce_product_meta_start' ); ?>
<table>
	<tr>
    <?php $cat=$product->get_categories( ' - ', '<td class="title">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) .'</td><td>' , '</td>' ); ?>
	<?php echo esc_url($cat);
	echo $cat;?>
    <tr>
        <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
              <td class="title"><?php _e( 'Product Code:', 'woocommerce' ); ?></td>
              <td><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></td>
		<?php endif; ?>
     </tr>

	</tr>
    <tr>
   <?php echo $product->get_tags( ' - ', '<td class="title">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) .'</td><td>','</td>' ); ?>

	
	</tr>
    <tr>
	<?php //echo $product->get_product o( ', ', '<td class="title">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</td>' ); ?>
	</tr>
</table>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>

 <hr class="page-divider small"/>
 
<!-- end right -->    