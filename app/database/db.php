<?php 
session_start();
require('connect.php');

#DECLARING LONG GLOBAL VARIABLE FOR EASY REFERENCE
$s = $_SESSION;

#CODE GENERATION VARIABLES
$p_code = '0123456789';
$e_code = 'abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$referal_code = '0123456789abcdefghijklmnopqrstuvwzyz';
$user_key = $p_code . $e_code;

$description = 'Eazibiz is an digital platform who &quot; s goal is to allow its users to host his or her products and services online. It provides its users with a unique webpage where the products and services of the users are displayed. And its gives it users
a unique link, that will then share to their targeted customers via Facebook and other social medias.';
$ogType = "E-Commerce";


function generateRandomString($x, $lenght){
    return substr(str_shuffle(str_repeat($x, ceil($lenght/strlen($x)))), 1,$lenght);
}

function sessionDeclear($data = []){
    foreach($data as $key => $value){
        $_SESSION[$key] = $data[$key];
    }
}

function dd($value) { // to be deleted
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQurey($sql, $data) {
global $conn;

    $stmt = $conn->prepare($sql);
    $value = array_values($data);
    $type = str_repeat('s', count($value));
    $stmt->bind_param($type, ...$value);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = []) {
    global $conn;

    $sql = "SELECT * FROM $table";

    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }   
    else {
        $i = 0;
        foreach ($conditions as $key=>$value)
        {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
    } 
    $stmt = executeQurey($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectAllLimit($table, $conditions = [], $s, $rpp) {
    global $conn;

    $sql = "SELECT * FROM $table";

    if (empty($conditions)) {
        $sql .= " ORDER BY $table.id DESC LIMIT $s, $rpp";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }   
    else {
        $i = 0;
        foreach ($conditions as $key=>$value)
        {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
    } 
    $sql .= " ORDER BY $table.id DESC LIMIT $s, $rpp";
    $stmt = executeQurey($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function selectOne($table, $conditions) {
    global $conn;
    
    $sql = "SELECT * FROM $table";

        $i = 0;
        foreach ($conditions as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executeQurey($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
    
}

function create($table, $data) {
    global $conn;

    $sql = "INSERT INTO $table SET ";
    $i = 0;
    foreach ($data as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function createi($table, $data){
    global $conn;

    $sql = "INSERT INTO " . "`" . $table . "` (";
    $i = 0;
    foreach($data as $key=>$value){
        if($i === 0){
            $sql = $sql . $key;
        }else {
            $sql = $sql . ", " . $key;
        }
        $i++;
    }
    $sql = $sql . ") VALUES (";
    $x = 0;
    foreach ($data as $key=>$value) {
        if($x === 0){
        $sql = $sql . "?";
        }else{
            $sql = $sql . ", ?";
        }
        $x++;
    }
    $sql = $sql . ")";
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table, $id, $data) {
    global $conn;

    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach ($data as $key=>$value)
        {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;   
    }
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQurey($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function delete($table, $id) {
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    
    $stmt = executeQurey($sql, ['id' => $id]);
    return $stmt->affected_rows;
}
function getAvailableProductpage($s, $rpp) {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? ORDER BY p.id DESC LIMIT $s, $rpp";

    $stmt = executeQurey($sql, ['status' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function getAvailableproducts() {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQurey($sql, ['status' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getAvailableproductsAll() {
    global $conn;

    $sql = "SELECT p.*, n.name FROM products AS p JOIN users AS n ON p.store_id=n.store_id WHERE p.status<? ORDER BY p.id DESC";

    $stmt = executeQurey($sql, ['status' => 2]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function getAvailableproductsAllLimts($s, $rpp) {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published<? ORDER BY p.id DESC LIMIT $s, $rpp";

    $stmt = executeQurey($sql, ['published' => 2]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPOstByIdLimts($s, $rpp, $topic_id) {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=? ORDER BY p.id DESC LIMIT $s, $rpp";

    $stmt = executeQurey($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPOstById($topic_id) {
    global $conn;

    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

    $stmt = executeQurey($sql, ['published' => 1, 'topic_id' => $topic_id]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function search($term) {
    global $conn;

    $match = '%' . $term . '%';
    $sql = "SELECT * FROM products  WHERE status=? AND name LIKE ? OR about=?";

    $stmt = executeQurey($sql, ['status' => 1, 'name' => $match, 'about' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


function searchi($table, $term, $conditions=[]) {
    global $conn;

    $match = '%' . $term . '%';
    $sql = "SELECT * FROM $table  "; "WHERE status=? AND name LIKE ? OR about=?";
    if (empty($conditions)) {
        $stmt = executeQurey($sql, ['status' => 1, 'name' => $match, 'about' => $match]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    $stmt = executeQurey($sql, ['status' => 1, 'name' => $match, 'about' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchLimts($term, $s, $rpp) {
    global $conn;

    $match = '%' . $term . '%';
    $sql = "SELECT p.*, u.username FROM post AS p JOIN user AS u 
            ON p.user_id=u.id WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ? ORDER BY p.id DESC LIMIT $s, $rpp";

    $stmt = executeQurey($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    return $records;
}

?>