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
mysql_query_db("insert into tbl_user set name='$name',password='$password',email='$email',sex='$sex',date='$date', month='$month',year='$year',subject='".addslashes($subject)."',status=1,post_date=now()");
}
else
{
$sql="update tbl_user set name='$name',password='$password',email='$email',sex='$sex',date='$date', month='$month',year='$year',subject='".addslashes($subject)."'";
$sql.=" where id='$id'";
mysql_query_db($sql);
}
header("location:registers_list.php");
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
<li class="active">Add to registers</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>Add to Registers</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="container">
<div class="services">
<div class="col-sm-6 login_left">
<form  method="post" name="register">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<div class="form-group">
<label for="edit-name">Full Name <span class="form-required" title="Plaese enter your Name." style="color:#CC0000">*</span></label><br>
<input type="text" required id="edit-name" name="name" value="<?php echo $name;?>" size="60" maxlength="60" class="form-text required">
</div>

<div class="form-group">
<label for="edit-name">Email <span class="form-required" title="Please enter Email abc@xyz." style="color:#CC0000">*</span></label><br>
<input type="email" required id="edit-name" name="email" value="<?php echo $email;?>" size="60" maxlength="60" class="form-text required">
</div>
<div class="form-group">
<label for="edit-name">Phone Number <span class="form-required" title="Please Enter your Phone Number." style="color:#CC0000">*</span></label><br>
<input type="number" required id="edit-phone" name="phone" value="<?php echo $phone;?>" size="10" maxlength="10" class="form-text required">
</div>

<div class="profile">
<label for="edit-pass">Matrimony Profile for<span class="form-required" title="Please Select the Profile." style="color:#CC0000">*</span></label>
<div class="age_grid">
<div class="col-md-14 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="profile" value="<?php echo $profile;?>">
<?php $ff=mysql_query_db("select * from tbl_user where profile=$profile");
while($dd=mysql_fetch_db($ff))
{?>
<option value="<?php echo $dd['id'];?>" <?php if($line['profile']==$dd['id']){?> selected<?php }?>><?php echo $dd['profile'];?></option>
<?php }?>

<option value="0">Select Profile</option>
<option value="1">For Myself</option>
<option value="2">For Daughter	</option>
<option value="3">For Son</option>
<option value="4">For Sister</option>
<option value="5">For Brother</option>
<option value="6">For Relative</option>
<option value="7">For Friend </option>
<option value="8">For Others </option>
</select>
</div>
</div>
</div>
</div>
<br>

