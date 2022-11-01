<?php

/**
 * Define the sections and settings for the  w_menus panel
 */
function weaverx_customizer_define_w_menus_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-menus';
	$w_menus_sections = array();


	/**
	 * Primary
	 */

	$w_menus_sections['w_menus-sec-primary'] = array(
		'panel'       => $panel,
		'title'       => __( 'Primary Menu Bar', 'weaver-xtreme' ),
		'description' => 'Attributes for the Primary Menu Bar (Default Location: Bottom of Header)',
		'options'     => weaverx_controls_w_menus_primary(),

	);

	$w_menus_sections['w_menus-sec-secondary'] = array(
		'panel'       => $panel,
		'title'       => __( 'Secondary Menu Bar', 'weaver-xtreme' ),
		'description' => 'Attributes for the Secondary Menu Bar (Default Location: Top of Header)',
		'options'     => weaverx_controls_w_menus_secondary(),

	);

	$w_menus_sections['w_menus-sec-all-menus'] = array(
		'panel'       => $panel,
		'title'       => __( 'Options for All Menus', 'weaver-xtreme' ),
		'description' => 'Menu Bar enhancements and features',
		'options'     => weaverx_controls_w_menus_all(),

	);

	$w_menus_sections['w_menus-sec-mini-menu'] = array(
		'panel'       => $panel,
		'title'       => __( 'Header Mini Menu', 'weaver-xtreme' ),
		'description' => 'Horizontal "Mini-Menu" displayed right-aligned of Site Tagline',
		'options'     => weaverx_controls_w_menus_mini(),

	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
		$w_menus_sections['w_menus-sec-extra'] = array(
			'panel'       => $panel,
			'title'       => __( 'Extra Menu', 'weaver-xtreme' ),
			'description' => 'Style the [extra_menu] shortcode or Extra Menu Widget (Weaver Xtreme Plus)',
			'options'     => weaverx_controls_w_menus_extra(),

		);
	}

	return $w_menus_sections;
}

// the definitions of the controls for each panel follow


