<html>
 <head>
  <title>Tip Calculator in PHP</title>
  <style>
	body {background-color: white;}
	h1   {color: blue;}
	p    {color: black;}
	#error {color: #ff0000}
	#result {color: blue;}
  </style>
 </head>
 <body>


<?PHP

if(isset($_POST["subtotal"]) AND isset($_POST["tip"])){
	$subtotal = $_POST["subtotal"];
	$tip = $_POST["tip"];

	$errormsg = "";

	if(is_numeric($subtotal) and ($subtotal>=0)) {

		if(is_numeric($subtotal) and is_numeric($tip) and ($subtotal>=0) and ($tip >=0)) {
			$amount = number_format(($subtotal*$tip/100), 2);
		}else{
			$$errormsg .= "Please Enter Valid Numbers</font><br/><br/>";}
	}else{
		    $_POST["subtotal"] = 0;
			$subtotal = 0;
			$errormsg .= "<font color='ff0000'>Subtotal must be 0 or higher.</font><br/><br/>";
		}

}
?>

<form action="" method="post">

<h1>Tip Calculator</h1>

<p>
Bill subtotal $:
<input type="text" name="subtotal" value="
<?PHP if(isset($_POST["subtotal"])){echo $_POST["subtotal"]; };?>
">

</p>

<p>
Tip Percentage:

<?php
$tipPercents = array(10, 15, 20);

foreach ($tipPercents as $tipPercent){
?>
<input type="radio" name="tip" value="<?php echo $tipPercent ?>"
<?php
if (isset($tip) && $tip==$tipPercent) echo "checked";
if (!isset($tip) && $tipPercent==$tipPercents[0]) echo "checked";

?>
/>
<?php 
echo $tipPercent . "%       "; 
}; ?>
</p>

<p>
<input type="submit">
</p>

<?PHP if(isset($amount)){
	echo "<div id='result'>";
	echo 'Tip: $' . $amount;
	echo "<br/><br/>";
	echo 'Total: $' . number_format(($subtotal + $amount),2);
	echo "</div>";
}else{

	if(isset($errormsg)){
		echo "<div id='error'>";
		echo $errormsg;
		echo "</div>";
	}
}?>


</form>

</body>
</html>