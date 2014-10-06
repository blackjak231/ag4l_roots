<?php

/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

	$args = array(
		'post_parent' => 0,
	);

?>

<div id="bbpress-forums">
	
	<div class="row">
		<div class="col-sm-6">
			<?php bbp_breadcrumb(); ?>
		</div>
		<div class="col-sm-2 col-sm-offset-2">
			<!-- NE PAS TOUCHER -->
			 <div class="dropdown pull-right">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
			    Catégories
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu listdropdownMenu1" role="menu" aria-labelledby="dropdownMenu1">
			  	
			    <?php if ( bbp_has_forums($args) ) : ?>

						<?php while ( bbp_forums() ) : bbp_the_forum(); ?>
				
							<li><a id="textdropdown" class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></li>

						<?php endwhile; ?>

					<?php else : ?>

						<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

					<?php endif; ?>

			  </ul>
			</div>
		</div>
	</div>

	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php bbp_topic_tag_list(); ?>

		<!-- Description topics-->
		<?php //bbp_single_topic_description(); ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>
