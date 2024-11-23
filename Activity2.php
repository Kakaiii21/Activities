<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        h1 {
            margin-top: 30px;
            color: #333;
        }
        form {
            display: block;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
        label {
            display: block;
            margin: 15px 0 5px;
        }
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            transition: background 0.3s;
        }
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background: #007BFF;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        input[type="range"]:focus {
            background: #b3d1ff;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        img {
            margin-top: 20px;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
        }
        div {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }
    </style>
</head>
<body >
    <br>
    <br>
    <br>

    <div>
        <h1>Peys App</h1>
        
        <?php 
        // Default values for the image
        $borderColor = "#000000";
        $imgSize = 10;

        if (isset($_POST['btnProcess'])) { 
            $borderColor = $_POST['slctColorBorder'];
            $imgSize = $_POST['rangeSize'];
        }
        ?>
        
        <!-- Display the image -->
        <img src="Dellamas.jpg" alt="Selected Image" 
             width="<?= $imgSize; ?>%" 
             height="<?= $imgSize; ?>%" 
             style="border: 5px solid <?= $borderColor; ?>;">
        
        <form method="post">
            <label for="rangeSize">Select Photo Size:</label>
            <input type="range" name="rangeSize" id="rangeSize" min="10" max="100" value="<?= $imgSize; ?>">

            <label for="slctColorBorder">Select Border Color:</label>
            <input type="color" name="slctColorBorder" id="slctColorBorder" value="<?= $borderColor; ?>">

            <button type="submit" name="btnProcess">Process</button>
        </form>
    </div>
</body>
</html>
