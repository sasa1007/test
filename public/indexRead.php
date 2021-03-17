<?php
include_once 'Database.php';
include_once 'Helpers.php';

$helpers = new Helpers();
$db = new Database();
$dbConnect = $db->connect();

$query = $helpers->getAllDataBases();

$result = mysqli_query($dbConnect, $query);
$dbs = [];
$visitArray = [];
while ($db = mysqli_fetch_row($result))
    $dbs[] = $db[0];
foreach ($dbs as $item) {
    $db = new Database();
    $sql = "SELECT * FROM `$item`";
    $count = 0;
    $count1 = 0;

    if ($result = $db->connectToDataBase($item)->query($sql)) {
        while ($row = $result->fetch_all()) {
            foreach ($row as $itemRow) {
                if ($itemRow[2] == 1) {
                    $count++;
                }
                if ($itemRow[3] == 1) {
                    $count1++;
                }
            }
        }
        $visitArray['error'] = "";
        $visitArray['message'] = "";
        $visitArray['Google'] = $count;
        $visitArray['GoodGays'] = $count1;
        $visitArray['Source'] = $item;
        echo json_encode($visitArray);
    }
}