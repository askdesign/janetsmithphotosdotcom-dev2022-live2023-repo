<?php

/**
 * Define the sections and settings for the spacing panel
 */

function weaverx_customizer_define_spacing_sections() {
	$panel = 'weaverx_spacing';
	$spacing_sections = array();

	// global settings

	$spacing_sections['spacing-global'] = array(
		'panel'       => $panel,
		'title'       => __( 'Site Wide Spacing', 'weaver-xtreme' ),
		'description' => 'Set site settings that affect width and height.',
		'options'     => weaverx_controls_spacing_global(),
	);


	/**
	 * Wrapping areas
	 */

	$spacing_sections['spacing-wrapping'] = array(
		'panel'       => $panel,
		'title'       => __( 'Wrapping Areas', 'weaver-xtreme' ),
		'description' => 'Set margins, padding, spacing, positioning, and widths for site wrapper and container.',
		'options'     => weaverx_controls_spacing_wrapping(),
	);


	/**
	 * Site Header
	 *
	 */

	$spacing_sections['spacing-header'] = array(
		'panel'       => $panel,
		'title'       => __( 'Header Area', 'weaver-xtreme' ),
		'description' => weaverx_markdown( __( 'Set spacing for Header Area. Option groups include **Site Header Area, Site Title and Tagline, Header Widget Area**, and **Header HTML Area**.', 'weaver-xtreme' ) ),
		'options'     => weaverx_controls_spacing_header(),
	);


	/**
	 * Main Menu
	 */

	$spacing_sections['spacing-menus'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
		'description' => esc_html__( 'Set spacing for Primary, Secondary, and Extra Menus.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_menus(),
	);


	/**
	 * Info Bar
	 */
	$spacing_sections['spacing-info-bar'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Info Bar', 'weaver-xtreme' ),
		'description' => esc_html__( 'Info Bar with breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_infobar(),
	);


	/**
	 * Content
	 */
	$spacing_sections['spacing-content'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
		'description' => esc_html__( 'Spacing for general page and post content.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_content(),
	);


	/**
	 * Post Specific
	 */
	$spacing_sections['spacing-post-specific'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
		'description' => esc_html__( 'Post Specific spacing - override Content spacing.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_postspecific(),
	);


	/**
	 * Sidebars
	 */

	$spacing_sections['spacing-sidebars'] = array(
		'panel'       => $panel,
		'title'       => __( 'Sidebars / Widget Areas', 'weaver-xtreme' ),
		'description' => __( 'Primary and Secondary Sidebars, and Top and Bottom Widget Areas.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_sidebars(),
	);


	/**
	 * Widgets
	 */
	$spacing_sections['spacing-widgets'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
		'description' => esc_html__( 'Padding and Margins for Individual Widgets. Widget width responsively determined by enclosing area.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_spacing_widgets(),
	);


	/**
	 * Footer
	 */


	$spacing_sections['spacing-footer'] = array(
		'panel'       => $panel,
		'title'       => esc_html__( 'Footer Area', 'weaver-xtreme' ),
		'description' => weaverx_markdown( __( 'Set spacing for Footer Area. Option groups include **Site Footer Area, Site Title and Tagline, Footer Widget Area**, and **Footer HTML Area**.', 'weaver-xtreme' ) ),
		'options'     => weaverx_controls_spacing_footer(),
	);


	return $spacing_sections;
}

function weaverx_controls_spacing_global() {
	$opts = array();

	$opts['fullwidth-expand-swide'] = weaverx_cz_group_title( __( 'Site Width', 'weaver-xtreme' ),
		__( 'Maximum width of your site on a desktop browser. This is the width of the #wrapper area for standard display. Full width layouts and alignments may change the display width of content, but each site should have a designed maximum width.', 'weaver-xtreme' ) );

	$opts['theme_width_int'] = weaverx_cz_range(
		__( 'Site Width (px)', 'weaver-xtreme' ),
		__( 'Note: This is the maximum width on desktops. Mobile devices adjust width responsively.', 'weaver-xtreme' ),
		WEAVERX_THEME_WIDTH,
		array( 'min' => 770, 'max' => 3200, 'step' => 10 )
	);

	$opts['smart_margin_int'] = weaverx_cz_range_float(
		__( 'Smart Margin Width (%)', 'weaver-xtreme' ),
		__( 'Width used for smart column margins for Sidebars and Content Area. (Default: 1%)', 'weaver-xtreme' ),
		1.0,
		array( 'min' => 0.25, 'max' => 10.0, 'step' => 0.25 ),
		'refresh',
		'plus'
	);

	return $opts;
}

function weaverx_controls_spacing_wrapping() {
	$opts = array();


	// ------- WRAPPER

	$opts['wrapper-space-heading'] = weaverx_cz_group_title( __( 'Global Wrapper Area', 'weaver-xtreme' ),
		__( 'The Wrapper is the area that wraps entire site. Please see the Site Wide Spacing menu to set the site width.', 'weaver-xtreme' )
	);

	$opts['wrapper_align'] = weaverx_cz_select(
		__( 'Align Wrapper Area', 'weaver-xtreme' ), '',
		'weaverx_cz_choices_align', 'align-center', 'refresh'
	);

	$opts['wrapper_padding_T'] = weaverx_cz_range(
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

	$opts['wrapper_padding_B'] = weaverx_cz_range(
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

	$opts['wrapper_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'wrapper_align'
	);

	$opts['wrapper_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'wrapper_align'
	);

	$opts['wrapper_padding_LRp'] = weaverx_cz_range_float(
		__( 'Wrapper Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		'',
		'~wrapper_align'    // ~ means show if alignwide or alignfull
	);

	$opts['wrapper_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Set Top and Bottom Margins. **Side margins are auto-generated.**', 'weaver-xtreme' ) ),
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['wrapper_margin_B'] = weaverx_cz_range(
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

	$opts['full_browser_height'] = weaverx_cz_checkbox(
		__( 'Full Browser Height', 'weaver-xtreme' ),
		__( 'For short pages, add extra padding to bottom of content to force full browser height.', 'weaver-xtreme' )
	);

	// ------- CONTAINER

	$opts['container-space-heading'] = weaverx_cz_group_title( __( 'Container Area', 'weaver-xtreme' ),
		__( 'The Container is the &lt;div&gt; that wraps the content. Does not include Header and Footer.', 'weaver-xtreme' ) );

	$opts['container_align'] = weaverx_cz_select(
		__( 'Align Container Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);


	$opts['container_padding_T'] = weaverx_cz_range(
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

	$opts['container_padding_B'] = weaverx_cz_range(
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

	$opts['container_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'container_align'
	);

	$opts['container_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'container_align'
	);

	$opts['container_padding_LRp'] = weaverx_cz_range_float(
		__( 'Container Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		'',
		'~container_align'    // ~ means show if alignwide or alignfull
	);

	$opts['container_margin_T'] = weaverx_cz_range(
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

	$opts['container_margin_B'] = weaverx_cz_range(
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

	$opts['container_width_int'] = weaverx_cz_range_float(
		__( 'Container Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage',
		'',
		'container_align'
	);

	$opts['container_max_width_int'] = weaverx_cz_range(
		__( 'Container Area Max Width (px)', 'weaver-xtreme' ),
		__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area. Use 0 for no Max Width.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 4000,
			'step' => 5,
		),
		'postMessage',
		'plus',
		'container_align'
	);

	return $opts;
}

function weaverx_controls_spacing_header() {
	$opts = array();

	$hdr_width_transport = 'postMessage';    // 'header_extend_width' ? 'refresh' removed for V5

	$opts['spacing-heading-header'] = weaverx_cz_group_title( __( 'Site Header Area', 'weaver-xtreme' ) );


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

	// Title/tagline

	$opts['spacing-title-header'] = weaverx_cz_group_title( __( 'Site Title and Tagline', 'weaver-xtreme' ),
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

	// ------- Header Image

	$opts['hdr_img_align'] = weaverx_cz_group_title(
		__( 'Header Image', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Alignment and other options for the Header Image are found on *Images &rarr; Header Image Layout*.', 'weaver-xtreme' ) )
	);

	// ------- Header Widget Area

	$opts['spacing-widgetarea-header'] = weaverx_cz_group_title( __( 'Header Widget Area', 'weaver-xtreme' ),
		__( 'Spacing for the Header Widget Area', 'weaver-xtreme' ) );

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

	$opts['spacing-heading-widgets'] = weaverx_cz_heading( __( 'Widget Area Columns', 'weaver-xtreme' ),
		__( 'NOTE: You can set number of columns per widget area on the "Layout" panel.', 'weaver-xtreme' ) );


	$opts['spacing-widgetarea-header'] = weaverx_cz_group_title( __( 'Header Widget Area', 'weaver-xtreme' ),
		__( 'Spacing for the Header Widget Area', 'weaver-xtreme' ) );

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

	// ------- Header HTML Area

	$opts['spacing-htmltarea-header'] = weaverx_cz_group_title( __( 'Header HTML Area', 'weaver-xtreme' ),
		__( 'Spacing for the Header HTML Area', 'weaver-xtreme' ) );

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


	return $opts;
}

function weaverx_controls_spacing_menus() {
	$opts = array();


	$opts['primary-mm-title'] = weaverx_cz_group_title(
		__( 'Primary Menu', 'weaver-xtreme' )
	);

	$opts['m_primary_align'] = weaverx_cz_select(
		__( 'Align Primary Menu Bar', 'weaver-xtreme' ),
		__( 'Align this menu on desktop view. Mobile always left aligned.', 'weaver-xtreme' ),
		'weaverx_cz_choices_align_menu', 'left'
	);

	$opts['m_primary_menu_bar_pad_dec'] = weaverx_cz_range_float(
		__( 'Desktop Menu Bar Padding', 'weaver-xtreme' ),
		__( 'Add padding to menu bar top and bottom for Desktop devices.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 10,
			'step' => .1,
		)
	);

	$opts['m_primary_top_margin_dec'] = weaverx_cz_range(
		__( 'Menu Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['m_primary_bottom_margin_dec'] = weaverx_cz_range(
		__( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['m_primary_right_padding_dec'] = weaverx_cz_range_float(
		__( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ),
		__( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0.0,
			'max'  => 6,
			'step' => .2,
		)
	);

	$opts['m_primary_html_margin_dec'] = weaverx_cz_range_float(
		__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ),
		__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => - 5.0,
			'max'  => 5.0,
			'step' => .1,
		),
		'refresh',
		'plus'
	);

	// Secondary Menu

	$opts['spacing-sm-heading'] = weaverx_cz_group_title(
		__( 'Secondary Menu', 'weaver-xtreme' ),
		__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' )
	);

	$opts['m_secondary_align'] = weaverx_cz_select(
		__( 'Align Secondary Menu Bar', 'weaver-xtreme' ),
		__( 'Align this menu on desktop view. Mobile always left aligned.', 'weaver-xtreme' ),
		'weaverx_cz_choices_align_menu', 'left'
	);

	$opts['m_secondary_menu_bar_pad_dec'] = weaverx_cz_range_float(
		__( 'Desktop Menu Bar Padding', 'weaver-xtreme' ),
		__( 'Add padding to menu bar top and bottom for Desktop devices.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 10,
			'step' => .1,
		)
	);

	$opts['m_secondary_top_margin_dec'] = weaverx_cz_range(
		__( 'Menu Top Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['m_secondary_bottom_margin_dec'] = weaverx_cz_range(
		__( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['m_secondary_right_padding_dec'] = weaverx_cz_range_float(
		__( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ),
		__( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0.0,
			'max'  => 6,
			'step' => .2,
		)
	);

	$opts['m_secondary_html_margin_dec'] = weaverx_cz_range_float(
		__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ),
		__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => - 5.0,
			'max'  => 5.0,
			'step' => .1,
		),
		'refresh',
		'plus'
	);

	// Mini Menu

	$opts['spacing-mm-heading'] = weaverx_cz_group_title(
		esc_html__( 'Header Mini Menu', 'weaver-xtreme' ), '' );

	$opts['m_header_mini_top_margin_dec'] = weaverx_cz_range_float(
		__( 'Mini Menu Top Margin (em)', 'weaver-xtreme' ),
		__( 'Top margin for Header Mini Menu. Negative value moves it up. (Default: -1.0em)', 'weaver-xtreme' ),
		- 1,
		array(
			'min'  => - 10.0,
			'max'  => 10.0,
			'step' => 0.25,
		),
		'refresh'
	);

	// Extra Menus

	if ( weaverx_cz_is_plus() ) {
		$opts['extra-sm-heading'] = weaverx_cz_group_title(
			__( 'Extra Menu', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You must define an Extra Menu from the Custom Menus Content menu.', 'weaver-xtreme' )
		);

		$opts['m_extra_align'] = weaverx_cz_select(
			__( 'Align Extra Menu Bar', 'weaver-xtreme' ),
			__( 'Align this menu on desktop view. Mobile always left aligned.', 'weaver-xtreme' ),
			'weaverx_cz_choices_align_menu', 'left'
		);


		$opts['m_extra_top_margin_dec'] = weaverx_cz_range(
			__( 'Menu Top Margin (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['m_extra_bottom_margin_dec'] = weaverx_cz_range(
			__( 'Menu Bottom Margin (px)', 'weaver-xtreme' ),
			'',
			0,
			array(
				'min'  => 0,
				'max'  => 30,
				'step' => 1,
			),
			'postMessage'
		);

		$opts['m_extra_right_padding_dec'] = weaverx_cz_range_float(
			__( 'Desktop Menu Spacing (em)', 'weaver-xtreme' ),
			__( 'Add space between desktop menu bar items. (not on Smart Menus)', 'weaver-xtreme' ),
			0,
			array(
				'min'  => 0.0,
				'max'  => 6,
				'step' => .2,
			)
		);

		$opts['m_extra_html_margin_dec'] = weaverx_cz_range_float(
			__( 'Menu HTML: Top Margin (em)', 'weaver-xtreme' ),
			__( 'Margin above Added Menu HTML (Used to adjust for Desktop menu. Negative values can help.)', 'weaver-xtreme' ),
			0,
			array(
				'min'  => - 5.0,
				'max'  => 5.0,
				'step' => .1,
			),
			'refresh',
			'plus'
		);

	} else {
		$opts = array_merge( $opts,
			weaverx_cz_add_plus_message(
				'spacing_menus', __( 'Extra Menu', 'weaver-xtreme' ),
				__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) )
		);
	}

	return $opts;
}

function weaverx_controls_spacing_infobar() {
	$opts = array();


	$opts['spacing-info-bar-heading'] =
		weaverx_cz_heading( __( 'Info Bar', 'weaver-xtreme' ) );

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

	return $opts;
}

function weaverx_controls_spacing_content() {
	$opts = array();


	$opts['content-spacing-t'] = weaverx_cz_group_title(
		__( 'Content Area Padding & Margins', 'weaver-xtreme' )
	);

	$opts['content_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		4,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['content_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['content_padding_L'] = weaverx_cz_range_float(
		__( 'Left Padding (%)', 'weaver-xtreme' ),
		'',
		2.,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => .25,
		),
		'postMessage'
	);

	$opts['content_padding_R'] = weaverx_cz_range_float(
		__( 'Right Padding (%)', 'weaver-xtreme' ),
		'',
		2.,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => .25,
		),
		'postMessage'
	);

	$opts['content_margin_T'] = weaverx_cz_range(
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

	$opts['content_margin_B'] = weaverx_cz_range(
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

	$opts['spacing-content-widthinfo'] = weaverx_cz_heading( __( 'Width', 'weaver-xtreme' ),
		__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) );

	$opts['content-spacing-t2'] = weaverx_cz_group_title(
		__( 'Other Spacing', 'weaver-xtreme' )
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['content_smartmargin'] = weaverx_cz_checkbox(
			__( 'Add Side Margin(s)', 'weaver-xtreme' ),
			__( 'Automatically add left/right "smart" margins for separation of areas ( sidebar/content ). This is normally used only if you have borders or BG colors for your sidebars.', 'weaver-xtreme' )
		);
	}

	$opts['space_after_title_dec'] = weaverx_cz_range_float(
		__( 'Space Between Title and Content (em)', 'weaver-xtreme' ),
		__( 'Space between Page or Post title and beginning of content.', 'weaver-xtreme' ),
		1.0,
		array(
			'min'  => 0,
			'max'  => 20.0,
			'step' => 0.1,
		),
		'postMessage'
	);

	$opts['content_p_list_dec'] = weaverx_cz_range_float(
		__( 'Space after paragraphs and lists (em)', 'weaver-xtreme' ),
		'',
		1.5,
		array(
			'min'  => 0,
			'max'  => 20.0,
			'step' => 0.1,
		),
		'postMessage'
	);

	$opts['content-block-spacing'] = weaverx_cz_group_title( __( 'Block Editor Element Margins', 'weaver-xtreme' ) );

	$opts['content_block_margin_T'] = weaverx_cz_range_float(
		__( 'Margin Before Blocks (em)', 'weaver-xtreme' ),
		__( 'Add margins to non-paragraph Blocks created with Block Editor.', 'weaver-xtreme' ),
		1.2,
		array(
			'min'  => 0,
			'max'  => 20.0,
			'step' => 0.1,
		)
	);


	$opts['content_block_margin_B'] = weaverx_cz_range(
		__( 'Margin After Blocks (em)', 'weaver-xtreme' ),
		__( 'Add margins to non-paragraph Blocks created with Block Editor.', 'weaver-xtreme' ),
		1.5,
		array(
			'min'  => 0,
			'max'  => 20.0,
			'step' => 0.1,
		)
	);


	return $opts;
}

function weaverx_controls_spacing_postspecific() {
	$opts = array();

	$opts['post_padding_T'] = weaverx_cz_range(
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

	$opts['post_padding_B'] = weaverx_cz_range(
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

	$opts['post_padding_L'] = weaverx_cz_range_float(
		__( 'Left Padding (%)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => .25,
		),
		'postMessage'
	);

	$opts['post_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (%)', 'weaver-xtreme' ),
		'',
		0,
		array(
			'min'  => 0,
			'max'  => 30,
			'step' => .25,
		),
		'postMessage'
	);

	$opts['post_margin_T'] = weaverx_cz_range(
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

	$opts['post_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		15,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['spacing-post-widthinfo'] = weaverx_cz_heading( __( 'Width', 'weaver-xtreme' ),
		__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['post_smartmargin'] = weaverx_cz_checkbox(
			__( 'Add Side Margin(s)', 'weaver-xtreme' ),
			__( 'Automatically add left/right "smart" margins for separation of areas ( sidebar/content ). This is normally used only if you have borders or BG colors for your sidebars.', 'weaver-xtreme' )
		);
	}

	$opts['post_title_bottom_margin_dec'] = weaverx_cz_range_float(
		__( 'Space Between Post Title and Content (em)', 'weaver-xtreme' ),
		__( 'Space between Post title and beginning of content. This will adjust/override the equivalent Content setting.', 'weaver-xtreme' ),
		0.2,
		array(
			'min'  => - 5.0,
			'max'  => 20.0,
			'step' => 0.1,
		),
		'postMessage'
	);

	return $opts;
}

function weaverx_controls_spacing_sidebars() {
	$opts = array();

	$opts['spacing-sidbars-heading'] = weaverx_cz_group_title( __( 'Sidebar Widths', 'weaver-xtreme' ),
		__( 'Width of the left and right vertical sidebars in the Container Area. Note that the width of the adjoining Content area is automatically determined by the sidebar layouts and widths.', 'weaver-xtreme' ) );

	$opts['left_sb_width_int'] = weaverx_cz_range_float(
		__( 'Left Sidebar Width (%)', 'weaver-xtreme' ),
		'',
		25.,
		array(
			'min'  => 0,
			'max'  => 90,
			'step' => .5,
		)
	);

	$opts['right_sb_width_int'] = weaverx_cz_range_float(
		__( 'Right Sidebar Width (%)', 'weaver-xtreme' ),
		'',
		25.,
		array(
			'min'  => 0,
			'max'  => 90,
			'step' => .5,
		)
	);

	$opts['left_split_sb_width_int'] = weaverx_cz_range_float(
		__( 'Width for Split Sidebar, Left Side', 'weaver-xtreme' ),
		'',
		25.,
		array(
			'min'  => 10,
			'max'  => 100,
			'step' => .5,
		)
	);

	$opts['right_split_sb_width_int'] = weaverx_cz_range_float(
		__( 'Width for Split Sidebar, Right Side', 'weaver-xtreme' ),
		'',
		25.,
		array(
			'min'  => 10,
			'max'  => 100,
			'step' => .5,
		)
	);

	$opts['spacing-primary-widget-heading'] = weaverx_cz_group_title( __( 'Primary Sidebar', 'weaver-xtreme' ) );

	$opts['primary_padding_T'] = weaverx_cz_range(
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

	$opts['primary_padding_B'] = weaverx_cz_range(
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

	$opts['primary_padding_L'] = weaverx_cz_range(
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

	$opts['primary_padding_R'] = weaverx_cz_range(
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

	$opts['primary_margin_T'] = weaverx_cz_range(
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

	$opts['primary_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['spacing-primary-widthinfo'] = weaverx_cz_heading( __( 'Width', 'weaver-xtreme' ),
		__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['primary_smartmargin'] = weaverx_cz_checkbox(
			__( 'Add Side Margin(s)', 'weaver-xtreme' ),
			__( 'Automatically add left/right "smart" margins for separation of areas ( sidebar/content ). This is normally used only if you have borders or BG colors for your sidebars.', 'weaver-xtreme' )
		);
	}

	$opts['spacing-primary-widgets'] = weaverx_cz_heading( __( 'Widget Area Columns', 'weaver-xtreme' ),
		__( '**NOTE:** You can set number of columns per widget area on the *Layout* panel.', 'weaver-xtreme' ) );

	$opts['spacing-secondary-widget-heading'] = weaverx_cz_group_title( __( 'Secondary Sidebar', 'weaver-xtreme' ) );

	$opts['secondary_padding_T'] = weaverx_cz_range(
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

	$opts['secondary_padding_B'] = weaverx_cz_range(
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

	$opts['secondary_padding_L'] = weaverx_cz_range(
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

	$opts['secondary_padding_R'] = weaverx_cz_range(
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

	$opts['secondary_margin_T'] = weaverx_cz_range(
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

	$opts['secondary_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['spacing-secondary-widthinfo'] = weaverx_cz_heading(
		__( 'Width', 'weaver-xtreme' ),
		__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['secondary_smartmargin'] = weaverx_cz_checkbox(
			__( 'Add Side Margin(s)', 'weaver-xtreme' ),
			__( 'Automatically add left/right "smart" margins for separation of areas ( sidebar/content ). This is normally used only if you have borders or BG colors for your sidebars.', 'weaver-xtreme' )
		);
	}

	// Top/Bottom Widget areas

	$opts['spacing-top-widget-heading'] = weaverx_cz_group_title( __( 'Top Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );

	$opts['top_width_int'] = weaverx_cz_range_float(
		__( 'Top Widget Areas Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => .5,
		)
	);


	$opts['top_align'] = weaverx_cz_select(
		__( 'Align Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['top_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['top_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['top_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['top_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['top_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['top_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);


	$opts['spacing-top-widgets'] = weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
		wp_kses_post( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) )
	);

	// Bottom Widget Areas

	$opts['spacing-bot-widget-heading'] = weaverx_cz_group_title( __( 'Bottom Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );


	$opts['bottom_width_int'] = weaverx_cz_range_float(
		__( 'Bottom Widget Areas Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Container "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => .5,
		)
	);


	$opts['bottom_align'] = weaverx_cz_select(
		__( 'Align Widget Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['bottom_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['bottom_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['bottom_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['bottom_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['bottom_margin_T'] = weaverx_cz_range(
		__( 'Top Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['bottom_margin_B'] = weaverx_cz_range(
		__( 'Bottom Margin (px)', 'weaver-xtreme' ),
		'',
		10,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['spacing-bottom-widgets'] = weaverx_cz_heading( esc_html__( 'Widget Area Columns', 'weaver-xtreme' ),
		wp_kses_post( __( '<strong>NOTE:</strong> You can set number of columns per widget area on the <em>Layout</em> panel.', 'weaver-xtreme' ) )
	);

	return $opts;
}

function weaverx_controls_spacing_widgets() {
	$opts = array();

	// ------- Widgets

	$opts['widget_padding_T'] = weaverx_cz_range(
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

	$opts['widget_padding_B'] = weaverx_cz_range(
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

	$opts['widget_padding_L'] = weaverx_cz_range(
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

	$opts['widget_padding_R'] = weaverx_cz_range(
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

	$opts['widget_margin_T'] = weaverx_cz_range(
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

	$opts['widget_margin_B'] = weaverx_cz_range(
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

	return $opts;
}

function weaverx_controls_spacing_footer() {
	$opts = array();

	$foot_width_transport = 'refresh';


	$opts['spacing-heading-footer'] = weaverx_cz_group_title( __( 'Site Footer Area', 'weaver-xtreme' ),
		__( 'Spacing of the whole Footer Area', 'weaver-xtreme' ) );


	$opts['footer_align'] = weaverx_cz_select(
		__( 'Align Footer Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		__( 'These options control the padding ( inner space ) around the area.', 'weaver-xtreme' ),
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'footer_align'
	);

	$opts['footer_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage',
		'',
		'footer_align'
	);

	$opts['footer_padding_LRp'] = weaverx_cz_range_float(
		__( 'Footer Left/Right Padding (%)', 'weaver-xtreme' ),
		__( 'Left and Right Padding in % for Align Wide and Align Full. This allows you to have shrinking margins as the browser width shrinks. On mobile devices, uses 0.5% padding if this option has value.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 25.0,
			'step' => 0.5,
		),
		'refresh',
		'',
		'~footer_align'    // ~ means show if alignwide or alignfull
	);

	$opts['footer_margin_T'] = weaverx_cz_range(
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

	$opts['footer_margin_B'] = weaverx_cz_range(
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

	$opts['footer_width_int'] = weaverx_cz_range_float(
		__( 'Footer Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Footer "Center align" setting. (Default: 100%, 0 means auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'',
		'footer_align'    // ~ means show if alignwide or alignfull
	);

	$opts['footer_max_width_int'] = weaverx_cz_range(
		__( 'Footer Area Max Width (px)', 'weaver-xtreme' ),
		__( 'This advanced option allows you to set a maximum width for this area. This is not commonly used, but can make interesting designs, especially if you center align the area.  Use 0 for no Max Width.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 4000,
			'step' => 5,
		),
		'postMessage',
		'plus',
		'footer_align'    // ~ means show if alignwide or alignfull
	);



	// ------- Footer Widget Area

	$opts['spacing-widgetarea-footer'] = weaverx_cz_group_title( __( 'Footer Widget Area', 'weaver-xtreme' ),
		__( 'Spacing for the Footer Widget Area', 'weaver-xtreme' ) );

	$opts['footer_sb_width_int'] = weaverx_cz_range_float(
		__( 'Footer Widget Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align Footer Widget Area "Center align" setting. (Default: 0, means auto)', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage'
	);

	$opts['footer_sb_align'] = weaverx_cz_select(
		__( 'Align Footer Widget Area Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_sb_padding_T'] = weaverx_cz_range(
		__( 'Top Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_B'] = weaverx_cz_range(
		__( 'Bottom Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_L'] = weaverx_cz_range(
		__( 'Left Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_padding_R'] = weaverx_cz_range(
		__( 'Right Padding (px)', 'weaver-xtreme' ),
		'',
		8,
		array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1,
		),
		'postMessage'
	);

	$opts['footer_sb_margin_T'] = weaverx_cz_range(
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

	$opts['footer_sb_margin_B'] = weaverx_cz_range(
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

	$opts['spacing-footer-widgets'] = weaverx_cz_heading( __( 'Widget Area Columns', 'weaver-xtreme' ),
		__( 'NOTE: You can set number of columns per widget area on the "Layout" panel.', 'weaver-xtreme' ) );


	// ------- Footer HTML Area

	$opts['spacing-htmltarea-footer'] = weaverx_cz_group_title( __( 'Footer HTML Area', 'weaver-xtreme' ),
		__( 'Spacing for the Footer HTML Area', 'weaver-xtreme' ) );

	$opts['footer_html_width_int'] = weaverx_cz_range_float(
		__( 'Footer HTML Area Width (%)', 'weaver-xtreme' ),
		__( 'Width of Area in % of enclosing area on desktop and small tablet. Hint: use with Align HTML Area "Center align" setting. You will have to "Save & Publish" and refresh this page if you are using Center Area align. (Default: 100%, use 0 for auto)', 'weaver-xtreme' ),
		100.,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'postMessage'
	);

	$opts['footer_html_align'] = weaverx_cz_select(
		__( 'Align Footer HTML Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_align', 'float-left', 'refresh'
	);

	$opts['footer_html_center_content'] = weaverx_cz_checkbox_post(
		__( 'Center Content within HTML Area', 'weaver-xtreme' )
	);

	$opts['footer_html_padding_T'] = weaverx_cz_range(
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

	$opts['footer_html_padding_B'] = weaverx_cz_range(
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

	$opts['footer_html_padding_L'] = weaverx_cz_range(
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

	$opts['footer_html_padding_R'] = weaverx_cz_range(
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

	$opts['footer_html_margin_T'] = weaverx_cz_range(
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

	$opts['footer_html_margin_B'] = weaverx_cz_range(
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

	return $opts;
}

