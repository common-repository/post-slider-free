<?php
    if( !defined( 'ABSPATH' ) ){
        exit;
    }
?>
	<div class="picklogo-container-area">
		<style>
			<?php if($pic_slideritem_navigation_position == 1){ ?>
				#picpostsliders-three-<?php echo $postid;?> {
					padding-top:50px;
				}
				#picpostsliders-three-<?php echo $postid;?> .owl-nav{
					margin-right: 0;
					margin-top: 0;
					position: absolute;
					right: 0;
					top: 0px;
				}
			<?php }elseif($pic_slideritem_navigation_position == 2){ ?>
				#picpostsliders-three-<?php echo $postid;?> .owl-nav{
					margin-right: 0;
					margin-top: 0;
					position: absolute;
					left: 0;
					top: 0px;
				}
			<?php }elseif($pic_slideritem_navigation_position == 3){ ?>
				#picpostsliders-three-<?php echo $postid;?> .owl-nav{
					margin-right: 0;
					margin-top: 0;
					left: 0;
					padding-top: 30px;
					top: -50px;
				}
			<?php }elseif($pic_slideritem_navigation_position == 4){ ?>
				#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-prev {
					float: left;
					height: auto;
					left: 1px;
					margin: 0;
					position: absolute;
					top: 50%;
					transform: translateY(-50%);
					margin-top:-30px;
				}
				#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-next {
					height: auto;
					position: absolute;
					right: 1px;
					top: 50%;
					transform: translateY(-50%);
					margin-top:-30px;
				}
			<?php } ?>
			#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-prev{
				background: <?php echo $pic_slideritem_navbgcolor;?>;
				border-radius: 0;
				color: <?php echo $pic_slideritem_navtextcolor;?>;
				cursor: pointer;
				display: inline-block;
				font-size: 15px;
				margin: 0;
				margin-right:5px;
				padding: 0px;
				width: 30px;
				height:30px;
				line-height:30px;
				margin-top: 0px;
				transition: all 0.3s;
			}
			#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-next{
				background: <?php echo $pic_slideritem_navbgcolor;?>;
				border-radius: 0;
				color: <?php echo $pic_slideritem_navtextcolor;?>;
				cursor: pointer;
				display: inline-block;
				font-size: 15px;
				margin: 0;
				padding: 0;
				width: 30px;
				height:30px;
				line-height:30px;
				margin-top: 0px;
				transition:all 0.3s;
			}
			#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-next:hover,
			#picpostsliders-three-<?php echo $postid;?> .owl-nav .owl-prev:hover {
			  background: <?php echo $pic_slideritem_navhovrcolor;?>;
			  color: <?php echo $pic_slideritem_navtextcolor_hover;?>;
			  transition:all 0.3s;
			}
			#picpostsliders-three-<?php echo $postid;?>.owl-theme .owl-dots {
			  text-align: <?php echo $pic_slideritem_paginationposition;?>;
			  margin-top: 10px;
			}
			<?php if($pic_slideritem_pagination_style == 1){ ?>
				#picpostsliders-three-<?php echo $postid;?>.owl-theme .owl-dots .owl-dot span {
				  backface-visibility: visible;
				  background: <?php echo $pic_slideritem_pagination_bgcolor;?>;
				  border-radius: 30px;
				  display: block;
				  height: 10px;
				  margin: 5px 7px;
				  transition: opacity 200ms ease 0s;
				  width: 10px;
				}
			<?php }elseif($pic_slideritem_pagination_style == 2){ ?>
				#picpostsliders-three-<?php echo $postid;?>.owl-theme .owl-dots .owl-dot span {
				  backface-visibility: visible;
				  background: <?php echo $pic_slideritem_pagination_bgcolor;?>;
				  border-radius: 0px;
				  display: block;
				  height: 10px;
				  margin: 5px 7px;
				  transition: opacity 200ms ease 0s;
				  width: 10px;
				}
			<?php } ?>
			#picpostsliders-three-<?php echo $postid;?>.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
			 	background: <?php echo $pic_slideritem_pagination_color;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> {
			    display: block;
			    overflow: hidden;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-items {
			    background: <?php echo $pic_slider_itemsbg;?>;
			    border: 1px solid <?php echo $pic_slider_borderclr;?>;
			    transition: .3s all ease;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-items img {
				transition: .3s all ease;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-items:hover img {
				transition: .3s all ease;
			    transform: scale(1.2);
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-items .pic-postslider-thumbnail{
				position: relative;
				transition: .3s all ease;
				overflow: hidden;
			}
			#picpostsliders-three-<?php echo $postid;?> .overlay-post-tag {
			    position: absolute;
			    left: 30px;
			    bottom: 30px;
			}
			#picpostsliders-three-<?php echo $postid;?> .overlay-post-tag a{
			    color: <?php echo $pic_slider_date_color;?>;
			    background: #fff;
			    padding: 8px 15px 8px 15px;
			    font-size: 15px;
			    text-transform: capitalize;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content {
			    display: block;
			    overflow: hidden;
			    padding: 30px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content h2.pic-title {
			    line-height: unset;
			    margin-bottom:0;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content h2.pic-title a {
			    color: <?php echo $pic_title_font_color;?>;
			    text-transform: <?php echo $pic_slidertitle_transform;?>;
			    line-height: <?php echo $pic_title_font_height;?>px;
			    font-size: <?php echo $pic_title_fontsize;?>px;
			    font-weight: <?php echo $pic_slidertitle_fontweight;?>;
			    font-style: <?php echo $pic_slidertitle_fontstyle;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content h2.pic-title a:hover {
			  	color: <?php echo $pic_title_fonthvr_color;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta{
			    margin:0;
			    padding:0;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li{
			    list-style: none;
			    display: inline-block;
			    margin-right:10px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li:last-child{
			    margin-right:0px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-author a{
			    font-size: 14px;
			    text-transform: capitalize;
			    color: <?php echo $pic_postslider_author_color;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-date {
			    font-size: 14px;
			    text-transform: capitalize;
			    color: <?php echo $pic_slider_date_color;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-comments {
			    font-size: 14px;
			    text-transform: capitalize;
			    color: <?php echo $pic_slider_date_color;?>;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-author i.fa,
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-date i.fa,
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content ul.pic-author-meta li.post-comments i.fa{
			    margin-right: 5px;
			    font-size: 15px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content .pic-post-content p {
			    font-size: <?php echo $pic_content_fontsize;?>px;
			    color: <?php echo $pic_content_color;?>;
			    margin-bottom: 15px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content .pic-read-btn a {
			    color: <?php echo $pic_readmore_color;?>;
			    font-size: <?php echo $pic_slider_readmore_size;?>px;
			    font-weight: 500;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content .pic-read-btn a i.fa{
			    margin-left:5px;
			    font-size: 12px;
			}
			#picpostsliders-three-<?php echo $postid;?> .pic-postslider-content .pic-read-btn a:hover {
			    color: <?php echo $pic_readmorehvr_color;?>;
			}
		</style>

		<script type="text/javascript">
            jQuery(document).ready(function($) {
              $("#picpostsliders-three-<?php echo $postid;?>").owlCarousel({
              	lazyLoad: true,
              	items:<?php echo $pic_sliderallitem;?>,
                loop: false,
                margin: <?php echo $pic_slideritem_margin;?>,
                autoplay: <?php echo $pic_slideritem_autoplay;?>,
                autoplaySpeed: <?php echo $pic_slideritem_autoplayspeed;?>,
                autoplayTimeout: <?php echo $pic_slideritem_autoplaytimeout;?>,
                autoplayHoverPause: <?php echo $pic_slideritem_stophover;?>,
                nav: <?php echo $pic_slideritem_navigation;?>,
                dots: <?php echo $pic_slideritem_pagination;?>,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                smartSpeed: 450,
                clone:true,
                responsive:{
                    0:{
                      items:<?php echo $pic_sliderallitemmobile;?>,
                    },
                    678:{
                      items:<?php echo $pic_sliderallitemdesktopsmall;?>,
                    },
                    980:{
                      items:<?php echo $pic_sliderallitemdesktop;?>,
                    },
                    1199:{
                      items:<?php echo $pic_sliderallitem;?>,
                    }
                }
              });
            });
        </script>

		<div id="picpostsliders-three-<?php echo $postid;?>" class="owl-carousel owl-theme">
			<?php while ( $pic_postquery->have_posts() ) : $pic_postquery->the_post(); ?>
				<div class="pic-postslider-items">
					<?php if(has_post_thumbnail()) { ?>
					<div class="pic-postslider-thumbnail">
						<?php the_post_thumbnail(); ?>
			            <div class="overlay-post-tag">
			               	<?php the_category(' '); ?>
			            </div>
					</div>
					<?php } ?>
					<div class="pic-postslider-content">
						<ul class="pic-author-meta">
							<li class="post-author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
							<li class="post-date"><i class="fa fa-clock-o"></i><?php echo esc_html ( get_the_date() ); ?></li>
							<li class="post-comments"><i class="fa fa-comments"></i><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></li>
						</ul>
						<h2 class="pic-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>