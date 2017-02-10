function reg(){
	var login = document.getElementById("logReg").value;
	var pas = document.getElementById("pasReg").value;
	var email = document.getElementById("emailReg").value;
	var tel = document.getElementById("telReg").value;
	$.ajax({
		url: './ajax/regF.php',
		type: 'Post',
		cache: false,
		data: {'login': login, 'pas':pas, 'email': email, 'tel':tel},
		dataType: 'html',
		success: function (data){
			alert(data);
		}
	});
}