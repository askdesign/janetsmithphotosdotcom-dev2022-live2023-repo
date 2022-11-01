<?php

if ( ! function_exists( 'weaverx_customizer_define_layout_sections' ) ) :
	/**
	 * Define the sections and settings for the Layout panel
	 */
	function weaverx_customizer_define_layout_sections() {
		$panel = 'weaverx_layout';
		$layout_sections = array();
		$thumbs = weaverx_relative_url( '/admin-core/customizer/sections/images/' );


		/* ==================================== Core Site Layout and Styling (obsolete) ============================== */

		$layout_sections['layout-core'] = array(
			'panel' => $panel,
			'title' => esc_html__( 'Core Site Layout and Styling', 'weaver-xtreme' ),

			'description' => wp_kses_post( WEAVERX_OBSOLETE . __( '<p><strong>Due to user feedback, this section has been revised.</strong></p><p>You can now set the main site width, the global text and background colors, and pick the site typography using the logical width, color, and typography menu items. This section will be removed in future versions of Weaver Xtreme.</p> ', 'weaver-xtreme' ) ),


			'options' => array(
				'layout-core-colors' => weaverx_cz_group_title( esc_html__( 'Overall Site Layout Colors', 'weaver-xtreme' ), esc_html__( 'Colors now found in the Colors menu.', 'weaver-xtreme' ) ),

				'layout-core-typography' => weaverx_cz_group_title( esc_html__( 'Overall Site Layout Typography', 'weaver-xtreme' ), esc_html__( 'Global Typography now found in the Typography menu.', 'weaver-xtreme' ) ),
			),
		); // end 'layout-core'


		/* =========================================== Layout: Header Area ======================================== */

		/**
		 * Site Header
		 */
		$layout_sections['layout-header'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Header Area', 'weaver-xtreme' ),
			'options' => weaverx_layout_headerarea_opts(),
		);


		/* =========================================== Layout: Menus ======================================== */


		$layout_sections['layout-menus'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Menus', 'weaver-xtreme' ),
			'description' => esc_html__( 'Set layout for Menus. Standard and Full Interface Levels have options for the Secondary Menu.', 'weaver-xtreme' ),
			'options'     => weaverx_layout_menus_opts(),
		);


		/* ================================== Layout: Content ============================ */

		/**
		 * Content
		 */
		$layout_sections['layout-content'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Content', 'weaver-xtreme' ),
			'description' => esc_html__( 'Layout for general page and post content.', 'weaver-xtreme' ),
			'options'     => weaverx_layout_content_opts(),
		);


		/* ================================== Layout: Post Specific ============================ */

		/**
		 * Post Specific
		 */
		$layout_sections['layout-post-specific'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Post Specific', 'weaver-xtreme' ),
			'description' => esc_html__( 'Post Specific layout - override Content layout.', 'weaver-xtreme' ),
			'options'     => weaverx_layout_postspecific_opts(),
		);

		/* ================================== Layout: Sidebars ============================ */

		/**
		 * Sidebars
		 */
		$layout_sections['layout-sidebars'] = array(
			'panel'       => $panel,
			'title'       => esc_html__( 'Sidebars & Widget Areas', 'weaver-xtreme' ),
			'description' => esc_html__( 'Main Sidebars and Widget areas. Header and Footer areas options under Header and Footer panels. Note: General Sidebar Layout for different page types is shown first. Layout options for specific Widget Areas ( Primary, Secondary, Top, Bottom ) are shown after that, so scroll down!', 'weaver-xtreme' ),
			'options'     => weaverx_layout_sidebars_opts(),
		);

		/* ================================== Layout: Footer ============================ */

		/**
		 * Footer
		 */
		$layout_sections['layout-footer'] = array(
			'panel'   => $panel,
			'title'   => esc_html__( 'Footer Area', 'weaver-xtreme' ),
			'options' => weaverx_layout_footer_opts(),
		);


		return $layout_sections;

	}
