<?php


function checkTriangle($x, $y, $r) {
    if ($x >= -$r/2 && $x <= 0){
        return $y >= $x - $r  && $y >= 0;
    }
    return false;
};

function checkRectangle($x, $y, $r) {
    if ($x <= $r/2 && $x >= 0){
        return $y >= -$r && $y <= 0;
    }
    return false;
};

function checkCircle($x, $y, $r) {
    if ($y >= 0 && $x >= 0){
        return pow($x, 2) + pow($y, 2) <= pow($r, 2);
    }
    return false;
};

function checkHit($x, $y, $r) {
    return checkTriangle($x, $y, $r) || checkRectangle($x, $y, $r) || checkCircle($x, $y, $r);
};


if (isset($_POST["r"]) && isset($_POST["x"]) && isset($_POST["y"])){
    $start = microtime(true);
    $x = $_POST["x"];
    $y = $_POST["y"];
    $r = $_POST["r"];
    $hit = checkHit($x, $y, $r);
    $current_time = (new DateTime())->format("Y-m-d H:i:s");
    $script_runtime = (microtime(true) - $start);

    echo json_encode(array(
        "X" => $x,
        "Y" => $y,
        "R" => $r,
        "hit" => $hit,
        "current_time" => $current_time,
        "script_runtime" => $script_runtime
    ));
}