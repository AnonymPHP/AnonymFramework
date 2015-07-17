<?php

namespace Anonym\Security\CsrfTokenCryptMethods;

interface CsrfCryptMethodInterface {
    public function encrypt($string = '');
}
