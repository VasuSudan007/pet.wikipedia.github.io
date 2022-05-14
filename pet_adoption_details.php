<?php
session_start();
require_once("codelibrary/inc/variables.php");
require_once("codelibrary/inc/functions.php");
@extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from www.ingridkuhn.com/themes/unitedpets/adoption-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 10:56:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- page title -->
      <title>United Pets</title>
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
      <![endif]-->
      <!-- Font files -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
      <link href="fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
      <link href="fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
      <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
      <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="styles/maincolors.css" rel="stylesheet">
	  <!-- LayerSlider CSS -->
      <link rel="stylesheet" href="vendor/layerslider/css/layerslider.css">

    <style>  /* boxed */
#top.boxed {
    max-width:1200px;
    margin:0 auto;
    box-shadow: 10px 10px 100px -19px rgba(0,0,0,0.75);
    background:#fff;
    }
#top.boxed .navbar, 
#top.boxed .top-bar,                        
#top.boxed #slider,
#top.boxed #nav,
#top.boxed footer,
#top.boxed #video-header{
    max-width:1200px;
    margin:0 auto!important;
}
</style><!-- Switcher Only -->
      <link rel="stylesheet" id="switcher-css" type="text/css" href="switcher/css/switcher.css" media="all" />
      <!-- END Switcher Styles -->

	        <!-- Demo Examples (For Module #3) -->
	  <link rel="alternate stylesheet" type="text/css" href="styles/maincolors.css" title="maincolors" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="styles/tinypaws.css" title="tinypaws" media="all" />
	  <link rel="alternate stylesheet" type="text/css" href="styles/veterinarian.css" title="veterinarian" media="all" />
      <link rel="alternate stylesheet" type="text/css" href="styles/agility.css" title="agility" media="all" />
	   <link rel="alternate stylesheet" type="text/css" href="styles/superpet.css" title="superpet" media="all" />
	   <link rel="alternate stylesheet" type="text/css" href="styles/mymascot.css" title="mymascot" media="all" />
	   	   <link rel="alternate stylesheet" type="text/css" href="switcher/css/boxed.css" title="boxed" media="all" />
	   	   <link rel="alternate stylesheet" type="text/css" href="switcher/css/full.css" title="full" media="all" />
		   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-76370337-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-76370337-2');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7ZJPV8');</script>
<!-- End Google Tag Manager -->
   </head>
   <!-- ==== body starts ==== -->
   <body id="top">
     <!-- Start Switcher -->
      <div class="demo_changer">
         <div class="demo-icon">
            <i class="fa fa-cog fa-2x"></i>
         </div>
         <!-- end opener icon -->
         <div class="form_holder text-center">
            <div class="row">
               <div class="col-lg-12">
                  <div class="predefined_styles">
				     <h5>Choose a Color Skin</h5>
                     <!-- MODULE #3 -->
                     <a href="maincolors.html" class="styleswitch"><img src="switcher/images/maincolors.png" alt="maincolors"></a>		
                     <a href="agility.html" class="styleswitch"><img src="switcher/images/agility.png" alt="agility"></a>		
                     <a href="veterinarian.html" class="styleswitch"><img src="switcher/images/veterinarian.png" alt="veterinarian"></a>
					  <a href="superpet.html" class="styleswitch"><img src="switcher/images/superpet.png" alt="superpet"></a>	
					 <a href="tinypaws.html" class="styleswitch"><img src="switcher/images/tinypaws.png" alt="tinypaws"></a>	
                     <a href="mymascot.html" class="styleswitch"><img src="switcher/images/mymascot.png" alt="mymascot"></a>	
                  </div>
				              <!-- Button -->	
               <a href="https://themeforest.net/item/united-pets-responsive-html5-template/23276071" class="btn btn-sm btn-secondary mt-4">BUY NOW</a>

               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
         <!-- end form_holder -->
      </div>
      <!-- end demo_changer -->      <!-- Preloader  -->
      
      <!--/Preloader ends -->
      
            <!-- End Top bar -->
            <!-- Navbar Starts -->
            <?php include("header.php") ?>
      <!-- /nav --><!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
   data-top-bottom="background-size: 110%;">
   <div class="container" >
      <div class="jumbo-heading" data-aos="fade-up">
         <h1>Adoption</h1>
         <!-- Breadcrumbs -->
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.html">Home</a></li>
               <li class="breadcrumb-item"><a href="adoption.html">Adoption</a></li>
               <li class="breadcrumb-item active" aria-current="page">Adoption single page</li>
            </ol>
         </nav>
      </div>
   </div>
   <!-- /jumbo-heading -->
