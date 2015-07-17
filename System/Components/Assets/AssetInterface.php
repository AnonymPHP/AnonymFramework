<?php

    /**
     * Bu ınterface PathPackpage, UrlPackpage gibi assets dosyalarında kullanılmak üzere tasarlanmıştır.
     * Interface AssetInterface

     */

    namespace Anonym\Assets;

    /**
     * Interface AssetInterface
     *
     * @package Anonym\Assets
     */

    interface AssetInterface
    {

        public function getUrl($file = '');
    }
