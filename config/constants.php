<?php

/**
 * debug tools
 */
define ( 'REQUEST_MICROTIME', microtime ( true ) );

/**
 * pagination
 */
define ( 'PAGE_LIST_COUNT', 15 );
define ( 'PAGE_LIST_RANGE', 2 );

define ('LANGUAGES', json_encode(array(
    'vi' => 'Tiếng Việt',
    'en' => 'Tiếng Anh'
)));


define ('CATEGORY_IDS_SHOW_HOME', json_encode(array(
    5,
    10,
    14,
    1,
    17,
    19,
)));

define ('IMAGE_ARTICLE_FOLDER', '/upload/images/articles');
define('IMAGE_BANNER_FOLDER', '/upload/images/banners');
define('IMAGE_CATEGORY_FOLDER', '/upload/images/categories');

define ('ARTICLE_ID_MY_FTEL', 7);
define ('ARTICLE_ID_MY_WRITE', 18);
define ('ARTICLE_ID_RECURUITMENT', 27);
define ('LIMIT_DEFAULT', 5);