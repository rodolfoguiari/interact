<?php
function DtAtual() {
    return date('Y-m-d');
}

function DtAtualNormal() {
    return date('d-m-Y');
}

function HrAtual() {
    return date('H:i:s');
}

function HrAtualSemSegundo() {
    return date('H:i');
}

function removeAcentosBoby($string) {

    $string = strtoupper($string);

    //LetrasRemocao são as letras com acentos que queremos achar.
    //LetrasInserid são as letras que iremos trocar. Elas tem que estar na mesma posição do array de cima.
    $letrasRemocao = array('Á', 'á', 'Â', 'â', 'À', 'à', 'Ã', 'ã', 'É', 'é', 'Ê', 'ê', 'Í', 'í', 'Ó', 'ó', 'Ô', 'ô', 'Õ', 'õ', 'Ú', 'ú', 'Ç', 'ç', '&');
    $letrasInserid = array('A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'C', 'C', 'E');

    //Removemos todos os espaços da string.
    $a = str_split(str_replace(" ", "", $string));

    //Pegamos somente as letras acentuadas da string.
    $acentuadas = '';
    $regExp = "[áàâãäªÁÀÂÃÄéèêëÉÈÊËíìîïÍÌÎÏóòôõöºÓÒÔÕÖúùûüÚÙÛÜçÇÑñ.]";
    for ($i = 0; $i < count($a); ++$i) {
        if (ereg($regExp, $a[$i])) {
            $acentuadas = $acentuadas . $a[$i];
        }
    }

    //Transformamos em array para acessar cada letra acentuada e fazer os tratamentos.
    $a = str_split($acentuadas);
    $count = count($a) / 2;
    $aux = 0;
    $altera = '';
    for ($i = 1; $i <= $count; ++$i) {

        //Depois de capturar a letra com acento procuramos qual a letra alternativa sem acento dela no LetrasInserid.
        $key = array_search($a[$aux] . $a[$aux + 1], $letrasRemocao);
        $acento = $a[$aux] . $a[$aux + 1];

        //Por fim, procuramos na string a letra com acento e fazemos a substituição.
        $string = str_replace($acento, $letrasInserid[$key], $string);

        $aux = $aux + 2;
    }

    return strtoupper(strtolower($string));
}

function enviaEmail($nomeRemetente, $emailRemetente, $nomeDestinatario, $emailDestinatario, $charset, $assunto, $mensagem, $tipoRetorno = 'alert', $anexo = '', $redireciona = '#', $msgSucesso = 'EMAIL ENVIADO COM SUCESSO!', $msgErro = 'FALHA AO ENVIAR O EMAIL. TENTE NOVAMENTE!'){

    include_once('../phpmailer/class.phpmailer.php');

    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    // Define o remetente
    $mail->From = $emailRemetente;
    $mail->FromName = $nomeRemetente;

    // Define os destinatário(s)
    $mail->AddAddress($emailDestinatario, $nomeDestinatario);

    // Define os dados técnicos da Mensagem
    $mail->IsHTML(true);
    $mail->CharSet = $charset;

    // Define a mensagem (Texto e Assunto)
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    //Anexo do email
    if(isset($anexo) && !empty($anexo) && $anexo == true){
        foreach ($anexo as $arq) {
            $mail->AddAttachment($arq);
        }
    }

    // Envia o e-mail
    $enviar = $mail->Send();

    // Limpa os destinatários
    $mail->ClearAllRecipients();

    // Exibe uma mensagem de resultado
    if ($enviar) {
        if ($tipoRetorno == 'alert') {
            $result = '<script type="text/javascript">alert(\'' . $msgSucesso . '\');window.location = \'' . $redireciona . '\';</script>';
        } else {
            $result = $msgSucesso;
        }
    } else {
        if ($tipoRetorno == 'alert') {
            $result = '<script type="text/javascript">alert(\'' . $msgErro . '\');window.location = \'' . $redireciona . '\';</script>';
        } else {
            $result = $msgErro;
        }
    }

    return $result;
}
?>