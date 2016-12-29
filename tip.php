<!DOCTYPE html>
<html lang="en">
	<body>

		<form target="_self" action="<?php $_PHP_SELF ?>" method="post">
			Bill subtotal: $<input type="text" name="subtotal">
            <br>
            Tip percentage:
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
            <input type="submit" value="Calculate">
        </form>
        
        <?php
        if ( $_POST["percent"] || $_POST["subtotal"]) {
            $subtotal = intval($_POST["subtotal"]);
            if ($subtotal <= 0) {
                return;
            }
            $percent = intval($_POST["percent"]);
            $tip = $subtotal * ($percent / 100);
            $total = $subtotal + $tip;
            echo "Tip: $$tip <br>Total: $$total";
        }
        ?>
	</body>
</html>
