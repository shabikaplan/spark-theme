<?php  ?>


<div class="features">
		<div class="container-fluid">
			<h3 class="m_3"><?php the_title(); ?></h3>
			
<?php 

get_header();

get_template_part( 'template-parts/content', 'about' );

			
			
		?>

	</div>
</div>

<?php

get_footer();