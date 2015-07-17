<?php

    namespace Anonym\View;

    /**
     * Bu interface ile sınıfın view dosyası olması gerektiğini söylüyoruz
     * Interface ShouldBeView
     *
     * @package Anonym\View
     */
    interface ShouldBeView
    {

        public static function make($fileName = '', $params = []);

        public function execute();
    }
