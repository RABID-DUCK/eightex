<?php

namespace App\Http\Controllers;

use App\Models\AmoToken;
use DateTimeInterface;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function saveToken() {
        $link = 'https://eightex.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса
        $table1 = AmoToken::where('id', 2)->first();

        $data = [
            'client_id' => $table1->client_id,
            'client_secret' => $table1->client_secret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $table1->refresh_token,
            'redirect_uri' => 'https://webhook.site/90dca12e-81f1-4532-9a6f-5d336315b815',
        ];

        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        /** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
        $code = (int)$code;
        $errors = [
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable',
        ];

        try
        {
            /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
            if ($code < 200 || $code > 204) {
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
            }
        }
        catch(\Exception $e)
        {
            die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
        }

        /**
         * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
         * нам придётся перевести ответ в формат, понятный PHP
         */
        $response = json_decode($out, true);

        $access_token = $response['access_token']; //Access токен
        $refresh_token = $response['refresh_token']; //Refresh токен
        $token_type = $response['token_type']; //Тип токена
        $expires_in = $response['expires_in']; //Через сколько действие токена истекает

        $table = AmoToken::where('id', 2)->first();
        $table->access_token = $access_token;
        $table->refresh_token = $refresh_token;
        $table->save();
    }

    function sendMessageToAmoCRM(Request $request) {
        $data = $request->validate(['message' => 'required']);

        $lead_id = 26670724;
        $api_url = 'https://your_subdomain.amocrm.com/private/v2/';
        $table = AmoToken::where('id', 2)->first();
        $api_token = $table->access_token;

        $this->registerChannel();

        $api_headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_token
        );

        $post_data = array(
            'LEAD_ID' => $lead_id,
            'TEXT' => $data['message']
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url . 'leads/' . $lead_id . '/messages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    function getMessagesFromAmoCRM() {
        $lead_id = 26670724;
        $api_url = 'https://your_subdomain.amocrm.com/private/v2/';
        $api_token = 'your_api_token';
        $api_headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_token
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url . 'leads/' . $lead_id . '/messages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $api_headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    private function registerChannel(){
        $table = AmoToken::where('id', 2)->first();
        $client_secret = $table->client_secret;

        $secret = $client_secret;
        $method = 'POST';
        $contentType = 'application/json';
        $date = date(DateTimeInterface::RFC2822);
        $path = '/v2/origin/custom/f90ba33d-c9d9-44da-b76c-c349b0ecbe41/connect';

        $url = "https://amojo.amocrm.ru" . $path;

        $body = [
            'account_id' => '28911a52-7a0b-43da-a60c-b1dbdc971699',
            'title' => 'ScopeTitle', //Название вашего канала, отображаемое пользователю
            'hook_api_version' => 'v2',
        ];
        $requestBody = json_encode($body);
        $checkSum = md5($requestBody);

        $str = implode("\n", [
            strtoupper($method),
            $checkSum,
            $contentType,
            $date,
            $path,
        ]);

        $signature = hash_hmac('sha1', $str, $secret);

        $headers = [
            'Date' => $date,
            'Content-Type' => $contentType,
            'Content-MD5' => strtolower($checkSum),
            'X-Signature' => strtolower($signature),
        ];

        $curlHeaders = [];
        foreach ($headers as $name => $value) {
            $curlHeaders[] = $name . ": " . $value;
        }

        echo $method . ' ' . $url . PHP_EOL;
        foreach ($curlHeaders as $header) {
            echo $header . PHP_EOL;
        }
        echo PHP_EOL . $requestBody . PHP_EOL;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $requestBody,
            CURLOPT_HTTPHEADER => $curlHeaders,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        if ($err) {
            $result = "cURL Error #:" . $err;
        } else {
            echo "Status: " . $info['http_code'] . PHP_EOL;
            echo $response . PHP_EOL;
        }
    }
}
