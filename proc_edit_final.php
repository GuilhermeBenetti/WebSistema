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
    
     $data_consulta = filter_input(INPUT_POST, 'data_consulta', FILTER_SANITIZE_STRING);
    $interesse = filter_input(INPUT_POST, 'interesse', FILTER_SANITIZE_STRING);
    $ed_escolar = filter_input(INPUT_POST, 'ed_escolar', FILTER_SANITIZE_STRING);
    $grau_resp = filter_input(INPUT_POST, 'grau_resp', FILTER_SANITIZE_STRING);
    $at_mental = filter_input(INPUT_POST, 'at_mental', FILTER_SANITIZE_STRING);
    $habitos = filter_input(INPUT_POST, 'habitos', FILTER_SANITIZE_STRING);
    $hereditariedade = filter_input(INPUT_POST, 'hereditariedade', FILTER_SANITIZE_STRING);
    $alergia = filter_input(INPUT_POST, 'alergia', FILTER_SANITIZE_STRING);
    $trat_med = filter_input(INPUT_POST, 'trat_med', FILTER_SANITIZE_STRING);
    $respiracao = filter_input(INPUT_POST, 'respiracao', FILTER_SANITIZE_STRING);
    $labial = filter_input(INPUT_POST, 'labial', FILTER_SANITIZE_STRING);
    $diccao = filter_input(INPUT_POST, 'diccao', FILTER_SANITIZE_STRING);
    $tonsilas = filter_input(INPUT_POST, 'tonsilas', FILTER_SANITIZE_STRING);
    $degluticao = filter_input(INPUT_POST, 'degluticao', FILTER_SANITIZE_STRING);
    $adenoides = filter_input(INPUT_POST, 'adenoides', FILTER_SANITIZE_STRING);
    $higiene_oral = filter_input(INPUT_POST, 'higiene_oral', FILTER_SANITIZE_STRING);
    $traumatismo = filter_input(INPUT_POST, 'traumatismo', FILTER_SANITIZE_STRING);
    $agenesias = filter_input(INPUT_POST, 'agenesias', FILTER_SANITIZE_STRING);
    $extranumerarios = filter_input(INPUT_POST, 'extranumerarios', FILTER_SANITIZE_STRING);
    $extraidos = filter_input(INPUT_POST, 'extraidos', FILTER_SANITIZE_STRING);
    $inclusos = filter_input(INPUT_POST, 'inclusos', FILTER_SANITIZE_STRING);
    $fraturas = filter_input(INPUT_POST, 'fraturas', FILTER_SANITIZE_STRING);
    $desgastes = filter_input(INPUT_POST, 'desgastes', FILTER_SANITIZE_STRING);
    $arcos = filter_input(INPUT_POST, 'arcos', FILTER_SANITIZE_STRING);
    $mediana = filter_input(INPUT_POST, 'mediana', FILTER_SANITIZE_STRING);
    $sobremordida = filter_input(INPUT_POST, 'sobremordida', FILTER_SANITIZE_STRING);
    $sobressaliencia = filter_input(INPUT_POST, 'sobressaliencia', FILTER_SANITIZE_STRING);
    $curva_spee = filter_input(INPUT_POST, 'curva_spee', FILTER_SANITIZE_STRING);
    $dentistica = filter_input(INPUT_POST, 'dentistica', FILTER_SANITIZE_STRING);
    $atm = filter_input(INPUT_POST, 'atm', FILTER_SANITIZE_STRING);
    $observacao = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);
    $queixa = filter_input(INPUT_POST, 'queixa', FILTER_SANITIZE_STRING);

    $result_msg_cadastro = "UPDATE clientes_pricons SET nome=:nome, data_nasc=:data_nasc, sexo=:sexo, estadocivil=:estadocivil, pagamento=:pagamento, ocupacao=:ocupacao, cpf=:cpf, rg=:rg, nome_pai=:nome_pai, atividade_pai=:atividade_pai, nome_mae=:nome_mae, atividade_mae=:atividade_mae, 
    rua_res=:rua_res, cidade_res=:cidade_res, cep_res=:cep_res, uf_res=:uf_res, numero_res=:numero_res, bairro_res=:bairro_res, email=:email, telefone=:telefone, telefone2=:telefone2, indicacao=:indicacao, interesse=:interesse, ed_escolar=:ed_escolar, grau_resp=:grau_resp, at_mental=:at_mental, habitos=:habitos, hereditariedade=:hereditariedade, alergia=:alergia, trat_med=:trat_med, respiracao=:respiracao, labial=:labial, diccao=:diccao, tonsilas=:tonsilas, degluticao=:degluticao, adenoides=:adenoides, higiene_oral=:higiene_oral, traumatismo=:traumatismo, agenesias=:agenesias, extranumerarios=:extranumerarios, extraidos=:extraidos, inclusos=:inclusos, fraturas=:fraturas, desgastes=:desgastes, arcos=:arcos, mediana=:mediana, sobremordida=:sobremordida,  sobressaliencia=:sobressaliencia, curva_spee=:curva_spee,  dentistica=:dentistica, atm=:atm, observacao=:observacao, queixa=:queixa, data_consulta=:data_consulta WHERE id=$id";

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
    $update_msg_cadastro->bindParam(':data_consulta', $data_consulta);
    $update_msg_cadastro->bindParam(':interesse', $interesse);
    $update_msg_cadastro->bindParam(':ed_escolar', $ed_escolar);
    $update_msg_cadastro->bindParam(':grau_resp', $grau_resp);
    $update_msg_cadastro->bindParam(':at_mental', $at_mental);
    $update_msg_cadastro->bindParam(':habitos', $habitos);
    $update_msg_cadastro->bindParam(':hereditariedade', $hereditariedade);
    $update_msg_cadastro->bindParam(':alergia', $alergia);
    $update_msg_cadastro->bindParam(':trat_med', $trat_med);
    $update_msg_cadastro->bindParam(':respiracao', $respiracao);
    $update_msg_cadastro->bindParam(':labial', $labial);
    $update_msg_cadastro->bindParam(':diccao', $diccao);
    $update_msg_cadastro->bindParam(':tonsilas', $tonsilas);
    $update_msg_cadastro->bindParam(':degluticao', $degluticao);
    $update_msg_cadastro->bindParam(':adenoides', $adenoides);
    $update_msg_cadastro->bindParam(':higiene_oral', $higiene_oral);
    $update_msg_cadastro->bindParam(':traumatismo', $traumatismo);
    $update_msg_cadastro->bindParam(':agenesias', $agenesias);
    $update_msg_cadastro->bindParam(':extranumerarios', $extranumerarios);
    $update_msg_cadastro->bindParam(':extraidos', $extraidos);
    $update_msg_cadastro->bindParam(':inclusos', $inclusos);
    $update_msg_cadastro->bindParam(':fraturas', $fraturas);
    $update_msg_cadastro->bindParam(':desgastes', $desgastes);
    $update_msg_cadastro->bindParam(':arcos', $arcos);
    $update_msg_cadastro->bindParam(':mediana', $mediana);
    $update_msg_cadastro->bindParam(':sobremordida', $sobremordida);
    $update_msg_cadastro->bindParam(':sobressaliencia', $sobressaliencia);
    $update_msg_cadastro->bindParam(':curva_spee', $curva_spee);
    $update_msg_cadastro->bindParam(':dentistica', $dentistica);
    $update_msg_cadastro->bindParam(':atm', $atm);
    $update_msg_cadastro->bindParam(':observacao', $observacao);
    $update_msg_cadastro->bindParam(':queixa', $queixa);

    if($update_msg_cadastro->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Cadastro editado com sucesso</p>";
        header("Location: visualizar.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi editado com sucesso</p>";
        header("Location: edita_final.php");
    }

}else{
    $_SESSION['msg'] = "<p style='color:red;'>Cadastro não foi editado com sucesso</p>";
    header("Location: edita-final.php");
}