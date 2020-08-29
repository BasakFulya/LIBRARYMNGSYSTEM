<?php
session_start();
if(!isset($_SESSION["username"]))
{
  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php
}
include 'connection.php';
include 'demo0.php';
 ?>
<!-- page content area main -->

    <div class="content">
      <div class="x_title">
          <h2>My Issued Books</h2>

          <div class="clearfix"></div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <table class="table table-bordered">
                <th>
                  Student Enrollment No
                </th>
                <th>
                   Books Name
                </th>
                <th>
                  Books Issue Date
                </th>
                <th>
                  Return Books Date
                </th>

                <?php
                $res = mysqli_query($link , "select * from issue_books where student_username = '$_SESSION[username]'");
                while($row = mysqli_fetch_array($res))
                {
                  echo "<tr>";
                  echo "<td>";
                  echo $row["student_enrollment"];
                  echo "</td>";
                  echo "<td>";
                  echo $row["books_name"];
                  echo "</td>";
                  echo "<td>";
                  echo $row["books_issue_date"];
                  echo "</td>";
                  echo "<td>";
                  if ($row["books_return_date"] == "")
                  {
                    echo "not delivered";
                  }
                  else
                  {
                    echo $row["books_return_date"];
                  }
                  echo "</td>";
                  echo "</tr>";

                }
                 ?>
              </table>
            </div>
            </div>
            </div>
            </div>
    <!-- /page content -->
    <?php
    include 'demo2.php';
     ?>
</div>
