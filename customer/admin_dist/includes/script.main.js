$(function() {

    const Toast = Swal.mixin({

      toast: true,

      position: 'top-end',

      showConfirmButton: false,

      timer: 3000

    });



    $('.swalDefaultSuccess').click(function() {

      Toast.fire({

        type: 'success',

        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.swalDefaultInfo').click(function() {

      Toast.fire({

        type: 'info',

        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.swalDefaultError').click(function() {

      Toast.fire({

        type: 'error',

        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.swalDefaultWarning').click(function() {

      Toast.fire({

        type: 'warning',

        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.swalDefaultQuestion').click(function() {

      Toast.fire({

        type: 'question',

        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });



    $('.toastrDefaultSuccess').click(function() {

      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');

    });

    $('.toastrDefaultInfo').click(function() {

      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');

    });

    $('.toastrDefaultError').click(function() {

      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');

    });

    $('.toastrDefaultWarning').click(function() {

      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');

    });



    $('.toastsDefaultDefault').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultTopLeft').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        position: 'topLeft',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultBottomRight').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        position: 'bottomRight',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultBottomLeft').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        position: 'bottomLeft',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultAutohide').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        autohide: true,

        delay: 750,

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultNotFixed').click(function() {

      $(document).Toasts('create', {

        title: 'Toast Title',

        fixed: false,

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultFull').click(function() {

      $(document).Toasts('create', {

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',

        title: 'Toast Title',

        subtitle: 'Subtitle',

        icon: 'fas fa-envelope fa-lg',

      });

    });

    $('.toastsDefaultFullImage').click(function() {

      $(document).Toasts('create', {

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',

        title: 'Toast Title',

        subtitle: 'Subtitle',

        image: '../../dist/img/user3-128x128.jpg',

        imageAlt: 'User Picture',

      });

    });

    $('.toastsDefaultSuccess').click(function() {

      $(document).Toasts('create', {

        class: 'bg-success', 

        title: 'Toast Title',

        subtitle: 'Subtitle',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultInfo').click(function() {

      $(document).Toasts('create', {

        class: 'bg-info', 

        title: 'Toast Title',

        subtitle: 'Subtitle',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultWarning').click(function() {

      $(document).Toasts('create', {

        class: 'bg-warning', 

        title: 'Toast Title',

        subtitle: 'Subtitle',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultDanger').click(function() {

      $(document).Toasts('create', {

        class: 'bg-danger', 

        title: 'Toast Title',

        subtitle: 'Subtitle',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

    $('.toastsDefaultMaroon').click(function() {

      $(document).Toasts('create', {

        class: 'bg-maroon', 

        title: 'Toast Title',

        subtitle: 'Subtitle',

        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'

      });

    });

  });

  

$(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": true,

      "autoWidth": false,

    });

  });

  

$(function () {

    // Summernote

    $('.textarea').summernote();

});

 $(document).ready(function(){
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this Menu.');
        }
    };

    $('#domenu').domenu({
        data: '[{"id":11,"title":"Item 11","http":""},{"id":10,"title":"Item 10","http":""},{"id":9,"title":"Item 9","http":""},{"id":6,"title":"Home","http":"","children":[{"id":5,"title":"Item 5","http":""},{"id":4,"title":"Item 4","http":"","children":[{"id":3,"title":"Item 3","http":""},{"id":2,"title":"Item 2","http":"","children":[{"id":7,"title":"Example","http":"http://google.com"},{"id":8,"title":"Item 8","http":""}]}]}]},{"id":1,"title":"Item 1","http":""}]'
    }).parseJson();
});
/*======== Droup Down Menu ======*/