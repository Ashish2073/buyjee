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
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $url; ?>/function.php">
                            <div class="card-body card-block">
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Client Name</label>
                                        <div class="input-group">
                                            <select name="clint_p_l_data" class="form-control" required>
                                                <option value="">Select One</option>
                                                <?php echo clint_name_select(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">PID</label>
                                        <div class="input-group">
                                            <select name="pid_p_l" class="form-control pidvale" required>
                                                <option value="">Select One</option>
                                                <?php echo all_pid(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Select Vender</label>
                                        <div class="input-group">
                                            <select name="vend_p_l_id" class="form-control" required>
                                                <option value="">Select One</option>
                                                <?php echo vender_email_select(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Quota</label>
                                        <div class="input-group">
                                            <input class="form-control" name="quta_p_l" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">LOI</label>
                                        <div class="input-group">
                                            <input class="form-control" name="loi_p_l" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">CPI</label>
                                        <div class="input-group">
                                            <select class="form-control cpi" name="cpi_p_l" required>
                                                <option value="">Select One</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class="form-control-label">Status</label>
                                        <div class="input-group">
                                            <select name="statu_data" class="form-control" required>
                                                <option value="">Select One</option>
                                                <option value="1">Launch</option>
                                                <option value="2">Wait for Launch</option>
                                                <option value="3">Pause</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Thank You</label>
                                        <div class="input-group">
                                            <input class="form-control" name="vedn_thank" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Terminate</label>
                                        <div class="input-group">
                                            <input class="form-control" name="vedn_ternit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 float-left">
                                    <div class="form-group">
                                        <label class=" form-control-label">Over Quta</label>
                                        <div class="input-group">
                                            <input class="form-control" name="vedn_overquta" required>
                                        </div>
                                    </div>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="alt_projt_btn">
                                                    <i class="fa fa-paper-plane-o"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                            <?php echo link_vend_show(); ?>
                            </div>
                        </form>
                        </div>
                    </div>
  </div>


</div><!-- .animated -->
</div><!-- .content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("select.pidvale").change(function(){
        var selectquta = $(".pidvale option:selected").val();
        //alert(selectquta);
        $.ajax({
            type: "POST",
            url: "get_quta/",
            data: { pidvale : selectquta } 
        }).done(function(data){
            //alert(data);
            $(".cpi").html(data);
        });
    });
});
</script>
<?php
include_once("footer.php");
?>