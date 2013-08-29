<?php
/**
 * Template Name: Home Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage seenonline
 * @since Twenty Eleven 1.0
 */
get_header(); ?>

 <section class="topSlider">
  		<div class="banner1">
        	
            <div class="container">
            	<div class="container-fluid">
                	<div class="row-fluid">
        				   <div class="span8">
                           <!-- Slider --->
                        	<div class="slider">	
                          <ul class="main_slider">
								 <?php
                                 $args_slider = array(
                                'numberposts' => -1,
                                'orderby' => 'post_date',
                                'order' => 'DESC',
                                'post_type' => 'slider',
                                'post_status' => 'publish',
                                'suppress_filters' => true );
                            
                                $recent_slider = wp_get_recent_posts( $args_slider, $output = ARRAY_A );
                                foreach($recent_slider as $k => $v):  
                                    $img = wp_get_attachment_url(get_post_thumbnail_id( $v['ID'] ) );
                                 ?>
                                        <li><img alt="<?php echo $v['post_title']; ?>" src="<?php echo $img; ?>" /></li>
                                                        
                                 <?php endforeach; ?>
						</ul>
                            </div>
                        </div>   
                        <!-- Slider Content --->
                        <div class="span4">
                        	<div class="slider_contnet">
                            <h3 class="sliderHeading">Welcome to rtPanel</h3>
							<img class="alignleft" src="<?php  bloginfo( 'stylesheet_directory' ); ?>/images/welcomenote-default-user-img.jpg" alt="">
                                <?php $data =  get_page(8);?>
                              <p><?php echo $data->post_content ?></p>
                              <a href="<?php echo get_permalink($data->ID) ?>" title="Read More">Read More...</a>
                        	</div>
                        </div>      	
                    </div>
                </div>
            </div>
            
        </div>
  </section>  
 
<!--- Top Slider Over --->  
	
     <section class="middleSlider">
  		<div class="banner2">
        	
            <div class="container">
            	<div class="container-fluid">
                	<div class="row-fluid">
                    	
                        <div class="sliderTitle"><h3></h3></div>
                            
                          <div class="scrollerTop">
                           <ul class="bxslider">
  								
              
          <?php
	 $args = array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'video',
    'post_status' => 'publish',
    'suppress_filters' => true );

    $recent_video = wp_get_recent_posts( $args, $output = ARRAY_A );
	
//	echo $meta_values = get_post_meta( 54,"video", true  );
	foreach($recent_video as $k => $v):
			$videoEmbed = '<iframe width="560" height="315" src="'.  $v['post_content'] .'" frameborder="0" allowfullscreen></iframe>';
			$doc = new DOMDocument();
			$doc->loadHTML($videoEmbed);

		   $src = $doc->getElementsByTagName('iframe')->item(0)->getAttribute('src'); 
			preg_match("/[^\/]+$/",$src, $matches);
		    $last_word = $matches[0];  ?>
            <li>
           <div id="<?php echo $last_word ?>" style="display:none;">
<iframe width="560" height="315" src="<?php echo $v['post_content']; ?>"  allowfullscreen></iframe>
</div>

