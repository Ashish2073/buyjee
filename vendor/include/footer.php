 <footer class="footer text-center">

                 &copy; 2022-<?php echo date('Y'); ?> Sarvodaya infotech. All Rights Reserved.

            </footer>

            <!-- ============================================================== -->

            <!-- End footer -->

            <!-- ============================================================== -->

        </div>

        <!-- ============================================================== -->

        <!-- End Page wrapper  -->

        <!-- ============================================================== -->

    </div>

    <!-- ============================================================== -->

    <!-- End Wrapper -->

    <!-- ============================================================== -->

    <!-- ============================================================== -->

    <!-- All Jquery -->

    <!-- ============================================================== -->

    <script src="<?php echo $url; ?>/assets/libs/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->

    <script src="<?php echo $url; ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>

    <script src="<?php echo $url; ?>/assets/extra-libs/sparkline/sparkline.js"></script>

    <!--Wave Effects -->

    <script src="<?php echo $url; ?>/dist/js/waves.js"></script>

    <!--Menu sidebar -->

    <script src="<?php echo $url; ?>/dist/js/sidebarmenu.js"></script>

    <!--Custom JavaScript -->

    <script src="<?php echo $url; ?>/dist/js/custom.min.js"></script>

    <!--This page JavaScript -->

    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->

    <!-- Charts js Files -->

    <script src="<?php echo $url; ?>/assets/libs/flot/excanvas.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot/jquery.flot.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot/jquery.flot.pie.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot/jquery.flot.time.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot/jquery.flot.stack.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>

    <script src="<?php echo $url; ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

    <script src="<?php echo $url; ?>/dist/js/pages/chart/chart-page-init.js"></script>
<script src="https://buyjee.com/admin-manager/admin_dist/includes/plugins/select2/js/select2.full.min.js"></script>
    <!-- Data Table --> 
