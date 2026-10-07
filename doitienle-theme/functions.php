<?php
if (!defined('ABSPATH')) {
    exit;
}

function doitienle_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array(
        'height' => 96,
        'width' => 420,
        'flex-height' => true,
        'flex-width' => true,
    ));
    register_nav_menus(array(
        'primary' => 'Menu chính',
    ));
}
add_action('after_setup_theme', 'doitienle_setup');

function doitienle_assets() {
    wp_enqueue_style(
        'doitienle-font',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@600;700;800&family=Source+Sans+3:wght@400;600;700&display=swap',
        array(),
        null
    );
    wp_enqueue_style('doitienle-main', get_template_directory_uri() . '/assets/css/main.css', array('doitienle-font'), '2.6.0');
    wp_enqueue_script('doitienle-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), '2.1.1', true);
    wp_enqueue_script('doitienle-rates-mock', get_template_directory_uri() . '/assets/js/rates-mock.js', array(), '2.4.0', true);
    wp_enqueue_script('doitienle-rates', get_template_directory_uri() . '/assets/js/rates.js', array('doitienle-rates-mock'), '2.4.0', true);
}
add_action('wp_enqueue_scripts', 'doitienle_assets');

function doitienle_favicon() {
    if (function_exists('has_site_icon') && has_site_icon()) {
        return;
    }
    echo '<link rel="icon" href="' . esc_url(doitienle_img('icon')) . '">' . "\n";
}
add_action('wp_head', 'doitienle_favicon', 5);

function doitienle_phone() {
    return '0858045555';
}

function doitienle_phone_label() {
    return '085.804.5555';
}

function doitienle_address() {
    return '83 Nguyễn Khang, Cầu Giấy, Hà Nội';
}

function doitienle_img($key) {
    $map = array(
        'banner' => 'https://doitienle.com/wp-content/uploads/banner.png',
        'hero' => 'https://doitienle.com/wp-content/uploads/doi-tien-le.jpg',
        'mark' => 'https://doitienlehanoi.com/wp-content/uploads/tt.jpg',
        'note' => 'https://doitienle.com/wp-content/uploads/1.jpg',
        'tet' => 'https://doitienle.com/wp-content/uploads/1231321-1024x756.png',
        'bundle' => 'https://doitienle.com/wp-content/uploads/471497846_122205551258080823_4124625874548649458_n.jpg',
        'icon' => 'https://doitienle.com/wp-content/uploads/cropped-doitienletaihaiphong-32x32.jpg',
        'iconlg' => 'https://doitienle.com/wp-content/uploads/cropped-doitienletaihaiphong-192x192.jpg',
    );
    return isset($map[$key]) ? $map[$key] : $map['hero'];
}

function doitienle_denoms() {
    return array('500đ', '1.000đ', '2.000đ', '5.000đ', '10.000đ', '20.000đ');
}

function doitienle_areas() {
    return array('Hà Nội', 'Hải Phòng', 'Nội thành Sài Gòn', 'Thái Nguyên', 'Vĩnh Phúc', 'Hưng Yên', 'Nam Định', 'Hải Dương');
}

function doitienle_services_url() {
    $page = get_page_by_path('dich-vu');
    return $page ? get_permalink($page) : home_url('/dich-vu/');
}

function doitienle_news_url() {
    $page = get_page_by_path('tin-tuc');
    if ($page) {
        return get_permalink($page);
    }
    $posts = (int) get_option('page_for_posts');
    if ($posts) {
        return get_permalink($posts);
    }
    return home_url('/tin-tuc/');
}

function doitienle_menu_items() {
    return array(
        array(
            'label' => 'Trang chủ',
            'url' => home_url('/'),
            'current' => is_front_page(),
        ),
        array(
            'label' => 'Đổi tiền lẻ',
            'url' => doitienle_services_url(),
            'current' => is_page('dich-vu'),
        ),
        array(
            'label' => 'Tin tức',
            'url' => doitienle_news_url(),
            'current' => is_page('tin-tuc') || (is_home() && !is_front_page()) || is_singular('post') || is_category() || is_tag() || is_date(),
        ),
    );
}

function doitienle_sample_news() {
    return array(
        array(
            'title' => 'Dịch vụ đổi tiền lẻ, tiền mới tại Hà Nội',
            'image' => doitienle_img('note'),
            'excerpt' => 'Phí thấp, giao tận nơi, nhận số lượng lớn. Tiền nguyên cọc, seri liền.',
            'body' => array(
                'Phí thấp, giao tận nơi và nhận số lượng lớn. Tiền giao nguyên cọc, nguyên thếp, seri liền.',
                'Địa chỉ giao dịch: 83 Nguyễn Khang, Cầu Giấy, Hà Nội. Gọi 085.804.5555 để nhân viên báo phí trong ngày.',
                'Phục vụ hộ kinh doanh, người đi lễ và khách cần tiền mới gấp. Khu vực chính là miền Bắc.',
            ),
        ),
        array(
            'title' => 'Đổi tiền lẻ mới Tết 2027',
            'image' => doitienle_img('tet'),
            'excerpt' => 'Nhu cầu tiền mặt tăng khi Tết đến gần. Gọi để nghe phí trong ngày.',
            'body' => array(
                'Nhu cầu tiền mặt tăng khi Tết đến gần. Nhiều nhà cần tiền mới để lì xì và để thối tại cửa hàng.',
                'Phí có thể nhích nhẹ dịp Tết vì thị trường biến động, nhưng vẫn giữ mức thấp, không tăng đột ngột.',
                'Gọi trước để chốt số lượng và phí trong ngày. Giao tận nơi tại Hà Nội và các tỉnh lân cận.',
            ),
        ),
        array(
            'title' => 'Dịch vụ đổi tiền lẻ Tết 2027',
            'image' => doitienle_img('bundle'),
            'excerpt' => 'Tiền mới dùng lì xì. Nguyên thếp, giao trong nội thành.',
            'body' => array(
                'Tiền mới dùng lì xì, giao nguyên thếp và seri liền. Không giới hạn số lượng.',
                'Có cơ sở tại Hà Nội, Hải Phòng và nội thành Sài Gòn. Nhân viên trực máy suốt ngày.',
                'Hotline 085.804.5555. Phục vụ 24/7, gọi là có, chuyển tận nơi.',
            ),
        ),
    );
}

function doitienle_call_label() {
    return 'Gọi ' . doitienle_phone_label();
}

function doitienle_ensure_pages() {
    if (get_option('doitienle_ia_v2')) {
        return;
    }
    $pages = array(
        'dich-vu' => array('Dịch vụ', 'template-dich-vu.php'),
        'tin-tuc' => array('Tin tức', 'template-tin-tuc.php'),
    );
    foreach ($pages as $slug => $spec) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $id = wp_insert_post(array(
                'post_title' => $spec[0],
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => '',
            ));
        } else {
            $id = $page->ID;
        }
        if ($id && !is_wp_error($id)) {
            update_post_meta($id, '_wp_page_template', $spec[1]);
        }
    }
    update_option('doitienle_ia_v2', 1);
}
add_action('init', 'doitienle_ensure_pages');

function doitienle_clean_content($content) {
    $content = preg_replace('/\[contact-form-7[^\]]*\]/i', '', $content);
    $content = preg_replace('/<form\b[^>]*>.*?<\/form>/is', '', $content);
    $content = preg_replace('/<iframe\b[^>]*>.*?<\/iframe>/is', '', $content);
    return $content;
}
add_filter('the_content', 'doitienle_clean_content', 8);

function doitienle_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'doitienle_excerpt_length', 999);

function doitienle_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'doitienle_excerpt_more');

add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);

function doitienle_body_class($classes) {
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }
    return $classes;
}
add_filter('body_class', 'doitienle_body_class');
