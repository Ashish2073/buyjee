<?php include 'includes/upper-header.php'; ?>

<title>GLL TV</title>
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

<section class="media-news glltvall  p-tb50">
        <div class="container">
            <div class="row blog-masanry grid">
                <?php
                    foreach(GetTvOnlyNewsSection($tvnewsid="0","tv") as $tvnewsvalns){
                        if($tvnewsvalns['tvnews_status'] == 1){
                ?>
                <div class="blog-list tvwrap col-sm-4 grid-item">
                    <div class="wrap">
                        <figure>
                            <a href="<?php echo $tvnewsvalns['tvnews_video']; ?>" class="image-effect overlay video" target="_blank">
                                <img data-src="<?php echo $url; ?>/images/<?php echo $tvnewsvalns['tvnews_thunal']; ?>" loading="lazy" class="lazyload" src="<?php echo $url; ?>/images/<?php echo $tvnewsvalns['tvnews_thunal']; ?>" alt="Fashion news">
                            </a>
                        </figure>
                        

                        <h4 class="entry-title mb-5">
                            <a href="<?php echo $tvnewsvalns['tvnews_video']; ?>" target="_blank">
                                <?php 
                                    echo $tvnewsvalns['tvnews_title'];
                                ?>
                            </a>
                        </h4>

                            <div class="post-info">
                                <span><i class="pe-7s-alarm"></i> <?php echo USATimeZoneSettime($tvnewsvalns['tvnews_date']); ?> </span>
                            </div>
                           

                            <div class="entry-post-content">
                                <?php
                                    if($tvnewsvalns['tvnews_contetn'] !== ""){
                                ?>
                                <?php
                                        echo $tvnewsvalns['tvnews_contetn'];
                                    ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!--fashion news-->
       

<?php include 'includes/footer.php'; ?>







        

     

