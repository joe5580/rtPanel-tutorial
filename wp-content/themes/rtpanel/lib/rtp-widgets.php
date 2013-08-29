<?php
/**
 * rtPanel Custom Widgets
 *
 * A small 'icing on cake' ;)
 *
 * @package rtPanel
 * @since rtPanel 2.0
 */

/**
 * Custom Widget for FeedBurner RSS Subscription and Social Share
 *
 * @since rtPanel 2.0
 */
class rtp_subscribe_widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     *
     * @since rtPanel 2.0
     **/
    function rtp_subscribe_widget() {
        $widget_ops = array( 'classname' => 'rtp-subscribe-widget-container', 'description' => __( 'Widget for email subscription form and Social Icons such as Facebook, Twitter, etc.', 'rtPanel' ) );
        $this->WP_Widget( 'rt-subscribe-widget', __( 'rtPanel: Subscribe Widget', 'rtPanel' ), $widget_ops );
    }

    /**
     * Outputs the HTML
     *
     * @param array An array of standard parameters for widgets in this theme
     * @param array An array of settings for this widget instance
     * @return void Echoes it's output
     *
     * @since rtPanel 2.0
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        $title = empty(  $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
        $label = empty( $instance['label'] ) ? '' : $instance['label'];
        $button = empty( $instance['button'] ) ? __( 'Subscribe', 'rtPanel' ) : $instance['button'];
        $sub_link = empty ( $instance['sub_link'] ) ? '' : $instance['sub_link'];
        $facebook_link = empty ( $instance['facebook_link'] ) ? '' : $instance['facebook_link'];
        $twitter_link = empty ( $instance['twitter_link'] ) ? '' : $instance['twitter_link'];
        $google_link = empty ( $instance['google_link'] ) ? '' : $instance['google_link'];
        $rss_link = empty ( $instance['rss_link'] ) ? '' : $instance['rss_link'];
        $linkedin_link = empty ( $instance['linkedin_link'] ) ? '' : $instance['linkedin_link'];
        $myspace_link = empty ( $instance['myspace_link'] ) ? '' : $instance['myspace_link'];
        $stumbleupon_link = empty ( $instance['stumbleupon_link'] ) ? '' : $instance['stumbleupon_link'];
        $rtp_link_target = isset( $instance['rtp_link_target'] ) ? $instance['rtp_link_target'] : true;
        $rtp_subscription_show = isset( $instance['rtp_show_subscription'] ) ? $instance['rtp_show_subscription'] : true;
        $rtp_facebook_show = isset( $instance['rtp_show_facebook'] ) ? $instance['rtp_show_facebook'] : true;
        $rtp_google_show = isset( $instance['rtp_show_google'] ) ? $instance['rtp_show_google'] : true;
        $rtp_twitter_show = isset( $instance['rtp_show_twitter'] ) ? $instance['rtp_show_twitter'] : true;
        $rtp_rss_show = isset( $instance['rtp_show_rss'] ) ? $instance['rtp_show_rss'] : true;
        $rtp_linkedin_show = isset( $instance['rtp_show_linkedin'] ) ? $instance['rtp_show_linkedin'] : true;
        $rtp_myspace_show = isset( $instance['rtp_show_myspace'] ) ? $instance['rtp_show_myspace'] : true;
        $rtp_stumbleupon_show = isset( $instance['rtp_show_stumbleupon'] ) ? $instance['rtp_show_stumbleupon'] : true;
        $no_options = 0;

        echo $before_widget;
        if ( $title )
          echo $before_title . $title . $after_title; ?>

        <div class="email-subscription-container"><!-- email-subscription-container begins -->
        <?php
            if ( $rtp_subscription_show && $sub_link ) {
                $no_options++; ?>
                <form onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $sub_link; ?>', 'popupwindow', 'scrollbars=yes,width=700px,height=700px' ); return true" target="popupwindow" method="post" action="http://feedburner.google.com/fb/a/mailverify" class="clearfix">
                    <p><?php 
                        if ( $label ) { ?>
                            <label for="email"><?php echo $label; ?></label><?php
                        } ?>
                        <input id="email" type="email" required="required" name="email" placeholder="<?php _e( 'Enter Email Address', 'rtPanel' ); ?>" class="email" title="<?php _e( 'Enter Email Address', 'rtPanel' ); ?>" size="15" />
                        <input type="hidden" aria-hidden="true" name="uri" value="<?php echo $sub_link; ?>" />
                        <input type="hidden" aria-hidden="true" value="en_US" name="loc" />
                        <input type="submit" value="<?php echo $button; ?>" title="<?php echo $button; ?>" class="btn" />
                    </p>
                </form><?php
            }

            $target = ( $rtp_link_target ) ? ' target="_blank"' : '';

            if ( ( $rtp_facebook_show && $facebook_link ) || ( $rtp_twitter_show && $twitter_link ) || ( $rtp_google_show && $google_link ) || ( $rtp_rss_show && $rss_link ) || ( $rtp_linkedin_show && $linkedin_link ) || ( $rtp_myspace_show && $myspace_link ) || ( $rtp_stumbleupon_show && $stumbleupon_link ) ) {
                $no_options++; ?>
                <ul role="list" class="social-icons clearfix"><?php
                    echo ( $rtp_facebook_show && $facebook_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="facebook" href="' . $facebook_link . '" title="' . __( 'Like Us on Facebook', 'rtPanel' ) . '">Facebook</a></li>' : '';
                    echo ( $rtp_twitter_show && $twitter_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="twitter" href="' . $twitter_link . '" title="' . __( 'Follow Us on Twitter', 'rtPanel' ) . '">Twitter</a></li>' : '';
                    echo ( $rtp_google_show && $google_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="google" href="' . $google_link . '" title="' . __( 'Add to Circle', 'rtPanel' ) . '">Google</a></li>' : '';
                    echo ( $rtp_rss_show && $rss_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="rss" href="' . $rss_link . '" title="' . __( 'Subscribe via RSS', 'rtPanel' ) . '">RSS</a></li>' : '';
                    echo ( $rtp_linkedin_show && $linkedin_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="linkedin" href="' . $linkedin_link . '" title="' . __( 'Connect via LinkedIn', 'rtPanel' ) . '">LinkedIn</a></li>' : '';
                    echo ( $rtp_myspace_show && $myspace_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="myspace" href="' . $myspace_link . '" title="' . __( 'Join Us on MySpace', 'rtPanel' ) . '">MySpace</a></li>' : '';
                    echo ( $rtp_stumbleupon_show && $stumbleupon_link ) ? '<li role="listitem"><a role="link" rel="nofollow"' . $target . ' class="stumbleupon" href="' . $stumbleupon_link . '" title="' . __( 'Stumble Us', 'rtPanel' ) . '">StumbleUpon</a></li>' : ''; ?>
                </ul><?php
            }

            if( !$no_options ) { ?>
            <p><?php printf( __( 'Please configure this widget <a href="%s" target="_blank" title="Configure Subscribe Widget">here</a>.', 'rtPanel' ), admin_url( '/widgets.php' ) ); ?></p><?php
            } ?>
        </div> <!-- end email-subscription-container -->
    <?php echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin
     *
     * @since rtPanel 2.0
     **/
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags ( $new_instance['title'] );
        $instance['label'] =  strip_tags ( $new_instance['label'] );
        $instance['button'] =  !empty( $new_instance['button'] ) ? strip_tags ( $new_instance['button'] ) : 'Subscribe';
        $instance['sub_link'] = !empty( $new_instance['sub_link'] ) ? $new_instance['sub_link'] : '';
        $instance['rss_link'] = esc_url_raw( $new_instance['rss_link'] );
        $instance['twitter_link'] = esc_url_raw( $new_instance['twitter_link'] );
        $instance['facebook_link'] = esc_url_raw( $new_instance['facebook_link'] );
        $instance['google_link'] = esc_url_raw( $new_instance['google_link'] );
        $instance['linkedin_link'] = esc_url_raw( $new_instance['linkedin_link'] );
        $instance['myspace_link'] = esc_url_raw( $new_instance['myspace_link'] );
        $instance['stumbleupon_link'] = esc_url_raw( $new_instance['stumbleupon_link'] );
        $instance['rtp_link_target'] = !empty( $new_instance['rtp_link_target'] ) ? 1 : 0;
        $instance['rtp_show_subscription'] = !empty( $new_instance['rtp_show_subscription'] ) ? 1 : 0;
        $instance['rtp_show_rss'] = !empty( $new_instance['rtp_show_rss'] ) ? 1 : 0;
        $instance['rtp_show_facebook'] = !empty( $new_instance['rtp_show_facebook'] ) ? 1 : 0;
        $instance['rtp_show_twitter'] =  !empty( $new_instance['rtp_show_twitter'] ) ? 1 : 0;
        $instance['rtp_show_google'] =  !empty( $new_instance['rtp_show_google'] ) ? 1 : 0;
        $instance['rtp_show_linkedin'] = !empty( $new_instance['rtp_show_linkedin'] ) ? 1 : 0;
        $instance['rtp_show_myspace'] = !empty( $new_instance['rtp_show_myspace'] ) ? 1 : 0;
        $instance['rtp_show_stumbleupon'] = !empty( $new_instance['rtp_show_stumbleupon'] ) ? 1 : 0;
        return $instance;
    }

    /**
     * Displays the form on the Widgets page of the WP Admin area
     *
     * @since rtPanel 2.0
     **/
    function form( $instance ) {
        $defaults = array( 'label' => 'Sign up for our email newsletter', 'button' => 'Subscribe', 'rtp_show_subscription' => '0', 'rtp_show_rss' => '0', 'rtp_show_facebook' => '0', 'rtp_show_twitter' => '0', 'rtp_show_google' => '0', 'rtp_show_linkedin' => '0', 'rtp_show_myspace' => '0', 'rtp_show_stumbleupon' => '0', 'rtp_link_target' => '1' );
        // update instance's default options
        $instance = wp_parse_args( (array) $instance, $defaults );
        
        $title = isset ( $instance['title'] ) ? esc_attr( ( $instance['title'] ) ) : '';
        $label = isset ( $instance['label'] ) ? esc_textarea( ( $instance['label'] ) ) : '';
        $button = isset ( $instance['button'] ) ? esc_attr( ( $instance['button'] ) ) : 'Subscribe';
        $sub_link = isset ( $instance['sub_link'] ) ? esc_attr( $instance['sub_link'] ) : '';
        $rss_link = isset ( $instance['rss_link'] ) ? esc_url( $instance['rss_link'] ) : '';
        $twitter_link = isset ( $instance['twitter_link'] ) ? esc_url( $instance['twitter_link'] ) : '';
        $facebook_link = isset ( $instance['facebook_link'] ) ? esc_url( $instance['facebook_link'] ) : '';
        $google_link = isset ( $instance['google_link'] ) ? esc_url( $instance['google_link'] ) : '';
        $linkedin_link = isset ( $instance['linkedin_link'] ) ? esc_url( $instance['linkedin_link'] ) : '';
        $myspace_link = isset ( $instance['myspace_link'] ) ? esc_url( $instance['myspace_link'] ) : '';
        $stumbleupon_link = isset ( $instance['stumbleupon_link'] ) ? esc_url( $instance['stumbleupon_link'] ) : '';

        $rtp_show_subscription = isset( $instance['rtp_show_subscription'] ) ? (bool) $instance['rtp_show_subscription'] :false;
        $rtp_show_rss = isset( $instance['rtp_show_rss'] ) ? (bool) $instance['rtp_show_rss'] :false;
        $rtp_show_facebook = isset( $instance['rtp_show_facebook'] ) ? (bool) $instance['rtp_show_facebook'] :false;
        $rtp_show_twitter = isset( $instance['rtp_show_twitter'] ) ? (bool) $instance['rtp_show_twitter'] :false;
        $rtp_show_google = isset( $instance['rtp_show_google'] ) ? (bool) $instance['rtp_show_google'] :false;
        $rtp_show_linkedin = isset( $instance['rtp_show_linkedin'] ) ? (bool) $instance['rtp_show_linkedin'] :false;
        $rtp_show_myspace = isset( $instance['rtp_show_myspace'] ) ? (bool) $instance['rtp_show_myspace'] :false;
        $rtp_show_stumbleupon = isset( $instance['rtp_show_stumbleupon'] ) ? (bool) $instance['rtp_show_stumbleupon'] :false;
        $rtp_link_target = isset( $instance['rtp_link_target'] ) ? (bool) $instance['rtp_link_target'] :false; ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'rtPanel' ); ?>: </label><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $title ); ?>" /></p>
        <p><strong><?php _e( 'FeedBurner RSS Subscription', 'rtPanel' ); ?>: </strong></p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_subscription' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_subscription' ); ?>" <?php checked( $rtp_show_subscription ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_subscription' ); ?>"><?php _e( 'Feedburner Subscription Handler', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'sub_link' ); ?>" name="<?php echo $this->get_field_name( 'sub_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $sub_link ); ?>" />
            <span class="description"><?php printf( __( 'Ex: %s would be the FeedBurner Subscription Handler for %s', 'rtPanel' ), '<strong><code>rtpanel</code></strong>', '<code>http://feeds.feedburner.com/<strong>rtpanel</strong></code>' ); ?></span>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'label' ); ?>"><?php _e( 'Feedburner Form Label', 'rtPanel' ); ?>: </label>
            <textarea class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id( 'label' ); ?>" name="<?php echo $this->get_field_name( 'label' ); ?>"><?php echo $label; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button' ); ?>"><?php _e( 'Feedburner Form Button', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button' ); ?>" name="<?php echo $this->get_field_name( 'button' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $button ); ?>" />
        </p>
        <p><strong><?php _e( 'Social Share', 'rtPanel' ); ?>:</strong></p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_rss' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_rss' ); ?>" <?php checked( $rtp_show_rss ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_rss' ); ?>"><?php _e( 'RSS Feed Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'rss_link' ); ?>" name="<?php echo $this->get_field_name( 'rss_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $rss_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_facebook' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_facebook' ); ?>" <?php  checked( $rtp_show_facebook ) ; ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_facebook' ); ?>"><?php _e( 'Facebook Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $facebook_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_twitter' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_twitter' ); ?>" <?php checked( $rtp_show_twitter ) ; ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_twitter' ); ?>"><?php _e( 'Twitter Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $twitter_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_google' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_google' ); ?>" <?php checked( $rtp_show_google ) ; ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_google' ); ?>"><?php _e( 'Google+ Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_link' ); ?>" name="<?php echo $this->get_field_name( 'google_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $google_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_linkedin' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_linkedin' ); ?>" <?php checked( $rtp_show_linkedin ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_linkedin' ); ?>"><?php _e( 'LinkedIn Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_link' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $linkedin_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_myspace' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_myspace' ); ?>" <?php checked( $rtp_show_myspace ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_myspace' ); ?>"><?php _e( 'MySpace Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'myspace_link' ); ?>" name="<?php echo $this->get_field_name( 'myspace_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $myspace_link ); ?>" />
        </p>
        <p>
            <input role="checkbox" type="checkbox" name="<?php echo $this->get_field_name( 'rtp_show_stumbleupon' ); ?>" id="<?php echo $this->get_field_id( 'rtp_show_stumbleupon' ); ?>" <?php checked( $rtp_show_stumbleupon ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_show_stumbleupon' ); ?>"><?php _e( 'StumbleUpon Link', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'stumbleupon_link' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon_link' ); ?>" type="text" role="textbox" value="<?php echo esc_attr( $stumbleupon_link ); ?>" />
        </p>
        <p>
            <input class="link_target" id="<?php echo $this->get_field_id( 'rtp_link_target' ); ?>" name="<?php echo $this->get_field_name( 'rtp_link_target' ); ?>" role="checkbox" role="checkbox" role="checkbox" role="checkbox" type="checkbox" <?php checked( $rtp_link_target ); ?> />
            <label for="<?php echo $this->get_field_id( 'rtp_link_target' ); ?>"><?php _e( 'Open Social Links in New Tab/Window', 'rtPanel' ); ?></label>
        </p><?php
    }
}

