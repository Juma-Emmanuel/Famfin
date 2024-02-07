<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Jobs</title>
      <link rel="stylesheet" href="paymentview.css" />
      <script src="site.js"></script>     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      <style>

        </style>
    </head>
    <body >
      <!-- <section> -->
        <div class="topbar" id ="topbar">
          <h1 >FamFin Tracker</h1>
        </div>           
        
   <div class="payment-record">
   <a href="index.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
    <div class="username">
    <h1>
    <?php echo $_GET["first_name"];?>
    </h1>
    <h1>
    <?php echo $_GET["last_name"];?>'s
    </h1>
    <h1>
    Payments
    </h1>
    </div>            
              <?php   
              require_once 'connection.php';
              $userid = $_GET["id"];
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
            
            </body>
            </html> 