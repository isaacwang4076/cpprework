<!DOCTYPE html>
<html lang="en">
	<body>
        <div align="center">
        <h1>Tip Calculator</h1>
		<form target="_self" action="<?php $_PHP_SELF ?>" method="post">
			Bill subtotal: $<input type="text" value="<?php echo $_POST["subtotal"]?>" name="subtotal">
			<!--Bill subtotal: $<input type="text" value="100" name="subtotal">-->
            <br>
            <br>
            Tip percentage:
            <br>
            <br>
            <?php
                for ($x = 10; $x <= 20; $x+=5) {
				    // the 15% button is checked by default
                    if ($x == 15) {
                        echo("<input type='radio' name='percent' value=$x checked='checked'>$x%\t");
                    }
                    else {
                        echo("<input type='radio' name='percent' value=$x>$x%\t");
                    }
                }
            ?>
            <br>
            <br>
            <input type="submit" value="Calculate">
        </form>
        <br>
        
        <?php
        if ( $_POST["percent"] || $_POST["subtotal"]) {

            if (!is_numeric($_POST["subtotal"])) {
            	echo "<p style='color:red;'>Err: Subtotal must be a valid int greater than zero.</p>";
                return;
            }

            $subtotal = intval($_POST["subtotal"]);
            
			if ($subtotal <= 0) {
            	echo "<p style='color:red;'>Err: Subtotal must be a valid int greater than zero.</p>";
                return;
            }

            $percent = intval($_POST["percent"]);
            $tip = $subtotal * ($percent / 100);
            $total = $subtotal + $tip;
            echo "Tip: $$tip <br>Total: $$total";
        }
        ?>
        </div>
	</body>
        
</html>
