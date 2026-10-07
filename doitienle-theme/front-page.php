<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
?>
<main id="noi-dung">
	<section class="hero wrap">
		<span class="spark" aria-hidden="true"></span>
		<div class="hero-copy">
			<h1 class="hero-in hero-in-1"><span class="hero-grad">Đổi tiền lẻ phí thấp nhất</span></h1>
			<p class="hero-in hero-in-2">Gọi là có, giao tận nơi, phục vụ 24/7.</p>
			<div class="hero-actions hero-in hero-in-3">
				<a class="btn" href="<?php echo esc_url(doitienle_services_url()); ?>">Đổi tiền ngay</a>
				<a class="btn btn-line" href="<?php echo esc_url(doitienle_services_url() . '#ty-gia'); ?>">Xem mệnh giá</a>
			</div>
			<ul class="trust-row hero-in hero-in-4">
				<li>
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3.5h7.2L19 8.2V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 6 20V5A1.5 1.5 0 0 1 7.5 3.5H7z" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M14 3.8V8h4.2M8.5 12.5h7M8.5 16h5" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
					Giấy phép
				</li>
				<li>
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 3 6.5 13H12l-1 8 7.5-11H12l1-7z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
					Giao dịch nhanh
				</li>
				<li>
					<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="9.5" rx="1.6" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M8 10V7.8a4 4 0 0 1 8 0V10" fill="none" stroke="currentColor" stroke-width="1.6"/></svg>
					Bảo mật
				</li>
			</ul>
		</div>
		<div class="hero-photo">
			<img src="<?php echo esc_url(doitienle_img('hero')); ?>" width="800" height="600" alt="Tiền lẻ mới, nguyên cọc" fetchpriority="high">
		</div>
		<div class="brand-banner">
			<img src="<?php echo esc_url(doitienle_img('banner')); ?>" width="1100" height="200" alt="Dịch vụ đổi tiền lẻ giá rẻ toàn quốc, hotline 085.804.5555">
		</div>
	</section>
</main>
<?php
get_footer();
