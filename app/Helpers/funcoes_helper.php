<?php

if (!function_exists('getDataAtual')) {
    /**
     * Retorna a Data atual no formato 2021-02-19 11:55:19
     * @return date
     */
    function getDataAtual()
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('mDebug')) {
    /**
     * Metódo para debug de código.
     */
    function mDebug($valor, $arquivo = FALSE)
    {
        if ($arquivo) {
            $ci = &get_instance();
            $t  = $ci->db->last_query();
            log_message('error', $t);
        } else {
            echo "<pre>";
            print_r($valor);
            echo "</pre>";
            die();
        }
    }
}

if (!function_exists('retornaMes')) {
    /**
     * Retorna os tres primeiros caracteres do mês em extenso.
     * Exemplo de Retorno da Funçao: *JAN*
     * @param string $indice   Deve ser passado o indice do mês que deseja converter para extenso ex: 02
     * @return string
     *
     */
    function retornaMes($indice, $parte = TRUE)
    {
        $indice = str_pad($indice, 2, '0', STR_PAD_LEFT);

        if ($indice > 12) {
            return '';
        }
        // $mes = array("01" => "Janeiro", "02" => "Fevereiro", "03" => "Março", "04" => "Abril", "05" => "Maio", "06" => "Junho", "07" => "Julho", "08" => "Agosto", "09" => "Setembro", "10" => "Outubro", "11" => "Novembro", "12" => "Dezembro");
        $mes = dataMes();
        return (!$parte) ? $mes[$indice] : substr($mes[$indice], 0, 3);
    }
}

if (!function_exists('exibirDataAnoComDoisDigitos')) {
    /**
     * Retorna data com ano em dois digitos.
     * Exemplo de Retorno da Funcão:  *12/02/20*.
     * @param string $data  Deve ser passado a data para conversão do ano.
     * @return string
     */
    function exibirDataAnoComDoisDigitos($data)
    {
        $Ano =  (preg_match('/\//', $data)) ? explode('/', $data) :  explode('-', $data);
        if (strlen($Ano[0]) == 4) {
            $Ano[0] = substr($Ano[0], 2, 2);
            return implode('/', $Ano);
        } else {
            $Ano[2] = substr($Ano[2], 2, 2);
            return implode('/', $Ano);
        }
    }
}

if (!function_exists('converteData')) {
    /**
     * Converte data do padrao americano para o brasileiro e do brasileiro para o americano.
     * Exemplo de Retorno da Funcão: Se a data passada for nesse padrao: 2021-01-01 o retorno será 01/01/2021.
     * @param string $data  Deve ser passado a data para conversão da data.
     * @param string $mesExtenso  Serve pra informar se a data ira retornar com mês em extenso ou não.
     * @param string $anoDoisDigitos Serve pra informar se a data ira retornar com ano com dois digitos ou com quatro digitos.
     */
    function converteData($data, $mesExtenso = FALSE, $anoDoisDigitos = FALSE)
    {
        if (strlen($data) > 11) {
            $d = substr($data, 0, 10);
            $h = substr($data, 10);
            $dataFinal = (preg_match('/\//', $d)) ? implode('-', array_reverse(explode('/', $d))) : implode('/', array_reverse(explode('-', $d))) . ' ' . $h;

            return $anoDoisDigitos ? exibirDataAnoComDoisDigitos($dataFinal) : $dataFinal;
        } else if (!empty($data)) {
            if ($mesExtenso) {
                $v    = explode('-', $data);
                $v[1] = retornaMes($v[1]);
                $data = implode('-', $v);
            }
            $dataFinal = (preg_match('/\//', $data)) ? implode('-', array_reverse(explode('/', $data))) : implode('/', array_reverse(explode('-', $data)));

            return $anoDoisDigitos ? exibirDataAnoComDoisDigitos($dataFinal) : $dataFinal;
        } else {
            return FALSE;
        }
    }
}

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    /**
     * Verifica se a data é valida.
     * @param date $dt  Recebe uma data  para fazer validação.
     * @param $format Recebe um formato que deseja validar a data. Sendo o formato default = "Y-m-d H:i:s".
     *
     */
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}



if (!function_exists('validaData')) {
    /**
     * Verifica se a data é valida padrão nacional;
     * @param date $dt  Recebe uma data  para fazer validação.
     */
    function validaData($dt)
    {
        if (empty($dt)) {
            return false;
        }

        $v = explode('/', $dt);
        $d = $v[0];
        $m = $v[1];
        $y = $v[2];
        return checkdate($m, $d, $y);
    }
}

if (!function_exists('ultimoDiaMes')) {
    /**
     * Retorna o ultimo dia do mes conforme o ano e mês passado.
     * Se nao for passado o mes será retornado o ultimo dia  do mês atual, se não for passado o ano será retornado conforme o ano atual.
     * Exemplo de Retorno da Funcão: 31
     * @param string $mes
     * @param string $ano
     * @return string
     */
    function ultimoDiaMes($mes = FALSE, $ano = FALSE)
    {
        if (!$mes) {
            $mes = date('m');
        }
        $ano = !$ano ? date('Y') : $ano;
        return date("t", mktime(0, 0, 0, $mes, '01', $ano));
    }
}

if (!function_exists('dataInicial')) {
    /**
     * Retorna data com o primeiro dia do mês e ano atual.
     * A data será retornada no padrão americano sempre pegando o ano atual mês atual e o primeiro dia do mês.
     * Exemplo de Retorno da Funcão: 2020-02-01
     * @return date
     */
    function dataInicial()
    {
        return date('Y-m-') . '01';
    }
}

if (!function_exists('dataFinal')) {
    /**
     * Retorna data com o ultimo dia do mês e ano atual.
     * A data será retornada no padrão americano sempre pegando o ano atual mês atual e o ultimo dia do mês.
     * Exemplo de Retorno da Funcão: 2020-01-31
     * @return date
     */
    function dataFinal()
    {
        return date('Y-m-') . ultimoDiaMes(date('m'));
    }
}

if (!function_exists('getColor')) {
    function getColor($num)
    {
        $hash = md5('color' . $num);
        return array(
            hexdec(substr($hash, 0, 2)),  //r
            hexdec(substr($hash, 2, 2)),  //g
            hexdec(substr($hash, 4, 2))
        ); //b
    }
}

if (!function_exists('random_color')) {
    /**
     * Retorna um hexadecimal de uma cor aleatoria.
     * Exemplo de Retorno da Funcão: #C97894.
     * @return date
     */
    function random_color()
    {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $index  = rand(0, 15);
            $color .= $letters[$index];
        }
        return $color;
    }
}

if (!function_exists('clienteLogado')) {
    /**
     * Verifica se a sessão do usuário existe
     * @param boolean $redirecionaLogin
     */
    function clienteLogado($redirecionaLogin = TRUE)
    {
        $ci     = &get_instance();
        $metodo = $ci->router->fetch_class();

        if (isset($_SESSION['id']) /*&& $_SESSION['dono_sessao'] == md5(getDonoSessao())*/) {
            // mDebug($_SESSION);
            if (isset($_SESSION['ativo']) && $_SESSION['ativo'] == 'N') {
                redirect('login/define-empresa/' . geraCripto($_SESSION['id_empresa']));
                return FALSE;
            }
            if (isset($_SESSION['cadastro_completo']) && $_SESSION['cadastro_completo'] == 'N') {
                $ci->session->set_flashdata('msg', 'Seu cadastro ainda não está completo!');
                redirect('login/cadastro_final');
                return FALSE;
            }
            if (isset($_SESSION['confere_pagamento']) && $_SESSION['confere_pagamento'] == 'N') {
                $ci->session->set_flashdata('msg', 'Seu pagamento ainda não consta em nosso sistema!');
                redirect('login');
                return FALSE;
            }
            return TRUE;
        } elseif ($metodo == 'logar') {
            return TRUE;
        } else {
            if ($redirecionaLogin) {
                // $ci->session->set_flashdata('msg', 'Sua sessão expirou!');
                setFlashdata("Sua sessão expirou!", "warning");
                redirect('login');
            }
            return FALSE;
        }
    }
}

