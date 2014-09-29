<?php get_template_part('templates/page', 'header'); ?>

<?php if (is_page(array( 230, 'bde', 'L\'équipe'))): ?>
	<?php get_template_part('templates/content', 'bde'); ?>
<?php else: ?>
	<?php get_template_part('templates/content', 'page'); ?>
<?php endif; ?>