endif;

/* ########################################### Options Implementation ####################################### */


/* =========================================== Layout: Header Area ========================================== */

function weaverx_layout_headerarea_opts() {
	$opts = array();

	$opts['layout-heading-wheader'] = weaverx_cz_group_title( esc_html__( 'Header Widget Area', 'weaver-xtreme' )
	);

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

	return $opts;
}

/* =========================================== Layout: Menus ================================================ */

function weaverx_layout_menus_opts() {
	$opts = array();

	$opts = array();

	$opts['layout-primary-heading'] = weaverx_cz_group_title( __( 'Layout For Primary Menu', 'weaver-xtreme' ) );


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

	$opts['m_primary_logo_home_link'] = weaverx_cz_checkbox(
		__( 'Logo Links to Home', 'weaver-xtreme' ),
		__( 'Add a link to home page to logo on menu bar ( must use with defined custom menu ).', 'weaver-xtreme' )
	);

	$opts['m_primary_search'] = weaverx_cz_checkbox(
		__( 'Add Search to Right', 'weaver-xtreme' ),
		__( 'Add slide open search icon to right end of primary menu.', 'weaver-xtreme' )
	);

	/* add this someday - needs CSS help...
	$opts['mobile_to_right'] = weaverx_cz_checkbox(
		__('Move mobile "Hamburger" icon to right side of menu.', 'weaver-xtreme')
	);
	*/


	// -------- secondary menu ------------

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['layout-secondary-heading'] = weaverx_cz_group_title( esc_html__( 'Layout For Secondary', 'weaver-xtreme' ) );

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

	}

	$opts['layout-switch-heading'] = weaverx_cz_group_title( esc_html__( 'Layout For All Menus', 'weaver-xtreme' ) );

	$opts['mobile_alt_label'] = weaverx_cz_htmlarea( __( 'Mobile Menu "Hamburger" Label', 'weaver-xtreme' ),
		__( 'Alternative label for the default mobile "Hamburger" icon. HTML allowed, e.g. <code>&lt;span class="genericon genericon-menu">&lt;/span> Menu</code>', 'weaver-xtreme' ),
		'1',
		'Any HTML',
		'refresh' );

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

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

		$opts['use_smartmenus'] = weaverx_cz_checkbox(
			__( 'Use SmartMenus', 'weaver-xtreme' ),
			__( 'Use <em>SmartMenus</em> rather than default Weaver Xtreme Menus. <em>SmartMenus</em> provide enhanced menu support, including auto-visibility, and transition effects. This option is recommended. There are additional <em>Smart Menu</em> options available on the <em>Appearance &rarr; +Xtreme Plus</em> menu.', 'weaver-xtreme' )
		);
	}

	return $opts;
}

/* ========================================== Layout: Content ============================================== */

function weaverx_layout_content_opts() {
	$opts = array();

	$opts['page_cols'] = weaverx_cz_select(    // must be refresh because column class applied to specific page id
		__( 'Content Columns', 'weaver-xtreme' ),
		__( 'Automatically split all page content into columns. You can also use the Per Page option. This option does not apply to posts.', 'weaver-xtreme' ),
		'weaverx_cz_choices_columns', '1', 'refresh'
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['hyphenate'] = weaverx_cz_checkbox(
			__( 'Auto Hyphenate Content', 'weaver-xtreme' ),
			__( 'Allow browsers to automatically hyphenate text for appearance.', 'weaver-xtreme' )
		);
	}

	return $opts;
}

/* ========================================== Layout: Post Specific ======================================== */

