<?php
function rmn_custom_mime_types($mimes_types)
{
    $mimes_types['webp'] = 'image/webp';
    $mimes_types['svg'] = 'image/svg+xml';

    return $mimes_types;
}
add_filter('upload_mimes', 'rmn_custom_mime_types');
