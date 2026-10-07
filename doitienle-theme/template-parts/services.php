<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<main id="noi-dung">
	<header class="page-head wrap">
		<h1>Dịch vụ đổi tiền lẻ</h1>
		<p>Từ 500đ đến 20.000đ. Gọi là có, giao tận nơi, phục vụ 24/7, không giới hạn số lượng. Nhân viên báo phí theo ngày.</p>
		<p class="jump">
			<a href="#faq">Câu hỏi thường gặp</a>
			<a href="#ty-gia">Đổi mệnh giá</a>
		</p>
		<a class="btn" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
	</header>

	<section class="band to-cream" id="menh-gia-chon">
		<div class="wrap">
			<h2>Chọn mệnh giá cần đổi</h2>
			<p class="lede">Tiền mới đầy đủ mệnh giá, nguyên cọc, nguyên thếp, series liền! Hỗ trợ ship tận nhà 24/7</p>
			<div class="denoms">
				<?php foreach (doitienle_denoms() as $denom) : ?>
					<article>
						<b><?php echo esc_html($denom); ?></b>
						<span class="denom-note">Còn Hàng</span>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="band" id="dac-tinh">
		<div class="wrap">
			<h2>Đặc tính mệnh giá theo từng việc</h2>
			<p class="lede">Cùng một số tiền, chọn sai tờ thì phong bao phình, tráp bị hụt, hoặc quầy thiếu tờ thối. Chọn theo việc, không lấy đại một mệnh giá cho mọi đơn.</p>
			<div class="sheet-wrap">
				<table class="sheet">
					<thead>
						<tr>
							<th>Việc cần dùng</th>
							<th>Mệnh giá hợp lý</th>
							<th>Cách lấy</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Xếp tráp, lễ vật cần khối</td>
							<td>20.000đ, 50.000đ, 100.000đ</td>
							<td>Tờ lớn tạo mặt dày với ít cọc. 200.000đ chỉ khi cần số tiền cao mà chồng không được quá dày.</td>
						</tr>
						<tr>
							<td>Phong bao nhỏ, túi mù</td>
							<td>2.000đ, 5.000đ, 10.000đ</td>
							<td>Vừa miệng bao. Từ 20.000đ trở lên khó gấp khít, dễ rách mép bao.</td>
						</tr>
						<tr>
							<td>Thối tại quầy</td>
							<td>500đ đến 10.000đ</td>
							<td>Chia theo hóa đơn trung bình. Xem tỷ lệ số tờ bên dưới.</td>
						</tr>
						<tr>
							<td>Nhập về để chia cho điểm bán</td>
							<td>10.000đ đến 200.000đ, nguyên thếp</td>
							<td>Giữ băng niêm phong đến lúc chia. Xé lẻ từ đầu thì mất mốc seri để đối soát.</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3 class="subhead">Tỷ lệ tờ cho quầy</h3>
			<p class="lede">Áp cho hóa đơn thường từ 50.000đ đến 150.000đ. Tỷ lệ tính trên số tờ, không tính trên số tiền.</p>
			<div class="sheet-wrap">
				<table class="sheet">
					<thead>
						<tr>
							<th>Mệnh giá</th>
							<th>Tỷ lệ số tờ</th>
							<th>Ghi chú</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>10.000đ</td><td>35%</td><td>Trục chính của két thối.</td></tr>
						<tr><td>20.000đ</td><td>20%</td><td>Thối các hóa đơn chẵn lớn.</td></tr>
						<tr><td>5.000đ</td><td>20%</td><td>Lấp khoảng giữa 2.000đ và 10.000đ.</td></tr>
						<tr><td>2.000đ</td><td>12%</td><td>Dùng khi hóa đơn lẻ vài nghìn.</td></tr>
						<tr><td>1.000đ</td><td>8%</td><td>Chỉ đủ vòng quay 3–5 ngày.</td></tr>
						<tr><td>500đ</td><td>5%</td><td>Chiếm chỗ. Không nhập dư.</td></tr>
					</tbody>
				</table>
			</div>
			<p class="lede">Hóa đơn thường dưới 30.000đ thì đảo tỷ lệ: tăng 500đ–2.000đ, giảm 10.000đ và 20.000đ. Mệnh giá 50.000đ–200.000đ không đưa vào két thối.</p>
		</div>
	</section>

	<section class="band to-ink" id="kiem-tra">
		<div class="wrap">
			<h2>Kiểm tra cọc nguyên niêm phong</h2>
			<p class="lede">Làm đủ năm bước trước khi ký nhận. Một cọc giao tại đây là 100 tờ. Một thếp là 10 cọc.</p>
			<div class="check-grid">
				<div>
					<ol class="steps">
						<li>Đếm số thếp và số cọc, khớp với số đã chốt.</li>
						<li>Băng giấy còn liền một mạch, không cắt dán. Chữ và mã trên băng còn đọc được. Băng rách, lệch hoặc có vệt keo mới thì để riêng, không nhận.</li>
						<li>Seri tờ cuối lớn hơn seri tờ đầu đúng 99 số, cùng nhóm ký tự phía trước. Nhảy số, đứt quãng hoặc đổi nhóm ký tự trong một cọc là không đạt.</li>
						<li>Seri in trên băng trùng seri tờ đầu.</li>
						<li>Ký biên bản sau khi xong bốn bước trên. Cọc đã bóc băng không đổi lại, trừ lỗi ghi vào biên bản ngay tại chỗ.</li>
					</ol>
				</div>
				<div>
					<h3>Giữ cọc chưa bóc</h3>
					<div class="keep">
						<p>Để nằm ngang. Một chồng không quá 10 thếp.</p>
						<p>Để khô thoáng. Tránh nắng và luồng lạnh thổi thẳng vào băng giấy, vì băng ẩm dễ bong.</p>
						<p>Không thắt dây thun đè lên băng niêm phong.</p>
						<p>Cọc đã đối seri để riêng với cọc chưa đối.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="band band-ink to-cream" id="phi-thap">
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

	<section class="band band-tint" id="doi-buon">
		<div class="wrap">
			<h2>Quyền lợi khách đổi buôn</h2>
			<p class="lede">Áp cho đơn lấy nguyên thếp. Đơn xé vài cọc tính theo giá trong ngày.</p>
			<div class="perk-grid">
				<article>
					<h3>Gối đầu</h3>
					<p>Chỉ mở cho đại lý đã nhận đủ hàng và đối soát khớp. Hạn mức và ngày tất toán chốt riêng khi gọi, không dùng một hạn mức cho mọi đơn.</p>
				</article>
				<article>
					<h3>Giao kín</h3>
					<p>Thùng không ghi nội dung tiền mặt. Giao đúng giờ đã hẹn. Người nhận phải đúng tên đã đăng ký.</p>
				</article>
				<article>
					<h3>Lỗi đóng bó</h3>
					<p>Thiếu tờ, seri đứt hoặc băng rách có sẵn, phát hiện lúc giao, được đổi bù trước khi ký. Sau khi ký, xử lý theo biên bản.</p>
				</article>
			</div>
		</div>
	</section>

	<section class="band" id="faq">
		<div class="wrap">
			<h2>Câu hỏi thường gặp (FAQ)</h2>
			<p class="lede">Những câu hay gặp trước khi chốt số lượng. Phí trong ngày vẫn do nhân viên đọc khi gọi <?php echo esc_html(doitienle_phone_label()); ?>.</p>

			<h3 class="subhead">Về phí và thanh toán</h3>
			<div class="faq">
				<details>
					<summary>Phí đổi tiền lẻ tính ra sao?</summary>
					<p>Phí tính theo mệnh giá, số lượng cọc/thếp và ngày gọi. Nhân viên đọc phí trước khi chốt đơn. Đã chốt thì không cộng thêm lúc giao — giá giữ nguyên dù thị trường biến động trong ngày.</p>
				</details>
				<details>
					<summary>Phí có thay đổi theo mùa không?</summary>
					<p>Phí giữ ổn định quanh năm. Chỉ tăng nhẹ vào dịp Tết do cầu tăng mạnh và nguồn tiền khan hơn. Khu vực và số lượng cũng ảnh hưởng đến mức phí — gọi hotline để nghe giá cụ thể trong ngày.</p>
				</details>
				<details>
					<summary>Trả trước hay trả khi nhận?</summary>
					<p>Đơn lẻ giao và trả cùng lúc. Đơn sỉ chuyển khoản theo số đã chốt trước khi giao, hoặc trả khi nhận tùy thỏa thuận. Đơn gối đầu (dành cho đại lý) trả theo kỳ đã ký. Không giao nếu người nhận không đúng tên đã đăng ký.</p>
				</details>
				<details>
					<summary>Có xuất hóa đơn đỏ (VAT) không?</summary>
					<p>Đây là giao dịch đổi tiền mặt. Đại lý cần đối soát thì nói rõ lúc gọi để có phiếu ghi số lượng, mệnh giá và phí. Hóa đơn VAT chỉ lập khi giao dịch đủ điều kiện pháp lý và hai bên xác nhận từ đầu — không tự động gắn vào mọi đơn.</p>
				</details>
				<details>
					<summary>Đổi số lượng nhỏ có được không?</summary>
					<p>Có, tối thiểu 1 cọc (100 tờ) cho đơn lẻ. Tuy nhiên đơn nhỏ phí tính trên cọc thường cao hơn đơn sỉ. Gọi để nghe phí cụ thể rồi quyết định — nhân viên không tính thêm sau khi đã chốt.</p>
				</details>
			</div>

			<h3 class="subhead">Về hàng hóa và catalogue</h3>
			<div class="faq">
				<details>
					<summary>Tiền trong catalogue là tiền mới hay tiền đã lưu thông?</summary>
					<p>Toàn bộ catalogue là tiền mới chưa qua lưu thông, giao nguyên cọc niêm phong hoặc nguyên thếp. Tiền cũ, tiền rách, tiền cắt góc không có trong danh mục này và không được nhận đổi.</p>
				</details>
				<details>
					<summary>Một cọc và một thếp có bao nhiêu tờ?</summary>
					<p>Một cọc là 100 tờ, niêm phong bằng băng giấy ghi seri. Một thếp là 10 cọc (1.000 tờ), thường đóng thêm đai ngoài. Đơn sỉ lấy theo thếp. Đơn lẻ có thể lấy theo cọc từ 1 cọc trở lên.</p>
				</details>
				<details>
					<summary>Tiền giao có đúng seri liền không?</summary>
					<p>Có. Mỗi cọc được niêm phong tại nguồn với seri liền từ tờ đầu đến tờ cuối. Seri in trên băng trùng seri tờ đầu. Khách kiểm tra seri trước khi ký nhận — phát hiện sai tại chỗ thì đổi bù ngay.</p>
				</details>
				<details>
					<summary>Mệnh giá nào đang có hàng nhiều nhất?</summary>
					<p>Mệnh giá 10.000đ và 20.000đ thường có hàng ổn định nhất quanh năm vì đây là mệnh giá sỉ nhiều. Mệnh giá 500đ và 1.000đ có vòng quay nhanh hơn, đặt sớm để đảm bảo nguồn. Dịp Tết nên đặt trước 1–2 tuần.</p>
				</details>
				<details>
					<summary>Có thể đặt nhiều mệnh giá trong một đơn không?</summary>
					<p>Được. Ghi danh sách mệnh giá và số lượng cụ thể khi gọi để nhân viên báo tổng phí trong ngày và sắp xếp đóng gói theo đơn. Không cần gọi riêng từng mệnh giá.</p>
				</details>
			</div>

			<h3 class="subhead">Về giao hàng và khu vực</h3>
			<div class="faq">
				<details>
					<summary>Giao sau khi chốt mất bao lâu?</summary>
					<p>Thời gian giao được hẹn cụ thể lúc chốt số lượng và địa chỉ. Nội thành Hà Nội thường giao trong ngày. Tỉnh lân cận và nội thành Sài Gòn hẹn riêng theo chuyến. Gọi để nghe thời gian cụ thể hôm nay.</p>
				</details>
				<details>
					<summary>Khu vực nào được giao tận nơi?</summary>
					<p>Khu vực chính: Hà Nội, Hải Phòng, Thái Nguyên, Vĩnh Phúc, Hưng Yên, Nam Định, Hải Dương. Ngoài Bắc còn có nội thành Sài Gòn. Khách ở tỉnh xa có thể tới lấy tại cơ sở <?php echo esc_html(doitienle_address()); ?>.</p>
				</details>
				<details>
					<summary>Phí giao hàng tính như thế nào?</summary>
					<p>Đơn nội thành Hà Nội có hỗ trợ phí giao. Đơn tỉnh và nội thành Sài Gòn tính theo khoảng cách và số lượng. Phí giao được báo cùng phí đổi tiền khi gọi — không có phụ phí phát sinh sau khi đã chốt.</p>
				</details>
				<details>
					<summary>Khách có thể tới lấy trực tiếp không?</summary>
					<p>Được. Cơ sở tại <?php echo esc_html(doitienle_address()); ?>. Gọi trước để nhân viên chuẩn bị đúng số lượng và mệnh giá, tránh chờ đợi. Giờ mở cửa và tình trạng hàng báo khi gọi.</p>
				</details>
			</div>

			<h3 class="subhead">Về đại lý và đơn sỉ</h3>
			<div class="faq">
				<details>
					<summary>Muốn làm đại lý thì liên hệ thế nào?</summary>
					<p>Gọi <?php echo esc_html(doitienle_phone_label()); ?> và nói muốn mở đại lý. Nhân viên hỏi khu vực, mức nhập dự kiến và tần suất đặt hàng. Hạn mức, phí và điều kiện gối đầu được trao đổi sau khi đã nhận đủ 1–2 đơn thử và đối soát khớp.</p>
				</details>
				<details>
					<summary>Đại lý được hưởng quyền lợi gì?</summary>
					<p>Đại lý nhập nguyên thếp được hưởng phí thấp hơn đơn lẻ, giao kín (thùng không ghi nội dung tiền mặt), hỗ trợ gối đầu (hạn mức riêng), và ưu tiên đặt hàng trước dịp Tết khi nguồn tiền khan.</p>
				</details>
				<details>
					<summary>Có giới hạn số lượng nhập một lần không?</summary>
					<p>Không giới hạn số lượng. Đơn lớn cần thông báo trước để sắp xếp nguồn và lịch giao phù hợp. Gọi trước ít nhất 24 giờ cho đơn lớn hơn 50 thếp.</p>
				</details>
			</div>
		</div>
	</section>

	<section class="band" id="cach-dat">
		<div class="wrap">
			<h2>Cách đặt tiền</h2>
			<div class="info">
				<p>Gọi <?php echo esc_html(doitienle_phone_label()); ?>. Nhân viên nghe số lượng, mệnh giá và báo phí trong ngày.</p>
				<p>Sau khi chốt, tiền được giao tận nơi hoặc khách tới lấy tại <?php echo esc_html(doitienle_address()); ?>.</p>
				<p>Khu vực giao: Hà Nội, Thái Nguyên, Vĩnh Phúc, Hải Phòng, Hưng Yên, Nam Định, Hải Dương và nội thành Sài Gòn.</p>
			</div>
		</div>
	</section>

	<section class="band band-tight to-ink" id="ty-gia" aria-labelledby="tieu-de-ty-gia">
		<div class="wrap">
			<h2 id="tieu-de-ty-gia">Đổi mệnh giá</h2>
			<p class="lede">Từ 500đ đến 500.000đ. Phí đổi trong ngày vẫn do nhân viên báo khi gọi.</p>
			<div class="rate-card" data-rate-widget>
				<label class="rate-field">
					<span>Từ</span>
					<select data-rate-from aria-label="Mệnh giá nguồn"></select>
				</label>
				<label class="rate-field">
					<span>Số tờ</span>
					<input data-rate-amount inputmode="numeric" value="1000" autocomplete="off">
				</label>
				<button class="rate-swap" type="button" data-rate-swap aria-label="Hoán đổi chiều">
					<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 7h11M15 4l3 3-3 3M17 17H6M9 14l-3 3 3 3" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<label class="rate-field">
					<span>Sang</span>
					<select data-rate-to aria-label="Mệnh giá đích"></select>
				</label>
				<p class="rate-result" data-rate-result aria-live="polite">0 tờ</p>
				<p class="rate-meta">Quy đổi số tờ giữa các mệnh giá.</p>
			</div>
		</div>
	</section>

	<section class="band band-ink band-loose to-cream" id="gioi-thieu">
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

	<section class="band band-ink to-cream" id="ly-do">
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

	<section class="band band-loose to-ink" id="phi-on-dinh">
		<div class="wrap">
			<h2>Phí giữ mức thấp quanh năm</h2>
			<div class="info">
				<p>Nhiều cơ sở tăng phí đột ngột khi khan tiền hoặc thiếu người đổi. Bên này giữ phí ổn định, chỉ tăng nhẹ vào Tết vì thị trường biến động.</p>
				<p>Khách chọn gọi vì mức phí thấp. Muốn biết phí hôm nay, gọi hotline để nhân viên báo theo ngày. Khu vực chính là miền Bắc. Miền Nam giao trong nội thành Sài Gòn.</p>
			</div>
		</div>
	</section>

	<section class="band band-ink to-cream" id="doi-tuong">
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

	<section class="band band-tight to-ink" id="khu-vuc">
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

	<section class="band band-ink band-loose to-ink" id="tin-tuc">
		<div class="wrap">
			<h2>Tin tức mới</h2>
			<?php
			$news = new WP_Query(array(
				'posts_per_page' => 3,
				'ignore_sticky_posts' => true,
				'no_found_rows' => true,
			));
			get_template_part('template-parts/news', 'list', array(
				'query' => $news,
				'layout' => 'rail',
				'fallback' => 'link',
			));
			?>
		</div>
	</section>
</main>
