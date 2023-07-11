<?php

add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
