<?php
class mysql 
{

public function connect($DB_HOST,$DB_NAME,$DB_USER,$DB_PASS){

    return new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
}

public function delete_property($mbd, $id_json){

    $sql = "
            UPDATE property
            SET 
            valid = 0 
            WHERE id_json = '$id_json' AND valid = 1
    ";
    $stmt = $mbd->prepare($sql);
    $stmt->execute();
}

public function insert__property($mbd, $data){

    $sql = "INSERT INTO property (
                        id_json,
                        address,
                        city,
                        telephone,
                        postal_code,
                        type,
                        price
                ) VALUES (
                        '".$data["Id"]."', 
                        '".$data["Direccion"]."',
                        '".$data["Ciudad"]."',
                        '".$data["Telefono"]."',
                        '".$data["Codigo_Postal"]."',
                        '".$data["Tipo"]."',
                        '".$data["Precio"]."'
                 )
    ";

    $stmt = $mbd->prepare($sql);
    $stmt->execute();
    return $mbd->lastInsertId();
}

public function property($mbd, $id_json="") {
    
    $info = array();
    $where = array("A.valid = 1 ");

    if ($id_json!="") {
        $where[] = " A.id_json='$id_json' ";
    }

    $where = " where ".implode($where, " and ");

    $sql = "
    SELECT 
    A.* 
    from property as A
    ".$where;    

    foreach ($mbd->query($sql) as $rows_i) {
        $info[] = $rows_i;
    }

    return $info;
}

}
