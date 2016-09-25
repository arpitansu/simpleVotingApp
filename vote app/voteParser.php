<?php
require "connectionToDatabase.php";
?>

<?php
//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
$ip = ip2long($ip);
?>

<?php

	function queryRunner($nameOfTable){
		global $ip;
		$queryTable = "SELECT `votes_ips` FROM `vote_counter_database`.`$nameOfTable` WHERE `votes_ips` = '$ip'";
		$queryRun = mysql_query($queryTable) or die(mysql_error());
		$queryRow = mysql_num_rows($queryRun);
		return $queryRow;
	}

	function thankYouMsg(){
		echo "<SCRIPT type='text/javascript'> //not showing me this
					        alert('Thank You for your valuable vote');
					        window.location.replace(\"index.php\");
					    </SCRIPT>";
	}

	function deleteFromTable($tableNameToDeleteFrom){
		global $ip;
		$DeleteFromTable = "DELETE FROM `vote_counter_database`.`$tableNameToDeleteFrom` WHERE `votes_ips` = '$ip'";
		mysql_query($DeleteFromTable) or die(mysql_error());
	}
	function insertToTable($tableNameToInsert){
		global $ip;
		$insertToTable = "INSERT INTO `vote_counter_database`.`$tableNameToInsert` (`votes_ips`) VALUES ('$ip')";
		mysql_query($insertToTable) or die(mysql_error());
	}
//echo $mainTeamTable;
//echo $teamOtherOneTable;
//echo $teamOtherTwoTable;

	if(queryRunner($mainTeamTable)==1){
		//deleteFromTable($mainTeamTable);
		//insertToTable($mainTeamTable);
		thankYouMsg();
	}
	else if(queryRunner($teamOtherOneTable)==0 && queryRunner($teamOtherTwoTable)==0){
		insertToTable($mainTeamTable);
		thankYouMsg();
	}
	else if (queryRunner($teamOtherOneTable)==1) {
		deleteFromTable($teamOtherOneTable);
		insertToTable($mainTeamTable);
		thankYouMsg();
	}
	else if (queryRunner($teamOtherTwoTable)==1) {
		deleteFromTable($teamOtherTwoTable);
		insertToTable($mainTeamTable);
		thankYouMsg();
	}
	else{
		echo "Some error occured please try again.";
		thankYouMsg();
	}


//`u215066361_vfi95`

?>


