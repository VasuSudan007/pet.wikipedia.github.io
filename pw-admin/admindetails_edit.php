<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);
if($submitform=="yes")
{
if($id=='')
{
mysql_query_db("insert into tbl_admin set username='$username',password='$password',email='$email',phone='$phone',status=1,post_date=now()");
}
else
{
$sql="update tbl_admin set username='$username',password='$password',email='$email',phone='$phone',modify_date=now()";
$sql.=" where id='$id'";
mysql_query_db($sql);
}
header("location:admindetails.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_admin where id='$id'");
$line=mysql_fetch_db($sql);
@extract($line);
}
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
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="validation/css/vstyle.css">
<script src="assets/js/ace-extra.min.js"></script>
<script src="<?php echo CK?>"></script>
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
<li class="active">Edit Admin Status</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>View Enquiry Form</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" method="post" name="frm_add" id="frm_add" enctype="multipart/form-data">
<input type="hidden" name="submitform" id="submitform" value="yes">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<input type="hidden" name="start" id="start" value="<?php echo $start;?>">


  

    
  <form action=""  method="post" name="frm_register" id="frm_register">
    <h2 class="contact-one__title text-center">Admin Status<br>
                    </h2><!-- /.contact-one__title -->
<input type="hidden" name="id"  id="id"  value="<?php echo $id;?>">
<input type="hidden" name="start" id="start" value="<?php echo $start;?>">
<div class="row low-gutters">
<div class="col-lg-6">
<label for="edit-name"> Username <span class="form-required" title="" style="color:#CC0000">*</span></label><br>
<input type="text" required id="username" name="username" title="Please enter your f.name" value="<?php echo $username;?>" size="60" maxlength="60" class="form-text required" placeholder=" Please enter Father's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name"> Password <span class="form-required" title="" style="color:#CC0000">*</span></label><br>
<input type="text" required id="password" name="password" title="Please enter your f.name" value="<?php echo $password;?>" size="60" maxlength="60" class="form-text required" placeholder=" Please enter Father's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name"> Email <span class="form-required" title="" style="color:#CC0000">*</span></label><br>
<input type="text" required id="email" name="email" title="Please enter your f.name" value="<?php echo $email;?>" size="60" maxlength="60" class="form-text required" placeholder=" Please enter Father's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name"> Phone No. <span class="form-required" title="" style="color:#CC0000">*</span></label><br>
<input type="text" required id="phone" name="phone" title="Please enter your f.name" value="<?php echo $phone;?>" size="60" maxlength="60" class="form-text required" placeholder=" Please enter Father's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name"> Username <span class="form-required" title="" style="color:#CC0000">*</span></label><br>
<input type="text" required id="fname" name="fname" title="Please enter your f.name" value="<?php echo $username;?>" size="60" maxlength="60" class="form-text required" placeholder=" Please enter Father's Name ">
</div>


</div>
<br>
<br>
<div class="col-md-offset-3 col-md-9">
<input class="btn btn-info" type="submit" name="submit" value="submit">
</div></form>
<!-- New Form Ends -->

<br>

</form>
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include("inc/footer.inc.php");?>
</div><!-- /.main-container -->
<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
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
},

}
});
</script>
</body>
</html>
