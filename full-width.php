<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<!DOCTYPE html>
<?php
global $bella_options;
 ?>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<?php if(isset($bella_options['meta_author']) && $bella_options['meta_author']!='') : ?>
<meta name="author" content="<?php echo esc_attr($bella_options['meta_author']); ?>">	
<?php else: ?>
<meta name="author" content="<?php esc_attr(bloginfo('name')); ?>">
<?php endif; ?>
<?php if(isset($bella_options['meta_author']) && $bella_options['meta_desc']!='') : ?>
<meta name="description" content="<?php echo esc_attr($bella_options['meta_desc']); ?>">	
<?php endif; ?>
<?php if(isset($bella_options['meta_author']) && $bella_options['meta_keyword']!='') : ?>
<meta name="keyword" content="<?php echo esc_attr($bella_options['meta_keyword']); ?>">	
<?php endif; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0">
<title><?php wp_title( '|', true, 'right' );?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(isset($bella_options['favicon']['url'])) :  ?>
<link rel="shortcut icon" href="<?php echo esc_url($bella_options['favicon']['url']); ?>">
<?php endif; ?>

<?php
// WordPress Head
wp_head();
$class='';
?>
</head> 
<!-- BEGIN BODY -->
<?php if(is_page_template('bella-page-builder-simple-header.php') ) $class=' coming-soon';?>
<?php if($bella_options['theme_layout']=='1') $layout='wide'; else $layout='boxed'; ?>
<body id="er_home" <?php body_class($layout.$class); ?>>
<?php if ( isset($bella_options['preloader']) && $bella_options['preloader'] == 1 ) : ?> 
	<div id="preloader">
	    <div id="preloader-status">
	        <div class="spinner">
	            <div class="rect1"></div>
	            <div class="rect2"></div>
	            <div class="rect3"></div>
	            <div class="rect4"></div>
	            <div class="rect5"></div>
	        </div>
	        <?php if($bella_options['preloader-title']==1): ?>
	        	<div id="preloader-title"><?php echo esc_attr(get_bloginfo('name')); ?></div>
	        <?php else:?>
	        	<div id="preloader-title"><?php _e('Loading','bella')?></div>
	   		<?php endif; ?>	        
	    </div>
	</div>	
<?php endif ; ?>

  	
<!-- WRAPPER -->
<div class="wrapper">

<?php
 // Navbar
get_template_part('partials/navbar');?>
<!-- CONTENT AREA -->



	

<?php

/* Template Name: Full Width Banner */

 ?>	





<!-- dynamic post goes heere -->
<section id="er_page_custom" class="page-section with-sidebar">
	<div class="col-md-12" id="er_custom_banner_page">
		<?php the_post_thumbnail('post-image', array('class' => 'img-thumbnail')); ?>		
	</div> <!-- end er_custom_banner_page -->





	<div class="container">
		<div class="row">
			<div class="col-md-12 content" id="content">                           
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('er-article'); ?>
                    <?php endwhile; ?>
                    <?php if ($wp_query->max_num_pages>1) : ?>                   
                      <?php bella_pagination(); ?>              
                    <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>
            </div>	
			
		</div> <!-- end row -->
	</div> <!-- end container -->
</section>






<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>       
<?php  global $bella_options; ?>
    <!--content-area-->
      <?php if(!is_page_template('bella-page-builder-simple-header.php')):?>
      <footer class="footer">
       <div class="footer-widgets" <?php if(isset($bella_options['footer-on']) && $bella_options['footer-on']!=1) echo 'style="display:none;"';?>>
            <!-- BEGIN BOTTOM FOOTER -->
            <div class="container">
                <?php get_template_part('partials/footer-layout'); ?>
                        
            </div>

          <!-- <p id="back-top"><a href="#home"><i class="fa fa-angle-up"></i></a></p>  -->     
       </div>
       
       <div class="footer-meta" <?php if(isset($bella_options['secondfooter-on']) && $bella_options['secondfooter-on']!=1) echo 'style="display:none;"';?> >
                                  
       		<div class="container">
	            <?php if(isset($bella_options['footer-logo']['url']) && $bella_options['footer-logo']['url']!='') :  ?> 
	            <!-- BEGIN: LOGO FOOTER -->
	            <div class="logo-footer">
	                 <img src="<?php echo esc_url($bella_options['footer-logo']['url']); ?>" data-at2x="<?php echo esc_url($bella_options['footer-retinalogo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
	                 
	                 <ul class="contacts-footer">
	                    <?php if(isset($bella_options['footer-email']) && $bella_options['footer-email']!='') :  ?> 
	                 	<li><i class="fa fa-envelope-o"></i> <?php echo esc_attr($bella_options['footer-email']); ?></li> 
	                    <?php endif; ?>
	                    <?php if(isset($bella_options['footer-phone']) && $bella_options['footer-phone']!='') :  ?> 
	                 	<li><i class="fa fa-phone"></i> <?php echo esc_attr($bella_options['footer-phone']); ?></li>
	                    <?php endif; ?>
	                 
	                 </ul>
	                 
	            </div><!--logo footer-->
	            <?php endif; ?>
                  <div class="row">

                            <div class="col-sm-6">
                             <?php if(isset($bella_options['footer_text'])) :  ?> 
                                <div class="copyright">
                                <?php  echo wp_kses_post($bella_options['footer_text']); ?>
                                </div>
                        <?php endif; ?>
                            </div>
                        <?php if (isset($bella_options['visa-icons'])) : ?> 
                            <div class="col-sm-6">
                                <div class="payments">
                                    <ul>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/visa.jpg'?>" alt=""/></li>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/mastercard.jpg'?>" alt=""/></li>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/paypal.jpg'?>" alt=""/></li>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/american-express.jpg'?>" alt=""/></li>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/visa-electron.jpg'?>" alt=""/></li>
                                        <li><img src="<?php echo get_template_directory_uri().'/assets/img/preview/payments/maestro.jpg'?>" alt=""/></li>
                                    </ul>
                                </div><!--payments-->
                            </div><!--col-sm-6-->
                        <?php endif;?>

                </div><!--row-->
                
	             
	        </div>
	        <!-- END CONTAINER -->
	   </div><!-- END BOTTOM FOOTER -->
	  </footer>
        <!--End Footer-->
      <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
     <?php endif;?>
</div><!--wrapper-->
    <?php if(isset($bella_options['meta_javascript']) && $bella_options['meta_javascript']!='') 
    echo $bella_options['meta_javascript']; ?>  
    <?php wp_footer(); ?>
    
    </body>
</html>