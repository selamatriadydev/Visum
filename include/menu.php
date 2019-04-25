 <?php 
if(!isset($_SESSION['id_admin'])) {
                     echo '<script type="text/javascript">
                      setTimeout(function() {window.location.href = "logout.php"}, 2)
                   </script>';
                 }
$page = isset($_GET['page']) ? $_GET['page'] : null;?>



 <header class="main-header">

    <nav class="navbar navbar-static-top">

      <div class="container">

        <div class="navbar-header">

          <!-- <a href="#" class="navbar-brand"><b>Admin</b>RS</a> -->

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">

            <i class="fa fa-bars"></i>

          </button>

        </div>



        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">

        <ul class="nav navbar-nav">

            <li <?php if($page == "1") echo "class='active'"; ?> >

              <a href="vs.php?page=1">

                <!-- <i class="fa fa-home"></i> -->

                  Home

              </a>

            </li>

            <li <?php if($page == "2") {echo "class='active'";} ?>  >

              <a href="vs.php?page=2">

                <!-- <i class="fa fa-user-md"></i> -->

                  Pemeriksaan

              </a>

            </li>

            <li <?php if($page == "3") echo "class='active'"; ?>  >

              <a href="vs.php?page=3">

               <!--  <i class="fa fa-envelope-o"></i> -->

                  Hasil

              </a>

            </li>

            <li <?php if($page == "4") {echo "class='active'";}elseif($page == "act1") {echo "class='active'";} ?> >

              <a href="vs.php?page=4">

                <!-- <i class="fa fa-envelope-o"></i> -->

                  Referensi

                </a>

            </li>
            <li>

              <a href="./logout.php">
                  Logout

                </a>

            </li>

            

          </ul>

        </div>

        <!-- /.navbar-collapse -->

        <!-- Navbar Right Menu -->

        <div class="navbar-custom-menu">

          

        </div>

        <!-- /.navbar-custom-menu -->

      </div>

      <!-- /.container-fluid -->

    </nav>

  </header>