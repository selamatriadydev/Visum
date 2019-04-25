
<?php   
$thisName="./include/slider.txt"; 

 ?>
<style type="text/css">
  body { 
   /* padding-top: 20px;*/ }
#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
  background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}
</style>
<script type="text/javascript">
  $(document).ready( function() {
    $('#myCarousel').carousel({
    interval:   4000
  });
  
  var clickEvent = false;
  $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');    
  }).on('slid.bs.carousel', function(e) {
    if(!clickEvent) {
      var count = $('.nav').children().length -1;
      var current = $('.nav li.active');
      current.removeClass('active').next().addClass('active');
      var id = parseInt(current.data('slide-to'));
      if(count == id) {
        $('.nav li').first().addClass('active');  
      }
    }
    clickEvent = false;
  });
});
</script>

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding-top: 10px;*">
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      
        <div class="item active">
          <img src="./img/bg/1.jpg" style="width: 1200px; height: 500px;" class="gambar">
           <div class="carousel-caption" style="background-color: white; padding: 10px; ">
            <h3 style="color: black;">
              <?php
             $baca=fopen($thisName, "r");
             $tampil=fread($baca, filesize($thisName));
             fclose($baca);
             echo $tampil;  ?></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
 
         <div class="item">
          <img src="./img/bg/2.jpg" style="width: 1200px; height: 500px;" class="gambar">
           <div class="carousel-caption" style="background-color: white; padding: 10px; ">
            <h3 style="color: black;">
            <?php
             $baca=fopen($thisName, "r");
             $tampil=fread($baca, filesize($thisName));
             fclose($baca);
             echo $tampil;  ?></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="./img/bg/3.jpg" style="width: 1200px; height: 500px;" class="gambar">
           <div class="carousel-caption" style="background-color: white; padding: 10px; ">
            <h3 style="color: black;">
              <?php
             $baca=fopen($thisName, "r");
             $tampil=fread($baca, filesize($thisName));
             fclose($baca);
             echo $tampil;  ?></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
        
        <div class="item">
          <img src="./img/bg/4.jpg" style="width: 1200px; height: 500px;" class="gambar">
          <!-- <img src="http://placehold.it/1200x400/999999/cccccc"> -->
           <div class="carousel-caption" style="background-color: white; padding: 10px; ">
            <h3 style="color: black;">
              <?php
             $baca=fopen($thisName, "r");
             $tampil=fread($baca, filesize($thisName));
             fclose($baca);
             echo $tampil;  ?></h3>
            <p></p>
          </div>
        </div><!-- End Item -->
                
      </div><!-- End Carousel Inner -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
<?php
          $page = isset($_GET['menu']) ? $_GET['menu'] : null;?>
      <ul class="nav nav-pills nav-justified">
          <li <?php if($page == "1" ){echo "class='active'";}//elseif($page == NULL ){ echo "class='active'";}
           ?>  ><a href="?page=1&menu=1">Sejarah  <small>RS</small></a></li>
          
          
          <li <?php if($page == "2") {echo "class='active'";} ?> ><a href="?page=1&menu=2">Sekilas <small>Visum</small></a></li>
          <li <?php if($page == "3") {echo "class='active'";} ?> ><a href="?page=1&menu=3">Syarat <small>Visum</small></a></li>
        </ul>


    </div><!-- End Carousel -->



          <?php
          $page = isset($_GET['menu']) ? $_GET['menu'] : null;
          switch ($page) {
                 case '1':
                     include "page/home/story.php";
                     break;
                 case '2':
                     include "page/home/sekilas.php";
                     break;
                 case '3':
                     include "page/home/syarat.php";
                     break;
                 default :
                 include "page/default.php";
               }
          ?>