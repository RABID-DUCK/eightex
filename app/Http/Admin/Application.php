<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
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
 * Class Application
 *
 * @property \App\Models\Application $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Application extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title ='Входящие заявки';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setTitle('Заявки')->setPriority(100)->setIcon('fa fa-tasks');
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
                AdminColumn::datetime('created_at','Дата создания')->setFormat('d.m.Y m:h '),
                AdminColumn::text('name','Имя'),
                AdminColumn::text('phone','Телефон'),
                AdminColumn::text('product_name','Имя продукта'),
                AdminColumn::text('product_weight','Вес'),
                AdminColumn::text('product_volume','Объем'),


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
            AdminFormElement::text('name', 'Имя')->setReadonly(1),
            AdminFormElement::text('phone', 'Телефон')->setReadonly(1),
            AdminFormElement::text('product_name', 'Имя продукта')->setReadonly(1),
            AdminFormElement::text('product_weight', 'Вес')->setReadonly(1),
            AdminFormElement::text('product_volume', 'Объем')->setReadonly(1),

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
