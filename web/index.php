<?php

// comment out the following two lines when deployed to production
<<<<<<< HEAD
defined('YII_DEBUG') or define('YII_DEBUG', true);
=======
defined('YII_DEBUG') or define('YII_DEBUG',true);
>>>>>>> 6fb16fe4463ab1ba71dddb0e96f35a85b3ff682c
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
