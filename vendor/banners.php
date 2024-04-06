<?php

require_once("session.php");

require_once("include/header.php");

require_once("functions.php");

require_once("include/left_menu.php");

?>



        <!-- ============================================================== -->

        <!-- Page wrapper  -->

        <!-- ============================================================== -->

        <div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

             <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">

                        <h4 class="page-title">Banners</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Banners</li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- Container fluid  -->

            <!-- ============================================================== -->

            <div class="container-fluid">

                <!-- ============================================================== -->

                <!-- Vendo Terms and conditions -->

                <!-- ============================================================== -->

                <div class="row">

                    <!-- column -->

                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Banners list 
                                <?php if($banner_hide == "no"){}elseif($banner_hide == "yes"){?>
                                    <!--<button type="button" class="btn btn-cyan pull-right" data-toggle="modal" data-target="#myModal">Add Banner</button></h4>-->
                                <?php } ?>

                            </div>

                            

                            <!-- The Modal -->

                            <div class="modal" id="myModal">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <!-- Modal Header -->

                                        <div class="modal-header">

                                            <h4 class="modal-title">Upload Banner file</h4>

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>

                                        <form action="" method="post" enctype="multipart/form-data" id="banner_uploadForm">

                                            <!-- Modal body -->

                                            <div class="modal-body">

                                                <div class="custom-file mb-3">

                                                    <input type="file" class="custom-file-input" name="bannerFileName" id="bannerFile" accept="image/*" onchange="return bannerValidation()">

                                                    <label class="custom-file-label" for="customFile">Choose file</label>

                                                </div>

                                            </div>

                                            <!-- Modal footer -->

                                            <div class="modal-footer" style="border-top: none;">

                                                <input type="hidden" name="bnr_upload" value="banner_upload">

                                                <input type="hidden" name="vendorId" value="<?php echo $_SESSION['vendorsessionlogin']; ?>">

                                                <button type="submit" class="btn btn-primary" id="product_file">Upload</button>

                                                <button class="btn btn-primary hide" disabled id="spinnerButton"><span class="spinner-border spinner-border-sm"></span>Your file Uploading..</button>

                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>



                            <div class="comment-widgets scrollable">

                               <div class="container">

                                    <table class="table table-bordered">

                                        <thead>

                                            <tr>

                                                <th>S.No</th>

                                                <th>Banner</th>

                                                <th>Submitted Date</th>

                                                <th colspan="2">Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php $bannerView = bannerFileView($_SESSION['vendorsessionlogin']);

                                                if($bannerView[0] != 0){

                                                    echo $bannerView[1];

                                                }else{ ?>

                                                    <tr><td colspan="5"><center>No Records found<center></td></tr>

                                            <?php } ?>

                                            <!-- banner edit modal -->

                                            <!-- The Modal -->

                                                <div class="modal" id="editBannerDialog">

                                                    <div class="modal-dialog">

                                                        <div class="modal-content">

                                                            <!-- Modal Header -->

                                                            <div class="modal-header">

                                                                <h4 class="modal-title">Edit Banner file</h4>

                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                            </div>

                                                            <form action="" method="post" enctype="multipart/form-data" id="banner_editForm">

                                                                <!-- Modal body -->

                                                                <div class="modal-body">

                                                                    <div class="custom-file mb-3">

                                                                        <input type="file" class="custom-file-input" name="bannerFileName" id="editbannerFile" accept="image/*" onchange="return bannerValidationUpdate()">

                                                                        <label class="custom-file-label" for="customFile">Choose file</label>

                                                                    </div>

                                                                </div>

                                                                <!-- Modal footer -->

                                                                <div class="modal-footer" style="border-top: none;">

                                                                    <input type="hidden" name="bnr_edit" value="banner_edit">

                                                                    <input type="hidden" name="bannerId" id="bannerId" value="">

                                                                    <button type="submit" class="btn btn-primary" id="editProduct_file">Edit</button>

                                                                    <button class="btn btn-primary hide" disabled id="editSpinnerButton"><span class="spinner-border spinner-border-sm"></span>Your file Updating..</button>

                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <!-- card new -->

                        

                    </div>

                    <!-- column -->

                </div>

                <!-- ============================================================== -->

                <!-- Recent comment and chats -->

                <!-- ============================================================== -->

            </div>

<?php

require_once("include/footer.php");

?>

