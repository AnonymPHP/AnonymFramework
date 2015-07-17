<?php

namespace Anonym\Debug;


use Anonym\Adapter\AdapterInterface;

/**
 * Class DatabaseListener
 *
 * @package Anonym\Debug
 */
class DatabaseListener implements AdapterInterface, DebugInterface {

    private $databaseList;
    public function getName()
    {
        return "database";
    }

    /**
     * Sınıfı başlatır
     */
    public function boot()
    {
        $this->databaseList = [];
    }

    /**
     * Dinlenen içeriğe yenisini ekler
     * @param string $list
     */
    public function addToList($list = '')
    {
        $this->databaseList[] = $list;
    }

    /**
     * Sınıfı temizler
     * @return $this
     */
    public function clean()
    {
        $this->boot();
        return $this;
    }

    /**
     * Tüm verileri döndürür
     * @return mixed
     */
    public function getAll()
    {
        return $this->databaseList;
    }

}