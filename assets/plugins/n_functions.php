<?php
/**
 * Bella Child functions file.
 */


function bella_redefine_parent_theme_assets() {

  wp_dequeue_script( 'smooth-scrollbar-min' );
  wp_enqueue_script('smooth-scrollbar-min', get_stylesheet_directory_uri().'/assets/plugins/smooth-scrollbar.min.js', array(), FALSE, TRUE);


}
add_action( 'wp_enqueue_scripts', 'bella_redefine_parent_theme_assets',11 );




add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 21;' ), 20 );

function bella_parent_styles() {

	// Enqueue the parent stylesheet
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css','settings' );
	wp_enqueue_style( 'main-child', get_stylesheet_uri() ,'main' );


}
add_action( 'wp_enqueue_scripts', 'bella_parent_styles',11 );



  
if (function_exists('register_sidebar')) { 
	
	register_sidebar( array(
		'name' =>  'Contact' ,
		'id' => 'er_contact_sidebar',
		'description' => 'Add Widget for right side in Contact Page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
		
	register_sidebar( array(
		'name' =>  'Top Bar Phone Number' ,
		'id' => 'top-bar-phone-number',
		'description' => 'Write here your phone number',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
	
	
	}


// Removes thematic_blogtitle from the thematic_header phase
function remove_thematic_actions() {
    remove_filter('add_to_cart_fragments','woocommerce_header_add_to_cart_fragment');
}
// Call 'remove_thematic_actions' during WP initialization
add_action('init','remove_thematic_actions');

// Add our custom function to the 'thematic_header' phase
add_action('add_to_cart_fragments','child_woocommerce_header_add_to_cart_fragment');
	

function child_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <div class="bella_popup">
     <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
             <div class="container">
               <div class="cart-items">
                  <div class="cart-items-inner">
              <?php  if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
                                  
                    $_product = $cart_item['data'];                                            
                    if ($_product->exists() && $cart_item['quantity']>0) : ?>
                      
                     <div class="media">
                        <?php echo '<a class="pull-left" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image(array(50,50)).'</a>';
                         echo '  <p class="pull-right item-price">'.woocommerce_price($_product->get_price()).'</p>';?>
                          <div class="media-body">
                         <?php $bella_product_title = $_product->get_title();
                          echo apply_filters( 'woocommerce_short_description', $_product->post_excerpt );
                         $bella_product_desc = $_product->post_excerpt;
                         echo wp_kses_post($bella_product_desc);
                          $bella_short_product_title = (strlen($bella_product_title) > 28) ? substr($bella_product_title, 0, 25) . '...' : $bella_product_title;
                          echo '<h4 class="media-heading item-title"><a href="'.get_permalink($cart_item['product_id']).'">' .$cart_item['quantity'].''.__('x ', 'bella'). apply_filters('woocommerce_cart_widget_product_title', $bella_short_product_title, $_product) . '</a></h4>';?>
                       <?php echo '<p class="item-desc">'.$_product->get_categories(', ','','').'</p>';?>
                          </div>  
                     </div>
               
                         
                     <?php endif; endforeach;?>                                         
                      <?php else: echo '<li class="empty">'.__('No products in the cart.','woothemes').'</li>'; endif;?>                                       
               <div class="media">
                      <p class="pull-right item-price"><?php echo $woocommerce->cart->get_cart_total(); ?></p>
                      <div class="media-body">
                          <h4 class="media-heading item-title summary"><?php _e('Subtotal', 'bella'); ?></h4>
                      </div>
                  </div>
                 <div class="media">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal"><?php _e('Close', 'bella'); ?></a><!--
                                 --><a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>" class="btn btn-theme btn-theme-transparent btn-call-checkout"><?php _e(' Checkout', 'bella'); ?></a> 
								 <!-- added by elias -->
								 <a id="er_view_cart" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="btn btn-theme btn-theme-transparent btn-call-checkout"><?php _e('View Cart', 'bella'); ?></a> 
								
                            </div>
                        </div>
                    </div>  
                  </div>
               </div>          
            </div>
          </div>
          
      </div>
     <div class="header-cart">
          <div class="cart-wrapper">
           <?php if (is_plugin_active('yith-woocommerce-wishlist/init.php') && function_exists( 'YITH_WCWL' )) :global $wishlist_url;
                 $wishlist_url = YITH_WCWL()->get_wishlist_url();?> 
        <a href="<?php echo esc_url($wishlist_url);?>" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-heart"></i></a>
           <?php endif; 
           if (is_plugin_active('yith-woocommerce-compare/init.php')) :  ?>
              <a href="#" class="yith-woocompare-open btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>                   
          <?php endif;?>   
          <?php  if(!empty($cart_item['data']))
              $_product = $cart_item['data']; ?>
                  <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> <?php echo WC()->cart->cart_contents_count ;?><?php _e(' item(s) - ','bella')?><?php echo $woocommerce->cart->get_cart_total(); ?> </span> <i class="fa fa-angle-down"></i></a>
                  <!-- Mobile menu toggle button -->
                  <a href="#" id="menu-toggle" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                  <!-- /Mobile menu toggle button -->                   
          </div>
      </div>
    </div>
    <?php
    $fragments['div.bella_popup' ] = ob_get_clean();
    return $fragments;

}



?>


