<?php
include_once("header.php");
?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Projects Status</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li class="active">Projects Status</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Projects Status</strong>
                            </div>
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $url; ?>/function.php">
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Vender Name</th>
                                                <th>PID</th>
                                                <th>Country Name</th>
                                                <th>Quota</th>
                                                <th>Completes</th>
                                                <th>Remaing</th>
                                                <th>CPI</th>
                                                <th>View</th>
                                                <th>Status</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mohit</td>
                                                <td>SC84541</td>
                                                <td>USA</td>
                                                <td><span class="count">500</span></td>
                                                <td><span class="count">300</span></td>
                                                <td><span class="count">200</span></td>
                                                <td>$<span class="count">10</span></td>
                                                <td><a href="#">View</a></td>
                                                <td>
                                                    <select name="">
                                                    <option value="">Select One</option>
                                                    <option value="">Close</option>
                                                    <option value="">Pause</option>
                                                    <option value="">Working</option>
                                                    </select>
                                                </td>
                                                <td><button type="submit" name="">Update</button></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
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