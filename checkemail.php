<?php
	//mysql_connect("localhost", "root","");
	//mysql_select_db("tmdt");

	//$un = $_GET["un"];
	//$sql = "select * from user where username = '$un' ";
	//$u = mysql_query($sql);
	//$x = mysql_num_rows($u);
	//echo $x;
			$conn = mysqli_connect("localhost", "root", '', "tmdt");
			$conn -> set_charset("utf8");
			
			$un = $_GET["un"];
			$sql = "select email from user where email = '$un'";
			$result = mysqli_query($conn ,$sql);
			$existDirector = mysqli_fetch_assoc($result);
			mysqli_free_result($result);
			mysqli_close($conn);
			if(empty($existDirector)){
				$o = '0';
				echo $o;
			}
			else{
				$o = '1';
				echo $o;
			}
			
			
				


?>