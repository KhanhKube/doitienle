<?php
if (!defined('ABSPATH')) {
    exit;
}

$query = (isset($args['query']) && $args['query'] instanceof WP_Query) ? $args['query'] : $GLOBALS['wp_query'];
$layout = isset($args['layout']) ? $args['layout'] : 'stack';
$fallback = isset($args['fallback']) ? $args['fallback'] : '';
$items = array();

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
        $items[] = array(
            'title' => get_the_title(),
            'url' => get_permalink(),
            'image' => $image ? $image : doitienle_img('hero'),
            'excerpt' => get_the_excerpt(),
            'date' => get_the_date(),
            'datetime' => get_the_date('c'),
        );
    }
    wp_reset_postdata();
} elseif ($fallback) {
    foreach (doitienle_sample_news() as $sample) {
        $sample['url'] = ($fallback === 'link') ? doitienle_news_url() : '';
        $sample['date'] = '';
        $sample['datetime'] = '';
        $items[] = $sample;
    }
}

if (!$items) {
    echo '<p class="empty">Chưa có tin mới. Gọi ' . esc_html(doitienle_phone_label()) . ' để hỏi phí hôm nay.</p>';
    return;
}

echo '<div class="' . esc_attr($layout === 'rail' ? 'rail' : 'news-stack') . '">';
$index = 0;
foreach ($items as $item) {
    $index++;
    $variant = 'story';
    if ($layout !== 'rail' && $index === 1) {
        $variant .= ' story-lead';
    } elseif ($layout !== 'rail') {
        $variant .= ' story-row';
    }
    echo '<article class="' . esc_attr($variant) . ' rise">';
    if (!empty($item['url'])) {
        echo '<a class="story-hit" href="' . esc_url($item['url']) . '">';
    } else {
        echo '<div class="story-hit">';
    }
    echo '<img src="' . esc_url($item['image']) . '" alt="' . esc_attr($item['title']) . '"' . ($index > 1 ? ' loading="lazy"' : '') . '>';
    echo '<div>';
    echo '<h3>' . esc_html($item['title']) . '</h3>';
    if (!empty($item['date'])) {
        echo '<time datetime="' . esc_attr($item['datetime']) . '">' . esc_html($item['date']) . '</time>';
    }
    if ($layout === 'stack' && !empty($item['body']) && is_array($item['body'])) {
        echo '<div class="story-copy">';
        foreach ($item['body'] as $para) {
            echo '<p>' . esc_html($para) . '</p>';
        }
        echo '</div>';
    } elseif (!empty($item['excerpt'])) {
        echo '<p class="clamp">' . esc_html($item['excerpt']) . '</p>';
    }
    echo '</div>';
    echo !empty($item['url']) ? '</a>' : '</div>';
    echo '</article>';
}
echo '</div>';

if ($layout === 'stack' && $query->max_num_pages > 1) {
    $links = paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, (int) get_query_var('paged'), (int) get_query_var('page')),
        'type' => 'plain',
    ));
    if ($links) {
        echo '<nav class="pager" aria-label="Phân trang">' . wp_kses_post($links) . '</nav>';
    }
}
