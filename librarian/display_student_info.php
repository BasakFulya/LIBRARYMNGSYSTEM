<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}
include 'demo.php';
include 'connection.php';
 ?>
<!-- page content area main -->
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="x_title">
                  <h2>Display Student Info</h2>

                  <div class="clearfix"></div>
              </div>
              <?php
              $res = mysqli_query($link,"select * from student_registration");
              echo "<table class='table table-bordered'>";
                echo "<tr>";
                echo "<th>"; echo "firstname"; echo "</th>";
                echo "<th>"; echo "lastname"; echo "</th>";
                echo "<th>"; echo "username"; echo "</th>";
                echo "<th>"; echo "password"; echo "</th>";
                echo "<th>"; echo "email"; echo "</th>";
                echo "<th>"; echo "contact"; echo "</th>";
                echo "<th>"; echo "sem"; echo "</th>";
                echo "<th>"; echo "enrollment"; echo "</th>";
                echo "<th>"; echo "status"; echo "</th>";
                echo "<th>"; echo "Approve"; echo "</th>";
                echo "<th>"; echo "Not Approve"; echo "</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_array($res)) {
                  echo "<tr>";
                  echo "<td>"; echo $row["firstname"]; echo "</td>";
                  echo "<td>"; echo $row["lastname"]; echo "</td>";
                  echo "<td>"; echo $row["username"]; echo "</td>";
                  echo "<td>"; echo $row["password"]; echo "</td>";
                  echo "<td>"; echo $row["email"]; echo "</td>";
                  echo "<td>"; echo $row["contact"]; echo "</td>";
                  echo "<td>"; echo $row["sem"]; echo "</td>";
                  echo "<td>"; echo $row["enrollment"]; echo "</td>";
                  echo "<td>"; echo $row["status"]; echo "</td>";
                  echo "<td>"; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a> <?php  echo "</td>";
                  echo "<td>"; ?> <a href="notapprove.php?id=<?php echo $row["id"]; ?>">Not Approve</a> <?php  echo "</td>";
                  echo "</tr>";
                }
              echo "</table>";
               ?>
            </div>
           </div>
         </div>
       </div>
    <!-- /page content -->
    <?php
    include 'demo2.php';
     ?>
</div>
