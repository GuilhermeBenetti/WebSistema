<?php
session_start();
include_once '../../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../../assets/tether/tether.min.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/socicon/css/styles.css">
        <link rel="stylesheet" href="../../assets/theme/css/style.css">
        <link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css" type="text/css">
        <link rel="stylesheet" href="../../assets/animate/animate.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
        <script language="JavaScript">
function DoPrinting()
{
   if (!window.print)
   {
      alert("Use o Netscape ou Internet Explorer \n nas versões 4.0 ou superior!")
      return
   }
   window.print()
}

</script>
        <link rel="shortcut icon" href="../../assets/images/logo-736x125-128x116.png" type="image/x-icon">
        <title>Cadastro Completo - FM</title>
    </head>
    
    <body>
        
        <header>
            <div class="row ml-3">
                <div class="text-left">
                <a href="admin.php"><button type="submit"  name="Voltar" id="Voltar" class="btn btn-info d-print-none" value="Voltar" style="height: 10px">Voltar</button> </a>
                <a>
                    <button class="btn btn-outline-success d-print-none" onclick='javascript:DoPrinting();' style="height: 10px">Exportar</button>
                </a>
                </div>
            </div>
            
            
            <div class="row">
                
                <div class="col-md-9 text-center mt-auto">
                    <h2>Ficha de Primeira Consulta - Completa</h2>
                    <hr></hr>
                </div>
                <div class="text-right col-md-3 mr-0">
                    <div class="thumbnail text-center">
                    <img src="../../assets/images/logo-736x125.png" class="img-responsive">
                    <div class="caption">
                        <h3>Fernando Manhães</h3>
                </div>
                </div>
                </div>
            </div>
                
        </header>
        
        <?php

            $id = $_SESSION['msg'];

            $result_msg_cont = "SELECT * FROM clientes_pricons WHERE id=$id";
            
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->execute();

            if($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
                ?>
            
            <div class="ml-3 mr-3">
                <div class="form-row">
                <div class="col-md-12">
                    <h4>Nome Completo: <?php echo $row_msg_cont['nome']?></h4>
                </div>
                </div>
                
            <p>
                <div class="row">
                    <div class="col-md-3">
                    <h5>Data Nasc.: <?php echo $row_msg_cont['data_nasc']?></h5>
                    </div>
                    <div class="col-md-3">
                        <?php 
                            $compare = $row_msg_cont['sexo'];
                            
                            $var = "SELECT descricao FROM clientes_sexo WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
                    <h5>Sexo: <?php echo $row_var['descricao']?></h5>
                    </div>
                    <div class="col-md-3">
                        <?php 
                            $compare = $row_msg_cont['estadocivil'];
                            
                            $var = "SELECT descricao FROM clientes_estadocivil WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
                    <h5>Estado Civil: <?php echo $row_var['descricao']?></h5>
                    </div>
                    <div class="col-md-3">
                    <h5>Pagamento: <?php echo $row_msg_cont['pagamento']?></h5>
                    </div>
                    </div>
                    <div class="row">
                <div class="col-md-6">
                    <h5>Ocupação: <?php echo $row_msg_cont['ocupacao']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>CPF: <?php echo $row_msg_cont['cpf']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>RG: <?php echo $row_msg_cont['rg']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Nome Pai: <?php echo $row_msg_cont['nome_pai']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Atividade: <?php echo $row_msg_cont['atividade_pai']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Nome Mãe: <?php echo $row_msg_cont['nome_mae']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Atividade: <?php echo $row_msg_cont['atividade_mae']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Rua: <?php echo $row_msg_cont['rua_res']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>Bairro: <?php echo $row_msg_cont['bairro_res']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>Cidade: <?php echo $row_msg_cont['cidade_res']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-2">
                    <h5>CEP: <?php echo $row_msg_cont['cep_res']?></h5>
                </div>
                <div class="col-md-2">
                    <h5>Número: <?php echo $row_msg_cont['numero_res']?></h5>
                </div>
                <div class="col-md-1">
                    <h5>UF: <?php echo $row_msg_cont['uf_res']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Rua Comercial: <?php echo $row_msg_cont['rua_com']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>Bairro: <?php echo $row_msg_cont['bairro_com']?></h5>
                </div>
                <div class="col-md-3">
                    <h5>Cidade: <?php echo $row_msg_cont['cidade_com']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-2">
                    <h5>CEP: <?php echo $row_msg_cont['cep_com']?></h5>
                </div>
                <div class="col-md-2">
                    <h5>Número: <?php echo $row_msg_cont['numero_com']?></h5>
                </div>
                <div class="col-md-1">
                    <h5>UF: <?php echo $row_msg_cont['uf_com']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <h5>Telefone/Celular: <?php echo $row_msg_cont['telefone']?></h5>
                </div>
                <div class="col-md-4">
                    <h5>Telefone Comercial: <?php echo $row_msg_cont['telefone2']?></h5>
                </div>
                <div class="col-md-4">
                    <h5>Indicação: <?php echo $row_msg_cont['indicacao']?></h5>
                </div>
                </div>
            <hr>
            <div class="col-md-3">
                    <h5>Data da Consulta: <?php echo $row_msg_cont['data_consulta']?></h5>
                </div>
            <h2 class="text-center">ANAMNESE</h2><br>
            <p>
                <div class="row">
                <div class="col-md-12">
                    <h5>Interesse pelo tratamento: <?php echo $row_msg_cont['interesse']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>Educação escolar: <?php echo $row_msg_cont['ed_escolar']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>Grau de responsabilidade nos estudos: <?php echo $row_msg_cont['grau_resp']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>Atitude mental na entrevista: <?php echo $row_msg_cont['at_mental']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Hábitos: <?php echo $row_msg_cont['habitos']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Hereditariedade: <?php echo $row_msg_cont['hereditariedade']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Alergia: <?php echo $row_msg_cont['alergia']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Tratamento Médico: <?php echo $row_msg_cont['trat_med']?></h5>
                </div>
                </div>
            </p>
            <hr>
             <h2 class="text-center">ANÁLISE LOCAL</h2><br>
            <p>
                <div class="row">
                <div class="col-md-6">
                    <h5>Respiração: <?php echo $row_msg_cont['respiracao']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Perfil Labial: <?php echo $row_msg_cont['labial']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Dicção: <?php echo $row_msg_cont['diccao']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Tonsilas: <?php echo $row_msg_cont['tonsilas']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Deglutição: <?php echo $row_msg_cont['degluticao']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Adenoides: <?php echo $row_msg_cont['adenoides']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Higiene Oral: <?php echo $row_msg_cont['higiene_oral']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Traumatismo: <?php echo $row_msg_cont['traumatismo']?></h5>
                </div>
                </div>
            </p>
            <hr>
             <h2 class="text-center">SISTEMA DENTAL</h2><br>
            <p>
                <div class="row">
                <div class="col-md-6">
                    <h5>Agenesias: <?php echo $row_msg_cont['agenesias']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Extranumerários: <?php echo $row_msg_cont['extranumerarios']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Extraídos: <?php echo $row_msg_cont['extraidos']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Inclusos: <?php echo $row_msg_cont['inclusos']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Fraturas: <?php echo $row_msg_cont['fraturas']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Desgastes: <?php echo $row_msg_cont['desgastes']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Relação entre arcos: <?php echo $row_msg_cont['arcos']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Linha mediana: <?php echo $row_msg_cont['mediana']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Sobremordida: <?php echo $row_msg_cont['sobremordida']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Sobressaliencia: <?php echo $row_msg_cont['sobressaliencia']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <h5>Curva de spee: <?php echo $row_msg_cont['curva_spee']?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Dentistica: <?php echo $row_msg_cont['dentistica']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>A.T.M: <?php echo $row_msg_cont['atm']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>Observações: <?php echo $row_msg_cont['observacao']?></h5>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <h5>Queixa principal: <?php echo $row_msg_cont['queixa']?></h5>
                </div>
                </div>
            </p>
           
            </div>
             <?php
            }
?>
</body>
</html>