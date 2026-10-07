<?php
if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#noi-dung">Đến nội dung</a>
<div class="glow" aria-hidden="true"></div>
<div class="top-info">
	<div class="wrap">
		<span>Chào mừng bạn đến với Đổi tiền lẻ tại Hà Nội</span>
		<span><?php echo esc_html(doitienle_address()); ?> | Hotline <?php echo esc_html(doitienle_phone_label()); ?></span>
	</div>
</div>
<header class="site-head">
	<div class="head-inner wrap">
		<?php if (has_custom_logo()) : ?>
			<div class="logo"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo esc_url(doitienle_img('iconlg')); ?>" width="40" height="40" alt="Đổi tiền lẻ">
				<span aria-hidden="true">Đổi tiền lẻ</span>
			</a>
		<?php endif; ?>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-chinh">Mục</button>
		<ul id="menu-chinh" class="menu">
			<?php foreach (doitienle_menu_items() as $item) : ?>
				<li>
					<a href="<?php echo esc_url($item['url']); ?>"<?php echo $item['current'] ? ' aria-current="page"' : ''; ?>>
						<?php echo esc_html($item['label']); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<a class="btn head-call" href="tel:<?php echo esc_attr(doitienle_phone()); ?>"><?php echo esc_html(doitienle_call_label()); ?></a>
	</div>
</header>
