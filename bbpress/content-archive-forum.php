<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">


	<?php if ( bbp_allow_search() ) : ?>

		<div class="bbp-search-form">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

		</div>

	<?php endif; ?>

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
			    <?php if ( bbp_has_forums() ) : ?>

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
	<div class="row">
		<div class="col-sm-12">
			<?php bbp_forum_subscription_link(); ?>

			<?php do_action( 'bbp_template_before_forums_index' ); ?>

			<?php if ( bbp_has_forums() ) : ?>

				<?php bbp_get_template_part( 'loop',     'forums'    ); ?>

			<?php else : ?>

				<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

			<?php endif; ?>

			<?php do_action( 'bbp_template_after_forums_index' ); ?>
		</div>
	</div>
</div>
