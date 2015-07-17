<?php

namespace Anonym\Debug;

/**
 * Interface DebugInterface
 *
 * @package Anonym\Debug
 */

interface DebugInterface {

    public function addToList($list = []);
    public function clean();
    public function getAll();

}