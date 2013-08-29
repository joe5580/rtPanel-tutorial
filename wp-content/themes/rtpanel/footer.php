<?php
/**
 * The template for displaying the footer
 *
 * @package rtPanel
 *
 * @since rtPanel 2.0
 */
global $rtp_general; ?>
<?php wp_footer(); ?>

<footer>
  <div class="footertop">
    <div class="container">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span4">
            <div class="pages">
              <div class="footerTitle">
                <h3>Pages</h3>
              </div>
              <div class="footerList">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Pages') ) : ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="span4">
            <div class="links">
              <div class="footerTitle">
                <h3>Important Links</h3>
              </div>
              <div class="footerList">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Important Link') ) : ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="span4">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Logo') ) : ?>
            <?php endif; ?>
            <div class="footerList2">
              <?php  echo do_shortcode('[rt-link url="'.home_url().'/terms-of-use/" title="Terms of Use"]Terms of Use[/rt-link]') ?>
              &nbsp;|&nbsp;
              <?php  echo do_shortcode('[rt-link url="'.home_url().'/privacy-policy/" title="Privacy Policy"]Privacy Policy[/rt-link]') ?> ‎
              &nbsp;|&nbsp;
              <?php  echo do_shortcode('[rt-link url="'.home_url().'/designed-by-rtcamp/" title="Designed by rtCamp"]Designed by rtCamp[/rt-link]') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footerBtm">
    <div class="container">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="footerText"> <b>Disclaimer:</b> Sit arcu nec cras elit? Vut sagittis magna nisi vel integer arcu? Dis pulvinar scelerisque pulvinar rhoncus integer, integer in? Ac, cum etiam tortor duis placerat mid nunc cras integer, aliquam porttitor. Dis pulvinar scelerisque pulvinar rhoncus integer, integer in? Ac, cum etiam tortor duis placerat mid nunc cras integer, aliquam porttitor. </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/script.js"></script>
</body></html>