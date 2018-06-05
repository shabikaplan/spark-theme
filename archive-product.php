<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spark_Body_and_Soul
 */

get_header();

?>

<div class="main">
      <div class="shop_top content-top">
		<div class="container">
			<h3 class="m_3">Our Products</h3>
			<div class="row shop_box-top">
				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();
			
				$image = get_field( 'product_main_photo' );
				$desc = get_field( 'product_description' );
				$array = explode( ".", $desc );
				$desc = $array[0];

				?>

				<a class="products-link" href="<?php the_permalink(); ?>">
				<div class="col-md-3 shop_box">
					<img src="<?php echo $image['sizes']['medium'] ?>" class="img-responsive" alt=""/> 
					<div class="shop_desc">
						<?php if( get_the_date("Y/m/d") == date("Y/m/d") ): ?>
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<?php endif; ?>	
						
						<?php if( !empty( get_field( 'special_price' ) ) ): ?>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
						<?php endif; ?>
						<h4><?php the_title(); ?></h4>
						<p><?php echo $desc ?>...</p>
						
						<?php if( !empty( get_field( 'special_price' ) ) ): ?>
						<span class="reducedfrom"><?php the_field( 'product_currency' ) . '' . the_field( 'product_price' ) ?></span>
						<span class="actual"><?php the_field( 'product_currency' ) . '' . the_field( 'special_price' ) ?></span><br>
						<?php else: ?>
						<span class="actual"><?php the_field( 'product_currency' ) . '' . the_field( 'product_price' ) ?></span><br>
						<?php endif; ?>
						<ul class="buttons">
							<li class="cart"><a href="#">Add To Cart</a></li>
							<li class="shop_btn"><a href="#">Read More</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</div>
				</a>
				
				<?php endwhile; endif; ?>  
				
				
			</div>
		 </div>
	   </div>
	  </div>

<?php

		
get_footer();
