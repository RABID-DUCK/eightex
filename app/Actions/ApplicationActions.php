<?php

namespace App\Actions;

use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Collections\ContactsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;

use AmoCRM\Collections\LinksCollection;
use AmoCRM\Models\ContactModel;
use AmoCRM\Models\CustomFieldsValues\MultitextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\TextCustomFieldValuesModel;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\MultitextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueCollections\TextCustomFieldValueCollection;
use AmoCRM\Models\CustomFieldsValues\ValueModels\TextCustomFieldValueModel;
use AmoCRM\Models\LeadModel;
use App\Models\AmoToken;
use App\Models\Application;
use App\Models\GoogleToken;
use Barryvdh\Debugbar\Facades\Debugbar;
use Doctrine\DBAL\Schema\Schema;
use Exception;
use Google\Client;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use League\OAuth2\Client\Token\AccessToken;
use Revolution\Google\Sheets\Facades\Sheets;
use AmoCRM\Models\CustomFieldsValues\ValueModels\MultitextCustomFieldValueModel;

class ApplicationActions
{
    protected $requestArr;

    public function __construct(Request $request)
    {
        $this->requestArr = $request->all();
    }
    public function execute(){

        if ( Arr::get($this->requestArr, 'phone',false)){
            $applicationModel = $this->saveModelAndSheet();
            $this->saveAmoCrm($applicationModel);
        }

    }
    protected function saveModelAndSheet(){
        $requestArr = $this->requestArr;
        $dataApplication = [
            [
                date("H:i d.m.Y"),
                Arr::get($requestArr, 'name',''),
                Arr::get($requestArr, 'phone',''),
            ]
        ];
        $applicationModel = new Application();
        $applicationModel->name =  Arr::get($requestArr, 'name','');
        $applicationModel->phone =  Arr::get($requestArr, 'phone','');

        if(Arr::exists($requestArr, 'data')){
            $product_name =   Arr::get($requestArr,'data.product_name' ,'');
            $product_weight = Arr::get($requestArr,'data.product_weight' ,'');
            $product_volume = Arr::get($requestArr, 'data.product_volume' ,'');
            $otherData = [
                $product_name,
                $product_weight,
                $product_volume,
            ];
            $dataApplication[0] = array_merge($dataApplication[0],$otherData);
            $applicationModel->product_name =  $product_name;
            $applicationModel->product_weight =  $product_weight;
            $applicationModel->product_volume =  $product_volume;
        }
        $applicationModel->save();
        foreach ($dataApplication[0] as $key=>$value ){
            if($value == null){
                $dataApplication[0][$key] = '';
            }
        }
        //Google sheetlist
        $googleTokensModelAll = GoogleToken::all();
        if($googleTokensModelAll){
            foreach ($googleTokensModelAll as $googleTokenModel) {
                Sheets::spreadsheet("1K4kvQHkjb7OSm1xOJMVcAcBbjT41gxQgbrTpIc7vI9E");
                Sheets::sheet('Sheet1')->append($dataApplication);
            }
        }
        return $applicationModel;
    }

    protected function saveAmoCrm($applicationModel){
        $amoTokenModelAll = AmoToken::all();
        if($amoTokenModelAll){
            foreach ($amoTokenModelAll as $amoTokenModel) {
                if($amoTokenModel->access_token){

                    $apiClient = $this->getApiClient($amoTokenModel);
                    $leadsService = $apiClient->leads();
                    $pipelinesService = $apiClient->pipelines();
//                    $pipelinesCollection = $pipelinesService->get();
//                    $pipelinesArr = $pipelinesCollection->all();

                    $lead = new LeadModel();
//                    foreach ($pipelinesArr as $pipelines){
//                        if($pipelines->name === $amoTokenModel->pipeline_name ){
//                            $lead->setPipelineId($pipelines->id);
//                        }
//                    }
                    $lead->setPipelineId("1752544");
                    $lead->setName('Заявка с сайта #eightex_'.$applicationModel->id);

                    $lead = $leadsService->addOne($lead);
                    //  $lead =$leadsService->updateOne($lead);

                    $lead = $this->setLeadCustomFields($lead,$leadsService,"559481",Arr::get($this->requestArr, 'data.product_volume' ,''));
                    $lead = $this->setLeadCustomFields($lead,$leadsService,"559479",Arr::get($this->requestArr,'data.product_weight' ,''));
                    $lead = $this->setLeadCustomFields($lead,$leadsService,"559477", Arr::get($this->requestArr,'data.product_name' ,''));

                    // create contact
                    $contact = new ContactModel();
                    $contact->setName(Arr::get($this->requestArr, 'name','Контакт с сайта #eightex_'.$applicationModel->id));

                    $contactModel = $apiClient->contacts()->addOne($contact);

                    $links = new LinksCollection();
                    $links->add($contactModel);
                    $apiClient->leads()->link($lead, $links);

                    $contact = $apiClient->contacts()->getOne($contactModel->getId());

                    $CustomFieldsValuesPhone = new CustomFieldsValuesCollection();
                    $phoneField = (new MultitextCustomFieldValuesModel())->setFieldCode('PHONE');
                    $phoneField->setValues(
                        (new MultitextCustomFieldValueCollection())
                            ->add(
                                (new MultitextCustomFieldValueModel())
                                    ->setEnum('WORKDD')
                                    ->setValue(Arr::get($this->requestArr, 'phone',''))
                            )
                    );
                    $CustomFieldsValuesPhone->add($phoneField);

                    $contact->setCustomFieldsValues($CustomFieldsValuesPhone);
                    $apiClient->contacts()->updateOne($contact);
                }
            }
        }
    }

