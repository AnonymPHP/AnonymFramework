<?php

    namespace Anonym\Helpers\Access\Interfaces;

    use Anonym\Http\Request;

    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    interface Terminate
    {

        public function terminate(Request $request);
    }
