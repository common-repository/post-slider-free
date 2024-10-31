<?php
    if( !defined( 'ABSPATH' ) ){
        exit;
    }  // if direct access 	

	// Register Custom Post Type
	function pic_postslider_free_mainpost_register() {
		$labels = array(
			'name'                  => _x( 'Post Slider', 'Post Type General Name', 'post-slider-free' ),
			'singular_name'         => _x( 'Post Slider', 'Post Type Singular Name', 'post-slider-free' ),
			'menu_name'             => __( 'Post Slider', 'post-slider-free' ),
			'name_admin_bar'        => __( 'Post Slider', 'post-slider-free' ),
			'archives'              => __( 'Post Slider Archives', 'post-slider-free' ),
			'attributes'            => __( 'Post Slider Attributes', 'post-slider-free' ),
			'parent_item_colon'     => __( 'Parent Slider:', 'post-slider-free' ),
			'all_items'             => __( 'All Slider', 'post-slider-free' ),
			'add_new_item'          => __( 'Add New Slider', 'post-slider-free' ),
			'add_new'               => __( 'Add New Slider', 'post-slider-free' ),
			'new_item'              => __( 'New Slider', 'post-slider-free' ),
			'edit_item'             => __( 'Edit Slider', 'post-slider-free' ),
			'update_item'           => __( 'Update Slider', 'post-slider-free' ),
			'view_item'             => __( 'View Slider', 'post-slider-free' ),
			'view_items'            => __( 'View Slider', 'post-slider-free' ),
			'search_items'          => __( 'Search Slider', 'post-slider-free' ),
			'not_found'             => __( 'Slider Not found', 'post-slider-free' ),
			'not_found_in_trash'    => __( 'Slider Not found in Trash', 'post-slider-free' ),
			'featured_image'        => __( 'Slider Featured Image', 'post-slider-free' ),
			'set_featured_image'    => __( 'Set Post Slider featured image', 'post-slider-free' ),
			'remove_featured_image' => __( 'Remove Post Slider featured image', 'post-slider-free' ),
			'use_featured_image'    => __( 'Use as Post Slider featured image', 'post-slider-free' ),
			'insert_into_item'      => __( 'Insert into Slider', 'post-slider-free' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'post-slider-free' ),
			'items_list'            => __( 'Slider list', 'post-slider-free' ),
			'items_list_navigation' => __( 'Slider list navigation', 'post-slider-free' ),
			'filter_items_list'     => __( 'Filter Slider list', 'post-slider-free' ),
		);
		$args = array(
			'label'                 => __( 'Post Slider Settings', 'post-slider-free' ),
			'description'           => __( 'Post Slider Post Description.', 'post-slider-free' ),
			'labels'                => $labels,
			'supports'              => array( 'title'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'picsliderfree', $args );
	}
	add_action('init', 'pic_postslider_free_mainpost_register');

	# Post Slider Free Register Column
	function pic_postslider_free_add_shortcode_column( $columns ) {
		$order='asc';
		if($_GET['order']=='asc') {
			$order='desc';
		}
		$columns = array(
			"cb"        => "<input type=\"checkbox\" />",
			"title"     => __('Shortcode Name', 'post-slider-free'),
			"shortcode" => __('Shortcode', 'post-slider-free'),
			"date"      => __('Date', 'post-slider-free'),
		);
		return $columns;
	}
	add_filter( 'manage_picsliderfree_posts_columns' , 'pic_postslider_free_add_shortcode_column' );

	# Post Slider Free Display Shortcode or Do Shortcode
	function pic_postslider_free_add_posts_shortcode_display( $column, $post_id ) {
		 if ( $column == 'shortcode' ){ ?>
			<input style="background:#ddd" type="text" onClick="this.select();" value="[picpostslider <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" />
			<?php
		}
	}
	add_action( 'manage_picsliderfree_posts_custom_column' , 'pic_postslider_free_add_posts_shortcode_display', 10, 2 );