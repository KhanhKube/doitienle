<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<article class="wrap article">
		<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="content-post"><?php the_content(); ?></div>
		<?php endwhile; ?>
		<p><a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a></p>
	</article>
</main>
<?php
get_footer();
