<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<?php 

/* echo htmlspecialchars($_POST["name"]); */ 
$players = explode(",", $_POST["name"]);
$players_count = count($players); /* May be useless */

/* Display Player Names + Numbers
$i = 1;
foreach ($players as $player) {
	echo "Spieler " . $i . ": " . $player . "<br>" . "\n"; 
	$i++;
	}
*/

function scheduler($teams) {
	if (count($teams)%2 != 0) {
		array_push($teams,"bye");
	}
	$away = array_splice($teams,(count($teams)/2));
	$home = $teams;
	for ($i=0; $i < count($home)+count($away)-1; $i++) {
		for ($j=0; $j<count($home); $j++) {
			$round[$i][$j]["Home"]=$home[$j];
			$round[$i][$j]["Away"]=$away[$j];
		}
		if(count($home)+count($away)-1 > 2) {
			array_unshift($away,array_shift(array_splice($home,1,1)));
			array_push($home,array_pop($away));
		}
	}
	return $round;
}

$schedule = scheduler($players);

foreach($schedule AS $round => $games) {
	echo "Round: ".($round+1)."<BR>";
	foreach($games AS $play) {
		echo $play["Home"]." - ".$play["Away"];
		echo "&nbsp";
		echo "<div contenteditable='true' style='display: inline'>"."0"."</div>";
		echo ":";
		echo "<div contenteditable='true' style='display: inline'>"."0"."</div>"."<br>";
		echo "</span>";
	}
	echo "<BR>";
}

?>
</body>
</html>
