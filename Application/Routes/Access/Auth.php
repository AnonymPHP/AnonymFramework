<?php

	namespace Application\Routes\Access;

	 use Anonym\Helpers\Access\Interfaces\HandleInterface;
	 use Anonym\Http\Request;

	 /**
	  *
	  * AnonymFramework accessManager test dosyası
	  *
	  */
	 class Auth implements HandleInterface
	 {

		  /**
			* @param Request $request Ön tanımlı olarak gelen Http\Request 'e ait bir örnek.
			* @param callable $next Rötalandırma sınıfında ->setNext() ile atanan değer
			* @param null $role Rötalandırma sınıfında ->setRole() ile atanan değer
			*/

		  public function handle (Request $request, callable $next = null, $role = null)
		  {

				$user = $request->user ();
				if ( !$user->hasRole ('read') ) {


				}

		  }

	 }
