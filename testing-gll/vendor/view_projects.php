<?php
include_once("header.php");
include_once("function.php")
?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>View Projects</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li class="active">View Projects</li>
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
                                <strong class="card-title">View Project</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>PID</th>
                                            <th>Country Name</th>
                                            <th>Complete</th>
                                            <th>Terminate</th>
                                            <th>Overquota</th>
                                            <th>Quota</th>
                                            <th>Remaing</th>
                                            <th>Client Amount</th>
                                            <th>Other Amount</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                            <th>Edit/View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mohit</td>
                                            <td>SHNCHBS4</td>
                                            <td>USA</td>
                                            <td><span class="count">400</span></td>
                                            <td><span class="count">100</span></td>
                                            <td><span class="count">20</span></td>
                                            <td><span class="count">500</span></td>
                                            <td><span class="count">100</span></td>
                                            <td>$<span class="count">8</span></td>
                                            <td>$<span class="count">5</span></td>
                                            <td>$<span class="count">3</span></td>
                                            <td>Working</td>
                                            <td><a href="edit_client.php">Edit/View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php
include_once("footer.php");
?>
