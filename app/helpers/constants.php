<?php

define('VIEW_PATH', '../app/views/');

// validate
define('REQUIRED', 'ValidateRequired');
define('EMAIL', 'ValidateEmail');
define('MAXLEN', 'ValidateMaxLen');
define('ONLYNUMBER', 'ValidateOnlyNumber');

// config
define('ROOT', dirname(__FILE__, 3));
define('CONTROLLER_PATH', 'app/controllers/');
define('CONTROLLER_DEFAULT', 'Home');
define('CONTROLLER_FOLDER_DEFAULT', 'site');

// upload de arquivos
define('IMAGES', $_SERVER['DOCUMENT_ROOT'] .'/app/files/images/');
define('DOCS', $_SERVER['DOCUMENT_ROOT'] .'/app/files/mixed_up/');