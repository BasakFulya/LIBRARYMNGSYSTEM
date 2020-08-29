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
                  <h2>Send message to student</h2>

                  <div class="clearfix"></div>
              </div>
              <form name="form1" action="" method="post"
              class="col-lg-6" enctype="multipart/form-data">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <select class="form-control" name="dusername">
                      <?php
                      $res = mysqli_query($link,"select * from student_registration");
                      while ($row = mysqli_fetch_array($res))
                      {
                        ?><option value="<?php echo $row["username"]?>">
                        <?php echo $row["username"]. "(" . $row["enrollment"]. ")"; ?>
                      </option>
                        <?php
                      }
                       ?>

                    </select>
                  </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Message: <br>
                      <textarea name="msg" class="form-control"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    <input type="submit" name="submit1" value="send message" class="btn btn-primary">
                    </td>
                  </tr>
              </table>
              </form>
            </div>
            </div>
            </div>
            </div>
    <!-- /page content -->
    <?php
    if(isset($_POST["submit1"]))
    {
      mysqli_query($link,"insert into messages values('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n')") or die (mysqli_error($link));
      ?>
<script type="text/javascript">
    alert("Message send successfully");
</script>
       <?php
    }
     ?>
    <?php
    include 'demo2.php';
     ?>
</div>
