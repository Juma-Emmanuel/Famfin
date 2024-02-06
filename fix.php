<?php   
              require_once 'connection.php';
              
              
              $sql = "SELECT * FROM payments WHERE month = 'April'";
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