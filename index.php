<html>
<head>
<title>Lucky 7</title>
</head>
<body>
<?php
if(isset($_GET['balance']) && (int)$_GET['balance'] > 0)
	$balance = $_GET['balance'];
else
	$balance = 100;

$play = '';
if(isset($_GET['play']) && $_GET['play'] == 'yes'){
	$play = 'yes';
	$d1 = rand(1,6);
	$d2 = rand(1,6);

	$total = $d1 + $d2;

	$bet = (int)$_GET['bet'];
	if($total <= $bet && $bet == 6)
		$bet = 6;
	else if($total == 7 && $bet == 7)
		$bet =7;
	else if($total >= 8 && $bet == 8)
		$bet =8;
	else
		$bet = '';

	switch ($bet) {
		case 6:
			// code...
			$balance = $balance + 10;
			$result = "Congratulations! You win! You current balance is now ".$balance."Rs.";
			break;
		
		case 7:
			// code...
			$balance = $balance + 20;
			$result = "Congratulations! You win! You current balance is now ".$balance."Rs.";
			break;

		case 8:
			// code...
			$balance = $balance + 10;
			$result = "Congratulations! You win! You current balance is now ".$balance."Rs.";
			break;

		default:
			// code...
			$balance = $balance - 10;
			$result = "Sorry you lost the bet! You current balance is now ".$balance."Rs.";
			break;
	}
}
?>
<p>Welcome to Lucky 7 game</p>
<p>Place your bet(Rs.10): from your balance Rs. <?php echo $balance;?></p>
<span id="below7" onclick="document.getElementById('bet').value=6;">[Below 7]</span>  <span id="7" onclick="document.getElementById('bet').value=7;">[7]</span>  <span id="above7" onclick="document.getElementById('bet').value=8;">[Above 7]</span>  <span id="play" onclick="playnow();">[Play]</span>

<?php if($play == 'yes'){?>
<p>Game Results</p>
<p>Dice 1: <span id="dice1"><?php echo $d1;?></span></p>
<p>Dice 2: <span id="dice2"><?php echo $d2;?></span></p>
<p>Total : <span id="total"><?php echo $total;?></span></p>

<p id="result"><?php echo $result;?></p>

<p><span><a href="index3.php">[Reset and Play Again]</a></span>  <span><a href="index3.php?balance=<?php echo $balance;?>">[Continue Playing]</a></span></p>
<?php }?>
<input type="hidden" id="bet" name="bet" value="0">
<input type="hidden" id="balance" name="balance" value="<?php echo $balance;?>">

<script type="text/javascript">
function playnow(){
	window.location.href="index3.php?bet="+document.getElementById('bet').value+"&balance="+document.getElementById('balance').value+"&play=yes";
}
</script>
</body>
</html>
