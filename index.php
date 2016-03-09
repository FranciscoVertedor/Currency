<?php 
require 'class_currency.php';

?> 

<!-- form to send information -->
<form action='' method='post'>
	<label for='price'>Price</label>
	<input type='text' name='price'>
	<label for='paid'>Paid</label>
	<input type='text' name='paid'>
	<input type='submit' value='Send' name="calculate_change">
</form>

<?php 
if(isset($_POST['calculate_change'])){
	if(isset($_POST['price'])){
		if((isset($_POST['paid']))){
			$price = (float)$_POST['price'];
			$paid = (float)$_POST['paid'];
			$currency = new currency();
			if($price == 0 and $paid == 0){
				echo "missing the parameters price and paid<br>";
			}else if($price == 0){
				echo "missing the parameter price<br>";
			}else if($paid == 0){
				echo "missing the parameter paid<br>";
			}else{
				$currency->change_2($price, $paid);
				echo "Price-> ". $price .  " Paid-> ". $paid. "<br>";
				$currency->get_change();
			}
		}
	}
}
?>