<script type="text/javascript">

    //validate iamges

    function bannerValidation(){

        var fileInput = document.getElementById('bannerFile');

        var filesize = document.getElementById('bannerFile').files[0];

        var filePath = fileInput.value;

        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if(!allowedExtensions.exec(filePath)){

            alert('Please upload banner having extensions .jpeg/.jpg/.png/.gif only.');

            fileInput.value = '';

            return false;

        }else if(filesize.size > 2097152){

            alert('Please upload less then 2MB');

            fileInput.value = '';

            return false;

        }else{

            return true;

        }

    }



    //validate iamges

    function bannerValidationUpdate(){

        var fileInput = document.getElementById('editbannerFile');

        var filesize = document.getElementById('editbannerFile').files[0];

        var filePath = fileInput.value;

        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if(!allowedExtensions.exec(filePath)){

            alert('Please upload banner having extensions .jpeg/.jpg/.png/.gif only.');

            fileInput.value = '';

            return false;

        }else if(filesize.size > 2097152){

            alert('Please upload less then 2MB');

            fileInput.value = '';

            return false;

        }else{

            return true;

        }

    }

</script>

<script>

    $(document).ready(function(){

        // Add the following code if you want the name of the file appear on select

        $(".custom-file-input").on("change", function() {

          var fileName = $(this).val().split("\\").pop();

          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        });



        $('#banner_uploadForm').on('submit', function(e){

            e.preventDefault();

            var fd = new FormData($(this)[0]);

            var url = '<?php echo get_template_directory(); ?>';

            $('#spinnerButton').removeClass('hide');

            $('#product_file').addClass('hide');

            $.ajax({

                  url: url+'ajaxfile',

                  type: 'post',

                  data: fd,

                  contentType: false,

                  processData: false,

                  success: function(response){

                    console.log(response);

                    $('#spinnerButton').addClass('hide');

                    $('#product_file').removeClass('hide');

                   if(response == 0){

                        alert('Your file uploaded.');

                        window.location.href='https://buyjee.com/vendor/banners';

                    }else if( response == 1){

                        alert('File not uploading, please try again');

                        window.location.href='https://buyjee.com/vendor/banners';

                    }else if( response == 2 ){

                        alert('Only JPEG, JPG, GIF and PNG file format allowed');

                        window.location.href='https://buyjee.com/vendor/banners';

                    }else if( response == 3 ){

                        alert('Please choose file.');

                        window.location.href='https://buyjee.com/vendor/banners';

                    }

                  }

            });

        });



        //edit banner

        $('#banner_editForm').on('submit', function(e){

            e.preventDefault();

            var fd = new FormData($(this)[0]);

            var url = '<?php echo get_template_directory(); ?>';

            $('#editSpinnerButton').removeClass('hide');

            $('#editProduct_file').addClass('hide');

            $.ajax({

                  url: url+'ajaxfile',

                  type: 'post',

                  data: fd,

                  contentType: false,

                  processData: false,

                  success: function(response){

                    console.log(response);

                    $('#editSpinnerButton').addClass('hide');

                    $('#editProduct_file').removeClass('hide');

                   if(response == 0){

                        alert('Your file uploaded.');

                        window.location.href='banners';

                    }else if( response == 1){

                        alert('File not uploading, please try again');

                        window.location.href='banners';

                    }else if( response == 2 ){

                        alert('Only JPEG, JPG, GIF and PNG file format allowed');

                        window.location.href='banners';

                    }else if( response == 3 ){

                        alert('Please choose file.');

                        window.location.href='banners';

                    }

                  }

            });

        });



        $('.open-bannerModel').on('click', function(){

            var bnrId = $(this).data('bnnerid');

            $('#bannerId').val(bnrId);

            $('#editBannerDialog').modal('show');

        });



        $('.remove-bannerModel').on('click', function(){

            var bnrId = $(this).data('bnnerid');

            var url = '<?php echo get_template_directory(); ?>';

            var action = 'remove';

            var r = confirm("Are you sure want to remove banner");

            if( r == true){

                $.ajax({

                    url: url+'ajaxfile',

                    type: 'post',

                    data: {bnnerId:bnrId, action:action},

                    success: function(response){

                    console.log(response);

                       if(response == 0){

                            alert('Your banner has been removed.');

                            window.location.href='banners';

                        }else if( response == 1){

                            alert('Something error, please try again');

                            window.location.href='banners';

                        }

                    }

                });

            }else{

                return false;    

            }

        });

        

    });

</script>