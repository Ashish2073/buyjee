<?php include 'includes/upper-header.php'; ?>

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

<section class="media-news  p-tb50">
        <div class="container">
            <div class="row blog-masanry grid">
                <?php
                    foreach(GetTvNewsSection($tvnewsid="0","news") as $tvnewsval){
                        if($tvnewsval['tvnews_status'] == 1){
                ?>
                <div class="blog-list col-sm-4 grid-item">
                    <div class="wrap">
                        <figure>
                            <a href="<?php echo $url; ?>/<?php echo $tvnewsval['tvnewsval_url']; ?>/" class="image-effect overlay">
                                <img data-src="<?php echo $url; ?>/images/<?php echo $tvnewsval['tvnews_thunal']; ?>" loading="lazy" class="lazyload" src="<?php echo $url; ?>/images/<?php echo $tvnewsval['tvnews_thunal']; ?>" alt="Fashion news">
                            </a>
                        </figure>
                       

                        <div class="entry-content">
                            <h5 class="entry-title mb-10">
                                <a href="<?php echo $url; ?>/<?php echo $tvnewsval['tvnewsval_url']; ?>/"><?php echo $tvnewsval['tvnews_title']; ?></a>
                            </h5>
                            <?php $datenew = USATimeZoneSettime($tvnewsval['tvnews_date']); ?>
                            <div class="post-info  mb-15">
                                <span><i class="pe-7s-alarm"></i> <?php echo $datenew; ?> </span>
                            </div>
                           
                            <div class="entry-post-content">
                                <p>
                                    <?php
                                    if($tvnewsval['tvnews_contetn'] !== ""){
                                    ?>
                                    <?php
                                        $cont_short = strip_tags($tvnewsval['tvnews_contetn']);
                                        echo $count_showdata = substr($cont_short, 0, 203);
                                    ?>...
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <!--fashion news-->
       

<?php include 'includes/footer.php'; ?>







        

     

