<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Filtramos los post que mostramos en Talks por cada usuario
 */
function bfg_project_shortcode($atts)
{
	$user_id = bp_displayed_user_id();
	$authorId = get_the_author_meta( 'ID' );
	$profileUserID = bp_displayed_user_id();
	$current_user = wp_get_current_user();

  $odsCategory = xprofile_get_field_data('17', $current_user->ID, $multi_format = 'comma');
  $odsCategoryText = xprofile_get_field_data('17', $current_user->ID);

	$argsGetMembers = array(
		'type' => "active",
	);

	$members = bp_core_get_users($argsGetMembers);
	$isCategory = false;

	$templateLayout = 'template-parts/content-dashboard-project';
	$classSlide = 'flex bfg-flex-grap bfg-slide-proyectos';
	$splitStringTemp = [];

	if($odsCategory) {
		$isCategory = true;
		$categorySplit = explode(",", $odsCategory);
		$termsText = implode(' ', $odsCategoryText);
		foreach ($categorySplit as &$valor) {
			$splitString = explode('categoria/', $valor); // ods/
			$textCategpryArray = explode('/"', $splitString[1]);
			array_push($splitStringTemp, $textCategpryArray[0]);
		}
	
		foreach ($splitStringTemp as &$valor) {
			$tempTerms[] = $valor;
		}
	}

	$args = array(
		'post_type' => 'proyectos',
		'posts_per_page' => 20,
		'hide_empty' => false,
		'orderby' => 'ASC',
		'tax_query' => $isCategory ? array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'categoria-sesion', // 'ods'
				'field'    => 'slug',
				'terms'    => $tempTerms,
			)
		) : array() ,
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
	}else {
		ob_start();
		?>
		<p>No hay proyectos relacionados con los ODS que has elegido. En la <a href="<?php echo home_url('proyectos'); ?>">página de proyectos</a>  puedes ver todos los que tenemos</p>
		<?php
		$output .= ob_get_clean();
	}
	// do_action('bfg_filter_proyectos_slick_script');
	return $output;
}

add_shortcode('proyectos-shortcode', 'bfg_project_shortcode');