<?php
session_start();
include '../../conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
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
        <link rel="shortcut icon" href="../../assets/images/logo-736x125-128x116.png" type="image/x-icon">
        <title>Edita Primeira - FM</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <script type="text/javascript">
    $("#telefone, #telefone2").mask("(00) 00000-0000");
    </script>
    
    <script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
    </script>
    
    <script type="text/javascript">
    $("#rg").mask("00.000.000-0");
    </script>
    
    <script type="text/javascript">
    $("#data_nasc, #data_consulta").mask("00/00/0000");
    </script>
    
    <script type="text/javascript">
    $("#cep_res, #cep_com").mask("00000-000");
    </script>
    
    <body>
        <header>
            <a href="visualizar.php"><button type="submit"  name="Voltar" id="Voltar" class="btn btn-info d-print-none" value="Voltar" style="height: 10px">Voltar</button> </a>
            <div class="row">
                <div class="col-md-9 text-center mt-auto">
                    <h2>Ficha de Primeira Consulta</h2>
                    <hr></hr>
                </div>
                <div class="text-right col-md-3">
                    <div class="thumbnail text-center">
                    <img src="../../assets/images/logo-736x125.png" class="img-responsive">
                    <div class="caption">
                        <h3>Fernando Manhães</h3>
                </div>
                </div>
            </div>
            </div>
        </header>
