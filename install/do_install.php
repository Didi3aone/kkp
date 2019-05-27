<?php
    /**
    * @author didi
    * referensi webbuilderproject.com
    */
    ini_set('max_execution_time', 900); //300 seconds 

    if (isset($_POST)) {
        $host       = $_POST["host"];
        $dbuser     = $_POST["dbuser"];
        $dbpassword = $_POST["dbpassword"];
        $dbname     = $_POST["dbname"];

        //set konek to database
        $servername = $host;
        $username   = $dbuser;
        $password   = $dbpassword;
        
        //buat koneksi 
        $conn = new mysqli($servername, $username, $password);
        
        // buat database
        if( $dbname ) {
            $sql = "CREATE DATABASE ".$dbname."";
        }
        
        //check apakah database berhasil dibuat 
        if ($conn->query($sql) === FALSE) {
            echo json_encode(array(
                "success" => false ,"message" => "Error creating database: " . $conn->error
            ));
        }

        //tutup koneksi
        $conn->close();

        $email          = $_POST["email"];
        $name           = $_POST["username"];
        $login_password = $_POST["password"] ? $_POST["password"] : "";

        //check required fields
        if (!($host && $dbuser && $dbname && $email && $name && $login_password)) {
            echo json_encode(array(
                "success" => false, "message" => "Semua Field wajib di isi."
            ));
            exit();
        }

        //check for valid email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo json_encode(array(
                "success" => false, "message" => "Semua Field wajib di isi."
            ));
            exit();
        }


        //check koneksi valid
        $mysqli = @new mysqli($host, $dbuser, $dbpassword, $dbname);

        if (mysqli_connect_errno()) {
            echo json_encode(array(
                "success" => false, "message" => $mysqli->connect_error
            ));
            exit();
        }

        //all input seems to be ok. check required fiels
        if (!is_file('database.sql')) {
            echo json_encode(array(
                "success" => false, "message" => "File database tidak ada di folder!"
            ));
            exit();
        }

        /*
         * check the db config file
         * if db already configured, we'll assume that the installation has completed
         */
        $db_file_path = "../application/config/database.php";
        $db_file = file_get_contents($db_file_path);
        $is_installed = strpos($db_file, "HOSTNAME");
        if (!$is_installed) {
            echo json_encode(array(
                "success" => false, "message" => "Aplikasi ini sudah terinstal anda tidak bisa melakukan instalasi lagi."
            ));
            exit();
        }

        //start installation
        $sql = file_get_contents("database.sql");

        //set admin information to database
        $now = date("Y-m-d H:i:s");

        /*$sql = str_replace('admin_fname', $first_name, $sql);
        $sql = str_replace('admin_lname', $last_name, $sql);*/
        $sql = str_replace('SYSTEM@APPLICATION.com', $email, $sql);
        $sql = str_replace('root', $name, $sql);
        $sql = str_replace('1234', password_hash($login_password, PASSWORD_DEFAULT), $sql);
        //$sql = str_replace('admin_create_date', $now, $sql);

        //create tables in datbase 
        $mysqli->multi_query($sql);
        do {
            
        } while (mysqli_more_results($mysqli) && mysqli_next_result($mysqli));

        $mysqli->close();
        // database created
        // set the database config file
        $db_file = str_replace('{HOSTNAME}', $host, $db_file);
        $db_file = str_replace('{USERNAME}', $dbuser, $db_file);
        $db_file = str_replace('{PASSWORD}', $dbpassword, $db_file);
        $db_file = str_replace('{DATABASE}', $dbname, $db_file);

        file_put_contents($db_file_path, $db_file);

        // set random enter_encryption_key
        $config_file_path = "../application/config/config.php";
        $encryption_key = substr(md5(rand()), 0, 15);
        $config_file = file_get_contents($config_file_path);
        $config_file = str_replace('enter_encryption_key', $encryption_key, $config_file);

        file_put_contents($config_file_path, $config_file);
       
        // set the environment = production
        $index_file_path = "../index.php";

        $index_file = file_get_contents($index_file_path);
        $index_file = preg_replace('/pre_installation/', 'production', $index_file, 1); //replace the first occurence of 'pre_installation'

        file_put_contents($index_file_path, $index_file);


        echo json_encode(array(
            "success" => true, "message" => "Instalasi Berhasil"
        ));
        exit();
    }
?>