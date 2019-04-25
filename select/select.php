<html>
    <head>
        <title>Pilihan Berantai</title>
    </head>
    <body>
        <?php
//        koneksi ke database
        mysql_connect('localhost', 'root', '');
        mysql_select_db('select');
        ?>
        <form method="post">
            
            <!--provinsi-->
            <select id="provinsi" name="provinsi">
                <option value="">Please Select</option>
                <?php
                $query = mysql_query("SELECT * FROM kota ORDER BY nm_kota");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['id_kota']; ?>">
                        <?php echo $row['nm_kota']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            
            <!--kota-->
            <select id="kota" name="kota">
                <option value="">Please Select</option>
                <?php
                $query = mysql_query("SELECT
                                    *
                                  FROM
                                    kecamatan
                                    INNER JOIN kota ON kecamatan.id_kota = kota.id_kota ORDER BY nm_kecamatan");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option id="kota" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kecamatan']; ?>">
                        <?php echo $row['nm_kecamatan']; ?>
                    </option>
                <?php
                }
                ?>
            </select>

            <!--kecamatan-->
            <select id="kecamatan" name="kecamatan">
                <option value="">Please Select</option>
                <?php
                $query = mysql_query("SELECT
                                        *
                                      FROM
                                        kecamatan
                                        INNER JOIN kota ON kecamatan.id_kota_fk = kota.id_kota ORDER BY nama_kecamatan");
                while ($row = mysql_fetch_array($query)) {
                ?>
                    <option id="kecamatan" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kecamatan']; ?>">
                        <?php echo $row['nama_kecamatan']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </form>
        
        <script src="jquery-1.10.2.min.js"></script>
        <script src="jquery.chained.min.js"></script>
        <script>
            $("#kota").chained("#provinsi");
            $("#kecamatan").chained("#kota");
        </script>
        
    </body>
</html>