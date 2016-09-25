<?php
require "connectionToDatabase.php";
?>

<?php

	$votesOfBjp = countVotes("bjp_table");
	$votesOfCongress = countVotes("congress_table");
	$votesOfAap = countVotes("aap_table");

		
	function countVotes($tableName){

		$queryVotes = "SELECT * FROM `$tableName`";
		$queryRun = mysql_query($queryVotes) or die(mysql_error());
		$votes = mysql_num_rows($queryRun);
		return $votes;
	}

	$percentageOfBjp = votePercentage($votesOfBjp);
	$percentageOfCongress = votePercentage($votesOfCongress);
	$percentageOfAap = votePercentage($votesOfAap);

	function votePercentage($teamVotes){
		global $votesOfAap,$votesOfBjp,$votesOfCongress;
		$totalVotesGivenToAllTeams = $votesOfBjp+$votesOfAap+$votesOfCongress;
		@$teamPercentage = ($teamVotes/$totalVotesGivenToAllTeams)*100;
		return round($teamPercentage,2);
	}

?>