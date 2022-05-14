<?php 
session_start();
require_once("../codelibrary/inc/variables.php"); 
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
if($countryid)
{?>	  <div class="select-block1">
<select name="state" required="required" class="col-xs-10 col-sm-5" onChange="city_ajax(this.value)">
<option value="">--Select state--</option>
<?php
$ts=mysql_query_db("select * from tbl_state where status=1 and country_id= '$countryid'" );
while($fts=mysql_fetch_db($ts))
{?>
<option value="<?php echo $fts['id'];?>"><?php echo $fts['region'];?></option>
<?php }
?>
</select>
</div>
<?php }?>