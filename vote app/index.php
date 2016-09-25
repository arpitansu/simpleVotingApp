<!DOCTYPE html>
<html>
<head>
	<title>vote app</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type="text/css">
		.votes{margin-top: 50px;}
		.percentage{margin-top: 50px;}
	</style>
</head>
<body>
<div class="container">
<h2 class="text-center">VOTE FOR INDIA</h2>
	<form action="userGivenVoteToWhome.php" method="POST">
	<div class="row jumbotron votes">
		<div class="col-md-4 text-center"><input type="radio" name="radioButton" value="bjp">BJP</input></div>
		<div class="col-md-4 text-center"><input type="radio" name="radioButton" value="congress">CONGRESS</input></div>
		<div class="col-md-4 text-center"><input type="radio" name="radioButton" value="aap">AAP</input></div>
		<br></br>
		<div class="text-center"><input type="submit" name="submit" value="submit your vote"></input></div>
		
	</div>	

	</form>
<?php require "totalVotesCounter.php"; ?>
	<div class="row jumbotron percentage">

		<div class="col-md-4 text-center">BJP = <?php echo $votesOfBjp; ?>(<span><?php echo $percentageOfBjp; ?>%</span>)</div>
		<div class="col-md-4 text-center">Congress = <?php echo $votesOfCongress; ?>(<span><?php echo $percentageOfCongress; ?>%</span>)</div>
		<div class="col-md-4 text-center">AAP = <?php echo $votesOfAap; ?>(<span><?php echo $percentageOfAap; ?>%</span>)</div>
	</div>
<h3 class="text-center">*one vote per ip address<p> voters can change their vote whenever they want.</p></h3>
</div>

</body>
</html>
