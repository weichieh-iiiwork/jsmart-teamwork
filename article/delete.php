<?php
require_once '../db.inc.php';

require_once '../templates/adtpl-header.php';

$sql = "DELETE FROM `article` WHERE `id` = ? ";

$arrParam = [(int)$_GET['id']];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("refresh:1; url=./index.php");
    echo "刪除成功";
} else {
    header("refresh:1; url=./index.php");
    echo "刪除失敗";
}
require_once '../templates/adtpl-footer.php';
