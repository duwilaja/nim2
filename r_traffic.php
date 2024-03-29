<?php 
include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-table";
$page_title="Traffic";
$modal_title="";
$card_title="Traffic";

$menu="-";

$breadcrumb="Reports/$page_title";

include "inc.head.php";
include "inc.menutop.php";

include "lib_inc.db.php";
$conn=connect();
$sql="select device_id, name, hostname from devices join nimdb.core_node on hostname=host order by name";
$rs=fetch_all(exec_qry($conn,$sql));
disconnect($conn);

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
			<!--div class="page-rightheader">
				<a href="#" class="btn btn-primary" onclick="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create</a>
			</div-->
		</div>
		<!--End Page header-->
				<div class="mb-3">
					<div class="card-body">
						<div class="row">
							<div class="col-md-2"><div class="input-group">
								<input type="text" id="df" placeholder="From Date" class="form-control datepicker">
								<div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
							</div></div>
							<div class="col-md-2"><div class="input-group">
								<input type="text" id="dt" placeholder="To Date" class="form-control datepicker">
								<div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
							</div></div>
							<div class="col-md-6"><div class="input-group">
								<select id="hos" class="form-control">
									<option value="">--- Please Select ---</option>
									<?php echo options($rs)?>
								</select>
							</div></div>
							&nbsp;
							<button type="button" onclick="submit_r_trfc();" class="btn btn-primary col-md-1"><i class="fa fa-refresh"></i></button>&nbsp;
							<button type="button" id="btnpdf" onclick="CreatePDFfromHTML();" class="btn btn-success col-md-1 hidden"><i class="fa fa-file-pdf-o"></i></button>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header hidden">
						<div class="card-title"><?php echo $card_title?></div>
						<div class="card-options ">
							<a href="#" title="Expand/Collapse" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
							<!--a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a-->
						</div>
					</div>
					<div class="card-body">
						<div class="dimmer active ldr-inter hidden">
							<div class="sk-cube-grid">
								<div class="sk-cube sk-cube1"></div>
								<div class="sk-cube sk-cube2"></div>
								<div class="sk-cube sk-cube3"></div>
								<div class="sk-cube sk-cube4"></div>
								<div class="sk-cube sk-cube5"></div>
								<div class="sk-cube sk-cube6"></div>
								<div class="sk-cube sk-cube7"></div>
								<div class="sk-cube sk-cube8"></div>
								<div class="sk-cube sk-cube9"></div>
							</div>
						</div>
						<div id="prin"><h4 id="titel"></h4>
						<div id="isi-inter"></div>
						</div>
					
					</div>
				</div>

	</div>
</div><!-- end app-content-->

<?php 
include "inc.foot.php";
include "inc.js.php";
?>

<script type="text/javascript" src="vendor/pdf/jspdf.min.js"></script>
<script type="text/javascript" src="vendor/pdf/html2canvas.js"></script>

<script>
var hosts=<?php echo json_encode($rs)?>;
$(document).ready(function(){
	page_ready();
	datepicker(true);
	
});
function gethos(i){
	var rr='';
	for(var ii=0;ii<hosts.length;ii++){
		if(hosts[ii][0]==i) rr=hosts[ii][2];
	}
	return rr;
}
function gettitel(i){
	var rr='';
	for(var ii=0;ii<hosts.length;ii++){
		if(hosts[ii][0]==i) rr=hosts[ii][2]+'/'+hosts[ii][1];
	}
	return rr;
}
function  submit_r_trfc(){
	var id=$("#hos").val();
	$("#titel").html(gettitel(id));
	var h=gethos(id);
	if(h!='') {
		get_content("lib_device_inter<?php echo $ext?>",{h:h,idx:id,df:$("#df").val(),dt:$("#dt").val()},".ldr-inter","#isi-inter");
		$("#btnpdf").show();
	}
}

//Create PDf from HTML...
function CreatePDFfromHTML() {
	var id=$("#hos").val();
	var hos=gethos(id);
	
    var HTML_Width = $("#prin").width();
    var HTML_Height = $("#prin").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($("#prin")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save(hos+"_traffic.pdf");
        //$(".html-content").hide();
    });
}
</script>

  </body>
</html>