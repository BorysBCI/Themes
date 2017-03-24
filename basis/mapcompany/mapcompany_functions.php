
<?php

define( 'GOOGLE_MAP_API', 'AIzaSyBhzExsa3mM67-istbw49Pi2Sx-1x_gAAg' );

require_once $_SERVER['DOCUMENT_ROOT'] . "/wp-config.php";

require_once "PHPExcel.php";


//setting connection parameters
$user = DB_USER;
$password = DB_PASSWORD;
$database_name = DB_NAME;
$hostname = DB_HOST_SLAVE;
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

$max_rows = 50;
// $can_search_location = 50;
$can_search_location = 5;

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}



$main_table = 'db_company';
$main_table = 'DB_Company';
$main_sql_create = "
    CREATE TABLE IF NOT EXISTS `$main_table` (
        `Id` int(11) NOT NULL AUTO_INCREMENT,
        `nameCompany` varchar(100) NOT NULL DEFAULT '',
        `address` varchar(255) NOT NULL DEFAULT '',
        `website` varchar(255) NOT NULL DEFAULT '',
        `Category` varchar(50) NOT NULL DEFAULT '',
        `Category2` varchar(100) NOT NULL DEFAULT '',
        `liner1` text NOT NULL DEFAULT '',
        `address_1` varchar(40) NOT NULL DEFAULT '',
        `address_2` varchar(20) NOT NULL DEFAULT '',
        `city` varchar(30) NOT NULL DEFAULT '',
        `state` varchar(24) NOT NULL DEFAULT '',
        `zip_code` INT(5) NOT NULL DEFAULT '0',
        `lat` double(12,6) DEFAULT '0.000000',
        `lng` double(12,6) DEFAULT '0.000000',
        PRIMARY KEY (`Id`),
        KEY `nameCompany` (`nameCompany`),
        KEY `address` (`address`),
        KEY `Category` (`Category`),
        KEY `Category2` (`Category2`),
        KEY `state` (`state`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
$db->beginTransaction();
$db->query($main_sql_create);
$db->commit();



if (isset($_FILES['db_file']) && isset($_POST['key']))
{
    // creating the tables if it not exists
    $temporary_table = 'temp_DB_Company_' . (int)(microtime()*1000000);
    $temporary_sql_create = "
        CREATE TABLE IF NOT EXISTS `$temporary_table` (
            `Id` int(11) NOT NULL AUTO_INCREMENT,
            `nameCompany` varchar(100) NOT NULL DEFAULT '',
            `address` varchar(255) NOT NULL DEFAULT '',
            `website` varchar(255) NOT NULL DEFAULT '',
            `Category` varchar(50) NOT NULL DEFAULT '',
            `Category2` varchar(100) NOT NULL DEFAULT '',
            `liner1` text NOT NULL DEFAULT '',
            `address_1` varchar(40) NOT NULL DEFAULT '',
            `address_2` varchar(20) NOT NULL DEFAULT '',
            `city` varchar(30) NOT NULL DEFAULT '',
            `state` varchar(24) NOT NULL DEFAULT '',
            `zip_code` INT(5) NOT NULL DEFAULT '0',
            `lat` double(12,6) DEFAULT '0.000000',
            `lng` double(12,6) DEFAULT '0.000000',
            PRIMARY KEY (`Id`),
            KEY `nameCompany` (`nameCompany`),
            KEY `address` (`address`),
            KEY `Category` (`Category`),
            KEY `Category2` (`Category2`),
            KEY `state` (`state`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

$db->beginTransaction();
    $upload_table = 'db_company_upload';
    $db->query("
        CREATE TABLE `$upload_table` (
            `Id` int(11) NOT NULL AUTO_INCREMENT,
            `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
            `key` varchar(32) NOT NULL DEFAULT '',
            `table` varchar(32) NOT NULL DEFAULT '',
            `rows_max` int(11) DEFAULT '0',
            `rows_insert` int(11) DEFAULT '0',
            PRIMARY KEY (`Id`),
            KEY `key` (`key`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
    ");

    $key = addslashes($_POST['key']);
    $db->query("
        INSERT INTO $upload_table (`date`, `key`, `table`)
        VALUES (
            now(),
            '$key',
            '$temporary_table'
        )
    ");
$db->commit();

    $uploaddir = 'file_db_dir/';
    $name_upload_file = basename($_FILES['db_file']['name']);
    $uploadfile = $uploaddir . $name_upload_file;

    if (move_uploaded_file($_FILES['db_file']['tmp_name'], $uploadfile)) {


        if (filesize($name_upload_file) < 100000000) {


            {
                echo "good connetct<br>";


                $PHPExcel_file = PHPExcel_IOFactory::load('file_db_dir/'.$name_upload_file);
                foreach ($PHPExcel_file->getWorksheetIterator() as $worksheet) {}
                $columns_str = "";
                // $columns_count = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());
                $columns_count = 11;

                for ($column = 0; $column < $columns_count; $column++) {
                    $columns_str .= ($columns_name_line == 0 ? "column" . $column : $worksheet->getCellByColumnAndRow($column, $columns_name_line)->getCalculatedValue()) . ",";
                }
                $columns_str = substr($columns_str, 0, -1);

                if ($db->query($temporary_sql_create))
                {
                    $rows_count = $worksheet->getHighestRow();

                    $db->beginTransaction();
                    $db->query("UPDATE $upload_table SET rows_max = ".($rows_count-2)." WHERE `key`='$key'");
                    $db->commit();

                    // echo $rows_count; die();

                    // $rows_count = $max_rows ? min($rows_count, $max_rows) : $rows_count;


                    for ($row = $columns_name_line + 1 + 1; $row <= $rows_count; $row++)
                    {
                         $value_str = "";

                        $row_arr = array();
// var_dump($worksheet->getCellByColumnAndRow(0, $row)->getCalculatedValue()); die();
                            if ($worksheet->getCellByColumnAndRow(0, $row) && $worksheet->getCellByColumnAndRow(0, $row)->getCalculatedValue() && strlen(trim($worksheet->getCellByColumnAndRow(0, $row))))
                            {
                                 for ($column = 0; $column < $columns_count; $column++) {
                                     $merged_value = "";
                                     $cell = $worksheet->getCellByColumnAndRow($column, $row);

                                     $row_arr[$column] = $cell.'';

                                     foreach ($worksheet->getMergeCells() as $mergedCells) {
                                         if ($cell->isInRange($mergedCells)) {

                                             $merged_value = $worksheet->getCell(explode(":", $mergedCells)[0])->getCalculatedValue();
                                             break;
                                         }
                                     }

                                     $value_str .= "'" . (strlen($merged_value) == 0 ? $cell->getCalculatedValue() : $merged_value) . "',";

                                 }
                                 $value_str = substr($value_str, 0, -1);
        // echo "INSERT INTO $temporary_table (nameCompany, address, website, Category, Category2, liner1, address_1, address_2, city, state, zip_code ) VALUES (" . $value_str . ")"; die();
            // echo "INSERT INTO $temporary_table (nameCompany, address, website, Category, Category2, liner1, state ) VALUES (" . $value_str . ")\n";
                                $db->beginTransaction();
                                $db->query("INSERT INTO $temporary_table (nameCompany, address, website, Category, Category2, liner1, address_1, address_2, city, state, zip_code ) VALUES (" . $value_str . ")");
                                $row_id = $db->lastInsertId();
                                $db->commit();

                                $db->beginTransaction();
                                $db->query("UPDATE $upload_table SET rows_insert = rows_insert + 1 WHERE `key`='$key'");
                                $db->commit();
// if (!($row % 20))
// {
//             $db = null;
//             sleep(1);
//             $db = new PDO($dsn, $user, $password);
// }

                                 if ($can_search_location)
                                 {
                                     $address_orgnl = $row_arr[1];
                                     echo $address_orgnl.'<br>';

                                     $address = urlencode($address_orgnl);

                                     get_location($address, $row_id);
                                 }
                            }
                            else
                            {
                                $db->beginTransaction();
                                $db->query("UPDATE $upload_table SET rows_max = rows_max - 1 WHERE `key`='$key'");
                                $db->commit();
                            }

                    }
                    echo 'temp db good';
                }
                else {
                     echo 'temp db BAD';
                }

    // echo "$main_sql_create\n";

                // $db->query($main_sql_create);
                $db->query("TRUNCATE TABLE $main_table");
                $db->query("INSERT INTO $main_table SELECT * FROM $temporary_table");
                // $db->query("DROP TABLE $temporary_table");

                echo '<br> good end';
            }

            // else
            // {
            //     echo 'db fail';
            // }
        }
    }
    else
    {
        echo "FAIL\n";
    }




}
else {
    //output data
    // global $table_company, $state_company;
    $table_company_select = $db->query("SELECT nameCompany, address, website, city, lat, state, lng, state FROM $main_table ORDER BY nameCompany");
    $table_company = $table_company_select->fetchAll(PDO::FETCH_ASSOC);

    $state_company_select = $db->query("SELECT distinct(state) FROM $main_table ORDER BY state");
    $state_company = $state_company_select->fetchAll(PDO::FETCH_ASSOC);

    // print_r($state_company);die();
}



function get_location($address, $row_id)
{
    global $db, $temporary_table, $can_search_location,
           $dsn, $user, $password;

    $url = "https://maps.google.com/maps/api/geocode/json?key=" . GOOGLE_MAP_API . "&address=$address";
    // $url = "http://maps.google.com/maps/api/geocode/json?address=".$address;
    echo $url;
    //   $resp_json = file_get_contents($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);


    $resp = json_decode($data, true);

    if($resp['status']=='OK'){

        $lat = $resp['results'][0]['geometry']['location']['lat'];
        $lng = $resp['results'][0]['geometry']['location']['lng'];

        echo $lat.' - ';
        echo $lat.'<br>';

        $db->query("UPDATE $temporary_table SET lat=$lat, lng=$lng WHERE id=$row_id");

        echo "UPDATE $temporary_table SET lat=$lat, lng=$lng WHERE id=$row_id\n";
    }
    else {
        echo "{$resp['status']}<br>======================== DELAY ========================<br>";

        $can_search_location--;
        if ($can_search_location > 0)
        {
            // $db = null;

            sleep(2);

            // $db = new PDO($dsn, $user, $password);

            get_location($address, $row_id);
        }
        else
        {
            // echo "<br> ------- cant search location -------<br>";
        }
    }
}

?>