function weaverx_layout_postspecific_opts() {
	$opts = array();

	$opts['layout-post-excerpt'] = weaverx_cz_group_title( __( 'Excerpts / Full Posts', 'weaver-xtreme' ),
		__( 'How to display posts in Blog and Archive views.', 'weaver-xtreme' ) );

	$opts['excerpt_length'] = weaverx_cz_range(
		__( 'Excerpt length', 'weaver-xtreme' ),
		__( 'Change post excerpt length.', 'weaver-xtreme' ),
		40,
		array( 'min' => 2, 'max' => 100, 'step' => 1 )
	);

	$opts['fullpost_blog'] = weaverx_cz_checkbox(
		__( 'Show Full Blog Posts', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Will display full blog post instead of excerpts on *blog pages*. Does not override manually added &lt;--more--> breaks.', 'weaver-xtreme' ) )
	);


	$opts['fullpost_archive'] = weaverx_cz_checkbox(
		__( 'Full Post for Archives', 'weaver-xtreme' )
	);

	$opts['fullpost_search'] = weaverx_cz_checkbox(
		__( 'Full Post for Searches', 'weaver-xtreme' )
	);

	$opts['fullpost_first'] = weaverx_cz_range(
		__( 'Full text for first "n" Posts', 'weaver-xtreme' ),
		__( 'Display the full post for the first "n" posts on Blog pages. Does not override manually added &lt;--more--> breaks.', 'weaver-xtreme' ),
		0,
		array( 'min' => 0, 'max' => 20, 'step' => 1 )
	);

	$opts['layout-post-cols'] = weaverx_cz_group_title( __( 'Columns', 'weaver-xtreme' ),
		__( 'Posts in columns.', 'weaver-xtreme' ) );

	$opts['post_cols'] = weaverx_cz_select(    // must be refresh because column class applied to specific page id
		__( 'Post Content Columns', 'weaver-xtreme' ),
		__( 'Split all post content into columns for both blog and single page views. This applies to individual post content only. Uses CSS for this layout. This is not the same as Columns of Posts.', 'weaver-xtreme' ),
		'weaverx_cz_choices_columns', '1', 'refresh'
	);

	$opts['blog_cols'] = weaverx_cz_select(
		__( 'Columns of Posts', 'weaver-xtreme' ),
		__( 'Display posts on blog page with this many columns. HINT: Adjust "Blog pages show at most n posts" on Settings:Reading to be a multiple of columns.', 'weaver-xtreme' ),
		array(
			'1' => esc_html__( '1 Column', 'weaver-xtreme' ),
			'2' => esc_html__( '2 Columns', 'weaver-xtreme' ),
			'3' => esc_html__( '3 Columns', 'weaver-xtreme' ),
		),
		'1', 'refresh'
	);

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard

		$opts['masonry_cols'] = weaverx_cz_select(
			esc_html__( 'Use Masonry for Posts', 'weaver-xtreme' ),
			wp_kses_post( __( 'Use the <em>Masonry</em> blog layout option to show dynamically packed posts on blog and archive-like pages. Overrides "Columns of Posts" setting. <em>Not compatible with full width FI BG images.</em>', 'weaver-xtreme' ) ),
			'weaverx_cz_choices_masonry_columns', '0', 'refresh'
		);

		$opts['archive_cols'] = weaverx_cz_checkbox(
			__( 'Use Columns on Archive Pages', 'weaver-xtreme' ),
			__( 'Display posts on archive-like pages using columns. (Archive, Author, Category, Tag)', 'weaver-xtreme' )
		);

		$opts['blog_first_one'] = weaverx_cz_checkbox(
			__( 'First Post One Column', 'weaver-xtreme' ),
			__( 'Display the first post in one column.', 'weaver-xtreme' )
		);

		$opts['blog_sticky_one'] = weaverx_cz_checkbox(
			__( 'Sticky Posts One Column', 'weaver-xtreme' ),
			__( 'Display opening Sticky Posts in one column. If First Post One Column also checked, then first non-sticky post will also be one column.', 'weaver-xtreme' )
		);
	}

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, standard
		$opts['compact_post_formats'] = weaverx_cz_checkbox(
			__( 'Compact "Post Format" Posts', 'weaver-xtreme' ),
			__( 'Use compact layout for <em>Post Format</em> posts ( Image, Gallery, Video, etc. ). Useful for photo blogs and multi-column layouts. Looks great with <em>Masonry</em>.', 'weaver-xtreme' )
		);


		$opts['layout-post-nav'] = weaverx_cz_group_title( __( 'Post Navigation', 'weaver-xtreme' ),
			__( 'Navigation for moving between Posts.', 'weaver-xtreme' ) );

		$opts['nav_style'] = weaverx_cz_select(
			__( 'Blog Navigation Style', 'weaver-xtreme' ),
			__( 'Style of navigation links on blog pages: "Older/Newer posts", "Previous/Next Post", or by page numbers.', 'weaver-xtreme' ),
			array(
				'old_new'     => esc_html__( 'Older/Newer', 'weaver-xtreme' ),
				'prev_next'   => esc_html__( 'Previous/Next', 'weaver-xtreme' ),
				'paged_left'  => esc_html__( 'Paged - Left', 'weaver-xtreme' ),
				'paged_right' => esc_html__( 'Paged - Right', 'weaver-xtreme' ),
			),
			'old_new', 'refresh'
		);

		$opts['nav_hide_above'] = weaverx_cz_checkbox(
			__( 'Hide Top Nav Links', 'weaver-xtreme' ),
			__( 'Hide the blog navigation links at the top.', 'weaver-xtreme' ),
			'plus'
		);

		$opts['nav_hide_below'] = weaverx_cz_checkbox(
			__( 'Hide Bottom Nav Links', 'weaver-xtreme' ),
			__( 'Hide the blog navigation links at the bottom.', 'weaver-xtreme' ),
			'plus'
		);

		$opts['Show Top Nav on First Page'] = weaverx_cz_checkbox(
			__( 'Show Top Nav on First Page', 'weaver-xtreme' ),
			__( 'Show navigation at top even on the first page.', 'weaver-xtreme' ),
			'plus'
		);


		$opts['single_nav_style'] = weaverx_cz_select(
			__( 'Single Page Navigation Style', 'weaver-xtreme' ),
			__( 'Style of navigation links on post Single pages: Previous/Next, by title, or none.', 'weaver-xtreme' ),
			array(
				'title'     => esc_html__( 'Post Titles', 'weaver-xtreme' ),
				'prev_next' => esc_html__( 'Previous/Next', 'weaver-xtreme' ),
				'hide'      => esc_html__( 'None - no display', 'weaver-xtreme' ),
			),
			'title', 'refresh'
		);

		$opts['single_nav_link_cats'] = weaverx_cz_checkbox(
			__( 'Nav Links to Same Categories', 'weaver-xtreme' ),
			__( 'Single Page navigation links point to posts with same categories', 'weaver-xtreme' )
		);


		$opts['single_nav_hide_above'] = weaverx_cz_checkbox(
			__( 'Hide Top Nav Links', 'weaver-xtreme' ),
			__( 'Hide the single page navigation links at the top.', 'weaver-xtreme' ),
			'plus'
		);

		$opts['single_nav_hide_below'] = weaverx_cz_checkbox(
			__( 'Hide Bottom Nav Links', 'weaver-xtreme' ),
			__( 'Hide the single page navigation links at the bottom.', 'weaver-xtreme' ),
			'plus'
		);

		$opts['reset_content_opts'] = weaverx_cz_checkbox(
			__( 'Clear Major Content Options', 'weaver-xtreme' ) . WEAVERX_OBSOLETE,
			__( '<em>ADVANCED OPTION!</em> Clear wrapping Content Area bg, borders, padding, and top/bottom margins for views with posts. Allows more flexible post styling. Most people will not need this.', 'weaver-xtreme' )
		);

	}


	return $opts;
}

