	<?php ?>

<div class="features">
		<div class="container">
		<h3 class="m_3"><?php the_field('testimonials_section_heading'); ?></h3>
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
			  <ul class="testimonial-list text-center">
				<?php if( have_rows( 'testimonials' ) ): while( have_rows( 'testimonials' ) ): the_row(); ?>
				<hr>
				  <li class="testimonial"><div class="text"><?php the_sub_field('review'); ?><span>-<?php the_sub_field('name'); ?>, <br> <?php the_sub_field('description'); ?></span></div></li>
				<?php endwhile; endif; ?>  
				<hr>
			  </ul>
			</div>
		</div>
	</div>
</div>
