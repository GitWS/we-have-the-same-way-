function relog(){
	$.ajax({
		url: './ajax/relogF.php',
		type: 'Post',
		cache: false,
		dataType: 'html',
		success: function (data){
			alert(data);
		}
	});
}