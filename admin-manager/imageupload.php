<?php

include('../dis-setting/config-settings/config.php');

include('../dis-setting/config-settings/functions-board.php');



date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

$date = date('Y-m-d');

$time = date('H:i:s');

$full_path = realpath(dirname(__FILE__));

$explode_file_path = explode('/dis-setting', $full_path);

$file_path = $explode_file_path[0];
$floder_path_name = $file_path."/images";
?>
<?php
$uplode_images_data = images_upload('mediafile');
/*move_uploaded_file($_FILES['mediafile']['tmp_name'], "$floder_path_name/$uplode_images_data");
GLLImageInsertDataDl($uplode_images_data);*/
echo $uplode_images_data;
?>