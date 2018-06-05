<?php
$images = get_field( 'intro_images' );
$calender = get_field('calender_shortcode');
$calender_shortcode = do_shortcode($calender);
$gift = get_field('gift_shortcode');
$gift_shortcode = do_shortcode($gift);
?>

<div class="banner">
<!-- start slider -->
	<div id="bannerCarousel" class="carousel banner-slide slide carousel-fade" data-ride="carousel">
  		<div class="carousel-inner">
			<?php if( !empty( $images ) ): 
				$count = 1;
				$active = 'active';
				foreach( $images as $image ):
				if( $count > 1 ) $active = '';
			?>
			<div class="carousel-item <?php echo $active ?>">
			  <img src="<?php echo $image['sizes']['large'] ?>" class="img-responsive" alt=""/>
			</div>
			
			<?php
				$count++; endforeach;
			endif;
			?>
			
		<!--/slide -->
		</div>
		<div class="carousel-cta">
					<!-- Text title -->
				<h1 class="title"><?php the_field('intro_text'); ?></h1>
				<!-- /Text title -->
			
				<button class="btn btn-book btn-lg" data-toggle="modal" data-target="#bookingModal"><?php the_field('button_1'); ?></button>
				<button class="btn btn-warning btn-lg" data-toggle="modal" data-target="#giftModal"><?php the_field('button_2'); ?></button>
			</div>
	</div>
   <!--/slider -->
</div>
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel"><?php the_field('button_1'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="calendar"><?php if( $calender ) echo $calender_shortcode ?></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="<?php echo home_url('services'); ?>" class="btn btn-default">See Our Services</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="giftModal" tabindex="-1" role="dialog" aria-labelledby="giftModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="bookingModalLabel"><?php the_field('button_2'); ?></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div class="gift">
		  <h5>Choose From One Of The Following:</h5>
		  <?php $args = array(
				'post_type'             => 'product',
				'post_status'           => 'publish',
				'posts_per_page'        => '-1',
				'product_cat'			=> 'gift-card',
				'order'					=> 'DESC',
			);
			$gift_cards = get_posts($args);
		    $gift_cards_ids = '';
			foreach( $gift_cards as $gift_card ){
				$gift_ID = $gift_card->ID;
				$gift_cards_ids .= $gift_ID . ', ';
				$gift_title = $gift_card->post_title;

				// get variations meta
				//$product_variation = new WC_Product_Variation( $gift_ID );
				//$variation_price = $product_variation->get_price_html();
		  	?>
		  	<div class="choice">
				<input type="radio" class="gift" name="gift_card" value="<?php echo $gift_title ?>"><?php echo $gift_title ?><br>
		  		<div class="variations hidden">
				<?php
					$var_args = array(
						'post_type'             => 'product_variation',
						'post_status'           => 'publish',
						'posts_per_page'        => '-1',
						'post_parent' 			=> $gift_ID,
					);
					$variations = get_posts( $var_args );
					foreach ( $variations as $variation ) {

						// get variation ID
						$variation_ID = $variation->ID;
						$product_variation = new WC_Product_Variation( $variation_ID );
						$variation_price = $product_variation->get_price_html();
						$variation_title = $variation->post_title;
						$variation_desc = explode( "- ", $variation_title );
						$variation_name = explode( "(", $gift_title )[0] . ' - ' . $variation_desc[1];
						

					?>
		  
						
					<div><input type="radio" class="variation" name="variation" value="<?php echo $variation_name ?>"><?php echo $variation_desc[1] . ' - ' . $variation_price ?></div>
		  			<?php

					} ?>
		  		</div>
		  	</div>
					<?php
			}
	  
		  ?>
		  
        	<?php if( $gift ) echo $gift_shortcode ?>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

