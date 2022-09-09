$(document).ready(function () {

	$('#emptable tfoot th').each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Search ' + title + '" />');
	});

	var table = $('#emptable').DataTable({
		initComplete: function () {
			// Apply the search
			this.api()
				.columns()
				.every(function () {
					var that = this;

					$('input', this.footer()).on('keyup change clear', function () {
						if (that.search() !== this.value) {
							that.search(this.value).draw();
						}
					});
				});
		},
	});
});

function mydelete(str) {
	var conf = confirm("Are you sure want to delete user");
	if (conf == true) {
		$.ajax(
			{
				url: 'action.php?type=Delete',
				type: 'post',
				data: 'id=' + str,
				success: function (res) {
					if (res) {
						$('#row' + str).hide();
						$('#editmsg').html('Deleted successfully');
					}
					else {
						console.log('failed');
					}
				}
			});
	}
}
jQuery(document).ready(function () {

	jQuery("#emp_editform").validate({
		rules: {
			regno: {
				required: true,
				maxlength: 10,
			},
			empname: {
				required: true,
			},
			empdeg: {
				required: true,
			},
			empemail: {
				required: true,
				email: true,
			},
			empphone: {
				required: true,
				maxlength: 10,
				minlength: 10,
				number: true,
			},
			empdate: {
				required: true,
			},
			hobby: {
				required: true,
			}
		},
		messages: {
			regno: {
				required: "reg no is required",
				maxlength: "length must not exceed 10",
			},
			empname: {
				required: "please enter name",
			},
			empdeg: {
				required: "please enter deg",
			},
			empemail: {
				required: "please enter email address",
				email: "please provide valid email",
			},
			empphone: {
				required: "please enter phone number",
				maxlength: "phpne must be 10 digit",
				minlength: "phpne must be 10 digit",
				number: "phone must be digit"
			},
			empdate: {
				required: "enter valid date",
			},
			hobby: {
				required: "please check out atleast one",
			}
		}
	});
});
function myedit(str) {
	var regno = $('#regno' + str).text();
	var empname = $('#empname' + str).text();
	var empdeg = $('#empdeg' + str).text();
	var empemail = $('#empemail' + str).text();
	var empphone = $('#empphone' + str).text();
	var empdate = $('#empdate' + str).text();
	var emphobby = $('#emphobby' + str).text();

	$('#regno').val(regno);
	$('#empname').val(empname)
	$('#empdeg').val(empdeg);
	$('#empemail').val(empemail);
	$('#empphone').val(empphone);
	$('#empdate').val(empdate);
	const hobby = emphobby.split(",");
	jQuery.each(hobby, function (i, val) {
		if (val.trim() == 'batminton') {
			$('#batminton').prop("checked", true);
		} else if (val.trim() == 'football') {
			$('#football').prop("checked", true);
		} else if (val.trim() == 'cricket') {
			$('#cricket').prop("checked", true);
		} else if (val.trim() == 'chess') {
			$('#chess').prop("checked", true);
		} else if (val.trim() == 'volleyball') {
			$('#volleyball').prop("checked", true);
		}
	});

	$('#editdiv').show();
	$('#emp_editform').on('submit', function (e) {
		e.preventDefault();
		var newregno = $('#regno').val();
		var newempname = $('#empname').val();
		var newempdeg = $('#empdeg').val();
		var newempemail = $('#empemail').val();
		var newempphone = $('#empphone').val();
		var newempdate = $('#empdate').val();
		var hobby = [];
		$.each($("input[name='hobby']:checked"), function () {
			hobby.push(($(this).val()));
		});
		var txthobby = hobby.join(", ");
		console.log(newregno);
		if ($('#emp_editform').valid()) {
			$.ajax({
				url: 'action.php?type=Update',
				type: 'post',
				data: 'empid=' + str + '&regno=' + newregno + '&empname=' + newempname + '&empdeg=' + newempdeg + '&empemail=' + newempemail + '&empphone=' + newempphone + '&empdate=' + newempdate + '&txthobby=' + txthobby,
				success: function (res) {
					if (res == true) {
						$('#regno' + str).text(newregno);
						$('#empname' + str).text(newempname);
						$('#empdeg' + str).text(newempdeg);
						$('#empemail' + str).text(newempemail);
						$('#empphone' + str).text(newempphone);
						$('#empdate' + str).text(newempdate);
						$('#emphobby' + str).text(txthobby);
						$('#editdiv').hide();
						$('#editmsg').html('edited successfully');
					}
					else {
						console.log('fail');
					}
				}
			});
		}

	});
}
jQuery(document).ready(function () {

	jQuery("#emp_addform").validate({
		rules: {
			regno: {
				required: true,
				maxlength: 10,
			},
			empname: {
				required: true,
			},
			empdeg: {
				required: true,
			},
			empemail: {
				required: true,
				email: true,
			},
			empphone: {
				required: true,
				maxlength: 10,
				number: true,
			},
			empdate: {
				required: true,
			},
			hobby: {
				required: true,
			}
		},
		messages: {
			regno: {
				required: "reg no is required",
				maxlength: "length must not exceed 10",
			},
			empname: {
				required: "please enter name",
			},
			empdeg: {
				required: "please enter deg",
			},
			empemail: {
				required: "please enter email address",
				email: "please provide valid email",
			},
			empphone: {
				required: "please enter phone number",
				maxlength: "phpne must be 10 digit",
				number: "phone must be digit"
			},
			empdate: {
				required: "enter valid date",
			},
			hobby: {
				required: "please check out atleast one",
			}
		},

	});
});

$('#emp_addform').on('submit', newadd);
function newadd(e) {
	e.preventDefault();
	if ($('#emp_addform').valid()) {
		var regno = $('#reg1').val();
		var name = $('#name1').val();
		var deg = $('#deg1').val();
		var email = $('#email1').val();
		var phone = $('#phone1').val();
		var date1 = $('#date1').val();
		var hobby = [];
		$.each($("input[name='hobby']:checked"), function () {
			hobby.push(($(this).val()));
		});
		var txthobby = hobby.join(", ");
		$.ajax({
			url: 'action.php?type=add',
			type: 'post',
			data: 'regno=' + regno + '&name=' + name + '&deg=' + deg + '&email=' + email + '&phone=' + phone + '&date1=' + date1 + '&txthobby=' + txthobby,
			success: function (res) {
				$('#emptable').append('<tr id="row' + res + '"><th scope="row" id="empid' + res + '">' + res + '</th><td id="regno' + res + '">' + regno + '</td><td id="empname' + res + '">' + name + '</td><td id="empdeg' + res + '">' + deg + '</td><td id="empemail' + res + '">' + email + '</td><td id="empphone' + res + '">' + phone + '</td><td id="empdate' + res + '">' + date1 + '</td><td id="emphobby' + res + '">' + txthobby + '</td><td id="edit' + res + '"><button onclick="myedit(' + res + ')">Edit</button></td><td id="delete' + res + '"><button onclick="mydelete(' + res + ')">Delete</button></td></tr>');
				$('#editmsg').html('added successfully');
				$('#adduserdetail').hide();
			}
		});
	}
}
