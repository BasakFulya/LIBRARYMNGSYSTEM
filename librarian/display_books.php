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
                  <h2>Display Books</h2>

                  <div class="clearfix"></div>
              </div>
              <form name="form1" action="" method="POST">

                <input type="text" name="t1" class="form-control" placeholder="Enter books name">
                <input type="submit" name="submit1" value="Search Books" class="btn btn-primary">
              </form>
              <br>
              <?php
              if(isset($_POST["submit1"]))
              {
                $res = mysqli_query($link,"select * from add_books where books_name like('$_POST[t1]%')");
                echo "<table class='table table-bordered'>";
                echo "<tr>";
                echo "<th>"; echo "Books image";  echo "</th>";
                echo "<th>"; echo "Books name";  echo "</th>";

                echo "<th>"; echo "Books author name";  echo "</th>";
                echo "<th>"; echo "Books publication name";  echo "</th>";
                echo "<th>"; echo "Books purchase date";  echo "</th>";
                echo "<th>"; echo "Books price";  echo "</th>";
                echo "<th>"; echo "Books quantity";  echo "</th>";
                echo "<th>"; echo "Books available quantity";  echo "</th>";
                echo "<th>"; echo "Delete Books";  echo "</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($res))
                {
                  echo "<tr>";
                  echo "<td>"; ?> <img src=" <?php echo $row["books_image"]; ?>" height="100" width="100"> <?php  echo "</td>";
                  echo "<td>"; echo $row["books_name"];  echo "</td>";

                  echo "<td>"; echo $row["books_author_name"];  echo "</td>";
                  echo "<td>"; echo $row["books_publication_name"];  echo "</td>";
                  echo "<td>"; echo $row["books_purchase_date"];  echo "</td>";
                  echo "<td>"; echo $row["books_price"];  echo "</td>";
                  echo "<td>"; echo $row["books_qty"];  echo "</td>";
                  echo "<td>"; echo $row["available_qty"];  echo "</td>";
                  echo "<td>";
                  ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php
                  echo "</td>";
                  echo "</tr>";
                }
                echo "</table>";
              }
              else{
              $res = mysqli_query($link,"select * from add_books");
              echo "<table class='table table-bordered'>";
              echo "<tr>";
              echo "<th>"; echo "Books image";  echo "</th>";
              echo "<th>"; echo "Books name";  echo "</th>";

              echo "<th>"; echo "Books author name";  echo "</th>";
              echo "<th>"; echo "Books publication name";  echo "</th>";
              echo "<th>"; echo "Books purchase date";  echo "</th>";
              echo "<th>"; echo "Books price";  echo "</th>";
              echo "<th>"; echo "Books quantity";  echo "</th>";
              echo "<th>"; echo "Books available quantity";  echo "</th>";
              echo "<th>"; echo "Delete Books";  echo "</th>";
              echo "</tr>";
              while($row = mysqli_fetch_array($res))
              {
                echo "<tr>";
                echo "<td>"; ?> <img src=" <?php echo $row["books_image"]; ?>" height="100" width="100"> <?php  echo "</td>";
                echo "<td>"; echo $row["books_name"];  echo "</td>";

                echo "<td>"; echo $row["books_author_name"];  echo "</td>";
                echo "<td>"; echo $row["books_publication_name"];  echo "</td>";
                echo "<td>"; echo $row["books_purchase_date"];  echo "</td>";
                echo "<td>"; echo $row["books_price"];  echo "</td>";
                echo "<td>"; echo $row["books_qty"];  echo "</td>";
                echo "<td>"; echo $row["available_qty"];  echo "</td>";
                echo "<td>";
                ?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>">Delete Books</a> <?php
                echo "</td>";
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