<style>
        select-label {
            position: relative;
            cursor: pointer;
            margin-bottom: .357em;
            padding: 0;
        }
        select {
            background-color: #f5f5f5;
            box-shadow: none;
            color: #565656;
            font-family: 'Rubik', sans-serif;
            font-size: 0.95rem;
            line-height: 1.43;
            min-height: 2em;
            padding: 1.07em .5em;
            border:1px solid #ffffff;
            border-radius: 10px;
        }
            
            select:focus {
            border: 1px solid #e8e8e8;
        }
    </style>

        <form method="POST" action="proc_edit_final.php">
            <?php
            //SQL para selecionar os registros
            $result_msg_cont = "SELECT * FROM clientes_pricons WHERE id=$id";
            $resultado_msg_cont = $conn->prepare($result_msg_cont);
            $resultado_msg_cont->execute();

            if($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
                ?>
                <input type="hidden" class="form-control" name="id" value="<?php echo $row_msg_cont['id']?>">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome Completo: </label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row_msg_cont['nome'];?>" required>
                </div>
            </div>
        
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="data_nasc">Data de Nascimento: </label>
                    <input type="text" class="form-control" id="data_nasc" style="min-width:100%;" name="data_nasc" value="<?php echo $row_msg_cont['data_nasc'];?>" required>
                </div>
            
            
            <?php 
                            $compare = $row_msg_cont['sexo'];
                            
                            $var = "SELECT descricao FROM clientes_sexo WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
                            
                <div class="form-group col-md-3">
                    <label for="sexo">Sexo: </label>
                    <select id="sexo" class="col-md-12" name="sexo">
                        <option value="<?php echo $row_msg_cont['sexo'];?>"><?php echo $row_var['descricao'];?></option>
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                    </select>
                </div>
                
                <?php 
                            $compare = $row_msg_cont['estadocivil'];
                            
                            $var = "SELECT descricao FROM clientes_estadocivil WHERE id=$compare";
                            $resultado_var = $conn->prepare($var);
                            $resultado_var->execute();
                            if($row_var = $resultado_var->fetch(PDO::FETCH_ASSOC)){
                                
                            }?>
            
                <div class="form-group col-md-3">
                    <label for="estadocivil">Estado Civil: </label>
                    <select id="estadocivil" class="col-md-12" name="estadocivil">
                    <option value="<?php echo $row_msg_cont['estadocivil'];?>"><?php echo $row_var['descricao'];?></option>
                    <option value="1">Solteiro(a)</option>
                    <option value="2">Casado(a)</option>
                    <option value="3">Divorciado(a)</option>
                    <option value="4">Separado(a)</option>
                    <option value="5">Viúvo(a)</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Resp. Pagamento: </label>
                    <input type="text" name="pagamento" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['pagamento'];?>" required>
                </div>
            </div>
                 
            <div class="form-row">
                <div class="form-group col-md-6" style="min-width:100%;">
                <label>Ocupação: </label>
                <input type="text" name="ocupacao" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['ocupacao'];?>">
            </div>
            
            <div class="form-group col-md-3">
                <label>CPF: </label>
            <input type="text" style="min-width:100%;" class="form-control" id="cpf" name="cpf" value="<?php echo $row_msg_cont['cpf'];?>" required>
            </div>
            
            <div class="form-group col-md-3">
                <label>RG: </label>
                <input type="text" style="min-width:100%;" class="form-control" id="rg" name="rg" value="<?php echo $row_msg_cont['rg'];?>" required>
            </div>
            </div>   
            
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome do pai: </label>
                    <input type="text" name="nome_pai" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['nome_pai'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Atividade: </label>
                    <input type="text" name="atividade_pai" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['atividade_pai'];?>">
                </div>
            </div>
            

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome da mãe: </label>
                    <input type="text" name="nome_mae" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['nome_mae'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Atividade: </label>
                    <input type="text" name="atividade_mae" style="min-width:100%;" class="form-control" value="<?php echo $row_msg_cont['atividade_mae'];?>">
                </div>
            </div>
            
            <p>Endereço Residencial:</p>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>CEP: </label>
                    <input type="text" style="min-width:100%;"class="form-control" id="cep_res" name="cep_res" value="<?php echo $row_msg_cont['cep_res'];?>" onblur="pesquisacepres(this.value);" required>
                </div>
                <div class="form-group col-md-5">
                    <label>Rua: </label>
                    <input type="text" name="rua_res" id="rua_res" value="<?php echo $row_msg_cont['rua_res'];?>" style="min-width:100%;" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Bairro: </label>
                    <input type="text" name="bairro_res" id="bairro_res" value="<?php echo $row_msg_cont['bairro_res'];?>" style="min-width:100%;" class="form-control" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Número: </label>
                    <input type="text" value="<?php echo $row_msg_cont['numero_res'];?>" style="min-width:100%;"class="form-control" id="numero_res" name="numero_res" required>
                </div>
                
                <div class="form-group col-md-3">
                    <label>Cidade: </label>
                    <input type="text" name="cidade_res" id="cidade_res" value="<?php echo $row_msg_cont['cidade_res'];?>" style="min-width:100%;" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                    <label>UF: </label>
                    <input type="text" style="min-width:100%;"class="form-control" value="<?php echo $row_msg_cont['uf_res'];?>" id="uf_res" name="uf_res" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>E-mail: </label>
                    <input type="text" style="min-width:100%;"class="form-control" id="email" name="email" value="<?php echo $row_msg_cont['email'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Telefone/Celular: </label>
                    <input type="text" style="min-width:100%;" class="form-control" id="telefone" name="telefone" value="<?php echo $row_msg_cont['telefone'];?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label>Telefone/Celular 2: </label>
                <input type="text" style="min-width:100%;" class="form-control" id="telefone2" name="telefone2" value="<?php echo $row_msg_cont['telefone2'];?>">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="indicacao">Indicação: </label>
                    <input type="text" id="indicacao" style="min-width:100%;" class="form-control" name="indicacao" value="<?php echo $row_msg_cont['indicacao'];?>">
                </div>
            </div>

            <div class="text-center">
                
            <hr>
                <div class="form-group col-md-2">
                    <label for="interesse">Data da Consulta: </label>
                    <input type="text" class="form-control" id="data_consulta" name="data_consulta" value="<?php echo $row_msg_cont['data_consulta'];?>" >
                </div>
                <h3>ANAMNESE</h3>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="interesse">Interesse pelo tratamento: </label>
                    <input type="text" class="form-control" id="interesse" name="interesse" value="<?php echo $row_msg_cont['interesse'];?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ed_escolar">Educação escolar: </label>
                    <input type="text" class="form-control" id="ed_escolar" name="ed_escolar" value="<?php echo $row_msg_cont['ed_escolar'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="grau_resp">Grau de responsabilidade nos estudos: </label>
                    <input type="text" class="form-control" id="grau_resp" name="grau_resp" value="<?php echo $row_msg_cont['grau_resp'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="at_mental">Atitude mental na entrevista: </label>
                    <input type="text" class="form-control" id="at_mental" name="at_mental" value="<?php echo $row_msg_cont['at_mental'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="habitos">Hábitos: </label>
                    <input type="text" class="form-control" id="habitos" name="habitos" value="<?php echo $row_msg_cont['habitos'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="hereditariedade">Hereditariedade: </label>
                    <input type="text" class="form-control" id="hereditariedade" name="hereditariedade" value="<?php echo $row_msg_cont['alergia'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="alergia">Alergia: </label>
                    <input type="text" class="form-control" id="alergia" name="alergia" value="<?php echo $row_msg_cont['hereditariedade'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="trat_med">Tratamento Médico: </label>
                    <input type="text" class="form-control" id="trat_med" name="trat_med" value="<?php echo $row_msg_cont['trat_med'];?>">
                </div>
            </div>
            <div class="text-center">
                <br><hr><br>
                <h3>ANÁLISE LOCAL</h3>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="respiracao">Respiração: </label>
                    <input type="text" class="form-control" id="respiracao" name="respiracao" value="<?php echo $row_msg_cont['respiracao'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="labial">Perfil labial: </label>
                    <input type="text" class="form-control" id="labial" name="labial" value="<?php echo $row_msg_cont['labial'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="diccao">Dicção: </label>
                    <input type="text" class="form-control" id="diccao" name="diccao" value="<?php echo $row_msg_cont['diccao'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="tonsilas">Tonsilas: </label>
                    <input type="text" class="form-control" id="tonsilas" name="tonsilas" value="<?php echo $row_msg_cont['tonsilas'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="degluticao">Deglutição: </label>
                    <input type="text" class="form-control" id="degluticao" name="degluticao" value="<?php echo $row_msg_cont['degluticao'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="adenoides">Adenoides: </label>
                    <input type="text" class="form-control" id="adenoides" name="adenoides" value="<?php echo $row_msg_cont['adenoides'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="higiene_oral">Higiene oral: </label>
                    <input type="text" class="form-control" id="higiene_oral" name="higiene_oral" value="<?php echo $row_msg_cont['higiene_oral'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="traumatismo">Traumatismo: </label>
                    <input type="text" class="form-control" id="traumatismo" name="traumatismo" value="<?php echo $row_msg_cont['trausmatismo'];?>">
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
                    <input type="text" class="form-control" id="agenesias" name="agenesias" value="<?php echo $row_msg_cont['agenesias'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="extranumerarios">Extranumerários: </label>
                    <input type="text" class="form-control" id="extranumerarios" name="extranumerarios" value="<?php echo $row_msg_cont['extranumerarios'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="extraidos">Extraídos: </label>
                    <input type="text" class="form-control" id="extraidos" name="extraidos" value="<?php echo $row_msg_cont['extraidos'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inclusos">Inclusos: </label>
                    <input type="text" class="form-control" id="inclusos" name="inclusos" value="<?php echo $row_msg_cont['inclusos'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fraturas">Fraturas: </label>
                    <input type="text" class="form-control" id="fraturas" name="fraturas" value="<?php echo $row_msg_cont['fraturas'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="desgastes">Desgastes: </label>
                    <input type="text" class="form-control" id="desgastes" name="desgastes" value="<?php echo $row_msg_cont['desgastes'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="arcos">Relação entre arcos: </label>
                    <input type="text" class="form-control" id="arcos" name="arcos" value="<?php echo $row_msg_cont['arcos'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="mediana">Linha mediana: </label>
                    <input type="text" class="form-control" id="mediana" name="mediana" value="<?php echo $row_msg_cont['mediana'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="sobremordida">Sobremordida: </label>
                    <input type="text" class="form-control" id="sobremordida" name="sobremordida" value="<?php echo $row_msg_cont['sobremordida'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="sobressaliencia">Sobressaliência: </label>
                    <input type="text" class="form-control" id="sobressaliencia" name="sobressaliencia" value="<?php echo $row_msg_cont['sobressaliencia'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="curva_spee">Curva de spee: </label>
                    <input type="text" class="form-control" id="curva_spee" name="curva_spee" value="<?php echo $row_msg_cont['curva_spee'];?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="dentistica">Dentistica: </label>
                    <input type="text" class="form-control" id="dentistica" name="dentistica" value="<?php echo $row_msg_cont['dentistica'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="atm">A.T.M: </label>
                    <input type="text" class="form-control" id="atm" name="atm" value="<?php echo $row_msg_cont['atm'];?>">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="observacao">Observações: </label>
                    <input type="text" class="form-control" id="observacao" name="observacao" value="<?php echo $row_msg_cont['observacao'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="queixa">Queixa principal: </label>
                    <input type="text" class="form-control" id="queixa" name="queixa" value="<?php echo $row_msg_cont['queixa'];?>">
                </div>
            </div>
            <div class="text-center">
                <input name="SendEditCad" type="submit" value="Alterar" class="btn btn-outline-success">
            </div>
            <?php
            }else{
                echo "Paciente não encontrado!";
            }
        ?>
        </form>
    </body>
    
    <script>
    
    function limpa_formulário_cepres() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua_res').value=("");
            document.getElementById('bairro_res').value=("");
            document.getElementById('cidade_res').value=("");
            document.getElementById('uf_res').value=("");
           
    }

    function meu_callbackres(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua_res').value=(conteudo.logradouro);
            document.getElementById('bairro_res').value=(conteudo.bairro);
            document.getElementById('cidade_res').value=(conteudo.localidade);
            document.getElementById('uf_res').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacepres(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua_res').value="...";
                document.getElementById('bairro_res').value="...";
                document.getElementById('cidade_res').value="...";
                document.getElementById('uf_res').value="...";

                //Cria um elemento javascript.
                var script1 = document.createElement('script');

                //Sincroniza com o callback.
                script1.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callbackres';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script1);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cepres();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cepres();
        }
    };
    
    </script>
</html>