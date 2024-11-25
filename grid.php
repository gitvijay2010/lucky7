<html>
<head>
	<title>Grid System GamePlay</title>
</head>
<body>
<?php
error_reporting(E_ALL);
$players = 3;
$grid = 4;
$dice = 0;
$round = 0;
if(isset($_GET['submit']) && isset($_GET['submit']) == 'submit'){
	$grid = (int)$_GET['grid'];

	// / $total_positions = $grid * $grid;
	// $tmp_grid = $grid;
	// for($i=0;$i<$total_positions;$i++){

	// 	echo $i.'-'.$x.'-'.$y;
	// 	for($x=$x; $x<$tmp_grid; $x++){
	// 		$axis[$i] = "(".$x.",".$y.")";
	// 		$i++;
	// 	}
	// 	$x=$gx;
	// 	$y=$gy+1;
	// 	$i--;

	// 	echo "<pre>";print_r($axis);

	// }
	// exit;
	// // echo "<pre>";print_r($axis);exit;
	$total_positions = $grid * $grid;
	for($winner=0; $winner < 2 ; $winner++){
		$winner = 0;
		// echo $winner;
		for($player = 1; $player <=3 ; $player++){
			
			$dice = rand(1,6);
			$player_roll[$player]['dice'][$round] = $dice;
			//check totl dice and add totla if its less than expected total or skip
			if(!isset($player_roll[$player]['position'])){
				$player_roll[$player]['position'] = $dice;
				$player_roll[$player]['position_h'][$round] = $player_roll[$player]['position'];
			}
			if(($player_roll[$player]['position'] + $dice) <= $total_positions && $round > 0){
				$player_roll[$player]['position'] = $player_roll[$player]['position'] + $dice;
				$player_roll[$player]['position_h'][$round] = $player_roll[$player]['position'];
			}

			//set axis

			$player_roll['axis'][$round] = "(0,1)";

			//declare winner if total is expected total
			if($player_roll[$player]['position'] == $total_positions){
				$winner = 1;
				$win_player = $player;
				$player = 3;
			}
			else
				$winner = 0;
			
			// echo $round.'-'.$player.'-'.$dice.'-'.$player_roll[$player]['position'].'-'.$winner.'<br>';
		}
		// echo 'totals='.$player_roll[1]['position'].'-'.$player_roll[2]['position'].'-'.$player_roll[3]['position'].'-'.$player_roll['axis'][$round].'<br><br>';
		$round++;
		// if($round == 3)
		// 	$winner = 2;
		// // echo $winner;
		// echo "<br>";
	}
		// echo 'winner'.$win_player;
}
?>
	<h1>Input :</h1>
	<table>
		<form action="index1.php" method="GET">
		<tr>
			<td>Grid</td><td><input type="number" name="grid" min="1" value="<?php echo $grid;?>"></td><td>&nbsp;</td><td>Players</td><td><input type="number" name="players" value="3" disabled></td>
		</tr>
		<tr>
			<td><p style="text-align: center;"><button type="submit" name="submit" value="submit">START</button></p></td>
		</tr>
		</form>
	</table>
	<h2>Output :</h2>
	<table cellpadding="10" cellspacing="0" border="1">
		<tr>
			<td>Player No.</td><td>Dice Roll History</td><td>Position History</td><td>Coordinates History</td><td>Winner Status</td>
		</tr>
		<?php
		for($player=1;$player<=3;$player++){
			if($player == $win_player)
				$winner = "winner";
			else$winner = '';
		?>
		<tr>
			<td><?=$player?></td>
			<td><?php echo implode(',', $player_roll[$player]['dice']);?></td>
			<td><?php echo implode(',', $player_roll[$player]['position_h']);?></td>
			<td></td>
			<td><?=$winner?></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>
