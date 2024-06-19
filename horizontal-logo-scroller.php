<?php
/*
Plugin Name: Horizontal Logo Scroller
Description: A simple plugin to scroll logos horizontally across the page.
Version: 1.0
Author: Your Name
*/

function hls_enqueue_scripts() {
    wp_enqueue_style('hls-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('hls-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'hls_enqueue_scripts');

function hls_logo_scroller_shortcode($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'images' => '',
        ),
        $atts,
        'hls_logo_scroller'
    );

    $images = explode(',', $atts['images']);
    ob_start();
    ?>
    <div class="hls-scrolling-logos">
        <div class="hls-logos-container">
            <?php foreach ($images as $image) : ?>
                <img src="<?php echo esc_url(trim($image)); ?>" alt="Logo">
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hls_logo_scroller', 'hls_logo_scroller_shortcode');
