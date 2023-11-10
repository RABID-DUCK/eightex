<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class);

return [

    [
        'title' => 'Настройки',
        'icon' => 'fa fa-wrench',
        'pages' => [
            (new Page(\App\User::class))->setTitle('Пользователи')
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Models\AmoToken::class))->setTitle('AMO CRM')
                ->setIcon('fa fa-book')
                ->setPriority(0),
            (new Page(\App\Models\GoogleToken::class))->setTitle('Google Sheet')
                ->setIcon('fa fa-calculator')
                ->setPriority(0),
            (new Page(\App\Models\GoogleToken::class))->setTitle('Выгрузить данные с amoCRM')
                ->setIcon('fa fa-table')
                ->setPriority(0)->setUrl('/getLeads'),
        ]
    ]
//    [
//        'title' => 'Заявки',
//        'icon'  => 'fas fa-tachometer-alt',
//        'url'   => route('admin.users'),
//    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fas fa-users')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
    //		      ));
    //
    //		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];
