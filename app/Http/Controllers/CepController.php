<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CepController extends Controller
{
    /**
     * Return a CEP Json.
     *
     * @param Illuminate\Http\Request
     * @return json
     */
    public function index(Request $request)
    {
        $p = $request['address'];

        //Inicia arquivo temporario para os cookies
        global $ck_file;
        $ck_file = 'd:\\tmp\\' . substr(bin2hex(random_bytes(8)), 0, 8) . '.tmp';

        //Inicia captura de dados
        $rst = $this->capture_data($p);

        //Exibe a resposta
        return json_encode($rst);
    }

    /**
     * Captura dados no Correios.
     *
     * @param string
     * @return class
     */
    public function capture_data($p)
    {
        //Acessa o site do Correios
        $html = $this->curl([
            "url" => "https://buscacepinter.correios.com.br/app/endereco/carrega-cep-endereco.php",
            "posts" => [
                "pagina" => "/app/endereco/index.php",
                "endereco" => urldecode($p),
                "tipoCEP" => "ALL"
            ]
        ]);

        $html = json_decode(str_replace("\n", '', substr($html, strpos($html, "{"), strlen($html))));
            $i = 0;
        //dd($html);
        foreach ($html->dados as $addres) {

            $logadouros = explode(" - ", $addres->logradouroDNEC, 2);
            $logadouros[1] = !empty($logadouros[1]) ? $logadouros[1] : '';

            //dd($logadouros);

            $rst[$i] = json_decode(
                        '{"cep": "' . $addres->cep . '", 
                        "logradouro": "' . $logadouros[0] . '", 
                        "complemento": "' . $logadouros[1] . '", 
                        "bairro": "' . $addres->bairro . '", 
                        "localidade": "' . $addres->localidade . '", 
                        "uf": "' . $addres->uf . '"}'
            );

            $i++;
        }

        if (empty($rst)) {
            $rst = json_decode('{"error": "true"}');
        }
        //dd($rst);

        return $rst;
    }

    /**
     * Inicia o CURL do PHP para acessar o site.
     *
     * @param array
     * @return string
     */
    function curl($p)
    {
        global $ck_file;

        $ch = curl_init($p["url"]);

        curl_setopt($ch, CURLOPT_URL, $p["url"]);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 12);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 2);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $ck_file);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $ck_file);
        curl_setopt($ch, CURLOPT_POST, 1);

        if (isset($p["headers"])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $p["headers"]);
        }

        if (isset($p["posts"])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $p["posts"]);
        }

        if (curl_exec($ch) === false) {
            $rst = curl_error($ch);
        } else {
            $rst = curl_exec($ch);
        }
        //reconecta();
        curl_close($ch);

        return $rst;
    }
}
