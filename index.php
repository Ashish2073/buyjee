<?php include 'includes/upper-header.php'; ?>
<?php
/*if("00" == "11"){*/
?>
<?php
//echo $_GET['datatbid'];
if(isset($_GET['datatbid'])){
    $get_page_name = $_GET['datatbid'];

    $page_name_check = page_name_checking($get_page_name);
    require_once($page_name_check);

}else{
    require_once('h-page-tb.php');
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
?>
<?php
/*}else{*/
?>
<!-- <style type="text/css">
    .logosection {
        width: 35%;
        overflow: auto;
        margin: auto;
        padding: 80px 0px;
    }
    .logosection p.texte {
        font-size: 20px;
        padding: 21px 0px 0px 0px;
    }
</style>
<div class="logosection">
    <img src="https://www.gallerylala.com/images/878285545.png" class="img-responsive">
    <p class="texte">Our website is currently under construction and should be ready to shop on tomorrow.</p>
    <p class="thnk">Thank You</p>
</div> -->
<!--footer Area-->
<?php include 'includes/footer.php'; ?>
<!--End Here footer Area-->
<script type="text/javascript">
/*$(document).ready(function(){
    $("body").delegate(".adtoCartSingle", "click", function(event){
    event.preventDefault();
    var p_id = $(this).attr('pid');
    if($("#pdqunity").val()){
        var p_quntiy = $("#pdqunity").val();
        //alert(p_quntiy);
    }else{
        var p_quntiy = "1";
        //alert(p_quntiy);
    }
    $.ajax({
        url : "<?php echo $url; ?>/action/",
        method : "POST",
        data : {adtoCartSingle:1, proId:p_id, quityval:p_quntiy},
        success : function(data){
            console.log(data);
            //alert(data);
            if(data == 0){
                alert("Successfully added to cart");
                window.location.reload();
            }else if(data == 1){
                /*alert("Already added in cart.");*/
    //             window.location.reload();
    //         }
    //       }
    //   });
    // });
//});*/
</script>
<?php //} ?>