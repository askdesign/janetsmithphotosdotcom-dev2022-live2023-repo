<?php

/**
 * Define the sections and settings for the panel w_content panel
 */
function weaverx_customizer_define_w_content_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-content';
	$w_content_sections = array();

	$w_content_sections['w_content-content'] = array(
		'panel'       => $panel,
		'title'       => __( 'Content Area', 'weaver-xtreme' ),
		'description' => 'Area properties for page and post content.',
		'options'     => weaverx_controls_w_content_content(),
	);


	$w_content_sections['w_content-links'] = array(
		'panel'       => $panel,
		'title'       => __( 'Links', 'weaver-xtreme' ),
		'description' => 'Options for content area links',
		'options'     => weaverx_controls_w_content_links(),
	);

	$w_content_sections['w_content-search-boxes'] = array(
		'panel'       => $panel,
		'title'       => __( 'Search Boxes', 'weaver-xtreme' ),
		'description' => 'Search box related options.',
		'options'     => weaverx_controls_w_content_search_boxes(),
	);

	$w_content_sections['w_content-images'] = array(
		'panel'       => $panel,
		'title'       => __( 'BG Images', 'weaver-xtreme' ),
		'description' => 'Background Images for Content area and Pages..',
		'options'     => weaverx_controls_w_content_images(),
	);

	$w_content_sections['w_content-fi-pages'] = array(
		'panel'       => $panel,
		'title'       => __( 'Featured Image - Pages', 'weaver-xtreme' ),
		'description' => 'Display of Page Featured Images.',
		'options'     => weaverx_controls_w_content_fi_pages(),
	);

	$w_content_sections['w_content-lists'] = array(
		'panel'       => $panel,
		'title'       => __( 'Lists - &lt;HR&gt; - Tables', 'weaver-xtreme' ),
		'description' => 'Other options related to content.',
		'options'     => weaverx_controls_w_content_lists(),
	);

	$w_content_sections['w_content-comments'] = array(
		'panel'       => $panel,
		'title'       => __( 'Comments', 'weaver-xtreme' ),
		'description' => 'Settings for displaying comments.',
		'options'     => weaverx_controls_w_content_comments(),

	);

	return $w_content_sections;
}

// the definitions of the controls for each panel follow

