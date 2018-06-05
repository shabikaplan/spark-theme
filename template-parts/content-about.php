<?php

$image = get_field( 'mission_statement_image' );

?>

<div>
      <div>
		<div class="container">
			<div class="row">
			
				<div class="col-md-6">
					 <h4><?php the_field( 'mission_statement_heading' ); ?></h4>
					<div><?php the_field( 'mission_statement_body' ); ?></div>
				</div>
				<div class="col-md-6">
					<img src="<?php echo $image['sizes']['large']; ?>" class="img-responsive" alt=""/>
				</div>
				
			</div>
			<div class="row row2 team_box team_bottom">
				<h4 class="col-md-12 team-heading"><?php the_field( 'team_section_heading' ); ?></h4>
				<?php if( have_rows( 'team_members' ) ): while( have_rows( 'team_members' ) ): the_row();
					$image = get_sub_field( 'image' );
				?>
					<div class="col-md-6 team1">
						<img src="<?php echo $image['sizes']['thumbnail'] ?>" class="img-responsive" title="continue" alt=""/>
						<div id="small-dialog3" class="mfp-hide">
						   <div class="pop_up2">
							 <h4><?php the_sub_field('name'); ?></h4>
							 <?php the_sub_field('description'); ?>
						   </div>
						</div>
					
					</div>
				<?php endwhile; endif; ?>  		
				
			</div>
		</div>
	   </div>
	  </div>