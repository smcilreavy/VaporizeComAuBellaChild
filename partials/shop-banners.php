<?php // Exit if accessed directly

if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<?php  global $bella_options; $pageid=get_the_ID();?>

<?php $page_setting_activate=get_post_meta( $pageid, 'bella_pagetitle_activate',true);  

 if(isset($page_setting_activate) && $page_setting_activate=='on') :    

          $page_shop_banner=get_post_meta( $pageid, 'bella_shop_banner',true); 

 else:

  $page_shop_banner='';



 endif; 

if( $page_shop_banner=='' ) : ?>

  <section class="page-section no-padding-top">   

      <div class="container">

          <div class="row blocks shop-info-banners er">

         <?php if(isset($bella_options['banner-1'])&& $bella_options['banner-1']!='' && isset($bella_options['banner-1_text']) && $bella_options['banner-1_text']!='' ):?>

         <?php if( $bella_options['banner-2']!=''&& $bella_options['banner-2_text']!='' &&  $bella_options['banner-3']!='' && $bella_options['banner-3_text']!='') : ?> 

            <div class="col-md-4">

          <?php endif;?>

           <?php if( $bella_options['banner-2']==''|| $bella_options['banner-2_text']=='' ||  $bella_options['banner-3']=='' || $bella_options['banner-3_text']=='') : ?> 

              <div class="col-md-12">

          <?php endif;?>

          <?php if(( $bella_options['banner-2']!='' && $bella_options['banner-2_text']!=''&&  $bella_options['banner-3']=='') || (  $bella_options['banner-3']!='' && $bella_options['banner-3_text']!='' && $bella_options['banner-2']=='')) : ?> 

             <div class="col-md-6">

                 <?php endif;?>             
<a href="#" >
                  <div class="block">

                      <div class="media">

                          <div class="pull-right"><?php if(isset($bella_options['banner-1_icon']) && $bella_options['banner-1_icon']!='')?>

                            <i class="fa fa-<?php echo esc_attr($bella_options['banner-1_icon']);?>"></i></div>

                          <div class="media-body">

                            <h4 class="media-heading"><?php echo esc_attr($bella_options['banner-1']); ?></h4>                 

                            <?php  echo wp_kses_post($bella_options['banner-1_text']); ?>

                          </div>

                      </div>

                  </div>
				 </a>

              </div>

             

          <?php endif; ?> 

                

               <?php if(isset($bella_options['banner-2'])&& $bella_options['banner-2']!='' && isset($bella_options['banner-2_text']) && $bella_options['banner-2_text']!='') :  ?> 

                  <?php if( $bella_options['banner-1']!=''&& $bella_options['banner-1_text']!='' &&  $bella_options['banner-3']!='' && $bella_options['banner-3_text']!='') : ?> 

                    <div class="col-md-4">

                    <?php endif;?>

                 <?php if( $bella_options['banner-1']==''|| $bella_options['banner-1_text']=='' ||  $bella_options['banner-3']=='' || $bella_options['banner-3_text']=='') : ?> 

                    <div class="col-md-12">

                     <?php endif;?>

                <?php if(( $bella_options['banner-1']!='' && $bella_options['banner-1_text']!='' &&  $bella_options['banner-3']=='') || (  $bella_options['banner-3']!='' && $bella_options['banner-3_text']!='' && $bella_options['banner-1']=='')) : ?> 

                  

                    <div class="col-md-6">

                 <?php endif;?>

              

                  <div class="block">

                      <div class="media">

                          <div class="pull-right">

                            <?php if(isset($bella_options['banner-2_icon']) && $bella_options['banner-2_icon']!='')?>

                            <i class="fa fa-<?php echo esc_attr($bella_options['banner-2_icon']);?>"></i></div>

                          <div class="media-body">

                            <h4 class="media-heading"><?php echo esc_attr($bella_options['banner-2']); ?></h4>

                            <?php  echo wp_kses_post($bella_options['banner-2_text']); ?>

                         </div>

                      </div>

                  </div>

              </div>

              

              <?php endif; ?> 

             <?php if(isset($bella_options['banner-3'])&& $bella_options['banner-3']!='' && isset($bella_options['banner-3_text']) && $bella_options['banner-3_text']!='') :  ?> 

                    <?php if( $bella_options['banner-2']!=''&& $bella_options['banner-2_text']!='' &&  $bella_options['banner-1']!='' && $bella_options['banner-1_text']!='') : ?> 

                    <div class="col-md-4">

                    <?php endif;?>   

             		<?php if( $bella_options['banner-1']==''|| $bella_options['banner-1_text']=='' ||  $bella_options['banner-2']=='' || $bella_options['banner-2_text']=='') : ?> 

                   <div class="col-md-12">

                     <?php endif;?>

                	<?php if((  $bella_options['banner-1']!=''&& $bella_options['banner-1_text']!='' &&  $bella_options['banner-2']=='') || (  $bella_options['banner-2']!=''&& $bella_options['banner-2_text']!='' && $bella_options['banner-1']=='')) : ?> 

                  

                    <div class="col-md-6">

                 <?php endif;?>

                  <div class="block">

                      <div class="media">

                          <div class="pull-right"> <?php if(isset($bella_options['banner-3_icon']) && $bella_options['banner-3_icon']!='')?>

                            <i class="fa fa-<?php echo esc_attr($bella_options['banner-3_icon']);?>"></i></div>

                          <div class="media-body">

                           <h4 class="media-heading"><?php echo esc_attr($bella_options['banner-3']); ?></h4>

                            <?php  echo wp_kses_post($bella_options['banner-3_text']); ?>

                         </div>

                      </div>

                  </div>

              </div>

         

        

          <?php endif; ?> 

        </div>

      </div>

  </section>

<?php endif;?>

        











