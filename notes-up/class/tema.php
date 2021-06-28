<?php
require_once('./conexao.php');


class temas{

    function retornaTema(){
        global $pdo;
        try{
            $cmd = $pdo->query("SELECT * FROM temas");
            return $cmd->fetchAll();

        } catch(PDOException $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }


    function cadastraTema($tema){
        global $pdo;
        try{
            $cmd = $pdo->prepare("INSERT INTO temas(tema) VALUES (:t)");
            $cmd->bindValue(":t","$tema");
            $cmd->execute();

        } catch(PDOException $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }


}