if (!function_exists('getDonoSessao')) {
    function getDonoSessao()
    {
        return $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'];
    }
}

if (!function_exists('geraCripto')) {
    /**
     * Gera a Criptografia de qualquer tipo de caracter.
     * @return string
     */
    function geraCripto($texto)
    {
        $encrypter = \Config\Services::encrypter();
        $item = $encrypter->encrypt(SALT . $texto);
        if ($texto) {
            return strtr($item, array('+' => '.', '=' => '-', '/' => '~'));
        } else {
            return '';
        }
    }
}

if (!function_exists('recuperaCripto')) {
    /**
     * Descriptografa caracteres que foram criptogrados com a funcao geraCripto.
     * @return string
     */
    function recuperaCripto($texto)
    {
        $ci    = &get_instance();
        $item  = strtr($texto, array('.' => '+', '-' => '=', '~' => '/'));
        return strtr($ci->encryption->decrypt($item), array(SALT => ''));
    }
}

if (!function_exists('dinheiroBanco')) {
    /**
     * Substitui a notação de ponto de um valor(dinheiro) para virgula.
     * Exemplo de Retorno da Funcão: 23,00.
     * @param $valor  Exemplo de valor a ser passado: 23.00.
     * @return string
     */
    function dinheiroBanco($valor)
    {
        $valor  = strtr($valor, array('.' => ''));
        $valor  = strtr($valor, array(',' => '.'));
        return $valor;
    }
}

if (!function_exists('dinheiro')) {
    /**
     * Formata valor em valor Monetário.
     * Exemplo de Retorno da Funcão: 23.000,00.
     * @param $valor Exemplo de valor a ser passado: 23000.
     * @return string
     */
    function dinheiro($valor)
    {
        return number_format($valor, 2, ',', '.');
    }
}

if (!function_exists('fundo')) {
    /**
     * Retorna a imagem de fundo aleatoria
     * @return string
     */
    function fundo()
    {
        $b = ['background_1', 'background_2', 'background_3', 'background_4', 'background_5'];
        return $b[array_rand($b, 1)];
    }
}

