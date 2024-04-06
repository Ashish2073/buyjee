<?php
if(isset($_GET['pagename']) && isset($_GET['pagename']) && isset($_GET['pagename'])){
  include_once("template/edit-product.php");
}else{
  include_once("template/add-new-product.php");
}
?>