<?php

    namespace Anonym\Route;

    /**
     * Handle Fonksiyonu'nun kullanılmasını zorunlu kılar
     * Interface RouteHandleInterface
     *
     * @package Anonym\Route
     */

    interface ShouldBeRoute
    {
        public function handle();
    }
