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
mysql_query_db("insert into tbl_enquiry_form set sname='$sname',class='$class',dob='$dob',fname='$fname',foccupation='$foccupation',mname='$mname',moccupation='$moccupation',email='$email',phone='$phone',siblingname='$siblingname',address='$address',status=1,post_date=now()");
}
else
{
$sql="update tbl_enquiry_form set sname='$sname',class='$class',dob='$dob',fname='$fname',foccupation='$foccupation',mname='$mname',moccupation='$moccupation',email='$email',phone='$phone',siblingname='$siblingname',address='$address'";
$sql.=" where id='$id'";
mysql_query_db($sql);
}
header("location:enquiry_form_list.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_enquiry_form where id='$id'");
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
<a href="dashboard.php">Home / Enquiry Form  </a>
</li>
<li class="active">View Enquiry Form</li>
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


  

    
  <!--Form Ends-->
<form action=""  method="post" name="frm_register" id="frm_register">
<input type="hidden" name="id"  id="id"  value="<?php echo $id;?>">
<div class="row">
<div class="col-lg-6">
<label for="edit-name">Student Name</label><br>
<input type="text"  id="sname" name="sname" title="Please enter your s.class" value="<?php echo $sname;?>" size="60" maxlength="60" class="form-text " placeholder="Class ">
</div>
<div class="col-lg-6">
<label for="edit-name">Class</label><br>
<input type="text"  id="class" name="class" title="Please enter your s.class" value="<?php echo $class;?>" size="60" maxlength="60" class="form-text " placeholder="Class ">
</div>
<div class="col-lg-6">
<label for="edit-name">Date of Birth (dd-mm-yyyy)</label><br>
<input type="text"  id="dob" name="dob" title="Please enter Date" value="<?php echo $dob;?>" size="60" maxlength="60" class="form-text " placeholder="Date">
</div>
<div class="col-lg-6">
<label for="edit-name">Phone Number </label><br>
<input type="text"  id="phone" name="phone" title="Please enter your Phone" value="<?php echo $phone;?>" size="60" maxlength="60" class="form-text " placeholder=" Please enter Phone no. ">
</div>
<div class="col-lg-6">
<label for="edit-name">Fathers Name </label><br>
<input type="text"  id="fname" name="fname" title="Please enter your f.name" value="<?php echo $fname;?>" size="60" maxlength="60" class="form-text " placeholder=" Please enter Father's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name">Father's Occupation </label><br>
<input type="text"  id="foccupation" name="foccupation" title="Please enter your fOccupation" value="<?php echo $foccupation;?>" size="60" maxlength="60" class="form-text " placeholder=" Occupation ">
</div>
<div class="col-lg-6">
<label for="edit-name">Mother's Name </label><br>
<input type="text"  id="mname" name="mname" title="Please enter your m.name" value="<?php echo $mname;?>" size="60" maxlength="60" class="form-text " placeholder=" Please enter Mother's Name ">
</div>
<div class="col-lg-6">
<label for="edit-name">Mother's Occupation </label><br>
<input type="text"  id="moccupation" name="moccupation" title="Please enter your m.occupation" value="<?php echo $moccupation;?>" size="60" maxlength="60" class="form-text " placeholder=" Occupation ">
</div>
<div class="col-lg-6">
<label for="edit-name">Email </label><br>
<input type="text"  id="email" name="email" title="Please enter your email" value="<?php echo $email;?>" size="60" maxlength="60" class="form-text " placeholder=" Please enter your email ">
</div>


<div class="col-lg-6">
<label for="edit-name">Name of Real Brother/Sister Studying in school (if any) <span class="" title="" style="color:#CC0000"></span></label><br>
<input type="text"  id="siblingname" name="siblingname" title="Please enter sibling" value="<?php echo $siblingname;?>" size="60" maxlength="60" class="form-text " placeholder=" Enter Name (if Yes) ">
</div>
<div class="col-lg-6">
<label for="edit-name">Address <span  title="Please enter your address" style="color:#CC0000">*</span></label><br>
<textarea type="textarea"  id="address" name="address" title="Please enter your address" value="<?php echo $address;?>" size="60" maxlength="60" class="form-text " placeholder=" Address "></textarea>
</div>
<div class="col-lg-6">
<label for="edit-name">Posted on</label><br>
<input type="text"  id="phone" name="phone" title="Please enter your Phone" value="<?php echo $post_date;?>" size="60" maxlength="60" class="form-text " placeholder=" Please enter Phone no. ">
</div>
</div>
<input class="btn btn-info" type="submit" name="submit"  id="edit-submit" value="submit" >

<!-- <button type="submit" class="contact-one__btn thm-btn" >Submit Comment</button> -->
</form>

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
