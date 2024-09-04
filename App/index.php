<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/web/routes.php';

header('Location: /src/web/views/index.php');
header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

exit;
