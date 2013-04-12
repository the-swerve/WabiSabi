
<?php
	require_once(R.'/run.php');
	$current_page = $page_class->find_page($_POST['path']);
	if($current_page) {
		echo inc('templates/'.$current_page['template'].'.php');
	} else {
		echo inc('lib/views/404.php');
	}
?>
