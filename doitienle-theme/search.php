<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<article class="wrap article">
		<h1>Hãy gọi để được báo phí</h1>
		<p>Website không nhận nội dung qua biểu mẫu. Nhân viên trả lời qua điện thoại.</p>
		<p><a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a></p>
	</article>
</main>
<?php
get_footer();