if (!function_exists('comboUF')) {
    /**
     * Retorna  select  com todos os Estados Brasileiros.
     * @param $uf Parametro que informa qual o estado  será selecionado.
     * @param $obrigatorio
     * @param $sigla
     * @return html
     */
    function comboUF($uf = '', $obrigatorio = FALSE, $sigla = FALSE)
    {
        $mes["AC"] = "Acre";
        $mes["AL"] = "Alagoas";
        $mes["AM"] = "Amazonas";
        $mes["AP"] = "Amapá";
        $mes["BA"] = "Bahia";
        $mes["CE"] = "Ceará";
        $mes["DF"] = "Distrito Federal";
        $mes["ES"] = "Espírito Santo";
        $mes["GO"] = "Goiás";
        $mes["MA"] = "Maranhão";
        $mes["MG"] = "Minas Gerais";
        $mes["MS"] = "Mato Grosso do Sul";
        $mes["MT"] = "Mato Grosso";
        $mes["PA"] = "Pará";
        $mes["PB"] = "Paraíba";
        $mes["PE"] = "Pernambuco";
        $mes["PI"] = "Piauí";
        $mes["PR"] = "Paraná";
        $mes["RJ"] = "Rio de Janeiro";
        $mes["RN"] = "Rio Grande do Norte";
        $mes["RO"] = "Rondônia";
        $mes["RR"] = "Roraima";
        $mes["RS"] = "Rio Grande do Sul";
        $mes["SC"] = "Santa Catarina";
        $mes["SE"] = "Sergipe";
        $mes["SP"] = "São Paulo";
        $mes["TO"] = "Tocantins";
        $mes["EX"] = "Fora do Brasil";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($mes as $item => $valor) {
            $exibe = $sigla ? $item : $valor;
            if ($item == $uf) {
                $combo .= '<option value="' . $item . '" selected>' . $exibe  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $exibe  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('comboEstadoCivil')) {
    /**
     * Retorna select  com opçoes de Estado Civil.
     * @param $politica Parametro que informa qual Estado Civil  será selecionado.
     * @param $obrigatorio
     * @return html
     */

    function comboEstadoCivil($valor = '', $obrigatorio = FALSE)
    {
        $v["C"] = "Casado(a)";
        $v["S"] = "Solteiro(a)";
        $v["V"] = "Viúvo(a)";
        $v["D"] = "Separado(a) / Divorciado(a)";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($v as $item => $dado) {
            if ($item == $valor) {
                $combo .= '<option value="' . $item . '" selected>' . $dado  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $dado  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('comboSexo')) {
    /**
     * Retorna select  com as opçoes de Sexo do Usuário: Masculino e Feminino.
     * @param $valor Parametro que informa qual o Sexo do Usuário será selecionado.
     * @param $obrigatorio
     * @return html
     */
    function comboSexo($valor = '', $obrigatorio = FALSE)
    {
        $v["M"] = "Masculino";
        $v["F"] = "Feminino";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($v as $item => $dado) {
            if ($item == $valor) {
                $combo .= '<option value="' . $item . '" selected>' . $dado  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $dado  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('getSituacao')) {
    /**
     * Retorna a situacao(Pago,Recebido, A pagar, A Receber) do Lancamento conforme o valor passado
     * @param string $valor  caracter que representa um tipo de situação do lancamento.
     * @return string
     *
     */
    function getSituacao($valor)
    {
        $v["p"] = "Pago";
        $v["r"] = "Recebido";
        $v["a"] = "A pagar";
        $v["b"] = "A receber";
        switch ($valor) {
            case 'p':
                return 'Pago';
                break;
            case 'r':
                return 'Recebido';
                break;
            case 'a':
                return 'Pagar';
                break;
            case 'b':
                return 'Receber';
                break;
            case 't':
                return 'Transf.';
                break;
            default:
                return 'Pago';
                break;
        }
    }
}

if (!function_exists('getSituacaoIcons')) {
    /**
     * Retorna um ícone que representa a situacao passada.
     * @param string $valor  caracter que representa um tipo de situação do lancamento.
     * @param string $tipo  caracter que representa se o tipo do  lancamento é Entrada ou Saída.
     *
     */
    function getSituacaoIcons($valor, $tipo)
    {
        $v["p"] = "Pago";
        $v["r"] = "Recebido";
        $v["a"] = "A pagar";
        $v["b"] = "A receber";
        if ($valor == 't') {
            $valor =  $tipo == 'E' ? 'te' : 'ts';
        }
        switch ($valor) {
            case 'p':
                return '<i style="font-size:14px !important;" class="fal fa-dollar-sign pagoIcon" title="Pago"></i>';
                break;
            case 'r':
                return '<i style="font-size:14px !important;" class="fal fa-dollar-sign recebidoIcon " title="Recebido"></i>';
                break;
            case 'a':
                return '<i class="fal fa-hourglass-start apagarIcon " title="A pagar"></i>';
                break;
            case 'b':
                return '<i class="fal fa-hourglass-start areceberIcon" title="A Receber"></i>';
                break;
            case 'te':
                return '<i style="font-size:14px !important;" class="fal fa-long-arrow-left areceberIcon" title="Transf."></i>';
                break;
            case 'ts':
                return '<i style="font-size:14px !important;" class="fal fa-long-arrow-right apagarIcon" title="Transf."></i>';
                break;
            default:
                return 'Pago';
                break;
        }
    }
}


if (!function_exists('getSituacaoBoleto')) {
    /**
     * Retorna se o boleto em está Em Dia ou Vencido, conforme situacao passada
     * @param string $valor  caracter que representa o tipo de situação do boleto.
     *
     */
    function getSituacaoBoleto($valor)
    {
        switch ($valor) {
            case 'P':
                return 'EM DIA';
                break;
            case 'B':
                return 'VENCIDO';
                break;
            default:
                return 'NÃO DEFINIDO';
                break;
        }
    }
}

if (!function_exists('getPlanoUtilizacao')) {
    /**
     * Retorna o tipo de plano da empresa.
     * @param string $tipo  caracter que representa o tipo de plano da empresa.
     *
     */
    function getPlanoUtilizacao($tipo)
    {
        switch ($tipo) {
            case '1':
                return 'Plano MEI';
                break;
            case '2':
                return 'Plano Profissional';
                break;
            case '3':
                return 'Plano Empresarial';
                break;
            default:
                return 'Plano MEI';
                break;
        }
    }
}


if (!function_exists('getCnae')) {

    function getCnae($valor = '', $obrigatorio = FALSE, $junto = FALSE)
    {
        $v = dataCnae();

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($v as $item => $dado) {
            $tela = $junto ? "{$item} - {$dado}" : $dado;
            if ($item == $valor) {
                $combo .= '<option value="' . $item . '" selected>' . $tela  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $tela  . '</option>';
            }
        }
        return $combo;
    }
}

/**
 *
 */
if (!function_exists('newGetCnae')) {

    function newGetCnae($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        $url = trim("https://www.receitaws.com.br/v1/cnpj/" . $cnpj);
        // $url = trim("https://www.receitaws.com.br/v1/cnpj/27274505000109");
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cookie: JSESSIONID=0e410cf8f1a222e61c620e689abdb9b5b3ce8428"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $dados = json_decode($response);
        if (isset($dados) && $dados->status != 'ERROR') {
            return $dados->atividade_principal;
        } else
            return FALSE;
    }
}

/**
 *
 */
if (!function_exists('acaoBoleto')) {

    function acaoBoleto($id)
    {
        $url  = base_url('boleto/verifica-boletos/' . $id);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        return curl_exec($curl);
    }
}


function getConfigPaginator()
{
    /*
    * Configuração de paginador
    */
    $configPage = [
        "per_page"         => RESULTADO,
        "uri_segment"      => 3,
        'num_links'        => 0,
        'cur_tag_open'     => '<li><a class="current">',
        'cur_tag_close'    => '</a></li>',
        "full_tag_open"    => "<ul class='pagination'>",
        "full_tag_close"   => "</ul>",

        "first_link"       => null,
        "first_tag_open"   => null,
        "first_tag_close"  => null,

        "last_link"        => null,
        "last_tag_open"    => null,
        "last_tag_close"   => null,

        "prev_link"        => "<i class='fa fa-chevron-left' style='font-size: 10px; color: #BEC7D0'></i>",
        "prev_tag_open"    => "<li class='prev'>",
        "prev_tag_close"   => "</li>",

        "next_link"        => "<i class='fa fa-chevron-right' style='font-size: 10px; color: #BEC7D0'></i>",
        "next_tag_open"    => "<li class='next'>",
        "next_tag_close"   => "</li>",

        // "cur_tag_open"     => "<li class='active'><a href='#'>",
        // "cur_tag_close"    => "</a></li>",
        // "num_tag_open"     => "<li>",
        // "num_tag_close"    => "</li>"

        "cur_tag_open"     => "<li style='display: none' class='active'><a href='#'>",
        "cur_tag_close"    => "</a></li>",
        "num_tag_open"     => "<li>",
        "num_tag_close"    => "</li>"
    ];
    return $configPage;
}

function teste()
{
    return 'teste';
}

if (!function_exists('EncryptPassw')) {
    /**
     * Esse método criptografa a senha
     * @package helpers
     * @subpackage Password Services
     * @param string $passw Senha
     * @return string
     */
    function EncryptPassw($passw)
    {
        if (is_null($passw))
            return null;

        $passw_encrypted = password_hash(SALT . $passw, PASSWORD_BCRYPT);
        if ($passw_encrypted)
            return $passw_encrypted;
        else
            return $passw;
    }
}

if (!function_exists('DecryptPassw')) {
    /**
     * Esse método verifica se as senhas são iguais
     * @package helpers
     * @subpackage Password Services
     * @param string $passw Senha do usuário sem criptografia
     * @param string $passw_encrypted Senha do usuário criptografada
     * @return boolean
     */
    function DecryptPassw($passw, $passw_encrypted)
    {
        if (is_null($passw) || is_null($passw_encrypted))
            return false;

        $verify = password_verify(SALT . $passw, $passw_encrypted);
        return $verify;
    }
}

if (!function_exists('formataTelefone')) {
    /**
     * Formata Telefone
     * @param string $telefone
     */
    function formataTelefone($telefone)
    {
        $i = strlen($telefone);
        if ($i == 14) {
            $telefone = substr($telefone, 0, 9) . '-' . substr(strtr($telefone, ['-' => '']), 9, 5);
        }

        return $telefone;
    }
}

if (!function_exists('iniciaisNome')) {
    /**
     * Retorna a primeira letra de cada palavra.
     * Considerando que o nome passado foi PHP Teste entao o retorno será PT.
     * @param $nome
     * @return string
     */
    function iniciaisNome($nome)
    {
        $t = explode(' ', $nome);
        $r = '';
        foreach ($t as $i) {
            $r .= substr($i, 0, 1);
        }

        return $r;
    }
}

if (!function_exists('repeteVezes')) {
    /**
     * Formatacao de exibicao de parcelas de um lançamento.
     *Exemplo de Retorno da Funcão: 1/7 mensal
     * @param $numero  Quantidade de parcelas existentes.
     * @param $periodo Periodo de tempo que o lancamento irá repetir: mes, semana...
     * @param $parcela Numero de determinada parcela: Primeira, Segunda ...
     */
    function repeteVezes($numero, $periodo, $parcela)
    {
        $detalhe4 = '';
        if ($numero > 1) {
            if ($periodo == '7') {
                $detalhe4 = 'semanal';
            } elseif ($periodo == '10') {
                $detalhe4 = '10 dias';
            } elseif ($periodo == '15') {
                $detalhe4 = '15 dias';
            } elseif ($periodo == '20') {
                $detalhe4 = '20 dias';
            } elseif ($periodo == '7') {
                $detalhe4 = 'semanal';
            } elseif ($periodo == 'mes') {
                $detalhe4 = 'mensal';
            } elseif ($periodo == '3_mes') {
                $detalhe4 = 'trimestral';
            } elseif ($periodo == '6_meses') {
                $detalhe4 = 'semestral';
            } elseif ($periodo == 'ano') {
                $detalhe4 = 'anual';
            }

            if ($numero == 50) {
                $detalhe4 = 'Sempre';
            } else {
                $detalhe4 = $parcela . ($numero > 1 ? '/' . $numero  : '') . ' ' . $detalhe4;
            }
        }

        return $detalhe4;
    }
}

if (!function_exists('msgCarregando')) {
    /**
     * Retorna load  de carragamento.
     * @param $tipo
     * @return html
     */
    function msgCarregando($tipo = 1)
    {
        $msg = '';
        if ($tipo == 2) {
            $msg = '
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-rotating-plane"></div>
            </div>
            ';
        } elseif ($tipo == 3) {
            $msg = '
            <div class="sk-spinner sk-spinner-double-bounce">
                <div class="sk-double-bounce1"></div>
                <div class="sk-double-bounce2"></div>
            </div>
            ';
        } elseif ($tipo == 4) {
            $msg = '
            <div class="sk-spinner sk-spinner-wandering-cubes">
                <div class="sk-cube1"></div>
                <div class="sk-cube2"></div>
            </div>
            ';
        } elseif ($tipo == 5) {
            $msg = '
            <div class="sk-spinner sk-spinner-pulse"></div>
            ';
        } elseif ($tipo == 6) {
            $msg = '
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
            ';
        } elseif ($tipo == 7) {
            $msg = '
            <div class="sk-spinner sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>
            ';
        } elseif ($tipo == 8) {
            $msg = '
            <div class="sk-spinner sk-spinner-circle">
                <div class="sk-circle1 sk-circle"></div>
                <div class="sk-circle2 sk-circle"></div>
                <div class="sk-circle3 sk-circle"></div>
                <div class="sk-circle4 sk-circle"></div>
                <div class="sk-circle5 sk-circle"></div>
                <div class="sk-circle6 sk-circle"></div>
                <div class="sk-circle7 sk-circle"></div>
                <div class="sk-circle8 sk-circle"></div>
                <div class="sk-circle9 sk-circle"></div>
                <div class="sk-circle10 sk-circle"></div>
                <div class="sk-circle11 sk-circle"></div>
                <div class="sk-circle12 sk-circle"></div>
            </div>
            ';
        } elseif ($tipo == 9) {
            $msg = '
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-cube-grid">
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                </div>
            </div>
            ';
        } elseif ($tipo == 10) {
            $msg = '
            <div class="sk-spinner sk-spinner-fading-circle">
                <div class="sk-circle1 sk-circle"></div>
                <div class="sk-circle2 sk-circle"></div>
                <div class="sk-circle3 sk-circle"></div>
                <div class="sk-circle4 sk-circle"></div>
                <div class="sk-circle5 sk-circle"></div>
                <div class="sk-circle6 sk-circle"></div>
                <div class="sk-circle7 sk-circle"></div>
                <div class="sk-circle8 sk-circle"></div>
                <div class="sk-circle9 sk-circle"></div>
                <div class="sk-circle10 sk-circle"></div>
                <div class="sk-circle11 sk-circle"></div>
                <div class="sk-circle12 sk-circle"></div>
            </div>
            ';
        } else {
            $msg = '
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>';
        }

        return $msg;
    }
}

if (!function_exists('capitalize')) {
    /**
     * Transforma a primeira letra de cada palavra em letra Maiscula.
     * Exemplo de Retorno da Funcão: Primeira Letra Sempre Em Maiscula.
     * @param $texto
     * @param $quebrar
     * @return string
     */
    function capitalize($texto, $quebrar = ' ')
    {
        $p = mb_strtolower(strtolower($texto), 'UTF-8');
        $p = explode($quebrar, $p);
        $r = [];
        foreach ($p as $i) {
            array_push($r, strlen($i) > 2 ? ucwords($i) : $i);
        }
        $p = implode(' ', $r);
        $i = strpos($p, '/');
        if ($i) { //Verificando se tem /
            $p = capitalize($p, '/');
            $p = substr($p, 0, $i) . '/' . substr($p, $i + 1, strlen($p));
        }
        return $p;
    }
}

if (!function_exists('getFilename')) {
    /**
     * Retorna  a Extensão do  Arquivo
     * Exemplo de Retorno da Funcão:csv.
     * @param $name Nome do arquivo.
     * @return string
     */
    function getFilename($name)
    {
        $filename = explode(".", $name);
        $extensao = $filename[1];
        return $extensao;
    }
}

if (!function_exists('setFlashdata')) {
    /**
     * Seta mensagens de alerta.
     * @param $msg Mensagem a ser exibida no alerta.
     * @param $tipo Tipo da mensagem: sucesso, aviso, erro.
     * @return html
     */
    function setFlashdata($msg, $tipo)
    {
        $mensagem = '
            <div class="alert alert-' . $tipo . '" id="msgInfo"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' . $msg . '</div>';
        $ci = &get_instance();
        $retorno = $ci->session->set_flashdata('msg', $mensagem);
        return $retorno;
    }
}
if (!function_exists('setFlashdataToast')) {
    /**
     * Seta mensagens de alerta em Toast.
     * @param $msg Mensagem a ser exibida no Toast.
     * @param $tipo Tipo da mensagem: sucesso, aviso, erro.
     * @param $position Posição do Toast na tela.
     * @return html
     */
    function setFlashdataToast($msg, $tipo, $position = "center")
    {
        $mensagem = '
        <div id="toast-container" class="toast-top-' . $position . '" aria-live="polite" role="alert">
            <div class="toast toast-' . $tipo . '">
                <div class="toast-message">' . $msg . '</div>
            </div>
        </div>';
        $ci = &get_instance();
        $retorno = $ci->session->set_flashdata('toast', $mensagem);
        return $retorno;
    }
}

if (!function_exists('getNumber')) {
    /**
     * Retorna string sem caracteres especiais.
     * @param $string
     * @return string
     */
    function getNumber($string)
    {
        $str = preg_replace('/[^\d]/', '', $string);
        return $str;
    }
}

if (!function_exists('geraPaginador')) {

    function geraPaginador($dados, $url, $marcar = FALSE)
    {
        $pg = '<ul class="pagination">';
        if ($dados) {
            foreach ($dados as $item) {
                $m   = $marcar == $item->letra ? 'active' : '';
                $pg .= '<li class="' . $m . '"><a href="' . $url . $item->letra . '" title="Total ' . $item->total . ' de registros.">' . $item->letra . '</a></li>';
            }
        }
        $pg .= "</ul>";
        return $pg;
    }
}

if (!function_exists('sendMail')) {
    /**
     * Metodo para configuração e envio de email.
     * @param $para Endereço de email para onde o email será enviado.
     * @param $mensagem Mensagem do email que será enviado
     * @param $config Configurações do envio de email.
     */
    function sendMail($para, $mensagem, $config = FALSE)
    {
        $email = [
            'title'     => 'Olheiro Online',
            'from'      => "contato@olheironline.com.br",
            'subject'   => "Olheiro Online",
            'reply_to'  => "contato@olheironline.com.br",
            'to'        => $para,
            'bcc'       => "diegosoaresnascimento1@gmail.com",
            'mensagem'  => $mensagem
        ];

        //Sobrescrevendo
        if ($config) {
            $email['title']     = isset($config['title'])       ? $config['title']     : $email['title'];
            $email['from']      = isset($config['title'])       ? $config['title']     : $email['from'];
            $email['subject']   = isset($config['subject'])     ? $config['subject']   : $email['subject'];
            $email['reply_to']  = isset($config['reply_to'])    ? $config['reply_to']  : $email['reply_to'];
            $email['to']        = isset($config['to'])          ? $config['to']        : $email['to'];
            $email['bcc']       = isset($config['bcc'])         ? $config['bcc']       : $email['bcc'];
            $email['mensagem']  = isset($config['mensagem'])    ? $config['mensagem']  : $email['mensagem'];
        }

        $ci = &get_instance();
        $ci->load->library("phpmailer_");
        $mail = $ci->phpmailer_->load();

        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.hostinger.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contato@olheironline.com.br';
            $mail->Password   = 'Vitrineonline1!';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->CharSet    = 'UTF-8';
            $mail->Encoding   = 'base64';

            //Recipients
            $mail->setFrom($email['from'], $email['title']);
            $mail->addAddress($email['to'], $email['to']);     //Add a recipient
            $mail->addBCC($email['bcc'], 'Log');     //Add a recipient

            //Content
            $mail->isHTML(true);
            $mail->Subject = $email['subject'];
            $mail->Body    = $email['mensagem'];
            $envio = $mail->send();
            if (!$envio) {
                sleep(5);
                $envio = $mail->send();
            }
        } catch (Exception $e) {
            $envio = false;
        }

        return $envio;
    }
}

if (!function_exists('getBancosSaldo')) {
    /**
     * Retorna uma lista com o saldo e nome de cada banco ativo da empresa.
     * @return array
     */
    function getBancosSaldo()
    {
        $ci = &get_instance();
        $ci->load->model('Lancamento_model', 'LancamentoModel');

        $listaBancos = [];
        $total       = 0;
        $sFiltro     = " AND fk_empresa = " . $ci->session->userdata('id_empresa');
        $bancos      = $ci->BancoCaixaModel->getAll(['ativo' => 'S']);
        foreach ($bancos as $item) {
            $filtroTotal     = " ativo IN ('S') AND tipo IN ('E') AND situacao IN ('r', 't') {$sFiltro} AND fk_banco = {$item->id}";
            $saldoEntrada    = $ci->LancamentoModel->getTotalValor($filtroTotal);
            $saldoEntrada   += $item->vl_saldo_inicial;

            $filtroTotal = " ativo IN ('S') AND tipo IN ('S') AND situacao IN ('p', 't') {$sFiltro}  AND fk_banco = {$item->id}";
            $saldoSaida  = $ci->LancamentoModel->getTotalValor($filtroTotal);

            $saldo       = $saldoEntrada - $saldoSaida;
            $total      += $saldo;
            array_push($listaBancos, ['nome' => $item->apelido, 'vl' => round($saldo, 2)]);
        }
        return ['lista' => $listaBancos, 'total' => $total];
    }
}

if (!function_exists('getSaldoLancamento')) {
    /**
     * Retorna o saldo dos lancamentos da empresa atual filtrados por um determinado periodo de Tempo.
     * Os parametros passados nessa funcao servem para filtrar os lancamentos que desejam ser retornado o saldo.
     * @param $dt    Data a ser filtrada.
     * @param $banco Banco a ser filtrado.
     * @param $comparacaoDt Operador de comparaçao da data.
     * @return float
     */
    function getSaldoLancamento($dt = FALSE, $banco = [], $comparacaoDt = '<', $situacao = false)
    {
        $ci = &get_instance();
        $ci->load->model('Lancamento_model', 'LancamentoModel');

        $sFiltro     = " AND fk_empresa = " . $ci->session->userdata('id_empresa');
        if ($banco) {
            $sFiltro .= " AND fk_banco IN (" . implode(',', $banco) . ") ";;
        }
        if ($dt) {
            $sFiltro .= " AND dt {$comparacaoDt} '{$dt}' ";
        }

        $filtroTotal     = " ativo IN ('S') AND tipo IN ('E') {$sFiltro}";
        $entrada         = $ci->LancamentoModel->getTotalValor($filtroTotal);

        $filtroTotal     = " ativo IN ('S') AND tipo IN ('S') {$sFiltro}  ";
        $saida           = $ci->LancamentoModel->getTotalValor($filtroTotal);

        $saldo       = $entrada - $saida;

        return round($saldo, 2);
    }
}

if (!function_exists('getTemplateEmail')) {
    /**
     * Retorna um template de email
     * Tipos de Template:
     *  -1.  CADASTRO NA 
     *  -2.  CONVIDADO PARA CRIAR UM CADASTRO
     *  -3.  CONVIDADO PARA ACESSAR OS NUMEROS
     *  -4.  ALTERAÇÃO DE SENHA
     *  -5.  VALIDAÇÃO DE EMAIL
     *  -6.  CONVIDADO PARA ACESSAR OS NUMEROS
     *  -7.  BOLETO
     *  -8.  ACONTECEU ALGO?
     *  -9.  CASES DE SUCESSO
     *  -10. BOAS-VINDAS
     *  -11. USUÁRIO ATIVO: TERMINO TRIAL
     *  -12. CLIENTE
     *  -13. PARABENIZAÇÕES X ACESSO
     *  -14. RECEBER NOVIDADES
     *  -15. MENSAGEM RECUPERRAÇÃO 5 DIAS
     *  -16. MENSAGEM RECUPERAÇÃO 10 DIAS
     *  -17. USUÁRIO EM DESISTENCIA: TERMINO TRIAL
     *
     * @param $tipo  Parametro passado para selecionar qual template será retornado.
     * @param $msg   Mensagem que será inserida no template
     * @return html
     */
    function getTemplateEmail($tipo, $msg = [])
    {
        $mensagem = '';

        $cabecalho = "
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Cadastro</title>
            <link href='https://fonts.googleapis.com/css?family=Maven+Pro&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
            <style>#btn:hover{ background: #30593A }</style>
        </head>
        <body style='background-color:#ededed'>
            <div style='display: block;margin: 0 auto; width: 800px; background-color: #fff;'>
                <div style='height: 100px; background: #30593A; display: flex; '>
                    <a href='https://olheironline.com.br' style='text-decoration: none; margin: 0 auto;'><img style='margin-top: 20px;' src='https://olheironline.com.br/assets/site/images/logo_horizontal.png'
                    alt='Olheiro Online' title='Olheiro Online' width='120'/></a>
                </div>
        ";

        $semCabecalho = "
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Cadastro</title>
            <link href='https://fonts.googleapis.com/css?family=Maven+Pro&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
            <style>#btn:hover{ background: #30593A };.background{background: url('');background-size:cover;height:100vh;}</style>
        </head>
        <body style='background-color:#ededed'>
            <div style='display: block;margin: 0 auto; width: 800px; background-color: #fff;'>

        ";

        $rodape = "
                <div style='background-color: #f5f5f5; padding:8%'>
                    <table style='width: 100%; padding: 0 80px;'>
                        <tr>
                            <td valign='center' align='center'>
                                <a href='' target='_blank' rel='noopener noreferrer'>
                                    <img src='' alt=''>
                                </a>
                            </td>
                            <td valign='center' align='center'>
                                <a href='' target='_blank' rel='noopener noreferrer'>
                                    <img src='' alt=''>
                                </a>
                            </td>
                            <td valign='center' align='center'>
                                <a href='' target='_blank' rel='noopener noreferrer'>
                                    <img src='' alt=''>
                                </a>
                            </td>
                            <td valign='center' align='center'>
                                <a href='' target='_blank' rel='noopener noreferrer'>
                                    <img src='' alt=''>
                                </a>
                            </td>
                        </tr>
                    </table>
                <div style='padding: 20px'>
                    <p style='color: #999; font-family: \"Maven Pro\", sans-serif; font-weight: 700; font-size: 16px; text-align: center; width: 100%; padding: 10px 0 0 0;margin: 0;'>
                        Quer falar com a gente?
                    </p>
                    <p style='color: #999; font-family: \"Maven Pro\", sans-serif; font-weight: 700; font-size: 16px; text-align: center; width: 100%; padding: 10px 0 0 0;margin: 0;'>
                        Acesse nossa Central de Ajuda no site.
                    </p>
                    <p style='color: #999; font-family: \"Maven Pro\", sans-serif; font-weight: 700; font-size: 16px; text-align: center; width: 100%; padding: 10px 0 0 0;margin: 0;'>
                        Esta mensagem é gerada por um sistema automático de gerenciamento de e-mails.
                    </p>
                    <p style='color: #999; font-family: \"Maven Pro\", sans-serif; font-weight: 700; font-size: 16px; text-align: center; width: 100%; padding: 10px 0 0 0; margin: 0;'>
                        Por favor, não responda-o.
                    </p>
                    <p style='color: #999; font-family: \"Maven Pro\", sans-serif; font-weight: 700; font-size: 16px; text-align: center; width: 100%; padding: 20px 0 0 0;margin: 0;'>
                        Olheiro Online - www.olheironline.com.br
                    </p>
                </div>
            </div>
        </div>
        </body>
        </html>
        ";


        //Recupera senha
        if ($tipo == 1) { // SENHA OLHEIRO ONLINE
            $mensagem = "
                {$cabecalho}
                <div style='padding: 8%; display:flex;'>
                <div style='width: 65%; padding-right: 30px'>
                    <h2 style='color: #999;font-family: \"Maven Pro\", sans-serif;font-weight: 500'>
                        Olá, <span style='color: #30593A;font-weight: 900;'>%%0%%!</span><br>
                        Seja Bem vindo a Olheiro Online<br>
                        <span style='color: #A4CA3A;font-weight: 900;'>PARA COMEÇAR A SUBIR SEUS VÍDEOS</span>.<br>
                        Clique no botão abaixo entre com seu CPF e a senha é <b>%%1%%</b>!
                    </h2>
                    <a id='btn' href='%%2%%' target='_blank'
                        style='font-weight: bolder;padding: 15px 50px; background-color: #A4CA3A; border-radius: 5px; margin: 20px 0 0 auto;
                        text-align: center; float:right; text-decoration: none; font-family: \"Maven Pro\", sans-serif; color: #fff; font-size: 18px;'>ENTRAR NA<BR>PLATAFORMA</a>
                </div>
            </div>
            <div style='padding: 0% 8% 8%;color: #999;font-size:20px;font-family: \"Maven Pro\", sans-serif;'>
                <p style='font-weight: 500;'>Por questões de segurança, troque sua senha assim que entrar na plataforma!</p>
                <p style='font-weight: 500;'>Se o botão não funcionar, é só copiar e colar o link abaixo no seu navegador:</p>
                <a href='%%2%%' style='color: #30593A;display: block;padding: 10px 0px;word-break: break-all;'>%%2%%</a>
            </div>
                {$rodape}
            ";
        }

        // echo $mensagem  . ' tipo ' . $tipo;
        $iMsg = count($msg);
        for ($i = 0; $i < $iMsg; $i++) {
            $mensagem = str_replace("%%{$i}%%", $msg[$i], $mensagem);
        }
        return $mensagem;
    }
}

if (!function_exists('tipoPlano')) {
    function tipoPlano($tipo)
    {
        $retorno = [
            'total_banco'        => 2,
            'total_usuario'      => 1,
            'total_centro_custo' => 0,
            'livre'              => FALSE,
        ];
        if ($tipo == 2) {
            $retorno = [
                'total_banco'        => 3,
                'total_usuario'      => 2,
                'total_centro_custo' => 0,
                'livre'              => FALSE,
            ];
        } else if ($tipo == 3) {
            $retorno = [
                'total_banco'        => 99999,
                'total_usuario'      => 99999,
                'total_centro_custo' => 99999,
                'livre'              => TRUE,
            ];
        }
        return $retorno;
    }
}


if (!function_exists('reduceText')) {
    /**
     * Reduz texto pra mostrar só uma parte dele
     */
    function reduceText($text, $tamanho)
    {
        $ptexto = substr($text, 0, $tamanho); //guarda os primeiros 650 caracteres
        $palavras = explode(" ", $ptexto); // separa as palavras (650 caracteres)
        $palavras = array_slice($palavras, 0,  count($palavras) - 1); //separa da primeira até o total - 1
        $ptexto = implode(" ", $palavras); //junta as palavras
        $ptexto = $ptexto . "..."; //retorna o texto com (...)
        return $ptexto;
    }
}

if (!function_exists('returnText')) {
    function returnText($string, $length)
    {
        $return =  (mb_strlen($string) > $length) ? reduceText($string, $length) : $string;
        return $return;
    }
}

if (!function_exists('TCalendarioReduzido')) {
    /**
     * Retorna Calendario apenas a  parte dos meses
     * @return html
     */
    function TCalendarioReduzido()
    {
        return '
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td><a href="#" data-mes="01">JAN</a></td>
                    <td><a href="#" data-mes="02">FEV</a></td>
                    <td><a href="#" data-mes="03">MAR</a></td>
                </tr>
                <tr>
                    <td><a href="#" data-mes="04">ABR</a></td>
                    <td><a href="#" data-mes="05">MAI</a></td>
                    <td><a href="#" data-mes="06">JUN</a></td>
                </tr>
                <tr>
                    <td><a href="#" data-mes="07">JUL</a></td>
                    <td><a href="#" data-mes="08">AGO</a></td>
                    <td><a href="#" data-mes="09">SET</a></td>
                </tr>
                <tr>
                    <td><a href="#" data-mes="10">OUT</a></td>
                    <td><a href="#" data-mes="11">NOV</a></td>
                    <td><a href="#" data-mes="12">DEZ</a></td>
                </tr>
            </table>
        </div>';
    }
}

if (!function_exists('TCalendario')) {
    /**
     * Retorna Calendario
     * @param $filtroDetalhado
     * @param $filtroData
     * @param $selecionaMes
     * @return html
     */
    function TCalendario($filtroDetalhado = TRUE, $filtroData = TRUE, $selecionaMes = TRUE)
    {
        $exibeAtalho     = $filtroDetalhado ? '' : 'oculto';
        $exibeDatepicker = $filtroData ? '' : 'oculto';
        $mes = $selecionaMes ? '' : 'datepicker-mes';
        $maxlength = $selecionaMes ? 10 : 7;

        return '
        <div id="col-calendario">

            <div class="text-center">
                <div class="btn-group ' . $exibeAtalho . '" role="group" aria-label="Filtros de data" id="box-filtro-datas">
                    <button type="button" class="btn btn-default" data-value="dia">Dia</button>
                    <button type="button" class="btn btn-default mes-destaque" data-value="mes">Mês</button>
                    <button type="button" class="btn btn-default" data-value="ano">Ano</button>
                </div>

                <div class="text-center" id="boxMes">
                    <div class="btn-group">
                        <button type="button" id="btCalendarioMesAnterior" class="btn btn-white bt-anterior"><i class="fal fa-chevron-left"></i></button>
                        <button type="button" id="btCalendarioMesAtual"    class="btn btn-white" data-value="' . date('Y-m-d') . '"></button>
                        <button type="button" id="btCalendarioMesProximo"  class="btn btn-white bt-proximo"><i class="fal fa-chevron-right"></i> </button>
                    </div>
                </div>
            </div>

            <div id="boxCalendario" style="margin-left: 0; display: none">
                <div>
                    <div class="text-center" id="boxDatas">
                        <div class="btn-group">
                            <button type="button" id="btCalendarioAnoAnterior" class="btn btn-white bt-anterior"><i class="fal fa-chevron-left"></i></button>
                            <button type="button" id="btCalendarioAnoAtual"    class="btn btn-white" data-value="' . date('Y') . '">' . date('Y') . '</button>
                            <button type="button" id="btCalendarioAnoProximo"  class="btn btn-white bt-proximo"><i class="fal fa-chevron-right"></i> </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">' . TCalendarioReduzido() . '</div>
                    </div>
                </div>

                <div class="row text-center ' . $exibeDatepicker . '">
                    <div class="form-group">
                        <div class="input-daterange input-group ' . $mes . '" id="datepicker">
                            <input type="text" class="form-control-sm form-control" name="dtPesquisaInicio" id="dtPesquisaInicio"  maxlength="' . $maxlength . '"/>
                            <span class="input-group-addon">até</span>
                            <input type="text" class="form-control-sm form-control" name="dtPesquisaFim" id="dtPesquisaFim"  maxlength="' . $maxlength . '"/>
                            <button class="btn btn-ok modalBtnCheckEntrada" type="button">OK</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    ';
    }
}

if (!function_exists('nivel_acesso')) {
    /**
     * Verifica se o usuário tem acesso a determinado modulo da empresa.
     * Se o usuário tiver permissão de acesso aquele modulo será permitido senão será redirecionado.
     * @param boolean $retorno
     * @param string  $solicitado Módulo ao qual usuário deseja acessar.
     */
    function nivel_acesso($retorno = FALSE, $solicitado = '')
    {
        $response = FALSE;
        $ci = &get_instance();
        $verificaNivel = getNivel();
        if ($verificaNivel != '') {
            // $local      = empty($solicitado) ? $ci->router->class : $solicitado;
            $local      = empty($solicitado) ? $ci->router->uri->uri_string : $solicitado;
            // mDebug($ci->router);
            // mDebug($local);
            // $metodoAjax = [
            //     'get_combo_centro_custo'
            // ];

            // if (in_array($ci->router->method, $metodoAjax)) {
            //     return TRUE;
            // }

            switch ($verificaNivel) {
                case 'A': //Proprietario
                    $response = TRUE;
                    break;
                case 'T': //Operador (CADASTRO e LANÇAMENTO)
                    if ((strpos($local, 'atleta-dados') === false) && (strpos($local, 'painel') === false) && (strpos($local, 'video') === false)) {

                        // if ($local != 'video' && $local != 'painel' && $local != 'atleta-dados') {
                        if (!$retorno) {
                            setFlashdata('Você não tem permissão para acessar esse módulo!', 'warning');
                            redirect('painel');
                            exit;
                        }
                    } else {
                        $response = TRUE;
                    }
                    break;
                case 'P': //Contador
                    if ($local != 'video' && $local != 'painel') {
                        if (!$retorno) {
                            setFlashdata('Você não tem permissão para acessar esse módulo!', 'warning');
                            redirect('painel');
                            exit;
                        }
                    } else {
                        $response = TRUE;
                    }
                    break;
                default:
                    setFlashdata('Permissão negada!', 'warning');
                    redirect("login");
                    break;
            }
        }

        return $response;
    }
}

if (!function_exists('getNivel')) {
    /**
     * Retorna o nivel de acesso do usuário.
     */
    function getNivel()
    {
        $ci = &get_instance();
        $ci->load->model('Usuario_model', 'UsuarioModel');

        $filtro   = [
            'id' => $_SESSION['id']
        ];
        $verificaNivel = $ci->UsuarioModel->getAll($filtro, 'nivel');
        return $verificaNivel[0]->nivel;
    }
}

if (!function_exists('nivel_acesso_logo')) {
    /**
     * Verifica se o usuário é propietário para edicao da logo da Empresa.
     * Somente Usuário propietário pode editar a logo.
     * @return boolean
     *
     */
    function nivel_acesso_logo()
    {
        $ci = &get_instance();
        $ci->load->model('Usuario_model', 'UsuarioModel');

        $filtro   = [
            'fk_usuario'   =>  $_SESSION['id'],
            'fk_empresa'   =>  $_SESSION['id_empresa']
        ];
        $verificaNivel = $ci->UsuarioModel->getAll($filtro, 'empresa_usuario.nivel');
        return ($verificaNivel[0]->nivel == 1);
    }
}

if (!function_exists('logAtividade')) {
    function logAtividade($log, $titulo, $tipo = 'A')
    {
        /**
         * Metodo para criação de log da atividade do usuário no sistema.
         * Tipos de  log de Atividade:
         *  A = Remoção de Login expirado
         *  B = Baixa de Lançamento
         *  I = Inativar Lançamento
         *  L = Edição de Lançamento
         *  M = Edição de Lançamento em massa
         *  F = Tentativa de login
         *  E = Exclusão de Lançamento
         *  R = Recuperação de Conta
         *  U = Upload do Comprovante de Boleto
         *  D = Dowload de Boleto
         *  S = Envio de Boleto por email
         *  N = Envio de emails automaticos
         *
         * @param $log
         * @param $titulo
         * @param $tipo
         */


        $ci = &get_instance();
        $ci->load->model('Usuario_model', 'UsuarioModel');
        $dados = [
            'dt'     => date('Y-m-d H:i:s'),
            'log'    => $log,
            'tipo'   => $tipo,
            'titulo' => $titulo
        ];
        $response = $ci->UsuarioModel->gravarLogAtividade($dados);
        return $response;
    }
}

/***********CRIAÇÃO DE CONTAS INICIAIS************/

if (!function_exists('gerar_senha')) {
    /**
     * Gerar Senhas Seguras
     * @param $tamanho
     * @param $maiusculas
     * @param $minusculas
     * @param $numeros
     * @param $simbolos
     */
    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
    {
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
        $mi = "abcdefghijklmnopqrstuvyxwz";
        $nu = "0123456789";
        $si = "!@#$%¨&*()_+=";
        $senha = "";

        if ($maiusculas) {
            $senha .= str_shuffle($ma);
        }

        if ($minusculas) {
            $senha .= str_shuffle($mi);
        }

        if ($numeros) {
            $senha .= str_shuffle($nu);
        }

        if ($simbolos) {
            $senha .= str_shuffle($si);
        }

        return substr(str_shuffle($senha), 0, $tamanho);
    }
}

if (!function_exists('in_array_field')) {
    function in_array_field($needle, $needle_field, $haystack, $indice = false, $strict = false, $isArray = false)
    {
        if ($isArray) {
            if ($strict) {
                foreach ($haystack as $item) {
                    if (isset($item[$needle_field]) && $item[$needle_field] === $needle) {
                        return true;
                    }
                }
            } else {
                foreach ($haystack as $item) {
                    if (isset($item[$needle_field]) && $item[$needle_field] == $needle) {
                        return $indice ? $item : true;
                    }
                }
            }
        } else {

            if ($strict) {
                foreach ($haystack as $item) {
                    if (isset($item->$needle_field) && $item->$needle_field === $needle) {
                        return true;
                    }
                }
            } else {
                foreach ($haystack as $item) {
                    if (isset($item->$needle_field) && $item->$needle_field == $needle) {
                        return $indice ? $item : true;
                    }
                }
            }
        }

        return false;
    }
}

if (!function_exists('array_orderby')) {
    function array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = [];
                foreach ($data as $key => $row)
                    $tmp[$key] = $row->$field;
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
}

if (!function_exists('array_to_csv_download')) {
    function array_to_csv_download(array $array, $name = FALSE, $title = NULL)
    {

        if (count($array) == 0) {
            return null;
        }

        $filename = $name ? $name : "data_export_" . date("Y-m-d") . ".csv";
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");

        $df = fopen("php://output", 'w');

        if ($title) {
            fputcsv($df, $title);
        } else {
            fputcsv($df, array_keys(reset($array)));
        }

        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        die();
    }
}

if (!function_exists('limpaMascara')) {
    /**
     * Limpa valores retirando caracteres (. , - /).
     * Se for passado um cpf formatado 123.456.789-56 será retornado somente o valor : 12345678956.
     * @param $valor  Valor a ser limpo.
     * @return string
     */
    function limpaMascara($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }
}
if (!function_exists('mudarPlaceholder')) {
    /**
     * Muda o placeholder do input na versao mobile para 'Pesquisa'
     * @param $modulo se  nao for mobile sera retornado o placeholder acompanhado do nome do modulo. EX: Pesquisa Cliente.
     * @return string
     */
    function mudarPlaceholder($modulo)
    {

        $placeholder = 'Pesquisa ';
        echo $placeholder . $modulo;
    }
}

if (!function_exists('formatCnpjCpf')) {
    /**
     * @param $value string a ser formatada
     * @return string
     */
    function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);
        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}

if (!function_exists('sanitizeString')) {
    /**
     * Limpa toda aspas simples de uma string.
     * @param $str string a ser limpa.
     * @return string
     */
    function sanitizeString($str)
    {
        return preg_replace("/[']/ui", ' ', $str);
    }
}

if (!function_exists('mesDesconto')) {

    function mesDesconto()
    {
        $dtPromo = '2020-08-01';
        $dtFinal = date('m', strtotime($dtPromo));
        $dtAtual = date('m');
        $diferença = ($dtFinal - $dtAtual);

        if ($diferença >= 5) {
            echo '4 meses';
        } else if ($diferença > 1 && $diferença < 5) {
            echo floor($diferença) . ' meses';
        } else {
            echo ' 1 mês';
        }
    }
}
function calcularDataPagamento($date, $qtd_mes, $dtUser = null, $i = null)
{
    /**
     * A função deve calcular corretamente as datas de parcela do lançamento
     * Recebe - Date $date -> data
     * Str $qtd_mes -> string deve conter a quantidade de mes que tem que somar
     */
    global $initial;
    global $value_day;

    $year      = date('Y', strtotime($date));
    $month     = date('m', strtotime($date));
    $day       = date('d', strtotime($date));
    $dayUser   = date('d', strtotime($dtUser));
    $mesAdd    = (int) preg_replace('/[a-z +]/', '', $qtd_mes);


    /**
     * Se o primeiro mes iniciar em 29 o valor de initial deve receber verdadeiro
     */
    if ($i == 1 && ($day == 29 || $day == 28)) {
        $value_day = $day;
        $initial = true;
    }

    # Verifica se é o ultimo dia do mês
    if ($day == cal_days_in_month(CAL_GREGORIAN, $month, $year) || ($day == 29 || $day == 30)) {
        /*
         * Se o primeiro mes iniciar em 28/29 e o mes for fevereiro ele deve deixar o di$day == 29 ||a 28 com padrão para o mes seguinte
         */
        if ($initial) {
            $nextDay = $value_day;
            $month++;
            $nextDate = $year . '-' . $month . '-' . $nextDay;
            return date('Y-m-d', strtotime($nextDate));
        }

        # Verifica se o ano é bixesto e se a data é 28/02
        if (intval($year) % 4 == 0 && $month == 2 && $day == 28) {
            $month++;
            $nextDate = $year . '-' . $month . '-' . $day;
            return date('Y-m-d', strtotime($nextDate));
        }

        if ($month == 12) {
            $year++;
            switch ($qtd_mes) {
                case '+2 month':
                    $month = 2;
                    break;
                case '+3 month':
                    $month = 3;
                    break;
                case '+6 month':
                    $month = 6;
                    break;
                case '+12 month':
                    $month = 12;
                    break;
                default:
                    $month = 1;
                    break;
            }
        } else {
            if ($mesAdd != 1) {
                $month += $mesAdd;
                if ($month > 12) {
                    $year++;
                    $month -= 12;
                }
            } else {
                $month++;
            }
        }
        $nextDay = cal_days_in_month(CAL_GREGORIAN, $month, $year) < $dayUser ? cal_days_in_month(CAL_GREGORIAN, $month, $year) : $dayUser;
        $nextDate = $year . '-' . $month . '-' . $nextDay;

        return date('Y-m-d', strtotime($nextDate));
    }
    return date('Y-m-d', strtotime($qtd_mes, strtotime($date)));
}

function Curl($url, $post_data, &$http_status, &$header = null, $tipo = 'POST')
{
    // Log::debug("Curl $url JsonData=" . $post_data);

    $ch = curl_init();
    // user credencial
    curl_setopt($ch, CURLOPT_USERPWD, "username:passwd");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    // post_data
    if ($tipo == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
    }
    if ($tipo == 'PUT') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    }
    if ($tipo == 'PATCH') {
        //curl_setopt($ch, CURLOP, true);
    }

    if ($post_data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    if (!is_null($header)) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Basic ' . base64_encode("teste:040e89853d4dee138ed0348c32f2838b-us17")));

    curl_setopt($ch, CURLOPT_VERBOSE, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    // Log::debug('Curl exec=' . $url);

    $body = null;
    // error
    if (!$response) {
        $body = curl_error($ch);
        // HostNotFound, No route to Host, etc  Network related error
        $http_status = -1;
        // Log::error("CURL Error: = " . $body);
    } else {
        //parsing http status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!is_null($header)) {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        } else {
            $body = $response;
        }
    }

    curl_close($ch);

    return $body;
}

function getEmailMailChimp()
{
    $url    = 'https://us17.api.mailchimp.com/3.0/lists/2c9bc31955/members?offset=0&count=500';
    $result = json_decode(Curl($url, FALSE, $http_status, $header, 'GET'));
    $emails = [];
    foreach ($result->members as $item => $i) {
        $emails[$i->email_address] = [
            'id'        => $i->id,
            'nome'      => $i->merge_fields->FNAME,
            'sobrenome' => $i->merge_fields->LNAME,
            'empresa'   => $i->merge_fields->MMERGE4,
            'uid'       => $i->id,
        ];
    }

    return $emails;
}

function getTagsMailChimp()
{
    $url       = 'https://us17.api.mailchimp.com/3.0/lists/2c9bc31955/segments';
    $result    = json_decode(Curl($url, FALSE, $http_status, $header, 'GET'));
    $segmentos = [];
    foreach ($result->segments as $item => $i) {
        $segmentos[$i->name] = $i->id;
    }

    return  $segmentos;
}

function atualizaMailChimp()
{
    //MAILCHIMP
    $ci = &get_instance();
    $ci->load->model('Empresa_model', 'EmpresaModel');

    $dados['segmentos'] = getTagsMailChimp();
    $dados['gatilho']   = $ci->EmpresaModel->getGatilho();
    $dados['emails']    = getEmailMailChimp();
    $msg                = [];
    foreach ($dados['gatilho'] as $item) {
        if ($item['id'] < 128) {
            continue;
        }

        $nome = explode(' ', $item['NOME_USU']);
        $data = [
            "email_address" => $item['EMAIL_USU'],
            "email_type"    => "html",
            "status"        => "subscribed",
            "source"        => "Import",
            "merge_fields"  =>  [
                "FNAME"    => $nome[0],
                "LNAME"    => str_pad($item['id'], 5, 0, STR_PAD_LEFT),
                "MMERGE4"  => $item['nome'],
            ]
        ];

        if (!array_key_exists($item['EMAIL_USU'], $dados['emails'])) {
            if (empty($item['EMAIL_USU'])) {
                continue;
            }

            $url    = 'https://us17.api.mailchimp.com/3.0/lists/2c9bc31955/members/';
            $result = json_decode(Curl($url, json_encode($data), $http_status, $header, 'POST'));
            mDebug($result);
            if ($result->status == 400 || $result->status == 405) {
                array_push($msg, $result->detail . ' (' . $item['EMAIL_USU'] . ')');
            }
        } else {
            $uid    = $dados['emails'][$item['EMAIL_USU']]['uid'];
            $data["status_if_new"] = "subscribed";
            $url    = 'https://us17.api.mailchimp.com/3.0/lists/2c9bc31955/members/' . $uid;
            $result = json_decode(Curl($url, json_encode($data), $http_status, $header, 'PUT'));
            if ($result->status == 400) {
                array_push($msg, $result->detail);
            }
        }
    }

    $dados['emails'] = getEmailMailChimp();

    //Atualizando TAGS
    $i = 0;
    foreach ($dados['gatilho'] as $item) {
        if ($item['id'] < 128) {
            continue;
        }

        if (array_key_exists($item['EMAIL_USU'], $dados['emails'])) {
            if (empty($item['EMAIL_USU'])) {
                continue;
            }

            $tags = [];
            $novo = '';
            if (isset($item['NOVO'])) {
                $novo = 'NC';
            } else if (date('Y-m-d', strtotime('+3 days', strtotime($item['DT_CADASTRO']))) < date('Y-m-d') &&  !isset($item['NOVO'])) {
                $novo = 'EX';
            } else {
                $novo = '';
            }
            $tag5d  = date('Y-m-d', strtotime('+5 days', strtotime($item['DT_CADASTRO']))) < date('Y-m-d') && $item['5D'] < 5 && isset($item['NOVO']) ? '5d' : '';
            $tag10d = date('Y-m-d', strtotime('+10 days', strtotime($item['DT_CADASTRO']))) < date('Y-m-d') && $item['10D'] < 5 && isset($item['NOVO']) ? '10d' : '';
            $tag20d = date('Y-m-d', strtotime('+20 days', strtotime($item['DT_CADASTRO']))) < date('Y-m-d') && isset($item['NOVO']) ? '20d' : '';
            if ($tag5d != '' && $tag10d != '') {
                $tag10d = 'INAT';
            }
            $tagCompara = [
                $novo,
                $tag5d,
                $tag10d,
                $tag20d,
            ];

            foreach ($tagCompara as $tag) {
                if (empty($tag)) continue;
                if (array_key_exists($tag, $dados['segmentos'])) {
                    array_push($tags, [
                        "name"   => $tag,
                        "status" => "active"
                    ]);
                }
            }

            foreach ($dados['segmentos'] as $tag => $i) {
                $achado = in_array_field($tag, 'name', $tags, TRUE, TRUE);

                $achado = array_keys(
                    array_filter(
                        $tags,
                        function ($value) use ($tag) {
                            return ($value['name'] == $tag);
                        }
                    )
                );

                if (!$achado) {
                    if ($tag != '200' && $tag != '400') {
                        array_push($tags, [
                            'name' => $tag,
                            'status' => 'inactive'
                        ]);
                    }
                }
            }


            // fim Verificando as tags
            $data = [
                "tags" => $tags
            ];

            $url    = "https://us17.api.mailchimp.com/3.0/lists/2c9bc31955/members/{$dados['emails'][$item['EMAIL_USU']]['uid']}/tags";
            $result = json_decode(Curl($url, json_encode($data), $http_status, $header, 'POST'));
            if (isset($result) && $result->status == 400) {
                array_push($msg, $result->detail);
            }
        }

        $dados['msg'] = $msg;
    }

    return $msg;
}
