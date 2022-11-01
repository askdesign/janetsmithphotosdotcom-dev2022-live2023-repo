<?php

/**
 * Define the sections and settings for the Site Colors panel
 * Customize_Alpha_Color_Control
 * WP_Customize_Color_Control
 */


function weaverx_customizer_define_colorscheme_sections() {
	$panel = 'weaverx_site-colors';
	$colorscheme_sections = array();

	/**
	 * General
	 */
	$colorscheme_sections['color-wrapping'] = array(
		'panel'       => $panel,
		'title'       => __( 'Wrapping Areas', 'weaver-xtreme' ),
		'description' => 'Set colors. Use Typography to set fonts.',
		'options'     => weaverx_controls_colors_wrapping(),
	);

	/**
	 * Links
	 */
	$colorscheme_sections['color-links'] = array(
		'panel'       => $panel,
		'title'       => __( 'Links', 'weaver-xtreme' ),
		'description' => 'Set colors for links. Use Typography to set fonts.',
		'options'     => weaverx_controls_colors_links(),
	);

	/**
	 * Site Header
	 */
	$colorscheme_sections['color-header'] = array(
		'panel'   => $panel,
		'title'   => __( 'Header Area', 'weaver-xtreme' ),
		'options' => weaverx_controls_colors_header(),
	);

	/**
	 * Main Menu
	 */

	$colorscheme_sections['color-menus'] = array(
		'panel'       => $panel,
		'title'       => __( 'Menus', 'weaver-xtreme' ),
		'description' => __( 'Set text, background, and hover colors for menus.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_colors_menus(),
	);


	/**
	 * Info Bar
	 */
	$colorscheme_sections['color-info-bar'] = array(
		'panel'       => $panel,
		'title'       => __( 'Info Bar', 'weaver-xtreme' ),
		'description' => __( 'Info Bar has breadcrumbs and paged navigation displayed under Primary Menu.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_colors_infobar(),
	);

	/**
	 * Content
	 */
	$colorscheme_sections['color-content'] = array(
		'panel'       => $panel,
		'title'       => __( 'Content', 'weaver-xtreme' ),
		'description' => __( 'Colors for general page and post content. You can override post specific colors on the "Post Specific Colors" panel.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_colors_content(),
	);

	/**
	 * Post Specific
	 */
	$colorscheme_sections['color-post-specific'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Specific', 'weaver-xtreme' ),
		'description' => __( 'Post Specific Colors - override Content colors.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_colors_postspecific(),
	);


	/**
	 * Sidebars
	 */
	$colorscheme_sections['color-sidebars'] = array(
		'panel'       => $panel,
		'title'       => __( 'Sidebars &amp; Widget Areas', 'weaver-xtreme' ),
		'description' => __( 'Colors for Primary and Secondary Sidebars, and Widget Areas.', 'weaver-xtreme' ),
		'options'     => weaverx_controls_colors_sidebars(),
	);

	/**
	 * Widgets
	 */
	$colorscheme_sections['color-widgets'] = array(
		'panel'       => $panel,
		'title'       => __( 'Individual Widgets', 'weaver-xtreme' ),
		'description' => 'Properties for individual widgets (e.g., Text, Recent Posts, etc.)',
		'options'     => weaverx_controls_colors_widgets(),
	);


	/**
	 * Footer
	 */
	$colorscheme_sections['color-footer'] = array(
		'panel'   => $panel,
		'title'   => __( 'Footer Area', 'weaver-xtreme' ),
		'options' => weaverx_controls_colors_footer(),
	);


	return $colorscheme_sections;
}

// define controls for sections

function weaverx_controls_colors_wrapping() {
	$opts = array();

	$opts['body_bgcolor'] = weaverx_cz_color(
		'body_bgcolor',
		__( 'Site Background Color', 'weaver-xtreme' ),
		__( 'Background color for &lt;body&gt;, wraps entire page.', 'weaver-xtreme' ) );

	$opts['fadebody_bg'] = weaverx_cz_checkbox(
		__( 'Fade Outside BG', 'weaver-xtreme' ),
		__( 'Will fade the Outside BG color, darker at top to lighter at bottom.', 'weaver-xtreme' )
	);

	$opts['wrapper_color'] = weaverx_cz_color(
		'wrapper_color',
		__( 'Wrapper Text Color', 'weaver-xtreme' ),
		weaverx_markdown( __( '**Global Text Color** - You can override other text colors for individual areas and items below.', 'weaver-xtreme' ) ) );

	$opts['wrapper_bgcolor'] = weaverx_cz_color(
		'wrapper_bgcolor',
		__( 'Wrapper BG Color', 'weaver-xtreme' ),
		weaverx_markdown( __( '**Background Color** - wraps entire content area. To override, set BG colors for individual areas.', 'weaver-xtreme' ) ) );

	$opts['container_color'] = weaverx_cz_color(
		'container_color',
		__( 'Container Text Color', 'weaver-xtreme' ),
		__( 'Container ( #container div ) wraps content and sidebars.', 'weaver-xtreme' ) );

	$opts['container_bgcolor'] = weaverx_cz_color(
		'container_bgcolor',
		__( 'Container BG Color', 'weaver-xtreme' ) );

	$opts['color-border-heading'] = weaverx_cz_line();

	$opts['color-border-headingbc'] = weaverx_cz_heading( __( 'Border Color', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Border Color option found on *Style&rarr;Global Style Options* panel.', 'weaver-xtreme' ) )
	);

	return $opts;
}

function weaverx_controls_colors_links() {
	$opts = array();

	$opts['link_color'] = weaverx_cz_color(
		'link_color',
		__( 'Standard Links', 'weaver-xtreme' ),
		__( 'Sitewide default color for links. To override for links in specific areas, set colors for individual links below.', 'weaver-xtreme' ), 'refresh' );

	$opts['link_hover_color'] = weaverx_cz_color(
		'link_hover_color',
		__( 'Standard Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	// info bar
	$opts['color-info-line-1'] = weaverx_cz_line();

	$opts['ibarlink_color'] = weaverx_cz_color(
		'ibarlink_color',
		__( 'Info Bar Link Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['ibarlink_hover_color'] = weaverx_cz_color(
		'ibarlink_hover_color',
		__( 'Info Bar Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['color-info-line-2'] = weaverx_cz_line();

	// content

	$opts['contentlink_color'] = weaverx_cz_color(
		'contentlink_color',
		__( 'Content Links Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['contentlink_hover_color'] = weaverx_cz_color(
		'contentlink_hover_color',
		__( 'Content Links Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['color-info-line-3'] = weaverx_cz_line();

	// post meta info bar
	$opts['ilink_color'] = weaverx_cz_color(
		'ilink_color',
		__( 'Post Meta Info Link Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['ilink_hover_color'] = weaverx_cz_color(
		'ilink_hover_color',
		__( 'Post Meta Info Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['color-info-line-4'] = weaverx_cz_line();

	// individual widgets

	$opts['wlink_color'] = weaverx_cz_color(
		'wlink_color',
		__( 'Individual Widgets Link Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['wlink_hover_color'] = weaverx_cz_color(
		'wlink_hover_color',
		__( 'Individual Widgets Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['color-info-line-5'] = weaverx_cz_line();

	$opts['footerlink_color'] = weaverx_cz_color(
		'footerlink_color',
		__( 'Footer Links Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['footerlink_hover_color'] = weaverx_cz_color(
		'footerlink_hover_color',
		__( 'Footer Links Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );


	return $opts;
}

function weaverx_controls_colors_header() {
	$opts = array();

	$opts['header_color'] = weaverx_cz_color(
		'header_color',
		__( 'Header Text Color', 'weaver-xtreme' ),
		'' );

	$opts['header_bgcolor'] = weaverx_cz_color(
		'header_bgcolor',
		__( 'Header Area BG Color', 'weaver-xtreme' ),
		'The Header BG Color is used for full width BG color on header.' );

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

	$opts['header_sb_color'] = weaverx_cz_color(
		'header_sb_color',
		__( 'Header Widget Area Text Color', 'weaver-xtreme' ),
		'' );

	$opts['header_sb_bgcolor'] = weaverx_cz_color(
		'header_sb_bgcolor',
		__( 'Header Widget Area BG Color', 'weaver-xtreme' ),
		'' );

	$opts['header_html_color'] = weaverx_cz_color(
		'header_html_color',
		__( 'Header HTML Area Text Color', 'weaver-xtreme' ) );

	$opts['header_html_bgcolor'] = weaverx_cz_color(
		'header_html_bgcolor',
		__( 'Header HTML Area BG Color', 'weaver-xtreme' ) );

	return $opts;
}

function weaverx_controls_colors_menus() {
	$opts = array();

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

	// Secondary

	$opts['color-mm-heading2'] = weaverx_cz_group_title( __( 'Secondary Menu Colors', 'weaver-xtreme' ),
	__( 'You must define a Secondary Menu from the Custom Menus Content menu.', 'weaver-xtreme')
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

	//  Mini menu

	$opts['content-linem1'] = weaverx_cz_line();

	$opts['color-minim-heading'] = weaverx_cz_group_title( __( 'Header Mini Menu Colors', 'weaver-xtreme' ),
		__( 'You must define a Header Menu from the Custom Menus Content menu.', 'weaver-xtreme' ) );

	$opts['m_header_mini_color'] = weaverx_cz_color( 'm_header_mini_color',
		__( 'Header Mini Menu Text Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['m_header_mini_bgcolor'] = weaverx_cz_color( 'm_header_mini_bgcolor',
		__( 'Header Mini Menu BG Color', 'weaver-xtreme' ), '', WEAVERX_MENU_UPDATE );

	$opts['m_header_mini_hover_color'] = weaverx_cz_color( 'm_header_mini_hover_color',
		__( 'Header Mini Menu Hover Text Color', 'weaver-xtreme' ),
		'', 'refresh' );

	// All Menus

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

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {
		if ( weaverx_cz_is_plus() ) {
			$opts['color-mm-heading3'] = weaverx_cz_group_title( __( 'Extra Menu Colors', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
				__( 'You must define a Extra Menu from the Custom Menus Content menu.', 'weaver-xtreme')
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

		} else {
			$opts = weaverx_cz_add_plus_message( 'color_menus', __( 'Extra Menu', 'weaver-xtreme' ). WEAVERX_PLUS_ICON,
				__( 'Add extra menus with <strong>Weaver Xtreme Plus</strong>.', 'weaver-xtreme' ) );
		}
	}


	return $opts;
}

function weaverx_controls_colors_infobar() {
	$opts = array();

	$opts['infobar_color'] = weaverx_cz_color(
		'infobar_color',
		__( 'Info Bar Text Color', 'weaver-xtreme' )
	);

	$opts['infobar_bgcolor'] = weaverx_cz_color(
		'infobar_bgcolor',
		__( 'Info Bar BG Color', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_colors_content() {
	$opts = array();


	$opts['content_color'] = weaverx_cz_color(
		'content_color',
		__( 'Content Area Text Color', 'weaver-xtreme' )
	);

	$opts['content_bgcolor'] = weaverx_cz_color(
		'content_bgcolor',
		__( 'Content Area BG Color', 'weaver-xtreme' )
	);

	$opts['page_title_color'] = weaverx_cz_color(
		'page_title_color',
		__( 'Page Title Text Color', 'weaver-xtreme' ),
		__( 'Page titles, including pages, post single pages, and archive-like pages.', 'weaver-xtreme' )
	);

	$opts['page_title_bgcolor'] = weaverx_cz_color(
		'page_title_bgcolor',
		__( 'Page Title BG Color', 'weaver-xtreme' )
	);

	$opts['archive_title_color'] = weaverx_cz_color(
		'archive_title_color',
		__( 'Archive Pages Title Text Color', 'weaver-xtreme' ),
		__( 'Archive-like page titles: archives, categories, tags, searches.', 'weaver-xtreme' )
	);

	$opts['archive_title_bgcolor'] = weaverx_cz_color(
		'archive_title_bgcolor',
		__( 'Archive Pages Title BG Color', 'weaver-xtreme' )
	);

	$opts['content_h_color'] = weaverx_cz_color(
		'content_h_color',
		__( 'Content Headings Text Color', 'weaver-xtreme' ),
		__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' )
	);

	$opts['content_h_bgcolor'] = weaverx_cz_color(
		'content_h_bgcolor',
		__( 'Content Headings BG', 'weaver-xtreme' ),
		__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' )
	);

	$opts['content-line1'] = weaverx_cz_line();

	$opts['input_color'] = weaverx_cz_color(
		'input_color',
		__( 'Text Input Areas Color', 'weaver-xtreme' )
	);

	$opts['input_bgcolor'] = weaverx_cz_color(
		'input_bgcolor',
		__( 'Text Input Areas BG Color', 'weaver-xtreme' )
	);

	$opts['search_color'] = weaverx_cz_color(
		'search_color',
		__( 'Search Input Text Color', 'weaver-xtreme' )
	);

	$opts['search_bgcolor'] = weaverx_cz_color(
		'search_bgcolor',
		__( 'Search Input BG Color', 'weaver-xtreme' )
	);

	$opts['search_icon_msg'] = weaverx_cz_heading( __( 'Search Icon Color', 'weaver-xtreme' ),
		__( 'The Search Icon color is inherited from wrapping areas text color, including the header area and menu bar.', 'weaver-xtreme' ) );

	$opts['content-line1a'] = weaverx_cz_line();

	$opts['hr_color'] = weaverx_cz_color(
		'hr_color',
		__( '&lt;HR&gt; color', 'weaver-xtreme' ),
		__( 'Color of horizontal ( &lt;hr&gt; ) lines in posts and pages. Use the "Custom CSS &rarr; Content" panel to customize the style of the &lt;hr&gt;.', 'weaver-xtreme' )
	);

	$opts['content-line1b'] = weaverx_cz_line();

	$opts['comment_headings_color'] = weaverx_cz_color(
		'comment_headings_color',
		__( 'Color for headings in comment form', 'weaver-xtreme' )
	);

	$opts['comment_content_bgcolor'] = weaverx_cz_color(
		'comment_content_bgcolor',
		__( 'Comment content area BG Color', 'weaver-xtreme' )
	);

	$opts['comment_submit_bgcolor'] = weaverx_cz_color(
		'comment_submit_bgcolor',
		__( '"Post Comment" submit button BG Color', 'weaver-xtreme' )
	);

	$opts['content-line2'] = weaverx_cz_line();

	$opts['editor_bgcolor'] = weaverx_cz_color(
		'editor_bgcolor',
		__( 'Page/Post Editor BG', 'weaver-xtreme' ),
		__( "Alternative Background Color to use for Page/Post editor if you're using transparent or image backgrounds.", 'weaver-xtreme' ),
		'refresh'
	);


	return $opts;
}

function weaverx_controls_colors_postspecific() {
	$opts = array();


	$opts['color-post-heading'] = weaverx_cz_heading( __( 'Post Specific', 'weaver-xtreme' ) );

	$opts['post_color'] = weaverx_cz_color(
		'post_color',
		__( 'Post Area Text Color', 'weaver-xtreme' )
	);

	$opts['post_bgcolor'] = weaverx_cz_color(
		'post_bgcolor',
		__( 'Post Area BG Color', 'weaver-xtreme' )
	);

	$opts['stickypost_bgcolor'] = weaverx_cz_color(
		'stickypost_bgcolor',
		__( 'Sticky Post Area BG Color', 'weaver-xtreme' )
	);

	$opts['post_title_color'] = weaverx_cz_color(
		'post_title_color',
		__( 'Post Title Text Color', 'weaver-xtreme' )
	);

	$opts['post_title_bgcolor'] = weaverx_cz_color(
		'post_title_bgcolor',
		__( 'Post Title BG Color', 'weaver-xtreme' )
	);

	$opts['post_title_hover_color'] = weaverx_cz_color(
		'post_title_hover_color',
		__( 'Post Title Hover Color', 'weaver-xtreme' ),
		__( 'Color if you want the Post Title to show alternate color for hover.', 'weaver-xtreme' ),
		'refresh'
	);

	$opts['post_info_top_color'] = weaverx_cz_color(
		'post_info_top_color',
		__( 'Top Post Meta Info Text Color', 'weaver-xtreme' )
	);

	$opts['post_info_top_bgcolor'] = weaverx_cz_color(
		'post_info_top_bgcolor',
		__( 'Top Post Meta Info BG Color', 'weaver-xtreme' )
	);

	$opts['post_info_bottom_color'] = weaverx_cz_color(
		'post_info_bottom_color',
		__( 'Bottom Post Meta Info Text Color', 'weaver-xtreme' )
	);

	$opts['post_info_bottom_bgcolor'] = weaverx_cz_color(
		'post_info_bottom_bgcolor',
		__( 'Bottom Post Meta Info BG Color', 'weaver-xtreme' )
	);

	$opts['post_icons_color'] = weaverx_cz_color(
		'post_icons_color',
		__( 'Post Font Icons Color', 'weaver-xtreme' ),
		__( 'Set Font Icon color if Font Icons on Info Lines specified on the *Style &rarr; Post Specific* panel.', 'weaver-xtreme' )
	);

	$opts['post_author_bgcolor'] = weaverx_cz_color(
		'post_author_bgcolor',
		__( 'Author Info BG Color', 'weaver-xtreme' ),
		__( 'Background color used for Author Bio.', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_colors_sidebars() {
	$opts = array();


	$opts['color-primary-widget-heading'] = weaverx_cz_group_title( __( 'Primary Sidebar (Widget Area)', 'weaver-xtreme' ) );

	$opts['primary_color'] = weaverx_cz_color(
		'primary_color',
		__( 'Primary Sidebar Text Color', 'weaver-xtreme' )
	);

	$opts['primary_bgcolor'] = weaverx_cz_color(
		'primary_bgcolor',
		__( 'Primary Sidebar BG Color', 'weaver-xtreme' )
	);

	$opts['color-secondary-widget-heading'] = weaverx_cz_group_title( __( 'Secondary Sidebar (Widget Area)', 'weaver-xtreme' ) );

	$opts['secondary_color'] = weaverx_cz_color(
		'secondary_color',
		__( 'Secondary Sidebar Text Color', 'weaver-xtreme' )
	);

	$opts['secondary_bgcolor'] = weaverx_cz_color(
		'secondary_bgcolor',
		__( 'Secondary Sidebar BG Color', 'weaver-xtreme' )
	);

	$opts['flow_color'] = weaverx_cz_checkbox(
		__( 'Flow Color to Bottom', 'weaver-xtreme' ),
		__( 'If checked, Content and Sidebar bg colors will flow to bottom of the Container ( that is, equal heights ). You must provide background colors for the Content and Sidebars or the default bg color will be used.', 'weaver-xtreme' ),
		'plus'
	);

	$opts['content-linemtb'] = weaverx_cz_line();

	// Top / Bottom Widget areas

	$opts['color-top-widget-heading'] = weaverx_cz_group_title( __( 'Top Widget Areas', 'weaver-xtreme' ),
		__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ));

	$opts['top_color'] = weaverx_cz_color(
		'top_color',
		__( 'Top Widget Areas Text Color', 'weaver-xtreme' )
	);

	$opts['top_bgcolor'] = weaverx_cz_color(
		'top_bgcolor',
		__( 'Top Widget Areas BG Color', 'weaver-xtreme' )
	);

	$opts['color-bottom-widget-heading'] = weaverx_cz_group_title( __( 'Bottom Widget Areas', 'weaver-xtreme' ),
		__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ));

	$opts['bottom_color'] = weaverx_cz_color(
		'bottom_color',
		__( 'Bottom Widget Areas Text Color', 'weaver-xtreme' )
	);

	$opts['bottom_bgcolor'] = weaverx_cz_color(
		'bottom_bgcolor',
		__( 'Bottom Widget Areas BG Color', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_colors_widgets() {
	$opts = array();

	$opts['widget_color'] = weaverx_cz_color(
		'widget_color',
		__( 'Individual Widgets Text Color', 'weaver-xtreme' )
	);

	$opts['widget_bgcolor'] = weaverx_cz_color(
		'widget_bgcolor',
		__( 'Individual Widgets BG Color', 'weaver-xtreme' )
	);

	$opts['widget_title_color'] = weaverx_cz_color(
		'widget_title_color',
		__( 'Individual Widgets Title Text Color', 'weaver-xtreme' )
	);

	$opts['widget_title_bgcolor'] = weaverx_cz_color(
		'widget_title_bgcolor',
		__( 'Individual Widgets Title BG Color', 'weaver-xtreme' )
	);

	return $opts;
}

function weaverx_controls_colors_footer() {

	$opts = array();

	$opts['footer_color'] = weaverx_cz_color(
		'footer_color',
		__( 'Footer Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_bgcolor'] = weaverx_cz_color( 'header_bgcolor',
		__( 'Footer Area BG Color', 'weaver-xtreme' ),
		'The Footer Area BG Color is used for full width BG color on header.' );

	$opts['footer_sb_color'] = weaverx_cz_color(
		'footer_sb_color',
		__( 'Footer Widget Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_sb_bgcolor'] = weaverx_cz_color(
		'footer_sb_bgcolor',
		__( 'Footer Widget Area BG Color', 'weaver-xtreme' )
	);

	$opts['footer_html_color'] = weaverx_cz_color(
		'footer_html_color',
		__( 'Footer HTML Area Text Color', 'weaver-xtreme' )
	);

	$opts['footer_html_bgcolor'] = weaverx_cz_color(
		'footer_html_bgcolor',
		__( 'Footer HTML Area BG Color', 'weaver-xtreme' )
	);

	return $opts;
}
