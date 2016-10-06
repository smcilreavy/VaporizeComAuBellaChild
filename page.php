<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<section class="page-section with-sidebar">
    <div class="container">
        <?php if(!bella_detect_woocommerce()): ?>
            <div class="row"> 
        <?php endif;?>
    
        <?php if(bella_detect_woocommerce()==true ) : ?>                                
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('partials/article'); ?>                           
                <?php endwhile; ?>
                <?php if ($wp_query->max_num_pages>1) : ?>                   
                  <?php bella_pagination(); ?>              
                <?php endif; ?>
                <?php else : ?>
                    <?php get_template_part('partials/nothing-found'); ?>
            <?php endif; ?> 

        <?php else:?>
            <?php if(esc_attr($bella_options['page-layout'])=='1'): ?>
                <?php if ( is_active_sidebar( 'bella-widgets-aside-right' ) ) { ?>
                    <aside class="col-md-3 sidebar" id="sidebar">             
                        <?php dynamic_sidebar( 'bella-widgets-aside-right' );  ?>                  
                    </aside>                        
                <?php } ?>                
            <?php endif;?>
             <div class="col-md-9 content" id="content">                           
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('partials/article'); ?>
                        <?php if ($bella_options['article_related'] == 1) get_template_part('partials/article-related'); ?>
                        <?php if ($bella_options['article_author'] == 1) get_template_part('partials/article-author'); ?>
						
						<div id="er_tag">
							<i class="fa fa-tags"></i><?php _e('Tags', 'bella'); ?> <?php the_tags(','); ?></li>
						</div>
						
                        <?php comments_template( '', true ); ?>
                    <?php endwhile; ?>
                    <?php if ($wp_query->max_num_pages>1) : ?>                   
                      <?php bella_pagination(); ?>              
                    <?php endif; ?>
                    <?php else : ?>
                        <?php get_template_part('partials/nothing-found'); ?>
                <?php endif; ?>
            </div>
            <?php if(esc_attr($bella_options['page-layout'])=='2'): ?>
                <?php if ( is_active_sidebar( 'bella-widgets-aside-right' ) ) { ?>
                    <aside class="col-md-3 sidebar" id="sidebar">             
                        <?php dynamic_sidebar( 'bella-widgets-aside-right' );  ?>                  
                    </aside>                        
                <?php } ?> 
            <?php endif;?>
        <?php endif;?>
            
         <?php if(!bella_detect_woocommerce()): ?>
            </div>
        <?php endif;?>
    </div>
</section>
<?php if(bella_detect_woocommerce()==true ) 
    get_template_part('woocommerce/single-product/shop-banners');
?>

<?php get_footer(); ?>