<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
require_once("../codelibrary/inc/newfn.php");
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

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="assets/css/bootpag.css" />
<link rel="stylesheet" href="assets/css/custom.css" /
<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

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
frmobj.action = ".php";
frmobj.submit();
}
else{ 
return false;
}
}
else if(comb=='Deactivate'){
frmobj.action = ".php";
frmobj.submit();
}
else if(comb=='Activate'){
frmobj.action = ".php";
frmobj.submit();
}
}
function checkauto(cm,vla)
{
document.getElementById('foo'+cm).checked=true;
location.href='.php?submits=Delete&ids[]='+vla;
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
<a href="dashboard.php">Home / Admin Status  </a>
</li>

<li class="active">
Manage Admin Status
</li>
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
<h1>
Manage Admin Status 
</h1>
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

<th class="center">Admin Username</th>
<th class="center">Password</th>
<th class="center">Phone</th>
<th class="center">Email</th>
<th class="center">Last upadted on</th>
<th class="center">Created By</th>
<th class="center">Powered By</th>
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
$wh.=" and title REGEXP '$keywordn'";
}
$sql=mysql_query_db("select * from tbl_admin where 1=1 $wh order by $order_by $order_by2 limit $start,$pagesize");
$reccnt=mysql_num_db(mysql_query_db("select * from tbl_admin where 1=1 $wh"));
if($reccnt>0){
$f=1;
while($line=mysql_fetch_db($sql))
{?>

<tr<?php if($f%2==0){?> class="active"<?php }?>>


<td class="center"><?php echo stripslashes($line['username']);?></td>
<td class="center"><?php echo stripslashes($line['password']);?></td>
<td class="center"><?php echo stripslashes($line['phone']);?></td>
<td class="center"><?php echo stripslashes($line['email']);?></td>
<td class="center"><?php echo stripslashes($line['modify_date']);?></td>
<td class="center"><?php echo stripslashes($line['creator']);?></td>
<td class="center"><?php echo stripslashes($line['powered']);?></td>


</ul>
</div>
</div>
</td>
</tr>
<button class="btn btn-xs btn-info" type="button" onClick="location.href='admindetails_edit.php?id=<?php echo $line['id'];?>&start=<?php echo $start;?>'">
<i class="ace-icon fa fa-pencil bigger-120">    Edit</i>
</button>
<?php $f++;}?>


<?php }else{?>

<tr><td class="text-center red" colspan="100%">Sorry No Records Found!!</td></tr>
<?php }?>
</tbody>
</table>
</form>
    
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

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
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
