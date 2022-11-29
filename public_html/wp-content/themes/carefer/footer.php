<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carefer
 */
global $language;

?>

	<footer id="colophon" class="site-footer">
		<div class="main-bottom">
			<div class="grid-header">
				<div class="content">
					<div class="first">
						<div class="top">
							<div class="logo"><img src="<?php echo get_field('logo', 'options');?>" alt=""></div>
							<p><?php echo get_field('text_under_logo', 'options'); ?></p>
						</div>
						<?php if( have_rows('contact_list','options') ): ?>

							<div class="bottom">
								<?php 
									while( have_rows('contact_list', 'options') ) : the_row();
								?>
									<div class="connect">
										<div class="image">
											<img src="<?php echo  get_sub_field('image'); ?>" alt="">
										</div>
										<div class="text">
											<p class="title"><?php echo get_sub_field('title'); ?></p>
											<?php if(get_sub_field('mobile')):?>
											<a href="tel: <?php echo  get_sub_field('contact'); ?> " class="contect"><?php echo  get_sub_field('contact'); ?></a>
											<?php else:?>
											<a href="mailto:<?php echo  get_sub_field('contact'); ?> " class="contect"><?php echo  get_sub_field('contact'); ?></a>
											<?php endif; ?>
										</div>
									</div>
								<?php endwhile; ?> 

							</div>
						<?php endif; ?>
					</div>
					<div class="middle">
					<?php if( have_rows('footer_menu','options') ): ?>

						<div class="list">
							<?php 
										while( have_rows('footer_menu', 'options') ) : the_row();
							?>
								<div class="single-list">
									<p class="title"><?php echo get_sub_field('title'); ?></p>
									<?php if( have_rows('list') ): ?>
										<ul >
											<?php 
														while( have_rows('list') ) : the_row();
											?>
												<?php if(get_sub_field('image')):?>
													<li class="<?php echo(get_sub_field("image"))?'has-icons':'';?>"><a href="<?php echo get_the_permalink(get_sub_field('link_social_media')); ?>"><img src="<?php echo get_sub_field('image_icon'); ?>" alt=""></a></li>
												<?php else:?>
													<li><a href="<?php echo get_the_permalink(get_sub_field('page_link')); ?>"><?php echo  get_sub_field('text'); ?></a></li>

												<?php endif; ?>
											<?php endwhile; ?> 
										</ul>
									<?php endif; ?>
								</div>
							<?php endwhile; ?> 

						</div>
					<?php endif; ?>
					</div>
					
				</div>
			</div>
		</div>
		<div class="bottom-footer">
				<div class="grid-header">
					<div class="content">
						<div class="first">
							<p><?php echo get_field('copyrights_paragraph', 'options'); ?></p>
							
						</div>
						<?php if( have_rows('payment_methods_images','options') ): ?>

							<div class="right">
								<?php 
									while( have_rows('payment_methods_images', 'options') ) : the_row();
									?>
									<div class="image">
										<img src="<?php echo get_sub_field('image'); ?>" alt="">
									</div>
								<?php endwhile; ?> 
							</div>
						<?php endif; ?>
					</div>
				</div>
		</div>
	<?php 
	if(is_page('blog')):
		?>
		<script>
        jQuery(function($) {
            $(window).bind('load',function () {
                get_products_ajax_count();
            });
        });
    </script>
    <?php endif;?>

	</footer><!-- #colophon -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/aos.js"></script>
	<script>
		AOS.init({ once: true });
	</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
