<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<article class="wrap article">
		<h1>Trang này không còn</h1>
		<p>Quay lại trang chủ hoặc gọi để được hướng dẫn.</p>
		<p class="action-row">
			<a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
			<a class="text-link" href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a>
		</p>
	</article>
</main>
<?php
get_footer();
