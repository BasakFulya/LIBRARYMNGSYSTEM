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
include 'demo0.php';
include 'connection.php';
mysqli_query($link,"update messages set read1='y' where dusername='$_SESSION[username]'");
 ?>
<!-- page content area main -->
    <div class="content">
      <div class="x_title">
          <h2>Message From Librarian</h2>

          <div class="clearfix"></div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <table class="table table-bordered">
                <tr>
                  <th>Full Name</th>
                  <th>Title</th>
                  <th>Message</th>
                </tr>

                <?php
                $res = mysqli_query($link,"select * from messages where dusername='$_SESSION[username]' order by id desc");
                while ($row = mysqli_fetch_array($res))
                {

                  $res1 = mysqli_query($link,"select * from admin_registration where username='$row[susername]'");
                  while ($row1 = mysqli_fetch_array($res1))
                  {
                    $fullname=$row1["firstname"]." ".$row1["lastname"];
                  }
                  echo "<tr>";
                  echo "<td>"; echo $fullname ; echo "</td>";
                  echo "<td>"; echo $row["title"]; echo "</td>";
                  echo "<td>"; echo $row["msg"]; echo "</td>";
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
