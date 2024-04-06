<?php
foreach(get_page_names(0,0,$get_page_name) as $valuearray){

}
?>

<?php include 'includes/main-header.php'; ?>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <?php echo $valuearray['page_name']; ?>
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                <div class="single-header style-2">
                                    <h2><?php echo $valuearray['page_name']; ?></h2>
                                </div>
                                <?php echo $valuearray['page_content']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ========= main banner section ========== -->