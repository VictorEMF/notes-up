<?php
require_once('./conexao.php');

class nota{

    function cadastrarNota($titulo,$tema,$conteudo){
        global $pdo;
        try {

            $cmd = $pdo->prepare("SELECT * FROM notas WHERE titulo = :t AND id_tema = :it AND conteudo = :c");
            $cmd->bindValue(":t","$titulo");
            $cmd->bindValue(":it",$tema);
            $cmd->bindValue(":c","$conteudo");
            $cmd->execute();
            
            if($cmd->rowCount() == 1){                
                return false;

            }else{

                $cmd = $pdo->prepare("INSERT INTO notas(id_tema,titulo,conteudo) 
                VALUES (:it,:t,:c)");
                $cmd->bindValue(":it","$tema");
                $cmd->bindValue(":t","$titulo");
                $cmd->bindValue(":c","$conteudo");
                $cmd->execute();

                if($cmd->rowCount() == 1){
                    return $cmd->rowCount();
                }
            }
            
        } catch (PDOExcetion $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }

    function mostrarNota(){
        global $pdo;
        try {
            $cmd = $pdo->query("SELECT n.id,n.titulo,n.conteudo,t.tema 
            FROM notas n 
            JOIN temas t ON t.id = n.id_tema");
            if($cmd->rowCount() > 0){
                return array($cmd->rowCount(),$cmd->fetchAll());
            }
        } catch (PDOExection $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }

    function mostrarNotaId($id){
        global $pdo;
        try {
            $cmd = $pdo->prepare("SELECT n.id, t.tema, n.titulo, n.conteudo
            FROM notas n 
            JOIN temas t ON t.id = n.id_tema WHERE n.id  = :i");
            $cmd->bindValue(":i","$id");
            $cmd->execute();
            if($cmd->rowCount() > 0){
                return $cmd->fetchAll();
            }
        } catch (PDOExection $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }


    function editarNota($id,$titulo,$tema,$conteudo){
        global $pdo;
        try {
            $cmd = $pdo->prepare("UPDATE notas SET id_tema = :it, titulo = :t, conteudo = :c WHERE id = :i");
            $cmd->bindValue(":it","$tema");
            $cmd->bindValue(":t","$titulo");
            $cmd->bindValue(":c","$conteudo");
            $cmd->bindValue(":i","$id");
            
            if($cmd->rowCount() == 1){
                return $cmd->rowCount();
            }
        } catch (PDOExcetion $e) {
            echo "Erro -> " .$e->getMessage();
        }
    }



}

?>