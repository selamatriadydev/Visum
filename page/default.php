   <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <div class="thumbnail text-center">
              <h3>WELCOME  &nbsp; 
              <?php
               $kodeadm=$_SESSION['id_admin'];
                $query=mysqli_query($conn, "SELECT * from admin where id_admin='$kodeadm'");
                $rowad=mysqli_fetch_array($query);
                echo $rowad['nm_admin'];
                echo "<hr>";
                echo date('d-M-Y');
              ?>
              </h3>
            </div>
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->