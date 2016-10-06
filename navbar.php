<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php  
    global $bella_options;
    global $post;
    if(is_home()){
        $pageid=get_option('page_for_posts');
    } else {
        $pageid=get_the_ID();
    }
    
    if($menu=get_post_meta( $pageid, 'bella_menu_select',true)){
    $menu_object = get_term_by('term_taxonomy_id',$menu[0] , 'nav_menu');
    }
    global $woocommerce;

?>
<?php if(is_page_template('bella-page-builder-simple-header.php')):?>
 <header class="header fixed">
        <div class="header-wrapper">
            <div class="container">
                <!-- Logo -->
                 <div class="logo">
                     <?php if (isset($bella_options['logo']) && $bella_options['logo']['url']!='') : ?>
                        <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <img src="<?php echo esc_url($bella_options['logo']['url']); ?>"  data-at2x="<?php echo esc_url($bella_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                        </a>
                    <?php else :?>          
                        <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="name">
                            <?php echo esc_attr(get_bloginfo('name')); ?><br>     
                        </a>         
                    <?php endif; ?>            
                </div>
                <!-- /Logo -->
            </div>
        </div>
        <div class="navigation-wrapper">
            <div class="container">
                <!-- Navigation -->

                <!-- /Navigation -->
            </div>
        </div>
    </header>
<?php else:?>
<?php if (!empty($bella_options['topbar']) && $bella_options['topbar']==1) : ?>     
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <ul class="list-inline">
                                   
                     <?php if (!empty($bella_options['topbar-email'])) : ?><li><a href="mailto:<?php echo esc_attr($bella_options['topbar-email']); ?>"><i class="fa fa-envelope"></i><span><?php echo esc_attr($bella_options['topbar-email']); ?></span></a></li><?php endif; ?> 
                     <!-- BEGIN: WPML MENU -->  

					<li>
						<!-- Phone no. -->
						<div id="er_phone_no">
							<img src="<?php bloginfo('template_directory'); ?>../tel.png" />
							<a href="tel:(02)80033420">
								<?php if (is_active_sidebar('top-bar-phone-number')) dynamic_sidebar('top-bar-phone-number'); ?>
							</a>
						</div>
					</li>
					
                    <li class="dropdown currency">
                       <?php do_action('icl_language_selector'); ?> 
                    </li>
					
                </ul>
				
				
				
            </div>
        <?php
        if(isset($menu_object) && is_object($menu_object)){
            $args = array(
            'menu'            => $menu_object->slug,
            'items_wrap' => '<div class="top-bar-right "><ul class="list-inline">%3$s</ul></div>',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu()',
            'walker'  => new description_walker()
            );
            } else {
            $args = array(
            'theme_location' => 'primary',
            'items_wrap' => '<div class="top-bar-right"><ul class="list-inline">%3$s</ul></div>',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu()',
            'walker'  => new description_walker()

            );
        }
        wp_nav_menu($args);?>
        </div>
    </div>      
<?php endif; ?>          
          
 <header class="header <?php echo $bella_options['header']? '':'fixed';?>">
    <div class="header-wrapper">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                 <?php if (isset($bella_options['logo']) && $bella_options['logo']['url']!='') : ?>
                    <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <img src="<?php echo esc_url($bella_options['logo']['url']); ?>"  data-at2x="<?php echo esc_url($bella_options['retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </a>
                <?php else :?>          
                    <a href="<?php echo esc_url(site_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="name">
                        <?php echo esc_attr(get_bloginfo('name')); ?><br>     
                    </a>         
                <?php endif; ?>            
            </div>
            <!-- /Logo -->
            <!-- Header search -->              
            <?php if (isset($bella_options['search']) && $bella_options['search'] == 1):?>
                <div class="header-search">
                    <form method="get" id="searchform_top" autocomplete="off" action="<?php echo esc_url(home_url( '/' )); ?>">
                        <input class="form-control" name="s" type="text" placeholder="What are you looking for?"/>
                        <button><i class="fa fa-search"></i></button>  
                    </form>
                </div>
            <?php endif; ?>
            <!-- /Header search -->
            <!-- Header shopping cart -->
             <?php if (isset($bella_options['cart']) && $bella_options['cart'] == 1 &&  is_plugin_active('woocommerce/woocommerce.php') ) :?>
             <!-- Popup: Shopping cart items -->
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
				                                $bella_short_product_title = (strlen($bella_product_title) > 28) ? substr($bella_product_title, 0, 25) . '...' : $bella_product_title;
				                                echo '<h4 class="media-heading item-title"><a href="'.get_permalink($cart_item['product_id']).'">' .$cart_item['quantity'].''.__('x ', 'bella'). apply_filters('woocommerce_cart_widget_product_title', $bella_short_product_title, $_product) . '</a></h4>';?>
				                                <?php echo '<p class="item-desc">'.$_product->get_categories(', ','','').'</p>';?>
				                            </div>  
				                        </div>
				                        <?php endif; 
				                        endforeach;?>                                         
				                        <?php else: echo __('No products in the cart.','bella'); endif;?>  
				                        <div class="media">
				                            <p class="pull-right item-price"><?php echo $woocommerce->cart->get_cart_total(); ?></p>
				                            <div class="media-body">
				                                <h4 class="media-heading item-title summary"><?php _e('Subtotal', 'bella'); ?></h4>
				                            </div>
				                        </div>                                     
				                        <div class="media">
				                            <div class="media-body">
				                                <div>
				                                     <!-- <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal"><?php _e('Close', 'bella'); ?></a>
				                                  <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="btn btn-theme btn-theme-transparent btn-call-checkout"><?php _e('Checkout', 'bella'); ?></a>  -->       
				                                </div>
				                            </div>
				                        </div>  
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
			
				<!-- /Popup: Shopping cart items -->
            <div class="header-cart">
                <div class="cart-wrapper">
                 <?php if (is_plugin_active('yith-woocommerce-wishlist/init.php') && function_exists( 'YITH_WCWL' )) :global $wishlist_url;
                       $wishlist_url = YITH_WCWL()->get_wishlist_url();?> 
              <a href="<?php echo esc_url($wishlist_url);?>" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-heart"></i></a>
                 <?php endif; 
                 if (is_plugin_active('yith-woocommerce-compare/init.php')) :  ?>
                    <a href="/?action=yith-woocompare-view-table&iframe=true" class="yith-woocompare-open btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>                   
                <?php endif;?>   
                <?php  if(!empty($cart_item['data']))
                    $_product = $cart_item['data']; ?>
                        <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> <?php echo WC()->cart->cart_contents_count ;?><?php _e(' item(s) - ','bella')?><?php echo $woocommerce->cart->get_cart_total(); ?> </span> <i class="fa fa-angle-down"></i></a>
                        <!-- Mobile menu toggle button -->
                        <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                        <!-- /Mobile menu toggle button -->                   
                </div>
            </div>
          </div>
            <!-- Header shopping cart -->
             <?php endif; ?>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
        <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                <?php
                $args = array(
                'theme_location' => 'secondary',
                'container' => false,
                'items_wrap' => '<ul class="nav sf-menu">%3$s</ul>',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu()',
                'walker'  => new Bella_Menu_Walker()
                );
                wp_nav_menu($args);?>
            </nav>
        <!-- /Navigation -->
        </div>
    </div>
</header>
<!-- /HEADER -->          
<?php endif;?>

  
  



