<?php
require_once __DIR__. '/config/config.php';

//Parameter 1: your repository
//Parameter 2: path to file eg: public-css-style.css
Route::get('(:bundle)/get/(.*)/(.*)', 'github::repo@get');
Route::get('(:bundle)/commits/(.*)/(.*)', 'github::repo@commits');
Route::get('(:bundle)/commits/(.*)', 'github::repo@commits');
Route::get('(:bundle)/repo/(.*)', 'github::repo@repo');