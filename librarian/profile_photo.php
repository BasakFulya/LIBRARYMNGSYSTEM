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
                  <h2>Add Profile Photo</h2>

                  <div class="clearfix"></div>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div>
                  <input type="file" name="fl" required=""/>
              </div>
              <hr>
              <div >
                  <input type="submit" name="submit2" value="Save" class="btn btn-primary"  >
              </div>
              </form>
              <?php
              if(isset($_POST["submit2"]))
              {
                $tm = md5(time());
                $fnm = $_FILES["fl"]["name"];
                $dst = "./Profile_Photo/".$tm.$fnm;
                $dst1 = "Profile_Photo/".$tm.$fnm;
                move_uploaded_file($_FILES["fl"]["tmp_name"],$dst);
                mysqli_query($link,"update admin_registration set profile_photo='$dst1' where username='$_SESSION[librarian]'");
                ?>
                <script type="text/javascript">
                  alert("photo added successfully");
                  window.location = "profile_photo.php";
                </script>
                <?php
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
