<?php
$GLOBALS['timeIni'] = microtime(true);
session_name('proyectoPorcicolaSainera');
session_start();
ob_start();
include_once __DIR__ . '/../libs/vendor/autoLoadClass.php';
mvc\autoload\autoLoadClass::getInstance()->autoLoad();
mvc\dispatch\dispatchClass::getInstance()->main();