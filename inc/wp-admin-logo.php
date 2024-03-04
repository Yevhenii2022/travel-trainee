<?php function editLoginPage()
// Add actually link in background-image: url
{ ?>

    <style type="text/css">
        #login h1 a {
            background-image: url(https://www.google.com.ua/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png);
            display: block;
            width: 272px;
            height: 92px;
            background-size: auto;
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'editLoginPage');