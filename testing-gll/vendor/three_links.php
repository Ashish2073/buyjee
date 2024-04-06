<?php
include_once("header.php");
include_once("function.php");
?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Make Three Redirect</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo $url; ?>/index.php">Dashboard</a></li>
                                    <li class="active">Make Three Redirect</li>
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
                            <form rol="form" method="post" enctype="multipart/form-data" action="<?php echo $url; ?>/function.php">
                            <div class="card-body card-block">
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Client Name</label>
                                        <div class="input-group">
                                            <select name="proj_clt_cot_n_c" class="form-control" required>
                                                <option value="">Select One</option>
                                                <?php echo clint_name_select(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Client Project Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="login_name" placeholder="PID" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="make_three_link" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-paper-plane-o"></i>&nbsp;
                                    <span id="payment-button-amount">Make</span>
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