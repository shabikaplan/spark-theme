<?php
$bg_image = get_field( 'background_image' );
?>

	<div class="content-bottom" style="background: url(<?php echo $bg_image['url'] ?>) no-repeat; background-size: cover">
		<div class="container">
			<div class="row content-bottom-text">
			  <div class="col-md-7">
				<h3 class="m_3"><?php the_field('about_section_heading'); ?></h3>
				  <div class="m_2"><?php the_field('about_section_body'); ?></div>
			  </div>
			</div>
		</div>
	</div>