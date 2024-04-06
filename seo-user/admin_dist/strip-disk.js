// page name check
/*$('.chaking-pagename').keyup(function(){
	var pagename = $(this).val();
	alert(pagename);
});*/
$("#tag_addval").click(function (){
   var get_tagval = $("#add_tagvale").val();
   //alert(get_tagval);
  $.ajax({
          url:"/on-a-heros/admin-manager/ajax-data-file/",
          type:'post',
          data:{Tageaddnew:1, blog_tagval:get_tagval},
          success:function(data){
            if(data == 1){
              $("#tagestaus").html('<p>Successfully add tag please select that tag in uper input.</p>');
              $("#add_tagvale").val("");
              $("#reloadtag").load(" #reloadtag");
            }else if(data == 2){
              $("#tagestaus").html('<p>That tag name already in our data base.</p>');
              $("#add_tagvale").val("");
              $("#reloadtag").load(" #reloadtag");
            }
          }
      });
});