function addNewItem() {
  if ($("#add-item")) {
	  $("#add-item").submit(function(event) {
	    event.preventDefault();
	    
	    var $form = $(this),
	        title = $form.find('input[name="title"]').val(),
	        desc = $form.find('#desc').val(),
	        type = $("input[name='type']").val(),
	        tag = $("input[name='tag']").val(),
	        word = $("input[name='word']").val(),
	        status = 1,
	        cat = $("input[name='cat']").val();

	    var post_str = "type=" + type + "&title=" + title + "&desc=" + desc +
	    	"&tag=" + tag + "&word=" + word + "&status=" + status +
	    	"&cat=" + cat;
	    if (type == undefined || type == null || type.length < 1) {
	      type = 0;
	    }
	    if (type != 0) {
	      $.ajax({
	        url: "add-item.php",
	        data: post_str,
	        type: "POST"
	      }).done(function(data) {
	      	alert("添加成功!");
	        location.href = "index.php";
	      });
	    } else {
	      $.ajax({
	        url: "add-address.php",
	        data: "addr_tag=" + addr_tag + "&address=" + address + "&addr_status=" +
	          addr_status + "",
	        type: "POST" 
	      }).done(function(data) {
	        location.href = "my-address.php";
	      });
	    }
	  });
  }
}

$(function() {
	// for the add item page form
	addNewItem();
});

