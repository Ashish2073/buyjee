<?php
include_once("header.php");
?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Lot Project</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li class="active">Lot Project</li>
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
                                <strong>Lot Project</strong>
                            </div>
                            <form>
                            <div class="card-body card-block">
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Client Name</label>
                                        <div class="input-group">
                                            <select name="" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="">1252</option>
                                                <option value="">1252</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">PID</label>
                                        <div class="input-group">
                                            <select name="" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="">1252</option>
                                                <option value="">1252</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Quota</label>
                                        <div class="input-group">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">CPI</label>
                                        <div class="input-group">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <div class="input-group">
                                            <select name="" class="form-control">
                                                <option value="">Select One</option>
                                                <option value="">1252</option>
                                                <option value="">1252</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
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