<?php

    /**
     *  AnonymFramework Delete Builder -> delete sorgular� haz�rlan�r
     *
     * @package  Anonym\Database\Mode;
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright (c) 2015, MyfcYazilim
     */

    namespace Anonym\Database\Mode;

    use Anonym\Database\Base;
    use Anonym\Database\Builders\Where;

    class Delete extends ModeManager
    {

        public function __construct(Base $base)
        {

            $this->setBase($base);
            $this->useBuilders([

               'where' => new Where(),
            ]);

            $this->string = [

               'from'       => $this->getBase()->getTable(),
               'where'      => null,
               'parameters' => [],
            ];

            $this->setChield($this);

            $this->setChieldPattern('delete');
        }
    }
