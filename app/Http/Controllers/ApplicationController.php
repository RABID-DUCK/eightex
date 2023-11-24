<?php

namespace App\Http\Controllers;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Models\LeadModel;
use App\Actions\ApplicationActions;
use App\Models\AmoToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\OAuth2\Client\Token\AccessToken;
use Revolution\Google\Sheets\Facades\Sheets;
use App\Models\GoogleToken;


class ApplicationController extends Controller
{
    protected $page = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Actions\ApplicationActions  $applicationActions
     * @return \Illuminate\Http\Response
     */
    public function store( ApplicationActions $applicationActions)
    {
        $applicationActions->execute();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLeads(ApplicationActions $actions, Request $request)
    {
//        $table1 = AmoToken::where('id', 2)->first();
//        $actions->getToken2($table1->base_domain, $table1->client_id, $table1->client_secret, $table1->code, $table1->redirect_uri);
        $table = AmoToken::where('id', 2)->first();

        $clientId = $table->client_id;
        $clientSecret = $table->client_secret;
        $redirectUri = 'https://webhook.site/90dca12e-81f1-4532-9a6f-5d336315b815';
        $accessToken = $table->access_token;
        $refreshToken = $table->refresh_token;

        $apiClient = new AmoCRMApiClient($clientId, $clientSecret, $redirectUri);

        $accessToken = new AccessToken(['access_token' => $accessToken, 'refresh_token' => $refreshToken, 'expires' => $table->expires_in]);
        $apiClient->setAccessToken($accessToken);
        $accountDomain = $apiClient->getOAuthClient()
            ->getAccountDomain($accessToken);
        $apiClient->setAccountBaseDomain('amo.si/K/J5BUXX/J4XUA3');
        $apiClient->setAccessToken($accessToken)
            ->setAccountBaseDomain('amo.si/K/J5BUXX/J4XUA3')
            ->onAccessTokenRefresh(
                function (\League\OAuth2\Client\Token\AccessTokenInterface $accessToken, string $baseDomain) {
                    $this->saveToken(
                        [
                            'accessToken' => $accessToken->getToken(),
                            'refreshToken' => $accessToken->getRefreshToken(),
                            'expires' => $accessToken->getExpires(),
                            'baseDomain' => 'amo.si/K/J5BUXX/J4XUA3',
                        ]
                    );
                });

        set_time_limit(2000);
        $data = [];
        $page = $request->page;
        $range = $request->range;

        $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$page";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $accessToken"
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $deals = json_decode($response, true);

        if(isset($deals['status']) && $deals['status'] === 401){
            $this->saveToken();
            $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$page";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer $accessToken"
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $deals = json_decode($response, true);
            $data[] = $deals['_embedded']['leads'];
        }

        if (!empty($deals)) {
            $data = array_merge($data, $deals['_embedded']['leads']);
        }else{
            dd();
        }
        $dealsData = $this->getLeadsArray($accessToken, $data);

        $actions->saveModelsAndSheet2($dealsData, $range);
        echo "<h1>Данные выгружены</h1>";
        echo "<a href='" . redirect()->to('/admin') . "'>Вернуться</a>";
    }

    function saveToken($arr = []) {
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

    function getLeadsArray($access_token, $deals){
        $data = [];
        set_time_limit(7200);
//        $url = "https://eightex.amocrm.ru/api/v4/leads/custom_fields";
        foreach ($deals as $deal) {
            if(isset($deal)){
                $item = [
                    'id' => $deal['id'] ?? '',
                    'name' => $deal['name'] ?? '',
                    'status_id' => $deal['status_id'] ?? '',
                    'responsible' => $this->getFields('/api/v4/users/'.$deal['responsible_user_id'], $access_token)['name'],
                    'price' => isset($deal['price']) ? $deal['price'] . ".руб" : '',
                    'account_id' => '',
                    'city_contact' => '',
                    'russia' => '',
                    'phone' => '',
                    'manager' => '',
                    'balance' => '',
                    'address_warehouse' => '',
                    'post' => '',
                    'partner' => '',
                    'note' => '',
                    'pipeline' => $this->getFields('/api/v4/leads/pipelines/'.$deal['pipeline_id'], $access_token)['name'],
                    'is_deleted' => $deal['is_deleted'] === false ? "нет" : "да",
                    'closed_at' => $deal['closed_at'] != null ? Carbon::createFromTimestampUTC($deal['closed_at'])->toDateTimeString() : '',
                    'created_at' => Carbon::createFromTimestampUTC($deal['created_at'])->toDateTimeString(),
                    'updated_at' => Carbon::createFromTimestampUTC($deal['updated_at'])->toDateTimeString(),
                ];

                if(isset($deal['_embedded']['tags']) && !empty($deal['_embedded']['tags'])){
                    foreach ($deal['_embedded']['tags'] as $tag){
                        if(isset($tag['id']) && !empty($tag['id'])){
                            if($tag['id'] == 362521 || $tag['id'] == 557765 || $tag['id'] == 557771 || $tag['id'] == 557797
                                || $tag['id'] == 557767 || $tag['id'] == 557769 || $tag['id'] == 557791 || $tag['id'] == 557773
                                || $tag['id'] == 248787 || $tag['id'] == 559225 || $tag['id'] == 248789
                                || $tag['id'] == 248791 || $tag['id'] == 248793 || $tag['id'] == 248795){
                                $item = array_merge($item, $this->getFieldsTags($deal['_embedded']['tags']));
                            }
                        }
                    }
                }

                if(isset($deal['_embedded']['contacts']) && !empty($deal['_embedded']['contacts'])){
                    $contacts = $this->getFields('/api/v4/contacts/'. $deal['_embedded']['contacts'][0]['id'], $access_token);
                    if(isset($contacts) && !empty($contacts)){
                        if(isset($contacts['custom_fields_values']) && !empty($contacts['custom_fields_values'])){
                            foreach ($contacts['custom_fields_values'] as $custom_fields_value) {
                                switch ($custom_fields_value['field_id']){
                                    case 557765:
                                    case 39444979:
                                        $item['account_id'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557793:
                                        $item['city_contact'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557773:
                                        $item['russia'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 248789:
                                        $item['phone'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557767:
                                        $item['manager'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557771:
                                        $item['balance'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557795:
                                        $item['address_warehouse'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 248787:
                                        $item['post'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557791:
                                        $item['partner'] = $custom_fields_value['values'][0]['value'];
                                        break;
                                    case 557775:
                                        $item['note'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }
                        $item = array_merge($item, [
                            'name_contact' => $contacts['name'],
                        ]);
                    }

                    if(isset($deal['custom_fields_values']) && !empty($deal['custom_fields_values'])){
                        foreach ($deal['custom_fields_values'] as $tag){
                            if($tag['field_id'] == 567705 || $tag['field_id'] == 567701 || $tag['field_id'] == 559937 || $tag['field_id'] == 363163
                                || $tag['field_id'] == 558497 || $tag['field_id'] == 559355 || $tag['field_id'] == 557831 || $tag['field_id'] == 562043
                                || $tag['field_id'] == 562045 || $tag['field_id'] == 557699 || $tag['field_id'] == 519667 || $tag['field_id'] == 561967
                                || $tag['field_id'] == 561969 || $tag['field_id'] == 567695 || $tag['field_id'] == 567697 || $tag['field_id'] == 567703
                                || $tag['field_id'] == 567709 || $tag['field_id'] == 567707  || $tag['field_id'] == 557705 || $tag['field_id'] == 559249
                                || $tag['field_id'] == 559477 || $tag['field_id'] == 559479 || $tag['field_id'] == 559481 || $tag['field_id'] == 561957
                                || $tag['field_id'] == 561959 || $tag['field_id'] == 561961 || $tag['field_id'] == 561963 || $tag['field_id'] == 559239
                                || $tag['field_id'] == 559237 || $tag['field_id'] == 557707){
                                $item = array_merge($item, $this->getFieldsCustom($deal['custom_fields_values']));
                            }
                        }
                    }
                }
                $data[] = $item;
            }
        }

        return $data;
//        return json_decode($response, true);
    }

    function getFields($url, $access_token){
        $curl = curl_init("https://eightex.amocrm.ru" . $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $access_token"
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    function getFieldsCustom($data) {
        if(isset($data) && $data > 0){
            $items = [
                'source' => '',
                'name_contact' => '',
                'phone' => '',
                'comment' => '',
                'data_issue' => '',
                'reasons_refusal' => '',
                'city' => '',
                'volume' => '',
                'weight' => '',
                'product' => '',
                'advertisement' => '',
                'city_contact' => '',
                'url_advertisement' => '',
                'price' => '',
                'a5_type_source' => '',
                'a5_account' => '',
                'a5_link' => '',
                'a5_messenger_avito' => '',
                'a5_profile_avito' => '',
                'web' => ''
            ];
            foreach($data as $custom){
                if (isset($custom['field_id'])){
                    switch ($custom['field_id']){
                        case 559937:
                        case 559237:
                            $items['source'] = $custom['values'][0]['value'];
                            break;
                        case 558497:
                            $items['name_contact'] = $custom['values'][0]['value'];
                            break;
                        case 559355:
                            $items['phone'] = $custom['values'][0]['value'];
                            break;
                        case 559247:
                            $items['city_contact'] = $custom['values'][0]['value'];
                            break;
                        case 557831:
                            $items['comment'] = $custom['values'][0]['value'];
                            break;
                        case 562043:
                            $items['data_issue'] = Carbon::createFromTimestampUTC($custom['values'][0]['value'])->toDateTimeString();
                            break;
                        case 562045:
                            $items['reasons_refusal'] = $custom['values'][0]['value'];
                            break;
                        case 567705:
                        case 557699:
                            $items['city'] = $custom['values'][0]['value'];
                            break;
                        case 559477:
                            $items['product'] = $custom['values'][0]['value'];
                            break;
                        case 559479:
                            $items['weight'] = $custom['values'][0]['value'];
                            break;
                        case 559481:
                            $items['volume'] = $custom['values'][0]['value'];
                            break;
                        case 561957:
                        case 557705:
                        case 561961:
                        case 561967:
                            $items['advertisement'] = $custom['values'][0]['value'];
                            break;
                        case 557707:
                        case 561959:
                        case 561963:
                        case 561969:
                            $items['url_advertisement'] = $custom['values'][0]['value'];
                            break;
                        case 567701:
                            $items['price'] = $custom['values'][0]['value'];
                            break;
                        case 567695:
                            $items['a5_type_source'] = $custom['values'][0]['value'];
                            break;
                        case 567697:
                            $items['a5_account'] = $custom['values'][0]['value'];
                            break;
                        case 567703:
                            $items['a5_link'] = $custom['values'][0]['value'];
                            break;
                        case 567709:
                            $items['a5_messenger_avito'] = $custom['values'][0]['value'];
                            break;
                        case 567707:
                            $items['a5_profile_avito'] = $custom['values'][0]['value'];
                            break;
                        case 559249:
                        case 559239:
                            $items['web'] = $custom['values'][0]['value'];
                            break;
                        default:
                            break;
                    }
                }
            }
            return $items;
        }

    }

    function getFieldsTags($data){
        if(isset($data) && !empty($data)){
            $items = [
                'wechat' => '',
                'advertisement' => '',
                'phone_company' => '',
                'email_company' => '',
                'web' => '',
                'address_company' => '',
                'unknown' => '',
            ];
            foreach($data as $custom){
                if (isset($custom['id'])){
                    switch ($custom['id']){

                        case 362521:
                            $items['unknown'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 557797:
                            $items['wechat'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 557769:
                            $items['advertisement'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 248789:
                            $items['phone_company'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 248791:
                            $items['email_company'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 248793:
                            $items['web'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        case 248795:
                            $items['address_company'] = $custom['name'] ?? $custom['values'][0]['value'] ?? ''; // net
                            break;
                        default:
                            break;
                    }
                }
            }
            return $items;
        }

    }

    public function getLeadsAdmin(ApplicationActions $actions)
    {
        $table = AmoToken::where('id', 2)->first();

        $clientId = $table->client_id;
        $clientSecret = $table->client_secret;
        $redirectUri = 'https://webhook.site/90dca12e-81f1-4532-9a6f-5d336315b815';
        $accessToken = $table->access_token;
        $refreshToken = $table->refresh_token;

        $apiClient = new AmoCRMApiClient($clientId, $clientSecret, $redirectUri);

        $accessToken = new AccessToken(['access_token' => $accessToken, 'refresh_token' => $refreshToken, 'expires' => $table->expires_in]);
        $apiClient->setAccessToken($accessToken);
        $apiClient->setAccountBaseDomain('amo.si/K/J5BUXX/J4XUA3');
        $apiClient->setAccessToken($accessToken)
            ->setAccountBaseDomain('amo.si/K/J5BUXX/J4XUA3')
            ->onAccessTokenRefresh(
                function (\League\OAuth2\Client\Token\AccessTokenInterface $accessToken, string $baseDomain) {
                    $this->saveToken(
                        [
                            'accessToken' => $accessToken->getToken(),
                            'refreshToken' => $accessToken->getRefreshToken(),
                            'expires' => $accessToken->getExpires(),
                            'baseDomain' => 'amo.si/K/J5BUXX/J4XUA3',
                        ]
                    );
                });

        $data = [];
//        for ($i = 9; $i <= 11; $i++){
//            $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$i";
//
//            $curl = curl_init($url);
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($curl, CURLOPT_HTTPHEADER, [
//                "Authorization: Bearer $accessToken"
//            ]);
//            $response = curl_exec($curl);
//            curl_close($curl);
//            $deals = json_decode($response, true);
//            if(isset($deals['status']) && $deals['status'] === 401){
//                $this->saveToken();
//                $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$i";
//
//                $curl = curl_init($url);
//                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//                curl_setopt($curl, CURLOPT_HTTPHEADER, [
//                    "Authorization: Bearer $accessToken"
//                ]);
//                $response = curl_exec($curl);
//                curl_close($curl);
//                $deals = json_decode($response, true);
//                if(!isset($deals) && $deals === null) continue; // Пропускаем итерацию, если массив равен null
//                $data[] = $deals['_embedded']['leads'];
//            }
//            if(!isset($deals) && $deals === null) continue; // Пропускаем итерацию, если массив равен null
//            $data[] = $deals['_embedded']['leads'];
//        }
//        if(count($data) > 1){
//            foreach ($data as $item){
//                $data = array_merge($data, $item);
//            }
//        }
        $page = 10;
        $range = 2252;

        do{
            $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$page";

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer $accessToken"
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $deals = json_decode($response, true);
            if(isset($deals['status']) && $deals['status'] === 401){
                $this->saveToken();
                $url = "https://eightex.amocrm.ru/api/v4/leads?with=contacts,companies,catalog_elements&page=$page";

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                    "Authorization: Bearer $accessToken"
                ]);
                $response = curl_exec($curl);
                curl_close($curl);
                $deals = json_decode($response, true);

                if(!isset($deals) && $deals === null) continue; // Пропускаем итерацию, если массив равен null
                foreach ($deals['_embedded']['leads'] as $lead){
                    $data[] = $lead;
                }
            }
            if(!isset($deals) && $deals === null) {
                continue;
            } // Пропускаем итерацию, если массив равен null

            foreach ($deals['_embedded']['leads'] as $lead){
                $data[] = $lead;
            }

            $page++;
            $range += 249;
        }while(isset($deals) && $deals !== null);

        $dealsData = $this->getLeadsArray($accessToken, $data);

        $actions->saveModelsAndSheet2($dealsData, $range);
        echo "<h1>Данные выгружены</h1>";
        echo "<a style='background-color: black; color: white; text-decoration: none; padding: 10px 20px; font-size: 20px;' href='/admin'>Вернуться</a>";
    }
}
