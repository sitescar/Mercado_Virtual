<?php
    session_start();
    //error_reporting(0);
    include_once("../connection.php");
    $marca=$_POST["marca"];
    $modelo=$_POST["modelo"];
    $estado=$_POST["estado"];
    $cidade=$_POST["cidade"];
    $cor=$_POST["cor"];
    $rodado=$_POST["KMrodado"];
    $ano=$_POST["ano"];
    $combustivel=$_POST["combustivel"];
    $descricao=$_POST["descricao"];
    $preco=$_POST["preco"];
    //--------------------//
    $ar=$_POST["ar"];
    $vidro=$_POST["vidro"];
    $sensor=$_POST["sensor"];
    $direcao=$_POST["direcao"];
    $som=$_POST["som"];
    $alarme=$_POST["alarme"];
    $trava=$_POST["trava"];
    //-------------------//
    $num=rand(100000,999999);
    $data=date('Y-m-d H:i:s');
    $apel=$_SESSION['login'];
    
    $conteudo='<?php
session_start();
include_once("../../BACKEND/connection.php");
$_SESSION["anuncio"]=basename(__DIR__);//volta o nome do arquivo
$_SESSION["url"]=$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$query=$pdo->query("SELECT * FROM anuncio WHERE id_carro=".$_SESSION["anuncio"])->fetch(PDO::FETCH_OBJ);
$query1=$pdo->query("SELECT * FROM carros WHERE id_carro=".$_SESSION["anuncio"])->fetch(PDO::FETCH_OBJ);

include("../../BACKEND/anuncio/tela.php");
?>';
//verificar se algum campo está vaziu

    if (empty($marca) || empty($modelo)) {
        # code...
        $_SESSION['vaziu']=true;
        header("location: ../../anunciar");
        exit();
    }elseif (empty($estado) || empty($cidade)) {
        # code...
        $_SESSION['vaziu']=true;
        header("location: ../../anunciar");
        exit();
    }elseif (empty($cor) || empty($rodado)) {
        # code...
        $_SESSION['vaziu']=true;
        header("location: ../../anunciar");
        exit();
    }elseif (empty($combustivel) || empty($ano)) {
        # code...
        $_SESSION['vaziu']=true;
        header("location: ../../anunciar");
        exit();
    }elseif (empty($descricao) ) {
        # code...
        $_SESSION['vaziu']=true;
        header("location: ../../anunciar");
        exit();
    }else{
        if(empty($ar)){$ar="não";}
        if(empty($vidro)){$vidro="não";}
        if(empty($sensor)){$sensor="não";}
        if(empty($direcao)){$direcao="não";}
        if(empty($som)){$som="não";}
        if(empty($alarme)){$alarme="não";}
        if(empty($trava)){$trava="não";}
        $query=$pdo->prepare("SELECT * FROM carros WHERE id_carro='{$num}'");//stamente do pdo
        $query->execute();//execução 
        $result=$query;
        //verificar se tem id repetido
        while($result->rowCount()>=1){//se tiver repetido vai repertir até não tiver não for mais repedido
            $num=rand(100000,999999);
            $query=$pdo->prepare("SELECT * FROM carros WHERE id_carro='{$num}'");//stamente do pdo
            $query->execute();//execução 
            $result=$query;
        }
        try{
            
            $stmt = $pdo->prepare("INSERT INTO carros 
                    (id_carro ,marca, modelo, ano, quilometragem, 
                    ar_condicionado, vidro, sensor, direcao, som,
                    alarme, travas, cor, combustivel) VALUES 
                    ('{$num}', '{$marca}', '{$modelo}', '{$ano}',
                    '{$rodado}', '{$ar}', '{$vidro}','{$sensor}',
                    '{$direcao}','{$som}','{$alarme}','{$trava}',
                    '{$cor}','{$combustivel}')");
            $stmt->execute();
           
            $stmt = $pdo->prepare("INSERT INTO anuncio 
                    (apelido_usuario, id_carro, data, 
                    estado, cidade, descricao, preco_pedido) VALUES 
                    ('{$apel}', '{$num}', 
                    '{$data}', '{$estado}',
                    '{$cidade}', '{$descricao}', '{$preco}')");
            $stmt->execute();
           
            
            if(isset($_FILES["arquivo"])){
                mkdir("../../anuncios/{$num}/img",0777,TRUE);
                $cd="../../anuncios/{$num}/img/";
                
                echo '../../anuncios/'.$num.'/index.php';
                file_put_contents('../../anuncios/'.$num.'/index.php', $conteudo);
                $img=count($_FILES['arquivo']['name']);
                $n=0;
                while($n<$img){
                    if($n==0){
                        $novoNome="{$num}.jpg";
                        move_uploaded_file($_FILES['arquivo']["tmp_name"][$n],$cd.$novoNome);
                    }else{
                        $novoNome="{$num}({$n}).jpg";
                        move_uploaded_file($_FILES['arquivo']["tmp_name"][$n],$cd.$novoNome);
                    }
                    $n++;
                    //echo $novoNome;
                }
            }         
            
            $_SESSION['cadastrado']=true;
            header("location: ../../anunciar");
            exit();
        }
        catch(Exception $e){
            print_r($e);
        }
        /*echo $marca.", ".$modelo.", ".$estado.", ".$cidade.", ".$cor.", ".$rodado.", ".$ano.", ".$combustivel.", ".$descricao.", ".$preco.", ".$ar.", ".$vidro.", ".$sensor.", ".$direcao
        .", ".$som.", ".$alarme.", ".$trava;*/
       
    }

?>