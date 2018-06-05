<?php


get_header();

?>

<div class="features">
		<div class="container-fluid">
			<h3 class="m_3"><?php the_title(); ?></h3>
			
			
			<?php

get_template_part( 'template-parts/content', 'services-massages' );

get_template_part( 'template-parts/content', 'services-facials' );

get_template_part( 'template-parts/content', 'services-packages' );


			?>

	</div>
</div>

<?php
			
get_footer();