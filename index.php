<?php
    
    error_reporting(0);
    session_start();
    include_once("BACKEND/connection.php");
    include("BACKEND/verificar/verific.php");
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./IMG/logo.jpeg" type="image/jpeg">
    <title>PotiCars- Um Mercado Virtual Potiguar de Vendas Automotiva</title>
    <link rel="stylesheet" href="CSS/stylePrincipal.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="JAVASCRIPT/passarIMG.js"></script>
</head>
</head>
<body>
    
    <div class="tudo">
        <?php
            include("header/header.php");
        ?>
    
        <div class="meio">
            <div class="ads">
            <?php 
                    $sql="SELECT * FROM anuncio ORDER BY id_carro ASC";
                    $anuncio=$pdo->query($sql);
                    $numero=0;
                    $numero1=1;
                    $numero2=0;
                    //echo is_int((10/2));
                    while($linha=$anuncio->fetch()): 
                        $numero2++; 
                    ?>
                    <a href="anuncios/<?php echo $linha["id_carro"]?>"><div class="anunciototal" id='n<?php echo$numero1;?>'>
                        <div class="anuncio"><img src="<?php echo "anuncios/".$linha["id_carro"]."/img/".$linha['id_carro'].".jpg";?>" alt=""/>
                        <?php $carro=$pdo->query("SELECT * FROM carros 
                        WHERE id_carro='".$linha["id_carro"]."'")->fetch(PDO::FETCH_OBJ);?>
                        <p><b>Marca: </b><?php echo $carro->marca;?>;<b> Ano: </b><?php echo$carro->ano;?></p>
                        <p><b>Preço: </b><?php echo $linha['preco_pedido'];?>R$</p>
                        </div>
                    </div></a>


                <?php
                 $numero++; 
                    if($numero==10){
                        
                        echo'</div>
                        
                        <div class="seta voltar" id="n'.$numero1.'" ><i></i></div>
                        <div class="seta passar" id="n'.$numero1.'" ><i></i></div>';
                       
                        $numero1++;
                        $numero=0;
                        if($anuncio->rowCount()<($numero1 * 10)){
                            echo"</div>";
                            break;
                        }else{
                            echo'<div class="ads">';
                        }
                    }
                    
                    endwhile;
                    //echo $numero1;
                    if($numero1<=1 or $numero!==0){
                        echo '</div> 
                        <div class="passaVolta">
                        <div class="seta voltar" id="n'.($numero1).'" ><i></i></div>
                        <div class="seta passar" id="n'.($numero1).'" ><i></i></div>
                        </div>';
                    }
                    ?>
                

    <div class="rodape">
        <p style='text-align:center' >Feito por Luiz, Paulo e Reinan</p>
        <p style='text-align:center' >Copyright © 2021-2021 PotiCars.com.br LTDA.</p>
    
    </div>
    </div>
</body>
</html>