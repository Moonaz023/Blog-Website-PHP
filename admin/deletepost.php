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
if(!isset($_GET['delpostid'])||$_GET['delpostid']==NULL){
	echo "<script>window.location='postlist.php';</script>";
	//header("Location:catlist.php")
}else{
	$postid=$_GET['delpostid'];
	
	$query="select * from tbl_post where id='$postid'";
	$getData=$db->select($query);
	if($getData){
		while($delimg=$getData->fetch_assoc()){
			$dellink=$delimg['image'];
			unlink($dellink);
		}
	}
	$delquery="delete from tbl_post where id='$postid'";
	$delData=$db->delete($delquery);
	if($delquery){
		echo "<script>alert('Data Deleted Successfully')</script>";
		echo "<script>window.location='postlist.php';</script>";
	}else{
		echo "<script>alert('Data Not Deleted')</script>";
		echo "<script>window.location='postlist.php';</script>";
	
	}
	
}
?>