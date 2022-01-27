<?php

function requete_lire_table_article()
{
    $db = connexion_BD();
    $sql = "SELECT * FROM article";
    $req = $db->prepare($sql);
    $result = $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_inscription()
{
    $db = connexion_BD();
    $sql = "INSERT INTO user (pseudo, password, id_role) VALUES (:pseudo, :password, :id_role)";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":pseudo"=>$_POST['pseudo'],
        ":password"=>$_POST['password'],
        ":id_role"=>'2'
    ]);
}

function requete_connexion() {
    $db = connexion_BD();
    $sql = "SELECT * FROM user WHERE pseudo = :pseudo";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":pseudo"=>$_POST['pseudo']
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_lire_article_title() {
    $db = connexion_BD();
    $sql = "SELECT * FROM article WHERE title = :title";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":title"=>$_POST["title"]
    ]);    
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_lire_article_title_get() {
    $db = connexion_BD();
    $sql = "SELECT * FROM article WHERE title = :title";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":title"=>$_GET["name"]
    ]);    
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_lire_user($u) {
    $db = connexion_BD();
    $sql ="SELECT * FROM user WHERE id_user = :id_user";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":id_user"=>$u
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}

function requete_supprimer_article() {
    $db = connexion_BD();
    $sql = "DELETE FROM article WHERE title = :title";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":title"=>$_GET['supprimer_article']
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
}