function weaverx_controls_w_content_content() {
	$opts = array();

	$opts['w_content-heading-colors'] = weaverx_cz_group_title(
		__( 'Content Area Colors', 'weaver-xtreme' ) );

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

	$opts['input_color'] = weaverx_cz_color(
		'input_color',
		__( 'Text Input Areas Color', 'weaver-xtreme' )
	);

	$opts['input_bgcolor'] = weaverx_cz_color(
		'input_bgcolor',
		__( 'Text Input Areas BG Color', 'weaver-xtreme' )
	);

	$opts['editor_bgcolor'] = weaverx_cz_color(
		'editor_bgcolor',
		__( 'Page/Post Editor BG', 'weaver-xtreme' ),
		__( "Alternative Background Color to use for Page/Post editor if you're using transparent or image backgrounds.", 'weaver-xtreme' ),
		'refresh'
	);

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'content', __( 'Content Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts['content-spacing-t2'] = weaverx_cz_group_title(
		__( 'Other Spacing', 'weaver-xtreme' )
	);

	$opts['w_content-widthinfo'] = weaverx_cz_heading( __( 'Width', 'weaver-xtreme' ),
		__( 'The width of this area is automatically determined by the enclosing area.', 'weaver-xtreme' ) );

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

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'page_title', __( 'Page Title Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	// archive pages title needs refresh due to interaction with page title attributes
	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'archive_title', __( 'Archive Pages Title Typography', 'weaver-xtreme' ), '', 'refresh' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'content_h', __( 'Content Headings Typography', 'weaver-xtreme' ),
		__( 'Headings ( &lt;h1&gt;-&lt;h6&gt; ) in page and post content.', 'weaver-xtreme' ), 'refresh', 'normal' ) );


	$opts['w_content-heading-style0'] = weaverx_cz_group_title( __( 'Content Style', 'weaver-xtreme' ) );

	$opts['content_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Content Area', 'weaver-xtreme' )
	);

	$opts['content_shadow'] = weaverx_cz_select(
		__( 'Add shadow to Content Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['content_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to Content Area', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);

	$opts['page_title_underline_int'] = weaverx_cz_range(
		__( 'Bar under Page Title (px)', 'weaver-xtreme' ),
		__( 'Enter size in px if you want a bar under Page Titles. Leave 0 for no bar. Color matches title.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		),
		'postMessage'
	);

	if ( weaverx_options_level() >= WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full, intermediate
		$opts['page_cols'] = weaverx_cz_select(    // must be refresh because column class applied to specific page id
			__( 'Content Columns', 'weaver-xtreme' ),
			__( 'Automatically split all page content into columns. You can also use the Per Page option. This option does not apply to posts.', 'weaver-xtreme' ),
			'weaverx_cz_choices_columns', '1', 'refresh' );
	}

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['hyphenate'] = weaverx_cz_checkbox(
			__( 'Auto Hyphenate Content', 'weaver-xtreme' ),
			__( 'Allow browsers to automatically hyphenate text for appearance.', 'weaver-xtreme' )
		);

		$opts['content_add_class'] = weaverx_cz_add_class( __( 'Content: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_content_links() {
	$opts = array();

	$opts['w_content-links-h'] = weaverx_cz_group_title(
		__( 'Content Links Colors', 'weaver-xtreme' ) );

	$opts['contentlink_color'] = weaverx_cz_color(
		'contentlink_color',
		__( 'Content Links Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['contentlink_hover_color'] = weaverx_cz_color(
		'contentlink_hover_color',
		__( 'Content Links Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'contentlink', __( 'Content Links Typography', 'weaver-xtreme' ),
		__( 'Typography for links in Content ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );

	return $opts;
}

function weaverx_controls_w_content_search_boxes() {
	$opts = array();

	$opts['w_content-heading-search'] = weaverx_cz_group_title(
		__( 'Search Colors', 'weaver-xtreme' ) );

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


	return $opts;
}

function weaverx_controls_w_content_images() {
	$opts = array();

	$opts = array_merge( $opts,
		weaverx_cz_add_image( 'content', esc_html__( 'Content BG Image', 'weaver-xtreme' ),
			esc_html__( 'Background image for Content - wraps page/post area (#content)', 'weaver-xtreme' ) )
	);

	$opts = array_merge( $opts,
		weaverx_cz_add_image( 'page', esc_html__( 'Page content BG Image', 'weaver-xtreme' ),
			esc_html__( 'Background image for Page content area (#content .page)', 'weaver-xtreme' ) )
	);

	$opts['content_images_note'] = weaverx_cz_group_title( __( 'Sitewide Image Options', 'weaver-xtreme' ),
		__( 'Note: Sitewide options that apply to all images are found on the Global Site Settings &rarr; Images menu.', 'weaver-xtreme' ) );

	return $opts;
}

function weaverx_controls_w_content_fi_pages() {
	$opts = array();

	$opts['images-content-FI'] = weaverx_cz_group_title( __( 'Featured Image - Pages', 'weaver-xtreme' ) );


	$opts['page_fi_location'] = weaverx_cz_select(
		__( 'Featured Image Location', 'weaver-xtreme' ),
		__( 'Where to display Featured Image for Pages', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
	);


	$opts['page_min_height'] = weaverx_cz_range(
		__( 'Page Content Height (px)', 'weaver-xtreme' ),
		__( 'Minimum Height Page Content with Parallax BG.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 10,
			'max'  => 2000,
			'step' => 10,
		),
		'refresh',
		'plus'
	);

	$opts['page_fi_align'] = weaverx_cz_select(
		__( 'Align Featured Image', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
	);


	$opts['page_fi_hide'] = weaverx_cz_select(
		__( 'Hide Featured Image', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);


	$opts['page_fi_size'] = weaverx_cz_select(
		__( 'Page Featured Image Size', 'weaver-xtreme' ),
		__( 'Media Library Image Size for Featured Image on pages. ( Header uses full size ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
	);


	$opts['page_fi_width'] = weaverx_cz_range_float(
		__( 'Featured Image Width (%)', 'weaver-xtreme' ),
		__( 'Width of Featured Image on Pages. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'plus'
	);


	$opts['page_fi_nolink'] = weaverx_cz_checkbox( __( "Don't add link to FI", 'weaver-xtreme' ),
		__( 'Do not add link to Featured Image.', 'weaver-xtreme' ), 'plus' );


	return $opts;
}

function weaverx_controls_w_content_lists() {
	$opts = array();

	$opts['contentlist_bullet'] = weaverx_cz_select(
		__( 'Content List Bullet Style', 'weaver-xtreme' ),
		__( 'Bullet used for Unordered Lists in Content.', 'weaver-xtreme' ),
		'weaverx_cz_choices_list_bullets', 'disc', 'postMessage'
	);

	$opts['hr_color'] = weaverx_cz_color(
		'hr_color',
		__( '&lt;HR&gt; color', 'weaver-xtreme' ),
		__( 'Color of horizontal ( &lt;hr&gt; ) lines in posts and pages. Use the "Custom CSS &rarr; Content" panel to customize the style of the &lt;hr&gt;.', 'weaver-xtreme' )
	);

	$opts['weaverx_tables'] = weaverx_cz_select(
		__( 'Table Style', 'weaver-xtreme' ),
		weaverx_markdown( __( 'Style used for tables in content. ***WARNING!*** Tables are inherently non-responsive, and *do not* work well for mobile devices. We advise you to avoid using tables.', 'weaver-xtreme' ) ),
		array(
			'default'   => __( 'Theme Default', 'weaver-xtreme' ),
			'bold'      => __( 'Bold Headings', 'weaver-xtreme' ),
			'noborders' => __( 'No Border', 'weaver-xtreme' ),
			'fullwidth' => __( 'Wide', 'weaver-xtreme' ),
			'wide'      => __( 'Wide 2', 'weaver-xtreme' ),
			'plain'     => __( 'Minimal', 'weaver-xtreme' ),
		),
		'default', 'refresh'
	);

	return $opts;
}

function weaverx_controls_w_content_comments() {
	$opts = array();

	$opts['w_content-heading-comments'] = weaverx_cz_group_title(
		__( 'Comment Colors', 'weaver-xtreme' ) );

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

	$opts['w_content-comment-style'] = weaverx_cz_group_title(
		__( 'Comment Style', 'weaver-xtreme' ) );

	$opts['show_comment_borders'] = weaverx_cz_checkbox(
		__( 'Show Borders on Comments', 'weaver-xtreme' ),
		__( 'Show Borders around comment sections - improves visual look of comments.', 'weaver-xtreme' ),
		'plus',
		'postMessage'
	);

	$opts['visibility-content-comments-heading'] = weaverx_cz_group_title( __( 'Comments Visibility', 'weaver-xtreme' ),
		__( 'Visibility settings for Comments area.', 'weaver-xtreme' ) );

	$opts['hide_old_comments'] = weaverx_cz_checkbox(
		__( 'Hide Old Comments When Closed', 'weaver-xtreme' ),
		__( 'Hide previous comments after closing comments for page or post. (Default: show old comments after closing.)', 'weaver-xtreme' )
	);

	$opts['form_allowed_tags'] = weaverx_cz_checkbox(
		__( 'Show Allowed HTML', 'weaver-xtreme' ),
		__( 'Show the allowed HTML tags below comment input box.', 'weaver-xtreme' )
	);

	$opts['hide_comment_bubble'] = weaverx_cz_checkbox(
		__( 'Hide Comment Title Icon', 'weaver-xtreme' ),
		__( 'Hide the comment icon ( bubble ) before the Comments title.', 'weaver-xtreme' )
	);

	$opts['hide_comment_hr'] = weaverx_cz_checkbox(
		__( 'Hide Separator Above Comments', 'weaver-xtreme' ),
		__( 'Hide the &lt;hr> separator line above the Comments area.', 'weaver-xtreme' )
	);


	$opts['visibility-content-comments-note'] = weaverx_cz_heading( __( 'Hiding/Enabling Page and Post Comments', 'weaver-xtreme' ),
		__( 'Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function. It is controlled by WordPress on the <em>Settings &rarr; Discussion</em> menu.', 'weaver-xtreme' ) );

	return $opts;
}


