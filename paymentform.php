
<?php
$id = $_GET["id"];

  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add payment</title>
        <link rel="stylesheet" href="paymentform.css" />
    </head>
    <body>
        <div class="topbar" id ="topbar">
            <h1 id = "topbar-h1">FamFin Tracker</h1>           
           
        </div>
        <div class="container">
            <form action="paymentquery.php" method="post">
            <input type="hidden" id ="userid"  name="userid" value="<?php echo $id; ?>">
            <select id="monthSelected" name="monthSelected">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value='April'>April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
                
            </select>               
                <input id ="date"name ="date" type="text" class="" placeholder="Date" required>
                <input id ="amount" name ="amount" type="number" class="" placeholder="Amount (Ksh)" required>                
                <button id = "register-btn" type="submit">Submit Payment</button>
                          
            </form>
        </div>
    </body>
</html>