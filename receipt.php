<?php
    $appleCost = 0.69;
    $orangeCost = 0.59;
    $bananaCost = 0.39;

    $name = $_POST['name'];
    $apples = $_POST['apples'];
    $oranges = $_POST['oranges'];
    $bananas = $_POST['bananas'];
    $total = ($appleCost*$apples) + ($orangeCost*$oranges) + ($bananaCost*$bananas);
    $total = round($total, 2);
    $payment = $_POST['payment'];

    $data = array();
    if(file_exists('order.txt')) {
        $i = 0;
        $file = fopen('order.txt', 'r');
        while($line = fgets($file)) {
            $data[$i] = explode(': ', $line)[1];
            $i++;
        }
        fclose($file);
    }
    else {
        $data = array(0, 0, 0);
    }
    $file = fopen('order.txt', 'w');
    fwrite($file, 'Total number of apples: '.(intval($data[0])+$apples)."\r\n".'Total number of oranges: '.(intval($data[1])+$oranges)."\r\n".'Total number of bananas: '.(intval($data[2])+$bananas));
    fclose($file);
?>

<html>
    <head>
        <title>CZ3006 Net-Centric Assignment II</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="page-header">
                <h1>CZ3006 Assignment 2</h1>
                <h4>U1521416A - Sherry Lau Geok Teng</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>No. of Apples</th>
                        <th>No. of Oranges</th>
                        <th>No. of Bananas</th>
                        <th>Total Cost</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php print("$name") ?></td>
                        <td><?php print("$apples") ?></td>
                        <td><?php print("$oranges") ?></td>
                        <td><?php print("$bananas") ?></td>
                        <td><?php print("$total") ?></td>
                        <td><?php print("$payment") ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>