<div class="age_select">
<label for="edit-pass">Age <span class="form-required" title="This field is required.">*</span></label>
<div class="age_grid">
<div class="col-sm-4 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="date" value="<?php echo $date;?>">
<option value="0">Date</option>
<?php 
for($d=1; $d<=31; $d++){
$dd=str_pad($d, 2, '0', STR_PAD_LEFT);
?>
<option value="<?php echo $d;?>"><?php echo $d;?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-sm-4 form_box2"  for="inputGroupSelect01">
<div class="select-block1">

<select class="form-select" required id="inputGroupSelect01" name="month" value="<?php echo $month;?>">
<option value="">Month</option>
<?php 
for($m=1; $m<=12; $m++){
$mm=str_pad($m, 2, '0', STR_PAD_LEFT);
?>
<option value="<?php echo $mm;?>"><?php echo date('F', mktime(0, 0, 0, $m, 1)).'<br>';?></Option>
<?php }?>
</select>
</div>
</div>
<div class="col-sm-4 form_box1" for="inputGroupSelect01">
<div class="select-block1">
<?php
$cury=date("Y");
$cury1=date('Y-m-d', strtotime($cury. ' - 18 year'));
$cury=date("Y",strtotime($cury1));
$curyc=date('Y-m-d', strtotime($cury. ' - 100 year'));
$date=date("Y",strtotime($curyc));
?>
<select class="form-select" required id="inputGroupSelect01" name="year" value="<?php echo $year;?>">
<option value="0">Year</option>
<?php for($i=$cury;$i>$date;$i--){?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
<br>
<div class="form-group form-group1">
<label class="col-sm-7 control-lable" for="sex">Sex : </label>
<div class="col-sm-5">
<div class="form-check">
<input class="form-check-input" type="radio"  name="sex" <?php if(($line['sex']==1)||($line['sex']==0)){?> checked<?php }?>  id="sex1" value="1">
<label class="form-check-label" for="sex1">
Male
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="sex" <?php if($line['sex']==2){?> checked<?php }?> id="sex2" value="2">
<label class="form-check-label" for="sex2">
Female
</label>
</div>
</div>
<div class="clearfix"> </div>
</div>

<div class="age_select">
<label for="edit-pass">Religion <span class="form-required" title="This field is required." style="color:#CC0000">*</span></label>
<div class="age_grid">
<div class="col-md-7 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="religion">
<option value="0">Select Religion</option>
<option value="1">Hindu</option>
<option value="2">Islam</option>
<option value="3">Christianity</option>
<option value="4">Sikhism</option>
<option value="5">Buddhism  </option>
<option value="6">Jainism  </option>
</select>
</div>
</div></div></div>
<div class="form-group form-group1">
<label class="col-sm-7 control-lable" for="disablity">Any Disability : </label>
<div class="col-sm-5">
<div class="form-check">
<input class="form-check-input" type="radio"  name="disablity" <?php if(($line['disablity']==1)||($line['disablity']==0)){?> checked<?php }?>  id="disablity1" value="1">
<label class="form-check-label" for="disablity1">
No
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="disablity" <?php if($line['disablity']==2){?> checked<?php }?> id="disablity2" value="2">
<label class="form-check-label" for="disablity2">
Physically Challenged
</label>
</div>
</div>
<div class="clearfix"> </div>
</div>
<div class="age_select">
<label for="edit-pass">Qualification <span class="form-required" title="This field is required." style="color:#CC0000">*</span></label>
<div class="age_grid">
<div class="col-md-7 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="qualification">
<option value="0">Select Qualification</option>
<option value="1">10+2</option>
<option value="2">Graduate	</option>
<option value="3">Post Graduate</option>
<option value="4">Under Graduate</option>
<option value="5">Dr </option>
<option value="6">P.HD </option>
</select>
</div>
</div>
<div class="col-sm-4 form_box2"  for="inputGroupSelect01">
<div class="select-block1">
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>

<div class="age_select">
<label for="edit-pass">Occupation <span class="form-required" title="This field is required." style="color:#CC0000">*</span></label>
<div class="age_grid">
<div class="col-md-7 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="occupation" >
<option value="0">Select Occupation</option>
<option value="1">Student</option>
<option value="2">Self Employed	</option>
<option value="3">Work From Home</option>
<option value="4">Job</option>
<option value="5">Farmer </option>
<option value="6">Teacher </option>
<option value="7">Doctor </option>
<option value="8">Lawyer </option>
<option value="9">Journalist </option>
<option value="10">Fireman </option>
</select>
</div>
</div>


<div class="col-sm-4 form_box2"  for="inputGroupSelect01">
<div class="select-block1">
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>

<div class="age_select">
<label for="edit-pass">Married Status <span class="form-required" title="This field is required." style="color:#CC0000">*</span></label>
<div class="age_grid">
<div class="col-md-7 form_box" for="inputGroupSelect01">
<div class="select-block1">
<select class="form-select" required id="inputGroupSelect01" name="married">

<option value="0">Select your Married Status</option>
<option value="1">Not Married</option>
<option value="2">Married	</option>
<option value="3">Divorsed</option>
<option value="4">Widow</option>
<option value="5">Awaiting Divorse </option>
</select>
</div>
</div>
</div></div><br><br>
<div class="form-group">
<label for="edit-name">Annual Income <span class="form-required" title="Plaese enter your Annual Income." style="color:#CC0000">*</span></label><br>
<input type="text" required id="edit-income" name="income" value="<?php echo $income;?>" size="60" maxlength="60" class="form-text required" placeholder="in ₹">
</div>
<div class="form-group">
<label for="edit-name">Address <span class="form-required" title="Plaese enter your address." style="color:#CC0000">*</span></label><br>
<input type="text" required id="edit-address" name="address" value="<?php echo $address;?>" size="60" maxlength="60" class="form-text required" placeholder=" Street ">
</div>
<div class="form-group">
<label class="col-3 control-label no-padding-right" for="form-field-1-1">Country<span class="red">*</span></label>
<div class="col-5">	  <div class="select-block1">

<select name="country" required="required" class="col-xs-10 col-sm-5" onChange="state_ajax(this.value)">
<option value="">--Select Country--</option>
<?php $cons=mysql_query_db("select * from tbl_country where status=1 order by country");
while($fcons=mysql_fetch_db($cons)){?>
<option value="<?php echo $fcons['CountryId']?>" <?php if($fcons['CountryId']==$line['country']){?> selected<?php }?>><?php echo $fcons['Country']?></option>
<?php } ?>
</select> 
</div></div>
</div><br>
<div class="form-group">
<label for="edit-name">State<span class="form-required" title="Plaese enter your Annual Income." style="color:#CC0000">*</span></label>
<div class="col-5" id="state_ajax_div">	  <div class="select-block1">
<select name="state" required="required" class="col-xs-10 col-sm-5" onChange="city_ajax(this.value)">
<option value="">--Select state--</option>
<?php
if($id)
{
$ts=mysql_query_db("select * from tbl_state where status=1 and country_id= '".$line['country']."'" );
while($fts=mysql_fetch_db($ts))
{?>
<option value="<?php echo $fts['id'];?>" <?php if($fts['id']==$line['state']){?> selected<?php }?>><?php echo $fts['region'];?></option>
<?php }
}
?>
</select> 
</div>
</div>
</div><br>

<div class="form-group">
<label for="edit-name">City<span class="form-required" title="Plaese enter your Annual Income." style="color:#CC0000">*</span></label>
<div class="col-5" id="city_ajax_div">	  <div class="select-block1">
<select name="city" required="required" class="col-xs-10 col-sm-5">
<option value="">--Select City--</option>
<?php
if($id)
{
$ts=mysql_query_db("select * from tbl_city where status=1" );
while($fts=mysql_fetch_db($ts))
{?>
<option value="<?php echo $fts['cityid'];?>" <?php if($fts['cityid']==$line['city']){?> selected<?php }?>><?php echo $fts['city'];?></option>
<?php }
}
?>
</select> 
</div></div>
</div><br>
<div class="form-group form-group1">
	<label class="col-sm-7 control-lable" for="familytype">Familty Type : </label>
	<div class="col-sm-5">
        <div class="form-check">
          <input class="form-check-input" type="radio"  name="familytype" <?php if(($line['familytype']==1)||($line['familytype']==0)){?> checked<?php }?>  id="familytype1" value="1">
          <label class="form-check-label" for="familytype1">
            Joint Family
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="familytype" <?php if($line['familytype']==2){?> checked<?php }?> id="familytype2" value="2">
          <label class="form-check-label" for="familytype2">
            Nuclear Family
          </label>
        </div>
		<div class="form-check">
          <input class="form-check-input" type="radio" name="familytype" <?php if($line['familytype']==3){?> checked<?php }?> id="familytype3" value="3">
          <label class="form-check-label" for="familytype3">
            Extended Family
          </label>
        </div>
	</div>
	<div class="clearfix"> </div>
 </div>
<div class="form-group">
<label for="edit-name">Tell us about yourself <spam style="font-size:13px" "color:#999999">&nbsp;(Optional)</spam><span class="form-required" title="This field is required.">*</span></label>
<textarea name="subject" value="<?php echo $subject;?>" class="form-control bio"placeholder="This will added in your Profile BIO" rows="3"><?php echo stripslashes($description);?></textarea> 
</div>
<div class="col-md-12">
<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
<input class="btn btn-info" type="submit" name="submit" value="submit">
</div>
</div>
</div></form>  
</div>
</div>      
</div>


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
<script>
function state_ajax(d){
var dataString = "countryid=" + d;
$.ajax({
type: "POST",
url: "state_ajaxf.php",
data: dataString,
crossDomain: true,
cache: false,
async: false,
beforeSend: function() {
document.getElementById('state_ajax_div').innerHTML="loading....";
},
success: function(data) {
document.getElementById('state_ajax_div').innerHTML=data;
}
});
}
</script>
<script>
function city_ajax(d){
var dataString = "countryid=" + d;
$.ajax({
type: "POST",
url: "city_ajaxf.php",
data: dataString,
crossDomain: true,
cache: false,
async: false,
beforeSend: function() {
document.getElementById('city_ajax_div').innerHTML="loading....";
},
success: function(data) {
document.getElementById('city_ajax_div').innerHTML=data;
}
});
}
</script>
</body>
</html>
