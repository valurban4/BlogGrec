<?php
session_start(); 
var_dump($_SESSION);

include("function.php");
include("requeteSql.php");


if(!empty($_FILES['image'])){
    $info = pathinfo($_FILES['image']['name']);
    // var_dump($info);
    // var_dump($_FILES);
    $message_resultat = null;

    if($message_resultat==null)
    {
        $data = requete_lire_article_title();
        var_dump($data);
        foreach ($data as $valeur) {
            if($_POST["title"] == $valeur->title){
                $message_resultat = "existe";
            }
        }     
    }

    if($message_resultat==null)
    {
        if($_FILES['image']['size'] > 1000000){
            $message_resultat .= "depasse";
        }
        if( ($info['extension']!="jpg") && ($info['extension']!="png") && ($info['extension']!="jpeg") ){
            $message_resultat.="format";
        }
    }
    
    if($message_resultat == null)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], "images/".$_POST['title'].".".$info['extension']);
        $db = connexion_BD();
        $sql = "INSERT INTO article (title,content,image,id_user) VALUES (:title,:content,:image,:id_user)";
        $req = $db->prepare($sql);

        $result = $req->execute([
            ":title"=>$_POST['title'],
            ":content"=>$_POST['content'],
            ":image"=>$_POST['title'].".".$info['extension'],
            ":id_user"=>$_SESSION['id_user']
        ]);
        // var_dump($result);exit;
        $message_resultat.="OK";

        if (!$result)
        {
            $message_resultat.="Erreur";
        }
    }
}
else
{
    $message_resultat = "Problème";
}
header("location: creer_article.php?message_resultat=".htmlspecialchars($message_resultat));
