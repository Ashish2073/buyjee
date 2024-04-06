<?php
include_once("header.php");
include_once("function.php");
$url = $_SERVER['REQUEST_URI'];

$slesh_url = explode('/', $url);

$clint_id = $slesh_url[3];
$clint_singl_id = $slesh_url[4];

$singl_data = "SELECT * FROM client_data WHERE client_a_d_id='$clint_id' AND client_a_d_singl_id='$clint_singl_id'";
$query_vale = mysqli_query($con,$singl_data);
while($row_vale = mysqli_fetch_array($query_vale)){
    $clint_name = $row_vale['client_a_d_name'];
    $clint_location = $row_vale['client_a_d_location'];
    $clint_website = $row_vale['client_a_d_website'];
    $clint_email = $row_vale['client_a_d_email'];
    $clint_delect = $row_vale['client_a_d_delete'];
    $clint_block = $row_vale['client_a_d_block'];
}

if(isset($_POST['updateclient'])){
    $update_name = $_POST['clintname'];
    $update_location = $_POST['locatonvale'];
    $update_email = $_POST['emailid'];
    $update_blockvale = $_POST['blockunblock'];
    $update_weburl = $_POST['weburl'];

    $query_insert = updateclient($update_name,$update_location,$update_email,$update_blockvale,$update_weburl,$clint_id,$clint_singl_id);
    if($query_insert == true){
        echo "<script>alert('Successfully Update');window.location.href='';</script>";
    }else{
        $msg = "<script>alert('Please Try Again');window.location.href='';</script>";
    }
}
?>
       <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Edit Client</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li><a href="view_client.html">View Client</a></li>
                                    <li class="active">Add Client</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-xs-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Client</strong>
                            </div>
                            <form role="form" method="post" action="">
                            <div class="card-body card-block">
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Client Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input class="form-control" name="clintname" value="<?php echo $clint_name; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                            <input class="form-control" name="locatonvale" value="<?php echo $clint_location; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Email Id</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            <input class="form-control" name="emailid" value="<?php echo $clint_email; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Block</label>
                                        <div class="input-group">
                                            <select name="blockunblock"  class="form-control">
                                                <option value="0">Select One</option>
                                                <?php if($clint_block == "1"){?>
                                                    <option value="1" selected>Block</option>
                                                <?php }else{
                                                ?>
                                                    <option value="1">Block</option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">WebSite</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                                            <input class="form-control" name="weburl" value="<?php echo $clint_website; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="updateclient">
                                                    <i class="fa fa-paper-plane-o"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
  </div>


</div><!-- .animated -->
</div><!-- .content -->
<?php
include_once("footer.php");
?>