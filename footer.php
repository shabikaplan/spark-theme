<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spark_Body_and_Soul
 */
	$contact_page = get_page_by_title( 'contact' );

?>

	</div><!-- #content -->

	<div class="footer">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3">
						<h3>Contact Us</h3>
						<p><?php the_field('address', $contact_page->ID); ?> </p>
						   		<p><?php the_field('city', $contact_page->ID) . ', ' . the_field('zip', $contact_page->ID); ?></p>
						   		<p><?php the_field('state', $contact_page->ID); ?></p>
				   		<p><?php the_field('phone', $contact_page->ID); ?></p>
				 	 	<p><?php the_field('email', $contact_page->ID); ?></p>
					</div>
					<div class="col-md-6 text-center">
						<img src="<?php echo get_header_image() ?>" alt="">
					</div>
					<div class="col-md-3">
						<ul class="footer-box">
							<h3>Newsletter</h3>
							<div class="footer-search">
				    		   <form>
				    			<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
				    			<input type="submit" value="Go">
				    		   </form>
					        </div>
							<ul class="social">	
							  <li class="facebook"><a href="#"><i class="fab fa-facebook-f fa-lg"></i></a></li>
							  <li class="twitter"><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
							  <li class="instagram"><a href="#"><i class="fab fa-instagram fa-lg"></i></a></li>	
							  <li class="pinterest"><a href="#"><i class="fab fa-pinterest fa-lg"></i></a></li>	
							  <li class="youtube"><a href="#"><i class="fab fa-youtube fa-lg"></i></a></li>										  				
						    </ul>
		   					
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="copy col-md-12 text-center">
				   © 2018 Designed and Developed by <a class="developers" href="http://www.kaplanwebdevelopment.com" target="_blank">Naftali Kaplan and Shabti Kaplan</a>
				</div>
			</div>
		</div>
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
