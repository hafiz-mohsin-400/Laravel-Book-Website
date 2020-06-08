

<?php 
	
	if ( ! function_exists( 'alliedbooks_setup' )) {
		
		function alliedbooks_setup()
		{
			$dir_lang = get_stylesheet_directory_uri() . '/assets/language';
			load_theme_textdomain( 'alliedbooks', $dir_lang );
			add_theme_support( 'automatic_feed_links' );
			add_theme_support( 'post-thumbnails' );			
		}
		add_action( 'after_setup_theme', 'alliedbooks_setup' );
	}

	if ( ! function_exists( 'alliedbooks_post_meta()' )) {
		function alliedbooks_post_meta()
		{
			echo '<ul class="meta-post">';
			if ( get_post_type() === 'post') 
			{
				if ( is_sticky()) 
				{
        			echo '<li><i class="fa fa-sticky-note-o"></i><span>' . __('Sticky', 'alliedbooks' ) . '</span></li>';
        		} 
					echo '<li><i class="fa fa-clock-o"></i><span>' . get_the_date() . '</span></li>';		
				
        			if ( comments_open()) {
        				echo '<li><i class="fa fa-comments-o"></i><span> ';
        				comments_popup_link( 
        					__( 'Leave a comment', 'alliedbooks' ), 
        					__( 'One comment', 'alliedbooks' ), 
        					__( 'View all % comment', 'alliedbooks' )
        				);
        				echo '</span></li>';        			
        			}
				}
			echo '</ul>';
		}
	}

	if ( ! function_exists( 'alliedbooks_numbered_pagination' )) {
		function alliedbooks_numbered_pagination()
		{
			echo '<div class="pagination-holder">';
				$args = [
				'prev_next' => false,
				'type' => 'array'
				];

				$paginates = paginate_links( $args );
				if ( is_array( $paginates )) {
					echo '<ul class="pagination">';
					foreach ($paginates as $paginate) {
						if ( strpos($paginate, 'current'))
							echo '<li class="active"><a href="#">' . $paginate . '</a></li>';
						else
							echo '<li>' . $paginate . '</li>';
					}
					echo '</ul>';
				}
			echo '</div>';
		}
	}



	/*----------  WORDPRESS ADMIN PANEL CUSTOMIZATION  ----------*/
	function edit_wp_menu()
	{
		// remove menu
		// https://codex.wordpress.org/Function_Reference/remove_menu_page
		remove_menu_page( 'edit.php?post_type=page' );
		remove_menu_page( 'themes.php' );            

		// Chagne the menu order
		// https://codex.wordpress.org/Function_Reference/remove_menu_page
		function change_menu_order( $menu_order )
		{
			return [
				'index.php',
				'edit.php',
				'themes.php',
				'upload.php'
			];
		}
		add_filter( 'menu_order', 'change_menu_order' );
		add_filter( 'custom_menu_order', '__return_true' );

		// rename posts to laptop | your any brand name

		global $menu;
		global $submenu;
		// print_r($submenu);
		$menu[5][0] = 'Books';
		$submenu['edit.php'][5][0] = 'All Books';
		$submenu['edit.php'][10][0] = 'Add new book';
		$submenu['edit.php'][15][0] = 'Category';
		$submenu['edit.php'][16][0] = 'book Tags';
	}

	// Rename posts to laptop | your any brannd name into post section.
	function change_post_labels(){
		global $wp_post_types;
		// print_r($wp_post_types);
		$labels = $wp_post_types['post']->labels;
		$labels->name = 'books';
        $labels->singular_name = 'book';
        $labels->add_new = 'Add New book';
        $labels->add_new_item = 'Add New book';
        $labels->edit_item = 'Edit book';
        $labels->new_item = 'New book';
        $labels->view_item = 'View book';
        $labels->view_items = 'View books';
        $labels->search_items = 'Search books';
        $labels->not_found = 'No books found.';
        $labels->not_found_in_trash = 'No books found in Trash.';
        $labels->all_items = 'All books';
        $labels->archives = 'book Archives';
        $labels->attributes = 'book Attributes';
        $labels->insert_into_item = 'Insert into book';
        $labels->uploaded_to_this_item = 'Uploaded to this book';
        $labels->filter_items_list = 'Filter books list';
        $labels->items_list_navigation = 'books list navigation';
        $labels->items_list = 'books list';
        $labels->menu_name = 'books';
        $labels->name_admin_bar = 'book';
	}
	add_action( 'init', 'change_post_labels' );
	add_action( 'admin_menu', 'edit_wp_menu' );

/*----------  THE DASHBOARD  ----------*/
	function customize_dashboard()
	{
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
	}
	add_action( 'wp_dashboard_setup', 'customize_dashboard' );

	/*----------   THE COLUMNS.  ----------*/
	function customize_post_listing_cols( $columns )
	{
		unset($columns['tags']);
		unset($columns['comments']);
		return $columns;
	}
	add_action( 'manage_posts_columns', 'customize_post_listing_cols' );
	function customize_page_listing_cols( $columns )
	{
		unset($columns['tags']);
		unset($columns['comments']);
		return $columns;
	}
	add_action( 'manage_pages_columns', 'customize_page_listing_cols' );

	/*----------   THE SMALLER CHANGES.  ----------*/
	function change_admin_footer()
	{
		echo "Copyrights 2018 &copy; All rights reserved - By Students of Al-Fateem Academy";
	}
	add_action( 'admin_footer_text', 'change_admin_footer' );

	function remove_footer_version()
	{
		remove_filter( 'update_footer', 'core_update_footer' );
	}
	add_action( 'admin_menu', 'remove_footer_version' );

	/*----------   WORDPRESS CHANGE LOGO, URL AND TITLE.  ----------*/
	function change_login_logo(){ ?>
		<style>
			#login h1 a{ 
				background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo-1.png); 
				width:185px;
				height:64px;
				background-size: 185px 64px;
				background-repeat: no-repeat;
		        padding-bottom: 10px;
			}
		</style>
		<?php
	}
	add_action( 'login_enqueue_scripts', 'change_login_logo' );

	function change_login_logo_url()
	{
		return home_url();
	}
	function change_login_logo_url_title()
	{
		return "Allied Books";
	}
	add_filter( 'login_headerurl', 'change_login_logo_url' );
	add_filter( 'login_headertitle', 'change_login_logo_url_title' );

	function change_login_stylesheet()
	{
		// https://codex.wordpress.org/Customizing_the_Login_Form
		wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/custom-login.css' );
		wp_enqueue_script( 'custom-login', SCRIPTS . '/custom-login.js' );
	}
	add_action( 'login_enqueue_scripts', 'change_login_stylesheet' );

	function disable_reset_password()
	{
		return false;
	}
	add_filter( 'allow_password_reset', 'disable_reset_password' );

	function remove_shake()
	{
		remove_action( 'login_head', 'wp_shake_js', 12 );
	}
	add_action( 'login_head', 'remove_shake' );

	/*----------   change or remove admin bar.  ----------*/
	function remove_admin_bar_links()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	function add_admin_bar_links()
	{
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( [
			'id' => 'alfateemacademy',
			'title' => 'Al-Fateem Academy',
			'href' => 'alfateemacademy.com',
			'meta' => ['target' => '_blank']
		]);
	}
		add_action( 'admin_bar_menu', 'add_admin_bar_links' );

		function admin_bar_css()
	{ ?>
		<style>
			#wpadminbar{ background-color: red; }
		</style>

	<?php }

	add_action( 'admin_head', 'admin_bar_css' );