function weaverx_controls_w_menus_primary() {
	$opts = array();


	$opts['visibility-mm-heading'] = weaverx_cz_group_title(
		__( 'Primary Menu Visibility', 'weaver-xtreme' )
	);

	$opts['m_primary_hide'] = weaverx_cz_select(
		__( 'Hide Primary Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_primary_hide_arrows'] = weaverx_cz_checkbox(
		__( 'Hide Primary Menu Arrows', 'weaver-xtreme' ),
		''
	);

	$opts['m_primary_hide_left'] = weaverx_cz_select_plus(
		__( 'Hide Primary Menu Left HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['m_primary_hide_right'] = weaverx_cz_select(
		__( 'Hide Primary Menu Right HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_primary_search'] = weaverx_cz_checkbox(
		__( 'Add Search to Right', 'weaver-xtreme' ),
		__( 'Add slide open search icon to right end of primary menu.', 'weaver-xtreme' ),
		'plus' );


	$opts['menu_nohome'] = weaverx_cz_checkbox(
		__( 'No Home Menu Item', 'weaver-xtreme' ),
		__( "Don't automatically add Home menu item for home page ( as defined in Settings->Reading )", 'weaver-xtreme' )
	);

	$opts['color-mm-heading'] = weaverx_cz_group_title( __( 'Primary Menu Colors', 'weaver-xtreme' ) );

	$opts['m_primary_color'] = weaverx_cz_color(
		'm_primary_color',
		__( 'Primary Menu Bar Text Color', 'weaver-xtreme' ),
		__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_primary_bgcolor'] = weaverx_cz_color(
		'm_primary_bgcolor',
		__( 'Primary Menu Bar BG Color', 'weaver-xtreme' ),
		__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_primary_link_bgcolor'] = weaverx_cz_color(
		'm_primary_link_bgcolor',
		__( 'Item BG Color', 'weaver-xtreme' ),
		__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_primary_hover_color'] = weaverx_cz_color(
		'm_primary_hover_color',
		__( 'Primary Menu Bar Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_primary_hover_bgcolor'] = weaverx_cz_color(
		'm_primary_hover_bgcolor',
		__( 'Primary Menu Bar Hover BG Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_primary_html_color'] = weaverx_cz_color(
		'm_primary_html_color',
		__( 'HTML: Text Color', 'weaver-xtreme' ),
		__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
	);

	$opts['m_primary_sub_color'] = weaverx_cz_color(
		'm_primary_sub_color',
		__( 'Primary Sub-Menu Text Color', 'weaver-xtreme' ),
		'', WEAVERX_MENU_UPDATE );

	$opts['m_primary_sub_bgcolor'] = weaverx_cz_color(
		'm_primary_sub_bgcolor',
		__( 'Primary Sub-Menu BG Color', 'weaver-xtreme' ),
		'', WEAVERX_MENU_UPDATE );

	$opts['m_primary_sub_hover_color'] = weaverx_cz_color(
		'm_primary_sub_hover_color',
		__( 'Primary Sub-Menu Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_primary_sub_hover_bgcolor'] = weaverx_cz_color(
		'm_primary_sub_hover_bgcolor',
		__( 'Primary Sub-Menu Hover BG Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_primary_clickable_bgcolor'] = weaverx_cz_color(
		'm_primary_clickable_bgcolor',
		__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
		__( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. Not used by SmartMenus. (Default: rgba( 255,255,255,0.2)', 'weaver-xtreme' ), 'refresh' );

	$opts['m_primary_dividers_color'] = weaverx_cz_color(
		'm_primary_dividers_color',
		__( 'Dividers between menu items', 'weaver-xtreme' ),
		__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
		'refresh'
	);


	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_primary', __( 'Primary Menu Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	// --- Primary Menu Layout

	$opts['layout-primary-heading'] = weaverx_cz_group_title( __( 'Primary Menu Layout', 'weaver-xtreme' ) );


	$opts['m_primary_fixedtop'] = weaverx_cz_select(    // must be refresh because column class applied to specific page id
		__( 'Fixed-Top Primary Menu', 'weaver-xtreme' ),
		__( 'Fix the Primary Menu to top of page. Use the Menu Align setting to make a full width menu. If you have set the Header to Align Full or Wide, you may want to change the alignment for this item as well.', 'weaver-xtreme' ),
		array(
			'none'       => esc_html__( 'Standard Position : Not Fixed', 'weaver-xtreme' ),
			'fixed-top'  => esc_html__( 'Fixed to Top', 'weaver-xtreme' ),
			'scroll-fix' => esc_html__( 'Fix to Top on Scroll', 'weaver-xtreme' ),
		),
		'none', 'refresh'
	);

	$opts['m_primary_move'] = weaverx_cz_checkbox(
		__( 'Move Primary Menu to Top', 'weaver-xtreme' ),
		__( 'Move Primary Menu at Top of Header Area. This is not the same as a Fixed-Top Menu (Default: Bottom)', 'weaver-xtreme' )
	);


	$opts['m_primary_site_title_left'] = weaverx_cz_checkbox(
		__( 'Add Site Title to Left of Primary Menu', 'weaver-xtreme' ),
		__( 'Adds the Site Title to the left end of the primary menu in larger font size.', 'weaver-xtreme' )
	);


	$opts['m_primary_logo_left'] = weaverx_cz_checkbox(
		__( 'Add Site Logo to Left', 'weaver-xtreme' ),
		__( 'Add the Site Logo to the primary menu. Add custom CSS for <em>.custom-logo-on-menu</em> to style. (Use Customize : Site Identity to set Site Logo.)', 'weaver-xtreme' ) . weaverx_get_logo_html()
	);

	$opts['m_primary_logo_height_dec'] = weaverx_cz_range_float(
		__( 'Logo on Menu Bar Height (em)', 'weaver-xtreme' ),
		__( 'Set height of Logo on Menu. Will interact with padding. Default 0 uses current line height.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 10,
			'step' => .1,
		)
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
		$opts['m_primary_logo_home_link'] = weaverx_cz_checkbox(
			__( 'Logo Links to Home', 'weaver-xtreme' ),
			__( 'Add a link to home page to logo on menu bar ( must use with defined custom menu ).', 'weaver-xtreme' )
		);

		$opts['m_primary_search'] = weaverx_cz_checkbox(
			__( 'Add Search to Right', 'weaver-xtreme' ),
			__( 'Add slide open search icon to right end of primary menu.', 'weaver-xtreme' )
		);

		$opts['m_primary_layout_html_t'] = weaverx_cz_heading( __( 'Left and Right HTML on Menu', 'weaver-xtreme' ) );

		$opts['m_primary_html_left'] = weaverx_cz_textarea( __( 'Left HTML', 'weaver-xtreme' ),
			__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
			'1', __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
			'postMessage', true );

		$opts['m_primary_html_right'] = weaverx_cz_textarea( __( 'Right HTML', 'weaver-xtreme' ),
			'',
			'2',
			__( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
			'postMessage'
		);
	}

	$opts['primary-mm-title'] = weaverx_cz_group_title(
		__( 'Primary Menu Alignment and Spacing', 'weaver-xtreme' )
	);

	$opts['m_primary_align'] = weaverx_cz_select(
		__( 'Align Primary Menu Bar', 'weaver-xtreme' ),
		__( 'Align this menu on desktop view. Mobile always left aligned.', 'weaver-xtreme' ),
		'weaverx_cz_choices_align_menu', 'left'
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
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
	} else {
		$opts['m_primary_for_spacing'] = weaverx_cz_text( __( 'Set to Full Options Level for padding and spacing options.', 'weaver-xtreme' ) );
	}


	// --- Primary Menu Style

	$opts['style-m-heading'] = weaverx_cz_group_title( __( 'Primary Menu Style', 'weaver-xtreme' ) );

	$opts['m_primary_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Primary Menu bar', 'weaver-xtreme' ) );

	$opts['m_primary_sub_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Sub-Menus', 'weaver-xtreme' ) );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
		$opts['m_primary_shadow'] = weaverx_cz_select(
			__( 'Add shadow to menu bar', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_shadow', '-0', 'postMessage'
		);

		$opts['m_primary_sub_noshadow'] = weaverx_cz_heading(
			__( 'Add Shadow to Sub-Menus', 'weaver-xtreme' ),
			__( 'Sub-Menus do not support shadows.', 'weaver-xtreme' )
		);

		$opts['m_primary_rounded'] = weaverx_cz_select(
			__( 'Add rounded corners to menu bar', 'weaver-xtreme' ),
			'',
			'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
		);

		$opts['m_primary_sub_rounded'] = weaverx_cz_checkbox(
			__( 'Rounded Primary Sub-Menu corners', 'weaver-xtreme' )
		);
	} else {
		$opts['m_primary_for_spacing2'] = weaverx_cz_text( __( 'Set to Full Options Level for shadow and rounded options.', 'weaver-xtreme' ) );
	}


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['m_primary_add_class'] = weaverx_cz_add_class_menu( __( 'Primary Menu Bar: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_menus_secondary() {
	$opts = array();

	$opts['visibility-sm-heading'] = weaverx_cz_group_title(
		__( 'Secondary Menu Visibility', 'weaver-xtreme' )
	);

	$opts['m_secondary_hide'] = weaverx_cz_select(
		__( 'Hide Secondary Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_secondary_hide_arrows'] = weaverx_cz_checkbox(
		esc_html__( 'Hide Secondary Menu Arrows', 'weaver-xtreme' )
	);

	$opts['m_secondary_hide_left'] = weaverx_cz_select_plus(
		__( 'Hide Secondary Menu Left HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['m_secondary_hide_right'] = weaverx_cz_select_plus(
		__( 'Hide Secondary Menu Right HTML', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['color-sec-heading2'] = weaverx_cz_group_title( __( 'Secondary Menu Colors', 'weaver-xtreme' ),
		__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' )
	);

	$opts['m_secondary_color'] = weaverx_cz_color(
		'm_secondary_color',
		__( 'Secondary Menu Bar Text Color', 'weaver-xtreme' ),
		__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_secondary_bgcolor'] = weaverx_cz_color(
		'm_secondary_bgcolor',
		__( 'Secondary Menu Bar BG Color', 'weaver-xtreme' ),
		__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_secondary_link_bgcolor'] = weaverx_cz_color(
		'm_secondary_link_bgcolor',
		__( 'Item BG Color', 'weaver-xtreme' ),
		__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

	$opts['m_secondary_hover_color'] = weaverx_cz_color(
		'm_secondary_hover_color',
		__( 'Secondary Menu Bar Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_secondary_hover_bgcolor'] = weaverx_cz_color(
		'm_secondary_hover_bgcolor',
		__( 'Secondary Menu Bar Hover BG Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_secondary_html_color'] = weaverx_cz_color(
		'm_secondary_html_color',
		__( 'HTML: Text Color', 'weaver-xtreme' ),
		__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
	);

	$opts['m_secondary_sub_color'] = weaverx_cz_color(
		'm_secondary_sub_color',
		__( 'Secondary Sub-Menu Text Color', 'weaver-xtreme' ),
		'', WEAVERX_MENU_UPDATE );

	$opts['m_secondary_sub_bgcolor'] = weaverx_cz_color(
		'm_secondary_sub_bgcolor',
		__( 'Secondary Sub-Menu BG Color', 'weaver-xtreme' ),
		'', WEAVERX_MENU_UPDATE );

	$opts['m_secondary_sub_hover_color'] = weaverx_cz_color(
		'm_secondary_sub_hover_color',
		__( 'Secondary Sub-Menu Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_secondary_sub_hover_bgcolor'] = weaverx_cz_color(
		'm_secondary_sub_hover_bgcolor',
		__( 'Secondary Sub-Menu Hover BG Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['m_secondary_clickable_bgcolor'] = weaverx_cz_color(
		'm_secondary_clickable_bgcolor',
		__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
		__( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. Not used by SmartMenus. (Default: rgba( 255,255,255,0.2)', 'weaver-xtreme' ), 'refresh' );

	$opts['m_secondary_dividers_color'] = weaverx_cz_color(
		'm_secondary_dividers_color',
		__( 'Dividers between menu items', 'weaver-xtreme' ),
		__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
		'refresh'
	);


	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_secondary', __( 'Secondary Menu Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	// -------- Secondary Menu Layout ------------

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['layout-secondary-heading'] = weaverx_cz_group_title( esc_html__( 'Secondary Menu Layout', 'weaver-xtreme' ) );

		$opts['m_secondary_fixedtop'] = weaverx_cz_select(    // must be refresh because column class applied to specific page id
			__( 'Fixed-Top Secondary Menu', 'weaver-xtreme' ),
			__( 'Fix the Secondary Menu to top of page. Use the Menu Align setting to make a full width menu. If you have set the Header to Align Full or Wide, you may want to change the alignment for this item as well.', 'weaver-xtreme' ),
			array(
				'none'       => esc_html__( 'Standard Position : Not Fixed', 'weaver-xtreme' ),
				'fixed-top'  => esc_html__( 'Fixed to Top', 'weaver-xtreme' ),
				'scroll-fix' => esc_html__( 'Fix to Top on Scroll', 'weaver-xtreme' ),
			),
			'none', 'refresh'
		);

		$opts['m_secondary_move'] = weaverx_cz_checkbox(
			__( 'Move Secondary Menu to Bottom', 'weaver-xtreme' ),
			__( 'Move Secondary Menu to Bottom of Header Area (Default: Top)', 'weaver-xtreme' )
		);

		$opts['m_secondary_layout_html_t'] = weaverx_cz_heading( __( 'Left and Right HTML on Menu', 'weaver-xtreme' ),
			__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) );

		$opts['m_secondary_html_left'] = weaverx_cz_textarea( __( 'Left HTML', 'weaver-xtreme' ),
			__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
			'1', __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
			'postMessage', true );


		$opts['m_secondary_html_right'] = weaverx_cz_textarea( __( 'Right HTML', 'weaver-xtreme' ),
			'',
			'1', __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
			'postMessage', true );


	}

	$opts['spacing-sm-heading'] = weaverx_cz_group_title(
		__( 'Secondary Menu Alignment and Spacing', 'weaver-xtreme' ) );

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

	// --- Secondary Menu Style

	$opts['style-ms-heading'] = weaverx_cz_group_title( __( 'Secondary Menu Style', 'weaver-xtreme' )
	);

	$opts['m_secondary_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Secondary Menu bar', 'weaver-xtreme' ) );

	$opts['m_secondary_sub_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Sub-Menus', 'weaver-xtreme' ) );

	$opts['m_secondary_shadow'] = weaverx_cz_select(
		__( 'Add shadow to menu bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['m_secondary_sub_noshadow'] = weaverx_cz_heading(
		__( 'Add Shadow to Sub-Menus', 'weaver-xtreme' ),
		__( 'Sub-Menus do not support shadows.', 'weaver-xtreme' )
	);

	$opts['m_secondary_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to menu bar', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);

	$opts['m_secondary_sub_rounded'] = weaverx_cz_checkbox(
		__( 'Rounded Secondary Sub-Menu corners', 'weaver-xtreme' )
	);


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['m_secondary_add_class'] = weaverx_cz_add_class_menu( __( 'Secondary Menu Bar: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_menus_all() {
	$opts = array();

	$opts['color-allmenus-heading'] = weaverx_cz_group_title( __( 'Colors For All Menus', 'weaver-xtreme' ),
		__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) );

	$opts['menubar_curpage_color'] = weaverx_cz_color( 'menubar_curpage_color',
		__( 'Menus Current Page Text Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['menubar_curpage_bgcolor'] = weaverx_cz_color( 'menubar_curpage_bgcolor',
		__( 'Menus Current Page BG Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['m_retain_hover'] = weaverx_cz_checkbox(
		__( 'Retain Menu Bar Hover BG Color', 'weaver-xtreme' ),
		__( 'Retain the menu bar item hover BG color when sub-menus are opened.', 'weaver-xtreme' )
	);

	$opts['typo-allmenus-heading'] = weaverx_cz_group_title( __( 'Typography For All Menus', 'weaver-xtreme' ),
		esc_html__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) );

	$opts['menubar_curpage_bold'] = weaverx_cz_checkbox(
		__( 'Bold Current Page', 'weaver-xtreme' ),
		__( 'Boldface Current Page and ancestors.', 'weaver-xtreme' )
	);

	$opts['menubar_curpage_em'] = weaverx_cz_checkbox(
		__( 'Italic Current Page', 'weaver-xtreme' ),
		__( 'Italic Current Page and ancestors.', 'weaver-xtreme' )

	);

	$opts['menubar_curpage_noancestors'] = weaverx_cz_checkbox(
		__( 'Do Not Highlight Ancestors', 'weaver-xtreme' ),
		__( 'Highlight Current Page only - do not also highlight ancestor items.', 'weaver-xtreme' )
	);


	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['layout-switch-heading'] = weaverx_cz_group_title( esc_html__( 'All Menus Layout', 'weaver-xtreme' ) );

		$opts['mobile_alt_label'] = weaverx_cz_htmlarea( __( 'Mobile Menu "Hamburger" Label', 'weaver-xtreme' ),
			__( 'Alternative label for the default mobile "Hamburger" icon. HTML allowed, e.g. <code>&lt;span class="genericon genericon-menu">&lt;/span> Menu</code>', 'weaver-xtreme' ),
			'1',
			'Any HTML',
			'refresh' );

		$opts['mobile_alt_switch'] = weaverx_cz_range(
			__( 'Menu Mobile/Desktop Switch Point (px)', 'weaver-xtreme' ),
			weaverx_markdown( __( 'Set width for menu bars to switch from desktop to mobile. (Default: 767px. Hint: use 768 to force mobile menu on iPad portrait.)', 'weaver-xtreme' ) ),
			767,
			array(
				'min'  => 300,
				'max'  => 1200,
				'step' => 1,
			),
			'refresh',
			'plus'
		);
	}

	$opts['style-allmenus-heading'] = weaverx_cz_group_title( __( 'All Menus Style', 'weaver-xtreme' ),
		__( 'These options specify current page attributes for all menus.', 'weaver-xtreme' ) );

	$opts['placeholder_cursor'] = weaverx_cz_select(
		__( 'Placeholder Menu Hover Cursor', 'weaver-xtreme' ),
		__( 'Cursor :hover attribute for placeholder menu items ( only with Custom Menu Items with URL==# ).', 'weaver-xtreme' ),
		array(
			'pointer'      => esc_html__( 'Pointer ( indicates link)', 'weaver-xtreme' ),
			'context-menu' => esc_html__( 'Context Menu available', 'weaver-xtreme' ),
			'text'         => esc_html__( 'Text', 'weaver-xtreme' ),
			'none'         => esc_html__( 'No pointer', 'weaver-xtreme' ),
			'not-allowed'  => esc_html__( 'Action not allowed', 'weaver-xtreme' ),
			'default'      => esc_html__( 'The default cursor', 'weaver-xtreme' ),
		),
		'pointer', 'refresh'
	);

	// -- smart menus

	$opts['menus-all-smart-ttl'] = weaverx_cz_group_title( __( 'Menu Smart Menus', 'weaver-xtreme' ) );

	$opts['use_smartmenus'] = weaverx_cz_checkbox(
		__( 'Use SmartMenus', 'weaver-xtreme' ),
		__( 'Use <em>SmartMenus</em> rather than default Weaver Xtreme Menus. <em>SmartMenus</em> provide enhanced menu support, including auto-visibility, and transition effects. This option is recommended. There are additional <em>Smart Menu</em> options available on the <em>Appearance &rarr; +Xtreme Plus</em> menu.', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_w_menus_mini() {
	$opts = array();


	$opts['color-minim-heading'] = weaverx_cz_group_title( __( 'Header Mini Menu Colors', 'weaver-xtreme' ),
		__( 'You must define a Header Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) );

	$opts['m_header_mini_color'] = weaverx_cz_color( 'm_header_mini_color',
		__( 'Header Mini Menu Text Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['m_header_mini_bgcolor'] = weaverx_cz_color( 'm_header_mini_bgcolor',
		__( 'Header Mini Menu BG Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['m_header_mini_hover_color'] = weaverx_cz_color( 'm_header_mini_hover_color',
		__( 'Header Mini Menu Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_header_mini', __( 'Header Mini Menu Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts['spacing-mm-heading'] = weaverx_cz_group_title(
		esc_html__( 'Header Mini Menu Spacing', 'weaver-xtreme' ), '' );

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

	$opts['m_header_mm_vis'] = weaverx_cz_group_title( __( 'Header Mini Menu Visibility', 'weaver-xtreme' ) );

	$opts['m_header_mini_hide'] = weaverx_cz_select(
		__( 'Hide Header Mini Menu', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	return $opts;
}

function weaverx_controls_w_menus_extra() {
	$opts = array();

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
		if ( weaverx_cz_is_plus() ) {
			$opts['color-mm-heading3'] = weaverx_cz_group_title( __( 'Extra Menu Colors', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You must define a Extra Menu from the Custom Menus Content menu.', 'weaver-xtreme' )
			);

			$opts['m_extra_color'] = weaverx_cz_color(
				'm_extra_color',
				__( 'Extra Menu Bar Text Color', 'weaver-xtreme' ),
				__( 'Text Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

			$opts['m_extra_bgcolor'] = weaverx_cz_color(
				'm_extra_bgcolor',
				__( 'Extra Menu Bar BG Color', 'weaver-xtreme' ),
				__( 'Background Color for Entire menu bar.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

			$opts['m_extra_link_bgcolor'] = weaverx_cz_color(
				'm_extra_link_bgcolor',
				__( 'Item BG Color', 'weaver-xtreme' ),
				__( 'Background Color for menu bar items.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE );

			$opts['m_extra_hover_color'] = weaverx_cz_color(
				'm_extra_hover_color',
				__( 'Extra Menu Bar Hover Text Color', 'weaver-xtreme' ),
				'', 'refresh' );

			$opts['m_extra_hover_bgcolor'] = weaverx_cz_color(
				'm_extra_hover_bgcolor',
				__( 'Extra Menu Bar Hover BG Color', 'weaver-xtreme' ),
				'', 'refresh' );

			$opts['m_extra_html_color'] = weaverx_cz_color(
				'm_extra_html_color',
				__( 'HTML: Text Color', 'weaver-xtreme' ),
				__( 'Text Color for Left/Right Menu Bar HTML.', 'weaver-xtreme' ), WEAVERX_MENU_UPDATE
			);

			$opts['m_extra_sub_color'] = weaverx_cz_color(
				'm_extra_sub_color',
				__( 'Extra Sub-Menu Text Color', 'weaver-xtreme' ),
				'', WEAVERX_MENU_UPDATE );

			$opts['m_extra_sub_bgcolor'] = weaverx_cz_color(
				'm_extra_sub_bgcolor',
				__( 'Extra Sub-Menu BG Color', 'weaver-xtreme' ),
				'', WEAVERX_MENU_UPDATE );

			$opts['m_extra_sub_hover_color'] = weaverx_cz_color(
				'm_extra_sub_hover_color',
				__( 'Extra Sub-Menu Hover Text Color', 'weaver-xtreme' ),
				'', 'refresh' );

			$opts['m_extra_sub_hover_bgcolor'] = weaverx_cz_color(
				'm_extra_sub_hover_bgcolor',
				__( 'Extra Sub-Menu Hover BG Color', 'weaver-xtreme' ),
				'', 'refresh' );

			$opts['m_extra_clickable_bgcolor'] = weaverx_cz_color(
				'm_extra_clickable_bgcolor',
				__( 'Open Submenu Arrow BG', 'weaver-xtreme' ),
				__( 'Clickable mobile open submenu arrow BG. Contrasting BG color required for proper user interface. Not used by SmartMenus. (Default: rgba( 255,255,255,0.2)', 'weaver-xtreme' ), 'refresh' );

			$opts['m_extra_dividers_color'] = weaverx_cz_color(
				'm_extra_dividers_color',
				__( 'Dividers between menu items', 'weaver-xtreme' ),
				__( 'Add colored dividers between menu items. Leave blank for none.', 'weaver-xtreme' ),
				'refresh'
			);

			$opts = array_merge( $opts, weaverx_cz_fonts_control( 'm_extra', __( 'Extra Menu Typography', 'weaver-xtreme' ), '', 'refresh' ) );

			if ( weaverx_cz_is_plus() ) {
				$opts['content-xm-heading'] = weaverx_cz_group_title( __( 'Extra Menu Layout', 'weaver-xtreme' ) );


				$opts['m_extra_html_left'] = weaverx_cz_textarea( __( 'Left HTML', 'weaver-xtreme' ),
					__( 'Add HTML to menu bar. Works best with Centered Menu. You can adjust color and top/bottom spacing on the respective panels.', 'weaver-xtreme' ),
					'1', __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
					'postMessage', true );


				$opts['m_extra_html_right'] = weaverx_cz_textarea( __( 'Right HTML', 'weaver-xtreme' ),
					'',
					'1', __( 'Any HTML, including shortcodes.', 'weaver-xtreme' ),
					'postMessage', true );
			}

			$opts['extra-sm-heading'] = weaverx_cz_group_title(
				__( 'Extra Menu Alignment and Spacing', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON );

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


			$opts['style-xm-heading'] = weaverx_cz_group_title( __( 'Extra Menu Style', 'weaver-xtreme' )
			);

			$opts['m_extra_border'] = weaverx_cz_checkbox_post(
				__( 'Add border to Extra Menu bar', 'weaver-xtreme' ) );

			$opts['m_extra_sub_border'] = weaverx_cz_checkbox_post(
				__( 'Add border to Sub-Menus', 'weaver-xtreme' ) );

			$opts['m_extra_shadow'] = weaverx_cz_select(
				__( 'Add shadow to menu bar', 'weaver-xtreme' ),
				'',
				'weaverx_cz_choices_shadow', '-0', 'postMessage'
			);

			$opts['m_extra_sub_noshadow'] = weaverx_cz_heading(
				__( 'Add Shadow to Sub-Menus', 'weaver-xtreme' ),
				__( 'Sub-Menus do not support shadows.', 'weaver-xtreme' )
			);

			$opts['m_extra_rounded'] = weaverx_cz_select(
				__( 'Add rounded corners to menu bar', 'weaver-xtreme' ),
				'',
				'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
			);

			$opts['m_extra_sub_rounded'] = weaverx_cz_checkbox(
				__( 'Rounded Extra Sub-Menu corners', 'weaver-xtreme' )
			);


			$opts['visibility-xm-heading'] = weaverx_cz_group_title(
				__( 'Extra Menu Visibility', 'weaver-xtreme' )
			);

			$opts['m_extra_hide'] = weaverx_cz_select(
				__( 'Hide Extra Menu', 'weaver-xtreme' ),
				'',
				'weaverx_cz_choices_hide', 'hide-none', 'refresh'
			);


			$opts['m_extra_hide_arrows'] = weaverx_cz_checkbox(
				__( 'Hide Extra Menu Arrows', 'weaver-xtreme' )
			);

			$opts['m_extra_hide_left'] = weaverx_cz_select_plus(
				__( 'Hide Extra Menu Left HTML', 'weaver-xtreme' ),
				'',
				'weaverx_cz_choices_hide', 'hide-none', 'refresh'
			);

			$opts['m_extra_hide_right'] = weaverx_cz_select_plus(
				__( 'Hide Extra Menu Right HTML', 'weaver-xtreme' ),
				'',
				'weaverx_cz_choices_hide', 'hide-none', 'refresh'
			);

			$opts['m_extra_add_class'] = weaverx_cz_add_class( __( 'Extra Menu Bar: Add Classes', 'weaver-xtreme' ) );

		} else {
			$opts = weaverx_cz_add_plus_message( 'color_menus', __( 'Extra Menu', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
		}
	}

	return $opts;
}

