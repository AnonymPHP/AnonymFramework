<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

return [


    /**
     * | --------------------------------
     * |
     * | encryption algorithm for mcrypt
     * |
     * | ---------------------------------
     */
    'alogirtym' => MCRYPT_RIJNDAEL_256,

    /**
     * | ----------------------------
     * |
     * | the random key for mcrypt
     * |
     * | ----------------------------
     */
    'rand' => MCRYPT_RAND,

    /**
     * | --------------------------------
     * |
     * | the encryption mode for mcrypt
     * |
     * | --------------------------------
     */
    'mode' => MCRYPT_MODE_ECB,

    /**
     * | --------------------------------
     * |
     * | the classname of crypter, Crypt class gonna use this.
     * |
     * | Avaible Classes : AnonymCrypt, Base64Crypt, Md5Crypt
     * | --------------------------------
     */
    'crypter' => \Anonym\Crypt\AnonymCrypt::class

]; 
