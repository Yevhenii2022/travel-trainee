<?php function editLoginPage()
// Add actually link in background-image: url
{ ?>

    <?php
    $upload_dir = wp_get_upload_dir();
    $attachment_url = $upload_dir['baseurl'] . '/2024/03/logo.svg';
    ?>

    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo esc_url($attachment_url); ?>);
            display: block;
            width: 272px;
            height: 92px;
            background-size: auto;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'editLoginPage');
