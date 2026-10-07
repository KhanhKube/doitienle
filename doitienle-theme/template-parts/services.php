<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<main id="noi-dung">
	<header class="page-head wrap">
		<h1>Dịch vụ đổi tiền lẻ</h1>
		<p>Từ 500đ đến 20.000đ. Gọi là có, giao tận nơi, phục vụ 24/7, không giới hạn số lượng. Nhân viên báo phí theo ngày.</p>
		<a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
	</header>

	<section class="band to-ink">
		<div class="wrap">
			<h2>Chọn mệnh giá cần đổi</h2>
			<p class="lede">Đủ mệnh giá cho việc thối tiền, đi lễ và lì xì. Tiền giao nguyên cọc, nguyên thếp, seri liền.</p>
			<div class="denoms">
				<?php
				$notes = array(
					'500đ' => 'Mệnh giá nhỏ, dùng thối và đi lễ.',
					'1.000đ' => 'Mệnh giá dùng mỗi ngày.',
					'2.000đ' => 'Đổi theo cọc, seri liền.',
					'5.000đ' => 'Phù hợp kinh doanh và lì xì.',
					'10.000đ' => 'Nhận số lượng lớn.',
					'20.000đ' => 'Tiền mới, nguyên thếp.',
				);
				foreach (doitienle_denoms() as $denom) :
					?>
					<article>
						<b><?php echo esc_html($denom); ?></b>
						<span class="denom-note"><?php echo esc_html($notes[$denom]); ?></span>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="band band-ink to-cream">
		<div class="wrap split">
			<div class="hero-photo">
				<img src="<?php echo esc_url(doitienle_img('mark')); ?>" width="400" height="400" alt="Hình dịch vụ đổi tiền lẻ">
			</div>
			<div>
				<h2>Phí thấp và ít tăng</h2>
				<p>Phí giữ ổn định quanh năm, chỉ tăng nhẹ vào dịp Tết do biến động thị trường. Nhiều nơi tăng đột ngột khi khan hàng. Bên này giữ mức phí thấp để khách yên tâm gọi lại.</p>
				<p>Miền Bắc là khu vực chính. Miền Nam giao trong nội thành Sài Gòn. Muốn biết phí hôm nay, gọi <?php echo esc_html(doitienle_phone_label()); ?>.</p>
				<p>Giao nhanh, giữ an toàn. Khách nhận đủ nguyên cọc, nguyên thếp, seri liền. Đổi được số lượng lớn, không hạn chế, phục vụ 24/7.</p>
				<div class="reasons">
					<p>Nhân viên nhận máy và xử lý nhanh.</p>
					<p>Giao sớm sau khi chốt số lượng.</p>
					<p>Hỗ trợ phí giao trong nội thành.</p>
					<p>Đổi qua điện thoại, đỡ phải đi lại.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="band to-ink">
		<div class="wrap">
			<h2>Cách đặt tiền</h2>
			<div class="info">
				<p>Gọi <?php echo esc_html(doitienle_phone_label()); ?>. Nhân viên nghe số lượng, mệnh giá và báo phí trong ngày.</p>
				<p>Sau khi chốt, tiền được giao tận nơi hoặc khách tới lấy tại <?php echo esc_html(doitienle_address()); ?>.</p>
				<p>Khu vực giao: Hà Nội, Thái Nguyên, Vĩnh Phúc, Hải Phòng, Hưng Yên, Nam Định, Hải Dương và nội thành Sài Gòn.</p>
			</div>
		</div>
	</section>
</main>
