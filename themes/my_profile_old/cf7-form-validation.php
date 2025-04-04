<?php 
add_filter('wpcf7_validate_text*', 'strip_html_from_cf7_fields', 10, 2);
add_filter('wpcf7_validate_text', 'strip_html_from_cf7_fields', 10, 2);
add_filter('wpcf7_validate_textarea*', 'strip_html_from_cf7_fields', 10, 2);
add_filter('wpcf7_validate_textarea', 'strip_html_from_cf7_fields', 10, 2);

function strip_html_from_cf7_fields($result, $tag) {
    $name = $tag->name;
    $value = isset($_POST[$name]) ? $_POST[$name] : '';

    // Strip all HTML tags
    $value = wp_strip_all_tags($value);

    // Update POST data with clean value
    $_POST[$name] = $value;

    // Validate if field is required
    if ($tag->is_required() && empty($value)) {
        $result->invalidate($tag, "This field is required.");
    }

    return $result;
}