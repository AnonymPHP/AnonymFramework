<?php



    namespace Anonym\Helpers\Access\Interfaces;

    use Anonym\Http\Request;

    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    interface Handle
    {

        public function handle(Request $request, callable $next = null, $role = null);
    }
