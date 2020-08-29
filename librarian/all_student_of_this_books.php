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
include 'header.php';
include 'demo.php';
 ?>
<!-- page content area main -->
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="x_title">
                  <h2>All Student of This Books</h2>

                  <div class="clearfix"></div>
              </div>
              <?php
              $res = mysqli_query($link,"select * from issue_books where books_name='$_GET[books_name]' && books_return_date=''");
              echo "<table class='table table-bordered'>";
              echo "<tr>";
              echo "<th>"; echo "student name"; echo "</th>";
              echo "<th>"; echo "student enrollment"; echo "</th>";
              echo "<th>"; echo "books name"; echo "</th>";
              echo "<th>"; echo "student email"; echo "</th>";
              echo "<th>"; echo "student contact"; echo "</th>";
              echo "<th>"; echo "student books issue date"; echo "</th>";
              echo "</tr>";
              while ($row = mysqli_fetch_array($res))
              {
                echo "<tr>";
                echo "<td>"; echo $row["student_name"]; echo "</td>";
                echo "<td>"; echo $row["student_enrollment"]; echo "</td>";
                echo "<td>"; echo $row["books_name"]; echo "</td>";
                echo "<td>"; echo $row["student_email"]; echo "</td>";
                echo "<td>"; echo $row["student_contact"]; echo "</td>";
                echo "<td>"; echo $row["books_issue_date"]; echo "</td>";
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
