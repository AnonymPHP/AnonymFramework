<?php
    /**
     * Bu sınıf AnonymFrameworkde Database sınıfında join komutları üretmek
     * için kullanılır
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Database\Builders;

    class Join
    {

        /**
         * Join Metnini oluşturur
         * @param array  $join
         * @param string $table
         * @return string
         */
        public function join(array $join = [], $table = '')
        {
            $string = '';

            foreach ($join as $type => $value)
                {
                    $string .= sprintf("%s %s ON %s.%s = %s.%s",$type, $value[0], $value[0], $value[1],$table, $value[2]);
                }

            return $string;
        }

    }