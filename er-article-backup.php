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
         
		<!--
        <div class="post-meta">
            <?php// _e('By ','bella')?><a href="<?php// echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php //echo get_the_author() ?></a><?php// _e(' / ','bella')?> 
            <?php// echo get_the_date('jS M Y') ?><?php _e(' / in ','bella')?>
            <?php// if (get_the_category()) : ?>                        
                <?php// the_category(',');
            //endif; ?><?php// _e(' / ','bella')?>
            <a href="<?php// the_permalink(); ?>">
                <?php// echo get_comments_number(); 
               // if (get_comments_number()>1): echo ' comments';
                //else: echo ' comment'; endif;?> 
            </a> 
        </div>
       --> 
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
<br>
<!--
<i class="fa fa-tags"></i><?php// _e('Tags', 'bella'); ?> <?php// the_tags(','); ?></li>
-->
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
      <?php if (!is_single() && (bella_detect_woocommerce()!=true)):?>
            <div class="post-footer">
                <span class="post-read-more"><a href="<?php echo the_permalink();?>" class="btn btn-theme btn-theme-transparent btn-icon-left"><i class="fa fa-file-text-o"></i><?php _e('Read more','dikka')?></a></span>
            </div>
      <?php endif;?>
     </article>     
