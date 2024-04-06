<?php
include_once('admin_dist/includes/uper-header.php');
include_once('admin_dist/includes/main-header.php');
include_once('admin_dist/includes/top-bar.php');
include_once('admin_dist/includes/left-menu.php');
?>
<style type="text/css">
  .nav-wrap {
  width: 100%;
  margin: 1em auto 0;
}
@media (min-width: 992px) {
  .nav-wrap {
    
  }
}

[hidden] {
  display: none;
  visibility: hidden;
}

.acnav {
  width: 100%;
}
.acnav__list {
  padding: 0;
  margin: 0;
  list-style: none;
}
.acnav__list--level1 {
  border: 1px solid #015a7a;
}
.has-children > .acnav__label::before {
  content: "\f054";
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  margin-right: 1em;
  transition: transform 0.3s;
}
.has-children.is-open > .acnav__label::before {
  transform: rotate(90deg);
}
.acnav__link, .acnav__label {
  display: block;
  font-size: 1rem;
  padding: 1em;
  margin: 0;
  cursor: pointer;
  color: #fcfcfc;
  background: #015a7a;
  box-shadow: inset 0 -1px #03526e;
  transition: color 0.25s ease-in, background-color 0.25s ease-in;
}
.acnav__link:focus, .acnav__link:hover, .acnav__label:focus, .acnav__label:hover {
  color: #e3e3e3;
  background: #2d6b7e;
}
.acnav__link--level2, .acnav__label--level2 {
  padding-left: 3em;
  background: #2d6b7e;
}
.acnav__link--level2:focus, .acnav__link--level2:hover, .acnav__label--level2:focus, .acnav__label--level2:hover {
  background: #296272;
}
.acnav__link--level3, .acnav__label--level3 {
  padding-left: 5em;
  background: #296272;
}
.acnav__link--level3:focus, .acnav__link--level3:hover, .acnav__label--level3:focus, .acnav__label--level3:hover {
  background: #255867;
}
.acnav__link--level4, .acnav__label--level4 {
  padding-left: 7em;
  background: #255867;
}
.acnav__link--level4:focus, .acnav__link--level4:hover, .acnav__label--level4:focus, .acnav__label--level4:hover {
  background: #214f5c;
}
.acnav__list--level2, .acnav__list--level3, .acnav__list--level4 {
  display: none;
}
.is-open > .acnav__list--level2, .is-open > .acnav__list--level3, .is-open > .acnav__list--level4 {
  display: block;
}

.acnav__label .righticon{float: right; margin-top: -4px;}
.acnav__label .righticon a{display:inline-block; vertical-align: middle; background: #fff; color: #015a7a; font-size: 15px; width: 30px; height: 30px; border-radius: 50px; line-height: 30px; border: 1px solid #015a7a; text-align: center;}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Coupons</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>
            <li class="breadcrumb-item active">All Coupons</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left box -->
        <!-- right Box -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">All Coupons</h3>
            </div>
            <div class="card-body">
              <section class="nav-wrap">
  
  <!-- start accordion nav block -->
  <nav class="acnav" role="navigation">
    <!-- start level 1 -->
    <ul class="acnav__list acnav__list--level1">

      <!-- start group 1 -->
      <li class="has-children">
        <div class="acnav__label">
          Group 1 (level 1)
          <span class="righticon">
            <a href="#"><i class="fa fa-eye"></i></a>
            <a href="#"><i class="fa fa-pencil"></i></a>
            <a href="#"><i class="fa fa-ellipsis-h"></i></a>
          </span>
        </div>
        <!-- start level 2 -->
        <ul class="acnav__list acnav__list--level2">
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 1.1 (level 2) 
              <span class="righticon">
                <a href="#"><i class="fa fa-eye"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
              </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 1.1.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 1.1.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 1.2 (level 2) 
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 1.2.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 1.2.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>
        </ul>
        <!-- end level 2 -->
      </li>
      <!-- end group 1 -->

      <!-- start group 2 -->
      <li class="has-children">
        <div class="acnav__label">
          Group 2 (level 1)
          <span class="righticon">
            <a href="#"><i class="fa fa-eye"></i></a>
            <a href="#"><i class="fa fa-pencil"></i></a>
            <a href="#"><i class="fa fa-ellipsis-h"></i></a>
          </span>
        </div>
        <!-- start level 2 -->
        <ul class="acnav__list acnav__list--level2">
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 2.1 (level 2)
              <span class="righticon">
                <a href="#"><i class="fa fa-eye"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
              </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 2.1.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 2.1.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 2.2 (level 2)
              <span class="righticon">
                <a href="#"><i class="fa fa-eye"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
              </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 2.2.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 2.2.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>
        </ul>
        <!-- end level 2 -->
      </li>
      <!-- end group 2 -->

      <!-- start group 3 -->
      <li class="has-children">
        <div class="acnav__label">
          Group 3 (level 1)
          <span class="righticon">
              <a href="#"><i class="fa fa-eye"></i></a>
              <a href="#"><i class="fa fa-pencil"></i></a>
              <a href="#"><i class="fa fa-ellipsis-h"></i></a>
            </span>
        </div>
        <!-- start level 2 -->
        <ul class="acnav__list acnav__list--level2">
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>
          <li>
            <a class="acnav__link acnav__link--level2" href="">Item (level 2)</a>
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 3.1 (level 2)
              <span class="righticon">
                <a href="#"><i class="fa fa-eye"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
              </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 3.1.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 3.1.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>

          <li class="has-children">
            <div class="acnav__label acnav__label--level2">
              Group 3.2 (level 2)
              <span class="righticon">
                <a href="#"><i class="fa fa-eye"></i></a>
                <a href="#"><i class="fa fa-pencil"></i></a>
                <a href="#"><i class="fa fa-ellipsis-h"></i></a>
              </span>
            </div>
            <!-- start level 3 -->
            <ul class="acnav__list acnav__list--level3">
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li>
                <a class="acnav__link acnav__link--level3" href="">Item (level 3)</a>
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 3.2.1 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
              <li class="has-children">
                <div class="acnav__label acnav__label--level3">
                  Group 3.2.2 (level 3)
                  <span class="righticon">
                    <a href="#"><i class="fa fa-eye"></i></a>
                    <a href="#"><i class="fa fa-pencil"></i></a>
                    <a href="#"><i class="fa fa-ellipsis-h"></i></a>
                  </span>
                </div>
                <!-- start level 4 -->
                <ul class="acnav__list acnav__list--level4">
                  <li>
                    <a class="acnav__link acnav__link--level4" href="">Item (level 4)</a>
                  </li>
                </ul>
                <!-- end level 4 -->
              </li>
            </ul>
            <!-- end level 3 -->
          </li>
        </ul>
        <!-- end level 2 -->
      </li>
      <!-- end group 3 -->

    </ul>
    <!-- end level 1 -->
  </nav>
  <!-- end accordion nav block -->
  
</section>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- right Box -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<?php
include_once('admin_dist/includes/footer.php');
?>

<script type="text/javascript">
  $(document).ready(function(){
  $('.acnav__label').click(function () {
  var label = $(this);
  var parent = label.parent('.has-children');
  var list = label.siblings('.acnav__list');

  if ( parent.hasClass('is-open') ) {
    list.slideUp('fast');
    parent.removeClass('is-open');
  }
  else {
    list.slideDown('fast');
    parent.addClass('is-open');
  }
});
  
});
</script>

