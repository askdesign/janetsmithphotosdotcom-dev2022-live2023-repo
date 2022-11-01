<?php

/**
 * Define the sections and settings for the panel w_posts panel
 */
function weaverx_customizer_define_w_posts_sections() {
	global $wp_customize;

	$panel = 'weaverx_where-posts';
	$w_posts_sections = array();

	$w_posts_sections['w_posts-post-area'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Area', 'weaver-xtreme' ),
		'description' => 'Use these settings to override Content Area settings for Posts (blog entries).',
		'options'     => weaverx_controls_w_posts_posts(),
	);

	$w_posts_sections['w_posts-post-title'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Title', 'weaver-xtreme' ),
		'description' => 'Options for the Post Title.',
		'options'     => weaverx_controls_w_posts_title(),
	);

	$w_posts_sections['w_posts-post-layout'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Layout', 'weaver-xtreme' ),
		'description' => 'Layout of Posts.',
		'options'     => weaverx_controls_w_posts_layout(),
	);

	$w_posts_sections['w_posts-post-excerpts'] = array(
		'panel'       => $panel,
		'title'       => __( 'Excerpts / Full Posts', 'weaver-xtreme' ),
		'description' => 'How to display posts in Blog / Archive Views',
		'options'     => weaverx_controls_w_posts_excerpts(),
	);

	$w_posts_sections['w_posts-post-fi'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Featured Image', 'weaver-xtreme' ),
		'description' => __( 'Options for Post Featured Images.', 'weaver-xtreme' ) ,
		'options'     => weaverx_controls_w_posts_fi(),
	);

	$w_posts_sections['w_posts-post-meta'] = array(
		'panel'       => $panel,
		'title'       => __( 'Post Meta Info Lines', 'weaver-xtreme' ),
		'description' => 'Top and Bottom Post Meta Information lines.',
		'options'     => weaverx_controls_w_posts_meta(),
	);

	$w_posts_sections['w_posts-post-custom-meta'] = array(
		'panel'       => $panel,
		'title'       => __( 'Custom Post Meta Lines', 'weaver-xtreme' ),
		'description' => 'Replace Post Meta Info Lines with custom info line templates. Advanced options: see help file.',
		'options'     => weaverx_controls_w_posts_custom_meta(),
	);


	$w_posts_sections['w_posts-post-other'] = array(
		'panel'       => $panel,
		'title'       => __( 'Other Post Related Options', 'weaver-xtreme' ),
		'description' => 'Other options related to post display, including single pages.',
		'options'     => weaverx_controls_w_posts_other(),
	);

	return $w_posts_sections;
}

// the definitions of the controls for each panel follow


