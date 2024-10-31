<?php

    if( !defined( 'ABSPATH' ) ){
        exit;
    }  // if direct access 

	function pic_postslider_register_metaarea(){
		add_meta_box(
			'pic_postslider_all_metaboxes_id', 						# Metabox
			__( 'Post Slider Settings', 'post-slider-free' ),  		# Title
			'pic_postslider_free_metaboxes', 						# $callback
			'picsliderfree', 										# $page
			'normal'
		);
		add_meta_box(
			'pic_postslider_all_metaboxes_id0', 					# Metabox
			__( 'Post Slider Shortcode', 'post-slider-free' ),  	# Title
			'pic_postslider_free_shortcode_display', 				# $callback
			'picsliderfree', 										# $page
			'side'
		);
		add_meta_box(
			'pic_postslider_all_metaboxes_id1', 					# Metabox
			__( 'Need Support', 'post-slider-free' ),  				# Title
			'pic_postslider_free_ratings', 							# $callback
			'picsliderfree', 										# $page
			'side'
		);
	}
	add_action('add_meta_boxes', 'pic_postslider_register_metaarea');

	# Shortcode Page MetaBox Options
	function pic_postslider_free_metaboxes( $post, $args ) {
		$pic_postslider_catlist 		= get_post_meta($post->ID, 'pic_postslider_catlist', true);
		if(empty($pic_postslider_catlist)){
			$pic_postslider_catlist = array();
		}
		$pic_postslider_styles			= get_post_meta($post->ID, 'pic_postslider_styles', true);
		$pic_postslider_orderby			= get_post_meta($post->ID, 'pic_postslider_orderby', true);
		$pic_postslider_order			= get_post_meta($post->ID, 'pic_postslider_order', true);

		# Title 
		$pic_title_fontsize				= get_post_meta($post->ID, 'pic_title_fontsize', true);
		$pic_title_font_height			= get_post_meta($post->ID, 'pic_title_font_height', true);
		$pic_title_font_color			= get_post_meta($post->ID, 'pic_title_font_color', true);
		$pic_title_fonthvr_color		= get_post_meta($post->ID, 'pic_title_fonthvr_color', true);
		$pic_slidertitle_transform		= get_post_meta($post->ID, 'pic_slidertitle_transform', true);
		$pic_slidertitle_fontweight		= get_post_meta($post->ID, 'pic_slidertitle_fontweight', true);
		$pic_slidertitle_fontstyle		= get_post_meta($post->ID, 'pic_slidertitle_fontstyle', true);

		# Designation
		$pic_postslider_author_hide		= get_post_meta($post->ID, 'pic_postslider_author_hide', true);
		$pic_postslider_author_color	= get_post_meta($post->ID, 'pic_postslider_author_color', true);
		$pic_postslider_postdate		= get_post_meta($post->ID, 'pic_postslider_postdate', true);

		# Social
		$pic_postslider_readbtn			= get_post_meta($post->ID, 'pic_postslider_readbtn', true);
		$pic_slider_readmore_size		= get_post_meta($post->ID, 'pic_slider_readmore_size', true);
		$pic_readmore_color				= get_post_meta($post->ID, 'pic_readmore_color', true);
		$pic_readmorehvr_color			= get_post_meta($post->ID, 'pic_readmorehvr_color', true);
		$pic_slider_date_color			= get_post_meta($post->ID, 'pic_slider_date_color', true);

		# Pagination
		$pic_slider_itemsbg						= get_post_meta($post->ID, 'pic_slider_itemsbg', true);
		$pic_slider_borderclr					= get_post_meta($post->ID, 'pic_slider_borderclr', true);
		$pic_content_color						= get_post_meta($post->ID, 'pic_content_color', true);
		$excerpt_lenght							= get_post_meta($post->ID, 'excerpt_lenght', true);
		$pic_content_readmore					= get_post_meta($post->ID, 'pic_content_readmore', true);
		$pic_content_fontsize					= get_post_meta($post->ID, 'pic_content_fontsize', true);
		$pic_slideritem_autoplay   				= get_post_meta($post->ID, 'pic_slideritem_autoplay', true);
		$pic_slideritem_autoplayspeed   		= get_post_meta($post->ID, 'pic_slideritem_autoplayspeed', true);
		$pic_slideritem_autohide   				= get_post_meta($post->ID, 'pic_slideritem_autohide', true);
		$pic_slideritem_centermode   			= get_post_meta($post->ID, 'pic_slideritem_centermode', true);
		$pic_slideritem_stophover   			= get_post_meta($post->ID, 'pic_slideritem_stophover', true);
		$pic_slideritem_autoplaytimeout    		= get_post_meta($post->ID, 'pic_slideritem_autoplaytimeout', true);
		$pic_sliderallitem 						= get_post_meta($post->ID, 'pic_sliderallitem', true);
		$pic_sliderallitemdesktop   			= get_post_meta($post->ID, 'pic_sliderallitemdesktop', true);
		$pic_sliderallitemdesktopsmall  		= get_post_meta($post->ID, 'pic_sliderallitemdesktopsmall', true);
		$pic_sliderallitemmobile   				= get_post_meta($post->ID, 'pic_sliderallitemmobile', true);
		$pic_slideritem_loop 					= get_post_meta($post->ID, 'pic_slideritem_loop', true);
		$pic_slideritem_margin 					= get_post_meta($post->ID, 'pic_slideritem_margin', true);
		$pic_slideritem_navigation 				= get_post_meta($post->ID, 'pic_slideritem_navigation', true);
		$pic_slideritem_navigation_position 	= get_post_meta($post->ID, 'pic_slideritem_navigation_position', true);
		$pic_slideritem_navtextcolor     		= get_post_meta($post->ID, 'pic_slideritem_navtextcolor', true);	
		$pic_slideritem_navtextcolor_hover   	= get_post_meta($post->ID, 'pic_slideritem_navtextcolor_hover', true);	
		$pic_slideritem_navbgcolor       		= get_post_meta($post->ID, 'pic_slideritem_navbgcolor', true);
		$pic_slideritem_navhovrcolor     		= get_post_meta($post->ID, 'pic_slideritem_navhovrcolor', true);
		$pic_slideritem_pagination 				= get_post_meta($post->ID, 'pic_slideritem_pagination', true);
		$pic_slideritem_paginationposition 		= get_post_meta($post->ID, 'pic_slideritem_paginationposition', true);
		$pic_slideritem_pagination_color   		= get_post_meta($post->ID, 'pic_slideritem_pagination_color', true);
		$pic_slideritem_pagination_bgcolor		= get_post_meta($post->ID, 'pic_slideritem_pagination_bgcolor', true);
		$pic_slideritem_pagination_style		= get_post_meta($post->ID, 'pic_slideritem_pagination_style', true);
		$pic_postslider_navtab					= get_post_meta($post->ID, 'pic_postslider_navtab', true);

		?>

		<div class="pic_postslider_settings post-grid-metabox">
			<!-- <div class="wrap"> -->
			<ul class="tab-nav">
				<li nav="1" class="nav1 <?php if($pic_postslider_navtab == 1){echo "active";}?>"><?php _e('Post Query','post-slider-free'); ?></li>
				<li nav="2" class="nav2 <?php if($pic_postslider_navtab == 2){echo "active";}?>"><?php _e('General Settings ','post-slider-free'); ?></li>
				<li nav="3" class="nav3 <?php if($pic_postslider_navtab == 3){echo "active";}?>"><?php _e('Slider Settings ','post-slider-free'); ?></li>
			</ul> <!-- tab-nav end -->
			<?php
				$getNavValue = "";
				if(!empty($pic_postslider_navtab)){ $getNavValue = $pic_postslider_navtab; } else { $getNavValue = 1; }
			?>
			<input type="hidden" name="pic_postslider_navtab" id="pic_postslider_navtab" value="<?php echo $getNavValue; ?>">

			<ul class="box">
				<!-- Tab 2  -->
				<li style="<?php if($pic_postslider_navtab == 1){echo "display: block;";} else{ echo "display: none;"; }?>" class="box1 tab-box <?php if($pic_postslider_navtab == 1){echo "active";}?>">
					<div class="option-box">
						<p class="option-title"><?php _e('Slider Settings','post-slider-free'); ?></p>
						<div class="wrap">
							<div class="pic-slider-customizer-areas">
								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Choose Post Categories', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Select Post Categories to display Post Slider. If you did not select any categories it shows all the posts.', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<ul>
											<?php
												$args = array(
													'taxonomy'     => 'category',
													'orderby'      => 'name',
													'show_count'   => 1,
													'pad_counts'   => 1,
													'hierarchical' => 1,
													'echo'         => 0
												);
												$acpluscats = get_categories( $args );
											?>
											<?php
												foreach( $acpluscats as $category ):
												    $cat_id = $category->cat_ID;
												    $checked = ( in_array($cat_id,(array)$pic_postslider_catlist)? ' checked="checked"': "" );
												    echo'<li id="cat-'.$cat_id.'"><input type="checkbox" name="pic_postslider_catlist[]" id="'.$cat_id.'" value="'.$cat_id.'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->cat_name, 'post-slider-free' ).'</label></li>';
												endforeach;
											?>
										</ul>
									</div>
								</div><!-- End Categories -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Choose Slider Style', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Choose your Post slider styles. all style not available in free version. upgrade pro version to unlock all features.', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_styles" id="pic_postslider_styles" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_postslider_styles ) ) selected( $pic_postslider_styles, '1' ); ?>><?php _e('Style 1', 'post-slider-free')?></option>
											<option value="2" <?php if ( isset ( $pic_postslider_styles ) ) selected( $pic_postslider_styles, '2' ); ?>><?php _e('Style 2', 'post-slider-free')?></option>
											<option value="3" <?php if ( isset ( $pic_postslider_styles ) ) selected( $pic_postslider_styles, '3' ); ?>><?php _e('Style 3', 'post-slider-free')?></option>
										</select>
									</div>
								</div><!-- End Slider Style -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Order By', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Choose post slider order By: Date, Menu Order or Random.', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_orderby" id="pic_postslider_orderby" class="timezone_string">
											<option value="date" <?php if ( isset ( $pic_postslider_orderby ) ) selected( $pic_postslider_orderby, 'date' ); ?>><?php _e('Publish Date', 'post-slider-free')?></option>
											<option value="menu_order" <?php if ( isset ( $pic_postslider_orderby ) ) selected( $pic_postslider_orderby, 'menu_order' ); ?>><?php _e('Order', 'post-slider-free')?></option>
											<option value="rand" <?php if ( isset ( $pic_postslider_orderby ) ) selected( $pic_postslider_orderby, 'rand' ); ?>><?php _e('Random', 'post-slider-free')?></option>
										</select>
									</div>
								</div><!-- End Post Slider Order By -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Order', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Choose post slider order: Descending or Ascending.', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_order" id="pic_postslider_order" class="timezone_string">
											<option value="DESC" <?php if ( isset ( $pic_postslider_order ) ) selected( $pic_postslider_order, 'DESC' ); ?>><?php _e('Descending', 'post-slider-free')?></option>
											<option value="ASC" <?php if ( isset ( $pic_postslider_order ) ) selected( $pic_postslider_order, 'ASC' ); ?>><?php _e('Ascending', 'post-slider-free')?></option>
										</select>
									</div>
								</div><!-- End Post Slider Order -->
								
							</div>
						</div>
					</div>
				</li>
				<!-- Tab 2  -->
				<li style="<?php if($pic_postslider_navtab == 2){echo "display: block;";} else{ echo "display: none;"; }?>" class="box2 tab-box <?php if($pic_postslider_navtab == 2){echo "active";}?>">

					<div class="option-box">
						<p class="option-title"><?php _e('General Settings','post-slider-free'); ?></p>
						<div class="wrap">
							<div class="pic-slider-customizer-areas">
								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Font Size', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title font size. default font size:16px ', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="pic_title_fontsize" id="pic_title_fontsize" maxlength="4" class="timezone_string" value="<?php  if($pic_title_fontsize !=''){echo $pic_title_fontsize; }else{ echo '20';} ?>">
									</div>
								</div><!-- End Title Font Size -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Line Height', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title line height. default:25px ', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="pic_title_font_height" id="pic_title_font_height" maxlength="4" class="timezone_string" value="<?php  if($pic_title_font_height !=''){echo $pic_title_font_height; }else{ echo '25';} ?>">
									</div>
								</div><!-- End Title Font Size -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Font Color', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title text color. default color: #1b2026', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_title_font_color" id="pic_title_font_color" class="timezone_string" value="<?php  if($pic_title_font_color !=''){echo $pic_title_font_color; }else{ echo '#1b2026';} ?>">
									</div>
								</div><!-- End Title Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Hover Font Color', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title Hover text color. default color: #0949e6', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_title_fonthvr_color" id="pic_title_fonthvr_color" class="timezone_string" value="<?php  if($pic_title_fonthvr_color !=''){echo $pic_title_fonthvr_color; }else{ echo '#0949e6';} ?>">
									</div>
								</div><!-- End Title Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Text Transform', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title Text Transform. Default Text Transform: Capitalize', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slidertitle_transform" id="pic_slidertitle_transform" class="timezone_string">
											<option value="unset" <?php if ( isset ( $pic_slidertitle_transform ) ) selected( $pic_slidertitle_transform, 'unset' ); ?>><?php _e('Default', 'post-slider-free'); ?></option>
											<option value="capitalize" <?php if ( isset ( $pic_slidertitle_transform ) ) selected( $pic_slidertitle_transform, 'capitalize' ); ?>><?php _e('Capitilize', 'post-slider-free'); ?></option>
											<option value="lowercase" <?php if ( isset ( $pic_slidertitle_transform ) ) selected( $pic_slidertitle_transform, 'lowercase' ); ?>><?php _e('Lowercase', 'post-slider-free'); ?></option>
											<option value="uppercase" <?php if ( isset ( $pic_slidertitle_transform ) ) selected( $pic_slidertitle_transform, 'uppercase' ); ?>><?php _e('Uppercase', 'post-slider-free'); ?></option>
										</select>
									</div>
								</div><!-- End Text Transform -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Font Weight', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Title Font Weight. Default Font-Weight: 600', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slidertitle_fontweight" id="pic_slidertitle_fontweight" class="timezone_string">
											<option value="unset" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, 'unset' ); ?>><?php _e('Default', 'post-slider-free')?></option>
											<option value="400" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '400' ); ?>><?php _e('400', 'post-slider-free');?></option>
											<option value="500" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '500' ); ?>><?php _e('500', 'post-slider-free');?></option>
											<option value="600" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '600' ); ?>><?php _e('600', 'post-slider-free');?></option>
											<option value="700" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '700' ); ?>><?php _e('700', 'post-slider-free');?></option>
											<option value="800" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '800' ); ?>><?php _e('800', 'post-slider-free');?></option>
											<option value="900" <?php if ( isset ( $pic_slidertitle_fontweight ) ) selected( $pic_slidertitle_fontweight, '900' ); ?>><?php _e('900', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Text Transform -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Title Font Style', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose post slider title text Style. default: Normal', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slidertitle_fontstyle" id="pic_slidertitle_fontstyle" class="timezone_string">
											<option value="normal" <?php if ( isset ( $pic_slidertitle_fontstyle ) ) selected( $pic_slidertitle_fontstyle, 'normal' ); ?>><?php _e('Normal', 'post-slider-free');?></option>
											<option value="italic" <?php if ( isset ( $pic_slidertitle_fontstyle ) ) selected( $pic_slidertitle_fontstyle, 'italic' ); ?>><?php _e('Italic', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Text Style -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Author (Show/Hide)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Show or Hide Post Slider Author Information. Default : Show.', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_author_hide" id="pic_postslider_author_hide" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_postslider_author_hide ) ) selected( $pic_postslider_author_hide, '1' ); ?>><?php _e('Show (Only Pro)', 'post-slider-free');?></option>
											<option value="2" <?php if ( isset ( $pic_postslider_author_hide ) ) selected( $pic_postslider_author_hide, '2' ); ?>><?php _e('Hide (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Readmore -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Author Font Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Author Font Color. default font color: #1b2026', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_postslider_author_color" id="pic_postslider_author_color" class="timezone_string" value="<?php  if($pic_postslider_author_color !=''){echo $pic_postslider_author_color; }else{ echo '#1b2026';} ?>">
									</div>
								</div><!-- End Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Date (Show/Hide)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Show or Hide Post Slider Date Information. Default : Show.', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_postdate" id="pic_postslider_postdate" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_postslider_postdate ) ) selected( $pic_postslider_postdate, '1' ); ?>><?php _e('Show (Only Pro)', 'post-slider-free'); ?></option>
											<option value="2" <?php if ( isset ( $pic_postslider_postdate ) ) selected( $pic_postslider_postdate, '2' ); ?>><?php _e('Hide (Only Pro)', 'post-slider-free'); ?></option>
										</select>
									</div>
								</div><!-- End Readmore -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Date Text Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose post slider date color. default: #1b2026', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slider_date_color" id="pic_slider_date_color" class="timezone_string" value="<?php  if($pic_slider_date_color !=''){echo $pic_slider_date_color; }else{ echo '#1b2026';} ?>">
									</div>
								</div><!-- End Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Content Length (Only Pro)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post details text word length. default length: 20', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="excerpt_lenght"  id="excerpt_lenght" maxlength="3" class="timezone_string" value="<?php echo $excerpt_lenght; ?>" >
										<input type="text" name="pic_content_readmore" id="pic_content_readmore" maxlength="20" class="timezone_string" value="<?php echo $pic_content_readmore; ?>" >
									</div>
								</div><!-- End Text Length -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Read More (Show/Hide)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Show or Hide Post Slider Read More Button. Default : Show.', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_postslider_readbtn" id="pic_postslider_readbtn" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_postslider_readbtn ) ) selected( $pic_postslider_readbtn, '1' ); ?>><?php _e('Show (Only Pro)', 'post-slider-free');?></option>
											<option value="2" <?php if ( isset ( $pic_postslider_readbtn ) ) selected( $pic_postslider_readbtn, '2' ); ?>><?php _e('Hide (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Readmore -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Button Text Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose post slider button text color. default color: #0949e6', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_readmore_color" id="pic_readmore_color" class="timezone_string" value="<?php  if($pic_readmore_color !=''){echo $pic_readmore_color; }else{ echo '#0949e6';} ?>">
									</div>
								</div><!-- End Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Button Hover Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose post slider button hover text color. default color: #0949e6', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_readmorehvr_color" id="pic_readmorehvr_color" class="timezone_string" value="<?php  if($pic_readmorehvr_color !=''){echo $pic_readmorehvr_color; }else{ echo '#0949e6';} ?>">
									</div>
								</div><!-- End Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Button Font Size', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post details Button font size. default size: 15px', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="pic_slider_readmore_size" id="pic_slider_readmore_size" maxlength="4" class="timezone_string" value="<?php if($pic_slider_readmore_size !=''){echo $pic_slider_readmore_size; }else{ echo '15';} ?>">
									</div>
								</div><!-- End Text Size -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Content Text Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose post slider details text color. default color: #1b2026', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_content_color" id="pic_content_color" class="timezone_string" value="<?php  if($pic_content_color !=''){echo $pic_content_color; }else{ echo '#1b2026';} ?>">
									</div>
								</div><!-- End Text Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Content Font Size', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post details text size. default size: 15px', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="pic_content_fontsize" id="pic_content_fontsize" maxlength="4" class="timezone_string" value="<?php if($pic_content_fontsize !=''){echo $pic_content_fontsize; }else{ echo '15';} ?>">
									</div>
								</div><!-- End Text Size -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Slider Background Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Items Background color. default color: #fdfdfd', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slider_itemsbg" id="pic_slider_itemsbg" class="timezone_string" value="<?php  if($pic_slider_itemsbg !=''){echo $pic_slider_itemsbg; }else{ echo '#fdfdfd';} ?>">
									</div>
								</div><!-- End Background Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Slider Border Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Items Border color. default color: #fdfdfd', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slider_borderclr" id="pic_slider_borderclr" class="timezone_string" value="<?php  if($pic_slider_borderclr !=''){echo $pic_slider_borderclr; }else{ echo '#fdfdfd';} ?>">
									</div>
								</div><!-- End Background Color -->

								<span class="prohints"><a target="_blank" href="https://pickelements.com/postslider/"><?php echo esc_html__('( Buy Pro Version )', 'post-slider-free'); ?></a></span>
							</div>
						</div>
					</div>
				</li>

				<!-- Tab 4  -->
				<li style="<?php if($pic_postslider_navtab == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($pic_postslider_navtab == 3){echo "active";}?>">

					<!-- Start Tab Two -->
					<div class="option-box" id="team02">
						<p class="option-title">Slider Settings <span class="prohints"><a target="_blank" href="https://pickelements.com/postslider/">(Unlock Premium Features)</a></span></p>
							<div class="pic-slider-customizer-areas">
								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Autoplay', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Autoplay options. default Autoplay: Enable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_autoplay" id="pic_slideritem_autoplay" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_autoplay ) ) selected( $pic_slideritem_autoplay, 'true' ); ?>><?php _e('True', 'post-slider-free');?></option>
											<option value="false" <?php if ( isset ( $pic_slideritem_autoplay ) ) selected( $pic_slideritem_autoplay, 'false' ); ?>><?php _e('False', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Autoplay -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Auto Hide Mode', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Auto Hide Mode. default Mode: Enable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_autohide" id="pic_slideritem_autohide" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_autohide ) ) selected( $pic_slideritem_autohide, 'true' ); ?>><?php _e('True (Only Pro)', 'post-slider-free');?></option>
											<option value="false" <?php if ( isset ( $pic_slideritem_autohide ) ) selected( $pic_slideritem_autohide, 'false' ); ?>><?php _e('False (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Auto Hide Mode -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Centered Mode', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Centered Mode. default Mode: Disable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_centermode" id="pic_slideritem_centermode" class="timezone_string">
											<option value="false" <?php if ( isset ( $pic_slideritem_centermode ) ) selected( $pic_slideritem_centermode, 'false' ); ?>><?php _e('False (Only Pro)', 'post-slider-free');?></option>
											<option value="true" <?php if ( isset ( $pic_slideritem_centermode ) ) selected( $pic_slideritem_centermode, 'true' ); ?>><?php _e('True (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Centered Mode -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Slide Delay', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider delay speed. input only number(700,800,1200 etc)', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_autoplayspeed" id="pic_slideritem_autoplayspeed" maxlength="4" class="timezone_string" required value="<?php  if($pic_slideritem_autoplayspeed !=''){echo $pic_slideritem_autoplayspeed; }else{ echo '1500';} ?>">
									</div>
								</div><!-- End Slide Delay -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Stop Hover', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Stop Hover Mode. default Mode: Enable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_stophover" id="pic_slideritem_stophover" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_stophover ) ) selected( $pic_slideritem_stophover, 'true' ); ?>><?php _e('True', 'post-slider-free');?></option>	
											<option value="false" <?php if ( isset ( $pic_slideritem_stophover ) ) selected( $pic_slideritem_stophover, 'false' ); ?>><?php _e('False', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Stop Hover -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Autoplay Time Out (Sec)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Autoplay time out (Sec). default:(1000sec)', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_autoplaytimeout" id="pic_slideritem_autoplaytimeout" class="timezone_string">
											<option value="1000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '1000' ); ?>><?php _e('1000', 'post-slider-free'); ?></option>
											<option value="2000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '2000' ); ?>><?php _e('2000', 'post-slider-free'); ?></option>
											<option value="3000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '3000' ); ?>><?php _e('3000', 'post-slider-free'); ?></option>
											<option value="4000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '4000' ); ?>><?php _e('4000', 'post-slider-free'); ?></option>
											<option value="5000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '5000' ); ?>><?php _e('5000', 'post-slider-free'); ?></option>
											<option value="6000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '6000' ); ?>><?php _e('6000', 'post-slider-free'); ?></option>
											<option value="7000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '7000' ); ?>><?php _e('7000', 'post-slider-free'); ?></option>
											<option value="8000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '8000' ); ?>><?php _e('8000', 'post-slider-free'); ?></option>
											<option value="9000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '9000' ); ?>><?php _e('9000', 'post-slider-free'); ?></option>
											<option value="10000" <?php if ( isset ( $pic_slideritem_autoplaytimeout ) ) selected( $pic_slideritem_autoplaytimeout, '10000' ); ?>><?php _e('10000', 'post-slider-free'); ?></option>
										</select>	
									</div>
								</div><!-- End Autoplay Time Out (Sec) -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Items No', 'post-slider-free'); ?></span>
										<span class="sub-description"><?php _e('Choose Post Slider total item display per slide. default: 3 items', 'post-slider-free'); ?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_sliderallitem" id="pic_sliderallitem" class="timezone_string">
											<option value="3" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '3' ); ?>><?php _e('3', 'post-slider-free'); ?></option>
											<option value="1" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '1' ); ?>><?php _e('1', 'post-slider-free'); ?></option>
											<option value="2" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '2' ); ?>><?php _e('2', 'post-slider-free'); ?></option>
											<option value="4" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '4' ); ?>><?php _e('4', 'post-slider-free'); ?></option>
											<option value="5" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '5' ); ?>><?php _e('5 ', 'post-slider-free'); ?></option>
											<option value="6" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '6' ); ?>><?php _e('6 ', 'post-slider-free'); ?></option>
											<option value="7" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '7' ); ?>><?php _e('7 ', 'post-slider-free'); ?></option>
											<option value="8" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '8' ); ?>><?php _e('8 ', 'post-slider-free'); ?></option>
											<option value="9" <?php if ( isset ( $pic_sliderallitem ) )  selected( $pic_sliderallitem, '9' ); ?>><?php _e('9 ', 'post-slider-free'); ?></option>
											<option value="10" <?php if ( isset ( $pic_sliderallitem ) ) selected( $pic_sliderallitem, '10' ); ?>><?php _e('10 ', 'post-slider-free'); ?></option>
										</select>
									</div>
								</div><!-- End Items No -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Items Desktop', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider total items display on desktop. default:3 ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_sliderallitemdesktop" id="pic_sliderallitemdesktop" class="timezone_string">
											<option value="3" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '3' ); ?>><?php _e('3', 'post-slider-free');?></option>
											<option value="1" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '1' ); ?>><?php _e('1', 'post-slider-free');?></option>
											<option value="2" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '2' ); ?>><?php _e('2', 'post-slider-free');?></option>
											<option value="4" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '4' ); ?>><?php _e('4', 'post-slider-free');?></option>
											<option value="5" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '5' ); ?>><?php _e('5', 'post-slider-free');?></option>
											<option value="6" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '6' ); ?>><?php _e('6', 'post-slider-free');?></option>
											<option value="7" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '7' ); ?>><?php _e('7', 'post-slider-free');?></option>
											<option value="8" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '8' ); ?>><?php _e('8', 'post-slider-free');?></option>
											<option value="9" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '9' ); ?>><?php _e('9', 'post-slider-free');?></option>
											<option value="10" <?php if ( isset ( $pic_sliderallitemdesktop ) ) selected( $pic_sliderallitemdesktop, '10' ); ?>><?php _e('10', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Items Desktop -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Items Desktop Small', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Choose Post Slider total items display on desktop small. default:1', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_sliderallitemdesktopsmall" id="pic_sliderallitemdesktopsmall" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '1' ); ?>><?php _e('1', 'post-slider-free')?></option>
											<option value="2" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '2' ); ?>><?php _e('2', 'post-slider-free')?></option>
											<option value="3" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '3' ); ?>><?php _e('3', 'post-slider-free')?></option>
											<option value="4" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '4' ); ?>><?php _e('4', 'post-slider-free')?></option>
											<option value="5" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '5' ); ?>><?php _e('5', 'post-slider-free')?></option>
											<option value="6" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '6' ); ?>><?php _e('6', 'post-slider-free')?></option>
											<option value="7" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '7' ); ?>><?php _e('7', 'post-slider-free')?></option>
											<option value="8" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '8' ); ?>><?php _e('8', 'post-slider-free')?></option>
											<option value="9" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '9' ); ?>><?php _e('9', 'post-slider-free')?></option>
											<option value="10" <?php if ( isset ( $pic_sliderallitemdesktopsmall ) ) selected( $pic_sliderallitemdesktopsmall, '10' ); ?>><?php _e('10', 'post-slider-free')?></option>
										</select>
									</div>
								</div><!-- End Items Desktop Small -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Items Mobile', 'post-slider-free')?></span>
										<span class="sub-description"><?php _e('Choose Post Slider total items display on Mobile. default:1', 'post-slider-free')?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_sliderallitemmobile" id="pic_sliderallitemmobile" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '1' ); ?>><?php _e('1', 'post-slider-free')?></option>
											<option value="2" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '2' ); ?>><?php _e('2', 'post-slider-free')?></option>
											<option value="3" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '3' ); ?>><?php _e('3', 'post-slider-free')?></option>
											<option value="4" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '4' ); ?>><?php _e('4', 'post-slider-free')?></option>
											<option value="5" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '5' ); ?>><?php _e('5', 'post-slider-free')?></option>
											<option value="6" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '6' ); ?>><?php _e('6', 'post-slider-free')?></option>
											<option value="7" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '7' ); ?>><?php _e('7', 'post-slider-free')?></option>
											<option value="8" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '8' ); ?>><?php _e('8', 'post-slider-free')?></option>
											<option value="9" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '9' ); ?>><?php _e('9', 'post-slider-free')?></option>
											<option value="10" <?php if ( isset ( $pic_sliderallitemmobile ) ) selected( $pic_sliderallitemmobile, '10' ); ?>><?php _e('10', 'post-slider-free')?></option>
										</select>
									</div>
								</div><!-- End Items Mobile -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Loop', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider items loop. default Mode: Enable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_loop" id="pic_slideritem_loop" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_loop ) ) selected( $pic_slideritem_loop, 'true' ); ?>><?php _e('True (Only Pro)', 'post-slider-free');?></option>
											<option value="false" <?php if ( isset ( $pic_slideritem_loop ) ) selected( $pic_slideritem_loop, 'false' ); ?>><?php _e('False (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Loop -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Margin', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider items margin size. default margin:10px ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="number" name="pic_slideritem_margin" id="pic_slideritem_margin" maxlength="3" class="timezone_string" value="<?php if($pic_slideritem_margin !=''){echo $pic_slideritem_margin;} else{ echo '10'; } ?>" value="0">
									</div>
								</div><!-- End Margin -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation (Show/Hide)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Show/Hide Post Slider Navigation Option. default Mode: Enable', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_navigation" id="pic_slideritem_navigation" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_navigation ) ) selected( $pic_slideritem_navigation, 'true' ); ?>><?php _e('True', 'post-slider-free');?></option>
											<option value="false" <?php if ( isset ( $pic_slideritem_navigation ) ) selected( $pic_slideritem_navigation, 'false' ); ?>><?php _e('False (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Navigation -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation Position', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Navigation Position. default Position: Top Right', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_navigation_position" id="pic_slideritem_navigation_position" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_slideritem_navigation_position ) ) selected( $pic_slideritem_navigation_position, '1' ); ?>><?php _e('Top Right', 'post-slider-free');?></option>
											<option disabled value="2" <?php if ( isset ( $pic_slideritem_navigation_position ) ) selected( $pic_slideritem_navigation_position, '2' ); ?>><?php _e('Top Left (Only Pro)', 'post-slider-free');?></option>
											<option disabled value="3" <?php if ( isset ( $pic_slideritem_navigation_position ) ) selected( $pic_slideritem_navigation_position, '3' ); ?>><?php _e('Bottom Center (Only Pro)', 'post-slider-free');?></option>
											<option disabled value="4" <?php if ( isset ( $pic_slideritem_navigation_position ) ) selected( $pic_slideritem_navigation_position, '4' ); ?>><?php _e('Centred (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Navigation Position -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation Background Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Navigation Background Color. default color:#000000 ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_navbgcolor" id="pic_slideritem_navbgcolor" class="timezone_string" value="<?php  if($pic_slideritem_navbgcolor !=''){echo $pic_slideritem_navbgcolor; }else{ echo '#000000';} ?>">
									</div>
								</div><!-- End Navigation Background Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation Text Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Navigation text color. default color:#ffffff ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_navtextcolor" id="pic_slideritem_navtextcolor" class="timezone_string" value="<?php  if($pic_slideritem_navtextcolor !=''){echo $pic_slideritem_navtextcolor; }else{ echo '#ffffff';} ?>">
									</div>
								</div><!-- End Navigation Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation Hover Background Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Navigation Hover Background Color. default color:#6d6d6d', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_navhovrcolor" id="pic_slideritem_navhovrcolor" class="timezone_string" value="<?php  if($pic_slideritem_navhovrcolor !=''){echo $pic_slideritem_navhovrcolor; }else{ echo '#6d6d6d';} ?>">
									</div>
								</div><!-- End Navigation Hover Background Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Navigation Hover Text Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Navigation Hover Color. default color:#000000 ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_navtextcolor_hover" id="pic_slideritem_navtextcolor_hover" class="timezone_string" value="<?php  if($pic_slideritem_navtextcolor_hover !=''){echo $pic_slideritem_navtextcolor_hover; }else{ echo '#000000';} ?>">
									</div>
								</div><!-- End Navigation Hover Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Pagination (Show/Hide)', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Show or Hide Post Slider Pagination. default Mode: Enable ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_pagination" id="pic_slideritem_pagination" class="timezone_string">
											<option value="true" <?php if ( isset ( $pic_slideritem_pagination ) ) selected( $pic_slideritem_pagination, 'true' ); ?>><?php _e('True', 'post-slider-free');?></option>
											<option disabled value="false" <?php if ( isset ( $pic_slideritem_pagination ) ) selected( $pic_slideritem_pagination, 'false' ); ?>><?php _e('False (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Pagination -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Pagination Active Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Pagination Active icon Color. default color:#000000 ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_pagination_color" id="pic_slideritem_pagination_color" class="timezone_string" value="<?php  if($pic_slideritem_pagination_color !=''){echo $pic_slideritem_pagination_color; }else{ echo '#000000';} ?>">
									</div>
								</div><!-- End Pagination Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Pagination Background Color', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Pagination Default Background Color. default color:#6d6d6d ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<input type="text" name="pic_slideritem_pagination_bgcolor" id="pic_slideritem_pagination_bgcolor" class="timezone_string" value="<?php  if($pic_slideritem_pagination_bgcolor !=''){echo $pic_slideritem_pagination_bgcolor; }else{ echo '#6d6d6d';} ?>">
									</div>
								</div><!-- End Pagination Background Color -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Pagination Style', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Pagination style. default style: Round ', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_pagination_style" id="pic_slideritem_pagination_style" class="timezone_string">
											<option value="1" <?php if ( isset ( $pic_slideritem_pagination_style ) ) selected( $pic_slideritem_pagination_style, '1' ); ?>><?php _e('Round', 'post-slider-free');?></option>
											<option disabled value="2" <?php if ( isset ( $pic_slideritem_pagination_style ) ) selected( $pic_slideritem_pagination_style, '2' ); ?>><?php _e('Square (Only Pro)', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Pagination Style -->

								<div class="pic-postslider-customizer-inner">
									<div class="pic-postslider-customizer-heading">
										<span class="sub-heading"><?php _e('Pagination Position', 'post-slider-free');?></span>
										<span class="sub-description"><?php _e('Choose Post Slider Pagination Position. default Position: center', 'post-slider-free');?> </span>
									</div>
									<div class="pic-postslider-selected">
										<select name="pic_slideritem_paginationposition" id="pic_slideritem_paginationposition" class="timezone_string">
											<option value="center" <?php if ( isset ( $pic_slideritem_paginationposition ) ) selected( $pic_slideritem_paginationposition, 'center' ); ?>><?php _e('Center', 'post-slider-free');?></option>
											<option disabled value="left" <?php if ( isset ( $pic_slideritem_paginationposition ) ) selected( $pic_slideritem_paginationposition, 'left (Only Pro)' ); ?>><?php _e('Left', 'post-slider-free');?></option>
											<option disabled value="right" <?php if ( isset ( $pic_slideritem_paginationposition ) ) selected( $pic_slideritem_paginationposition, 'right (Only Pro)' ); ?>><?php _e('Right', 'post-slider-free');?></option>
										</select>
									</div>
								</div><!-- End Pagination Position -->
							</div>
						</div>
				</li>
			</ul>
		</div>

		<script>
			jQuery(document).ready(function(){
				jQuery("#pic_title_font_color, #pic_title_fonthvr_color, #pic_slider_itemsbg, #pic_slider_borderclr, #pic_content_color, #pic_postslider_author_color, #pic_slider_date_color, #pic_slideritem_pagination_bgcolor, #pic_slideritem_pagination_color, #pic_slideritem_navhovrcolor, #pic_slideritem_navbgcolor, #pic_slideritem_navtextcolor_hover, #pic_slideritem_navtextcolor, #pic_readmorehvr_color, #pic_readmore_color").wpColorPicker();
			});
		</script>
	<?php
	}

	# Accordion Plus Shortcode page MetaBox Options Save
	function pic_postslider_mentainfo_saves($post_id){

		# Doing autosave then return.
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_catlist'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_catlist', $_POST[ 'pic_postslider_catlist' ]  );
		} else {
            update_post_meta( $post_id, 'pic_postslider_catlist', 'unchecked' );
        }

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_styles'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_styles', $_POST[ 'pic_postslider_styles' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_orderby'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_orderby', $_POST[ 'pic_postslider_orderby' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_order'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_order', $_POST[ 'pic_postslider_order' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_title_fontsize'] ) ) {
			update_post_meta( $post_id, 'pic_title_fontsize', $_POST[ 'pic_title_fontsize' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_title_font_height'] ) ) {
			update_post_meta( $post_id, 'pic_title_font_height', $_POST[ 'pic_title_font_height' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_title_font_color'] ) ) {
			update_post_meta( $post_id, 'pic_title_font_color', $_POST[ 'pic_title_font_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_title_fonthvr_color'] ) ) {
			update_post_meta( $post_id, 'pic_title_fonthvr_color', $_POST[ 'pic_title_fonthvr_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['ppoint_title_alignment'] ) ) {
			update_post_meta( $post_id, 'ppoint_title_alignment', $_POST[ 'ppoint_title_alignment' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slidertitle_transform'] ) ) {
			update_post_meta( $post_id, 'pic_slidertitle_transform', $_POST[ 'pic_slidertitle_transform' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slidertitle_fontweight'] ) ) {
			update_post_meta( $post_id, 'pic_slidertitle_fontweight', $_POST[ 'pic_slidertitle_fontweight' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slidertitle_fontstyle'] ) ) {
			update_post_meta( $post_id, 'pic_slidertitle_fontstyle', $_POST[ 'pic_slidertitle_fontstyle' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_author_color'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_author_color', $_POST[ 'pic_postslider_author_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_author_hide'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_author_hide', $_POST[ 'pic_postslider_author_hide' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_postdate'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_postdate', $_POST[ 'pic_postslider_postdate' ]  );
		}

		#Value check and saves if needed
		if( isset( $_POST[ 'pic_postslider_navtab' ] ) ) {
			update_post_meta( $post_id, 'pic_postslider_navtab', $_POST['pic_postslider_navtab'] );
		} else {
			update_post_meta( $post_id, 'pic_postslider_navtab', 1 );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_postslider_readbtn'] ) ) {
			update_post_meta( $post_id, 'pic_postslider_readbtn', $_POST[ 'pic_postslider_readbtn' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_readmore_color'] ) ) {
			update_post_meta( $post_id, 'pic_readmore_color', $_POST[ 'pic_readmore_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_readmorehvr_color'] ) ) {
			update_post_meta( $post_id, 'pic_readmorehvr_color', $_POST[ 'pic_readmorehvr_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slider_readmore_size'] ) ) {
			update_post_meta( $post_id, 'pic_slider_readmore_size', $_POST[ 'pic_slider_readmore_size' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slider_date_color'] ) ) {
			update_post_meta( $post_id, 'pic_slider_date_color', $_POST[ 'pic_slider_date_color' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slider_itemsbg'] ) ) {
			update_post_meta( $post_id, 'pic_slider_itemsbg', $_POST[ 'pic_slider_itemsbg' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_slider_borderclr'] ) ) {
			update_post_meta( $post_id, 'pic_slider_borderclr', $_POST[ 'pic_slider_borderclr' ]  );
		}

		#Checks for input and saves if needed
		if( isset( $_POST['pic_content_color'] ) ) {
			update_post_meta( $post_id, 'pic_content_color', $_POST[ 'pic_content_color' ]  );
		}

		#Checks for input and sanitizes/saves if needed
	    if( isset($_POST['excerpt_lenght']) && ($_POST['excerpt_lenght'] != '')  && ($_POST['excerpt_lenght'] != '0') && (strlen($_POST['excerpt_lenght']) <= 3)) {
	        update_post_meta( $post_id, 'excerpt_lenght', esc_html($_POST['excerpt_lenght']) );
	    } else{
	    	update_post_meta( $post_id, 'excerpt_lenght', 20 );
	    }

		#Checks for input and sanitizes/saves if needed
	    if( isset( $_POST['pic_content_readmore'] ) && ( $_POST['pic_content_readmore'] != '') && ( strlen($_POST['pic_content_readmore']) <= 20) ) {
	        update_post_meta( $post_id, 'pic_content_readmore', esc_html($_POST['pic_content_readmore']) );
	    } else{
	        update_post_meta( $post_id, 'pic_content_readmore', 'Read More' );
	    }

		#Checks for input and saves if needed
		if( isset( $_POST['pic_content_fontsize'] ) ) {
			update_post_meta( $post_id, 'pic_content_fontsize', $_POST[ 'pic_content_fontsize' ]  );
		}

		#Checks for input and sanitizes/saves if needed
	    if( isset($_POST['pic_sliderallitem']) && ($_POST['pic_sliderallitem'] != '') ) {
	        update_post_meta( $post_id, 'pic_sliderallitem', esc_html($_POST['pic_sliderallitem']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_loop']) && ($_POST['pic_slideritem_loop'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_loop', esc_html($_POST['pic_slideritem_loop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['pic_slideritem_margin'] ) ) {
	    	if(strlen($_POST['pic_slideritem_margin']) > 2){     // input value length greate than 2 

	    	} else{
		    	if( $_POST['pic_slideritem_margin'] == '' || $_POST['pic_slideritem_margin'] == is_null($_POST['pic_slideritem_margin']) ){
		    		update_post_meta( $post_id, 'pic_slideritem_margin', 0 );
		    	}else {
		    		if (is_numeric($_POST['pic_slideritem_margin'])) {
		    			update_post_meta( $post_id, 'pic_slideritem_margin', esc_html($_POST['pic_slideritem_margin']) );
		    		}
		    	}
	    	}
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navigation']) && ($_POST['pic_slideritem_navigation'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navigation', esc_html($_POST['pic_slideritem_navigation']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navigation_position']) && ($_POST['pic_slideritem_navigation_position'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navigation_position', esc_html($_POST['pic_slideritem_navigation_position']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_paginationposition']) && ($_POST['pic_slideritem_paginationposition'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_paginationposition', esc_html($_POST['pic_slideritem_paginationposition']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_pagination']) && ($_POST['pic_slideritem_pagination'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_pagination', esc_html($_POST['pic_slideritem_pagination']) );
	    }  

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_pagination_color']) && ($_POST['pic_slideritem_pagination_color'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_pagination_color', esc_html($_POST['pic_slideritem_pagination_color']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_pagination_bgcolor']) && ($_POST['pic_slideritem_pagination_bgcolor'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_pagination_bgcolor', esc_html($_POST['pic_slideritem_pagination_bgcolor']) );
	    } 

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_pagination_style']) && ($_POST['pic_slideritem_pagination_style'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_pagination_style', esc_html($_POST['pic_slideritem_pagination_style']) );
	    }    
	    
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_autoplay']) && ($_POST['pic_slideritem_autoplay'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_autoplay', esc_html($_POST['pic_slideritem_autoplay']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset( $_POST['pic_slideritem_autoplayspeed'] ) ) {
	    	if(strlen($_POST['pic_slideritem_autoplayspeed']) > 4 ){

	    	} else{
	    		if($_POST['pic_slideritem_autoplayspeed'] == '' || is_null($_POST['pic_slideritem_autoplayspeed'])){
	    			update_post_meta( $post_id, 'pic_slideritem_autoplayspeed', 1500 );
	    		}
	    		else{
		    		if (is_numeric($_POST['pic_slideritem_margin']) && strlen($_POST['pic_slideritem_autoplayspeed']) <= 4) {
		    			update_post_meta( $post_id, 'pic_slideritem_autoplayspeed', esc_html($_POST['pic_slideritem_autoplayspeed']) );
		    		}
	    		}
	    	}
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_autohide']) && ($_POST['pic_slideritem_autohide'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_autohide', esc_html($_POST['pic_slideritem_autohide']) );
	    } 
	    
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_centermode']) && ($_POST['pic_slideritem_centermode'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_centermode', esc_html($_POST['pic_slideritem_centermode']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_stophover']) && ($_POST['pic_slideritem_stophover'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_stophover', esc_html($_POST['pic_slideritem_stophover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_sliderallitemdesktop']) && ($_POST['pic_sliderallitemdesktop'] != '') ) {
	        update_post_meta( $post_id, 'pic_sliderallitemdesktop', esc_html($_POST['pic_sliderallitemdesktop']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_sliderallitemdesktopsmall']) && ($_POST['pic_sliderallitemdesktopsmall'] != '') ) {
	        update_post_meta( $post_id, 'pic_sliderallitemdesktopsmall', esc_html($_POST['pic_sliderallitemdesktopsmall']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_sliderallitemmobile']) && ($_POST['pic_sliderallitemmobile'] != '') ) {
	        update_post_meta( $post_id, 'pic_sliderallitemmobile', esc_html($_POST['pic_sliderallitemmobile']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_autoplaytimeout']) && ($_POST['pic_slideritem_autoplaytimeout'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_autoplaytimeout', esc_html($_POST['pic_slideritem_autoplaytimeout']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navtextcolor']) && ($_POST['pic_slideritem_navtextcolor'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navtextcolor', esc_html($_POST['pic_slideritem_navtextcolor']) );
	    }
		
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navtextcolor_hover']) && ($_POST['pic_slideritem_navtextcolor_hover'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navtextcolor_hover', esc_html($_POST['pic_slideritem_navtextcolor_hover']) );
	    }

	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navbgcolor']) && ($_POST['pic_slideritem_navbgcolor'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navbgcolor', esc_html($_POST['pic_slideritem_navbgcolor']) );
	    }
	 	#Checks for input and sanitizes/saves if needed    
	    if( isset($_POST['pic_slideritem_navhovrcolor']) && ($_POST['pic_slideritem_navhovrcolor'] != '') ) {
	        update_post_meta( $post_id, 'pic_slideritem_navhovrcolor', esc_html($_POST['pic_slideritem_navhovrcolor']) );
	    }
	}
	add_action('save_post', 'pic_postslider_mentainfo_saves');

	function pic_postslider_free_shortcode_display( $post, $args ) {?>
		<p class="option-info"><?php _e('To showcase the Post Slider on your website, simply copy the following shortcode and paste it into the desired location, whether it be a page, post, or widget section.','post-slider-free'); ?></p>
		<textarea cols="35" rows="1" onClick="this.select();" >[picpostslider <?php echo 'id="'.$post->ID.'"';?>]</textarea>
		<?php
	}

	function pic_postslider_free_ratings( $post, $args ) { ?>
		<div class="support-area">
			<p><?php _e('If you require assistance or encounter any bugs while using our plugin, please feel free to post your queries or report issues in the dedicated Plugin Support section. We are committed to resolving any concerns you may have and ensuring the optimal performance of our plugin.','post-slider-free');?></p>
			<p><?php _e('Your feedback is valuable, and we appreciate your collaboration in enhancing the overall experience with our plugin. Thank you for choosing our product!','post-slider-free');?></p>
			<div class="pick-review">
				<a target="_blank" class="pick-btn" href="https://pickelements.com/contact">Support</a>
			</div>
		</div>
		<?php
	}