<?php 
include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-table";
$page_title="Title of Page";
$modal_title="Title of Modal";
$menu="devices";

$breadcrumb="Parent/$page_title";

include "inc.head.php";
include "inc.menutop.php";
?>

<div class="app-content page-body">
	<div class="container">

		<!--Page header-->
		<div class="page-header">
			<div class="page-leftheader">
				<h4 class="page-title"><?php echo $page_title ?></h4>
				<ol class="breadcrumb pl-0">
					<?php echo breadcrumb($breadcrumb)?>
				</ol>
			</div>
			<div class="page-rightheader">
				<a href="#" class="btn btn-primary" onclick="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create</a>
			</div>
		</div>
		<!--End Page header-->
		
				<div class="card">
					<div class="card-header">
						<div class="card-title">Data Tables</div>
						<div class="card-options ">
							<a href="#" title="Batch" class=""><i class="fe fe-upload"></i></a>
							<a href="#" onclick="openForm(0);" data-toggle="modal" data-target="#myModal" title="Add" class=""><i class="fe fe-plus"></i></a>
							<a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
							<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="mytbl" class="table table-striped table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-15p">First name</th>
										<th class="wd-15p">Last name</th>
										<th class="wd-20p">Position</th>
										<th class="wd-15p">Start date</th>
										<th class="wd-10p">Salary</th>
										<th class="wd-25p">E-mail</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Bella</td>
										<td>Chloe</td>
										<td>System Developer</td>
										<td>2018/03/12</td>
										<td>$654,765</td>
										<td>b.Chloe@datatables.net</td>
									</tr>
									<tr>
										<td>Donna</td>
										<td>Bond</td>
										<td>Account Manager</td>
										<td>2012/02/21</td>
										<td>$543,654</td>
										<td>d.bond@datatables.net</td>
									</tr>
									<tr>
										<td>Harry</td>
										<td>Carr</td>
										<td>Technical Manager</td>
										<td>20011/02/87</td>
										<td>$86,000</td>
										<td>h.carr@datatables.net</td>
									</tr>
									<tr>
										<td>Lucas</td>
										<td>Dyer</td>
										<td>Javascript Developer</td>
										<td>2014/08/23</td>
										<td>$456,123</td>
										<td>l.dyer@datatables.net</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

	</div>
</div><!-- end app-content-->

<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title"><?php echo $modal_title?></strong>
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
	  </div>
	  <div class="modal-body">
		<!--p>Lorem ipsum dolor sit amet consectetur.</p-->
		<form id="myf" class="form-horizontal">
		  <div class="form-group">
			<label>Text</label>
			<input type="text" id="tx" name="tx" placeholder="Your text here" class="form-control">
		  </div>
		  <div class="row">
			  <div class="form-group col-md-6">
				<label class="form-control-label">Date</label>
				<div class="input-group">
					<input type="text" id="dt" name="dt" placeholder="Date" class="form-control datepicker">
					<div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
				</div>
			  </div>
			  <div class="form-group col-md-6">
				<label class="form-control-label">Time</label>
				<div class="input-group">
					<input type="text" id="tm" name="tm" placeholder="Time" class="form-control timepicker">
					<div class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
				</div>
			  </div>
		  </div>
		  <div class="row">
			  <div class="form-group col-md-6">       
				<label>Select</label>
				<select class="form-control selectpicker">
					<option>option 1</option>
					<option>option 2</option>
					<option>option 3</option>
					<option>option 4</option>
				</select>
			  </div>
			  <div class="form-group col-md-6">       
				<label>Multiple Select</label>
				<select multiple class="form-control selectpicker">
					<option>option 1</option>
					<option>option 2</option>
					<option>option 3</option>
					<option>option 4</option>
				</select>
			  </div>
		  </div>
		</form>
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger">Delete</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn btn-success" onclick="if($('#myf').valid()){log('valid');}else{log('invalid');}">Save</button>
	  </div>
	</div>
  </div>
</div>

<?php 
include "inc.foot.php";
include "inc.js.php";
?>

<script>
var mytbl, jvalidate;
$(document).ready(function(){
	page_ready();
	mytbl = $("#mytbl").DataTable({
		serverSide: false,
		processing: true,
		searching: false,
		buttons: ['copy', 'csv'],
		initComplete: function(){
			//dttbl_buttons(); //for ajax call
		}
	});
	dttbl_buttons(); //remark this if ajax dttbl call
	datepicker(true);
	timepicker();
	jvalidate = $("#myf").validate({
    rules :{
        "tx" : {
            required : true
        },
		"tm" : {
			required : true
		}
    }});
});

</script>

  </body>
</html>