</div>
<!-- /jumbotron -->
<!-- ==== Page Content ==== -->
<?php 
        $sql=mysql_query_db("select * from tbl_adopt where id='$id' order by id desc");
        $line=mysql_fetch_db($sql);?>

<div class="page container">
   <div class="row">
      <!-- page with sidebar starts -->
      <div class="col-lg-9 page-with-sidebar">
         <div class="row">
            <div class="adopt-card col-lg-12">
               <!-- Image -->
               <div class="col-md-4 float-left">
                  <img src="<?php //echo SITE_PATH;?>upload_images/thumb/<?php echo $line ['image'];?>" class="img-fluid rounded" alt="">
                 
               </div>
               <!-- Name -->

               <div class="caption-adoption col-md-8 float-right res-margin">
                  <h2><?php echo $line['pet_name'];?></h2>
                  <!-- List -->
                  <ul class="list-unstyled mt-3">
                     <li><strong>Gender:</strong> <?php echo $line['pet_gender'];?></li>
                     <li><strong>Age:</strong> <?php echo $line['pet_age'];?></li>
                     <li><strong>Breed:</strong> <?php echo $line['pet_breed'];?></li>
                  </ul>
                  <!-- Adopt info -->
                  <ul class="adopt-card-info list-unstyled">
                     <li><i class="flaticon-veterinarian-hospital"></i>Special Needs pet</li>
                     <li><i class="flaticon-dog-4"></i>Friendly to other animals</li>
                  </ul>
               </div>
			   <!-- /caption-adoption -->
            </div>
            <!-- /adopt-card -->
         </div>
         <!-- /row -->
         <div class="col-lg-12">
            <h3>About this Pet (<?php echo $line['pet_name'];?>)</h3>
            <p><?php echo $line['about_pet'];?>
            </p>
            
            <p class="font-weight-bold">If you have any doubts or need more information, please  <br>Owner Name : <?php echo $line['owner'];?><br>
               Phone No. <?php echo $line['owner_contact'];?>
            </p>
            
            <a href="tel:<?php echo $line['owner_contact'];?>" class="btn btn btn-secondary mt-2">Call to Adopt me</a>
         </div>
         <!-- /col-lg-12 -->
        <div class="alert alert-danger col-lg-12 mt-5" role="alert">
               <h6>Important Information for future pet owners</h6>
               <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id.</p>
            </div>
         <!-- /col-lg-12 -->
         <div class="col-lg-12">
            <h4 class="mt-5">Frequently Asked questions</h4>
			<!-- divider -->
			<hr class="small-divider left">
            <div class="accordion mt-4">
               <!-- collapsible accordion 1 -->
               <div class="card">
                  <div class="card-header">
                     <a class="card-link" data-toggle="collapse" href="#collapseOne">
                     What documents do I need to adopt a pet?
                     </a>
                  </div>
                  <!-- /card-header -->
                  <div id="collapseOne" class="collapse show" data-parent=".accordion">
                     <div class="card-body">
                        <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
               <!-- collapsible accordion 2 -->
               <div class="card">
                  <div class="card-header">
                     <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                     Are the animals vaccinated?
                     </a>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent=".accordion">
                     <div class="card-body">
                        <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
               <!-- collapsible accordion 3 -->
               <div class="card">
                  <div class="card-header">
                     <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                     How much is the adoption fee?
                     </a>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent=".accordion">
                     <div class="card-body">
                        <p>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus scelerisque laoree.</p>
                     </div>
                  </div>
               </div>
               <!-- /card -->
            </div>
            <!-- /accordion -->
            
			<!-- /alert -->
            <!-- Button -->	
            <div class="text-center">
               <a href="#" class="btn btn btn-secondary mt-4">Adopt me</a>
               <a href="adoption.html" class="btn btn btn-primary mt-4 ml-2">Go back to adoption gallery</a>
            </div>
			<!-- /text-center -->
         </div>
         <!-- /col-lg-12 -->
      </div>
      <!-- /page-with-sidebar -->
      <!-- ==== Sidebar ==== -->
      <div id="sidebar" class="bg-light h-100 col-lg-3 card pattern3 ">
   <div class="widget-area">
      <h5 class="sidebar-header">Adoption events</h5>
      <!-- event 1 -->		 
      <div class="widget2">
         <div class="card" >
            <div class="card-img">
               <!-- image event -->	
               <a href="event-single.html">
               <img class="card-img-top" src="img/adoption/adoptionsidebar1.jpg" alt="">
               </a>
            </div>
            <!-- /card-img -->
            <div class="card-body">
               <!-- event info -->	
               <a href="event-single.html">
                  <h6 class="card-title">NYC Adoption Fair</h6>
               </a>
               <!-- list -->
               <ul class="list-inline colored-icons">
                  <li class="list-inline-item"> <span><i class="fas fa-calendar-alt mr-2"></i>2th February at 4pm</span></li>
                  <li class="list-inline-item">	<span><i class="fas fa-map-marker-alt mr-2"></i>Washington Square Park</span></li>
               </ul>
               <!-- button -->	
               <div class="text-center">
                  <a href="event-single.html" class="btn btn-primary  btn-sm mt-0">More info</a>
               </div>
            </div>
            <!--/card-body -->	
         </div>
         <!-- /card -->	
      </div>
      <!--/widget2 -->
   </div>
   <!--/widget-area -->
   <div class="widget-area">
      <h5 class="sidebar-header">Information</h5>
      <p>In id fermentum augue, ut pellen tesque Maecenas at arcu risus. Donec com modo sodales ex.</p>
      <h5 class="sidebar-header">Adopt a pet</h5>
      <div class="widget1">
         <!-- widget info 1 -->
         <div class="col-lg-12">
            <a href="#">
               <div class="widget-1-info">
                  <!-- image -->
                  <img src="img/adoption/adoption2.jpg"  alt="" class="img-fluid rounded">
                  <span>Leelo</span>           
               </div>
            </a>
         </div>
         <!-- widget info 1 -->
         <div class="col-lg-12">
            <a href="#">
               <div class="widget-1-info">
                  <!-- image -->
                  <img src="img/adoption/adoption3.jpg"  alt="" class="img-fluid rounded">
                  <span>Jonsi</span>           
               </div>
            </a>
         </div>
         <!-- widget info 1 -->
         <div class="col-lg-12">
            <a href="#">
               <div class="widget-1-info">
                  <!-- image -->
                  <img src="img/adoption/adoption5.jpg" alt="" class="img-fluid rounded">
                  <span>Milena</span>           
               </div>
            </a>
         </div>
         <!-- /col-lg-12 -->
         <div class="text-center">
            <a href="adoption.html" class="btn btn-primary btn-sm">See all</a>
         </div>
      </div>
      <!-- /widget1 -->
   </div>
   <!-- /widget-area -->