/**
 * Custom Widget for Recent Comments
 *
 * @since rtPanel 2.0
 */
class rtp_comments_widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     *
     * @since rtPanel 2.0
     **/
    function rtp_comments_widget() {
        $widget_ops = array( 'classname' => 'rtp-comments-widget', 'description' => __( 'Shows Recent Comments with an option for displaying Author Gravatar also.', 'rtPanel' ) );
        $this->WP_Widget( 'rt-comments-widget', __( 'rtPanel: Comments with Gravatar', 'rtPanel' ), $widget_ops );
    }

    /**
     * Outputs the HTML
     *
     * @param array An array of standard parameters for widgets in this theme
     * @param array An array of settings for this widget instance
     * @return void Echoes it's output
     *
     * @since rtPanel 2.0
     **/
    function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );
        $title = empty( $instance['title'] ) ? __( 'Recent Comments', 'rtPanel' ) : apply_filters('widget_title', $instance['title'] );
        $show_grav = $instance['show_grav'] ? '1' : '0';
        $gravatar = empty( $instance['gravatar'] ) ? 64 : $instance['gravatar'];
        $count = empty( $instance['count'] ) ? 0 : $instance['count'];
        $alternative = $instance['alternative'] ? '1' : '0';
        echo $before_widget;
            if ( $title )
                echo $before_title . $title . $after_title;
                    global $wpdb;
                    $total_comments = get_comments('type=comment');

                    if ( !empty( $total_comments ) ) {
                        echo '<ul role="list">';

                        for ( $comments = 0; $comments < $count; $comments++ ) {
                            $rtp_alignment = ' alignleft';

                            if ( $show_grav && $alternative ) {
                                $rtp_alignment = $comments % 2 ? ' alignleft' : ' alignright' ;
                            }
                            echo '<li role="listitem" class="clearfix">';
                                if ( $show_grav ) {
                                    echo '<figure class="author-vcard' . $rtp_alignment . '" title="' . $total_comments[$comments]->comment_author . '">';
                                        echo get_avatar( $total_comments[$comments]->comment_author_email, $gravatar, '', $total_comments[$comments]->comment_author );
                                    echo '</figure>';
                                }
                                echo '<p class="comment-date">';
                                    echo '<a title="' . mysql2date( 'F j, Y - g:ia', $total_comments[$comments]->comment_date_gmt ) . '" href="' . get_permalink( $total_comments[$comments]->comment_post_ID ) . '#comment-' . $total_comments[$comments]->comment_ID . '">';
                                    echo mysql2date( 'F j, Y - g:ia', $total_comments[$comments]->comment_date_gmt );
                                    echo '</a>';
                                echo '</p>';
                                echo '<div class="author-comment">';
                                    $str = wp_html_excerpt ( $total_comments[$comments]->comment_content, 60 );
                                    if ( strlen( $str ) >= 60 ) {
                                        echo $str.'&hellip;';
                                    } else {
                                        echo $str;
                                    }
                                echo '</div>';
                                echo '<p class="rtp-reply rtp-common-link' . $rtp_alignment . '">';
                                    echo '<a title="Read More" href="' . get_permalink($total_comments[$comments]->comment_post_ID) . '#comment-' . $total_comments[$comments]->comment_ID . '">';
                                    echo 'Read More &rarr;';
                                    echo '</a>';
                                echo '</p>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
         echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin
     *
     * @since rtPanel 2.0
     **/
    function update( $new_instance, $old_instance ) {
        global $wpdb;
        $comment_query = "SELECT count(*) FROM $wpdb->comments WHERE comment_approved = 1 AND trim(comment_type) = ''";
        $comment_total = $wpdb->get_var($comment_query);
        $instance = $old_instance;
        $instance['title'] = strip_tags ( $new_instance['title'] );
        $instance['show_grav'] = !empty( $new_instance['show_grav'] ) ? 1 : 0;
        $instance['gravatar'] = strip_tags ( $new_instance['gravatar'] );
        if ( in_array( $new_instance['gravatar'], array( 32, 40, 48, 56, 64 ) ) ) {
            $instance['gravatar'] = $new_instance['gravatar'];
        } else {
            $instance['gravatar'] = 64;
        }
        $instance['count'] = strip_tags ( $new_instance['count'] ) > $comment_total ? $comment_total : strip_tags ( $new_instance['count'] );
        $instance['alternative'] = !empty( $new_instance['alternative'] ) ? 1 : 0;
        return $instance;
    }

    /**
     * Displays the form on the Widgets page of the WP Admin area
     *
     * @since rtPanel 2.0
     **/
    function form( $instance ) {
        global $wpdb;
        $title = isset ( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $show_grav = isset( $instance['show_grav'] ) ? (bool) $instance['show_grav'] :true;
        $gravatar = empty( $instance['gravatar'] ) ? 64 : $instance['gravatar'];
        $comment_query = "SELECT count(*) FROM $wpdb->comments WHERE comment_approved = 1 AND trim(comment_type) = ''";
        $comment_total = $wpdb->get_var($comment_query);
        $def_count = ( $comment_total > 5 ) ? 5 : $comment_total;
        $count = empty( $instance['count'] ) ? $def_count : $instance['count'];
        $alternative = isset( $instance['alternative'] ) ? (bool) $instance['alternative'] :false; ?>
        <script type="text/javascript">
            jQuery(document).ready( function(){
                var show_grav = jQuery('#<?php echo $this->get_field_id( 'show_grav' ); ?>').attr('checked');
                if (typeof show_grav !== 'undefined' && show_grav !== false) {
                    jQuery('#<?php echo $this->get_field_id( 'alternative' ); ?>').parent().show();

                    jQuery('#<?php echo $this->get_field_id( 'show_grav' ); ?>').click(function() {
                        jQuery('#<?php echo $this->get_field_id( 'alternative' ); ?>').parent().toggle();
                    });
                } else {
                    jQuery('#<?php echo $this->get_field_id( 'alternative' ); ?>').parent().hide();

                    jQuery('#summary_show').click(function() {
                        jQuery('#<?php echo $this->get_field_id( 'alternative' ); ?>').parent().toggle();
                    });
                }
            });
        </script>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'rtPanel' ); ?>: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" role="textbox" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_grav' ); ?>"><?php _e( 'Show Gravatar', 'rtPanel' ); ?>: </label>
            <input class="show_grav" id="<?php echo $this->get_field_id( 'show_grav' ); ?>" name="<?php echo $this->get_field_name( 'show_grav' ); ?>" role="checkbox" type="checkbox" <?php checked( $show_grav ); ?> />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'alternative' ); ?>"><?php _e( 'Show Alternate Comments', 'rtPanel' ); ?>: </label>
            <input class="alternate" id="<?php echo $this->get_field_id( 'alternative' ); ?>" name="<?php echo $this->get_field_name( 'alternative' ); ?>" role="checkbox" type="checkbox" <?php checked( $alternative ); ?> />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'gravatar' ); ?>"><?php _e( 'Gravatar Size', 'rtPanel' ); ?>: </label>
            <select role="listbox" id="<?php echo $this->get_field_id( 'gravatar' ); ?>" name="<?php echo $this->get_field_name( 'gravatar' ); ?>" style="width: 120px;">
                <option value="32" <?php selected( '32', $gravatar ); ?>><?php _e( '32px X 32px', 'rtPanel' ); ?></option>
                <option value="40" <?php selected( '40', $gravatar ); ?>><?php _e( '40px X 40px', 'rtPanel' ); ?></option>
                <option value="48" <?php selected( '48', $gravatar ); ?>><?php _e( '48px X 48px', 'rtPanel' ); ?></option>
                <option value="56" <?php selected( '56', $gravatar ); ?>><?php _e( '56px X 56px', 'rtPanel' ); ?></option>
                <option value="64" <?php selected( '64', $gravatar ); ?>><?php _e( '64px X 64px', 'rtPanel' ); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show Comments', 'rtPanel' ); ?>: </label>
            <input class="widefat show-comments" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" role="textbox" value="<?php echo $count; ?>" />
            <span class="description"><?php printf( __( 'You have total \'%d\' comments to display', 'rtPanel' ) , $comment_total ); ?></span>
        </p>
        <script type="text/javascript">
            jQuery('.show-comments').keyup(function(){
                this.value = this.value.replace(/[^0-9\/]/g,'');
            });
        </script><?php
    }
}

