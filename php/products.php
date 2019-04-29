<?php

function postsRequest($searchParam,$page,$orderByParam) {
    require_once("../db/conn.php");
    $search = strip_tags(mysqli_real_escape_string($conn, trim($searchParam)));
    $no_of_records_per_page = 6;
    $offset = ($page-1) * $no_of_records_per_page;
    $i = 0;
    $rows = array();
    $limit=5;
    $total_pages_sql = "SELECT COUNT(*)";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    if($orderByParam == "")$hhohohooh = '';
    else $hhohohooh = "`category` = '$orderByParam' AND"; 
    if ($search != " ") {
        $sql = "SELECT * FROM product WHERE   $hhohohooh `title` COLLATE UTF8_GENERAL_CI LIKE '%{$search}%' OR '%{$search}'   order by id  DESC LIMIT $offset, $no_of_records_per_page ";
        $sqlq = mysqli_query($conn,"SELECT * FROM product WHERE  $hhohohooh    `title` COLLATE UTF8_GENERAL_CI LIKE '%{$search}%' OR '%{$search}'  order by id    ");       
        $num_rows = mysqli_num_rows($sqlq);
    }
    else {
        $sql = "SELECT * FROM product  ORDER BY  id  DESC LIMIT $offset, $no_of_records_per_page";
    }
    $res_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res_data)) {
        $rows[$i] = $row;
        $i++;
    }
    echo json_encode(array($rows,$total_rows,$i,$num_rows));
    mysqli_close($conn);
}

if(isset($_POST['searchAction']) && !empty($_POST['searchAction'])) {
    $searchAction = $_POST['searchAction'];
    $page = $_POST['page'];
    $orderbyParam = $_POST['orderParameter'];
    postsRequest($searchAction, $page,$orderbyParam);
}

?>