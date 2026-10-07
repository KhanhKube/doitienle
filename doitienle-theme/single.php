<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<div class="read-bar" aria-hidden="true"><span></span></div>
<main id="noi-dung">
	<?php while (have_posts()) : the_post(); ?>
		<article class="wrap article">
			<p><a class="text-link" href="<?php echo esc_url(doitienle_news_url()); ?>">Tin tức</a></p>
			<h1><?php the_title(); ?></h1>
			<time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
			<?php if (has_post_thumbnail()) : ?>
				<div class="hero-photo article-photo"><?php the_post_thumbnail('large'); ?></div>
			<?php endif; ?>
			<nav class="toc" aria-label="Mục lục" hidden></nav>
			<div class="content-post"><?php the_content(); ?></div>
			<p><a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a></p>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
