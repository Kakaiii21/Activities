<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
    <style>
        fieldset {
            width: 500px; 
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            padding: 0 5px; 
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        h1, b {
            margin-top: 20px;
            font-size: 20px;
        }
        div {
            border: 2px solid #000; /* Added border */
            padding: 20px;          /* Added padding for better layout */
            max-width: 600px;       /* Limit the width of the div */
            margin: 0 auto;         /* Center align the div */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for effect */
            border-radius: 10px;   /* Optional: Rounded corners */
        }
    </style>
</head>
<body >

<div >
    <?php 
        $coffee = [
          'Iced Americano' => 60,
          'Caramel Machiato' => 55,
          'Iced Vanilla' => 60,
          'Spanish Latte' => 65,
          'Cafe Mocha' => 55
        ];

        $sizes = [
          'Regular' => 0,
          'Grande' => 10,
          'Venti' => 20,
        ];
    ?>
    <form method="post">
        <h1 style="color: pink; text-align: center; font-size: 50px;"  >Vendo Machine</h1>

        <fieldset>
            <legend>Products:</legend>
            <?php foreach ($coffee as $key => $value): ?>
                <input type="checkbox" name="chkcoffee[]" id="chkcoffee<?= $key ?>" value="<?= $key ?>">
                <label for="chkcoffee<?= $key ?>"><?= $key ?> - ₱<?= $value ?></label><br>
            <?php endforeach; ?>
        </fieldset>

        <fieldset>
            <legend>Options:</legend>
            <label for="drpSizes">Size:</label>
            <select name="drpSizes" id="drpSizes">
                <?php foreach ($sizes as $key => $value): ?>
                    <option value="<?= $key ?>">
                        <?= $key ?><?= $value > 0 ? " (add ₱{$value})" : '' ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>

            <label for="noQuantity">Quantity:</label>
            <input type="number" name="noQuantity" id="noQuantity" min="1" value="1">
            <br><br>
            <button type="submit" name="btnCheck">Check Out</button>
        </fieldset>
    </form>

    <?php if (isset($_POST['btnCheck'])): ?>
        <?php if (empty($_POST['chkcoffee'])): ?>
            <h1>No Selected Item, Try Again.</h1>
        <?php else: ?>
            <?php 
                $coffeeChoosen = $_POST['chkcoffee'];
                $size = $_POST['drpSizes'];
                $quantity = $_POST['noQuantity'];
                $total = 0;
                $quantities = 0;
            ?>
            <hr>
            <h1>Purchase Summary:</h1>
            <ul>
                <?php foreach ($coffeeChoosen as $value): ?>
                    <?php 
                        $cost = ($coffee[$value] + $sizes[$size]) * $quantity;
                        $total += $cost;
                        $quantities += $quantity;
                    ?>
                    <li>
                        <?= $quantity . ' ' . ($quantity > 1 ? 'orders' : 'order') . ' of ' . $size . ' ' . $value . ' Amounting to ₱' . $cost; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <br>
            <div>
            <b>Total Number of Orders: <?= $quantities; ?></b><br>
            <b>Total Amount: ₱<?= $total; ?></b>
            </div>
            <br>
            <br>

        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
