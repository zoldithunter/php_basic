var id=null;

$(document).ready(function(){
	loadData();
	$('#btnUpdate').attr('disabled','disabled');
	$('#btnDel').attr('disabled','disabled');
	$('form input[type="submit"]').click(function(e){
		e.preventDefault();
		if ($(this).attr('name') == 'addUser') {
			insertData();
		} else if ($(this).attr('name') == 'updateUser') {
			updateData();
		} else if ($(this).attr('name') == 'delUser') {
			if (confirm("Are you sure delete this user?")) {
				delData();
			}
		};
		refresh();
		loadData();
	});
});


function loadData() {
	$.ajax({
		url: 'src/load_all.php',
		dataType: 'json',
		success: function(respone){
			var stringData = '';
			var len = respone.length;
			stringData += '<thead><tr><th>Id</th><th>Password</th><th>User</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Date</th></tr></thead>';
			stringData += '<tbody>';
			for (var i=0; i<len; i++) {
				stringData += '<tr>';
				stringData += '<td>' + respone[i].id + '</td>';
				stringData += '<td>' + respone[i].password + '</td>';
				stringData += '<td>' + respone[i].username + '</td>';
				stringData += '<td>' + respone[i].fullname + '</td>';
				stringData += '<td>' + respone[i].phone + '</td>';
				stringData += '<td>' + respone[i].email + '</td>';
				stringData += '<td>' + respone[i].date + '</td>';
				stringData += '</tr>';
			};
			stringData += '</tbody>';
			$('#tableData').html(stringData);
			hideCol();
			$('#tableData tbody tr').click(function() {
				id = $(this).find('td:first-child').text();
				$('form input[name="password"]').val($(this).find('td:nth-child(2)').text());
				$('form input[name="username"]').val($(this).find('td:nth-child(3)').text());
				$('form input[name="fullname"]').val($(this).find('td:nth-child(4)').text());
				$('form input[name="phone"]').val($(this).find('td:nth-child(5)').text());
				$('form input[name="email"]').val($(this).find('td:nth-child(6)').text());
				$('#btnUpdate').removeAttr('disabled');
				$('#btnDel').removeAttr('disabled');
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
		url: 'src/insert.php',
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
			$('#message').fadeIn();
			$('#message').html(respone);
			$('#message').fadeOut(10000);
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
		url: 'src/update.php',
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
			$('#message').fadeIn();
			$('#message').html(respone);
			$('#message').fadeOut(10000);
			console.log(respone);
		},
		error: function(e) {
			console.log(e);
		},
		async: false
	})
}

function delData() {
	$.ajax({
		url: 'src/del.php',
		method: 'POST',
		data: {
			delUser: true,
			id: id
		},
		success: function(respone){
			$('#message').fadeIn();
			$('#message').html(respone);
			$('#message').fadeOut(10000);
			console.log(respone);
		},
		error: function(e) {
			console.log(e);
		},
		async: false
	})
}

function refresh() {
	$('form input[name="username"]').val('');
	$('form input[name="password"]').val('');
	$('form input[name="repassword"]').val('');
	$('form input[name="fullname"]').val('');
	$('form input[name="phone"]').val('');
	$('form input[name="email"]').val('');
	$('#btnUpdate').attr('disabled','disabled');
	$('#btnDel').attr('disabled','disabled');
}

function hideCol() {
	$('#tableData tbody tr td:first-child').hide();
	$('#tableData thead tr th:first-child').hide();
	$('#tableData tbody tr td:nth-child(2)').hide();
	$('#tableData thead tr th:nth-child(2)').hide();
}