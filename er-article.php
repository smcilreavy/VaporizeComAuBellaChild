<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>
<?php  global $flagfooter ; $check_quote=0;?>

    <?php if(!is_single()):?>  
        <article  <?php post_class("post-wrap"); ?>>
    <?php  else:   ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("post-wrap post-single"); ?>>
    <?php endif;?>
     <!-- here went media --> 
    <?php if(bella_detect_woocommerce()!=true ) : ?>                  
    <div class="post-header">
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         
		
   
     
    </div>
    <?php endif;?>
     <?php if ($check_quote==0) : ?>
        <div class="post-body">
            <div class="post-excerpt">
            <?php // If displaying a single post or a page
            if (is_single() OR is_page()) :

            if(has_post_format('gallery')):
                $postContentStr = apply_filters('the_content', strip_shortcodes($post->post_content));
                echo wp_kses_post($postContentStr);
            else:
                the_content(); ?>


            <?php endif;

            wp_link_pages(array(
            'next_or_number' => 'number',
            'nextpagelink' => __('Next page', 'dikka'),
            'previouspagelink' => __('Previous page', 'dikka'),
            'pagelink' => '%',
            'link_before' => '<span class="ft-btn">',
            'link_after' => '</span>',
            'before' => '<div class="clearfix"></div>' . __('Pages:', 'dikka') . ' <div class="ft-article-pages">',
            'after' => '</div>'
            ));

            else :
                
                    the_excerpt ();
            endif; ?>  
            </div>
        </div>
      <?php endif; ?>
      
	  <!--
	  <?php// if (!is_single() && (bella_detect_woocommerce()!=true)):?>
            <div class="post-footer">
                <span class="post-read-more"><a href="<?php// echo the_permalink();?>" class="btn btn-theme btn-theme-transparent btn-icon-left"><i class="fa fa-file-text-o"></i><?php// _e('Read more','dikka')?></a></span>
            </div>
      <?php// endif;?>
	  -->
	  
     </article>     
