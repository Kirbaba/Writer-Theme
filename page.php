<? get_header();?>
	<section class="single">
		<div class="contain">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if ( has_post_thumbnail() ): ?>
		<h1 class="single__name"><?php the_title(); ?></h1>
			<div class="single__thumb">
			  <?php the_post_thumbnail('full', array('class'=>'new-img-pr')); ?>
			</div>
				<?php  endif;?>			                     
			
			<div class="single__text"> 
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
		<?php  endif;?>	
		</div>
	</section>
<? get_footer(); ?>