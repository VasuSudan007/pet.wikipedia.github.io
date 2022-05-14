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
mysql_query_db("insert into tbl_user set username='$username',password='$password',email='$email',sex='$sex',date='$date', month='$month',year='$year',subject='".addslashes($subject)."',status=1,post_date=now()");
}
else
{
$sql="update tbl_user set username='$username',password='$password',email='$email',sex='$sex',date='$date', month='$month',year='$year',subject='".addslashes($subject)."'";
$sql.=" where id='$id'";
mysql_query_db($sql);
}
header("location:users_list.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_user where id='$id'");
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
<a href="dashboard.php">Home</a>
</li>
<li class="active">Add users</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>Add users</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" method="post" name="frm_add" id="frm_add" enctype="multipart/form-data">
<input type="hidden" name="submitform" id="submitform" value="yes">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<input type="hidden" name="start" id="start" value="<?php echo $start;?>">

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Username<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="username" value="<?php echo $username;?>" name="username" title="please enter username" placeholder="Enter username" class="col-xs-10 col-sm-4" /> 
</div>
</div>
	<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Password<span class="red">*</span></label>
<div class="col-sm-9">
<input type="password" id="password" value="<?php echo $password;?>" name="password" title="please enter password" placeholder="Enter password" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Email<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="email" value="<?php echo $email;?>" name="email" title="please enter email" placeholder="Enter email" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Subject<span class="red">*</span></label>
<div class="col-sm-4">
<textarea name="subject" class="form-control"><?php echo stripslashes($subject);?></textarea> 
</div>
</div>
<?php
$dates=explode('-',$line['dob']);
?>
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Age<span class="red">*</span></label>
<div class="age_grid">
<div class="col-sm-1 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" id="inputGroupSelect01" name="date" value="<?php echo $date; ?>">
<option value="0">Date</option>
<?php for($i=1;$i<=31;$i++){?>
<option value="<?php echo $i;?>" <?php if($dates[2]==$i){?> selected<?php }?>><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-sm-1 form_box2"  for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" id="inputGroupSelect01" name="month" >
<option value="">Month</option>
<?php 
for($m=1; $m<=12; $m++){
$mm=str_pad($m, 2, '0', STR_PAD_LEFT);
?>
<option value="<?php echo $mm;?>" <?php if($dates[1]==$m){?> selected<?php }?>><?php echo date('F', mktime(0, 0, 0, $m, 1)).'<br>';?></Option>
<?php }?>
</select>
</div>
</div>
<div class="col-sm-1 form_box1" for="inputGroupSelect01">
<?php
$cury=date("Y");
$cury1=date('Y-m-d', strtotime($cury. ' - 18 year'));
$cury=date("Y",strtotime($cury1));
$curyc=date('Y-m-d', strtotime($cury. ' - 100 year'));
$date=date("Y",strtotime($curyc));
?>
<select class="form-select" required id="inputGroupSelect01" name="year">
<option value="0">Year</option>
<?php for($i=$cury;$i>$date;$i--){?>
<option value="<?php echo $i;?>" <?php if($dates[0]==$i){?> selected<?php }?>><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
	  <br>
	  <div class="clearfix"> </div>
	  
  <div class="form-group form-group1">
  <br>
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Sex<span class="red">*</span></label>
        <div class="form-check">
		<div class="col-sm-9">
          <input class="form-check-input" type="radio"  name="sex" <?php if(($line['sex']==1)||($line['sex']==0)){?> checked<?php }?>  id="sex1" value="1">
          <label class="form-check-label" for="sex1">
            Male
          </label>
        </div>
		</div>
        <div class="form-check" >
         &nbsp;&nbsp;&nbsp; <input class="form-check-input" type="radio" name="sex" <?php if($line['sex']==2){?> checked<?php }?> id="sex2" value="2">
          <label class="form-check-label" for="sex2">
            Female
          </label>
        </div>
	<div class="clearfix"> </div>
</div>

<br>
<div class="col-md-offset-3 col-md-9"><br>
<input class="btn btn-info" type="submit" name="submit" value="submit">
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
