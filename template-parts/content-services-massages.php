<?php ?>

<?php $section_image = get_field( 'massage_section_image' ); ?>

<div class="row" style="background: url('<?php echo $section_image['url'] ?>') no-repeat right; background-size: 50%; filter: brightness(120%)">

	<div class="col-md-6 offset-md-3 text-center">
		<h4 class="section-heading"><?php the_field( 'massage_section_heading' ); ?></h4>
		<?php the_field( 'massage_section_body' ); ?>
	</div>
	
	<div class="col-md-7 text-center menu">
		
		<?php if( have_rows( 'massage_services' ) ): while( have_rows( 'massage_services' ) ): the_row(); ?>
		
		<div class="service-block">
			<h5 class="service-name"><?php the_sub_field( 'title' ); ?></h5>
			<div class="service"><?php the_sub_field( 'description' ); ?></div>
			<hr class="service">
			<?php if( have_rows( 'pricing' ) ): while( have_rows( 'pricing' ) ): the_row(); ?>
				<span class="price"><?php echo the_sub_field('price'); ?>&#8362 for <?php echo the_sub_field('time'); ?> mins</span>			
			<?php endwhile; endif; ?>
			<hr class="service">
			<?php if( get_sub_field( 'notes' ) ): ?>
			<small><?php the_sub_field( 'notes' ); ?></small>
			<?php endif; ?>
			<button class="btn btn-warning book"><?php the_sub_field( 'button_1' ); ?></button>
		</div>
		
		<?php endwhile; endif; ?>		
		
	</div>
	

	
</div>