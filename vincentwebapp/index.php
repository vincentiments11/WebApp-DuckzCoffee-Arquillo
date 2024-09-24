<?php
 
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "<h2>Order Summary</h2>";

    function displayOrderSummary(){
        $coffee_prices = [
            "espresso" => 500,
            "latte" => 600,
            "cappucino" => 700,
            "americano" => 800,
            "mocha" => 900,
        ];

        $size_prices = [
            "small" => 0.00,
            "medium" => 50.0,
            "large" => 80.0,
        ];

        $extras_prices = [
            "sugar" => 5.00,
            "cream" => 10.00,
        ];

        $coffee_type = $_POST["coffee"];
        $size = $_POST["size"];

        if(isset($_POST["extras"])) {
            $extras = $_POST["extras"];
        } else {
            $extras = [];
        };

        $total_price = $coffee_prices[$coffee_type] + $size_prices[$size];

        foreach($extras as $extra) {
            $total_price = $total_price + $extras_prices[$extra];
        }

        echo $total_price;
        }
        
        function calculateTotalPrice($coffee_prices, $size_prices, $extras_prices, $coffee_type, $size, $extras){
            $total_price = $coffee_prices[$coffee_type] + $size_prices[$size];

                foreach(extras as $extra) {
                    $total_price += $extras_prices[$extra];
                }
            $total_price = calculatePrice($coffee_prices, $size_prices, $extras_prices, $coffee_typez, $size, $extras);

            echo $name;
            echo "<br />";
            echo $instructions;
            echo "<br />";

            $receiptContent = generateReceipt($name, $coffee_typez, $size, $total_price, $instructions);

            saveReceipt($receiptContent);

            // foreach($extras as $extra) {
            //     $total_price = $total_price + $extras_prices[$extra];
            // }

            // echo $total_price;
            // echo "<br/>";

            // if ($coffee_type !== "espresso") {
            //      echo "Hey, " . htmlspecialchars($_POST["name"]) . "!";
            //      echo "<p>Here's a joke for you: Why did the coffee file a police report? It got mugged!</p>";
            // }

        }

    }

       

    function calculatePrice($coffee_prices, $size_prices, $extras_prices, $coffee_type, $size, $extras){
            $receiptContent .= "Size: " . $size . "\n";
            $receiptContent .= "Total Price: " . $total_price . "\n";
            $receiptContent .= "Instructions: " . $instructions . "\n";
            $receiptContent .= "Thank You for ordering!";

            return $receiptContent;

    }
    
    function saveReceipt($receiptContent){
        $file = fopen("Örder Summary.txt", "w") or die("Unable to open file");

        fwrite($file, $receiptContent);

        fclose($file);

        echo "Receipt saved.";
    }
    
     // calling the function
    displayOrderSummary()

?>