<?php

header( 'Cache-Control: no-store, no-cache, must-revalidate' );

require_once $_SERVER['DOCUMENT_ROOT'] . "/wp-config.php";



$user = DB_USER;
$password = DB_PASSWORD;
$database_name = DB_NAME;
$hostname = DB_HOST_SLAVE;
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

$main_table = 'db_company';
$upload_table = 'db_company_upload';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}



$key = isset($_POST['key']) ? addslashes($_POST['key']) : null;

$progress = null;

// print_r($_GET);
// print_r($_POST);

if ($key)
{
// echo 1;

    $count_sql = $db->query("SELECT `rows_max`, `rows_insert` FROM $upload_table WHERE `key`='$key' and date > DATE_SUB(now(), INTERVAL 1 DAY)");

    if ($count_sql)
    {
        $count_sql = $count_sql->fetch(PDO::FETCH_ASSOC);

        // echo json_encode($count_sql); die();

        if (isset($count_sql['rows_max']) && isset($count_sql['rows_insert']))
        {
            $rows_max = (int)$count_sql['rows_max'];
            $rows_insert = (int)$count_sql['rows_insert'];

            if ($rows_max)
            {
                $progress = ($rows_insert / $rows_max) * 100;
            }
        }
    }

//     if ($table_sql)
//     {
// // echo 2;
//
//         $table_sql = $table_sql->fetch(PDO::FETCH_ASSOC);
//
//         if (isset($table_sql['table']))
//         {
// // echo 3;
//
//             $table_name = $table_sql['table'];
//
//             try {
// // echo 4;
//                 $count_sql = $db->query("
//                     SELECT rows_max, rows_insert FROM $upload_table WHERE
//                 ");
//
//                 $count_sql = $db->query("
//                     SELECT *
//                     FROM
//                         (SELECT count(id) cnt_full FROM $table_name) a,
//                         (SELECT count(id) cnt_null FROM $table_name WHERE lat=0 and lng=0) b
//                 ");
//
//                 // var_dump($count_sql);
//
//                 if ($count_sql)
//                 {
// // echo 5;
//
//                     $count_sql = $count_sql->fetch(PDO::FETCH_ASSOC);
//
//                     if (isset($count_sql['cnt_full']) && isset($count_sql['cnt_null']))
//                     {
// // echo 6;
// // echo json_encode(array(
// //     'progress'=>$progress
// // ));
//
//                         $cnt_full = (int)$count_sql['cnt_full'];
//                         $cnt_null = (int)$count_sql['cnt_null'];
//
//                         if ($cnt_full)
//                         {
//                             $progress = (($cnt_full - $cnt_null) / $cnt_full) * 100;
//                         }
//                     }
//                 }
//             } catch (Exeption $e) {
//                 $progress = 100;
//             }
//         }
//     }
}

$answer = array(
    'progress'=>$progress
);

if ($progress && $progress >= 100)
{
    $answer['key'] = md5(rand(0,1000000));
}

echo json_encode($answer);
