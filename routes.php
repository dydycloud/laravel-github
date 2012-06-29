<?php
require_once __DIR__. '/config/config.php';

//Parameter 1: repo
//Parameter 2: path to file eg: public-css-style.css
Route::get('(:bundle)/get/(.*)/(.*)', 'github::repo@get');
