<?php
require_once('./assets/head.php');
require_once('class/nota.php');

$t = new nota();

$dados = $t->mostrarNota();

$qtd = $dados[0];
$info = $dados[1];


?>

<?php if($qtd>0){?>
    <?php foreach($info as $valores){?>    
    <section class="notas">
        <div class="box_nota"> 
            <strong>Titulo: <?php echo $valores['titulo'] ?></strong>
            <p>Tema: <?php echo $valores['tema'] ?></p>
            <p><?php echo $valores['conteudo'] ?></p>
            <div class="btn">
                <a href="ediçao.php?id=<?php echo $valores['id'] ?>" class="btn btn-primary">Editar</a>
                <a href="" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    </section>
    <?php } ?>
<?php } ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</body>
</html>