<?php ?>

	<div class="container">
		<div class="text-center content-top">
			<h3 class="m_3"><?php the_field( 'products_section_heading' ); ?></h3>
			<?php the_field( 'products_section_body' ); ?>
			<div class="row align-items-end">
				<?php if( have_rows( 'product_rows' ) ): while( have_rows( 'product_rows' ) ): the_row();
					$title = get_sub_field( 'title' );
					$image = get_sub_field( 'product_main_photo' );
					$post_id = get_page_by_title($title, OBJECT, 'product');
					$post_id->ID; // your id
					
					?>
							<div class="col-md-4 feature-product">
								<a class="products-link" href="<?php the_permalink( $post_id->ID ) ?>">
									<img src="<?php echo $image['sizes']['medium']; ?>" />
									<h4 class="text-center"><?php echo $title; ?></h4>
								</a>
							</div>
							
					<?php
					endwhile;
					endif;
					?>
					<div class="col-md-12 products-button text-center">
						<button class="btn btn-warning btn-lg">See More Products</button>
					</div>
			</div>
		</div>
	</div>
	