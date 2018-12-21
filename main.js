var id=null;

$(document).ready(function(){
	loadData();
	$('form input[type="submit"]').click(function(e){
		e.preventDefault();
		if ($(this).attr('name') == 'addUser') {
			insertData();
			refresh();
			loadData();
		} else if ($(this).attr('name') == 'updateUser') {
			updateData();
			refresh();
			loadData();
		} else if ($(this).attr('name') == 'delUser') {
			console.log('del user');
		};
	});
});


function loadData() {
	$.ajax({
		url: 'load_all.php',
		dataType: 'json',
		success: function(respone){
			var stringData = '';
			var len = respone.length;
			stringData += '<thead><tr><th>Id</th><th>User</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Date</th></tr></thead>';
			stringData += '<tbody>';
			for (var i=0; i<len; i++) {
				stringData += '<tr>';
				stringData += '<td>' + respone[i].id + '</td>';
				stringData += '<td>' + respone[i].username + '</td>';
				stringData += '<td>' + respone[i].fullname + '</td>';
				stringData += '<td>' + respone[i].phone + '</td>';
				stringData += '<td>' + respone[i].email + '</td>';
				stringData += '<td>' + respone[i].date + '</td>';
				stringData += '</tr>';
			};
			stringData += '</tbody>';
			$('#tableData').html(stringData);
			hideId();
			$('#tableData tbody tr').click(function() {
				id = $(this).find('td:first-child').text();
				$('form input[name="username"]').val($(this).find('td:nth-child(2)').text());
				$('form input[name="fullname"]').val($(this).find('td:nth-child(3)').text());
				$('form input[name="phone"]').val($(this).find('td:nth-child(4)').text());
				$('form input[name="email"]').val($(this).find('td:nth-child(5)').text());
			});
		},
		error: function(e) {
			console.log(e);
		},
		async : false
	});
}

function insertData() {
	$.ajax({
		url: 'insert.php',
		method: 'POST',
		data: {
			addUser: true,
			username: $('form input[name="username"]').val(),
			password: $('form input[name="password"]').val(),
			fullname: $('form input[name="fullname"]').val(),
			phone: $('form input[name="phone"]').val(),
			email: $('form input[name="email"]').val()
		},
		success: function(respone){
			console.log(respone);
		},
		error: function(e) {
			console.log(e);
		},
		async: false
	});
}

function updateData() {
	$.ajax({
		url: 'update.php',
		method: 'POST',
		data: {
			updateUser: true,
			id: id,
			username: $('form input[name="username"]').val(),
			password: $('form input[name="password"]').val(),
			fullname: $('form input[name="fullname"]').val(),
			phone: $('form input[name="phone"]').val(),
			email: $('form input[name="email"]').val()
		},
		success: function(respone){
			console.log(respone);
		},
		error: function(e) {
			console.log(e);
		},
		async: false
	})
}

function refresh() {
	$('form input[name="username"]').val(''),
	$('form input[name="password"]').val(''),
	$('form input[name="repassword"]').val(''),
	$('form input[name="fullname"]').val(''),
	$('form input[name="phone"]').val(''),
	$('form input[name="email"]').val('')
}

function hideId() {
	$('#tableData tbody tr td:first-child').hide();
	$('#tableData thead tr th:first-child').hide();
}