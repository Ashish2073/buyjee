<?php
include_once("header.php");
?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Add Employess</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="<?php echo $url; ?>/index.php">Dashboard</a></li>
                                    <li class="active">Add Employess</li>
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
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="login_name" placeholder="Employess Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="login_name" placeholder="Employess Link Code" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="login_name" placeholder="Employess Code" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email_id" placeholder="Email Id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="make_login_btn" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-paper-plane-o"></i>&nbsp;
                                                    <span id="payment-button-amount">Make</span>
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