<?php 
include "inc.common.php";
include "inc.session.php";

$page_icon="fa fa-home";
$page_title="Report";
$modal_title="Title of Modal";
$menu="";

include "inc.head.php";
//include "inc.menutop.php";
include "inc.db.php";

$conn=connect();
$j=get('j',$conn);
$sql="select  * from core_bgrpt where job='$j'";
$rpt=fetch_alla(exec_qry($conn,$sql));
$sql="select  * from core_bgrptjob where job='$j'";
$recs=fetch_alla(exec_qry($conn,$sql));
disconnect($conn);

if(count($rpt)<1 && count($recs)<1) die("no data found");
 
?>
				<div class="app-content page-body">
					<div class="container" style="text-align:center">
					<h5><?php echo $rpt[0]['ttl']?></h5>
					<h6><?php echo str_ireplace("\n","<br />",$rpt[0]['dscr'])?></h6>
						<div class="row">
						<?php foreach($recs as $r){?>
							<div class="col-md-6 col-sm-12">
							<?php echo $r['host']?> - <?php echo $r['nm']?><br />
							<img style="width:100%" src="<?php echo $rpt_dir.$r['job'].'/'.$r['host']?>.png" />
							</div>
						<?php }?>
						</div>
					</div>
				</div><!-- end app-content-->
				
			<!-- Main Content-->
			<div class="main-content side-content pt-0">
<?php 
//include "inc.foot.php";
include "inc.js.php";
?>
<script>
$(document).ready(function(){
	page_ready();
})
</script>

  </body>
</html>