function weaverx_controls_w_posts_posts() {
	$opts = array();

		$opts['color-post-heading'] = weaverx_cz_group_title( __( 'Post Specific Colors', 'weaver-xtreme' ) );

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

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post', __( 'Post Area Typography', 'weaver-xtreme' ), '', 'postMessage' ) );



	$opts['w_posts-heading-alsp'] = weaverx_cz_group_title( __( 'Post Spacing', 'weaver-xtreme' ) );

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

	$opts['w_post-widthinfo'] = weaverx_cz_heading( __( 'Width', 'weaver-xtreme' ),
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



	$opts['w_posts-heading-posts'] = weaverx_cz_group_title( __( 'Post Style', 'weaver-xtreme' ) );

	$opts['post_border'] = weaverx_cz_checkbox_post(
		__( 'Add border to Posts', 'weaver-xtreme' )
	);

	$opts['post_shadow'] = weaverx_cz_select(
		__( 'Add shadow to posts', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_shadow', '-0', 'postMessage'
	);

	$opts['post_rounded'] = weaverx_cz_select(
		__( 'Add rounded corners to posts', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_rounded', 'none', WEAVERX_ROUNDED_TRANSPORT
	);


	$opts['post_title_underline_int'] = weaverx_cz_range(
		__( 'Bar under Post Titles (px)', 'weaver-xtreme' ),
		__( 'Enter size in px if you want a bar under Post Titles. Leave 0 for no bar. Color matches title.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		),
		'postMessage'
	);

	if ( weaverx_options_level() > WEAVERX_LEVEL_INTERMEDIATE ) {        // show if full
		$opts['post_add_class'] = weaverx_cz_add_class( __( 'Post Area: Add Classes', 'weaver-xtreme' ) );
	}

	return $opts;
}

function weaverx_controls_w_posts_title() {
	$opts = array();

	$opts['w_posts-heading-title'] = weaverx_cz_group_title(
		__( 'Posts Title Colors', 'weaver-xtreme' ) );

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

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_title', __( 'Post Title Typography', 'weaver-xtreme' ), '', 'postMessage' ) );


	return $opts;
}

function weaverx_controls_w_posts_layout() {
	$opts = array();

	$opts['w_posts-heading-layout'] = weaverx_cz_group_title(
		__( 'Post Layout', 'weaver-xtreme' ) );

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

function weaverx_controls_w_posts_excerpts() {
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


	if ( weaverx_options_level() >= WEAVERX_LEVEL_ADVANCED ) {        // show if full

		$opts['fullpost_first'] = weaverx_cz_range(
			__( 'Full text for first "n" Posts', 'weaver-xtreme' ),
			__( 'Display the full post for the first "n" posts on Blog pages. Does not override manually added &lt;--more--> breaks.', 'weaver-xtreme' ),
			0,
			array( 'min' => 0, 'max' => 20, 'step' => 1 )
		);

		$opts['excerpt_more_msg'] = weaverx_cz_htmlarea( __( '"Continue reading" Message', 'weaver-xtreme' ),
			__( 'Change default <em>Continue reading &rarr;</em> message for excerpts. You can include HTML ( e.g., &lt;img> ).', 'weaver-xtreme' ),
			'1' );
	}

	return $opts;
}

function weaverx_controls_w_posts_meta() {
	$opts = array();

	$opts['w_posts-heading-meta'] = weaverx_cz_group_title(
		__( 'Meta Info Colors', 'weaver-xtreme' ) );

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


	// post meta info bar
	$opts['ilink_color'] = weaverx_cz_color(
		'ilink_color',
		__( 'Post Meta Info Link Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['ilink_hover_color'] = weaverx_cz_color(
		'ilink_hover_color',
		__( 'Post Meta Info Link Hover Color', 'weaver-xtreme' ),
		'', 'refresh' );

	$opts['post_icons'] = weaverx_cz_select(
		__( 'Text or Icons for Post Info', 'weaver-xtreme' ),
		__( 'Use Icons instead of Text descriptions in Post Meta Info.', 'weaver-xtreme' ),
		array(
			'text'      => __( 'Text Descriptions', 'weaver-xtreme' ),
			'fonticons' => __( 'Font Icons', 'weaver-xtreme' ),
			'graphics'  => __( 'Graphic Icons', 'weaver-xtreme' ),
		),
		'text', 'refresh'
	);

	$opts['post_icons_color'] = weaverx_cz_color(
		'post_icons_color',
		__( 'Post Font Icons Color', 'weaver-xtreme' ),
		__( 'Set Font Icon color if Font Icons on Info Lines specified.', 'weaver-xtreme' )
	);

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_info_top', __( 'Top Post Info Line Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_control( 'post_info_bottom', __( 'Bottom Post Info Line Typography', 'weaver-xtreme' ), '', 'postMessage' ) );

	$opts = array_merge( $opts, weaverx_cz_fonts_add_link( 'ilink', __( 'Post Meta Info Links Typography', 'weaver-xtreme' ),
		__( 'Typography for links in post meta information top and bottom lines. ( uses Standard Link colors if left inherit ).', 'weaver-xtreme' ) ) );


	$opts['visibility-posts-metax-heading'] = weaverx_cz_group_title( __( 'Post Meta Info Lines Visibility', 'weaver-xtreme' ) );

	$opts['post_info_hide_top'] = weaverx_cz_checkbox(
		__( 'Hide top post meta info line', 'weaver-xtreme' ),
		__( 'Hide entire top info line ( posted on, by ) of post.', 'weaver-xtreme' )
	);

	$opts['post_info_hide_bottom'] = weaverx_cz_checkbox(
		__( 'Hide bottom post meta info line', 'weaver-xtreme' ),
		__( 'Hide entire bottom info line ( posted in, comments ) of post.', 'weaver-xtreme' )
	);

	$opts['show_post_bubble'] = weaverx_cz_checkbox(
		__( 'Show Comment Bubble', 'weaver-xtreme' ),
		__( 'Show comment bubble with link to comments on the post info line.', 'weaver-xtreme' )
	);

	$opts['show_post_avatar'] = weaverx_cz_select(
		__( 'Show Author Avatar', 'weaver-xtreme' ),
		__( 'Show author avatar on the post info line ( also can be set per post with post editor ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_hide', 'hide', 'refresh'
	);

	$opts['visibility-posts-note-meta-heading'] = weaverx_cz_heading( __( 'NOTE:', 'weaver-xtreme' ),
		__( 'Hiding any meta info item will force using Icons instead of text descriptions.', 'weaver-xtreme' ) );

	$opts['post_hide_date'] = weaverx_cz_checkbox(
		__( 'Hide Post Date', 'weaver-xtreme' )
	);

	$opts['post_hide_author'] = weaverx_cz_checkbox(
		__( 'Hide Post Author', 'weaver-xtreme' )
	);

	$opts['post_hide_categories'] = weaverx_cz_checkbox(
		__( 'Hide Post Categories', 'weaver-xtreme' )
	);

	$opts['post_hide_tags'] = weaverx_cz_checkbox(
		__( 'Hide Post Tags', 'weaver-xtreme' )
	);

	$opts['hide_permalink'] = weaverx_cz_checkbox(
		__( 'Hide Permalink', 'weaver-xtreme' )
	);

	$opts['hide_singleton_category'] = weaverx_cz_checkbox(
		__( 'Hide Category if Only One', 'weaver-xtreme' ),
		__( "If there is only one overall category defined ( Uncategorized ), don't show Category of post.", 'weaver-xtreme' )
	);

	$opts['post_hide_single_author'] = weaverx_cz_checkbox(
		__( 'Hide Author for Single Author Site', 'weaver-xtreme' ),
		__( "Hide author information if site has only a single author.", 'weaver-xtreme' )
	);

	$opts['post_info_line1'] = weaverx_cz_line();

	$opts['post_avatar_int'] = weaverx_cz_range(
		__( 'Author Avatar Size (px)', 'weaver-xtreme' ),
		__( 'Size of Author Avatar in px - only for Post Info line. (Default: 28px)', 'weaver-xtreme' ),
		28,
		array(
			'min'  => 10,
			'max'  => 60,
			'step' => 1,
		),
		'postMessage',
		'plus'
	);


	return $opts;
}

function weaverx_controls_w_posts_fi() {
	$opts = array();

	$opts['images-fi-post-h'] = weaverx_cz_group_title( __( 'Post Featured Image Options', 'weaver-xtreme' ),
		__( 'Options for Post Featured Images.', 'weaver-xtreme' ) );

	$opts['post_fi_nolink'] = weaverx_cz_checkbox( __( "Don't add link to FI", 'weaver-xtreme' ),
		__( 'Do not add link to Featured Image for any post layout.', 'weaver-xtreme' ), 'plus' );


	$opts['images-content-FI-full'] = weaverx_cz_group_title( __( 'Featured Image - Full Blog Posts', 'weaver-xtreme' ),
		__( 'Display of Post Featured Images when Post is displayed as a Full Post.', 'weaver-xtreme' ) );

	$opts['post_full_fi_location'] = weaverx_cz_select(
		__( 'Featured Image Location - Full Post', 'weaver-xtreme' ),
		__( 'Where to display Featured Image.', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_location', 'content-top', 'refresh'

	);

	$opts['post_blog_min_height'] = weaverx_cz_range(
		__( 'Post Height - Blog View (px)', 'weaver-xtreme' ),
		__( 'Minimum Height of Post, full or excerpt, with Parallax BG in blog views.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 10,
			'max'  => 2000,
			'step' => 10,
		),
		'refresh',
		'plus'
	);

	$opts['post_full_fi_align'] = weaverx_cz_select(
		__( 'Align Featured Image - Full Post', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
	);

	$opts['post_full_fi_hide'] = weaverx_cz_select(
		__( 'Hide Featured Image - Full Post', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['post_full_fi_size'] = weaverx_cz_select(
		__( 'Page Featured Image Size - Full Post', 'weaver-xtreme' ),
		__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
	);


	$opts['post_full_fi_width'] = weaverx_cz_range_float(
		__( 'Featured Image Width (%) - Full Post', 'weaver-xtreme' ),
		__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'plus'
	);


	$opts['images-content-FI-excerpt'] = weaverx_cz_group_title( __( 'Featured Image - Excerpt Posts', 'weaver-xtreme' ),
		__( 'Display of Post Featured Images when Post is displayed as an Excerpt.', 'weaver-xtreme' ) );

	$opts['post_excerpt_fi_location'] = weaverx_cz_select(
		__( 'Featured Image Location - Excerpt', 'weaver-xtreme' ),
		__( 'Where to display Featured Image.', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
	);

	$opts['post_excerpt_fi_align'] = weaverx_cz_select(
		__( 'Align Featured Image - Excerpt', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
	);

	$opts['post_excerpt_fi_hide'] = weaverx_cz_select(
		__( 'Hide Featured Image - Excerpt', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['post_excerpt_fi_size'] = weaverx_cz_select(
		__( 'Page Featured Image Size - Excerpt', 'weaver-xtreme' ),
		__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
	);


	$opts['post_excerpt_fi_width'] = weaverx_cz_range_float(
		__( 'Featured Image Width (%) - Excerpt', 'weaver-xtreme' ),
		__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'plus'
	);

	$opts['images-content-FI-single'] = weaverx_cz_group_title( __( 'Featured Image - Single Page', 'weaver-xtreme' ),
		__( 'Display of Post Featured Images when Post is displayed on the Single Page.', 'weaver-xtreme' ) );

	$opts['post_fi_location'] = weaverx_cz_select(
		__( 'Featured Image Location - Single Page', 'weaver-xtreme' ),
		__( 'Where to display Featured Image.', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_location', 'content-top', 'refresh'
	);

	$opts['post_min_height'] = weaverx_cz_range(
		__( 'Post Height - Single Page (px)', 'weaver-xtreme' ),
		__( 'Minimum Height of Post with Parallax BG in Single Page view.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 10,
			'max'  => 2000,
			'step' => 10,
		),
		'refresh',
		'plus'
	);

	$opts['post_fi_align'] = weaverx_cz_select(
		__( 'Align Featured Image - Single Page', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_fi_align', 'fi-alignleft', 'refresh'
	);

	$opts['post_fi_hide'] = weaverx_cz_select(
		__( 'Hide Featured Image - Single Page', 'weaver-xtreme' ),
		'',
		'weaverx_cz_choices_hide', 'hide-none', 'refresh'
	);

	$opts['post_fi_size'] = weaverx_cz_select(
		__( 'Page Featured Image Size - Single Page', 'weaver-xtreme' ),
		__( 'Media Library Image Size for Featured Image. ( Header uses full size ).', 'weaver-xtreme' ),
		'weaverx_cz_choices_fi_size', 'thumbnail', 'refresh'
	);

	$opts['post_fi_width'] = weaverx_cz_range_float(
		__( 'Featured Image Width (%) - Single Page', 'weaver-xtreme' ),
		__( 'Width of Featured Image. Max Width in %, overrides FI Size selection. Set to 0 to avoid overriding above Featured Image Size setting.', 'weaver-xtreme' ),
		0,
		array(
			'min'  => 0,
			'max'  => 100,
			'step' => 0.5,
		),
		'refresh',
		'plus'
	);

	return $opts;
}

function weaverx_controls_w_posts_other() {
	$opts = array();


	$opts['post_author_bgcolor'] = weaverx_cz_color(
		'post_author_bgcolor',
		__( 'Author Info BG Color', 'weaver-xtreme' ),
		__( 'Background color used for Author Bio.', 'weaver-xtreme' )
	);


	$opts['visibility-posts-misc-heading'] = weaverx_cz_group_title( __( 'Other Post Visibility Options', 'weaver-xtreme' ) );

	$opts['hide_post_format_icon'] = weaverx_cz_checkbox(
		__( 'Hide Post Format Icons', 'weaver-xtreme' ),
		__( 'Hide the icons for posts with Post Format specified.', 'weaver-xtreme' ),
		'plus' );

	$opts['show_comments_closed'] = weaverx_cz_checkbox(
		__( 'Show "Comments are closed"', 'weaver-xtreme' ),
		__( 'If comments are off, and no comments have been made, show the <em>Comments are closed.</em> message.', 'weaver-xtreme' )
	);

	$opts['allow_attachment_comments'] = weaverx_cz_checkbox(
		__( 'Allow comments for attachments', 'weaver-xtreme' ),
		__( 'Allow visitors to leave comments for attachments (usually full size media image - only if comments allowed).', 'weaver-xtreme' )
	);

	$opts['hide_author_bio'] = weaverx_cz_checkbox(
		__( 'Hide Author Bio', 'weaver-xtreme' ),
		__( 'Hide display of author bio box on Author Archive and Single Post page views.', 'weaver-xtreme' )
	);

	$opts = array_merge( $opts,
		weaverx_cz_add_image( 'post', esc_html__( 'Post BG Image', 'weaver-xtreme' ),
			esc_html__( 'Background image for Post content area (#content .post)', 'weaver-xtreme' ) )
		);

	return $opts;
}

function weaverx_controls_w_posts_custom_meta() {
	$opts = array();


	$opts['content-post-meta'] = weaverx_cz_group_title( __( 'Custom Post Info Lines', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON,
		__( 'Replace Info Lines with custom info line templates. Advanced options: see help file.', 'weaver-xtreme' ) );

	$opts['custom_posted_on'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_html',
			'transport'         => 'refresh',
			'default'           => '',
		),
		'control' => array(
			'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
			'label'        => __( 'Top Post Info Line', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
			'description'  => __( 'Custom template for top post info line. (&#9734;Plus)', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '1',
				'placeholder' => __( 'Please see help file for info line template info.', 'weaver-xtreme' ),
			),
		),
	);

	$opts['custom_posted_in'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_html',
			'transport'         => 'refresh',
			'default'           => '',
		),
		'control' => array(
			'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
			'label'        => __( 'Bottom Post Info Line', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
			'description'  => __( 'Custom template for bottom post info line. (&#9734;Plus)', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '1',
				'placeholder' => __( 'Please see help file for info line template info.', 'weaver-xtreme' ),
			),
		),
	);

	$opts['custom_posted_on_single'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_html',
			'transport'         => 'refresh',
			'default'           => '',
		),
		'control' => array(
			'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
			'label'        => __( 'Top Post Info Line (Single)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
			'description'  => __( 'Custom template for top post info line on single pages.(&#9734;Plus)', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '1',
				'placeholder' => __( 'Please see help file for info line template info.', 'weaver-xtreme' ),
			),
		),
	);

	$opts['custom_posted_in_single'] = array(
		'setting' => array(
			'sanitize_callback' => 'weaverx_cz_sanitize_html',
			'transport'         => 'refresh',
			'default'           => '',
		),
		'control' => array(
			'control_type' => WEAVERX_PLUS_TEXTAREA_CONTROL,
			'label'        => __( 'Bottom Post Info Line (Single)', 'weaver-xtreme' ) . WEAVERX_PLUS_ICON . WEAVERX_REFRESH_ICON,
			'description'  => __( 'Custom template for bottom post info line on single pages. (&#9734;Plus)', 'weaver-xtreme' ),
			'type'         => 'textarea',
			'input_attrs'  => array(
				'rows'        => '1',
				'placeholder' => __( 'Please see help file for info line template info.', 'weaver-xtreme' ),
			),
		),
	);


	return $opts;
}

