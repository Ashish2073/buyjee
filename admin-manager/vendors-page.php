<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
if(isset($_GET['action'])){
	if($_GET['action'] == "edit"){
		include_once('template/edit-vendor.php');
	}elseif($_GET['action'] == "request"){
		include_once('template/request-vendor.php');
	}
}
?>
<?php

include_once('admin_dist/includes/footer.php');

?>