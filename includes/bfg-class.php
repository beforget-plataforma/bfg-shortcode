<?

class BFGShortCodes {
  static $shortCodesContent = array(
    "post" => 'template-parts/content-dashboard-post'
  );
  public function renderPost(){
    function bfg_post_shortcode() {
      $templateLayout = 'template-parts/content-dashboard-post';
      $classSlide = 'flex bfg-flex-grap bfg-slide-post';
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'hide_empty' => false,
        'order' => 'DESC',
      );
      $the_query = new WP_Query($args);
      $output = '';
      if ($the_query->have_posts()) {
        $output .= '<div class="bfg-shortcode-container bb-block-header dash-bfg-slide">';
        $output .= '<div class="bfg-shortcode-lading-slider active"></div>';
        $output .= '<div class="wrapper-post-profile '.$classSlide.'">';
        while ( $the_query->have_posts() ) : $the_query->the_post();
              ob_start();
              get_template_part( $templateLayout );
              $output .= ob_get_clean();
        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
        $output .= '</div>';
      } 
      return $output;
    }
    add_shortcode('post-shortcode', 'bfg_post_shortcode');
  }

  public function bfgLoadSlickScript() {
      wp_register_script('bfgPostSlick', esc_url(plugins_url('/frontend/dist/loadSlickCarrusel.js', dirname(__FILE__) )), true);
      wp_localize_script('bfgPostSlick', 'wp_pageviews_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce( 'wp-pageviews-nonce' ),
      ));
      wp_enqueue_script('bfgPostSlick');
      add_action( 'bfg_post_slick_script', 'bfg_post_script_slick' );
  }
}