/* ========================================== Layout: Sidebars ============================================= */

function weaverx_layout_sidebars_opts() {
	$opts = array();
	$opts['layout-primary-all-heading'] = weaverx_cz_group_title( __( 'Sidebar Layout for Page Types', 'weaver-xtreme' ),
		__( 'Sidebar Layout for each type of page ( "stack top" used for mobile view ).', 'weaver-xtreme' )
	);

	$opts['layout_default'] = weaverx_cz_select(
		__( 'Blog, Post, Page Default', 'weaver-xtreme' ),
		__( 'Select the default theme layout for blog, single post, attachments, and pages.', 'weaver-xtreme' ),
		'weaverx_cz_choices_sb_layout', 'right', 'refresh'
	);


	$opts['layout_default_archive'] = weaverx_cz_select(
		__( 'Archive-like Default', 'weaver-xtreme' ),
		__( 'Select the default theme layout for all other pages - archives, search, etc.', 'weaver-xtreme' ),
		'weaverx_cz_choices_sb_layout', 'right', 'refresh'
	);

	$opts['layout_page'] = weaverx_cz_select(
		__( 'Page', 'weaver-xtreme' ),
		__( 'Layout for normal Pages on your site.', 'weaver-xtreme' ),
		'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
	);

	$opts['layout_blog'] = weaverx_cz_select(
		__( 'Blog', 'weaver-xtreme' ),
		__( 'Layout for main blog page. Includes "Page with Posts" Page templates.', 'weaver-xtreme' ),
		'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
	);

	$opts['layout_single'] = weaverx_cz_select(
		__( 'Post Single Page', 'weaver-xtreme' ),
		__( 'Layout for Posts displayed as a single page.', 'weaver-xtreme' ),
		'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
	);

	$opts['layout_full_note1'] = weaverx_cz_html_description(
		__( 'Weaver Xtreme Plus includes options for other archive-like pages.', 'weaver-xtreme' ), 'plus' );

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['layout_attachments'] = weaverx_cz_select_plus(
			__( 'Attachments', 'weaver-xtreme' ),
			__( 'Layout for attachment pages such as images.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);

		$opts['layout_archive'] = weaverx_cz_select_plus(
			__( 'Date Archive', 'weaver-xtreme' ),
			__( 'Layout for archive by date pages.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);

		$opts['layout_category'] = weaverx_cz_select_plus(
			__( 'Category Archive', 'weaver-xtreme' ),
			__( 'Layout for category archive pages.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);

		$opts['layout_tag'] = weaverx_cz_select_plus(
			__( 'Tags Archive', 'weaver-xtreme' ),
			__( 'Layout for tag archive pages.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);

		$opts['layout_author'] = weaverx_cz_select_plus(
			__( 'Author Archive', 'weaver-xtreme' ),
			__( 'Layout for author archive pages.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);

		$opts['layout_search'] = weaverx_cz_select_plus(
			__( 'Search Results, 404', 'weaver-xtreme' ),
			__( 'Layout for search results and 404 pages.', 'weaver-xtreme' ),
			'weaverx_cz_choices_sb_layout_default', 'default', 'refresh'
		);
	}

	$opts['layout-primary-widget-heading'] = weaverx_cz_group_title( __( 'Primary Sidebar', 'weaver-xtreme' )
	);

	$opts['primary_cols_int'] = weaverx_cz_range(
		__( 'Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['layout-primary-custom-widths'] = weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )
		);

		$opts['_primary_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);

		$opts['_primary_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_primary_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Phone Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);


		$opts['primary_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between  multi-column widgets on rows.', 'weaver-xtreme' )
		);


		$opts['primary_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.', 'weaver-xtreme' ),
			'plus'
		);
	}

	$opts['layout-secondary-widget-heading'] = weaverx_cz_group_title( __( 'Secondary Sidebar', 'weaver-xtreme' ) );

	$opts['secondary_cols_int'] = weaverx_cz_range(
		__( 'Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['layout-secondary-custom-widths'] = weaverx_cz_heading( __( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' ) );

		$opts['_secondary_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);

		$opts['_secondary_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_secondary_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Phone Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);


		$opts['secondary_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between multi-column widgets on rows.', 'weaver-xtreme' )
		);


		$opts['secondary_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.', 'weaver-xtreme' ),
			'plus'
		);
	}

	// Top Widget areas


	$opts['layout-top-widget-heading'] = weaverx_cz_group_title( esc_html__( 'Top Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );

	$opts['top_cols_int'] = weaverx_cz_range(
		__( 'Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['layout-top-custom-widths'] = weaverx_cz_heading( esc_html__( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' ) );

		$opts['_top_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);

		$opts['_top_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_top_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['top_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between multi-column widgets on rows.',
				'weaver-xtreme' )
		);

		$opts['top_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.',
				'weaver-xtreme' ),
			'plus'
		);
	}

	// Bottom Widget areas

	$opts['layout-bottom-widget-heading'] = weaverx_cz_group_title( esc_html__( 'Bottom Widget Areas', 'weaver-xtreme' ),
		esc_html__( 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).', 'weaver-xtreme' ) );

	$opts['bottom_cols_int'] = weaverx_cz_range(
		__( 'Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full

		$opts['layout-bottom-custom-widths'] = weaverx_cz_heading( esc_html__( 'Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' ) );

		$opts['_bottom_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);

		$opts['_bottom_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_bottom_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['bottom_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between multi-column widgets on rows.',
				'weaver-xtreme' )
		);

		$opts['bottom_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.',
				'weaver-xtreme' ),
			'plus'
		);
	}

	return $opts;
}

/* ================================== Layout: Footer ============================ */

function weaverx_layout_footer_opts() {
	$opts = array();

	$opts['footer_sb_cols_int'] = weaverx_cz_range(
		__( 'Footer Columns of Widgets', 'weaver-xtreme' ),
		'',
		1,
		array(
			'min'  => 1,
			'max'  => 8,
			'step' => 1,
		)
	);

	$opts['layout_full_note3'] = weaverx_cz_html_description(
		'<small>' . __( '<em>Weaver Xtreme Plus</em> includes options for custom column widths, and smart margins.', 'weaver-xtreme' ) . '</small>', 'plus' );


	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['layout-footer-custom-widths'] = weaverx_cz_heading( __( 'Footer Custom Widget Widths', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
			__( 'You can optionally specify widget widths, including for specific devices. Overrides the Columns of Widgets setting. Please read the help entry!', 'weaver-xtreme' )
		);

		$opts['_footer_sb_lw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Desktop Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths separated by comma. Use semi-colon ( ; ) for end of each row. Widths are % of each row. (&diams;)', 'weaver-xtreme' ),
			'1',
			__( '25,25,50; 60,40; - for example', 'weaver-xtreme' ),
			'refresh',
			'plus'
		);


		$opts['_footer_sb_mw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Small Tablet Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['_footer_sb_sw_cols_list'] = weaverx_cz_textarea(
			__( 'Footer Phone Widget Widths', 'weaver-xtreme' ),
			__( 'List of widget widths. (&diams;)', 'weaver-xtreme' ),
			'1',
			'',
			'refresh',
			'plus'
		);

		$opts['footer_sb_no_widget_margins'] = weaverx_cz_checkbox(
			__( 'Footer No Smart Widget Margins', 'weaver-xtreme' ),
			__( 'Do not use "smart margins" between  multi-column widgets on rows.', 'weaver-xtreme' )
		);


		$opts['footer_sb_eq_widgets'] = weaverx_cz_checkbox(
			__( 'Footer Equal Height Widget Rows', 'weaver-xtreme' ),
			__( 'Make widgets equal height rows if &gt; 1 column.', 'weaver-xtreme' ),
			'plus'
		);
	}


	return $opts;
}
