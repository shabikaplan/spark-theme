<?php ?>

 <div class="main">
      <div class="shop_top content-top">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-2 single_left">
				   <div class="single_image">
					   <?php $images = get_field( 'product_photos' );
					
							 
						 if( $images ): ?>
					     <ul id="etalage">
							 <?php foreach( $images as $image ): ?>
							<li>
								<img class="etalage_thumb_image" src="<?php echo $image['sizes']['medium']; ?>" />
								<img class="etalage_source_image" src="<?php echo $image['sizes']['large']; ?>" />
							</li>
							 <?php endforeach; ?>
						</ul>
					   <?php else: 
					   ?>
					   	<ul id="etalage">
							<li>
								<?php 
									echo get_the_post_thumbnail( $post->ID, 'medium', array( 'class' => 'etalage_thumb_image' ) );
									echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'etalage_source_image' ) );
								?>
							</li>
						</ul>					 
					   <?php endif; ?>
					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">
				        	<h3 class="m_3"> <?php the_title(); ?> </h3>
							<div class="desc"><?php the_field( 'product_description' ); ?></div>
				        	
							<?php if( !empty( get_field( 'special_price' ) ) ): ?>
							<p class="price2"><span class="reducedfrom"><?php the_field( 'product_currency' ) . ' ' . the_field( 'product_price' ) ?></span></p>
							<p class="price2"><span class="actual"><?php the_field( 'product_currency' ) . '' . the_field( 'special_price' ) ?></span><br></p>
							<?php else: ?>
							<p class="price2"><span class="actual"><?php the_field( 'product_currency' ) . '' . the_field( 'product_price' ) ?></span><br></p>
							<?php endif; ?>
							
							<ul class="product-qty options">
								<h4 class="m_12">Quantity:</h4>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul>
							
							<div class="btn_form">
							   <form>
								 <input type="submit" value="buy now" title="">
							  </form>
							</div>
							<button class="btn btn-default btn-sm"><i class="fa fa-heart fa-lg"></i><a href="#"> Add to wishlist</a></button>
    			           <div class="btn_form">
								 <input type="submit" value="add to cart" title="">
							</div>
							
							<div class="social_buttons">
								<button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
					              <i class="fab fa-twitter fa-lg"></i> Tweet
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
					              <i class="fab fa-facebook-f fa-lg"></i> Share
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
					              <i class="fab fa-pinterest fa-lg"></i> Pinterest
					            </button>
					        </div>
				        </div>
				        <div class="clear"> </div>
				</div>
				
			</div>		
			<div class="desc">
			   	<h4>Description</h4>
			   	<?php the_field('product_description'); ?>
			</div>
			
			<?php $args = array( 'posts_per_page' => 3, 'order' => 'ASC', 'post_type' => 'products' );
			$posts = get_posts( $args );
		
			?>
			
			<div class="row">
				<h4 class="col-md-12 m_11">Most Recent Products</h4>
				<?php foreach( $posts as $post ){ 
				$image = get_field( 'product_main_photo' );
				$desc = get_field( 'product_description' );
				$array = explode( ".", $desc );
				$desc = $array[0];
				?>
				<a href="<?php the_permalink(); ?>">
				<div class="col-md-4">
					<img src="<?php echo $image['sizes']['medium'] ?>" class="img-responsive" alt=""/> 
					<div class="shop_desc">
						<span class="new-box">
							<span class="new-label">New</span>
						</span>
						<?php if( !empty( get_field( 'special_price' ) ) ): ?>
						<span class="sale-box">
							<span class="sale-label">Sale!</span>
						</span>
						<?php endif; ?>
						<h3 class="m_3"><?php the_title(); ?></h3>
						<p><?php echo $desc ?></p>
						
						<?php if( !empty( get_field( 'special_price' ) ) ): ?>
						<span class="reducedfrom"><?php the_field( 'product_currency' ) . ' ' . the_field( 'product_price' ) ?></span>
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
				<?php } ?>
			</div>	
	     </div>
	   </div>
	  </div>