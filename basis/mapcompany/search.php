<?php

// echo 1; die();

// echo json_encode($_SERVER); die();

// require_once $_SERVER['DOCUMENT_ROOT'] . "/wp-config.php";
// nameCompany, address, website, city, lat, state, lng, state
require_once "mapcompany_functions.php";

if (isset($_POST['search']) && isset($_POST['state'])) {

    $stmt = $db->prepare("
        SELECT nameCompany, address, website, city, lat, state, lng, state
        FROM
            $main_table
        WHERE
            ( nameCompany Like ? OR city LIKE ? OR state LIKE ? )
        " . ($_POST['state'] ? 'AND state=?' : '') . "
    ");

    $search_array = array(
        '%'.$_POST['search'].'%',
        '%'.$_POST['search'].'%',
        '%'.$_POST['search'].'%',
    );

    if ($_POST['state'])
    {
        $search_array[] = $_POST['state'];
    }

    // $stmt->execute(array('%'.$_POST['search'].'%','%'.$_POST['search'].'%',$_POST['state']));
    $stmt->execute($search_array);

    $table_compan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json=json_encode($table_compan);
    echo $json;

}
