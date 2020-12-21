<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SETUP DB</title>
</head>

<body bgcolor="#000000">

<div style=" margin-top:20px;color:#FFF; font-size:24px; text-align:center"> 
Welcome&nbsp;&nbsp;&nbsp;
<font color="#FF0000"> Dhakkan </font>
<br>
</div>

<div style=" margin-top:10px;color:#FFF; font-size:23px; text-align:left">
<font size="3" color="#FFFF00">
SETTING UP THE DATABASE SCHEMA AND POPULATING DATA IN TABLES:
<br><br> 


<?php
//including the Mysql connect parameters.
include("../../sql-connections/db-creds.inc");



$con = mysqli_connect($host,$dbuser,$dbpass);
if (!$con)
  {
  die('[*]...................Could not connect to DB, check the creds in db-creds.inc: ' . mysqli_error($con));
  }


//@mysqli_select_db('mysql',$con)	
	
//purging Old Database	
	$sql="DROP DATABASE IF EXISTS security";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Old database 'SECURITY' purged if exists"; echo "<br><br>\n";}
	else 
		{echo "[*]...................Error purging database: " . mysqli_error($con); echo "<br><br>\n";}


//Creating new database security
	$sql="CREATE database `security` CHARACTER SET `utf8` ";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Creating New database 'SECURITY' successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating database: " . mysqli_error($con);echo "<br><br>\n";}

//creating table users
$sql="CREATE TABLE security.users (id int(3) NOT NULL AUTO_INCREMENT, username varchar(20) NOT NULL, email varchar(30) NOT NULL, password varchar(20) NOT NULL, PRIMARY KEY (id))";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Creating New Table 'USERS' successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating Table: " . mysqli_error($con);echo "<br><br>\n";}


//creating table emails
$sql="CREATE TABLE security.emails
		(
		id int(3)NOT NULL AUTO_INCREMENT,
		email_id varchar(30) NOT NULL,
		PRIMARY KEY (id)
		)";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Creating New Table 'EMAILS' successfully"; echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating Table: " . mysqli_error($con);echo "<br><br>\n";}


//creating table uagents
$sql="CREATE TABLE security.uagents
		(
		id int(3)NOT NULL AUTO_INCREMENT,
		uagent varchar(256) NOT NULL,
		ip_address varchar(35) NOT NULL,
		username varchar(20) NOT NULL,
		PRIMARY KEY (id)
		)";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Creating New Table 'UAGENTS' successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating Table: " . mysqli_error($con);echo "<br><br>\n";}


//creating table referers
$sql="CREATE TABLE security.referers
		(
		id int(3)NOT NULL AUTO_INCREMENT,
		referer varchar(256) NOT NULL,
		ip_address varchar(35) NOT NULL,
		PRIMARY KEY (id)
		)";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Creating New Table 'REFERERS' successfully";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error creating Table: " . mysqli_error($con);echo "<br><br>\n";}







//inserting data
$sql="INSERT INTO security.users (id, username, password) VALUES ('1', 'User1', 'email1', 'password1'), ('2', 'User2', 'email2', 'password2'), ('3', 'User3', 'email3', 'password3'), ('4', 'User4', 'email4', 'password4')";
	if (mysqli_query($con, $sql))
		{echo "[*]...................Inserted data correctly into table 'USERS'";echo "<br><br>\n";}
	else 
		{echo "[*]...................Error inserting data: " . mysqli_error($con);echo "<br><br>\n";}


//including the Challenges DB creation file.
include("../../sql-connections/setup-db-challenge.php");
?>


</font>
</div>
</body>
</html>
