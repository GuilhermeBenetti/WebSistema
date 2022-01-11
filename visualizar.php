<?php
session_start();
ob_start();
include_once 'conn.php';

if((!isset($_SESSION['id_login'])) AND (!isset($_SESSION['login']))){
    $_SESSION['msg_login'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
        header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="shortcut icon" href="../../assets/images/logo-736x125-128x116.png" type="image/x-icon">
        <link href="../../assets/css/personalizado.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <title>Visualizar - FM</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    </head>
     <style>
        h4{
            color: #fff;
        }
        label1{
            color: #fff;
        }
        #rectangle1{
            width:10px;
            height:25px;
            margin-top: 15px;
            border: 10px, solid;
            border-color: black;
            opacity: 1;
        }
    </style>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
            <img src="../../assets/images/logo-736x125.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <a class="navbar-brand align-top" href="admin.php">Fernando Manhães</a>
                <?php
                    if(!empty($_SESSION['id_login'])){
                    
                    }else{
                    $_SESSION['msg_login'] = "<p style='color:red;'>Área Restrita</p>";
                    header("Location: login.php");
                   }
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-right">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Cadastrar Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="visualizar.php">Visualizar Cadastros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
        

        <form method="POST" action="" class="h-50 d-inline-block" style="width: 100%; background-color: rgba(155,27,59)">
            <div class="container">
                    <label1 class="ml-5">Digite o nome do cliente:</label>
                    <div class="row mb-3 col-md-12">
                    <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite o nome aqui" class="form-control col-md-9 ml-5">
                    <button type="submit" name="buscar" id="buscar" class="btn btn-light ml-3 col-md-2" style:"height: 12px" value="1">Buscar</button>
                </div>
                </div>
            
        </form>
        <div class="container">
            <div class="row ml-5 mr-5">
		        <p>
		            <div class="col-md-4 text-center" id="rectangle1">
		                <p style="color: red">- Cadastro à mais de 3 dias</p>
		            </div>
		            <div class="col-md-4 text-center" id="rectangle1">
		                <p style="color: blue">- Cadastro à menos de 3 dias</p>
		            </div>
		            <div class="col-md-4 text-center" id="rectangle1">
		                <p style="color: black">- Paciente finalizado</p>
		            </div>
		        </p>
		    </div>
		 </div>
        <hr>
    <?php
        $SendPriCad = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
        if($SendPriCad){

        $result_busca = "SELECT * FROM clientes_pricons WHERE nome LIKE '%$SendPriCad%'";

        $resultado_busca = mysqli_query($conn, $result_busca);

        while($row_busca = mysqli_fetch_assoc($resultado_busca)){
            $data1 = $row_busca['data_cadastro'];
            $data2 = date('d/m/Y');
            
            $data1 = implode('-', array_reverse(explode('/', $data1)));
            $data2 = implode('-', array_reverse(explode('/', $data2)));

            $d1 = strtotime($data1); 
            $d2 = strtotime($data2);
            
            $dataFinal = ($d2 - $d1) /86400;
            
            if($dataFinal > 3 && $row_busca['status']==0){
		    ?>
                <div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5 style='color:red'>Nome: <?php echo $row_busca['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5 style='color:red'>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_busca['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_busca['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
            <?php
        }else if($row_busca['status']==0){?>
            <div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5 style='color:blue'>Nome: <?php echo $row_busca['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5 style='color:blue'>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_busca['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_busca['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
            <?php
        }else{?>
        <div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5>Nome: <?php echo $row_busca['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_busca['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_busca['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_busca['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
        <?php
        }
        
        }

        }else{
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 20;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM clientes_pricons LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
		    $data1 = $row_usuario['data_cadastro'];
            $data2 = date('d/m/Y');
            
            $data1 = implode('-', array_reverse(explode('/', $data1)));
            $data2 = implode('-', array_reverse(explode('/', $data2)));

            $d1 = strtotime($data1); 
            $d2 = strtotime($data2);
            
            $dataFinal = ($d2 - $d1) /86400;
            
            if($dataFinal > 3 && $row_usuario['status']==0){
		    ?>
			<div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5 style='color:red'>Nome: <?php echo $row_usuario['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5 style='color:red'>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_usuario['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_usuario['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
            <?php
            }else if($row_usuario['status']==0){
            ?>
        <div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5 style='color:blue'>Nome: <?php echo $row_usuario['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5 style='color:blue'>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_usuario['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_usuario['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
            <?php
            }else{
            ?>
        <div class="row ml-3 mr-3">
                    <div class="col-md-6">
                    <h5>Nome: <?php echo $row_usuario['nome']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5>Data do Cadastro: <?php $data = implode("/", array_reverse(explode("-", $row_usuario['data_cadastro']))); echo $data ?></h5>
                    </div>
                    <div class="col-md-3">
                        <a href="visualizar-cadastro1.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Visualizar" id="Visualizar" class="btn btn-success text-center ml-3" value="Visualizar" style="width: 90px">Visualizar</button>
                        </a>
                        <a href="edita_final.php?id=<?php echo  $row_usuario['id'] ?>">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary text-center" value="Editar" style="width: 90px">Editar</button>
                        </a>
                        <a href="proc_apaga_cons.php?id=<?php echo  $row_usuario['id'] ?>" data-confirm="Tem certeza que deseja apagar o item selecionado?">
                            <button type="submit" name="Apagar" id="Visualizar" class="btn btn-danger text-center" value="Apagar" style="width: 90px">Apagar</button></a>
                        
                    </div>
            </div>
            <hr>
            
			<?php
            }
		}
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM clientes_pricons";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 1;
		echo "<a href='visualizar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='visualizar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='visualizar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='visualizar.php?pagina=$quantidade_pg'>Ultima</a>";
        }
		?>
        
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="js/personalizado.js"></script>	
	
	
</html>