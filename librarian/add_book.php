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
                   <h2>Add Books</h2>

                   <div class="clearfix"></div>
               </div>
               <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
<table class="table table-bordered">
<tr>
<td><input type="text" class="form-control" placeholder="Books name" name="booksname" required=""></td>
</tr>
<tr>
<td>
Books Image
<input type="file"  name="fl" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books author name" name="bauthorname" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books publication name" name="pname" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books purchase date" name="bpurchasedt" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books price" name="bprice" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books quantity" name="bqty" required=""></td>
</tr>
<tr>
<td><input type="text" class="form-control" placeholder="Books available quantity" name="aqty" required=""></td>
</tr>
<tr>
<td><input type="submit" name="submit1" value="Insert books details" class="btn btn-primary"  ></td>
</tr>
</table>
</form>
             </div>
            </div>
          </div>
        </div>
        <?php
    if(isset($_POST["submit1"]))
    {
      $tm = md5(time());
      $fnm = $_FILES["fl"]["name"];
      $dst = "./Books_Images/".$tm.$fnm;
      $dst1 = "Books_Images/".$tm.$fnm;
      move_uploaded_file($_FILES["fl"]["tmp_name"],$dst);
      mysqli_query($link ,"insert into add_books values('','$_POST[booksname]','$dst1','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");
      ?>
    <script type="text/javascript">
      alert("Books insert successfully")
    </script>
      <?php
    }
         ?>
    <!-- /page content -->
    <?php
    include 'demo2.php';
     ?>
</div>
