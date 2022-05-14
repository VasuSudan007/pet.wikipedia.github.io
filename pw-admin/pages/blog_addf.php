<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);
if($submitform=="yes")
{
if($_FILES['image']['size']>0)
{
require_once("../image_function.php");
$imgae_name=upload_imagen('image',300,200,'../upload_images','../upload_images/thumb');
}
if($id=='')
{
mysql_query_db("insert into tbl_blog set title='$title',name='$name',description='$editor1',image='$imgae_name',status=1,post_date=now()");
}
else
{
$sql="update tbl_blog set title='$title',name='$name',description='$editor1'";
if($imgae_name)
{
$sql.=",image='$imgae_name'";
}
$sql.=" where id='$id'";
mysql_query_db($sql);
}
header("location:blog_list.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_blog where id='$id'");
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
Add Blog
</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>
Add Blog
</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" method="post" name="frm_add" id="frm_add" enctype="multipart/form-data">
<input type="hidden" name="submitform" id="submitform" value="yes">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
<input type="hidden" name="start" id="start" value="<?php echo $start;?>">

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Title<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="title" value="<?php echo $title;?>" name="title" title="please enter tilte" placeholder="Enter tilte" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Name<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="name" value="<?php echo $name;?>" name="name" title="please enter Name" placeholder="Enter Name" class="col-xs-10 col-sm-4" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Description<span class="red">*</span></label>
<div class="col-sm-9">
<textarea id="editor1" name="editor1" rows="10" cols="80"><?php echo $description;?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image</label>

<div class="col-sm-9">
 <input type="file" name="image" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
 <?php if($line['image']!='') {?>
<br>
</br>
<img src="../upload_images/thumb/<?php echo $line['image'];?>" border="0" style="width:100px; height:100px; ">
<?php }?>
</div>
</div>


<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
<input class="btn btn-info" type="submit" name="submit" value="submit">
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
},
}
});
</script>
<?php include("../ck.php");?>
</body>
</html>
