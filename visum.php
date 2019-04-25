 <?php
 error_reporting();
 include 'include/konek.php';


        //halaman menu
            $page = isset($_GET['act']) ? $_GET['act'] : null;
            switch ($page) {
                case 'acta1':
                    include "page/agama/action.php";
                     break;
                case 'acta2':
                    include "page/jenisBenda/action.php";
                     break;
                case 'acta3':
                    include "page/jenisKeadaanUmum/action.php";
                     break;
                case 'acta4':
                    include "page/jenisPemeriksaanLuar/action.php";
                     break;
                case 'acta5':
                    include "page/kecamatan/action.php";
                     break;
                // case 'act1':
                //     include "page/mulai.php";
                //      break;
                 default:
                      include "home.php";
            }

      ?>