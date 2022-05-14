
<?php 
require_once("codelibrary/inc/variables.php"); 
require_once("codelibrary/inc/functions.php");

@extract($_REQUEST);
{
	$sql=mysql_query_db("select * from tbl_counter where status=1");
	$line=mysql_fetch_db($sql);
	@extract($line);
}
 



$todays_date=date('20y-m-d');
$this_month=date('m');
$prev_month=$this_month-1;
if ($post_date!=$todays_date) {

    if ($this_month!=$prev_month) {

    	$lm=$month_count+$count;
    	$month_count=0;
	mysql_query_db("update tbl_counter set last_month_count='$lm', month_count='$month_count' , status=1,post_date=now() where id=1");
}

	$total=$month_count+$count;
	mysql_query_db("update tbl_counter set count=0 ,yesterday_count='$count',prev_month='$prev_month',month_count='$total',status=1,post_date=now() where id=1");
}


 
else {
$visitor = $count+1;
$count =$visitor;
mysql_query_db("update tbl_counter set count='$count' ,status=1,post_date=now() where id=1");
mysql_query_db("delete from tbl_counter where post_date < now() - interval 1 DAY");
};
?>
