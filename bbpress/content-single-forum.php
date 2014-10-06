<?php

/**
 * Single Forum Content Part
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
			<?php bbp_forum_subscription_link(); ?>
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


	<?php do_action( 'bbp_template_before_single_forum'); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<!-- description topics -->
		<?php //bbp_single_forum_description(); ?>

		<?php if ( bbp_has_forums() ) : ?>

			<?php bbp_get_template_part( 'loop', 'forums' ); ?>

		<?php endif; ?>

		<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

			<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php elseif ( !bbp_is_forum_category() ) : ?>

			<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_forum' ); ?>

</div>
