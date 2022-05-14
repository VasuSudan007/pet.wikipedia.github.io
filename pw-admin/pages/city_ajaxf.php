<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
if($countryid)
{?>	  <div class="select-block1">

<select name="city" required="required" class="col-xs-10 col-sm-5">
<option value="">--Select City--</option>
<?php
$ts=mysql_query_db("select * from tbl_city where status=1 and regionid= '$countryid'" );
while($fts=mysql_fetch_db($ts))
{?>
<option value="<?php echo $fts['cityid'];?>"><?php echo $fts['city'];?></option>
<?php }
?>
</select></div>
<?php }?>