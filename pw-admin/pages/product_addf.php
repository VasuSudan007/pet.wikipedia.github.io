<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);
if($frmpd=="yes")
{
if($_FILES['image']['size']>0)
{
$imagen1=strtolower(time().$_FILES['image']['name']);
$imageFileType = strtolower(pathinfo($imagen1,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen1=upload_imagen('image',254,254,"../upload_images","../upload_images/thumb",$imagen1,"vaidyarajindia");
}
}
if($_FILES['image2']['size']>0)
{
$imagen2=strtolower(time().$_FILES['image2']['name']);
$imageFileType = strtolower(pathinfo($imagen2,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen2=upload_imagen('image2',265,303,"../upload_images","../upload_images/thumb",$imagen2,"vaidyarajindia");
}
}
if($_FILES['image3']['size']>0)
{
$imagen3=strtolower(time().$_FILES['image3']['name']);
$imageFileType = strtolower(pathinfo($imagen3,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen3=upload_imagen('image3',265,303,"../upload_images","../upload_images/thumb",$imagen3,"vaidyarajindia");
}
}
if($_FILES['image4']['size']>0)
{
$imagen4=strtolower(time().$_FILES['image4']['name']);
$imageFileType = strtolower(pathinfo($imagen4,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen4=upload_imagen('image4',265,303,"../upload_images","../upload_images/thumb",$imagen4,"vaidyarajindia");
}
}
if($_FILES['image5']['size']>0)
{
$imagen5=strtolower(time().$_FILES['image5']['name']);
$imageFileType = strtolower(pathinfo($imagen5,PATHINFO_EXTENSION));
if(($imageFileType=='jpg')||($imageFileType=='jpeg')||($imageFileType=='png')||($imageFileType=='gif'))
{
require_once("../image_function.php");
$imagen5=upload_imagen('image5',265,303,"../upload_images","../upload_images/thumb",$imagen5,"vaidyarajindia");
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
mysql_query_db("insert into tbl_post set title='".addslashes($title)."',image='$imagen1',image2='$imagen2',image3='$imagen3',image4='$imagen4',image5='$imagen5',seotitle='".addslashes($seotitle)."',metakeywords='".addslashes($metakeywords)."',metadesc='".addslashes($metadesc)."',price='".addslashes($price)."',product_type='".addslashes($product_type)."',brand='".addslashes($brand)."',product_family='".addslashes($product_family)."',product_sector='".addslashes($product_sector)."',lighting_style='".addslashes($lighting_style)."',mounting_location='".addslashes($mounting_location)."',mounting_type='".addslashes($mounting_type)."',color_temp='".addslashes($color_temp)."',cri='".addslashes($cri)."',beam_angle='".addslashes($beam_angle)."',finish='".addslashes($finish)."',iprating='".addslashes($iprating)."',description='".addslashes($description)."',status=1,post_date=now(),category='$category',pweb='".addslashes($pweb)."',pdf='$pdfname'");
}
else
{
$sq="update tbl_post set title='".addslashes($title)."',seotitle='".addslashes($seotitle)."',metakeywords='".addslashes($metakeywords)."',metadesc='".addslashes($metadesc)."',price='".addslashes($price)."',product_type='".addslashes($product_type)."',brand='".addslashes($brand)."',product_family='".addslashes($product_family)."',product_sector='".addslashes($product_sector)."',lighting_style='".addslashes($lighting_style)."',mounting_location='".addslashes($mounting_location)."',mounting_type='".addslashes($mounting_type)."',color_temp='".addslashes($color_temp)."',cri='".addslashes($cri)."',beam_angle='".addslashes($beam_angle)."',finish='".addslashes($finish)."',iprating='".addslashes($iprating)."',description='".addslashes($description)."',category='$category',pweb='".addslashes($pweb)."'";
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
mysql_query_db($sq);
}
header("location:product_list.php");
}
if($id)
{
$sql=mysql_query_db("select * from tbl_post where id='$id'");
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
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<link rel="stylesheet" href="assets/css/radio.css" />
<link rel="stylesheet" href="validation/css/vstyle.css">
<style>
.w135{width:135px;}
</style>

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
<li class="active">Add Product</li>
</ul>
</div>
<div class="page-content">
<?php //include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>Manage Product</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" method="post" name="frmsign" id="frmsign" enctype="multipart/form-data">
<input type="hidden" name="frmpd" id="frmpd" value="yes">
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Category<span class="red">*</span></label>
<div class="col-sm-9">
<select name="category" class="col-xs-10 col-sm-6">
<option value="">Select Category</option>
<?php
$frt=mysql_query_db("select * from tbl_category where status=1 and parent_id=0 order by category asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['category']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['category']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Title<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="title" name="title" value="<?php echo $title; ?>" title="Please enter name" required placeholder="title" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">SEO Title<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="seotitle" name="seotitle" value="<?php echo $seotitle; ?>" title="Please seotitle" required placeholder="seotitle" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Meta Keywords<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="metakeywords" name="metakeywords" value="<?php echo $metakeywords; ?>" title="Please metakeywords" required placeholder="metakeywords" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Meta Description<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="metadesc" name="metadesc" value="<?php echo $metadesc; ?>" title="Please metadesc" required placeholder="metadesc" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Price<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="price" name="price" value="<?php echo $price; ?>" title="Please enter Price" required placeholder="Price" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PRODUCT TYPE<span class="red">*</span></label>
<div class="col-sm-9">
<select name="product_type" class="col-xs-10 col-sm-6">
<option value="">Product Type</option>
<?php
$frt=mysql_query_db("select * from tbl_producttype where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['product_type']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">BRAND<span class="red">*</span></label>
<div class="col-sm-9">
<select name="brand" class="col-xs-10 col-sm-6">
<option value="">Select Brand</option>
<?php
$frt=mysql_query_db("select * from tbl_brand where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['brand']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PRODUCT FAMILY<span class="red">*</span></label>
<div class="col-sm-9">
<select name="product_family" class="col-xs-10 col-sm-6">
<option value="">Select PRODUCT FAMILY</option>
<?php
$frt=mysql_query_db("select * from tbl_product_family where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['product_family']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">PRODUCT SECTOR<span class="red">*</span></label>
<div class="col-sm-9">
<select name="product_sector" class="col-xs-10 col-sm-6">
<option value="">Select SECTOR</option>
<?php
$frt=mysql_query_db("select * from tbl_sector where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['product_sector']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">LIGHTING STYLE<span class="red">*</span></label>
<div class="col-sm-9">
<select name="lighting_style" class="col-xs-10 col-sm-6">
<option value="">Select LIGHTING STYLE</option>
<?php
$frt=mysql_query_db("select * from tbl_style where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['lighting_style']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">MOUNTING LOCATION<span class="red">*</span></label>
<div class="col-sm-9">
<select name="mounting_location" class="col-xs-10 col-sm-6">
<option value="">Select MOUNTING LOCATION</option>
<?php
$frt=mysql_query_db("select * from tbl_mounting where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['mounting_location']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">MOUNTING TYPE<span class="red">*</span></label>
<div class="col-sm-9">
<select name="mounting_type" class="col-xs-10 col-sm-6">
<option value="">Select MOUNTING TYPE</option>
<?php
$frt=mysql_query_db("select * from tbl_mounting_type where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['mounting_type']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">COLOUR TEMPERATURE<span class="red">*</span></label>
<div class="col-sm-9">
<select name="color_temp" class="col-xs-10 col-sm-6">
<option value="">Select COLOUR TEMPERATURE</option>
<?php
$frt=mysql_query_db("select * from tbl_color_temp where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['color_temp']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">CRI<span class="red">*</span></label>
<div class="col-sm-9">
<select name="cri" class="col-xs-10 col-sm-6">
<option value="">Select COLOUR TEMPERATURE</option>
<?php
$frt=mysql_query_db("select * from 	tbl_cri where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['cri']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">BEAM ANGLE<span class="red">*</span></label>
<div class="col-sm-9">
<select name="beam_angle" class="col-xs-10 col-sm-6">
<option value="">Select BEAM ANGLE</option>
<?php
$frt=mysql_query_db("select * from tbl_beam_angle where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['beam_angle']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">FINISH<span class="red">*</span></label>
<div class="col-sm-9">
<select name="finish" class="col-xs-10 col-sm-6">
<option value="">Select FINISH</option>
<?php
$frt=mysql_query_db("select * from 	tbl_finish where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['finish']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">IP RATING<span class="red">*</span></label>
<div class="col-sm-9">
<select name="iprating" class="col-xs-10 col-sm-6">
<option value="">Select IP RATING</option>
<?php
$frt=mysql_query_db("select * from tbl_ip_rating where status=1 order by title asc");
while($ffrt=mysql_fetch_db($frt))
{?>
<option value="<?php echo $ffrt['id'];?>" <?php if($line['iprating']==$ffrt['id']){?> selected<?php }?>><?php echo stripslashes($ffrt['title']);?></option>
<?php }?>
</select> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description <span class="red">*</span></label>
<div class="col-sm-6 col-xs-10">
<textarea id="description" name="description"  required class="ckeditor form-control"><?php echo stripslashes($line['description']);?></textarea>
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
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Product Website<span class="red">*</span></label>
<div class="col-sm-9">
<input type="text" id="pweb" name="pweb" value="<?php echo $pweb; ?>" title="Please product website" placeholder="Please enter product website" class="col-xs-10 col-sm-6" /> 
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> PDF Upload</label>
<div class="col-sm-9">
<input type="file" name="pdf" style="width:280px; height:30px; padding:5px; border:1px solid #cccccc;">
<?php if($line['pdf']!='') {?>
<br>
<a href="<?php echo SITE_PATH;?>doc/<?php echo $line['pdf'];?>" target="_blank">PDF File</a>
<?php }?>
</div>
</div>
<div class="col-md-12">
<div class="clearfix form-actions">
<div class="col-md-offset-3 col-md-9">
<input class="btn btn-info" type="submit" name="submit" value="submit">
</div>
</div>
</div>
</form>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include("inc/footer.inc.php");?>
</div><!-- /.main-container -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="validation/js/jquery-1.11.1.min.js"></script>
<script src="validation/js/jquery.validate.min.js"></script>
<script src="validation/js/additional-methods.min.js"></script>
</body>
</html>
