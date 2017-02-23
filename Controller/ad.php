<?php

	namespace Aff\Ad\Controller;

	use Aff\Framework,
		Aff\Ad\Model,
		Aff\Config,
		Aff\Ad\Core;


	class ad extends Core\ControllerAbstract
	{

		public function __construct ( Framework\Registry $registry )
		{
			parent::__construct( $registry );
		}


		public function route ( )
        {
        	echo Config\Ad::REDIS_CONFIG;die(' ok');
        	$ad = new Model\Ad(
        		$this->_registry,
        		new Framework\Database\Redis\Predis( Config\Ad::REDIS_CONFIG ),
        		new Framework\Device\Detection\Piwik(),
        		new Framework\TCP\Geolocation\Source\IP2Location( Config\Ad::IP2LOCATION_BIN )
        	);

        	$ad->render();

            $this->render( 'ad/index' );
        }

	}

?>