<?php
/**
 * Template Name: Tin tức
 */
if (!defined('ABSPATH')) {
    exit;
}
get_header();
$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$news = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'paged' => $paged,
    'ignore_sticky_posts' => true,
));
?>
<main id="noi-dung">
	<header class="page-head wrap">
		<h1>Tin tức đổi tiền lẻ</h1>
		<p>Bài về đổi tiền lẻ, tiền mới, phí theo ngày và mùa Tết. Gọi <?php echo esc_html(doitienle_phone_label()); ?> nếu cần báo phí ngay.</p>
	</header>
	<section class="band to-ink">
		<div class="wrap">
			<?php
			get_template_part('template-parts/news', 'list', array(
				'query' => $news,
				'layout' => 'stack',
				'fallback' => 'static',
			));
			?>
		</div>
	</section>
</main>
<?php
get_footer();
