<?php
$studentID = $_GET["studentID"];
$studentID = trim($studentID);
$classroomID = $_GET["classroomID"];
$checkInArray;
// for testing ($studentID & $classroomID)
//$studentID = "Harlod McDoofus";
//$classroomID = "5122";

date_default_timezone_set("America/Phoenix");
$t=time();
$checkInTime = date("h:i A",$t);
$checkInDate = date("m-d-y", $t);
$filename = 'data/checkIn-'.date("Y-m-d").'.json';
if(file_exists($filename)){
    echo "file exists <br>";
    addDataToJSON($filename,$studentID, $classroomID, $checkInTime, $checkInDate);
}
else{
    echo "Create new file <br>";
    $startData = array();
    $handle = fopen($filename, 'w+');
    //addCheckIn($studentID, $classroomID, $checkInTime, $checkInDate);
    $formattedStartData = json_encode($startData);
    fwrite($handle,$formattedStartData);
    fclose($handle);
    addDataToJSON($filename,$studentID, $classroomID, $checkInTime, $checkInDate);
}
echo $studentID." checked in to Room ".$classroomID." on ".date("m/d/Y", $checkInTime)." at ".date("h:ia", $checkInTime);

// = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = 

function addCheckIn($studentID, $classroomID, $checkInTime, $checkInDate){
    echo "add object <br>";
    global $checkInArray;
    $obj = new stdClass();
    $obj->studentID = $studentID;
    $obj->classRoomID = $classroomID;
    $obj->checkInTime = $checkInTime;
    $obj->checkInDate = $checkInDate;
    array_push($checkInArray, $obj);
}

function addDataToJSON($filename,$studentID, $classroomID, $checkInTime, $checkInDate){
    echo "add data to json<br>";
    global $checkInArray;
    $checkInArray = json_decode(file_get_contents($filename));
    addCheckIn($studentID, $classroomID, $checkInTime, $checkInDate);
    file_put_contents($filename, json_encode($checkInArray));
}

?>
