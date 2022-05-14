<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);
  
	if($contentfrm==1)
	{
		require_once("../image_function.php");
		$imgae_name=upload_imagen('image',1000,700,'../upload_images','../upload_images/thumb');
		$sql="update tbl_content set title='$title',content='".addslashes($content)."'";
		if($imgae_name)
		{
		$sql.=",image='$imgae_name'";
		}
		$sql.=" where id='$id'";
		mysql_query_db($sql);
                  header("location:contents.php?id=".$id);
	}
	$sql=mysql_query_db("select * from tbl_content where id='$id'");
	$line=mysql_fetch_db($sql);
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
<li class="active">Add User </li>
</ul>
</div>
<div class="page-content">
<?php include("inc/themesetting.php");?><!-- /.ace-settings-container -->
<div class="page-header">
<h1>
<?php if($line['id']==1) {?> Header Text <?php } else { ?>Add User <?php } ?>
</h1>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<form action="" method="post" enctype="multipart/form-data" name="contentfrm" id="contentfrm">
			<input type="hidden" name="contentfrm" value="1">
			<input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1">
						
                            <div class="uk-form-row">
                                <?php if(isset($_REQUEST['success'])) { ?>
                                <label style="color:#006600! important;"><strong>Updated Successfully.</strong></label><?php } ?>
								
                                <input type="hidden" name="cmsid" value="<?php echo $_REQUEST['id']; ?>"><br>
								<input type="text" name="title" value="<?php echo $line['title'];?>" style="width:350px; height:25px; border:1px solid #cccccc;"><br><br>
							 <textarea cols="180" rows="100" id="textarea_1" name="content" style="margin-top:10px;" class="ckeditor"><?php echo stripslashes($line['content']); ?></textarea> 
								<br><br>
								<input type="file" name="image" style="width:350px; height:30px; padding:5px; border:1px solid #cccccc;">
								<?php if($line['image']){?><br><img src="../upload_images/thumb/<?php echo $line['image'];?>" border="0" style="width:100px; height:100px;"><?php }?>
								<br><br>
                                <button name="ownerSub" id="ownerSub" class="md-btn md-btn-primary" type="submit" style="margin-top:10px;">Submit</button>
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
$( "#frmsign" ).validate({
rules: {
title: {
required: true,
},
category: {
required: true
},
sub_category: {
required: true
},
mrp: {
required: true
},
price: {
required: true
},
image: {
required: true
},
meta_title: {
required: true
},
address: {
required: true
}
}
});
</script>
</body>
</html>
