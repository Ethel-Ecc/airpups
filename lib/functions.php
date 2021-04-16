<?php
function get_connections(){
    $config_envs = require 'config.php';

    $pdo = new PDO(
        $config_envs['db_dsn'],
        $config_envs['db_user'],
        $config_envs['db_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    return $pdo;
}

function get_pets($limit = null): array
{
    $pdo = get_connections();

    $query = 'SELECT * FROM pet';
    if ($limit) {
        $query .= ' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $pets = $stmt->fetchAll();

    return $pets;
}

function save_pets(array $petsToSave){
    $petsToJson = json_encode($petsToSave, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $petsToJson);
}

function get_pet_details($id){
    $pdo = get_connections();

    $query = "SELECT * FROM pet where id= :idValue";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idValue', $id);
    $stmt->execute();

    return $stmt->fetch();
}