<script src="<?php echo $url; ?>/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script> 
<!-------> 
<script src="https://buyjee.com/admin-manager/admin_dist/includes/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?php echo $url; ?>/assets/js/tableToExcel.js"></script>
<script>
    function singlfileprivewildone(){
    var fileInput = document.getElementById('multisinlpvone');
    var filesize = document.getElementById('multisinlpvone').files[0];
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else if(filesize.size > 1048576){
        alert('Please upload less then 1MB');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('singleimagepvone').innerHTML = '<img src="'+e.target.result+'" class="img-responsive"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function singlfileprivewiltwo(){
    var fileInput = document.getElementById('multisinlpvtwo');
    var filesize = document.getElementById('multisinlpvtwo').files[0];
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else if(filesize.size > 1048576){
        alert('Please upload less then 1MB');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('singleimagepvtwo').innerHTML = '<img src="'+e.target.result+'" class="img-responsive"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
function singlfileValidation(){
    var fileInput = document.getElementById('singleimage');
    var filesize = document.getElementById('singleimage').files[0];
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else if(filesize.size > 1048576){
        alert('Please upload less then 1MB');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('singleimageview').innerHTML = '<img src="'+e.target.result+'" class="img-responsive"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var gentratid = 1;
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-responsive set-mutli-img">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    $(".inputmultiimages").val($.trim(filesAmount));
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('.mutliimages').on('change', function() {
        imagesPreview(this, '#multiimagesview');
    });
});
$("#saveattbut").click(function(){
      var favorite = [];
      var selctionpart = $(".mutliselctoption").select2();
      $.each($( selctionpart ), function(){
          favorite.push($(this).val());
      });
      //alert(favorite);
      $.ajax({
          type: "POST",
          url: "https://buyjee.com/admin-manager/ajax-data-file.php",
          //dataType: "json",
          data : {save_attbut:1, attbutvalue:favorite},
          success : function(response){
              //alert(response);
              //alert("Attributes saved successfully.");
              /*window.location.href='<?php echo $url; ?>/cart';*/
              $("#loadvariations").load(" #loadvariations");
          }
      });
  });
$("#addattbut").click(function(){
    var get_attbuteval = $("#attbuteval").val();
    var get_page_id = '<?php echo $_GET['pageid']; ?>';
    var get_page_autoid = '<?php echo $_GET['autoid']; ?>';
    //alert(get_attbuteval);
    $.ajax({
        type: "POST",
        url: "https://buyjee.com/admin-manager/ajax-data-file.php", 
        data : {attbutval:1, attbutdata:get_attbuteval, prod_pagid:get_page_id, prod_pageautid:get_page_autoid},
        success : function(response){
            //alert(response);
            $("#lodvalue").load(" #lodvalue");
            //$("#lodvalue").load(" #lodvalue");
            /*$('#lodvalue').animate({
            scrollTop: $("#lodvalue").offset().top - 60}, 'slow');*/
            /*window.location.href='<?php echo $url; ?>/cart';*/
        }        
    });
});
$(".saveatbutvert").click(function(){
    var vertname = [];
    $.each(document.getElementsByName('getattbut[]'), function(){
        vertname.push($(this).val());
    });
    if(vertname == ""){
        alert('Select Variations.');
    }else{
    var regularpice = $(".regpricever").val();
    var salepicechking = $(".salepricever").val();
    if(regularpice < salepicechking){
        alert("Sales price cannot be greater than regular price.");
    }else{
    if(salepicechking == ""){
        var salepice = "0";
    }else{
        var salepice = $(".salepricever").val();
    }
    var quanity = $(".quantyver").val();
    var lowstock = $(".lowstockvale").val();
    var seccionid = "<?php echo $_GET['autoid']; ?>";
    var prodval = "new";
    $.ajax({
        type: "POST",
        url: "https://buyjee.com/admin-manager/ajax-data-file.php",
        //dataType: "json",
        data : {versave:1, selection:vertname, reglarprice:regularpice, saleprice:salepice, quntyval:quanity, lowstockvale:lowstock, productchk:prodval, sessionautis:seccionid},
        success : function(response){
            //alert(response);
            $("#loadvariations").load(" #loadvariations");
            $("#loadtableabut").load(" #loadtableabut");
            $("#alertvertion").html(response);
        }
    });
    }
    }
});
function deletdataval(vertionid_delect){
    //alert(vertionid);
     var deltenchk = "new";
     var getautoid = "<?php echo $_GET['autoid']; ?>";
    $.ajax({
        type: "POST",
        url: "https://buyjee.com/admin-manager/ajax-data-file.php",
        //dataType: "json",
        data : {delettrem:1, verindiddelt:vertionid_delect, chkvaldelt:deltenchk, getautoidval:getautoid},
        success : function(response){
            //alert(response);
            $("#loadvariations").load(" #loadvariations");
            $("#loadtableabut").load(" #loadtableabut");
            $("#alertvertion").text(response);
        }        
    });
}
$("#vertionupdate").click(function(e){
    event.preventDefault();
    var vertname_udate = [];
    $.each(document.getElementsByName('getattbutedit[]'), function(){
        vertname_udate.push($(this).val());
    });
    var vertinid_udate = $("#vertinid").val();
    var regularpice_udate = $(".updateregul").val();
    var salepice_udate = $(".upatesale").val();
    var quanity_udate = $(".updatequant").val();
    var lowstock_udate = $(".updatelowstok").val();
    var productvale = "new";
    var setion_getval = "<?php echo $_GET['autoid']; ?>";
    //alert(regularpice_udate);
    $.ajax({
        type: "POST",
        url: "https://buyjee.com/admin-manager/ajax-data-file.php",
        //dataType: "json",
        data : {updatevertion:1, selection:vertname_udate, reglarprice:regularpice_udate, saleprice:salepice_udate, quntyval:quanity_udate, lowstockupdate:lowstock_udate, verttrenid:vertinid_udate, editvale:productvale, sessiongetid:setion_getval},
        success : function(response){
            //alert(response);
            $("#loadvariations").load(" #loadvariations");
            $("#loadtableabut").load(" #loadtableabut");
            $("#alertvertion").text(response);
            document.getElementById("clickclose").click();
            $('#exampleModal').modal('hide');
            //$('#relodvertionbox').load(" #relodvertionbox");
        }
    });
});
</script>
</body>
</html>