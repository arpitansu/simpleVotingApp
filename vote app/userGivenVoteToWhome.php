<?php

	if (isset($_POST['submit'])) {

		if(!empty($_POST['radioButton'])){ 
			$valueFromUser = $_POST['radioButton'];
			
			if($valueFromUser == 'bjp'){
				$mainTeamTable = 'bjp_table';
				$teamOtherOneTable = 'congress_table';
				$teamOtherTwoTable = 'aap_table';
				require "voteParser.php";	
			}//bjp ends
			else if($valueFromUser == 'aap'){
				$mainTeamTable = 'aap_table';
				$teamOtherOneTable = 'congress_table';
				$teamOtherTwoTable = 'bjp_table';
				require "voteParser.php";
			}//aap ends
			else if($valueFromUser == 'congress'){
				$mainTeamTable = 'congress_table';
				$teamOtherOneTable = 'bjp_table';
				$teamOtherTwoTable = 'aap_table';
				require "voteParser.php";
			}//congress ends
		}
		else{
				//require "index.php";
				    echo "<SCRIPT type='text/javascript'> //not showing me this
					        alert('please vote');
					        window.location.replace(\"index.php\");
					    </SCRIPT>";
			}
	}

?>