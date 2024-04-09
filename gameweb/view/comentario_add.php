<?php
if($_POST){
$stars = $_POST['numberOfStars'];
$desc = $_POST['descriptionAvaliate'];
$titulo = $_POST['tituloAvaliateInput'];

echo "Estrelas: ". $stars;
echo "<br> Descrição: ". $desc;
echo "<br> titulo ". $titulo;
}
?>