<?php
session_start();
include_once 'conexao.php';

$SendPriCad = filter_input(INPUT_POST, 'SendPriCad', FILTER_SANITIZE_STRING);
if($SendPriCad){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $data_nasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_NUMBER_INT);
    $estadocivil= filter_input(INPUT_POST, 'estadocivil', FILTER_SANITIZE_NUMBER_INT);
    $pagamento = filter_input(INPUT_POST, 'pagamento', FILTER_SANITIZE_STRING);

    $ocupacao = filter_input(INPUT_POST, 'ocupacao', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);

    $nome_pai = filter_input(INPUT_POST, 'nome_pai', FILTER_SANITIZE_STRING);
    $atividade_pai = filter_input(INPUT_POST, 'atividade_pai', FILTER_SANITIZE_STRING);

    $nome_mae = filter_input(INPUT_POST, 'nome_mae', FILTER_SANITIZE_STRING);
    $atividade_mae = filter_input(INPUT_POST, 'atividade_mae', FILTER_SANITIZE_STRING);
    
    
    $cep_res = filter_input(INPUT_POST, 'cep_res', FILTER_SANITIZE_STRING);
    $rua_res = filter_input(INPUT_POST, 'rua_res', FILTER_SANITIZE_STRING);
    $bairro_res = filter_input(INPUT_POST, 'bairro_res', FILTER_SANITIZE_STRING);
    $cidade_res = filter_input(INPUT_POST, 'cidade_res', FILTER_SANITIZE_STRING);
    $numero_res = filter_input(INPUT_POST, 'numero_res', FILTER_SANITIZE_STRING);
    $uf_res = filter_input(INPUT_POST, 'uf_res', FILTER_SANITIZE_STRING);
    
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $telefone2 = filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_STRING);

    $indicacao = filter_input(INPUT_POST, 'indicacao', FILTER_SANITIZE_STRING);
    

    $result_msg_cadastro = "INSERT INTO clientes_pricons (nome, data_nasc, sexo, estadocivil, pagamento, ocupacao, cpf, rg, nome_pai, atividade_pai, nome_mae, atividade_mae,  cep_res, rua_res, bairro_res,  cidade_res, numero_res, uf_res,  email, telefone, telefone2, indicacao, data_cadastro) VALUES (:nome, :data_nasc,
     :sexo, :estadocivil, :pagamento, :ocupacao, :cpf, :rg, :nome_pai, :atividade_pai, :nome_mae, :atividade_mae, :cep_res, :rua_res, :bairro_res, :cidade_res, :numero_res, :uf_res,
       :email, :telefone, :telefone2, :indicacao, NOW())";

    $insert_msg_cadastro = $conn->prepare($result_msg_cadastro);
    
    $insert_msg_cadastro->bindParam(':nome', $nome);

    $insert_msg_cadastro->bindParam(':data_nasc', $data_nasc);
    $insert_msg_cadastro->bindParam(':sexo', $sexo);
    $insert_msg_cadastro->bindParam(':estadocivil', $estadocivil);
    $insert_msg_cadastro->bindParam(':pagamento', $pagamento);

    $insert_msg_cadastro->bindParam(':ocupacao', $ocupacao);
    $insert_msg_cadastro->bindParam(':cpf', $cpf);
    $insert_msg_cadastro->bindParam(':rg', $rg);

    $insert_msg_cadastro->bindParam(':nome_pai', $nome_pai);
    $insert_msg_cadastro->bindParam(':atividade_pai', $atividade_pai);

    $insert_msg_cadastro->bindParam(':nome_mae', $nome_mae);
    $insert_msg_cadastro->bindParam(':atividade_mae', $atividade_mae);
    
    $insert_msg_cadastro->bindParam(':cep_res', $cep_res);
    $insert_msg_cadastro->bindParam(':rua_res', $rua_res);
    $insert_msg_cadastro->bindParam(':bairro_res', $bairro_res);
    $insert_msg_cadastro->bindParam(':cidade_res', $cidade_res);
    $insert_msg_cadastro->bindParam(':numero_res', $numero_res);
    $insert_msg_cadastro->bindParam(':uf_res', $uf_res);
    
    $insert_msg_cadastro->bindParam(':email', $email);

    $insert_msg_cadastro->bindParam(':telefone', $telefone);
    $insert_msg_cadastro->bindParam(':telefone2', $telefone2);

    $insert_msg_cadastro->bindParam(':indicacao', $indicacao);
    
    if($insert_msg_cadastro->execute()){
        $_SESSION['msg'] =  "<p style='color:green;'>Mensagem enviada com sucesso</p>";
        header("Location: primeira-consulta.php");
    }else{
        $_SESSION['msg'] =  "<p style='color:red;'>Mensagem não foi enviada com sucesso</p>";
        header("Location: primeira-consulta.php");
    }

}else{
    $_SESSION['msg'] =  "<p style='color:red;'>Mensagem não foi enviada com sucesso1111</p>";
    header("Location: primeira-consulta.php");
}


