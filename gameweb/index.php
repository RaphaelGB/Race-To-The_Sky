<?php

include ("bd/conexao.php");
include ("controls/comentario.php");
session_start();


$result = quant_comentario($conexao); // retorna array ( [quant] => 5 );
$new_result = array_values($result);
$quant = $new_result[0];
$ult = $quant-2;
$penult = $quant-1;
$antepenult = $quant;
$item1 = buscar_avaliacao($conexao, $ult);
$item2 = buscar_avaliacao($conexao, $penult);
$item3 = buscar_avaliacao($conexao, $antepenult);

if(isset($_SESSION['active'])){
$username = $_SESSION['username'];
$id = $_SESSION['id'];
/*
if($_SESSION['active'] != "ativo"){
    session_destroy();
    header("Location login.php");
}*/
}
if($_POST){
if(!isset($id)){
    header("Location: login.php");
    die();
}}



$estrela1 =intval($item1['Estr']);
$estrela2 =intval($item2['Estr']);
$estrela3 =intval($item3['Estr']);


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/x-icon" href="img/iconewindow.png"> -->
    <link href="https://vjs.zencdn.net/8.5.2/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="styleindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Sky Race</title>
</head>

<body>
    <div class="nav">
        <img id="img-nav-logo" src="img/logonav.png" alt="">
        <div id="nav-right">
            <a id="nav-item" href="personagens.php">Curiosidades</a>
            <a id="nav-item" href="tutorial.php">Tutorial</a>
            <p id="nav-item" id="NomeUser"><?php echo isset($username)? $username : "Bem-vindo" ?></p>
            <a href="view/logout.php" class="btn-logout"><button id="nav-item" >Logout</button></a>
        </div>
    </div>
    
    
    <div class="carrousel-jogo swiper">
        <div class="container-jogo">
            <div class="jogo-wrapper swiper-wrapper">
                <div class="swiper-slide">
                    <img  class= "img-carrousel" src="img/img-ilustrative1.jpeg" alt=""> 
                    <a href="https://gx.games/games/u66p3l/sky-race"><button type="button" class="btn-jogar">Jogar agora</button></a>
                </div>
                <div class="swiper-slide">
                    <img  class= "img-carrousel" src="img/fundo-jogo.png" alt="">  
                    <a href="https://gx.games/games/u66p3l/sky-race"><button type="button" class="btn-jogar">Jogar agora</button></a>
                </div>
                <div class="swiper-slide">
                    <img  class= "img-carrousel" src="img/img-ilustrative2.jpeg" alt="">
                    <a href="https://gx.games/games/u66p3l/sky-race"><button type="button" class="btn-jogar">Jogar agora</button></a>
                </div>                               
            </div>            
        </div>
    </div>

    <h2 id="frase-person">Conheça os nossos heróis</h2>
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <div class="card sapo swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-content">
                            <h4 class="name">Sapo Ninja</h4>
                            <a href="#"><button class="btn-person">Saber Mais</button></a>
                            <p class="description">Cada herói com a sua história e <br> objetivos diferentes</p>
                        </div>
                        <div class="card-image">
                            <img src="img/sapo-carrousel.png" alt="" class="card-img">
                        </div>
                    </div>
                </div>
                <div class="card xama swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>                        
                        <div class="card-content">
                            <h4 class="name">Xamã Mascarado</h4>
                            <a href="#"><button class="btn-person">Saber Mais</button></a>
                            <p class="description">Cada herói com a sua história e <br> objetivos diferentes</p>
                        </div>
                        <div class="card-image">
                            <img src="img/xama-carrousel.png" alt="" class="card-img">
                        </div>
                    </div>
                </div>
                <div class="card azulao swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>                        
                        <div class="card-content">
                            <h4 class="name">Azulão</h4>
                            <a href="#"><button class="btn-person">Saber Mais</button></a>
                            <p class="description">Cada herói com a sua história e <br> objetivos diferentes</p>
                        </div>
                        <div class="card-image">
                            <img src="img/azulao.png" alt="" class="card-img">
                        </div>
                    </div>
                </div>
                <div class="card puma swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>                        
                        <div class="card-content">
                            <h4 class="name">Puma rosa</h4>
                            <a href="#"><button class="btn-person">Saber Mais</button></a>
                            <p class="description">Cada herói com a sua história e <br> objetivos diferentes</p>
                        </div>
                        <div class="card-image">
                            <img src="img/puma-rosa.png" alt="" class="card-img">
                        </div>
                    </div>
                </div>                
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="mid-logo">
        <hr id="linha-sky">
        <img id="logo-mid" src="img/mid-logo.png" alt="">
        <div id="linha-baixo"><hr id="linha-sky"></div>
    </div>


    <div class="content">
        <div class="left">
            <h2>Desafie seus limites!</h2>
            <p>Você já se perguntou como é a <br> sensação de desafiar a gravidade, <br> alcançar novos patamares e <br> superar seus próprios limites? <br><br> A escalada é a resposta!</p>
            <a href=""><button type="button" id="btn-tutorial">Conheça o jogo</button></a>
        </div>
        <div class="right">
            <img id="crystal-cave" src="img/crystal-cave.png" alt="">
        </div>
    </div>

    <div class="depoimentos">
        <h2 id="frase-person">Últimas Avaliações</h2>
        <div class="cardsAvaliate">
            <div class="cardAvaliate">
                <h2 id="textoAvaliate"><?=$item1['nome']; ?></h2>
            <ul class="avaliacao"> 
                 <?php for($i=0; $i<$estrela1;$i++) {
                    echo 
                    "<li class='star-static'></li>";
                }
                ?></ul>
                <h3 id="textoAvaliate"><?=$item1['Title']?></h3>
                <p id="textoAvaliate"><?=$item1['Descric'] ?>"</p>
            </div>
            <div class="cardAvaliate">
                <h2 id="textoAvaliate"><?=$item2['nome']?></h2>
                <ul class="avaliacao">
                <?php for($i=0; $i<$estrela2;$i++) {
                    echo 
                    "<li class='star-static'></li>";
                }
                ?>
                </ul>
                <h3 id="textoAvaliate">"<?=$item2['Title'] ?>"</h3>
                <p id="textoAvaliate">"<?=$item2['Descric'] ?>"</p>
            </div>
            <div class="cardAvaliate">
                <h2 id="textoAvaliate">"<?=$item3['nome']; ?>"</h2>
                <ul class="avaliacao">
                <?php for($i=0; $i<$estrela3;$i++) {
                    echo 
                    "<li class='star-static'></li>";
                }?>
            </ul>
                <h3 id="textoAvaliate">"<?=$item3['Title']; ?>"</h3>
                <p id="textoAvaliate">"<?=$item3['Descric']; ?>"</p>
            </div>
        </div>
        <div class="post">
            <div class="text">Thanks for rating us!</div>
            <a id="final"></a>
            <div class="edit">EDIT</div>
        </div>
        <form action="" method="post">
            <button id="avaliar" type="button">Avalie-nos</button>
        </form>
        <div class="groupAvaliate">        
            <form method="POST" action="">
                <header id="avaliateFrase">Eu amei!</header>
                <ul class="avaliacao">
                    <li class="star-icon " data-avaliacao="1"></li>
                    <li class="star-icon" data-avaliacao="2"></li>
                    <li class="star-icon" data-avaliacao="3"></li>
                    <li class="star-icon" data-avaliacao="4"></li>
                    <li class="star-icon ativo" data-avaliacao="5"></li>
                    <input type="hidden" id="numberOfStars" name="numberOfStars" value="">
                    <input type="hidden" id="tituloAvaliate" name="tituloAvaliateInput" value="">
                </ul>
                <div class="textarea">
                    <textarea name="descriptionAvaliate" cols="30" placeholder="Describe your experience.."></textarea>
                </div>
                <div class="btn">
                    <button id="btnSubmitForm" type="submit">Post</button>
                </div>
            </form>        
        </div>
    </div>

    <hr class="divisorFooter">

    <div class="footer">
        <a id="footer-item" href=""><h2>Precisa de ajuda?</h2></a>
        <a id="footer-item" href=""><h2>Sky Race Community</h2></a>
        <a id="footer-item" href="desenvolvedores.php"><h2>Desenvolvedores</h2></a>
    </div>

    <script>
        var stars = document.querySelectorAll('.star-icon');
        const header = document.getElementById("avaliateFrase");
        const btn = document.getElementById("btnSubmitForm");
        const starActive = document.querySelector(".ativo");
        const valorStar = starActive.getAttribute("data-avaliacao");
        const btnAvaliar = document.getElementById('avaliar');
        const depoimentos = document.querySelector(".depoimentos");
        const post = document.querySelector(".post");
        const widget = document.querySelector(".groupAvaliate");
        const editBtn = document.querySelector(".edit");
        const cardsAvaliate = document.querySelectorAll(".cardAvaliate");
        const divCardAvaliate = document.querySelector(".cardsAvaliate");
        const tituloAvaliateInput =document.getElementById('tituloAvaliate');
        const numberOfStarsInput = document.getElementById("numberOfStars");

        btnAvaliar.onclick = ()=>{            
            cardsAvaliate.forEach(function(card){
                        card.style.display = "none";
            });
            btnAvaliar.style.display = "none";
            widget.style.display = "flex";
        }       
                document.addEventListener('click', function(e){
                    
                    var classStar = e.target.classList;
                        if(!classStar.contains('ativo')){
                            stars.forEach(function(star){
                            star.classList.remove('ativo');
                        });
                        classStar.add('ativo'); 
                        btn.onclick = ()=>{
                            widget.style.display = "none";
                            post.classList.add('showPost');
                            tituloAvaliateInput.value = header.textContent;
                            if(e.target.getAttribute('data-avaliacao') !== null){
                                var numberOfStars = e.target.getAttribute('data-avaliacao');
                                numberOfStarsInput.value = numberOfStars;
                            }else{
                                numberOfStarsInput.value = "5";
                            }
                            editBtn.onclick = ()=>{
                                widget.style.display = "flex";
                                post.classList.remove('showPost');
                            }
                        }
                      var nota = e.target.getAttribute('data-avaliacao');
                      
                    switch (nota){
                        case "1":
                            header.innerText = "Eu odiei!";
                            stars.forEach(function(elemento){
                                elemento.style.textShadow = "none";
                            });
                        break;

                        case "2":
                            // header.textContent = "";
                            header.innerText = "Eu não gostei...";
                            stars.forEach(function(elemento){
                                elemento.style.textShadow = "none";
                            });
                        break;
                        
                        case "3":
                            // header.textContent = "";
                            header.innerText = "Achei incrível!";
                            stars.forEach(function(elemento){
                                elemento.style.textShadow = "none";
                            });
                        break;
                        case "4":
                            // header.textContent = "";
                            header.innerText = "Eu gostei!";
                            stars.forEach(function(elemento){
                                elemento.style.textShadow = "none";
                            });
                        break;
                        case "5":
                            // header.textContent = "";
                            header.innerText = "Eu amei!";
                            stars.forEach(function(elemento){
                                elemento.style.textShadow = "0 0 20px #952";
                            });
                        break;

                        default:
                            header.innerText = "Eu amei!";
                        break;                      
                    }                  
                    }                    
                  });
    </script>
    <?php

    if($_POST){
        $estrelas = $_POST['numberOfStars'];
        $description = $_POST['descriptionAvaliate'];
        $titulo = $_POST['tituloAvaliateInput'];
        // echo "<h1>". $titulo ."</h1>";   
        echo "<script>
        btnAvaliar.style.display = 'none';
        post.classList.add('showPost');
        depoimentos.style.height = '40vw';
        document.addEventListener('DOMContentLoaded', function() {
            var final = document.getElementById('final');
            final.scrollIntoView();
        });
        editBtn.onclick = ()=>{
            widget.style.display = 'flex';
            widget.style.marginBottom = '0';
            widget.style.marginTop = '3vw';
            post.classList.remove('showPost');
            divCardAvaliate.style.display = 'none';

        }
        
    </script>";         
    }
   
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script> -->
    <script type="text/javascript" src="js/vanilla-tilt.js"></script>
        <script>
            VanillaTilt.init(document.querySelectorAll(".cardAvaliate"), {
                max: 1,
                speed: 200,
                glare: true,
                "max-glare": 0.1,
	        });
        </script>

<?php
if($_POST){
    
$stars = $_POST['numberOfStars'];
$desc = $_POST['descriptionAvaliate'];
$titulo = $_POST['tituloAvaliateInput'];

    if(inserir_comentario($conexao, $desc, $titulo, $stars, $id)){
    }
}
?>
</body>
</html>