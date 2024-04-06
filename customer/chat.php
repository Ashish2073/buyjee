<?php include 'sessionset.php'; ?>

<?php include 'format.php'; ?>

<?php include 'includes/upper-header.php'; ?>


    <meta name="description" content="">

    <meta name="keywords" content="">

    <title>Customer Dashboard </title>

  <link rel="stylesheet" type="text/css" href="<?php echo $cus_url; ?>/user_dasboard.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $cus_url; ?>/chat.css">

<?php include 'includes/main-header.php'; ?>

<style type="text/css">

img.img-responsive {

    width: 50%;

}

label.custom-file {

    margin-bottom: 41px;

}

span#clickadd {
    background: #0fa8ae;
    padding: 12px;
    cursor: pointer;
    color: #FFF;
    text-align: center;
    width: 50%;
    margin: auto;
}
</style>

<?php

?>

<!-- ========= main banner section ========== -->

<section>

    <div class="inner-banner-section primary-color-bg w-100 p-tb-30">

        <div class="mx-container">

            <div class="inner-head">

                <div class="inner-head-txt pd-lr-15">

                    <h1 class="h1-heading">Customer Dashboard</h1>

                </div>

            </div>

        </div>

    </div>

</section>

<section>

  <div class="breadcrumb breadcrumbmenu">

    <div class="mx-container">

      <ol class="breadcrumb2">

        <li><a href="<?php echo $url; ?>/customer/dashboard">Home</a></li>

        <li class="active">Customer Dashboard</li>

      </ol>                

    </div>

  </div>

</section>



<section>

  <div class="main-content w-100">

    <div class="mx-container">

      <div class="row">

        <div class="user_profile">

          <?php include 'sidebar.php'; ?>

        <div class="user_right">

          <div class="mx-container">

    <div class="row">

        
    <div class="wrapper">
    <div class="chat_container">
        <div class="left">
            <div class="top">
                <input type="text" placeholder="Search" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people">
                <?php echo chatvenodr(); ?>
            </ul>
        </div>
        <div class="right">
            <?php 
                if(isset($_GET['id'])){
                    $sessionval = $_GET['id'];
                    $customerid = $_SESSION['customersessionlogin'];
                    echo $get_fata_val = chatviewdata($sessionval,$customerid);
                }else{
                    echo '<div class="top"><span>To: <span class="name">Welcome</span></span></div>';
                    echo '<div class="chat active-chat" data-chat="@andg3o.id2m2aoglc10ov55n">
                            <div class="bubble you">Welcome in Chat</div>
                            <div class="bubble me">
                                I was wondering...
                            </div>
                        </div>
                        <div class="write">
                            
                            <input type="text"/>
                            
                        </div>';
                }
            ?>
        </div>
    </div>
</div>
  

    </div>

</div>

          </div>

        

      </div>

    </div>

  </div>

</section>

<!-- /////////// footer section ////////////// -->

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
  setInterval(function(){
    $("#updatecaht").load(' #updatecaht')
  }, 2000);
});

$(document).ready(function(){

    $("#clickadd").on('click', function(){

      var vendor = $("#clickadd").data("cust");
      var custome = "<?php echo $_SESSION['customersessionlogin']; ?>";
      $post = $(this);
      //alert(unid);
      $.ajax({
        url: 'format',
        type: 'post',
        data: {
          'addvendor': 1,
          'custval': custome,
          'vaendval': vendor,
        },
        success: function(response){
          if(response == "1"){
            window.location.reload();
          }
        }
      });
    });
  });

$(document).ready(function(){

    $(".send").on('click', function(){
      
      var unid = $("#textval").val();
      var unlikedata = $(".send").data("id");
      var csid = "<?php echo $customerid; ?>";
      $post = $(this);
      //alert(unid);
      $.ajax({
        url: 'format',
        type: 'post',
        data: {
          'postdata': 1,
          'value': unid,
          'id': unlikedata,
          'cssvalid': csid,
        },
        success: function(response){

          //$('.me').html(response);
          $("#repert").load(" #textval");
          $("#updatecaht").load(" #updatecaht");
        }
      });
    });
  });
</script>

<script type="text/javascript">
  document.querySelector('.chat[data-chat=person2]').classList.add('active-chat')
document.querySelector('.person[data-chat=person2]').classList.add('active')

let friends = {
    list: document.querySelector('ul.people'),
    all: document.querySelectorAll('.left .person'),
    name: ''
  },
  chat = {
    chat_container: document.querySelector('.chat_container .right'),
    current: null,
    person: null,
    name: document.querySelector('.chat_container .right .top .name')
  }

friends.all.forEach(f => {
  f.addEventListener('mousedown', () => {
    f.classList.contains('active') || setAciveChat(f)
  })
});

function setAciveChat(f) {
  friends.list.querySelector('.active').classList.remove('active')
  f.classList.add('active')
  chat.current = chat.chat_container.querySelector('.active-chat')
  chat.person = f.getAttribute('data-chat')
  chat.current.classList.remove('active-chat')
  chat.chat_container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat')
  friends.name = f.querySelector('.name').innerText
  chat.name.innerHTML = friends.name
}
</script>
