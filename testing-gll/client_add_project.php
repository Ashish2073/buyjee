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
                                <h1>Add Client Project</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li class="active">Add Project</li>
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
                                <strong>Add Client Project</strong>
                            </div>
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $url; ?>/function.php">
                            <div class="card-body card-block">
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Client Name</label>
                                        <div class="input-group">
                                            <select name="proj_clt_name" class="form-control" required>
                                                <option value="">Select One</option>
                                                <?php echo clint_name_select(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">PID</label>
                                        <div class="input-group">
                                            <select class="form-control" name="proj_clt_pid" required>
                                                <option value="">Select One</option>
                                                <?php echo threepidname(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Country Name</label>
                                        <div class="input-group">
                                            <select name="proj_clt_cot_n_c" class="form-control" required>
                                                <option value="">Select One</option>
                                                <?php echo country_name_select(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">LOI</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_loi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">IR</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_ir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Quota</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_quta" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">CPI</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_cpi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">UID Variable name</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_uid" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Status</label>
                                        <div class="input-group">
                                            <select name="proj_clt_status" class="form-control" required>
                                                <option value="">Select One</option>
                                                <option value="1">Launch</option>
                                                <option value="2">Wait for Launch</option>
                                                <option value="3">Pause</option>
                                                <option value="4">Close</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Client link</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="proj_clt_link" required>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="proj_add_clint">
                                                    <i class="fa fa-paper-plane-o"></i>&nbsp;
                                                    <span id="payment-button-amount">Add</span>
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