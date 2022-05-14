<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);

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

<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="validation/css/vstyle.css">

<script src="assets/js/ace-extra.min.js"></script>
<script src="<?php echo CK?>"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body class="no-skin">
<?php include("inc/header.inc.php");?>
<div class="password-alert"></div>
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
<a href="dashboard.php">Home</a>
</li>

<li class="active">
Change Password
</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>
Change Password
</h1>
</div>
<?php 
if($_POST['submit']=='submit')
{
$sql=mysql_query_db("select * from tbl_superadmin where id='".$_SESSION['sess_admin_id']."'");
$line=mysql_fetch_db($sql);
if(($npassword!=$rpassword)&&($npassword!=''))
{
warninMessage("");
$_SESSION['sess_msg']='Password does not matched!!!';

}
else if($line['password']!=$password)
{
warninMessage("");
$_SESSION['sess_msg']='Incorrect Old Password !!';

}
else
{
mysql_query_db("update tbl_superadmin set password='$npassword',modify_date=now() where id='".$_SESSION['sess_admin_id']."'");
$_SESSION['sess_msg']='Password Changed Successfully!!';
}
}
;?>
<div class="row">

<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" method="post" name="frm_add" id="frm_add">
<input type="hidden" name="submitform" id="submitform" value="yes">
<?php if($_SESSION['sess_msg']){?>
<div class="panel-heading warning"><strong><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']='';?></strong></div>
<?php }?>
<?php if($_SESSION['sess_warn']){?>
<div class="alert alert-danger">
  <strong class="red"><i class="ace-icon fa fa-close red"></i> <?php echo $_SESSION['sess_warn'];$_SESSION['sess_warn']='';?></strong>
</div>
<?php }?>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Old Password <span class="red">*</span></label>

<div class="col-sm-9">
<input type="password" id="password" name="password" required placeholder="Enter Password" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> New Password <span class="red">*</span></label>

<div class="col-sm-9">
<input type="password" id="npassword" name="npassword" required placeholder="Enter New Password" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Confirm Password <span class="red">*</span></label>

<div class="col-sm-9">
<input type="password" id="rpassword" name="rpassword"  required placeholder="Enter Password" class="col-xs-10 col-sm-4" /> 
</div>
</div>





<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">

<input class="btn btn-info" type="submit" name="submit" id="submit" value="submit">
</div>
</div>
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

<!--[if !IE]> -->
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

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
function category_ajax(d){
var dataString = "parent=" + d;
$.ajax({
type: "POST",
url: "subcat.php",
data: dataString,
crossDomain: true,
cache: false,
async: false,
beforeSend: function() {
document.getElementById('cate_ajax').innerHTML="Please wait <img src='loading.gif'>";
},
success: function(data) {
document.getElementById('cate_ajax').innerHTML=data;
}
});
}
</script>
<script src="validation/js/jquery-1.11.1.min.js"></script>
<script src="validation/js/jquery.validate.min.js"></script>
<script src="validation/js/additional-methods.min.js"></script>
<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
//debug: true,
success: "valid"
});
$( "#frm_add" ).validate({
rules: {
category: {
required: true,
minlength: 3
},
parent_id: {
required: true
},
}
});
</script>

</body>
</html>
