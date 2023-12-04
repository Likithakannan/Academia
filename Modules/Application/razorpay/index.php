<?php 
    session_start();
    //$randomValue = rand(); // Generate a random value for typeProduct   
?>
<form method="GET" action="pay.php">
    <input type="number" name="phone" placeholder="Phone Number"><br>
    <input type="email" name="email" placeholder="Enter Email Address"><br>
    <input type="number" name="total" placeholder="Enter Amount"><br>
    <!--<input type="hidden" name="typeProduct" value="<?php echo $randomValue; ?>"> <!-- Pass the random value as a hidden field -->
    <button type="submit">Pay</button>
</form>
