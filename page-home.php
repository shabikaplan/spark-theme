<?php

//home page

get_header();

get_template_part( 'template-parts/content', 'slider' );
get_template_part( 'template-parts/content', 'products' );
get_template_part( 'template-parts/content', 'description' );
get_template_part( 'template-parts/content', 'testimonials' );

get_footer();