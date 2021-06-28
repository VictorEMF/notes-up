<?php

require_once('./assets/head.php');
require_once('class/nota.php');
require_once('class/tema.php');

$n = new nota();
$t = new temas();

$id = $_GET['id'];

$dados =  $n->mostrarNotaId($id);
$temas = $t->retornaTema();

?>

<?php foreach ($dados as $itens) { ?>
    <section class="notas">
        <div class="box_nota"> 
            <p><strong>Titulo: <input name="titulo" placeholder="<?php echo $itens['titulo'] ?>"> </strong></p> <br>
            Tema:
            <select name="tema">
                <?php foreach($temas as $tema): ?>
                    <option value="<?php echo $tema['id'] ?>"><?php echo $tema['tema'] ?></option>
                <?php endforeach ?>
            </select> <br>
            <br>
            <p>Conteudo: <textarea name="titulo" cols="30" rows="2" placeholder="<?php echo $itens['conteudo'] ?>"></textarea></p>
            <div class="btn">
                <a class="btn btn-primary">Editar</a>
            </div>
        </div>
        
    </section>
<?php } ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</body>
</html>