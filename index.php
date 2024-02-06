<?php

// Start session and check if logged in
session_start();
if (!isset($_SESSION["user_id"])) {
    // header("Location: index.php");
    exit;
}

// Secure content here (only accessible after successful login)

?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Jobs</title>
      <link rel="stylesheet" href="style.css" />
      <script src="site.js"></script>     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body id = "body">
      <div class="container">
        <nav id="nav">
          <ul>
            <li><a href="#" class="logo">              
              
              <i class="fa-solid fa-user-tie"></i>
              <span class="nav-item">Admin</span>
            </a></li>
            <li><a href="#" onclick="showSection('jobs')">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>
            <li><a href="#" onclick="showSection('payment-view')" >
              <i class="fas fa-comment"></i>
              <span class="nav-item">Message</span>
            </a></li>
            <li><a href="#"onclick="showSection('payments')" >
              <i class="fas fa-database"></i>
              <span class="nav-item">Payments</span>
            </a></li>
          
           
    
            <li><a href="#" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>   
    
        <section class="main">
          <section class="section-display" id = "payments">
            <div class="topbar" id ="topbar">
              <h1 id = "topbar-h1">FamFin Tracker</h1>
              <div class="greeting">
                <h1 class="">Hi, <?php echo $_SESSION["first_name"]; ?>!</h1>
              </div>
            </div>
            <div id = "jobs-list" class="jobs-list">
            <h1 id = "jobs-list-h1">Monthly Payments</h1>
            <?php
            require_once 'connection.php';
            $sql = "SELECT month, SUM(amount) AS totalAmount FROM payments GROUP BY month";
            $result = $conn->query($sql);
            $totalAmount = 0;
            echo '<table class="table" >
            <thead>
                <tr>
                
                
                <th>MONTH</th>               
                                          
                <th>AMOUNT</th>                
                </tr>
                </thead>';

                if ($result->num_rows > 0) {
                  // Output data in a table
                  while($row = $result->fetch_assoc()) {
                  echo '<tbody> 
                  <tr>
                  
                                 
                  <td class = "entries">' . $row["month"] . '</td>
                  
                  <td class = "entries">' . $row["totalAmount"] . '</td> 
                 </tr>
                 </tbody>';
                 $totalAmount += $row["totalAmount"];
                }
                echo '<tbody>
                <tr >
                   
                    <td class="total">Total</td>
                    <td class="total">' . $totalAmount . '</td>
                </tr>
            </tbody>';
              } else {
                  echo "No payments.";
              }
                 
                 echo '</table>';
                
                 
                  ?>
            </div>
          </section>
          
       

         
          <section class="section-display" id = "jobs">
            <div class="topbar" id ="topbar">
              <h1 id = "topbar-h1">FamFin Tracker</h1>
                          
              <div class="greeting">
              <h1 class="">Hi, <?php echo $_SESSION["first_name"]; ?>!</h1>
              
              </div>
            </div>
            <div class="stats">
              <div class="cardbox">
                <div class="cardtext">
                  <div style="display: flex;"> 
                    <h3 style="padding-right: 10px;">Ksh</h3>
                  <h3><?php echo $totalAmount; ?></h3>
                </div>
                  <h>Total Savings</h>
                </div>
                <div class="iconBx">
                  <i class="fa-solid fa-sack-dollar"></i>
                </div>
              </div>
              <div class="cardbox">
                <div class="cardtext">
                  <h3>50</h3>
                  <h>Total Members</h>
                </div>
                <div class="iconBx">
                 <i class="fa-solid fa-users"></i>
                </div>
              </div>
              <div class="cardbox">
                <div class="cardtext">
                  <div style="display: flex;"> 
                    <h3 style="padding-right: 10px;">Ksh</h3>
                  <h3>150000</h3>
                </div>
                  <h>Target Amount</h>
                </div>
                <div class="iconBx">
                  <i class="fa-solid fa-sack-dollar"></i>
                </div>
              </div>
            </div>
            <div class="main-tasks" id = "main-tasks">
              
                
              
                           
            </div>
            <div id = "jobs-list" class="jobs-list">
              <h1 id = "jobs-list-h1">Members List</h1>
              <?php   
                       
              require_once 'fetchusers.php';
                echo '<table class="table" >
                <thead>
                <tr>
                <th>Id</th>
                <th>FIRST NAME</th>               
                <th>LAST NAME</th>                            
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>VIEW</th>
                <th>ADD PAYMENT</th>
                </tr>
                </thead>';

                if ($result->num_rows > 0) {
                  // Output data in a table
                  while($row = $result->fetch_assoc()) {
                    $userid =  $row["id"];
                    $first_name =  $row["first_name"];
                    $last_name =  $row["last_name"];
                  echo '<tbody>
                  <tr>
                  <td>' . $row["id"] .'</td>
                  <td>' . $row["first_name"] . '</td>                 
                  <td>' . $row["last_name"] . '</td>
                  <td>' . $row["email"] . '</td>
                  <td>' . $row["phone_number"] . '</td>                           
                 
                  
                 <td><a href="paymentview.php?id=' . $row["id"] . '&first_name=' . $row["first_name"] . '&last_name=' . $row["last_name"] . '" >View paymentdds</a></td>
                 <td><a href="paymentform.php?id=' . $row["id"] . '">Add payment</a></td>
                 

                 </tr>
                 </tbody>';
                }
              } else {
                  echo "No users found.";
              }
                 
                 echo '</table>';
                //  $conn->close();
                 
                  ?>
             </div>

          </section>
         <section class="section-display" id = "payment-view">
         <div class="payment-record">
   <a href="index.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
    <div class="username">
    <h1>
    <?php echo $first_name;?>
    </h1>
    <h1>
    <?php echo $last_name;?>'s
    </h1>
    <h1>
    Payments
    </h1>
    </div>            
              <?php   
              require_once 'connection.php';
              // $userid = $_GET["id"];
              // $userid =  $row["id"];
              echo $userid;
              $first_name =$_GET["first_name"];
              
              $sql = "SELECT * FROM payments WHERE userid = $userid";
              $result = $conn->query($sql);
              $totalAmount = 0;
                echo '<table class="table" >
                <thead>
                <tr>
                
                
                <th>MONTH</th>               
                <th>DATE PAID</th>                            
                <th>AMOUNT</th>                
                </tr>
                </thead>';

                if ($result->num_rows > 0) {
                  // Output data in a table
                  while($row = $result->fetch_assoc()) {
                  echo '<tbody> 
                  <tr>
                  
                                 
                  <td class = "entries">' . $row["month"] . '</td>
                  <td class = "entries">' . $row["date"] . '</td>
                  <td class = "entries">' . $row["amount"] . '</td> 
                 </tr>
                 </tbody>';
                 $totalAmount += $row["amount"];
                }
                echo '<tbody>
                <tr>
                    <td colspan="1"></td> <!-- Empty cells for NAME and MONTH columns -->
                    <td class="total">Total</td>
                    <td class="total">' . $totalAmount . '</td>
                </tr>
            </tbody>';
              } else {
                  echo "No payments.";
              }
                 
                 echo '</table>';
                 $conn->close();
                 
                  ?>
             </div>
         </section>
         </section>
    </body>
    </html>
 