/**
 * Custom Widget for Categories
 *
 * @since rtPanel 2.0
 */
class rtp_category_widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     *
     * @since rtPanel 2.0
     **/
    function rtp_category_widget() {
        $widget_ops = array( 'classname' => 'widget_rtp_category_widget', 'description' => __( 'A list or dropdown of categories with extra options.', 'rtPanel' ) );
        $this->WP_Widget( 'rt-categories-widget', __( 'rtPanel: Categories', 'rtPanel' ), $widget_ops );
    }

    /**
     * Outputs the HTML
     *
     * @param array An array of standard parameters for widgets in this theme
     * @param array An array of settings for this widget instance
     * @return void Echoes it's output
     *
     * @since rtPanel 2.0
     **/
    function widget( $args, $instance ) {
        extract($args, EXTR_SKIP);
        $title = empty( $instance['title'] ) ? __( 'Categories', 'rtPanel' ) : apply_filters( 'widget_title', $instance['title'] );
        $sortby = empty( $instance['sortby'] ) ? 'name' : $instance['sortby'];
        $showstyle = empty( $instance['showstyle'] ) ? 'list' : $instance['showstyle'];
        $order = empty( $instance['order'] ) ? 'ASC' : $instance['order'];
        $show_cat = empty( $instance['show_cat'] ) ? 10 : $instance['show_cat'];
        $exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
        $exclude = preg_replace( '/\,$/', '', $exclude );
        $hierarchical = isset($instance['hierarchical']) ? $instance['hierarchical'] : true;
        $show_count = isset($instance['show_count']) ? $instance['show_count'] : true;
        $hide_empty = isset($instance['hide_empty']) ? $instance['hide_empty'] : true;

        echo $before_widget;
            if ( $title )
                echo $before_title . $title . $after_title;

                if ( $showstyle == 'list' ) {
                    echo '<ul>';
                        wp_list_categories( array( 'hierarchical' => $hierarchical, 'style' => $showstyle, 'hide_empty' => $hide_empty, 'show_count' => $show_count, 'number' => $show_cat, 'exclude' => $exclude, 'orderby' => $sortby, 'title_li' => '', 'order' => $order ) );
                    echo '</ul>';
                } else {
                        wp_dropdown_categories( array( 'id' => 'rtp_cat', 'name' => 'rtp_cat', 'hierarchical' => $hierarchical, 'orderby' => $sortby, 'order' => $order, 'show_count' => $show_count, 'hide_empty' => $hide_empty, 'exclude' => $exclude, 'class' => 'postform rtp_cat_dropdown' ) ); ?>
                        <script type="text/javascript">
                        /* <![CDATA[ */
                                var dropdown = document.getElementById("rtp_cat");
                                function onCatChange() {
                                        if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                                location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
                                        }
                                }
                                dropdown.onchange = onCatChange;
                        /* ]]> */
                        </script>
                <?php }

         echo $after_widget;
    }

    /**
     * Deals with the settings when they are saved by the admin
     *
     * @since rtPanel 2.0
     **/
    function update( $new_instance, $old_instance ) {
        $total_category = count( get_categories() );
        $instance = $old_instance;
        $instance['title'] = strip_tags ( $new_instance['title'] );
        if ( in_array( $new_instance['showstyle'], array( 'list', 'dropdown' ) ) ) {
            $instance['showstyle'] = $new_instance['showstyle'];
        } else {
            $instance['showstyle'] = 'list';
        }
        $instance['hide_empty'] = !empty( $new_instance['hide_empty'] ) ? 1 : 0;
        if ( in_array( $new_instance['sortby'], array( 'name', 'ID', 'count', 'slug' ) ) ) {
            $instance['sortby'] = $new_instance['sortby'];
        } else {
            $instance['sortby'] = 'name';
        }
        if ( in_array( $new_instance['order'], array( 'ASC', 'DESC' ) ) ) {
            $instance['order'] = $new_instance['order'];
        } else {
            $instance['order'] = 'ASC';
        }
        $instance['show_cat'] = (int) $new_instance['show_cat'] > $total_category ? $total_category : (int) $new_instance['show_cat'];
        $instance['exclude'] = strip_tags ( $new_instance['exclude'] );
        $instance['hierarchical'] = !empty( $new_instance['hierarchical'] ) ? 1 : 0;
        $instance['show_count'] = !empty( $new_instance['show_count'] ) ? 1 : 0;
        return $instance;
    }

    /**
     * Displays the form on the Widgets page of the WP Admin area
     *
     * @since rtPanel 2.0
     **/
    function form($instance) {
        $title = isset ( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $showstyle = isset ( $instance['showstyle'] ) ? ( $instance['showstyle'] ) : 'list';
        $hide_empty = isset( $instance['hide_empty']) ? (bool) $instance['hide_empty'] :false;
        $sortby = empty( $instance['sortby'] ) ? 'name' : $instance['sortby'];
        $order = empty( $instance['order'] ) ? 'ASC' : $instance['order'];
        $show_cat = empty( $instance['show_cat'] ) ? 10 : absint( $instance['show_cat'] );
        $exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
        $hierarchical = isset( $instance['hierarchical']) ? (bool) $instance['hierarchical'] :false;
        $show_count = isset( $instance['show_count']) ? (bool) $instance['show_count'] :false; ?>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'title' ); ?>" style="display: block; float: left; padding: 0 0 3px;"><?php _e( 'Title', 'rtPanel' ); ?>: </label>
            <input class="widefat" role="textbox" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'sortby' ); ?>" style="display: block;float: left;padding: 3px 0 0;"><?php _e( 'Order by', 'rtPanel' ); ?>: </label>
            <select role="listbox" id="<?php echo $this->get_field_id( 'sortby' ); ?>" name="<?php echo $this->get_field_name( 'sortby' ); ?>" style="float: right; width: 120px;">
                <option value="name" <?php selected( 'name', $sortby ); ?>><?php _e( 'Category Name', 'rtPanel' ); ?></option>
                <option value="ID" <?php selected( 'ID', $sortby ); ?>><?php _e( 'Category ID', 'rtPanel' ); ?></option>
                <option value="count" <?php selected( 'count', $sortby ); ?>><?php _e( 'Category Count', 'rtPanel' ); ?></option>
                <option value="slug" <?php selected( 'slug', $sortby ); ?>><?php _e( 'Category Slug', 'rtPanel' ); ?></option>
            </select>
        </p>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'order' ); ?>" style="display: block;float: left;padding: 3px 0 0;"><?php _e( 'Sort by', 'rtPanel' ); ?>: </label>
            <select role="listbox" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>" style="float: right; width: 120px;">
                <option value="ASC" <?php selected( 'ASC', $order ); ?>><?php _e( 'Ascending', 'rtPanel' ); ?></option>
                <option value="DESC" <?php selected( 'DESC', $order ); ?>><?php _e( 'Descending', 'rtPanel' ); ?></option>
            </select>
        </p>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'show_cat' ); ?>" style="display: block;float: left;padding: 3px 0 0;"><?php _e( 'Show Category', 'rtPanel' ); ?>:</label>
            <input class="widefat show-cat" id="<?php echo $this->get_field_id( 'show_cat' ); ?>" name="<?php echo $this->get_field_name( 'show_cat' ); ?>" type="text" role="textbox" value="<?php echo $show_cat; ?>" style="float: right; clear: right; width: 120px;" /><div class="clear"></div>
            <span class="description"><?php _e( 'Total Categories', 'rtPanel' ); ?>: <?php echo count( get_categories() ); ?></span>
        </p>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'showstyle' ); ?>" style="display: block;float: left;padding: 3px 0 0;"><?php _e( 'Style', 'rtPanel' ); ?>: </label>
            <select role="listbox" id="<?php echo $this->get_field_id( 'showstyle' ); ?>" name="<?php echo $this->get_field_name( 'showstyle' ); ?>" style="float: right; width: 120px;">
                <option value="list" <?php selected( 'list', $showstyle ); ?>><?php _e( 'List', 'rtPanel' ); ?></option>
                <option value="dropdown" <?php selected( 'dropdown', $showstyle ); ?>><?php _e( 'Dropdown', 'rtPanel' ); ?></option>
            </select>
        </p>
        <p style="overflow: hidden;">
            <label for="<?php echo $this->get_field_id( 'exclude' ); ?>" style="display: block; float: left; padding: 3px 0 0;"><?php _e( 'Exclude', 'rtPanel' ); ?>:</label>
            <input class="widefat exclude" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" type="text" role="textbox" value="<?php echo $exclude; ?>" style="float: right; clear: right; margin: 0 0 0 3px; width: 120px;" /><div class="clear"></div>
            <span class="description"><?php _e( 'Separate Category ID with ","', 'rtPanel' ); ?><br /><?php _e( 'Ex: 1,5,15', 'rtPanel' ); ?></span>
        </p>
        <p style="overflow: hidden;">
            <input role="checkbox" type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
            <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show Hierarchy', 'rtPanel' ); ?></label><br />
        </p>
        <p style="overflow: hidden;">
            <input role="checkbox" type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hide_empty'); ?>" name="<?php echo $this->get_field_name('hide_empty'); ?>"<?php checked( $hide_empty ); ?> />
            <label for="<?php echo $this->get_field_id('hide_empty'); ?>"><?php _e( 'Hide Empty', 'rtPanel' ); ?></label><br />
        </p>
        <p style="overflow: hidden;">
            <input role="checkbox" type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('show_count'); ?>" name="<?php echo $this->get_field_name('show_count'); ?>"<?php checked( $show_count ); ?> />
            <label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e( 'Show post counts', 'rtPanel' ); ?></label><br />
        </p>
        <script type="text/javascript">
            jQuery('.show-cat').keyup( function () { this.value = this.value.replace(/[^0-9\/]/g,''); } );
            jQuery('.exclude').keyup( function () { this.value = this.value.replace(/[^0-9\,]/g,''); } );
        </script><?php
    }
}

/**
 * Registers all rtPanel Custom Widgets
 * 
 * @since rtPanel 2.0
 */
function rtp_register_widgets() {
    register_widget( 'rtp_subscribe_widget' );
    register_widget( 'rtp_comments_widget' );
    register_widget( 'rtp_category_widget' );
}
add_action( 'widgets_init', 'rtp_register_widgets' );