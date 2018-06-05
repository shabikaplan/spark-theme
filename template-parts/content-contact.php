<?php ?>

<style type="text/css">

.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJx0f2n1AZj1TULsFkXGSzidbq40NnTAA"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/google-map.js" type="text/javascript">

</script>

<div class="main">
      <div class="content-top">
		<div class="container">
			<h3 class="m_3"><?php the_title(); ?></h3>
			<div class="row">
				<div class="col-md-7">
				  <div class="map">
					  <?php 

						$location = get_field('google_map');

						if( !empty($location) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
						<?php endif; ?>
				  </div>
				</div>
				<div class="col-md-5">
					
					<div class="m_3 contact-info"><?php the_field('contact_desc'); ?>
				                <p><?php the_field('address'); ?> </p>
						   		<p><?php the_field('city') . ', ' . the_field('zip'); ?></p>
						   		<p><?php the_field('state'); ?></p>
				   		<p><?php the_field('phone'); ?></p>
				 	 	<p><?php the_field('email'); ?></p>
						<?php $links = get_field( 'social_media' );
							if( $links ): 
						?>
				   		<p>Follow on: 
							<?php foreach( $links as $link ):
							$array = explode( ", ", $link );
							$platform = $array[1];
							$icon = $array[0];
							?>
							  <a class="social_buttons" href="<?php echo get_field($platform .'_link'); ?>"><i class="<?php echo $icon; ?>"></i>     </a>
							<?php endforeach; ?>
						</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row row2">
				<div class="col-md-6 offset-md-3 contact">
				  <?php echo do_shortcode( get_field( 'contact_form_shortcode' ) ); ?>
			     </div>
		    </div>
	     </div>
   	</div>
</div>