<?php

define('PS', PATH_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
define('PHP_PATH', get_include_path());
define('APP_PATH', __DIR__.DS.'App'.DS);
define('CORE_PATH',  __DIR__.DS.'Core'.DS);
define('ABS_PATH', __DIR__ . DS);
define('VIEWS_PATH',  APP_PATH . 'Views' . DS );
define('IMAGES_PATH', 'public/images/');
define('ADMIN_CSS',  'public/css/admin/');
define('ADMIN_JS',  'public/js/admin/');
define('SITE_CSS',  'public/css/site/');
define('SITE_JS',  'public/js/site/');
define('ADMIN_TEMPLATE_PATH', 'public' . DS . 'template' . DS . 'admin' . DS);
define('SITE_TEMPLATE_PATH', 'public' . DS . 'template' . DS . 'site' . DS);
set_include_path(PHP_PATH.PS.APP_PATH.PS.CORE_PATH);


// Database information

define('HOST', 'localhost');
define('DB_NAME', 'manage');
define('DB_USER', 'root');
define('DB_PASS', '');