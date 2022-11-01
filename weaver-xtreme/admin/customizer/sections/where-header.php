<?php

/**
 * Define the sections and settings for the panel w_header panel
 */
function weaverx_customizer_define_w_header_sections() {
	global $wp_customize;
	$panel = 'weaverx_where-header';
	$w_header_sections = array();


	/**
	 * Header Image (use WP standard)
	 */

	$wp_customize->get_section( 'header_image' )->priority = 10400;
	$wp_customize->get_section( 'header_image' )->panel = $panel;

	/**
	 * Header Image Layout
	 */

	$w_header_sections['w_images-header-layout'] = array(
		'panel'   => $panel,
		'title'   => __( 'Header Image Layout', 'weaver-xtreme' ),
		'options' => weaverx_controls_w_header_layout(),
	);


	/**
	 * Header Area
	 */

	$w_header_sections['w_header-area-settings'] = array(
		'panel'       => $panel,
		'title'       => __( 'Header Area', 'weaver-xtreme' ),
		'description' => __( 'The Header Area includes: menu bars, standard header image, title, tagline, header widget area, header HTML area', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_header_area(),
	);

	/**
	 * Title/Tagline
	 */

	$w_header_sections['w_header-title-tag'] = array(
		'panel'       => $panel,
		'title'       => __( 'Site Title and Tagline Settings', 'weaver-xtreme' ),
		'description' => __( 'Settings related to the Site Title and Tagline (Tagline sometimes called Site Description)', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_header_title_tag(),
	);

	/**
	 * Widget Area
	 */

	$w_header_sections['w_header-widgets'] = array(
		'panel'       => $panel,
		'title'       => __( 'Header Widget Area', 'weaver-xtreme' ),
		'description' => __( 'Widget Area for Header', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_header_widgets(),
	);

	/**
	 * Title/Tagline
	 */

	$w_header_sections['w_header-html'] = array(
		'panel'       => $panel,
		'title'       => __( 'Header HTML Area', 'weaver-xtreme' ),
		'description' => __( 'Add arbitrary HTML to Header Area', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_header_html(),
	);

	// ---- Header Replace

	$w_header_sections['pb-header-replace'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Global Header Area Replacement', 'weaver-xtreme' ),
		'description' => esc_html__( 'Replace Weaver Header Area with Page Builder page.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_w_header_replace(),

	);

	return $w_header_sections;
}

// the definitions of the controls for each panel follow

function weaverx_controls_w_header_replace() {
	$opts = array();

	if ( defined( 'ELEMENTOR_VERSION' ) ) {                // only provide if elementor is active
		$opts['elementor_header_replacement'] = weaverx_cz_select(
			__( 'Elementor Header Replacement', 'weaver-xtreme' ),
			__( 'Select an Elementor Page or Post to replace the Header Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_elementor_pages', 'none', 'refresh'
		);
	}

	if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {        // only provide if siteorigins is active

		$opts['siteorigin_header_replacement'] = weaverx_cz_select(
			__( 'SiteOrigin Header Replacement', 'weaver-xtreme' ),
			__( 'Select an SiteOrigin Page or Post to replace the Header Area.', 'weaver-xtreme' ),
			'weaverx_cz_choices_siteorigin_pages', 'none', 'refresh'
		);
	}

	$opts['pb-hdr1'] = weaverx_cz_group_title( __( 'Header Replacement Page', 'weaver-xtreme' ),
		__( 'You can replace the entire Weaver Header area with the content from a page builder page, or any other standard Page or Post by ID. None of the standard theme header elements except the menu bars will be displayed.  You can also specify a Header Replacement as a Per Page option.', 'weaver-xtreme' ) );


	if ( ! defined( 'ELEMENTOR_VERSION' ) && ! defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
		$opts['no-pb1'] = weaverx_cz_group_title( __( 'No Page Builder Detected', 'weaver-xtreme' ),
			__( 'Sorry, Weaver can only show a list of page builder pages from Elementor or SiteOrigin Page Builder, but you can still provide a page/post ID. Please install and activate one of those plugins.', 'weaver-xtreme' ) );
	}

	$opts['pb_header_replace_page_id'] = weaverx_cz_textarea(
		__( 'Page or Post ID Header Replacement', 'weaver-xtreme' ),
		__( 'Provide any page or post ID to serve as header replacement. Overrides list selection above. Does not have to be from a page builder.', 'weaver-xtreme' ), 1, '',
		'refresh', '', 'weaverx_cz_sanitize_int' );

	$opts['pb_header_hide_menus'] = weaverx_cz_checkbox(
		__( 'Hide Weaver Menus', 'weaver-xtreme' ),
		__( 'Check to hide the Weaver Primary Menu normally displayed below the replacement page.', 'weaver-xtreme' )
	);

	return $opts;
}


function weaverx_controls_w_header_area() {
	$opts = array();

	$hdr_width_transport = 'postMessage'; // 'header_extend_width' ? 'refresh' removed V5

	$opts['hdr_area_vism'] = weaverx_cz_group_title( __( 'Header Visibility', 'weaver-xtreme' ) );

	$opts['header_hide'] = weaverx_cz_select(
		__( 'Hide Header Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['header_search_hide'] = weaverx_cz_select(
		__( 'Hide Search box on Header', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['header-a-title'] = weaverx_cz_group_title( __( 'Header Area Colors', 'weaver-xtreme'));

	$opts['header_color'] = weaverx_cz_color(
		'header_color',
		__( 'Header Text Color', 'weaver-xtreme' ),
		'' );

	$opts['header_bgcolor'] = weaverx_cz_color(
		'header_bgcolor',
		__( 'Header Area BG Color', 'weaver-xtreme' ),
		'The Header BG Color is used for full width BG color on header.' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'header', __( 'Header Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts['w_header-has-ttl'] = weaverx_cz_group_title(
		__( 'Header Alignment and Spacing', 'weaver-xtreme' ) );

	$opts['header_align'] = weaverx_cz_select(
		__( 'Align Header Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['header_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['header_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['header_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		$hdr_width_transport,
		'',
		'header_align'
	);

	$opts['header_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		$hdr_width_transport,
		'',
		'header_align'
	);

	$opts['header_padding_LRp'] = weaverx_cz_range_float(
		__( 'Header Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		'',
		'~header_align'    // ~ means show if alignwide or alignfull
	);


	$opts['header_margin_T'] = weaverx_cz_range(
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

	$opts['header_margin_B'] = weaverx_cz_range(
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

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['header_width_int'] = weaverx_cz_range_float(
			__( 'Header Area Width (%)', 'weaver-xtreme' ),
			__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Header "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
			100.,
			array(
				'min'  => 0,
				'max'  => 100,
				'step' => 0.5,
			),
			'refresh',
			'',
			'header_align'  // don't show for alignwide and align full
		);

		$opts['header_max_width_int'] = weaverx_cz_range(
			__( 'Header Area Max Width (px)', 'weaver-xtreme' ),
			__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area.  Use 0 for no Max Width.', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 4000,
				'step' => 5,
			),
			'refresh',
			'plus',
			'header_align'
		);
	}

	$opts['w_header-style-ttl'] = weaverx_cz_group_title(
		__( 'Header Styling', 'weaver-xtreme' ) );

	$opts['header_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to entire Header Area', 'weaver-xtreme' )
	);

	$opts['header_shadow'] = weaverx_cz_select(
		__( 'Add shadow to header', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['header_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Header Area', 'weaver-xtreme' ),
		__( 'Rounded corners need borders or contrasting colors to be visible.', 'weaver-xtreme' ),
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts = array_merge( $opts,
			weaverx_cz_add_image( 'header', esc_html__( 'Header BG Image', 'weaver-xtreme' ),
				esc_html__( 'Background image for header (#header)', 'weaver-xtreme' ) )
		);

		$opts['w_header-cust-css'] = weaverx_cz_group_title(
			__( 'Add Classes', 'weaver-xtreme' ) );
		$opts['header_add_class'] = weaverx_cz_add_class( __( 'Header Area: Add Classes', 'weaver-xtreme' ) );

	}

	return $opts;
}

function weaverx_controls_w_header_title_tag() {
	$opts['w_header-tt-titlexx'] = weaverx_cz_group_title(
		__( 'Site Title and Tagline Colors', 'weaver-xtreme' ) );

	$opts['site_title_color'] = weaverx_cz_color(
		'site_title_color',
		__( 'Site Title Text Color', 'weaver-xtreme' ),
		'' );

	$opts['site_title_bgcolor'] = weaverx_cz_color(
		'site_title_bgcolor',
		__( 'Site Title BG Color', 'weaver-xtreme' ),
		__( 'Site Title BG Color', 'weaver-xtreme' ) );

	$opts['tagline_color'] = weaverx_cz_color(
		'tagline_color',
		__( 'Site Tagline Text Color', 'weaver-xtreme' ),
		'' );

	$opts['tagline_bgcolor'] = weaverx_cz_color(
		'tagline_bgcolor',
		__( 'Site Tagline BG Color', 'weaver-xtreme' ),
		'' );

	$opts['title_tagline_bgcolor'] = weaverx_cz_color(
		'title_tagline_bgcolor',
		__( 'Title/Tagline Area BG', 'weaver-xtreme' ),
		__( 'BG Color for the Title, Tagline, and Search area.', 'weaver-xtreme' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'site_title', __( 'Site Title Typography', 'weaver-xtreme' ), '', 'postMessage' ) );


	// ---- Site Tagline Typography

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'tagline', __( 'Site Tagline Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	// ---   Title/tagline Alignment and Spacing

	$opts['spacing-title-header'] = weaverx_cz_group_title( __( 'Site Title and Tagline Alignment and Spacing', 'weaver-xtreme' ),
		__( 'Spacing for the Site Title and Tagline', 'weaver-xtreme' ) );

	$opts['title_over_image'] = weaverx_cz_checkbox(
		__( 'Move Title/Tagline over Image', 'weaver-xtreme' ),
		__( 'Move the Title, Tagline, Search, Logo/HTML and Mini Menu over the Header Image. NOTE: Best to not use with Header Image as BG Image.', 'weaver-xtreme' )
	);

	$opts['spacing-titleposition'] = weaverx_cz_heading( __( 'Title Position', 'weaver-xtreme' ),
		__( 'Adjust left and top margins for Title. Decimal and negative values allowed.', 'weaver-xtreme' ) );

	$opts['site_title_position_xy_X'] = weaverx_cz_range_float(
		__( 'Site Title Left Margin (%)', 'weaver-xtreme' ),
		'',
		7,
		array(
			'min'  => - 20,
			'max'  => 50,
			'step' => 0.25,
		),
		'postMessage'
	);

	$opts['site_title_position_xy_Y'] = weaverx_cz_range_float(
		__( 'Site Title Top Margin (%)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => - 20,
			'max'  => 50,
			'step' => 0.25,
		),
		'postMessage'
	);

	$opts['site_title_max_w'] = weaverx_cz_range(
		__( 'Site Title Maximum Width (%)', 'weaver-xtreme' ),
		'',
		90,
		array(
			'min'  => 10,
			'max'  => 100,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['spacing-tagposition'] = weaverx_cz_heading(
		__( 'Tagline Position', 'weaver-xtreme' ),
		__( 'Adjust left and top margins for Tagline. Decimal and negative values allowed.', 'weaver-xtreme' )
	);

	$opts['tagline_xy_X'] = weaverx_cz_range_float(
		__( 'Site Tagline Left Margin (%)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => - 20,
			'max'  => 50,
			'step' => 0.25,
		),
		'postMessage'
	);

	$opts['tagline_xy_Y'] = weaverx_cz_range_float(
		__( 'Site Tagline Top Margin (%)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => - 50,
			'max'  => 50,
			'step' => .25,
		),
		'postMessage'
	);

	$opts['tagline_max_w'] = weaverx_cz_range(
		__( 'Site Tagline Maximum Width (%)', 'weaver-xtreme' ),
		'',
		90,
		array(
			'min'  => 10,
			'max'  => 100,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['title_tagline_xy_T'] = weaverx_cz_range(
		__( 'Title/Tagline Top Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['title_tagline_xy_B'] = weaverx_cz_range(
		__( 'Title/Tagline Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1,
		),
		'postMessage'
	);

	// --- Site Title/Tag Visibility

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['hdr_ttag_vism'] = weaverx_cz_group_title( __( 'Site Title/Tag Visibility', 'weaver-xtreme' ) );

		$opts['hide_site_title'] = weaverx_cz_select(
			__( 'Hide Site Title', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

		$opts['hide_site_tagline'] = weaverx_cz_select(
			__( 'Hide Tagline', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);
	}

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['site_title_add_class'] = weaverx_cz_add_class( __( 'Site Title: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_header_widgets() {
	$opts['w_header-tt-title'] = weaverx_cz_group_title(
		__( 'Header Widget Area', 'weaver-xtreme' ),
		__( 'The Horizontal Header Widget Area is placed in the Header Area. There are many options to control just how the Header Widget Area is displayed.', 'weaver-xtreme' ) );

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['header_sb_color'] = weaverx_cz_color(
			'header_sb_color',
			__( 'Header Widget Area Text Color', 'weaver-xtreme' ),
			'' );

		$opts['header_sb_bgcolor'] = weaverx_cz_color(
			'header_sb_bgcolor',
			__( 'Header Widget Area BG Color', 'weaver-xtreme' ),
			'' );


		$opts['header_sb_border'] = weaverx_cz_checkbox_post(
			__( 'Add border to Header Widget Area', 'weaver-xtreme' )
		);

		$opts['header_sb_shadow'] = weaverx_cz_select(
			__( 'Add shadow to Header Widget Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_shadow', '-0', 'postMessage'
		);

		$opts['header_sb_rounded'] = weaverx_cz_select(
			__( 'Add rounded corners to Header Widget Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
		);

		$opts = array_merge( $opts, weaverx_cz_fonts_control( 'header_sb', __( 'Header Widget Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );


		// ------- Header Widget Area

		$opts['spacing-widgetarea-header222'] = weaverx_cz_group_title( __( 'Header Widget Area Alignment and Spacing', 'weaver-xtreme' ),
			__( 'Spacing for the Header Widget Area', 'weaver-xtreme' ) );


		$opts['header_sb_align'] = weaverx_cz_select(
			__( 'Align Header Widget Area Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_align', 'float-left', 'refresh'
		);

		$opts['header_sb_padding_T'] = weaverx_cz_range(
			__( 'Top Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_sb_width_int'] = weaverx_cz_range_float(
			__( 'Header Widget Area Width (%)', 'weaver-xtreme' ),
			__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align Header Widget Area "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 100,
				'step' => 0.5,
			),
			'postMessage'
		);

		$opts['header_sb_padding_B'] = weaverx_cz_range(
			__( 'Bottom Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_sb_padding_L'] = weaverx_cz_range(
			__( 'Left Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_sb_padding_R'] = weaverx_cz_range(
			__( 'Right Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_sb_margin_T'] = weaverx_cz_range(
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

		$opts['header_sb_margin_B'] = weaverx_cz_range(
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

		// --- Header Widget Area Layout

		$opts['spacing-heading-widgets-layout'] = weaverx_cz_group_title( __( 'Header Widget Area Layout', 'weaver-xtreme' ) );

		// weaverx_cz_range( $label, $description, $default, $range, $transport = 'refresh', $plus = '' )

		$opts['header_sb_cols_int'] = weaverx_cz_range(
			__( 'Header Columns of Widgets', 'weaver-xtreme' ),
			'',
			1,
			array( 'min' => 1, 'max' => 8, 'step' => 1 ),
			'refresh'
		);

		if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

			$opts['header_sb_fixedtop'] = weaverx_cz_checkbox(
				__( 'Fixed-Top Header Widget Area', 'weaver-xtreme' ),
				__( 'Fix Header Widget are to top of page. If primary/secondary menus also fixed-top, header widget area will always be after secondary and before primary. If you have set the Header to Align Full or Wide, you may want to change the alignment for this item as well.', 'weaver-xtreme' )
			);

		}

		$opts['header_sb_position'] = weaverx_cz_select_plus(
			__( 'Header Widget Area Position', 'weaver-xtreme' ),
			__( 'Change where Header Widget Area is displayed within the Header Area. You can move it to one of seven positions in the Header.', 'weaver-xtreme' ),
			array(
				'top'           => __( 'Top of Header', 'weaver-xtreme' ),
				'before_header' => __( 'Before Header Image', 'weaver-xtreme' ),
				'after_header'  => __( 'After Header Image', 'weaver-xtreme' ),
				'after_html'    => __( 'After HTML Block', 'weaver-xtreme' ),
				'after_menu'    => __( 'After Lower Menu', 'weaver-xtreme' ),
				'pre_header'    => __( 'Pre-#header &lt;div&gt;', 'weaver-xtreme' ),
				'post_header'   => __( 'Post-#header &lt;div&gt;', 'weaver-xtreme' ),
			),
			'top',
			'refresh'
		);

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$opts['layout-header-custom-widths'] = weaverx_cz_heading( __( 'Header Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' ) );

			$opts['_header_sb_lw_cols_list'] = weaverx_cz_textarea(
				__( 'Header Desktop Widget Widths', 'weaver-xtreme' ),
				__( 'List of widget widths separated by comma. Use semi-colon (;) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
				'1',
				__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
				'refresh',
				'plus' );

			$opts['_header_sb_mw_cols_list'] = weaverx_cz_textarea(
				__( 'Header Small Tablet Widget Widths', 'weaver-xtreme' ),
				__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
				'1',
				'',
				'refresh',
				'plus'
			);

			$opts['_header_sb_sw_cols_list'] = weaverx_cz_textarea(
				__( 'Header Phone Widget Widths', 'weaver-xtreme' ),
				__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
				'1',
				'',
				'refresh',
				'plus'
			);

			$opts['header_sb_no_widget_margins'] = weaverx_cz_checkbox(
				__( 'Header No Smart Widget Margins', 'weaver-xtreme' ),
				__( 'Do not use "smart margins" between  multi-column widgets on rows.',
					'weaver-xtreme' ) );

			$opts['header_sb_eq_widgets'] = weaverx_cz_checkbox(
				__( 'Header Equal Height Widget Rows', 'weaver-xtreme' ),
				__( 'Make widgets equal height rows if &gt; 1 column.',
					'weaver-xtreme' ),
				'plus'
			);
		} else {
			$opts['layout-header-custom-widths'] = weaverx_cz_heading( __( 'Header Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'Weaver Xtreme Plus Allows you to set custom widget width in Full Options mode.', 'weaver-xtreme' ) );
		}


		// --- Header Widget Area Visibility

		$opts['hdr_hsb_vism'] = weaverx_cz_group_title( __( 'Header Widget Area Visibility', 'weaver-xtreme' ) );

		$opts['header_sb_hide'] = weaverx_cz_select(
			__( 'Hide Header Widget Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$opts['header_sb_add_class'] = weaverx_cz_add_class( __( 'Header Widget Area: Add Classes', 'weaver-xtreme' ) );
		}
	}

	return $opts;
}

function weaverx_controls_w_header_html() {



	if ( weaverx_options_level() <= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['w_header-html-title'] = weaverx_cz_group_title(
			__( 'Header HTML', 'weaver-xtreme' ),
			__( 'Add arbitrary HTML to Header Area when in FULL Options Level.', 'weaver-xtreme' ) );
	} else {
		$opts['w_header-html-title'] = weaverx_cz_group_title(
			__( 'Header HTML', 'weaver-xtreme' ),
			__( 'Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)', 'weaver-xtreme' ) );

		$opts['header_html_text'] = weaverx_cz_htmlarea(
			__( 'Header HTML Content', 'weaver-xtreme' ),
			__( 'Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)', 'weaver-xtreme' ),
			'2',
			'',
			'refresh' );

		$opts['header_html_color'] = weaverx_cz_color(
			'header_html_color',
			__( 'Header HTML Area Text Color', 'weaver-xtreme' ) );

		$opts['header_html_bgcolor'] = weaverx_cz_color(
			'header_html_bgcolor',
			__( 'Header HTML Area BG Color', 'weaver-xtreme' ) );

		$opts = array_merge( $opts, weaverx_cz_fonts_control( 'header_html', __( 'Header HTML Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

		$opts['spacing-htmltarea-header'] = weaverx_cz_group_title( __( 'Header HTML Area Alignment and Spacing', 'weaver-xtreme' ) );

		$opts['header_html_width_int'] = weaverx_cz_range_float(
			__( 'Header HTML Area Width (%)', 'weaver-xtreme' ),
			__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align HTML Area "Center align" setting. You will have to "Save & Publish" and refresh this page if you are using Center Area align. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
			100,
			array(
				'min'  => 0,
				'max'  => 100,
				'step' => 0.5,
			),
			'postMessage'
		);

		$opts['header_html_align'] = weaverx_cz_select(
			__( 'Align Header HTML Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_align', 'float-left', 'refresh'
		);

		$opts['header_html_center_content'] = weaverx_cz_checkbox_post(
			__( 'Center Content within HTML Area', 'weaver-xtreme' )
		);

		$opts['header_html_padding_T'] = weaverx_cz_range(
			__( 'Top Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_html_padding_B'] = weaverx_cz_range(
			__( 'Bottom Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_html_padding_L'] = weaverx_cz_range(
			__( 'Left Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_html_padding_R'] = weaverx_cz_range(
			__( 'Right Padding (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['header_html_margin_T'] = weaverx_cz_range(
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

		$opts['header_html_margin_B'] = weaverx_cz_range(
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


		$opts['hdr_html_stylem'] = weaverx_cz_group_title( __( 'Header HTML Area Style', 'weaver-xtreme' ) );

		$opts['header_html_border'] = weaverx_cz_checkbox_post(
			__( 'Add border to Header HTML Area', 'weaver-xtreme' )
		);

		$opts['header_html_shadow'] = weaverx_cz_select(
			__( 'Add shadow to Header HTML Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_shadow', '-0', 'postMessage'
		);

		$opts['header_html_rounded'] = weaverx_cz_select(
			__( 'Add rounded corners to Header HTML Area', 'weaver-xtreme' ), '',
			'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
		);

		$opts['hdr_html_vism'] = weaverx_cz_group_title( __( 'Header HTML Area Visibility', 'weaver-xtreme' ) );

		$opts['header_html_hide'] = weaverx_cz_select(
			__( 'Hide Header HTML Area', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$opts['header_html_add_class'] = weaverx_cz_add_class( __( 'Header HTML Area: Add Classes', 'weaver-xtreme' ) );
		}

	}

	return $opts;
}

function weaverx_controls_w_header_layout() {
	$opts = array();


	$opts['images-heading-header'] = weaverx_cz_group_title( __( 'Site Header Media', 'weaver-xtreme' ),
		weaverx_markdown( __( 'You can set the header image on the *Header Media* menu, one level up from here.', 'weaver-xtreme' ) ) );


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['images-heading-altimg'] = weaverx_cz_heading(
			__( 'Alternate Header Images', 'weaver-xtreme' ),
			weaverx_markdown( __( 'You can specify alternate header images using the Content and Post Specific *Featured Image Location* option on the *Images* panel, as well as Per Page and Per Post options.', 'weaver-xtreme' ) )
		);
	}

	$opts['images-header-image-title'] = weaverx_cz_group_title(
		__( 'Header Image', 'weaver-xtreme' ),
		__( 'Settings for Site Header Image. <em style="color:#ff0000;">These Image settings DO NOT apply to the Header Video.</em>', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['hide_header_image'] = weaverx_cz_select(
			__( 'Hide Header Image', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);

		$opts['hide_header_image_front'] = weaverx_cz_checkbox(
			__( 'Hide Header Image on Front Page', 'weaver-xtreme' )
		);
	}


	$opts['link_site_image'] = weaverx_cz_checkbox( __( 'Header Image Links to Site', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Check to add a link to site home page for Header Image. **Note:** If used with *Move Title/Tagline over Image*, parts of the header image will not be clickable.', 'weaver-xtreme' ) ) );

	$opts['header_image_align'] = weaverx_cz_select(
		__( 'Align Header Image', 'weaver-xtreme' ),
		__( 'How to align header image. Wide and Full do not apply to BG header image.', 'weaver-xtreme' ),
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['header_image_render'] = weaverx_cz_select_plus(
		__( 'Header Image Rendering', 'weaver-xtreme' ),
		weaverx_markdown( __( 'How to render header image: as img in header or as header area bg image. When rendered as a BG image, other options such as moving Title/Tagline or having image link to home page are not meaningful. Optionally, use *Suggested Header Image Height* above to control BG image height.', 'weaver-xtreme' ) ),
		array(
			'header-as-img'           => esc_html__( 'As img in header', 'weaver-xtreme' ),
			'header-as-bg'            => esc_html__( 'As static BG image', 'weaver-xtreme' ),
			'header-as-bg-responsive' => esc_html__( 'As responsive BG image', 'weaver-xtreme' ),
			'header-as-bg-parallax'   => esc_html__( 'As parallax BG image', 'weaver-xtreme' ),
		),
		'header-as-img', 'refresh'
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['header_min_height'] = weaverx_cz_range(
			__( 'Minimum Header Height (px)', 'weaver-xtreme' ),
			__( 'Set Minimum Height for Header Area. Most useful used with Parallax Header BG Image. Adding Top Margin to Primary Menu bar can also add height.', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 10,
			),
			'refresh',
			'plus'
		);

		$opts['header_image_max_width_dec'] = weaverx_cz_range_float(
			__( 'Maximum Image Width (%)', 'weaver-xtreme' ),
			__( 'Maximum width of Header Image. Can be useful to change Header Image alignment.', 'weaver-xtreme' ),
			100.0,
			array(
				'min'  => 10,
				'max'  => 100,
				'step' => .5,
			),
			'refresh',
			'plus'
		);

		$opts['header_actual_size'] = weaverx_cz_checkbox_post( __( 'Use Actual Image Size', 'weaver-xtreme' ),
			__( 'Check to use actual header image size. (Default: theme width)', 'weaver-xtreme' ), 'plus' );

		if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
			$opts['header_image_height_int'] = weaverx_cz_range(
				__( 'Suggested Header Image Height (px)', 'weaver-xtreme' ),
				weaverx_markdown( __( 'Change the suggested height of the Header Image. Standard size is 188. This height is only a suggestion, and only affects the clipping window on the Customizer *Images &rarr; Header Banner Images* panel after you refresh the whole Customize interface. Header images will always be responsively sized. (Default header image width: theme width)', 'weaver-xtreme' ) ),
				188,
				array(
					'min'  => 10,
					'max'  => 2400,
					'step' => 5,
				)
			);
		}

		$opts['header-image-html-rep-head'] = weaverx_cz_group_title(
			__( 'Replace Header Image with HTML', 'weaver-xtreme' ),
			''
		);

		$opts['header_image_html_text'] = weaverx_cz_html_textarea(
			__( 'Image HTML Replacement', 'weaver-xtreme' ),
			__( 'Replace Header image with arbitrary HTML. Useful for slider shortcodes in place of image. FI as Header Image has priority over HTML replacement. Extreme Plus also supports this option on a Per Page/Post basis.', 'weaver-xtreme' ),
			'2', 'refresh'
		);

		$opts['header_image_html_home_only'] = weaverx_cz_checkbox(
			__( 'Show Replacement only on Front Page', 'weaver-xtreme' ),
			__( 'Check to use the Image HTML Replacement only on your Front/Home page. Extreme Plus support Per Page/Post control.', 'weaver-xtreme' )
		);

		$opts['header_image_html_plus_bg'] = weaverx_cz_checkbox( __( 'Also show BG Header Image', 'weaver-xtreme' ),
			__( 'If you have Image HTML Replacement defined - including Per Page/Post - and also have have set the standard Header Image to display as a BG image, then show <em>both</em> the BG image and the replacement HTML.', 'weaver-xtreme' ), 'plus' );
	}

	$wp_logo = weaverx_get_wp_custom_logo_url();


	if ( $wp_logo ) {
		$logo = '<br /><br />' . __( 'Current Site Logo: ', 'weaver-xtreme' ) . "<img src='" . esc_url( $wp_logo ) . "' style='max-height:36px;margin-left:10px;' />";
	} else {
		$logo = '<br /><br />' . weaverx_markdown( __( '***Site Logo has not been set.***', 'weaver-xtreme' ) );
	}

	// Site Logo

	$opts['images-heading-header-logo'] = weaverx_cz_group_title( __( 'Site Logo', 'weaver-xtreme' ),
		weaverx_markdown( __( ' The Site Logo is set on the *Global Site Settings : Site Identity* menu.', 'weaver-xtreme' )
		                  . $logo ) );

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['hide_wp_site_logo'] = weaverx_cz_select(     // V4.4: MOVED from Images:Header
			__( 'Hide Site Logo', 'weaver-xtreme' ),
			__( 'IMPORTANT! This option only applies to the Site Logo when used in the Header. It does NOT apply to the Site Logo on the Menu, nor as the replacement for the Site Title.', 'weaver-xtreme' ),
			'weaverx_cz_choices_hide', 'hide-none', 'refresh'
		);
	}


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['wplogo_for_title'] = weaverx_cz_checkbox( __( 'Replace Title with Site Logo', 'weaver-xtreme' ),
			__( 'Replace the Site Title text with the WP Custom Logo Image', 'weaver-xtreme' ) );


		$opts['header_logo_height_dec'] = weaverx_cz_range(
			__( 'Logo as Title Replacement Height (px)', 'weaver-xtreme' ),
			__( 'Set height of Logo on Menu. Will interact with padding. (Default: 32px)', 'weaver-xtreme' ),
			32,
			array(
				'min'  => 10,
				'max'  => 200,
				'step' => 1,
			)
		);
	}

	// Video

		$opts['images-heading-header-video'] = weaverx_cz_group_title(
			__( 'Header Video', 'weaver-xtreme' ),
			__( 'You can set the Header Video on the <em>Customize : Images : Header Media</em> menu.', 'weaver-xtreme' )
		);

	if ( function_exists('has_header_video') && has_header_video() ) {

		$opts['header_video_render'] = weaverx_cz_select(
			__( 'Header Video Rendering', 'weaver-xtreme' ),
			__( 'How to render Header Video: as image substitute in header or as full browser background cover image will parallax effect. <em style="color:red;">Note that the Header Image options above do not apply to the Header Video media.</em>', 'weaver-xtreme' ),
			'weaverx_cz_choices_render_header_video', 'has-header-video',
			'refresh'
		);

		$opts['header_video_aspect'] = weaverx_cz_select(
			__( 'Header Video Aspect Ratio', 'weaver-xtreme' ),
			__( '<strong style="color:red;">CRITICAL SETTING!</strong> It is critical to select aspect ratio of your video. HD 16:9 is the default. This setting should correspond to the native aspect ratio of your video. YouTube allows you to upload any aspect ratio. Most aspect ratios work will for the full cover BG display, or a Banner ratio may work better for the header only view. Ideally, the matching header image will have the same aspect ratio, but it is not critical. If you see letterboxing black bars, you have the wrong aspect ratio selected.', 'weaver-xtreme' ),
			'weaverx_cz_choices_header_video_aspect',
			'16:9',
			'refresh'
		);
	}

	// Related

	$opts['images-heading-other'] = weaverx_cz_group_title(
		__( 'Related Settings', 'weaver-xtreme' )
	);

	$opts['images-heading-srch'] = weaverx_cz_heading(
		__( 'Search Box Icon', 'weaver-xtreme' ),
		__( 'The icon used in search boxes can be changed in the <em>Colors &rarr; Content</em> section.', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_ADVANCED ) {        // show if advanced

		$opts['w_header-cust-css4'] = weaverx_cz_group_title(
			__( 'Add Classes', 'weaver-xtreme' ) );
		$opts['header_image_add_class'] = weaverx_cz_add_class( __( 'Header Image: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

