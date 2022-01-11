<?php
session_start();
include_once '../../conexao.php';

$SendPriCad = filter_input(INPUT_POST, 'SendEditCad', FILTER_SANITIZE_STRING);
if($SendPriCad){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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

    $result_msg_cadastro = "UPDATE clientes_pricons SET nome=:nome, data_nasc=:data_nasc, sexo=:sexo, estadocivil=:estadocivil, pagamento=:pagamento, ocupacao=:ocupacao, cpf=:cpf, rg=:rg, nome_pai=:nome_pai, atividade_pai=:atividade_pai, nome_mae=:nome_mae, atividade_mae=:atividade_mae, 
    rua_res=:rua_res, cidade_res=:cidade_res, cep_res=:cep_res, uf_res=:uf_res, numero_res=:numero_res, bairro_res=:bairro_res, email=:email, telefone=:telefone, telefone2=:telefone2, indicacao=:indicacao WHERE id=$id";

    $update_msg_cadastro = $conn->prepare($result_msg_cadastro);
    
    $update_msg_cadastro->bindParam(':nome', $nome);

    $update_msg_cadastro->bindParam(':data_nasc', $data_nasc);
    $update_msg_cadastro->bindParam(':sexo', $sexo);
    $update_msg_cadastro->bindParam(':estadocivil', $estadocivil);
    $update_msg_cadastro->bindParam(':pagamento', $pagamento);

    $update_msg_cadastro->bindParam(':ocupacao', $ocupacao);
    $update_msg_cadastro->bindParam(':cpf', $cpf);
    $update_msg_cadastro->bindParam(':rg', $rg);

    $update_msg_cadastro->bindParam(':nome_pai', $nome_pai);
    $update_msg_cadastro->bindParam(':atividade_pai', $atividade_pai);

    $update_msg_cadastro->bindParam(':nome_mae', $nome_mae);
    $update_msg_cadastro->bindParam(':atividade_mae', $atividade_mae);

    $update_msg_cadastro->bindParam(':cep_res', $cep_res);
    $update_msg_cadastro->bindParam(':rua_res', $rua_res);
    $update_msg_cadastro->bindParam(':bairro_res', $bairro_res);
    $update_msg_cadastro->bindParam(':cidade_res', $cidade_res);
    $update_msg_cadastro->bindParam(':numero_res', $numero_res);
    $update_msg_cadastro->bindParam(':uf_res', $uf_res);
    
    $update_msg_cadastro->bindParam(':email', $email);

    $update_msg_cadastro->bindParam(':telefone', $telefone);
    $update_msg_cadastro->bindParam(':telefone2', $telefone2);

    $update_msg_cadastro->bindParam(':indicacao', $indicacao);

    if($update_msg_cadastro->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Cadastro editado com sucesso</p>";
        header("Location: admin.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi editado com sucesso</p>";
        header("Location: edita-cadastro.php");
    }

}else{
    $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi editado com sucesso</p>";
    header("Location: edita-cadastro.php");
}


