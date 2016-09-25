<!-- =============================================================== *
*   File: receipt.php                                                *
*                                                                    *
*   This PHP file contains two portion, PHP side and HTML side.      *
*   The HTML side displays a receipt in the form of a table to       *
*   show the user's order from order.html.                           *
*   The PHP side will open order.txt to update the records of        *
*   the total number of apples, oranges and bananas by all users.    *
*   If the text file is not available, a new text file will be       *
*   created and inputs will be stored.                               *
*                                                                    *
*   Author:                 Sherry Lau Geok Teng                     *
*   Matriculation Number:   U1521416A                                *
*   Tutorial Group:         TS4                                      *
* ================================================================= -->
<?php
    // Declaration and instantiation of variables for the
    // cost of each apple, orange and banana respectively
    $appleCost = 0.69;
    $orangeCost = 0.59;
    $bananaCost = 0.39;

    // Declaration and instantiation of variables for the inputs from order.html
    $name = $_POST['name'];
    $apples = $_POST['apples'];
    $oranges = $_POST['oranges'];
    $bananas = $_POST['bananas'];
    $payment = $_POST['payment'];
    // Compute total cost of order
    $total = round(($appleCost*$apples) + ($orangeCost*$oranges) + ($bananaCost*$bananas), 2);

    /**
    * Updates the records in the order.txt to reflect the total number of
    * apples, oranges and bananas ordered by all users.
    * Opens the existing text file and loop through each line to get the
    *  value for each respective item.
    * If the text file does not exist, a new text file will be created and
    * order will be recorded in.
    */
    // Declaration of an array to store data from text file
    $data = array();
    // If the order text file exists
    if(file_exists('order.txt')) {
        // Counter for data
        $i = 0;
        // Open file for reading
        $file = fopen('order.txt', 'r');
        // Loop through each line
        while($line = fgets($file)) {
            // Update the number value of the data
            $data[$i] = explode(': ', $line)[1];
            // Increment to go next line
            $i++;
        }
        // Close file after reading
        fclose($file);
    }
    else {
        // When file does not exists, set default values to 0
        $data = array(0, 0, 0);
    }
    // Create and open file for writing
    $file = fopen('order.txt', 'w');
    // Write records into file
    fwrite($file, 'Total number of apples: '.(intval($data[0])+$apples)."\r\n".'Total number of oranges: '.(intval($data[1])+$oranges)."\r\n".'Total number of bananas: '.(intval($data[2])+$bananas));
    // Close file after writing
    fclose($file);
?>

<html>
    <head>
        <title>CZ3006 Net-Centric Assignment II</title>

        <!-- To introduce responsive web design -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Linking of bootstrap.min.css for the use of Bootstrap styling -->        
        <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="container">
            <div class="page-header">
                <h1>CZ3006 Assignment 2</h1>
                <h4>U1521416A - Sherry Lau Geok Teng</h4>
            </div>
            <!-- Table -->
            <table class="table">
                <!-- Table headers -->
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
                <!-- Table data -->
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
            </table> <!-- End of table tag -->
        </div>
    </body>
</html>