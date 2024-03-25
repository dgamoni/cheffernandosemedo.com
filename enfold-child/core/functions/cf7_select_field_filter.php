<?php
function wpcf7_form_tag_modfunc($tag)
{
    if ($tag['basetype'] != 'select') {
        return $tag;
    }

    $values = [];
    $labels = [];
    foreach ($tag['raw_values'] as $raw_value) {
        $raw_value_parts = explode('|', $raw_value);
        if ($raw_value_parts >= 2) {
            $values[] = $raw_value_parts[1];
            $labels[] = $raw_value_parts[0];
        } else {
            $values[] = $raw_value;
            $labels[] = $raw_value;
        }
    }
    $tag['values'] = $values;
    $tag['labels'] = $labels;

    $reversed_raw_values = array_map(function ($raw_value) {
        $raw_value_parts = explode('|', $raw_value);
        return implode('|', array_reverse($raw_value_parts));
    }, $tag['raw_values']);
    $tag['pipes'] = new \WPCF7_Pipes($reversed_raw_values);

    return $tag;
}
add_filter('wpcf7_form_tag', 'wpcf7_form_tag_modfunc', 10); 