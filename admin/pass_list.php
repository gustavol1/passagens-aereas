<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require '../helpers/init_conn_db.php';?>
<style><!-- log on to codeastro.com for more projects -->
table {
  background-color: white;
}
h1 {
  margin-top: 20px;
  margin-bottom: 20px;
  font-family: 'product sans';  
  font-size: 50px !important; 
  font-weight: lighter;
}
body {
  background-color: #efefef;
}
th {
  font-size: 22px;
  /* font-weight: lighter; */
  /* font-family: 'Courier New', Courier, monospace; */
}
td {
  margin-top: 10px !important;
  font-size: 16px;
  font-weight: bold;
  font-family: 'Assistant', sans-serif !important;
}
</style>
    <main>
        <?php if(isset($_SESSION['adminId'])) { ?>
          <div class="container-md mt-2">
            <h1 class="display-4 text-center text-secondary"
              >Lista de passageiros</h1>
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th scope="col">Primeiro Nome</th>
                  <th scope="col">Nome do meio</th>
                  <th scope="col">Sobrenome</th>
                  <th scope="col">Contato</th>
                  <th scope="col">D.O.B</th>
                  <th scope="col">Pago pelo</th>
                  <th scope="col">Quantia</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $cnt=1;
                $flight_id = $_GET['flight_id'];
                $stmt_t = mysqli_stmt_init($conn);
                $sql_t = 'SELECT * FROM Ticket WHERE flight_id=?';
                $stmt_t = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt_t,$sql_t)) {
                    header('Location: ticket.php?error=sqlerror');
                    exit();            
                } else {
                    mysqli_stmt_bind_param($stmt_t,'i',$flight_id);            
                    mysqli_stmt_execute($stmt_t);
                    $result_t = mysqli_stmt_get_result($stmt_t);
                    while($row_t = mysqli_fetch_assoc($result_t)) {                  
                      $sql = 'SELECT * FROM Passenger_profile WHERE passenger_id=?';  
                      $stmt = mysqli_stmt_init($conn);
                      mysqli_stmt_prepare($stmt,$sql);  
                      mysqli_stmt_bind_param($stmt,'i',$row_t['passenger_id']);          
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);                
                      if ($row = mysqli_fetch_assoc($result)) {
                          $sql_p = 'SELECT * FROM PAYMENT WHERE flight_id=? AND user_id=?';  
                          $stmt_p = mysqli_stmt_init($conn);
                          mysqli_stmt_prepare($stmt_p,$sql_p);  
                          mysqli_stmt_bind_param($stmt_p,'ii',$flight_id,$row['user_id']);          
                          mysqli_stmt_execute($stmt_p);
                          $result_p = mysqli_stmt_get_result($stmt_p);                
                          if ($row_p = mysqli_fetch_assoc($result_p)) {
                            $sql_u = 'SELECT * FROM Users WHERE user_id=?';  
                            $stmt_u = mysqli_stmt_init($conn);
                            mysqli_stmt_prepare($stmt_u,$sql_u);  
                            mysqli_stmt_bind_param($stmt_u,'i',$row['user_id']);          
                            mysqli_stmt_execute($stmt_u);
                            $result_u = mysqli_stmt_get_result($stmt_u);                
                            if ($row_u = mysqli_fetch_assoc($result_u)) {
                              echo "                  
                              <tr class='text-center'>
                                <td>".$cnt."</td>
                                <td>".$row['f_name']."</td>
                                <td>".$row['m_name']."</td>
                                <td>".$row['l_name']."</td>
                                <td>".$row['mobile']."</td>
                                <td>".$row['dob']."</td>
                                <td scope='row'>".$row_u['username']."</td>
                                <td>$ ".$row_p['amount']."</td>
                              </tr>
                              "; 
                            }                       
                          }                    
                      }
                      $cnt++; }
                      }
                ?>

              </tbody>
            </table>

          </div>
        <?php } ?>

    </main><!-- log on to codeastro.com for more projects -->
