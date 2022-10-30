<?PHP 
	include '../lib/session.php';
	Session::checkSession();
?>
<?PHP include '../config/config.php';?>
<?PHP include '../lib/Database.php';?>
<?PHP include '../helpers/format.php';?>
<?PHP
$db=new Database();
?>
<?php
if(!isset($_GET['delpage'])||$_GET['delpage']==NULL){
	echo "<script>window.location='index.php';</script>";
	//header("Location:catlist.php")
}else{
	$pageid=$_GET['delpage'];
	

	$delquery="delete from tbl_page where id='$pageid'";
	$delData=$db->delete($delquery);
	if($delquery){
		echo "<script>alert('Page Deleted Successfully')</script>";
		echo "<script>window.location='index.php';</script>";
	}else{
		echo "<script>alert('Page Not Deleted')</script>";
		echo "<script>window.location='index.php';</script>";
	
	}
	
}
?>