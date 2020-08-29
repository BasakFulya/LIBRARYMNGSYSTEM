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
include 'connection.php';
include 'demo.php';
 ?>
<!-- page content area main -->
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="x_title">
                  <h2>Return Books</h2>

                  <div class="clearfix"></div>
              </div>
                <form name="form1" action="" method="post">
                  <table class="table table-bordered">
                    <tr>
                      <td>
                        <select name="enr" class="form-control">
                          <?php
                          $res = mysqli_query($link, "select enrollment from student_registration");
                          while ($row = mysqli_fetch_array($res)) {
                            echo "<option>";
                            echo $row["enrollment"];
                            echo "</option>";
                          }
                           ?>
                        </select>
                      </td>
                      <td>
                          <input type="submit" name="submit1" value="search" class="form-control btn btn-primary">
                      </td>
                    </tr>
                  </table>
                </form>

                            <?php if (isset($_POST["submit1"]))
                            {
                              $res = mysqli_query($link, "select * from issue_books where student_enrollment='$_POST[enr]' && books_return_date=''  ");
                              echo "<table class='table table-bordered'>";
                              echo "<tr>";
                              echo "<th>"; echo "student enrollment";  echo "</th>";
                              echo "<th>"; echo "student name";  echo "</th>";
                              echo "<th>"; echo "student sem";  echo "</th>";
                              echo "<th>"; echo "student contact";  echo "</th>";
                              echo "<th>"; echo "student email";  echo "</th>";
                              echo "<th>"; echo "books name";  echo "</th>";
                              echo "<th>"; echo "books issue date";  echo "</th>";
                              echo "<th>"; echo "return book";  echo "</th>";
                              echo "</tr>";
                              while ($row = mysqli_fetch_array($res))
                              {
                                echo "<tr>";
                                echo "<td>"; echo $row["student_enrollment"];  echo "</td>";
                                echo "<td>"; echo $row["student_name"];  echo "</td>";
                                echo "<td>"; echo $row["student_sem"];  echo "</td>";
                                echo "<td>"; echo $row["student_contact"];  echo "</td>";
                                echo "<td>"; echo $row["student_email"];  echo "</td>";
                                echo "<td>"; echo $row["books_name"];  echo "</td>";
                                echo "<td>"; echo $row["books_issue_date"];  echo "</td>";
                                echo "<td>"; ?> <a href="return.php?id=<?php echo $row["id"];  ?>">Return Book </a> <?php  echo "</td>";
                                echo "</tr>";
                              }
                              echo "</table>";
                            }
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
