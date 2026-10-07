<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
$news = new WP_Query(array(
    'posts_per_page' => 3,
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
));
?>
<main id="noi-dung">
	<section class="hero wrap">
		<span class="spark" aria-hidden="true"></span>
		<div class="hero-copy">
			<h1 class="hero-in hero-in-1"><span class="hero-grad">Đổi tiền lẻ phí thấp nhất</span></h1>
			<p class="hero-in hero-in-2">Gọi là có, giao tận nơi, phục vụ 24/7.</p>
			<div class="hero-actions hero-in hero-in-3">
				<a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>">Nhận báo giá</a>
				<a class="btn btn-line" href="#ty-gia">Xem tỷ giá</a>
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

	<section class="band band-tight to-ink" id="ty-gia" aria-labelledby="tieu-de-ty-gia">
		<div class="wrap">
			<h2 id="tieu-de-ty-gia">Tỷ giá minh họa</h2>
			<p class="lede">Số liệu mẫu để xem quy đổi. Phí đổi trong ngày vẫn do nhân viên báo khi gọi.</p>
			<div class="rate-card" data-rate-widget>
				<label class="rate-field">
					<span>Từ</span>
					<select data-rate-from aria-label="Loại tiền nguồn"></select>
				</label>
				<label class="rate-field">
					<span>Số tiền</span>
					<input data-rate-amount inputmode="decimal" value="100" autocomplete="off">
				</label>
				<button class="rate-swap" type="button" data-rate-swap aria-label="Hoán đổi chiều">
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 7h11M15 4l3 3-3 3M17 17H6M9 14l-3 3 3 3" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<label class="rate-field">
					<span>Sang</span>
					<select data-rate-to aria-label="Loại tiền đích"></select>
				</label>
				<p class="rate-result" data-rate-result aria-live="polite">0</p>
				<p class="rate-meta">
					<span class="rate-dot" aria-hidden="true"></span>
					Số liệu mẫu, ghi lúc <time data-rate-time></time>
				</p>
			</div>
		</div>
	</section>

	<section class="band band-ink band-loose to-cream">
		<div class="wrap">
			<h2>Đổi tiền lẻ ở đâu thì gọi ngay</h2>
			<div class="info">
				<p>Trang này đưa tin về giá và phí đổi tiền lẻ mới nhất. Cơ sở có tại Hà Nội, Hải Phòng và Hồ Chí Minh, phục vụ bà con kinh doanh, đi chùa, đi lễ và dịp Tết.</p>
				<p>Không cần đi tìm điểm đổi. Cầm máy gọi <?php echo esc_html(doitienle_phone_label()); ?>, nhân viên báo phí theo ngày rồi giao tận nơi.</p>
				<p>Đổi mọi loại tiền, nhận số lượng lớn, không hạn chế. Gọi là có, chuyển tận nơi, phục vụ 24/7.</p>
			</div>
		</div>
	</section>

	<section class="band band-tight to-ink" aria-labelledby="menh-gia">
		<div class="wrap">
			<h2 id="menh-gia">Mệnh giá đang đổi</h2>
			<div class="denom-row">
				<?php foreach (doitienle_denoms() as $denom) : ?>
					<span class="chip"><?php echo esc_html($denom); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="band band-ink to-cream">
		<div class="wrap">
			<h2>Khách gọi lại vì những điều này</h2>
			<p class="lede">Nguồn tiền ổn định suốt 8 năm, giao nhanh, phí ít đổi.</p>
			<div class="bento rise">
				<div class="tile tile-photo photo">
					<img src="<?php echo esc_url(doitienle_img('tet')); ?>" width="1024" height="756" alt="Tiền mới dùng để đổi" loading="lazy">
				</div>
				<article class="tile tile-accent fact-a">
					<h3><span data-count="8">8</span> năm</h3>
					<p>Chưa lần nào hết nguồn tiền.</p>
				</article>
				<article class="tile fact-b">
					<h3>Nguyên thếp</h3>
					<p>Nguyên cọc, seri liền khi giao.</p>
				</article>
				<article class="tile fact-c">
					<h3>Báo phí nhanh</h3>
					<p>Gọi máy là nhân viên báo phí trong ngày.</p>
				</article>
				<div class="tile tile-photo shot">
					<img src="<?php echo esc_url(doitienle_img('note')); ?>" width="540" height="540" alt="Tiền mới giao cho khách">
				</div>
			</div>
			<div class="note-grid marks-a">
				<article>
					<h3>Nhận máy nhanh</h3>
					<p>Nhân viên nhiệt tình, tiếp nhận và xử lý yêu cầu ngay khi khách gọi.</p>
				</article>
				<article>
					<h3>Giao sớm</h3>
					<p>Cam kết giao tiền sớm sau khi chốt số lượng và phí trong ngày.</p>
				</article>
				<article>
					<h3>Hỗ trợ phí giao</h3>
					<p>Có hỗ trợ phí giao trong nội thành, khách đỡ phải tự đi lấy.</p>
				</article>
				<article>
					<h3>Đổi qua điện thoại</h3>
					<p>Khách ở xa vẫn đổi được, giảm chi phí đi lại tới cửa hàng.</p>
				</article>
				<article>
					<h3>Nhiều mệnh giá</h3>
					<p>Từ 500đ đến 20.000đ. Khách chọn mệnh giá phù hợp việc đang cần.</p>
				</article>
				<article>
					<h3>Cửa hàng tại Hà Nội</h3>
					<p>Cơ sở 1 tại <?php echo esc_html(doitienle_address()); ?>. Khách có thể tới lấy hoặc nhận giao.</p>
				</article>
			</div>
		</div>
	</section>

	<section class="band band-loose to-ink">
		<div class="wrap">
			<h2>Phí giữ mức thấp quanh năm</h2>
			<div class="info">
				<p>Nhiều cơ sở tăng phí đột ngột khi khan tiền hoặc thiếu người đổi. Bên này giữ phí ổn định, chỉ tăng nhẹ vào Tết vì thị trường biến động.</p>
				<p>Khách chọn gọi vì mức phí thấp. Muốn biết phí hôm nay, gọi hotline để nhân viên báo theo ngày. Khu vực chính là miền Bắc. Miền Nam giao trong nội thành Sài Gòn.</p>
			</div>
		</div>
	</section>

	<section class="band band-ink to-cream">
		<div class="wrap">
			<h2>Ai hay cần đổi</h2>
			<div class="note-grid marks-b">
				<article>
					<h3>Hộ kinh doanh</h3>
					<p>Cần tiền lẻ để thối cho khách, nhận số lượng lớn, giao tới cửa hàng.</p>
				</article>
				<article>
					<h3>Đi chùa, đi lễ</h3>
					<p>Đổi mệnh giá nhỏ trước ngày rằm, mùng một hoặc dịp lễ.</p>
				</article>
				<article>
					<h3>Lì xì Tết</h3>
					<p>Tiền mới, nguyên thếp, seri liền để lì xì cho gia đình và đối tác.</p>
				</article>
				<article>
					<h3>Đổi buôn</h3>
					<p>Nhận số lượng lớn, không giới hạn. Đơn vị đổi tiền lẻ uy tín, giao trong thời gian ngắn.</p>
				</article>
			</div>
		</div>
	</section>

	<section class="band band-tight to-ink">
		<div class="wrap">
			<h2>Giao tận nơi ở các tỉnh này</h2>
			<p class="lede">Cơ sở tại Hà Nội, Hải Phòng và Hồ Chí Minh.</p>
			<p class="lede">Địa chỉ giao dịch: <?php echo esc_html(doitienle_address()); ?>.</p>
			<div class="places rise">
				<?php foreach (doitienle_areas() as $area) : ?>
					<span><?php echo esc_html($area); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="band band-ink band-loose to-ink">
		<div class="wrap">
			<h2>Tin tức mới</h2>
			<?php
			get_template_part('template-parts/news', 'list', array(
				'query' => $news,
				'layout' => 'rail',
				'fallback' => 'link',
			));
			?>
		</div>
	</section>
</main>
<?php
get_footer();