<a href="#TB_inline?height=315&width=560&inlineId=<?php echo $last_word ?>" class="thickbox"    title="My YouTube Video">
 <img src="http://img.youtube.com/vi/<?php echo $last_word ?>/0.jpg" /></a>
 </li>
 	<?php endforeach; ?>
								</ul>
                            </div>
                        
                    </div>
                </div>
            </div>
            

            
        </div>
  </section>
    
  <!--- Middle scroller over --->
  
  <!--- Main Content ---> 
  	
    <section class="mainContent">
  		
        	
            <div class="container">
            	<div class="container-fluid">
                	<div class="row-fluid">
        				
                        <div class="topContent">
                        	<!--- Glimpses of Exhibition ---> 
                            <div class="span8 glymphs_border_rite">
                            	
                                <div class="glymphs">
                                
                                	<div class="glymphsTitle"><h3>Glimpses of Exhibition</h3></div>

                                    <div class="glymphContent">

										<div class="span12 glymphs_border">
                                                  <?php
								$args_sports = array(
								'post_type'=> 'sports',
								'order'    => 'DESC',
								'posts_per_page' => -1
							);
							$recent_sports = query_posts( $args_sports );

					$i = 1;
					foreach($recent_sports as $k => $v) :
					   
						$img = wp_get_attachment_image_src(get_post_thumbnail_id( $v->ID ) );
					 ?>                               	
							<div class="span3" <?php if($i == 5){ ?> style="padding-left:0px; margin-left:0px !important" <?php } ?>>
									  <div class="glymphImg"><img src="<?php echo $img[0]; ?>" alt=""></div>
						<div class="imgTitle"><a href="<?php echo home_url() ?>/sports/<?php echo $v->slug ?>"><?php echo $v->post_title; ?></a></div>
								</div>
					<?php 
					$i++;
					endforeach; ?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- News Section -->
                            <div class="span4">
                            	<div class="sidebarOne">
                                	
                                    <div class="sidebarTitle"><h3>News</h3></div>
                                    <div class="news_contnet glymphImg bor_non">
                                    <img src="<?php bloginfo( 'template_url' ); ?>/images/news-default-img.jpg" />
                                    <div class="content_news">
                                    <?php $p = query_posts('orderby=rand&showposts=1'); 
									?>

 									<p><?php echo $p[0]->post_title; ?></p>
                                     
                                    <?php  get_the_date( $d ) ?>
                                    	<span><?php echo date('F, d, Y', strtotime($p[0]->post_date)) ?></span>
                                     <!-- <span>November,4,2013</span>-->
                                      </div>
                                      <div class="cls"></div>
                                    </div>
      						 <div id="loading"></div>
                             <div id="container_news1">
            						<div class="data"></div>
            						
       						 </div>
                                    
                                    
                                </div>
                            </div>
                        	
                        </div>
                        
                        <div class="clearfix"></div>
<!--- Content Top Over  ------>
                       
                        <div class="btmContent">
                        	<!--- Twittwe Widget  ------>
                            <div class="span4">
                            	
                                <div class="news">
                                	
                                   <div class="newsTitle"><h3>Latest Tweets</h3></div>
                                    
                                    <div class="newsContent">
                                    
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Tweeter Widget') ) : ?>
      <?php endif; ?>
                                    	
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <!--- Facebook Widget  ------>
                            <div class="span4">
                            	<div class="followus">
                                	<div class="followTitle"><h3>Follow us on Facebook</h3></div>
                                    <div class="followContent">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Facebook Widget') ) : ?>
      <?php endif; ?>
                                    	
                                    </div>
                                </div>
                            </div>
                            <!--- Weather Widget  ------>
                            <div class="span4">
                            	
                                <div class="weather">
                                	<div class="weatherTitle"><h3>Weather</h3></div>
                                    <div class="weatherContent">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Weather Widget') ) : ?>
      <?php endif; ?>
                             
                                    </div>
                                </div>
                                
                                <div class="time">
                                	
                                    <div class="sliderTitle"><h3>Date and Time</h3></div>
                                    
                                    <div class="timeContent">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Date Time Widget') ) : ?>
      <?php endif; ?>	
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
<div class="clearfix"></div>
<!--- Content Bottom Over  ------>
<!--- Our Partners  ------>
                      <div class="bottomSlider">
                            
                            <div class="sliderTitle"><h3>Our Partners</h3></div>
                            
                            <div class="scrollerBtm">
                            	<ul class="bxslider">
                          <?php
							 $args_partner = array(
							'numberposts' => -1,
							'orderby' => 'post_date',
							'order' => 'DESC',
							'post_type' => 'partner',
							'post_status' => 'publish',
							'suppress_filters' => true );

    $recent_partner = wp_get_recent_posts( $args_partner, $output = ARRAY_A );
	
	foreach($recent_partner as $k => $v) :
		$img = wp_get_attachment_image_src(get_post_thumbnail_id( $v['ID'] ) );
	 ?> 
  										<li><img src="<?php echo $img[0]; ?>" /></li>
    <?php endforeach; ?>
                                       
								</ul>
                            </div>
                      </div>

                                    	
                    </div>
                </div>
            </div>
            
            
  </section>
  
  <!--- Main Content Over --->      
 

<?php get_footer(); ?>