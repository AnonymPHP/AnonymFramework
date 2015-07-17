<?php


    namespace Anonym\Mail\Content;

    use Anonym\Mail\Content\Manager;

    /**
     *  belirli bir metin için kullanılır
     *
     * @package Anonym\Mail\Content
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */
    class Text implements ManagerInterface
    {

        private $content;


        public function __construct($content = '')
        {

            $this->content = $content;
        }

        public function getContent()
        {

            return $this->content;
        }

        public function setContent($content)
        {

            $this->content = $content;

            return $this;
        }
    }
