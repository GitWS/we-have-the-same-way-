function auth(){
	var login = document.getElementById("logAuth").value;
	var pas = document.getElementById("pasAuth").value;
	$.ajax({
		url: './ajax/authF.php',
		type: 'Post',
		cache: false,
		data: {'login': login, 'pas':pas},
		dataType: 'html',
		success: function (data){
			alert(data);
		}
	});
}