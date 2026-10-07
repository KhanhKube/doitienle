<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<header class="page-head wrap">
		<h1><?php echo esc_html(wp_strip_all_tags(get_the_archive_title())); ?></h1>
		<?php if (get_the_archive_description()) : ?>
			<div class="lede"><?php echo wp_kses_post(get_the_archive_description()); ?></div>
		<?php endif; ?>
	</header>
	<section class="band to-ink">
		<div class="wrap">
			<?php get_template_part('template-parts/news', 'list', array('layout' => 'stack')); ?>
		</div>
	</section>
</main>
<?php
get_footer();
