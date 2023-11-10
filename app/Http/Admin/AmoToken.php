<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AmoCRM\Client\AmoCRMApiClient;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class AmoToken
 *
 * @property \App\Models\AmoToken $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class AmoToken extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Подключение к AMO CRM';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
      //  $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
        $this->created(function($config, \App\Models\AmoToken $model) {
            $apiClient = new AmoCRMApiClient( $model->client_id, $model->client_secret,$model->redirect_uri);

            $oauth = $apiClient->getOAuthClient();
            $oauth->setBaseDomain( $model->base_domain);
            $accessToken = $oauth->getAccessTokenByCode($model->code);
            $model->access_token = $accessToken->getToken();
            $model->refresh_token = $accessToken->getRefreshToken();
            $model->expires_in = $accessToken->getExpires();
            $model->save();
        });
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('client_id','ID интеграции'),
                AdminColumn::text('client_secret','Секретный ключ'),
                AdminColumn::text('redirect_uri','URL редирект'),
                AdminColumn::text('base_domain','Основной домен'),
                AdminColumn::text('code','Код авторизации'),
                AdminColumn::text('access_token','Токен доступа'),
                AdminColumn::text('refresh_token','Ключ для получения нового токена доступа'),

            ])->paginate(20);
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {

        return AdminForm::panel()->addBody([
            AdminFormElement::text('client_id', 'ID интеграции')->required(),
            AdminFormElement::text('client_secret', 'Секретный ключ')->required(),
            AdminFormElement::text('redirect_uri', 'URL редирект')->required(),
            AdminFormElement::text('base_domain', 'Основной домен')->required(),
            AdminFormElement::text('code', 'Код авторизации')->required(),
            AdminFormElement::text('pipeline_name', 'Имя воронки')->required(),
            AdminFormElement::text('volume_id', 'id поля VOLUME')->required(),
            AdminFormElement::text('weight_id', 'id поля WEIGHT')->required(),
            AdminFormElement::text('product_id', 'id поля PRODUCT')->required(),
        ])->setHtmlAttribute('enctype', 'multipart/form-data');
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {

        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
