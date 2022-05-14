<?php
function ak_img_resize($target, $newcopy, $w, $h, $ext) {
//echo "<br><Br><br>";
//echo $target."-".$newcopy."-".$w."-".$h."-".$ext;
//echo "<br><Br><br>";
$target=str_replace(" ","",$target);
$newcopy=str_replace(" ","",$newcopy);
if(($w!='')&&($h!='')&&($w!='0')&&($h!='0'))
{
list($w_orig, $h_orig) = @getimagesize($target);
$scale_ratio = $w_orig / $h_orig;
if (($w / $h) > $scale_ratio) {
$w = $h * $scale_ratio;
} else {
$h = $w / $scale_ratio;
}
$img = "";
$ext = strtolower($ext);
if (($ext == "gif")||($ext == "image/gif")){ 
$img = @imagecreatefromgif($target);
} else if(($ext =="png")||($ext =="image/png")){ 
$img = @imagecreatefrompng($target);
} else { 
$img = @imagecreatefromjpeg($target);
}
$tci = @imagecreatetruecolor($w, $h);
// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
/*just added for transparency */
$white = @imagecolorallocate($tci, 255, 255, 255);
@imagefill($tci, 0, 0, $white);
/*--*/
@imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
@imagejpeg($tci, $newcopy, 80);
}
}
function upload_imagen($uploaded_file,$wmax,$hmax,$fullpath, $fullthumbpath)
{
//echo $uploaded_file."-".$resizewidth."-".$wmax."-".$hmax."-".$fullpath."-".$fullthumbpath;
$fileName = trim(addslashes(strtolower((time().$_FILES[$uploaded_file]["name"])))); // The file name
$fileName=str_replace(" ","",$fileName);
$fileTmpLoc = $_FILES[$uploaded_file]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES[$uploaded_file]["type"]; // The type of file it is
$fileSize = $_FILES[$uploaded_file]["size"]; // File size in bytes
$fileErrorMsg = $_FILES[$uploaded_file]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom);
$ss=getimagesize($fileTmpLoc);
if(count($ss)>0)
{
$actualwidth = $ss[0];
$actualheight = $ss[1];
$fileExt=image_type_to_mime_type( $ss[2]);
if (!$fileTmpLoc) { // if file not chosen
    $err="ERROR: Please browse for a file before clicking the upload button.";
	$_SESSION[sess_msg]=$err;
} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    $err="ERROR: Your file was larger than 5 Megabytes in size.";
	$_SESSION[sess_msg]=$err;
    @unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
} else if (!preg_match("/.(gif|jpg|png|jpeg)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     $err="ERROR: Your image was not .gif, .jpg, or .png.";
	 $_SESSION[sess_msg]=$err;
     @unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    $err="ERROR: An error occured while processing the file. Try again.";
	$_SESSION[sess_msg]=$err;
}
else
{
//echo $fullpath."/".$fileName;
$moveResult = move_uploaded_file($fileTmpLoc, $fullpath."/".$fileName);
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
$err="ERROR: File not uploaded. Try again.";
$_SESSION[sess_msg]=$err;
@unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
exit();
}
else
{
$target_file = $fullpath."/".$fileName;
$resized_file = $fullthumbpath."/".$fileName;
$wmax = $wmax;
$hmax = $hmax;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
if(($actualwidth>640)||($actualheight>480))
{
ak_img_resize($target_file, $target_file, '640', '480', $fileExt);
}
return $fileName;
}
}
}
else
{
echo "Invalid Image";
}
}
?>