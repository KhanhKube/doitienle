<?php if (!defined('ABSPATH')) { exit; } ?>
<aside class="sidebar">
	<div class="side-card side-hotline">
		<p>Gọi là có, giao tận nơi, phục vụ 24/7</p>
		<a href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_phone_label()); ?></a>
		<p><?php echo esc_html(doitienle_address()); ?></p>
	</div>
	<div class="side-card">
		<h2 class="side-title">Mệnh giá đang đổi</h2>
		<ul class="check-list">
			<li>Đổi tiền 500đ</li>
			<li>Đổi tiền 1.000đ</li>
			<li>Đổi tiền 2.000đ</li>
			<li>Đổi tiền 5.000đ</li>
			<li>Đổi tiền 10.000đ</li>
			<li>Đổi tiền 20.000đ</li>
			<li>Đổi tiền 50.000đ</li>
		</ul>
	</div>
	<div class="side-card">
		<h2 class="side-title">Bài viết mới</h2>
		<ul class="side-list">
			<?php
			$recent = new WP_Query(array('posts_per_page' => 5, 'ignore_sticky_posts' => true));
			while ($recent->have_posts()) :
				$recent->the_post();
				?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('thumbnail'); ?>
						<?php else : ?>
							<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/doi-tien-le.jpg'); ?>" alt="">
						<?php endif; ?>
						<span><?php the_title(); ?></span>
					</a>
				</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</aside>
