<?php
	 /**
	  *  Bu Dosya AnonymFramework' event sınıfını kullanıma hazırlar
	  * @author vahitserifsaglam <vahit.serif119@gmail.com>
	  */
	namespace Anonym\Event;

	 use Anonym\Application;

	 /**
	  * Class EventProvider
	  * @package Anonym\Manager\Providers
	  */
	 class EventProvider
	 {

		  /**
			* Event Dosyaları buraya girilir
			*  Girilim Biçimi
			*
			*  'EventSınıfı' => [
			*              'EventDinleyicisi1',
			*              'EventDinleyicisi2'
			*                   ]
			*
			* @var array
			*/
		  protected $events = [

				'Anonym\Events\Header' => [
					 'Anonym\Listeners\HeaderListener'
				],
				'Anonym\Events\Kategori' => [
					 'Anonym\Listeners\KategoriListener'
				],
				'Anonym\Events\Ders' => [
					 'Anonym\Listeners\DersListener'
				]
		  ];

		  /**
			* Events sınıfını oluşturur ve listener ları atar
			* @param Application $application
			*/
		  public function __construct (Application $application)
		  {
				$event = $application->singleton ('Anonym\Event\EventCollector', [ $application ]);
				$event->setListeners ($this->events);
				$application->singleton ('Anonym\Event', [ $event ]);


		  }
	 }
