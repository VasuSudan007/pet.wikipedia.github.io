<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
//print_r($_REQUEST);
if($submitform=='yes')
{

  mysql_query_db("update tbl_admin set username='$username',city='$city',email='$email',phone='$phone' where id='".$_SESSION['sess_admin_id']."'");
 $sql=mysql_query_db("select * from tbl_admin where id='".$_SESSION['sess_admin_id']."'");
$line=mysql_fetch_db($sql);
@extract($line);
$_SESSION['sess_msg']="Details Updated Successfully!!!";
}

?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 09:15:49 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Setting</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/fav.png" />
</head>
<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php include("include/header.php")?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->

      <?php include("include/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">



             


          
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title" style="color: #7A828B">Dashboard / Admin Setting</h5>
                  <h3 style="color:#459CFD"><b>Admin Setting</b></h3>
                  <form class="form-horizontal" role="form" method="post" name="frm_add" id="frm_add">
<input type="hidden" name="submitform" id="submitform" value="yes">
<?php if($_SESSION['sess_msg']){?>
<div class="panel-heading warning"><strong style="color:#5E935D"><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']='';?></strong></div>
<?php }?>
<?php if($_SESSION['sess_warn']){?>
<div class="alert alert-danger">
  <strong class="red"><i class="ace-icon fa fa-close red"></i> <?php echo $_SESSION['sess_warn'];$_SESSION['sess_warn']='';?></strong>
</div>
<?php }?>
                    <div>

                      <section>
                        <br/>
                        <div class="form-group">
                          <div class="row">
                         
                          <div class="col-sm-6">  
                          <h6>Username</h6>     
<input type="text" id="username" value="<?php echo $username;?>" name="username" required placeholder="Enter Username" class="col-xs-10 col-sm-4 required form-control"  /> <br/>
                          </div>
                           
                          <div class="col-sm-6">
<h6>Email</h6>
 <input type="email" id="email" value="<?php echo $email;?>" name="email" required placeholder="Enter Email" class="col-xs-10 col-sm-4 required form-control" /> 
                          </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                         
                          <div class="col-sm-6">  
                          <h6>Phone.</h6>     
                    <input type="text" id="phone" value="<?php echo $phone;?>" name="phone" required placeholder="Enter Phone" class="col-xs-10 col-sm-4 required form-control" />   <br/>

                          </div>
                           
                          <div class="col-sm-6">
<h6>City</h6>
 <input type="city" id="city" value="<?php echo $city;?>" name="city" required  class="col-xs-10 col-sm-4 required form-control" /> 
                          </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="row">
                         
                          <div class="col-sm-6">  
                          <h6>Created by</h6>     
                    <input type="text" id=" " value="<?php echo $creator;?>" name=" " required placeholder="Enter Phone" readonly class="col-xs-10 col-sm-4 form-control" />  <br/>

                          </div>
                           
                          <div class="col-sm-6">
<h6>Powred by</h6>
                    <input type="text" id=" " value="<?php echo $powered;?>" name=" " required placeholder="Enter Phone" readonly class="col-xs-10 col-sm-4 form-control" /> 
                          </div>
                          </div>
                        </div>

                         
                         
                        </section>
                        <div class="col-md-offset-3 col-md-9">

                          <input class="btn btn-info" type="submit" name="submit" id="submit" value="submit">
                        </div>


                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>



          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include("include/footer.php") ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
<!--   <script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script> -->

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/skydash/template/demo/vertical-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 May 2022 09:16:18 GMT -->
</html>

