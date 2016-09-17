<?php
    $appleCost = 0.69;
    $orangeCost = 0.59;
    $bananaCost = 0.39;

    $name = $_POST['name'];
    $noOfApples = $_POST['apples'];
    $noOfOranges = $_POST['oranges'];
    $noOfBananas = $_POST['bananas'];
    $total = ($appleCost*$noOfApples) + ($orangeCost*$noOfOranges) + ($bananaCost*$noOfBananas);
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
    fwrite($file, 'Total number of apples: '.(intval($data[0])+$noOfApples)."\r\n".'Total number of oranges: '.(intval($data[1])+$noOfOranges)."\r\n".'Total number of bananas: '.(intval($data[2])+$noOfBananas));
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
                        <td><?php echo $name ?></td>
                        <td><?php echo $noOfApples ?></td>
                        <td><?php echo $noOfOranges ?></td>
                        <td><?php echo $noOfBananas ?></td>
                        <td><?php echo $total ?></td>
                        <td><?php echo $payment ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>