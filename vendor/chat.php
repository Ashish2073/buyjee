<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");

?>



<!-- ========= main banner section ========== -->
<div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

             <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">

                        <h4 class="page-title">Dashboard</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>


  <div class="main-content w-100 p-tb-60">
    <div class="wrapper">
    <div class="chat_container">
        <div class="left">
            <div class="top">
                <input type="text" placeholder="Search" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people">
                <?php $vendoridval = $_SESSION['vendorsessionlogin'];?>
                <?php echo chatvenodr($vendoridval); ?>
            </ul>
        </div>
        <div class="right">
            <?php 
                if(isset($_GET['id'])){
                    $sessionval = $_GET['id'];
                    $vendoridval = $_SESSION['vendorsessionlogin'];
                    echo $get_fata_val = chatviewdata($sessionval,$vendoridval);
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
<!-- /////////// footer section ////////////// -->
<?php

require_once("include/footer.php");

?>
<script type="text/javascript">
$(document).ready(function(){
  setInterval(function(){
    $("#updatecaht").load(' #updatecaht')
  }, 2000);
});

$(document).ready(function(){

    $(".send").on('click', function(){
      
      var unid = $("#textval").val();
      var unlikedata = $(".send").data("id");
      var csid = "<?php echo $vendoridval; ?>";
      $post = $(this);
      //alert(unid);
      $.ajax({
        url: 'functions',
        type: 'post',
        data: {
          'postdata': 1,
          'value': unid,
          'id': csid,
          'cssvalid': unlikedata,
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

