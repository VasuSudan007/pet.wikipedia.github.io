<?php 
session_start();
require_once("../codelibrary/inc/variables.php");
require_once("../codelibrary/inc/functions.php");
@extract($_REQUEST);
validate_admin();
$arr =$ids;
$submits =$submits;
if(count($arr)>0){
$str_rest_refs=implode(",",$arr);
if($submits=='Activate')
{
$sql="update tbl_post set status=1 where id in ($str_rest_refs)";
mysql_query_db($sql);
$sess_succ='Selected Records has been Activated Successfully';
$_SESSION['sess_succ']=$sess_succ;
}
elseif($submits=='Deactivate')
{	
$sql="update tbl_post set status=0 where id in ($str_rest_refs)";
mysql_query_db($sql);
$sess_succ='Selected Records has been Deactivated Successfully';
$_SESSION['sess_succ']=$sess_succ;
}
elseif($submits=='Featured')
{	
$sql="update tbl_post set featured=1 where id in ($str_rest_refs)";
mysql_query_db($sql);
$sess_succ='Selected Records has been marked as featured Successfully';
$_SESSION['sess_succ']=$sess_succ;
}
elseif($submits=='Remove Featured')
{	
$sql="update tbl_post set featured=0 where id in ($str_rest_refs)";
mysql_query_db($sql);
$sess_succ='Selected Records has been removed from featured Successfully';
$_SESSION['sess_succ']=$sess_succ;
}
elseif($submits=='Delete')
{
$sql="delete from tbl_post where id in ($str_rest_refs)";
mysql_query_db($sql);
$sess_succ='Selected Records has been Deleted Successfully';
$_SESSION['sess_succ']=$sess_succ;
}
}
else{
$sess_warn="Please select Check Box";
$_SESSION['sess_warn']=$sess_warn;
}
header("Location: product_list.php?start=".$start);
exit();
?>