<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
if($_POST['pagelength']){$_SESSION['sess_pagelength']=$_POST['pagelength'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo SITE_ADMIN_TITLE;?></title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<!-- text fonts -->
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="assets/css/bootpag.css" />
<link rel="stylesheet" href="assets/css/custom.css" /
<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<!-- ace settings handler -->
<script src="assets/js/ace-extra.min.js"></script>
<script src="<?php echo CK?>"></script>
<script>
function checkall(ele)
{
var checkboxes = document.getElementsByTagName('input');
if (ele.checked) {
for (var i = 0; i < checkboxes.length; i++) {
if (checkboxes[i].type == 'checkbox') {
 checkboxes[i].checked = true;
}
}
} else {
for (var i = 0; i < checkboxes.length; i++) {
console.log(i)
if (checkboxes[i].type == 'checkbox') {
 checkboxes[i].checked = false;
}
}
}
}
function del_prompt(frmobj,comb,id)
{
if(comb=='Delete'){
if(confirm ("Are you sure you want to delete Record(s)")){
frmobj.action = "aboutus_del.php";
frmobj.submit();
}
else{ 
return false;
}
}
else if(comb=='Deactivate'){
frmobj.action = "aboutus_del.php";
frmobj.submit();
}
else if(comb=='Activate'){
frmobj.action = "aboutus_del.php";
frmobj.submit();
}
}
function checkauto(cm,vla)
{
document.getElementById('foo'+cm).checked=true;
location.href='aboutus_del.php?submits=Delete&ids[]='+vla;
}
</script>
</head>
<body class="no-skin">
<?php include("inc/header.inc.php");?>
<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
try{ace.settings.loadState('main-container')}catch(e){}
</script>
<?php include("inc/sidebar.php");?>
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
<i class="ace-icon fa fa-home home-icon"></i>
<a href="dashboard.php">Home / Website Content  </a>
</li>
<li class="active">Edit About Us</li>
</ul><!-- /.breadcrumb -->
<div class="nav-search" id="nav-search">
<form class="form-search" name="frm_search">
<span class="input-icon">
<input type="text" name="keywordn" placeholder="Search ..." value="<?php echo $keywordn;?>" class="nav-search-input" id="nav-search-input" autocomplete="off" />
<i class="ace-icon fa fa-search nav-search-icon" onClick="document.frm_search.submit()"></i>
</span>
</form>
</div><!-- /.nav-search -->
</div>
<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>Edit About Us page</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form name="frm_list" method="post">
<table id="simple-table" class="table  table-bordered table-hover">
<?php if($_SESSION['sess_warn']){?>
<div class="alert alert-danger">
<strong class="red"><i class="ace-icon fa fa-close red"></i> <?php echo $_SESSION['sess_warn'];$_SESSION['sess_warn']='';?></strong>
</div>
<?php }?>
<?php if($_SESSION['sess_succ']){?>
<div class="alert alert-success">
<strong class="green"><i class="ace-icon fa fa-check green"></i> <?php echo $_SESSION['sess_succ'];$_SESSION['sess_succ']='';?></strong>
</div>
<?php }?>
<thead>

<tr>

<th class="center">Title</th>
<th class="center">Paragraph 1</th>
<th class="center">Paragraph 2</th>
<th class="center">Action</th>
</tr>
</thead>

<tbody>
<?php $start=0;
if(isset($_GET['start'])) $start=(int)$_GET['start'];
if($_SESSION['sess_pagelength']){$pagesize=$_SESSION['sess_pagelength'];}else{$pagesize=25;}
if(isset($_GET['pagesize'])) $pagesize=$_GET['pagesize'];
$order_by='id';
if(isset($_GET['order_by'])) $order_by=$_GET['order_by'];
$order_by2='desc';
if(isset($_GET['order_by2'])) $order_by2=$_GET['order_by2'];
if($keywordn)
{
$wh.=" and category REGEXP '$keywordn'";
}
$sql=mysql_query_db("select * from tbl_aboutus where 1=1 $wh order by $order_by $order_by2 limit $start,$pagesize");
$reccnt=mysql_num_db(mysql_query_db("select * from tbl_aboutus where 1=1 $wh"));
if($reccnt>0){
$f=1;
while($line=mysql_fetch_db($sql))
{?>

<tr<?php if($f%2==0){?> class="active"<?php }?>>

<td class="center"><?php echo stripslashes($line['title']);?></td>
<td class="center"><?php echo stripslashes($line['para1']);?></td>
<td class="center"><?php echo stripslashes($line['para2']);?></td>

<td class="center">
<div class="hidden-sm hidden-xs btn-group">
<button class="btn btn-xs btn-info" type="button" onClick="location.href='aboutus_addf.php?id=<?php echo $line['id'];?>&start=<?php echo $start;?>'">
<i class="ace-icon fa fa-pencil bigger-120">    Edit</i>
</button>



<div class="hidden-md hidden-lg">
<div class="inline pos-rel">
<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
</button>

<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
<li>
<a href="javascript:void(0)" aboutus_addf.php?id=<?php echo $line['id'];?>&start=<?php echo $start;?> class="tooltip-success" data-rel="tooltip" title="Edit">
<span class="green">
<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
</span>
</a>
</li>


</ul>
</div>
</div>
</td>
</tr>
<?php $f++;}?>


<?php }else{?>

<tr><td class="text-center red" colspan="100%">Sorry No Records Found!!</td></tr>
<?php }?>
</tbody>
</table>
</form>
   <a href="../about.php" target="_blank" style="border: 10px solid #438EB9; background-color: #438EB9; color: white;">Preview in New Window</a> 
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include("inc/footer.inc.php");?>
</div><!-- /.main-container -->
<!-- basic scripts -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- page specific plugin scripts -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>
<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
</body>
</html>
