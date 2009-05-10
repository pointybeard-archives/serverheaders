<?php

	require_once(TOOLKIT . '/class.datasource.php');
	
	Class datasourceServer_Headers extends Datasource{

		function about(){
			return array(
					 'name' => 'Server Headers',
					 'author' => array(
							'name' => 'Alistair Kearney',
							'website' => 'http://21degrees.com.au',
							'email' => 'alistair@21degrees.com.au'),
					 'version' => '1.1',
					 'release-date' => '2008-08-19');	
		}

		function grab(&$param_pool){
			
			$result = new XMLElement("server-headers");
			
			$included = array(
				'HTTP_REFERER',
				'HTTP_USER_AGENT',
				'HTTP_HOST',
				'SERVER_NAME',
				'SERVER_ADDR',
				'SERVER_PORT',
				'REMOTE_ADDR',
				'QUERY_STRING',
				'HTTP_X_FORWARDED_FOR'
			);
			
			foreach($included as $header){
				if(strlen(trim($_SERVER[$header])) == 0) continue;
				$result->appendChild(new XMLElement(strtolower(str_replace('_', '-', $header)), General::sanitize($_SERVER[$header])));
			}
			
			return $result;
			
		}
	}