<?php
include_once("header.php");
?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Add Country Name</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li class="active">Add Country Name with Code</li>
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
                                <strong>Add Country Name with Code</strong>
                            </div>
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $url; ?>/function/">
                            <div class="card-body card-block">
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Country Name</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="count_name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Country Code</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="count_code" required>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="count_butn">
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