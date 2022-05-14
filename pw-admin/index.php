<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
if(isset($_SESSION['sess_admin_id']))
{
header("location:dashboard.php");
exit();
}
if($_POST['submit']=='submit')
{
$sql=mysql_query_db("select * from tbl_admin where username='$username' and password='$password'");
$num=mysql_num_db($sql);
if($num>0)
{
$line=mysql_fetch_db($sql);
$_SESSION['sess_admin_id']=$line['id'];
$_SESSION['admin_email']=$line['email'];
$_SESSION['admin_username']=$line['username'];
header("location:dashboard.php");
exit();
}
else
{
$_SESSION['sess_warn']="Invalid Username/Password";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo SITE_ADMIN_TITLE;?></title>

<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- text fonts -->
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
<![endif]-->
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<style>
@media(max-width: 500px){
img{
  width: 85%;
       }
div .credit{
  position: fixed;top: 90%;
}
       </style>
</head>

<body class="login-layout light-login">
<div class="main-container">
<div class="main-content">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="center">
<h1>
<i class="fa fa-lock green"></i>
<span class="green">Secured</span>
<span class="white" id="id-text2">Admin</span>
</h1>
<h4 class="blue" id="id-company-text">&copy; <?PHP echo COMPANYNAME;?></h4>

</div>

<div class="space-6"></div>

<div class="position-relative">
<div id="login-box" class="login-box visible widget-box no-border">
<div class="widget-body">
<div class="widget-main">
<?php if($_SESSION['sess_warn']){?>
<div>
  <center>
  <strong class="red"><i class="ace-icon fa fa-close red"></i>
   <?php echo $_SESSION['sess_warn'];$_SESSION['sess_warn']='';?>
 </strong></center>
</div>
<?php }?>
<h4 class="header blue lighter bigger">
<i class="ace-icon fa fa-coffee green"></i>
Enter Admin Details
</h4>

<div class="space-6"></div>

<form method="post" name="frm_login">
<fieldset>
<label class="block clearfix">
<span class="block input-icon input-icon-right">
<input type="text" class="form-control" name="username" placeholder="Username" required />
<i class="ace-icon fa fa-user"></i>
</span>
</label>

<label class="block clearfix">
<span class="block input-icon input-icon-right">
<input type="password" name="password" class="form-control" placeholder="Password" required/>
<i class="ace-icon fa fa-lock"></i>
</span>
</label>

<div class="space"></div>

<div class="clearfix">
<label class="inline">
<input type="checkbox" class="ace" name="remember" value="1" />
<span class="lbl"> Remember Me</span>
</label>
<br>
<button type="submit" name="submit" value="submit" class="width-35 pull-left btn btn-sm btn-primary">
<i class="ace-icon fa fa-key"></i>
<span class="bigger-110">Login</span>
</button>
<a href="../index.php" class="width-50 pull-right btn btn-sm btn-success">
<i class="ace-icon fa fa-globe"></i>
<span class="bigger-110">Back to Website</span></a>
<p style="text-align: center;"><br><br><br>Username: Admin<br>
password: admin</p>
</div>


<div class="space-4"></div>

</fieldset>
</form>


</div><!-- /.widget-main -->
</div><!-- /.widget-body -->
</div><!-- /.login-box -->
<!-- /.forgot-box -->

<!-- /.signup-box -->
</div>
</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->
<center>
<div class="credit" style=" position: fixed;bottom: 0%;">
<span class="red"><b>Created by<b></span>
<span><a href="https://designingcrew.blogspot.com">
<img src="https://1.bp.blogspot.com/-B13Q_J6RmNk/YVsTu1fdgtI/AAAAAAAABNI/RfKdDVuGHuAyVQbYrTT6Kmsad0LuBbydwCLcBGAsYHQ/s1600/1632769499245.png" width="25%" height="auto"></a></span>
</center>
</div>

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
jQuery(function($) {
$(document).on('click', '.toolbar a[data-target]', function(e) {
e.preventDefault();
var target = $(this).data('target');
$('.widget-box.visible').removeClass('visible');//hide others
$(target).addClass('visible');//show target
});
});



//you don't need this, just used for changing background
/*
jQuery(function($) {
$('#btn-login-dark').on('click', function(e) {
$('body').attr('class', 'login-layout');
$('#id-text2').attr('class', 'white');
$('#id-company-text').attr('class', 'blue');

e.preventDefault();
});
$('#btn-login-light').on('click', function(e) {
alert('a');
$('body').attr('class', 'login-layout light-login');
$('#id-text2').attr('class', 'grey');
$('#id-company-text').attr('class', 'blue');

e.preventDefault();
});
$('#btn-login-blur').on('click', function(e) {
$('body').attr('class', 'login-layout blur-login');
$('#id-text2').attr('class', 'white');
$('#id-company-text').attr('class', 'light-blue');

e.preventDefault();
});

});*/
</script>
</body>
</html>
