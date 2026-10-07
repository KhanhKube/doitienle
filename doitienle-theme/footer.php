<?php if (!defined('ABSPATH')) { exit; } ?>
<footer class="site-foot">
	<span class="spark" aria-hidden="true"></span>
	<div class="wrap foot-grid">
		<div>
			<p class="foot-lead">Đổi mọi loại tiền. Gọi là có, chuyển tận nơi, phục vụ 24/7, không hạn chế số lượng.</p>
			<a class="contact-mark" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_phone_label()); ?></a>
			<p class="contact-mark">Cơ sở 1: <?php echo esc_html(doitienle_address()); ?></p>
			<p>Hà Nội, Thái Nguyên, Vĩnh Phúc, Hải Phòng, Hưng Yên, Nam Định, Hải Dương và nội thành Sài Gòn.</p>
		</div>
		<a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
	</div>
	<p class="copy wrap">© <?php echo esc_html(wp_date('Y')); ?> <?php bloginfo('name'); ?></p>
</footer>
<a class="btn dock" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
<?php wp_footer(); ?>
</body>
</html>
