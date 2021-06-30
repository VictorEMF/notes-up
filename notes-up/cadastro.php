<?php
require_once('assets/head.php');
require_once('class/tema.php');
require_once('class/nota.php');

$t = new temas();
$n = new nota();
$dados = $t->retornaTema();
$qtd ='' ;   

if(isset($_POST['titulo']) && isset($_POST['tema']) && isset($_POST['conteudo'])){
    
    $titulo = addslashes($_POST['titulo']);
    $tema = addslashes($_POST['tema']);
    $conteudo = addslashes($_POST['conteudo']);
    $qtd = $n->cadastrarNota($titulo,$tema,$conteudo);
}

?>

    <div class="cadastro">
        <div class="formulario">            
            <form method="post">
                <label for="">Titulo:</label>
                <input type="text" name="titulo"> <br>
                <br>
                <label for="">Tema: </label>
                <select name="tema">
                <?php foreach($dados as $tema): ?>
                    <option value="<?php echo $tema['id'] ?>"><?php echo $tema['tema'] ?></option>
                <?php endforeach ?> </select> <br>
                <br>
                <label for="conteudo">Conteudo: </label>
                <input type="text" name="conteudo"> <br>
                <br>
                <button class="btn btn-primary" type="submit">Cadastrar Nota</button>
            </form>
        </div>
    </div>

    <?php if($qtd == 1) : ?>
        <div> Funcionou </div>
    <?php endif ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</body>
</html>