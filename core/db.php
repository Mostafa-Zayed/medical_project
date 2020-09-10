<?php
// Create Connection
$connection = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

/**
 * This Function Get One Row From Table Where Condition
 * 
 * @param string $table
 * @param string $where
 * @return array
 */
function medical_get_one(string $table, string $where): array 
{
    global $connection;
    $table = strip_tags($table);
    $where = strip_tags($where);
    $sql = "SELECT * FROM `{$table}` where {$where} LIMIT 1";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

/**
 * This Function Get All Data From Table
 * 
 * @param string $table
 * @return array
 */
function medical_get_all(string $table): array
{
    global $connection;
    $data = array();
    $table = strip_tags($table);
    $sql = "SELECT * FROM `{$table}`";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data,$row);
    }
    return $data;
}

/**
 * This Function Insert City Name In Table Citites
 * 
 * @param string $table
 * @param string $city_name
 * @return boll
 */
function medical_insert_city_name(string $table, string $city_name): bool
{
    global $connection;
    $table = strip_tags($table);
    $city_name = strip_tags($city_name);
    $sql = "INSERT INTO `{$table}` (`city_name`) VALUES('".$city_name."')";
    $result = mysqli_query($connection, $sql);
    if(! $result)
        return false;
    else
        return true;
}

/**
 * This Function Update City Name In Table Citites
 * 
 * @param string $table
 * @param int $city_id
 * @param string $city_name
 * @return array
 */
function medical_update_city_name(string $table, int $city_id, string $city_name): bool
{
    global $connection;
    $table = strip_tags($table);
    $city_name = strip_tags($city_name);
    $sql = "UPDATE  `{$table}` SET `city_name` = '$city_name' WHERE `city_id` = $city_id";
    $result = mysqli_query($connection, $sql);
    if(! $result)
        return false;
    else
        return true;
}












/////////////////////////////////////////////////////// For Testing Only  ////////////////////////////////////////////////////////////////////////
/**
 * This Function Get data from table by condition
 * 
 * @param string $table
 * @param string $columns
 * @param string $where
 * @return array
 */
function medical_get_data(string $table, string $columns = '*', string $where): array 
{
    global $connection;
    $table = strip_tags($table);
    $where = strip_tags($where);
    $columns = strip_tags($columns);
    $sql = "SELECT {$columns} FROM `{$table}` where {$where} LIMIT 1";
    //echo $sql;
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>