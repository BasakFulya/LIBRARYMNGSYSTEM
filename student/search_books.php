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
          <h2>Search Books</h2>

          <div class="clearfix"></div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form name="form1" action="" method="post">
                <table class="table table-bordered">
                  <tr>
                    <td>
                      <input class="form-control" type="text" name="t1" placeholder="Enter Books name" required>
                    </td>
                    <td>
                      <input type="submit" name="submit1" value="search books" class="form-control btn btn-primary">
                    </td>
                  </tr>
                </table>
              </form>
              <?php
              if (isset($_POST["submit1"]))
              {
                $i = 0 ;
                $res = mysqli_query($link , " select * from add_books where books_name like('%$_POST[t1]%')");
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                while ($row = mysqli_fetch_array($res))
                {
                  $i = $i +1 ;
                  echo "<td>";
                   ?> <img src="../librarian/<?php echo $row["books_image"] ?>" height="100" width="100">    <?php
                   echo "<br>";
                   echo "<b>". $row["books_name"]. "</b>";
                   echo "<br>";
                   echo "<b>". "Available:" . $row["available_qty"]. "</b>";
                  echo "</td>";
                  if ($i == 2 )
                  {
                    echo "</tr>";
                    echo "<tr>";
                    $i = 0 ;
                  }

                }
                echo "</tr>";
                echo "</table>";
              }
              else {
                $i = 0 ;
                $res = mysqli_query($link , " select * from add_books");
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                while ($row = mysqli_fetch_array($res))
                {
                  $i = $i +1 ;
                  echo "<td>";
                   ?> <img src="../librarian/<?php echo $row["books_image"] ?>" height="100" width="100">    <?php
                   echo "<br>";
                   echo "<b>". $row["books_name"]. "</b>";
                   echo "<br>";
                   echo "<b>". "Available:" . $row["available_qty"]. "</b>";
                  echo "</td>";
                  if ($i == 2 )
                  {
                    echo "</tr>";
                    echo "<tr>";
                    $i = 0 ;
                  }

                }
                echo "</tr>";
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