    public function saveModelsAndSheet2($dealsData, $range)
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig(public_path('credentials.json'));

        $service = new Google_Service_Sheets($client);

        $spreadsheetId = '1iqsS-HnVqF_K1Ca3KsnuJkhY4VXhyr6Mkyi7IDvk29I';
        $sheetName = 'amoCRM';

        $range = $sheetName . '!A'.$range.':AF';
        $valueRange = new Google_Service_Sheets_ValueRange();
        $data = [];
        foreach ($dealsData as $deal){
            $rowData = [
                $deal['id'] ?? '',
                $deal['name'] ?? '',
                $deal['pipeline'] ?? '',
                $deal['price'] ?? '',
                $deal['product'] ?? '',
                isset($deal['weight']) ? $deal['weight'] . ".кг" : '',
                isset($deal['volume']) ? $deal['volume'] . ".м3" : '',
                $this->getStatusName($deal['status_id'] ?? ''),
                $deal['name_contact'] ?? '',
                $deal['phone'] ?? '',
                $deal['comment'] ?? '',
                $deal['city'] ?? '',
                $deal['data_issue'] ?? '',
                $deal['reasons_refusal'] ?? '',
                $deal['account_id'] ?? '',
                $deal['note'] ?? '',
                $deal['advertisement'] ?? '',
                $deal['url_advertisement'] ?? '',
                $deal['unknown'] ?? '',
                $deal['source'] ?? '',
                $deal['city_contact'] ?? '',
                $deal['manager'] ?? '',
                $deal['partner'] ?? '',
                $deal['russia'] ?? '',
                $deal['address_warehouse'] ?? '',
                $deal['post'] ?? '',
                $deal['balance'] ?? '',
                $deal['email_company'] ?? '',
                $deal['web'] ?? '',
                $deal['address_company'] ?? '',
                $deal['created_at'] ?? '',
                $deal['updated_at'] ?? '',
            ];
            $data[] = $rowData;
        }
        $valueRange->setValues($data);
        $options = [
            'valueInputOption' => 'RAW'
        ];

        $service->spreadsheets_values->update($spreadsheetId, $range, $valueRange, $options);
    }

    function getStatusName($statusId)
    {
        // Массив с соответствием id статусов и их названий
        $statusNames = [
            143 => "Новая",
            142 => "В работе",
            48341068 => "Завершена",
            48341065 => "Открытая сделка"
        ];

        // Получение названия статуса по его id
        if (array_key_exists($statusId, $statusNames)) {
            return $statusNames[$statusId];
        } else {
            return "Неизвестный статус";
        }
    }

    public function getApiClient($amoTokenModel){
        $accessToken =new AccessToken([
            'access_token' => $amoTokenModel->access_token,
            'expires_in'=>$amoTokenModel->expires_in,
            'refresh_token'=> $amoTokenModel->refresh_token
        ]);
        $apiClient = new AmoCRMApiClient( $amoTokenModel->client_id, $amoTokenModel->client_secret,$amoTokenModel->redirect_uri);

        $apiClient->setAccessToken($accessToken)
            ->setAccountBaseDomain($amoTokenModel->base_domain)
            ->onAccessTokenRefresh(function ($accessToken) use ($amoTokenModel) {
                $amoTokenModel->access_token = $accessToken->getToken();
                $amoTokenModel->refresh_token = $accessToken->getRefreshToken();
                $amoTokenModel->expires_in = $accessToken->getExpires();
                $amoTokenModel->save();
            });
        return $apiClient;
    }

    protected function getToken($domain, $client_id, $client_secret, $refresh_token, $redirect_url){
        $link = 'https://eightex.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

        $data = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token,
            'redirect_uri' => $redirect_url,
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
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
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

        return $access_token;
    }

    public function getToken2($domain, $client_id, $client_secret, $code, $redirect_url){
        $link = 'https://eightex.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

        $data = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'grant_type' => 'authorization_code',
            'code' => $code,
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
        return $table->save();
    }

    protected function setLeadCustomFields($lead,$leadsService,$field_id,$val){
        try {
            $lead = new LeadModel();
            $leadCustomFieldsValues = new CustomFieldsValuesCollection();
            $textCustomFieldValueModel = new TextCustomFieldValuesModel();
            $textCustomFieldValueModel->setFieldId($field_id);
            $textCustomFieldValueModel->setValues(
                (new TextCustomFieldValueCollection())->add((new TextCustomFieldValueModel())->setValue($val))
            );
            $leadCustomFieldsValues->add($textCustomFieldValueModel);
            $lead->setCustomFieldsValues($leadCustomFieldsValues);
            return $leadsService->addOne($lead);
        }catch (\AmoCRMApiException $e) {

            dd($leadsService->getLastRequestInfo());
        }

    }
}
