<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<header class="page-head wrap">
		<h1>Tin tức đổi tiền lẻ</h1>
		<p>Bài mới về tiền lẻ, tiền mới và mùa Tết.</p>
	</header>
	<section class="band to-ink">
		<div class="wrap">
			<?php
			get_template_part('template-parts/news', 'list', array(
				'layout' => 'stack',
				'fallback' => 'static',
			));
			?>
		</div>
	</section>
</main>
<?php
get_footer();
