<?php
	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function pic_postsliderfree_shortcode_attr( $atts, $content = null ) {
		global $post, $paged, $query;
		$atts = shortcode_atts(
			array(
				'id' => '',
		), $atts);
		$postid = $atts['id'];

		$pic_postslider_catlist   					= get_post_meta($postid, 'pic_postslider_catlist', true);
		$pic_postslider_styles   					= get_post_meta($postid, 'pic_postslider_styles', true);
		$pic_postslider_orderby   					= get_post_meta($postid, 'pic_postslider_orderby', true);
		$pic_postslider_order   					= get_post_meta($postid, 'pic_postslider_order', true);

		// title options settings
		$pic_title_fontsize   						= get_post_meta($postid, 'pic_title_fontsize', true);
		$pic_title_font_height   					= get_post_meta($postid, 'pic_title_font_height', true);
		$pic_title_font_color   					= get_post_meta($postid, 'pic_title_font_color', true);
		$pic_title_fonthvr_color   					= get_post_meta($postid, 'pic_title_fonthvr_color', true);
		$pic_slidertitle_transform   				= get_post_meta($postid, 'pic_slidertitle_transform', true);
		$pic_slidertitle_fontweight   				= get_post_meta($postid, 'pic_slidertitle_fontweight', true);
		$pic_slidertitle_fontstyle   				= get_post_meta($postid, 'pic_slidertitle_fontstyle', true);

		// Slider options settings
		$pic_postslider_author_hide   				= get_post_meta($postid, 'pic_postslider_author_hide', true);
		$pic_postslider_author_color   				= get_post_meta($postid, 'pic_postslider_author_color', true);
		$pic_postslider_postdate   					= get_post_meta($postid, 'pic_postslider_postdate', true);

		// Slider options
		$pic_postslider_readbtn   					= get_post_meta($postid, 'pic_postslider_readbtn', true);
		$pic_readmore_color   						= get_post_meta($postid, 'pic_readmore_color', true);
		$pic_readmorehvr_color   					= get_post_meta($postid, 'pic_readmorehvr_color', true);
		$pic_slider_readmore_size   				= get_post_meta($postid, 'pic_slider_readmore_size', true);
		$pic_slider_date_color   					= get_post_meta($postid, 'pic_slider_date_color', true);

		// Slider  options
		$pic_slider_itemsbg   						= get_post_meta($postid, 'pic_slider_itemsbg', true);
		$pic_slider_borderclr   					= get_post_meta($postid, 'pic_slider_borderclr', true);
		$pic_content_color   						= get_post_meta($postid, 'pic_content_color', true);
		$excerpt_lenght   							= get_post_meta($postid, 'excerpt_lenght', true);
		$pic_content_readmore   					= get_post_meta($postid, 'pic_content_readmore', true);
		$pic_content_fontsize   					= get_post_meta($postid, 'pic_content_fontsize', true);

		 // slider options
	    $pic_sliderallitem   						= get_post_meta($postid, 'pic_sliderallitem', true);
	    $pic_slideritem_autohide           			= get_post_meta($postid, 'pic_slideritem_autohide', true);
	    $pic_slideritem_centermode           		= get_post_meta($postid, 'pic_slideritem_centermode', true);
	    $pic_sliderallitemdesktop     				= get_post_meta($postid, 'pic_sliderallitemdesktop', true);
	    $pic_sliderallitemdesktopsmall				= get_post_meta($postid, 'pic_sliderallitemdesktopsmall', true);
	    $pic_sliderallitemmobile      				= get_post_meta($postid, 'pic_sliderallitemmobile', true); 
	    $pic_slideritem_loop    					= get_post_meta($postid, 'pic_slideritem_loop', true);
	    $pic_slideritem_margin   					= get_post_meta($postid, 'pic_slideritem_margin', true);
	    $pic_slideritem_autoplay         			= get_post_meta($postid, 'pic_slideritem_autoplay', true);
	    $pic_slideritem_autoplayspeed  	 			= get_post_meta($postid, 'pic_slideritem_autoplayspeed', true);
	    $pic_slideritem_autoplaytimeout  			= get_post_meta($postid, 'pic_slideritem_autoplaytimeout', true);
	    $pic_slideritem_navigation         			= get_post_meta($postid, 'pic_slideritem_navigation', true);
	    $pic_slideritem_navigation_position  		= get_post_meta($postid, 'pic_slideritem_navigation_position', true);
	    $pic_slideritem_pagination          		= get_post_meta($postid, 'pic_slideritem_pagination', true);
	    $pic_slideritem_paginationposition   		= get_post_meta($postid, 'pic_slideritem_paginationposition', true);
	    $pic_slideritem_stophover            		= get_post_meta($postid, 'pic_slideritem_stophover', true);
	    $pic_slideritem_navtextcolor        		= get_post_meta($postid, 'pic_slideritem_navtextcolor', true);
	    $pic_slideritem_navtextcolor_hover   		= get_post_meta($postid, 'pic_slideritem_navtextcolor_hover', true);
	    $pic_slideritem_navbgcolor        			= get_post_meta($postid, 'pic_slideritem_navbgcolor', true);
	    $pic_slideritem_navhovrcolor     			= get_post_meta($postid, 'pic_slideritem_navhovrcolor', true);
	    $pic_slideritem_pagination_color     		= get_post_meta($postid, 'pic_slideritem_pagination_color', true);
	    $pic_slideritem_pagination_bgcolor   		= get_post_meta($postid, 'pic_slideritem_pagination_bgcolor', true);
	    $pic_slideritem_pagination_style    		= get_post_meta($postid, 'pic_slideritem_pagination_style', true);

	    if( is_array( $pic_postslider_catlist ) ){
			$picslider_query_cats =  array();
			$num = count($pic_postslider_catlist);
			for($j=0; $j<$num; $j++){
				array_push($picslider_query_cats, $pic_postslider_catlist[$j]);
			}

			$args = array(
				'post_type' 	 	=> 'post',
				'post_status'	 	=> 'publish',
				'posts_per_page'	=> -1,
				'orderby'	   	   	=> $pic_postslider_orderby,
				'order'			 	=> $pic_postslider_order,
				    'tax_query' => [
				        'relation' => 'OR',
				        [
				            'taxonomy' => 'category',
				            'field' => 'id',
				            'terms' => $picslider_query_cats,
				        ],
				    ],
			);
        }else{
			$args = array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => $pic_postslider_orderby,
				'order'          => $pic_postslider_order,
			);
        }

		$pic_postquery = new WP_Query( $args );

		ob_start();

		switch ($pic_postslider_styles) {
		    case 1:

			include __DIR__ . '/template/theme-1.php';

		    break;
		    case 2:

			include __DIR__ . '/template/theme-2.php';

		    break;
		    case 3:

			include __DIR__ . '/template/theme-3.php';

		    break;
		}
		return ob_get_clean();
    }
	add_shortcode( 'picpostslider', 'pic_postsliderfree_shortcode_attr' );