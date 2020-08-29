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
                  <h2>Issue Books</h2>

                  <div class="clearfix"></div>
              </div>
              <form name="form1" action="" method="post">
                <table>
                  <tr>
                    <td>
                      <select name="enr" class="form-control selectpicker">
                        <?php
                        $res = mysqli_query($link , "select enrollment from student_registration");
                        while ($row = mysqli_fetch_array($res)) {
                          echo "<option>";
                          echo $row["enrollment"];
                          echo "</option>";
                        }
                         ?>
                      </select>
                    </td>
                    <td>
                      <input type="submit" value="Search" name="submit1" class="form-control btn btn-primary" style="margin-top:5px;">
                    </td>
                  </tr>
                </table>

              <?php
              if(isset($_POST["submit1"])){
                $res = mysqli_query($link, "select * from student_registration where enrollment='$_POST[enr]'");
                while($row = mysqli_fetch_array($res))
                {
                  $firstname = $row["firstname"];
                  $lastname = $row["lastname"];
                  $username = $row["username"];
                  $email = $row["email"];
                  $contact = $row["contact"];
                  $sem = $row["sem"];
                  $enrollment = $row["enrollment"];
                  $_SESSION["enrollment"] = $enrollment;
                  $_SESSION["susername"] = $username;
                }
                ?>
                <table class="table table-bordered">
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Enrollment no" value="<?php echo $enrollment; ?>" name="enrollment" disabled></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Student name" value="<?php echo $firstname . " " . $lastname; ?>" name="studentname" required></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Student sem" value="<?php echo $sem; ?>" name="studentsem" required></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Student Contact" value="<?php echo $contact; ?>" name="studentcontact" required></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Studentemail" value="<?php echo $email; ?>" name="studentemail" required></td>
                  </tr>
                  <tr>
                    <td>
                      <select name="booksname" class="form-control selectpicker">
                        <?php
                        $res = mysqli_query($link,"select books_name from add_books");
                        while($row= mysqli_fetch_array($res)){
                          echo "<option>";

                            echo $row["books_name"];
                          echo "</option>";
                        }
                        ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Books issue date" value="<?php echo date("d-m-Y"); ?>" name="booksissuedate" required></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="form-control" placeholder="Student username" value="<?php echo $username; ?>" name="studentusername" disabled></td>
                  </tr>
                  <tr>
                    <td><input type="submit" class="form-control btn btn-primary" name="submit2" value="issue books" ></td>
                  </tr>
                </table>

                <?php
              }
               ?>
               </form>
               <?php
               if(isset($_POST["submit2"]))
               {
                 $qty = 0;
                 $res = mysqli_query($link,"select * from add_books where books_name='$_POST[booksname]'");
                 while ($row = mysqli_fetch_array($res))
                 {
                    $qty = $row["available_qty"];
                 }
                 if ($qty == 0 )
                 {
                   ?>
                   <div class="alert alert-danger col-lg-6 col-lg-push-3">
                       <strong style="color:white">This book is not available in stock</strong>
                   </div>

                   <?php
                 }
                 else{
                 mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','','$_SESSION[susername]')");
                 mysqli_query($link,"update add_books set available_qty=available_qty-1 where books_name='$_POST[booksname]' ");
                 ?>
                 <script type="text/javascript">
                   alert("Books issue successfully");
                   window.location.href = window.location.href;
                 </script>
                 <?php
                 }
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
