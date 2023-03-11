<?php
$firstname = filter_input(INPUT_POST, 'fnameBox');
$lastname = filter_input(INPUT_POST, 'lnameBox');
if(!empty($firstname) || !empty($lastname))
{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "testtable";
	//creating connection
	$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	if(mysql_connect_error())
	{
		die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$INSERT = "INSERT INTO names(Firstname,Lastname) values('$firstname','$lastname')";
		if($conn->query($INSERT))
		{
			echo "new record inserted!";
		}
		else
		{
			echo "error: ".$INSERT."<br>".$conn->error;
		}
		$conn->close();
	}
}

?>