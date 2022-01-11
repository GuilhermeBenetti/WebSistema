<?php
session_start();
include_once '../../conexao.php';

$SendPriCad = filter_input(INPUT_POST, 'SendFimCad', FILTER_SANITIZE_STRING);
if($SendPriCad){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);

    

    $result_msg_cont = "UPDATE clientes_pricons SET interesse=:interesse, ed_escolar=:ed_escolar, grau_resp=:grau_resp, at_mental=:at_mental, habitos=:habitos, hereditariedade=:hereditariedade, alergia=:alergia, trat_med=:trat_med, respiracao=:respiracao, labial=:labial, diccao=:diccao, tonsilas=:tonsilas, degluticao=:degluticao, adenoides=:adenoides, higiene_oral=:higiene_oral, traumatismo=:traumatismo, agenesias=:agenesias, extranumerarios=:extranumerarios, extraidos=:extraidos, inclusos=:inclusos, fraturas=:fraturas, desgastes=:desgastes, arcos=:arcos, mediana=:mediana, sobremordida=:sobremordida,  sobressaliencia=:sobressaliencia, curva_spee=:curva_spee,  dentistica=:dentistica, atm=:atm, observacao=:observacao, queixa=:queixa, data_consulta=:data_consulta, status=:status WHERE id=$id";

    $update_msg_cont = $conn->prepare($result_msg_cont);


    $update_msg_cont->bindParam(':data_consulta', $data_consulta);
    $update_msg_cont->bindParam(':interesse', $interesse);
    $update_msg_cont->bindParam(':ed_escolar', $ed_escolar);
    $update_msg_cont->bindParam(':grau_resp', $grau_resp);
    $update_msg_cont->bindParam(':at_mental', $at_mental);
    $update_msg_cont->bindParam(':habitos', $habitos);
    $update_msg_cont->bindParam(':hereditariedade', $hereditariedade);
    $update_msg_cont->bindParam(':alergia', $alergia);
    $update_msg_cont->bindParam(':trat_med', $trat_med);
    $update_msg_cont->bindParam(':respiracao', $respiracao);
    $update_msg_cont->bindParam(':labial', $labial);
    $update_msg_cont->bindParam(':diccao', $diccao);
    $update_msg_cont->bindParam(':tonsilas', $tonsilas);
    $update_msg_cont->bindParam(':degluticao', $degluticao);
    $update_msg_cont->bindParam(':adenoides', $adenoides);
    $update_msg_cont->bindParam(':higiene_oral', $higiene_oral);
    $update_msg_cont->bindParam(':traumatismo', $traumatismo);
    $update_msg_cont->bindParam(':agenesias', $agenesias);
    $update_msg_cont->bindParam(':extranumerarios', $extranumerarios);
    $update_msg_cont->bindParam(':extraidos', $extraidos);
    $update_msg_cont->bindParam(':inclusos', $inclusos);
    $update_msg_cont->bindParam(':fraturas', $fraturas);
    $update_msg_cont->bindParam(':desgastes', $desgastes);
    $update_msg_cont->bindParam(':arcos', $arcos);
    $update_msg_cont->bindParam(':mediana', $mediana);
    $update_msg_cont->bindParam(':sobremordida', $sobremordida);
    $update_msg_cont->bindParam(':sobressaliencia', $sobressaliencia);
    $update_msg_cont->bindParam(':curva_spee', $curva_spee);
    $update_msg_cont->bindParam(':dentistica', $dentistica);
    $update_msg_cont->bindParam(':atm', $atm);
    $update_msg_cont->bindParam(':observacao', $observacao);
    $update_msg_cont->bindParam(':queixa', $queixa);
    $update_msg_cont->bindParam(':status', $status);

    if($update_msg_cont->execute()){
        $_SESSION['msg'] = $id;
        header("Location: visualizar-cadastro.php");
    }else{
        $_SESSION['msg'] =  "<p style='color:red;'>Mensagem não foi enviada com sucesso</p>";
        header("Location: admin.php");
    }

}else{
    $_SESSION['msg'] =  "<p style='color:red;'>Mensagem não foi enviada com sucesso $id </p>";
    header("Location: admin.php");
}

?>