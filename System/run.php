<?php

    /**
     * Composer Autoloader'ın başlatılması
     *
     */

    include 'vendor/autoload.php';

    /**
     * Sabitlerin yüklenmesi
     *
     */
    include SYSTEM . 'bootstrap.php';

    /**
     *  Yardımcı fonksiyonların yüklenmesi
     */

    include SYSTEM . 'helpers.php';

    /**
     *  Uygulamanın başlatılması
     *
     */

    $app = new Application('AnonymFramework2Build', 1);



    /**
     *
     *  Rotalama olayının Application/Routes/routes.php den devam edeceğini bildirir.
     *  İstenilirse -> run ( den önce istenilen işlemler yapılabilir.
     *
     */

    include ROUTE . 'routes.php';

    /**
     *
     *  Uygulamayı Yürütür
     *
     */

    $app->run();


