<?php

/**
 * Define the sections and settings for the panel infobar panel
 */
function weaverx_customizer_define_w_infobar_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-infobar';
	$infobar_sections = array();

	$infobar_sections['infobar-settings'] = array(
		'panel'       => $panel,
		'title'       => __( 'Infobar Settings', 'weaver-xtreme' ),
		'description' => 'Set Infobar options.',
		'options'     => weaverx_controls_w_infobar_settings(),
	);

	return $infobar_sections;
}

// the definitions of the controls for each panel follow


function weaverx_controls_w_infobar_settings() {
	$opts = array();

	$opts['info_vis_title'] = weaverx_cz_group_title(
		__( 'Info Bar Visibility', 'weaver-xtreme'),
		__( 'The Infobar is at the top of the Container, before the Content Area.', 'weaver-xtreme' )
	);

	$opts['infobar_hide'] = weaverx_cz_select(
		__( 'Hide Info Bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['infobar-heading-global'] = weaverx_cz_group_title(
		__( 'Infobar Colors', 'weaver-xtreme' ) );

	$opts['infobar_color'] = weaverx_cz_color(
		'infobar_color',
		__( 'Info Bar Text Color', 'weaver-xtreme' )
	);

	$opts['infobar_bgcolor'] = weaverx_cz_color(
		'infobar_bgcolor',
		__( 'Info Bar BG Color', 'weaver-xtreme' )
	);

	$new = weaverx_cz_fonts_control( 'info_bar', __( 'Info Bar Typography', 'weaver-xtreme' ), '', 'postMessage' );
	$opts = array_merge( $opts, $new);

	$opts['spacing-info-bar-heading'] =
		weaverx_cz_group_title( __( 'Info Bar Alignment and Spacing', 'weaver-xtreme' ) );

	$opts['infobar_width_int'] = weaverx_cz_range_float(
		__( 'Info Bar Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Info Bar "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
		100,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage'
	);

	$opts['infobar_align'] = weaverx_cz_select(
		__( 'Align Info Bar Area', 'weaver-xtreme' ),
		__('Info Bar alignment options obvious only with no sidebars on page, or width &lt; 100%.', 'weaver-xtreme'),
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['infobar_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
		5,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		5,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		5,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		5,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['infobar-heading-style'] = weaverx_cz_group_title(
		__( 'Infobar Style', 'weaver-xtreme' ) );

	$opts['infobar_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Info Bar', 'weaver-xtreme' )
	);

	$opts['infobar_shadow'] = weaverx_cz_select(
		__( 'Add shadow to Info Bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['infobar_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Info Bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);

	$opts['info_xtra_title'] = weaverx_cz_group_title( __( 'Info Bar Extra Items', 'weaver-xtreme'));

	$opts['info_hide_breadcrumbs'] = weaverx_cz_checkbox(
		__( 'Hide Breadcrumbs', 'weaver-xtreme' ),
		__( 'Do not display the Breadcrumbs on the Infobar', 'weaver-xtreme' )
	);

	$opts['info_hide_pagenav'] = weaverx_cz_checkbox(
		__( 'Hide Page Navigation', 'weaver-xtreme' ),
		__( 'Do not display the numbered Page navigation on the Infobar', 'weaver-xtreme' )
	);

	$opts['info_search'] = weaverx_cz_checkbox(
		__( 'Show Search Icon', 'weaver-xtreme' ),
		__( 'Include slide open Search icon on the right.', 'weaver-xtreme' )
	);

	$opts['info_addlogin'] = weaverx_cz_checkbox(
		__( 'Show Log In', 'weaver-xtreme' ),
		__( 'Include a simple Log In link on the right.', 'weaver-xtreme' )
	);

	$opts['info_home_label'] = weaverx_cz_textarea( __( 'Breadcrumb label for Home', 'weaver-xtreme' ),
		__( 'This lets you change the breadcrumb label for your home page. (Default: Home)', 'weaver-xtreme' ),
		'1', '',
		'refresh' );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'ibarlink', __( 'Info Bar Links', 'weaver-xtreme' ),
		__( 'Typography for links in Info Bar ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	$opts['ibarlink_color'] = weaverx_cz_color(
		'ibarlink_color',
		__( 'Info Bar Link Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['ibarlink_hover_color'] = weaverx_cz_color(
		'ibarlink_hover_color',
		__( 'Info Bar Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['infobar_add_class'] = weaverx_cz_add_class( __( 'Info Bar: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}
