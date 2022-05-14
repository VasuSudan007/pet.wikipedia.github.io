<?php
ob_start ();
include("inc/header.inc.php");
	validate_admin();
    if(empty($_SESSION['boat_admin_id']))
    {
	header("location:index.php");
    }
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
                  header("location:http://bmtclinic.com/About-doctor-vikas-dua.php".'$id');
	}
	$sql=mysql_query_db("select * from tbl_content where id='$id'");
	$line=mysql_fetch_db($sql);
?>
<script src="<?php echo CK?>"></script>

<!-- main sidebar -->
<?php include("inc/sidebar.php");?>
    <div id="page_content">
        <div id="page_content_inner">
            <h4 class="heading_a uk-margin-bottom"><?php echo $row['type']; ?></h4>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
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
								<br>
								<input type="file" name="image" style="width:350px; height:30px; padding:5px; border:1px solid #cccccc;">
								<?php if($line['image']){?><br><img src="../upload_images/thumb/<?php echo $line['image'];?>" border="0" style="width:100px; height:100px;"><?php }?>
								<br><br>
                                <button name="ownerSub" id="ownerSub" class="md-btn md-btn-primary" type="submit" style="margin-top:10px;">Submit</button>
                            </div>
                        </div>
                    </div>
		  </form>
                </div>
            </div>
            

        </div>
    </div>
<!-- main contant end -->
<!-- secondary sidebar -->
<?php
    //include("includes/right_sidebar.php");
?>
<!-- secondary sidebar end -->

<?php
    include("includes/footer.php");
?>
