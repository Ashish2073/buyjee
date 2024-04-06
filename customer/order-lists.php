<?php include 'sessionset.php'; ?>
<?php include 'format.php'; ?>
<?php include 'includes/upper-header.php';?>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Customer Dashboard </title>
  <link rel="stylesheet" type="text/css" href="<?php echo $cus_url; ?>/user_dasboard.css">
<?php include 'includes/main-header.php'; ?>
<style type="text/css">
img.img-responsive {width: 50%;}
label.custom-file {margin-bottom: 41px;}
.table-bordered {
    overflow: auto;
    flex-wrap: wrap;
    display: block;
}
button.cancel-btn {
    background: none;
    color: #0fa8ae;
}
.order-cancel-box button.btn.btn-default {
    border: 1px solid #0fa8ae;
}
.order-cancel-box textarea {
    width: 100%;
    border-radius: 10px;
    border-color: #0fa8ae;
    color: #000;
}
.order-cancel-box {
    position: fixed;
    top: 0px;
    z-index: 1111;
    background: #0000005e;
    left: 0px;
    right: 0px;
    bottom: 0px;
}
.body-cancel-box {
    background: #FFF;
    width: 30%;
    margin: auto;
    position: relative;
    top: 11%;
    padding: 20px 10px;
    border-radius: 5px;
}
.body-cancel-box .modal-head h4 {
    float: left;
}
.body-cancel-box .modal-head {
    margin-bottom: 8px;
    overflow: auto;
    border-bottom: 1px solid #dee2e6;
    padding: 0px 0px 8px 0px;
}

#dtBasicExample .info-btn{ color: #0fa8ae; cursor: pointer; }
#dtBasicExample .info-btn:hover{color: #13d5dd;}
#myModal .trackingdata .datarow{border-bottom: 1px solid #f5f5f5;  }
#myModal .trackingdata .datarow:last-child{border-bottom: 0px solid #f5f5f5;  }
#myModal .trackingdata .datarow span{ display: inline-block; vertical-align: middle; padding: 5px 8px; }
#myModal .trackingdata .datarow span:first-child{color: #777; width: 30%; text-align: right;}
#myModal .trackingdata .datarow span:last-child{color: #111111; font-weight: 600;}
.note-bord p {
    font-size: 14px;
    font-weight: 700;
    float: left;
}
.note-bord span {
    font-size: 13px;
    margin-left: 4px;
    font-weight: 500;
    margin-bottom: 15px;
    display: block;
}
h4.note-bord {
    margin-top: 5px;
}
</style>

<?php
//echo $_SESSION['customersessionlogin'];
if(isset($_POST['candbtn'])){
    $data_msg_val = addslashes($_POST['cancletext']);
    $set_valedata = $_POST['cancel_vale'];
    $session_valeid = $_SESSION['customersessionlogin'];
    $data_vale_insert = cancelformData($data_msg_val,$set_valedata,$session_valeid);
    if($data_vale_insert == true){
        echo "<script>alert('Your order's cancellation request has been submitted successfully.');window.location.href='$url/customer/order-lists';</script>";
    }else{
        echo "<script>alert('Server Error.');window.location.href='$url/customer/order-lists';</script>";
    }
}
if(isset($_GET['cancelID'])){
    $get_valedata = $_GET['cancelID'];
?>
<div class="order-cancel-box">
    <div class="body-cancel-box">
        <div class="modal-head">
            <h4 class="modal-title">Cancel Order</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="">
              <textarea name="cancletext" placeholder="Why are You Cancel Your Order ?"></textarea>
              <input type="hidden" name="cancel_vale" value="<?php echo $get_valedata; ?>">
              <button type="submit" name="candbtn" class="btn-massg-cancel">Submit</button>
          </form>
        </div>
    </div>
</div>
<?php
}
?>

<!-- ========= main banner section ========== -->

<section>
    <div class="inner-banner-section primary-color-bg w-100 p-tb-30">
        <div class="mx-container">
            <div class="inner-head">
                <div class="inner-head-txt pd-lr-15">
                    <h1 class="h1-heading">Customer Orders History</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
  <div class="breadcrumb breadcrumbmenu">
    <div class="mx-container">
      <ol class="breadcrumb2">
        <li><a href="<?php echo $url; ?>/customer/dashboard">Home</a></li>
        <li class="active">Customer Orders History</li>
      </ol>                
    </div>
  </div>
</section>

<section>
    <div class="main-content w-100">
        <div class="mx-container">
            <div class="row">
                <div class="user_profile">
            		<!-- Left Sidebar -->
                    <?php include 'sidebar.php';?>
            		<!--- End -->
                    <div class="user_right">
                        <div class="mx-container">
                            <div class="row my-2">
                                <div class="col-lg-12 order-lg-12">
                                    <div class="glltxtlogo">
                                        <img src="https://buyjee.com/images/2094396619.jpeg">
                                    </div>
                                    <div class="table_box">
                                        <!-- <h6>Orders History</h6> -->
                                        <!-- <h4 class="note-bord">
                                            <p>CANCELLATIONS NOTE:-</p>
                                            <span>THERE IS A 4 HOUR CANCELLATION WINDOW AFTER PLACING YOUR ORDER. AFTER THIS 4 HOUR WINDOW YOUR ORDER WILL NO LONGER BE ELIGIBLE FOR CANCELLATION, BUT YOU MAY BE ELIGIBLE FOR A REFUND OR EXCHANGE ONCE YOU HAVE RECEIVED YOUR ORDER DEPENDING ON THE CREATORS’ INDIVIDUAL SHIPPING AND RETURNS POLICY. PLEASE SEND CANCELLATION REQUESTS TO EMAIL ADMIN@GALLERYLALA.COM OR CALL (US) 917 529 3445.</span>
                                        </h4> -->
                                        <table class="table sortable table-bordered dataTable" id="dtBasicExample" cellspacing="0">
                                            <thead>
                                                <th>Order Date</th>
                                                <th>Transaction ID</th>
                                                <th>Tracking ID</th>
                                                <th>Creator's Name</th>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Filters</th>
                                            </thead>
                                            <tbody>
                                              <?php echo customerOrdersnew(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////// footer section ////////////// -->
<?php include 'includes/footer.php'; ?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header m_head">        
        <h4 class="modal-title trackingvalue">Shipping Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="trackingdata">
            <div class="datarow">
                <span>
                    Name of Shipping Company
                </span>
                <span class="title-name"></span>
            </div>
            <div class="datarow">
                <span>Shipping Tracking Link</span>
                <span><a href="" class="trkinlink" target="_blank"></a></span>
            </div>
            <div class="datarow">
                <span>Tracking ID</span>
                <span class="trkingid"></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(".canclbtn").click(function(){
        var cancelbtn = $(this).data('id');
        //alert(cancelbtn);
        window.location.href = "<?php echo $url; ?>/customer/order-lists?cancelID="+cancelbtn+"";
    });
    $(".close").click(function(){
        window.location.href = "<?php echo $url; ?>/customer/order-lists";
    });

    $(".info-btn").click(function(){
        var trkingname = $(this).data("name");
        var trkinglink = $(this).data("link");
        var trkingid = $(this).data("id");
        //alert(trkingid);
        $(".title-name").text(trkingname);
        $(".trkinlink").text(trkinglink);
        $(".trkinlink").attr("href", trkinglink);
        $(".trkingid").text(trkingid);

    });
});
</script>
<script src="https://buyjee.com/admin/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>