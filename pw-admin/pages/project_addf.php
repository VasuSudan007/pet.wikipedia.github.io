<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
if($submitform=="yes")
{
if($_FILES['image']['size']>0)
{
$imagen1=strtolower(time().$_FILES['image']['name']);
$imageFileType = strtolower(pathinfo($imagen1,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen1=upload_imagen('image',254,254,"../upload_images","../upload_images/thumb",$imagen1,"");
}
}
if($_FILES['image2']['size']>0)
{
$imagen2=strtolower(time().$_FILES['image2']['name']);
$imageFileType = strtolower(pathinfo($imagen2,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen2=upload_imagen('image2',265,303,"../upload_images","../upload_images/thumb",$imagen2,"");
}
}
if($_FILES['image3']['size']>0)
{
$imagen3=strtolower(time().$_FILES['image3']['name']);
$imageFileType = strtolower(pathinfo($imagen3,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen3=upload_imagen('image3',265,303,"../upload_images","../upload_images/thumb",$imagen3,"");
}
}
if($_FILES['image4']['size']>0)
{
$imagen4=strtolower(time().$_FILES['image4']['name']);
$imageFileType = strtolower(pathinfo($imagen4,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen4=upload_imagen('image4',265,303,"../upload_images","../upload_images/thumb",$imagen4,"");
}
}
if($_FILES['image5']['size']>0)
{
$imagen5=strtolower(time().$_FILES['image5']['name']);
$imageFileType = strtolower(pathinfo($imagen5,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen5=upload_imagen('image5',265,303,"../upload_images","../upload_images/thumb",$imagen5,"");
}
}
if($_FILES['pdf']['size']>0)
{
$imageFileType = strtolower(pathinfo($_FILES['pdf']['name'],PATHINFO_EXTENSION));
if($imageFileType=='pdf')
{
$file_name=str_replace(' ','-',$_FILES['pdf']['name']);
$pdfname="sps".time().$file_name;
move_uploaded_file($_FILES['pdf']['tmp_name'],'../doc/'.$pdfname);
}
}
if($id=='')
{
mysql_query_db("insert into tbl_project set title='".addslashes($title)."',image='$imagen1',image2='$imagen2',image3='$imagen3',image4='$imagen4',image5='$imagen5',description='".addslashes($description)."' ,brief='".addslashes($brief)."',status=1,post_date=now()");
}
else
{
$sq="update tbl_project set title='".addslashes($title)."',description='".addslashes($description)."' ,brief='".addslashes($brief)."'";
if($imagen1)
{
$sq.=",image='$imagen1'";
}
if($imagen2)
{
$sq.=",image2='$imagen2'";
}
if($imagen3)
{
$sq.=",image3='$imagen3'";
}
if($imagen4)
{
$sq.=",image4='$imagen4'";
}
if($imagen5)
{
$sq.=",image5='$imagen5'";
}
if($pdfname)
{
$sq.=",pdf='$pdfname'";
}
$sq.=" where id='$id'";
//exit();
mysql_query_db($sq);
}
header("location:project_list.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_project where id='$id'");
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
<li class="active">Add Project</li>
</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>Add Project</h1>
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
<input type="text" id="title" name="title" value="<?php echo $title; ?>" title="Please enter name" required placeholder="title" class="col-xs-10 col-sm-6" /> 
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">brief<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="brief" name="brief" value="<?php echo $brief; ?>" title="Please enter brief" required placeholder="brief" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Description<span class="red">*</span></label>
<div class="col-sm-7">
<textarea name="description" id="textarea_1" class="ckeditor"><?php echo stripslashes($description);?></textarea> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image</label>
<div class="col-sm-9">
<input type="file" name="image" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['image']!='') {?>
<br></br>
<img src="../upload_images/thumb/<?php echo $line['image'];?>" border="0" style="width:100px; height:100px; ">
<?php }?>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 2</label>
<div class="col-sm-9">
<input type="file" name="image2" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['image2']!='') {?>
<br></br>
<img src="../upload_images/thumb/<?php echo $line['image2'];?>" border="0" style="width:100px; height:100px; ">
<?php }?>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 3</label>
<div class="col-sm-9">
<input type="file" name="image3" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['image3']!='') {?>
<br></br>
<img src="../upload_images/thumb/<?php echo $line['image3'];?>" border="0" style="width:100px; height:100px; ">
<?php }?>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 4</label>
<div class="col-sm-9">
<input type="file" name="image4" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['image4']!='') {?>
<br></br>
<img src="../upload_images/thumb/<?php echo $line['image4'];?>" border="0" style="width:100px; height:100px; ">
<?php }?>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image 5</label>
<div class="col-sm-9">
<input type="file" name="image5" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['image5']!='') {?>
<br></br>
<img src="../upload_images/thumb/<?php echo $line['image5'];?>" border="0" style="width:100px; height:100px; ">
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
