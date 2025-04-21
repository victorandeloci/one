<?php
require_once(__DIR__ . '/../../../../wp-load.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

set_time_limit(600);

define('STRIKE_LIST_PATH', __DIR__ . '/ps_episodes_strike.txt');
define('EPISODE_DIR', WP_CONTENT_DIR . '/podcast_episodes');

function normalize_text($text) {
    $text = mb_strtolower($text, 'UTF-8');
    $text = str_replace(['–', '—', '-', '–'], '', $text); // remove hyphens
    $text = preg_replace('/[^a-z0-9 ]/', '', $text);       // keep letters, numbers, and spaces
    $text = preg_replace('/\s+/', ' ', $text);             // normalize spaces
    return trim($text);
}

function find_matching_post_id($title) {
    $normalized_title = normalize_text($title);
    $slug = sanitize_title($title);

    // Generate title variations
    $words = explode(' ', $normalized_title);
    $first_4_words = implode(' ', array_slice($words, 0, 4));
    $last_4_words  = implode(' ', array_slice($words, -4));

    $search_variants = [
        $normalized_title,
        $first_4_words,
        $last_4_words
    ];

    foreach ($search_variants as $variant) {
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 10,
            's' => $variant,
            'post_status' => 'publish',
            'category_name' => 'podcast'
        ]);

        if ($query->have_posts()) {
            foreach ($query->posts as $post) {
                $post_title_normalized = normalize_text($post->post_title);
                if ($post_title_normalized === $normalized_title) {
                    return $post->ID;
                }
            }
        }
    }

    // Final attempt using slug
    $slug_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 1,
        'name' => $slug,
        'post_status' => 'publish',
        'category_name' => 'podcast'
    ]);

    if ($slug_query->have_posts()) {
        return $slug_query->posts[0]->ID;
    }

    return null;
}

$titles = file(STRIKE_LIST_PATH, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if (!$titles) {
    echo "❌ Title list is empty or invalid.<br>";
    return;
}

if (!file_exists(EPISODE_DIR)) {
    mkdir(EPISODE_DIR, 0755, true);
}

foreach ($titles as $original_title) {
    $normalized = normalize_text($original_title);
    $post_id = find_matching_post_id($original_title);

    if (!$post_id) {
        echo "❌ Not found: $original_title ($normalized)<br>";
        continue;
    }

    $post = get_post($post_id);

    // Use the first available MP3
    $old_url = get_post_meta($post_id, 'episode_mp3_url', true);
    if (!$old_url) {
        $old_url = get_post_meta($post_id, 'anchor_mp3_url', true);
    }

    if (!$old_url) {
        echo "⚠️ No MP3 found for post: $original_title<br>";
        continue;
    }

    // Skip if already hosted locally
    if (strpos($old_url, 'playerselect.com.br') !== false) {
        echo "⏩ Already hosted locally, skipping: $original_title<br>";
        continue;
    }

    $filename = $post->post_name . '.mp3';
    $new_path = EPISODE_DIR . '/' . $filename;
    $new_url  = content_url('podcast_episodes/' . $filename);

    $downloaded = file_put_contents($new_path, fopen($old_url, 'r'));
    if (!$downloaded || !file_exists($new_path) || filesize($new_path) < 1024) {
        echo "❌ Failed to download: $original_title<br>";
        @unlink($new_path);
        continue;
    }

    update_post_meta($post_id, 'episode_mp3_url_backup', $old_url);
    update_post_meta($post_id, 'episode_mp3_url', $new_url);

    echo "✅ Updated: $original_title<br>";
}

echo "<br>🚀 Process completed.<br>";
