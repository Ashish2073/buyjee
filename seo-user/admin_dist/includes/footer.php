<?php
	include_once('popup-main.php');
	include_once('form-action.php');
?>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="https://www.magicbytesolutions.com/">Magic Byte Solutions</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/dist/js/adminlte.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/dist/js/demo.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/dist/js/adminlte.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/dist/js/domenu.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/script.main.js"></script>
<script src="<?php echo $url; ?>/seo-user/admin_dist/includes/table2excel.js" type="text/javascript"></script>
<!-- <script src="<?php //echo $url; ?>/seo-user/admin_dist/strip-disk.js"></script> -->
<script type="text/javascript">
$("body").delegate(".deletebtn", "click", function(){
  var seturl = $(this).data('id');
  $("#deleteurl").attr("href", seturl);
});
$(document).ready(function() {
    $("#fupForm").click(function() {
        var fd = new FormData();
        var files = $('#imagefile')[0].files[0];
        fd.append('file', files);
        /*alert(fd);*/
        $.ajax({
            url: '<?php echo $url; ?>/seo-user/ajax-data-file',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              //alert(response);
              //$("#imagefile")[0].reset();
              $("#loaddata").load(" #loaddata");
              $("#secondtab").addClass('active');
              $("#seconddata").addClass('active');
              $("#firstatg").removeClass('active');
              $("#first").removeClass('active');
              $("#firsttab").removeClass('active');
            },
        });
    });
    $('#loaddata .clickactivecl').on('click', function(){
      var get_data_id = $(this).data('id');
      $.ajax({
            url: '<?php echo $url; ?>/seo-user/ajax-data-file',
            type: 'post',
            dataType: 'JSON',
            data: {imgdatset:1, imgvaledat:get_data_id},
            success: function(response){
              var len = response.length;
              for(var i=0; i<len; i++){
                $("#img_nameval").attr("src", "<?php echo $url; ?>/images/" + response[i].imgname);
                $("#ftitle").text(response[i].imgoldnam);
                $("#titleimg").val(response[i].imgtitle);
                $("#aletimg").val(response[i].imgalt);
                $("#catipimg").val(response[i].imgcapt);
                $("#fdate").text(response[i].imgdate + " " + response[i].imgtime);
                $("#deletval").attr("data-id", get_data_id);
              }
            },
        });
    });
    $('#deletval').on('click', function(){
      var get_deleteimg = $(this).data('id');
      var get_deleteid = $("#ftitle").text();
      $.ajax({
            url: '<?php echo $url; ?>/seo-user/ajax-data-file',
            type: 'post',
            dataType: 'JSON',
            data: {deletimgset:1, imgvaledelt:get_deleteimg, imgnamevale:get_deleteid},
            success: function(response){
              $("#loaddata").load(" #loaddata");
              $("#load_demoshow").load(" #load_demoshow");
            },
        });
    });

$("#addattbut").click(function(){
    var get_attbuteval = $("#attbuteval").val();
    var get_page_id = '<?php echo $_GET['pageid']; ?>';
    var get_page_autoid = '<?php echo $_GET['autoid']; ?>';
    //alert(get_attbuteval);
    $.ajax({
        type: "POST",
        url: "<?php echo $url; ?>/seo-user/ajax-data-file.php", 
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
});
</script>
<script type="text/javascript">
  $("#saveattbut").click(function(){
      var favorite = [];
      var selctionpart = $(".mutliselctoption").select2();
      $.each($( selctionpart ), function(){
          favorite.push($(this).val());
      });
      //alert(favorite);
      $.ajax({
          type: "POST",
          url: "<?php echo $url; ?>/seo-user/ajax-data-file.php",
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
        url: "<?php echo $url; ?>/seo-user/ajax-data-file.php",
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
        url: "<?php echo $url; ?>/seo-user/ajax-data-file.php",
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

function deletdataval(vertionid_delect){
    //alert(vertionid);
     var deltenchk = "new";
     var getautoid = "<?php echo $_GET['autoid']; ?>";
    $.ajax({
        type: "POST",
        url: "<?php echo $url; ?>/seo-user/ajax-data-file.php",
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
</script>
<script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $(".tableexportcsv").table2excel({
                    filename: "<?php echo $date; ?>-<?php echo $time; ?>-data.xls"
                });
            });
        });
    </script>
</body>
</html>