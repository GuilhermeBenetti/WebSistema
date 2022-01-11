<?php
session_start();
ob_start();
include_once '../../conexao.php';

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
        <title>Administrativo - FM</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    </head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <script type="text/javascript">
    $("#data_consulta").mask("00/00/0000");
    </script>
    
    <style>
        h4{
            color: #fff;
        }
        label1{
            color: #fff;
        }
    </style>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12 nav-right">
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
                <ul class="navbar-nav">
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
        
       
        
        <form method="POST" action="" class="d-inline-block" style="width: 100%; background-color: rgba(155,27,59)">
             <div class="container">
                    <label1 class="ml-5">Digite o nome do cliente:</label>
                    <div class="row mb-3 col-md-12">
                    <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite o nome aqui" class="form-control col-md-9 ml-5">
                    <button type="submit" name="buscar" id="buscar" class="btn btn-light ml-3 col-md-2" style:"height: 12px" value="1">Buscar</button>
                </div>
                </div>
        </form>
        
        <?php
            $SendPesqMsg = filter_input(INPUT_POST, 'buscar', FILTER_SANITIZE_STRING);
        if ($SendPesqMsg) {
            $assunto = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);

            //SQL para selecionar os registros
            $result_msg_cont = "SELECT * FROM clientes_pricons WHERE nome LIKE '%" . $assunto . "%' ORDER BY nome";
            
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->execute();

            if($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
                ?>
                <form method="POST" class="ml-3 mr-3 mt-3"action="edita-cadastro.php?id=<?php echo $row_msg_cont['id'] ?>">
                    <div class="form-row text-inline">
                    <input value="Nome Completo:   <?php echo $row_msg_cont['nome'];?>" class="form-control col-md-6" disabled>
                    <input value="Dt Nasc.:   <?php echo $row_msg_cont['data_nasc'];?>" class="form-control col-md-2" disabled>
                    <input value="CPF:   <?php echo $row_msg_cont['cpf'];?>" class="form-control col-md-2" disabled>
                    <input value="RG:   <?php echo $row_msg_cont['rg'];?>" class="form-control col-md-2" disabled>
                    <input value="Ocupação:   <?php echo $row_msg_cont['ocupacao'];?>" class="form-control col-md-2" disabled>
                    <?php 
                            $compare = $row_msg_cont['estadocivil'];
                            
                            $var = "SELECT descricao FROM clientes_estadocivil WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
                        <input value="Estado Civil: <?php echo $row_var['descricao']?>"
                        class="form-control col-md-2" disabled>
                        <?php 
                            $compare = $row_msg_cont['sexo'];
                            
                            $var = "SELECT descricao FROM clientes_sexo WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
                    <input value="Sexo: <?php echo $row_var['descricao'];?>" class="form-control col-md-2" disabled>
                    <input value="Rua:   <?php echo $row_msg_cont['rua_res'];?>" class="form-control col-md-6" disabled>
                    <input value="Bairro:   <?php echo $row_msg_cont['bairro_res'];?>" class="form-control col-md-4" disabled>
                    <input value="Numero:   <?php echo $row_msg_cont['numero_res'];?>" class="form-control col-md-2" disabled>
                    <input value="Cidade:   <?php echo $row_msg_cont['cidade_res'];?>" class="form-control col-md-4" disabled>
                    <input value="CEP:   <?php echo $row_msg_cont['cep_res'];?>" class="form-control col-md-2" disabled>
                    <input value="UF:   <?php echo $row_msg_cont['uf_res'];?>" class="form-control col-md-2" disabled>
                    <input value="Telefone/Celular:   <?php echo $row_msg_cont['telefone'];?>" class="form-control col-md-4" disabled>
                    <input value="Data do cadastro:    <?php $data = implode("/", array_reverse(explode("-", $row_msg_cont['data_cadastro']))); echo $data ?>" class="form-control col-md-5" disabled>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="Editar" id="Editar" class="btn btn-primary mt-2 col-md-2" value="Editar">Editar</button>
                        <hr>
                </div>
            </form>
            
            <form method="POST" action="proc_fim_consulta.php" class="ml-3 mr-3">
                
                
            <input type="hidden" class="form-control" name="id" value="<?php echo $row_msg_cont['id']?>">
            
            <div class="text-center">
                
                
                <div class="form-group col-md-2">
                    <label for="interesse">Data da Consulta: </label>
                    <input type="text" class="form-control" id="data_consulta" name="data_consulta" >
                </div>
                <h3>ANAMNESE</h3>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="interesse">Interesse pelo tratamento: </label>
                    <input type="text" class="form-control" id="interesse" name="interesse" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ed_escolar">Educação escolar: </label>
                    <input type="text" class="form-control" id="ed_escolar" name="ed_escolar" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="grau_resp">Grau de responsabilidade nos estudos: </label>
                    <input type="text" class="form-control" id="grau_resp" name="grau_resp" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="at_mental">Atitude mental na entrevista: </label>
                    <input type="text" class="form-control" id="at_mental" name="at_mental" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="habitos">Hábitos: </label>
                    <input type="text" class="form-control" id="habitos" name="habitos" >
                </div>
                <div class="form-group col-md-6">
                    <label for="hereditariedade">Hereditariedade: </label>
                    <input type="text" class="form-control" id="hereditariedade" name="hereditariedade" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="alergia">Alergia: </label>
                    <input type="text" class="form-control" id="alergia" name="alergia" >
                </div>
                <div class="form-group col-md-6">
                    <label for="trat_med">Tratamento Médico: </label>
                    <input type="text" class="form-control" id="trat_med" name="trat_med" >
                </div>
            </div>
            <div class="text-center">
                <br><hr><br>
                <h3>ANÁLISE LOCAL</h3>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="respiracao">Respiração: </label>
                    <input type="text" class="form-control" id="respiracao" name="respiracao" >
                </div>
                <div class="form-group col-md-6">
                    <label for="labial">Perfil labial: </label>
                    <input type="text" class="form-control" id="labial" name="labial" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="diccao">Dicção: </label>
                    <input type="text" class="form-control" id="diccao" name="diccao" >
                </div>
                <div class="form-group col-md-6">
                    <label for="tonsilas">Tonsilas: </label>
                    <input type="text" class="form-control" id="tonsilas" name="tonsilas" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="degluticao">Deglutição: </label>
                    <input type="text" class="form-control" id="degluticao" name="degluticao" >
                </div>
                <div class="form-group col-md-6">
                    <label for="adenoides">Adenoides: </label>
                    <input type="text" class="form-control" id="adenoides" name="adenoides" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="higiene_oral">Higiene oral: </label>
                    <input type="text" class="form-control" id="higiene_oral" name="higiene_oral" >
                </div>
                <div class="form-group col-md-6">
                    <label for="traumatismo">Traumatismo: </label>
                    <input type="text" class="form-control" id="traumatismo" name="traumatismo" >
                </div>
            </div>
            <div class="text-center">
                <br><hr><br>
                <h3>SISTEMA DENTAL</h3>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="agenesias">Agenesias: </label>
                    <input type="text" class="form-control" id="agenesias" name="agenesias" >
                </div>
                <div class="form-group col-md-6">
                    <label for="extranumerarios">Extranumerários: </label>
                    <input type="text" class="form-control" id="extranumerarios" name="extranumerarios" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="extraidos">Extraídos: </label>
                    <input type="text" class="form-control" id="extraidos" name="extraidos" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inclusos">Inclusos: </label>
                    <input type="text" class="form-control" id="inclusos" name="inclusos" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fraturas">Fraturas: </label>
                    <input type="text" class="form-control" id="fraturas" name="fraturas" >
                </div>
                <div class="form-group col-md-6">
                    <label for="desgastes">Desgastes: </label>
                    <input type="text" class="form-control" id="desgastes" name="desgastes" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="arcos">Relação entre arcos: </label>
                    <input type="text" class="form-control" id="arcos" name="arcos" >
                </div>
                <div class="form-group col-md-6">
                    <label for="mediana">Linha mediana: </label>
                    <input type="text" class="form-control" id="mediana" name="mediana" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="sobremordida">Sobremordida: </label>
                    <input type="text" class="form-control" id="sobremordida" name="sobremordida" >
                </div>
                <div class="form-group col-md-6">
                    <label for="sobressaliencia">Sobressaliência: </label>
                    <input type="text" class="form-control" id="sobressaliencia" name="sobressaliencia" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="curva_spee">Curva de spee: </label>
                    <input type="text" class="form-control" id="curva_spee" name="curva_spee" >
                </div>
                <div class="form-group col-md-6">
                    <label for="dentistica">Dentistica: </label>
                    <input type="text" class="form-control" id="dentistica" name="dentistica" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="atm">A.T.M: </label>
                    <input type="text" class="form-control" id="atm" name="atm" >
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="observacao">Observações: </label>
                    <input type="text" class="form-control" id="observacao" name="observacao" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="queixa">Queixa principal: </label>
                    <input type="text" class="form-control" id="queixa" name="queixa" >
                </div>
            </div>
            <input type="hidden" class="form-control" name="status" value="1">
            
            <div class="text-center mb-5">
                <input name="SendFimCad" type="submit" value="Finalizar" class="btn btn-outline-success col-md-2">
            </div>
        </form>
            <?php
            }else{
                echo "Paciente não encontrado!";
            }
        }
        ?>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        
    </body>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
            $(function () {
                $("#nome_usuario").autocomplete({
                    source: 'proc_pesq_msg.php'
                });
            });
        </script>
        
    </body>
    
</html>
   
        