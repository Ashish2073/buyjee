<?php
foreach(GetTvNewsSection("0","news","0",$get_page_name) as $tvnewsval){

}
?>
<?php include 'includes/upper-header.php'; ?>

<title><?php echo $tvnewsval['tvnews_title']; ?></title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="canonical" href="#"> 

<?php include 'includes/main-header.php';?>

  <div class="main-banner inner-banner banner-scroll" style="background: url('<?php echo $url; ?>/assets/images/about-banner.jpg') no-repeat center center;">
        <div class="fixed-banner ">
            <div class="banner-content">
                <div class="content-wrap mb-0 banner-overlay">
                    <div class="inner">
                    </div>
                </div>
                <!--content wrap-->
            </div>
            <!--banner content-->
        </div>
    </div>
    <!--main banner-->

<section class="blog-single p-tb50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center mb-50">
                        

                        <div class="content-wrap entry-content mb-0">
                            <h2 class="mb-0"><?php echo $tvnewsval['tvnews_title']; ?></h2>

                            <div class="post-info mb-30">
                                <?php $datenew = USATimeZoneSettime($tvnewsval['tvnews_date']); ?>
                            <span> 
                                <i class="fa fa-calendar"></i> <?php echo $datenew; ?>
                            </span>
                            <!-- <span> 
                                <i class="fa fa-user"></i> By <a href="#">John Doe </a> 
                            </span>
                            <span> 
                                <i class="fa fa-eye"></i> 
                                <a href="#">10 View</a> 
                            </span> -->
                        </div>
                        <!--post info-->

                            <img data-src="<?php echo $url; ?>/images/<?php echo $tvnewsval['tvnews_thunal']; ?>" loading="lazy" class="lazyload" src="<?php echo $url; ?>/images/<?php echo $tvnewsval['tvnews_thunal']; ?>" alt="Fashion news">

                            <?php
                                echo $tvnewsval['tvnews_contetn'];
                            ?>
                        </div>
                        <!--entry content-->
                    </div>
                    <!--entry content-->

                    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-link text-uppercase btn-prev">
                                <i class="fa fa-long-arrow-left"></i> previous News
                            </a>

                            <a href="#" class="btn btn-link text-uppercase btn-next">
                                next News <i class="fa fa-long-arrow-right"></i> 
                            </a>
                        </div>
                    </div> -->
                    <!--button wrap-->
                </div>
                <!--top-->

                
            </div>
        </section>
    <!--fashion news-->
