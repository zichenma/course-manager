<?php

function getAllCourses(){
    $connect = mysqli_connect("localhost", "root", "","cs602");
    $sql = "SELECT * from sk_courses";
    $result = mysqli_query($connect,$sql);
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
    return $json_array;

}


function getCourse_by_ID($course_id){
    $connect = mysqli_connect("localhost", "root", "","cs602");
    $sql = "SELECT * from sk_students WHERE courseID ='".$course_id."'";
    $result = mysqli_query($connect,$sql);
    $json_array = array();
    while ($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }
    return $json_array;

}

function xml_encode($data){
    $xml_string='<?xml version="1.0" encoding="utf-8"?>\n';
    return $xml_string;
}


if($_GET['format'] == 'json' and $_GET['action'] == 'courses') {
    header('Content-Type: text/plain');
    echo json_encode(getAllCourses(), JSON_PRETTY_PRINT);

}elseif ($_GET['format'] == 'json' and $_GET['action'] == 'students'){
    header('Content-Type: text/plain');
    $course_id=$_GET['course'];
    echo json_encode( getCourse_by_ID($course_id),JSON_PRETTY_PRINT);


}elseif ($_GET['format'] == 'xml' and $_GET['action'] == 'courses'){
     header('Content-Type: text/plain');
     echo xmlrpc_encode(getAllCourses())  ;
}elseif ($_GET['format'] == 'xml' and $_GET['action'] == 'students'){
    header('Content-Type: text/plain');
    $course_id=$_GET['course'];
    echo xmlrpc_encode( getCourse_by_ID($course_id));
}else {
    die("Wrong parameter on url !");
}



