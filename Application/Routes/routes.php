<?php
    /**
     *  Bu Dosya içinde Rötalarınızı toplayabilirsiniz
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    use Anonym\Facade\Route;
    use Anonym\Route\Http\ControllerManager;

    Route::get('/', function (ControllerManager $manager) {
       return $manager->setController('Index::open');
    });
