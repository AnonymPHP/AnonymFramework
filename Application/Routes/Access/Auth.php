<?php

	namespace Application\Routes\Access;

	 use Anonym\Route\AccessManager\Interfaces\Handle;
	 use Anonym\Http\Request;

	 /**
	  *
	  * AnonymFramework accessManager test dosyası
	  *
	  */
	 class Auth implements Handle
	 {

		  /**
		    *Access Manager tetiklendiği zaman çağrılacak fonksiyon
		    *
			* @param Request $request Ön tanımlı olarak gelen Http\Request 'e ait bir örnek.
			* @param callable $next Rötalandırma sınıfında ->setNext() ile atanan değer
			* @param null $role Rötalandırma sınıfında ->setRole() ile atanan değer
		    * @return mixed
		   */

		  public function handle (Request $request, callable $next = null, $role = null)
		  {

				$user = $request->user ();
				if ( !$user->hasRole ('read') ) {


				}

		  }

	 }
