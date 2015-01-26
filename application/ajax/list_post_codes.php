<?php

// Change base dir to the root of the application
chdir('../../');

// Load application config (error reporting, database credentials etc.)
require 'application/config/config.php';

// The auto-loader to load the php-login related internal stuff automatically
require 'application/config/autoload.php';

// Create controller that can load post codes
//require LIBS_PATH . 'Controller.php';

require CONTROLLER_PATH . 'post_code' . '.php';

$post_code_controller = new Post_Code;

$cities = array();
$results = $post_code_controller->loadSimilarPostCodes($_GET['q']);
foreach($results as $result) {
	$cities[] = $result->post_code . ' ' . $result->city;
}
echo $_GET['callback'].'('.json_encode($cities).')';
?>