<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Customer | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 <script>
	function phonenumber()
	{
		var phoneno = /^\d{10}$/;          
		if(document.getElementById("txtTell").value=="")
		{
		}
		else
		{
			if( document.getElementById("txtTell").value.match(phoneno))
			{
			
				hand();
			}
			else
			{
				alert("Enter 10 digit Mobile Number");
				document.getElementById("txtTell").value="";
				document.getElementById("txtTell").focus()=true;		
				return false;
			}
		}	 
	}
	function hand()
	{
		var str = document.getElementById("txtTell").value;
		var res = str.substring(0, 2);
		if(res=="07")
		{
			return true;
		}
		else
		{
				alert("Enter 10 digit of Mobile Number start with 07xxxxxxxx");
				document.getElementById("txtTell").value="";
				document.getElementById("txtTell").focus()=true;			
				return false;
		}
		
	}
	function nicnumber()
	{
		var nic=document.getElementById("txtNIC").value;
		if(nic.length==10)
		{
			var nicformat1=/^[0-9]{9}[a-zA-Z0-9]{1}$/;
			if(nic.match(nicformat1))
			{
				var nicformat2=/^[0-9]{9}[vVxX]{1}$/;
				if(nic.match(nicformat2))
				{
					calculatedob(nic);
				}
				else
				{
					alert("Last character must be V/v/X/x...!\nHint: 762042410V or 762042410X");
					document.getElementById("txtNIC").value="";
					document.getElementById("txtNIC").focus();
				
				}
			}
			else
			{
				alert("First 9 characters must be numbers...!");
				document.getElementById("txtNIC").value="";	
				document.getElementById("txtNIC").focus();
			
			}	
		}
		else if(nic.length==12)
		{
		
			var nicformat3=/^[0-9]{12}$/;
			if(nic.match(nicformat3))
				{
					calculatedob(nic);
				}
				else
				{
					alert("All 12 characters must be numbers...!");
					document.getElementById("txtNIC").value="";
					document.getElementById("txtNIC").focus();
				
				}
		}
		else if(nic.length==0)
		{
				
		}
		else
		{
			alert("NIC No must be contain 10 or 12 Characters...!\nRetype the correct NIC nuimber...\nHint: 762042410V or 200020424105");
			document.getElementById("txtNIC").value="";
			document.getElementById("txtNIC").focus();	
		
		}
	}

	function isNumberKey(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

			return true;
	}

function isTextKey(evt) 
	{
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if (((charCode >64 && charCode < 91)||(charCode >96 && charCode < 123)||charCode ==08 || charCode ==127||charCode ==32||charCode ==46)&&(!(evt.ctrlKey&&(charCode==118||charCode==86))))
			return true;

			return false;
	}


function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{

document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address...!\nRetype the correct email address...\nHint:\n Some valid email formats are...\n a@b.cd, ab-cd@ef.gh, ab.cd@ef.ghi, abc_def@mail.com");    
document.getElementById("txtEmail").value="";
document.form1.text1.focus();
return false;
}
}
    </script>
 </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
	    include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>
      <div class="content-wrapper">
          <section class="content-header">
            <br/>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"> Customer </li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
	          	
             <div class="col-md-16">
              <div class="box box-primary">
                
                <div class="box-body">
 
                <div class="box-header">
                  <h3 class="box-title">Add New  Customer </h3>
                </div>
                <div class="box-body">
                          <form method="post" action="customerAdd.php" enctype="multipart/form-data" class="form-horizontal">
					

					<div class="form-group">
						<label for="date">   Name</label>
						<div class="input-group col-md-12">
						  <input type="text" class="form-control pull-right" id="Name" name="Name"  autocomplete="off"   required>
						</div>
					  </div>
		         <div class="form-group">
                    <label for="date">   Address</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="Address" name="Address"  autocomplete="off"  required></textarea>
                    </div>
                  </div>
               <div class="form-group">
                    <label for="date">  Mobile Number</label>
                    <div class="input-group col-md-12">
  <input type="number" class="form-control" maxlength="10" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell"  name="txtTell" autocomplete="off" required  >

 </div>
                  </div>
				  
			

				
<div class="form-group">
						<label for="date">   Email Address </label>
						<div class="input-group col-md-12">
						  <input type="email" class="form-control pull-right" id="email" name="email"  autocomplete="off"   required>
						</div>
					  </div>


					  
			 <div class="form-group">
						<label for="date">   Password   </label>
						<div class="input-group col-md-12">
   <input type="Password" class="form-control pull-right" id="Password" name="Password"  autocomplete="off"   required>
						</div>
					  </div>

				  
				 
				  
				
					  <div class="form-group">
						 
						  <button class="btn btn-primary" id="daterange-btn" name="">
							Save
						  </button>
						  <button class="btn" id="daterange-btn">
							Clear
						  </button>
						 
					  </div>
				  </form>	
                </div>
              </div>
            </div>
		  
            </div>

            
          </section>
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
