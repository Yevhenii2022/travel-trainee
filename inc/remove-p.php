<?php
// Remove emty <p> in editor

add_filter('wpcf7_autop_or_not', '__return_false');