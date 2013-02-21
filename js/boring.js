function checkEmptyVar(str) {
	if (str == "" || str.length < 1 || str == undefined || str == 'undefined') {
		return false;
	}
	return true;
}

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
	      alert("出错啦!");
	      return false;
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
	    }
	  });
  }
}

function actRegForm() {
	if ($("#regForm")) {
		$("#regForm").submit(function(event) {
	    event.preventDefault();
	    
	    var $form = $(this),
	        email = $form.find('input[name="email"]').val(),
	        pwd = $("input[name='password']").val(),
	        rp = $("input[name='rp']").val();
	    if (pwd != rp) {
	    	alert("两次密码都输不对, 再错就输三次!");
	    	$("input[name='password']").val('');
	    	$("input[name='rp']").val('');
	    	return false;
	    }

	    var post_str = "email=" + email + "&password=" + pwd;

		$.ajax({
			url: "register.php",
			data: post_str,
			type: "POST"
		}).done(function(data) {
			alert("添加成功!");
			location.href = "login.php";
		});
	  });
  }
}

$(function() {
	// for the add item page form
	addNewItem();
	actRegForm();
});

