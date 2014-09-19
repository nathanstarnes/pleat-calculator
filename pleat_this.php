<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$x = $_POST['pleatWidthTbx'];//Desired Width of Pleat.
		$y = $_POST['waistWidthTbx'];//Width of Waist.
		
		if ($x == ""){$error .= "Must Enter Width of Pleat.<br/>";} 
		if ($y == ""){$error .= "Must Enter Width of Waist.";}
		
		if ($error == ""){
			$n = 3 * $x; //1 inch of pleat requires 3 inches of fabric. X = how wide you want to make the pleat.
			$p = $y / $x;//total inches of pleated sections in fabric.
			$q = $n * $p;//Total inches of fabric needed.
			$finalQ = $q / 36; //converts inches to yards.
			$finalQ = "Total Fabric Needed:<br/>" . $finalQ . " yards or " . $q . " inches";
		} else {
			$finalQ = "<span style='color: red;font-weight:bold;'>" . $error . "</span>";
		}
	}
?>
<h2 style="font-family: myriad pro">Pleat Calculator:</h2>
<form method="post">
	Width of Pleat: <input name="pleatWidthTbx" type="text" placeholder="Pleat Width(inches)"/><br/>
    Width of Waist: <input name="waistWidthTbx" type="text" placeholder="Waist Width(inches)"/><br/><br/>
    <input type="submit" name="submitBtn" value="Submit"/><br/>
    <? echo "$finalQ"; ?>
</form>