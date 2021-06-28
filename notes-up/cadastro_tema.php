<?php
require_once('assets/head.php');
require_once('class/tema.php');

$t = new temas();


if(isset($_POST['tema'])){
    $tema = addslashes($_POST['tema']);
    $t->cadastraTema($tema);
}
?>

    <div class="cadastro">
        <div class="formulario">            
            <form method="post">
                <label for="tema">Tema: </label>
                <input type="text" name="tema">
                <input class="btn btn-primary" type="submit" value="Cadastrar Tema">
            </form>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</body>
</html>