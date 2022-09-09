$(document).ready( function () {
    $('.table').DataTable();
});
function mydelete(str)
{
    var conf = confirm("Are you sure want to delete user");
	if( conf == true) {
	$.ajax(
	{
		url:'action.php?type=Delete',
		type : 'post',
		data : 'id='+str,
		success:function(res)
		{	
			if (res)
			{
				$('#row'+str).hide();
				$('#editmsg').html('Deleted successfully');
			}
			else{
				console.log('failed');
			}
		}
	});
}
}
jQuery(document).ready(function() {
	
	jQuery("#emp_editform").validate({
		rules: {
			regno:{
				required:true,
				maxlength:10,
			},
			empname:{
				required:true, 
			},
			empdeg:{
				required:true, 
			},
			empemail:{
				required:true,
				email: true,
			},
			empphone:{
				required:true,
				maxlength:10,
				minlength:10, 
				number: true,
			},
			empdate:{
				required:true, 
			}
		},
			messages:{
				regno:{
					required:"reg no is required",
					maxlength:"length must not exceed 10",
				},
				empname:{
					required:"please enter name", 
				},
				empdeg:{
					required:"please enter deg", 
				},
				empemail:{
					required:"please enter email address",
					email: "please provide valid email",
				},
				empphone:{
					required:"please enter phone number",
					maxlength:"phpne must be 10 digit",
					minlength:"phpne must be 10 digit", 
					number: "phone must be digit"
				},
				empdate:{
					required:"enter valid date", 
				}
			}
	});
	});
function myedit(str)
{
	var regno = $('#regno'+str).text();
	var empname = $('#empname'+str).text();
	var empdeg = $('#empdeg'+str).text();
    var empemail = $('#empemail'+str).text();
    var empphone = $('#empphone'+str).text();
    var empdate = $('#empdate'+str).text();
	
	$('#regno').val(regno);
    $('#empname').val(empname)
	$('#empdeg').val(empdeg);
	$('#empemail').val(empemail);
    $('#empphone').val(empphone);
    $('#empdate').val(empdate);
	$('#editdiv').show();
	$('#emp_editform').on('submit',function(e)
	{
		e.preventDefault();
		var newregno =$('#regno').val();
        var newempname = $('#empname').val();
		var newempdeg =$('#empdeg').val();
		var newempemail =$('#empemail').val();
        var newempphone =$('#empphone').val();
        var newempdate =$('#empdate').val();
		console.log(newregno);
		if($('#emp_editform').valid())
		{
		$.ajax({
			url:'action.php?type=Update',
			type:'post',
			data: 'empid='+str+'&regno='+newregno+'&empname='+newempname+'&empdeg='+newempdeg+'&empemail='+newempemail+'&empphone='+newempphone+'&empdate='+newempdate,
			success: function(res)
			{
				if(res == true){
                 $('#regno'+str).text(newregno);
                    $('#empname'+str).text(newempname);
                    $('#empdeg'+str).text(newempdeg);
                    $('#empemail'+str).text(newempemail);
                    $('#empphone'+str).text(newempphone);
                    $('#empdate'+str).text(newempdate);
					$('#editdiv').hide();
					$('#editmsg').html('edited successfully');
					}
					else
					{
						console.log('fail');
					}
			}
		});
	}
	
});	
}
jQuery(document).ready(function() {
	
	jQuery("#emp_addform").validate({
		rules: {
			regno:{
				required:true,
				maxlength:10,
			},
			empname:{
				required:true, 
			},
			empdeg:{
				required:true, 
			},
			empemail:{
				required:true,
				email: true,
			},
			empphone:{
				required:true,
				maxlength:10, 
				number: true,
			},
			empdate:{
				required:true, 
			}
		},
			messages:{
				regno:{
					required:"reg no is required",
					maxlength:"length must not exceed 10",
				},
				empname:{
					required:"please enter name", 
				},
				empdeg:{
					required:"please enter deg", 
				},
				empemail:{
					required:"please enter email address",
					email: "please provide valid email",
				},
				empphone:{
					required:"please enter phone number",
					maxlength:"phpne must be 10 digit", 
					number: "phone must be digit"
				},
				empdate:{
					required:"enter valid date", 
				}
			}
	});
	});

	$('#emp_addform').on('submit',newadd);
	function newadd(e)
	{	
		e.preventDefault(); //prevent the default action
		if($('#emp_addform').valid())
		{
	   	   var regno = $('#reg1').val();
		   var name = $('#name1').val();
		   var deg = $('#deg1').val();
		   var email = $('#email1').val();
		   var phone = $('#phone1').val();
		   var date1 = $('#date1').val();
		   $.ajax({
			   url:'action.php?type=add',
			   type: 'post',
			   data:'regno='+regno+'&name='+name+'&deg='+deg+'&email='+email+'&phone='+phone+'&date1='+date1,
			   success:function(res)
			   {
				   $('#emptable').append('<tr id="row'+res+'"><th scope="row" id="empid'+res+'">'+res+'</th><td id="regno'+res+'">'+regno+'</td><td id="empname'+res+'">'+name+'</td><td id="empdeg'+res+'">'+deg+'</td><td id="empemail'+res+'">'+email+'</td><td id="empphone'+res+'">'+phone+'</td><td id="empdate'+res+'">'+date1+'</td><td id="edit'+res+'"><button onclick="myedit('+res+')">Edit</button></td><td id="delete'+res+'"><button onclick="mydelete('+res+')">Delete</button></td></tr>');
				   $('#editmsg').html('added successfully');
				   $('#adduserdetail').hide();
			   }
		   });
		}
	}
   