</div>
<!-- /sidebar -->   </div>
   <!-- /row -->
</div>
<!-- /page --><!-- ==== Newsletter - call to action ==== -->
<div class="container-fluid footer-bg block-padding overlay">
   <div class="container">
      <div class="col-lg-5 text-light text-center">
         <h4>Subscribe to our newsletter</h4>
         <p>We send e-mails once a month, we never send Spam!</p>
         <!-- Form -->				
         <div id="mc_embed_signup" >
            <!-- your form address in the line bellow -->
		<form action="https://ingridkuhn.us20.list-manage.com/subscribe/post?u=2bc190484536d73c66c28d6a8&amp;id=8ea081e025" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate> 
		<div class="mc-field-group">
                     <div class="input-group">
                        <input class="form-control border2 input-lg required email" type="email" value="" name="EMAIL" placeholder="Your email here" id="mce-EMAIL">
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
                        </span>
                     </div>
                     <!-- Subscription results -->
                     <div id="mce-responses" class="mailchimp">
                        <div class="alert alert-danger response" id="mce-error-response"></div>
                        <div class="alert alert-success response" id="mce-success-response"></div>
                     </div>
                  </div>
                  <!-- /mc-fiel-group -->									
               </div>
               <!-- /mc_embed_signup_scroll -->
            </form>
            <!-- /form ends -->								
         </div>
         <!-- /mc_embed_signup -->
      </div>
      <!--/ col-lg-->
   </div>
   <!--/ container-->
</div>
<!--/container-fluid-->
<!-- ==== footer ==== -->
<?php include("footer.php") ?>
<!--/ footer-->

<!-- Bootstrap core & Jquery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Js -->
<script src="js/custom.js"></script>
<script src="js/plugins.js"></script>
<!-- Prefix free -->
<script src="js/prefixfree.min.js"></script>
 <!-- Bootstrap Select Tool (For Module #4) -->
<script src="switcher/js/bootstrap-select.js"></script>
<!-- All Scripts & Plugins -->
<script src="switcher/js/dmss.js"></script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7ZJPV8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


</body>

<!-- Mirrored from www.ingridkuhn.com/themes/unitedpets/adoption-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 10:56:06 GMT -->
</html>