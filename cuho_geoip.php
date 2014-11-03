<?php
	/**
	* Customhost software
	* Geo-redirects module for the ExpressionEngine
	*
	* @package	cuho_georedirect
	* @version	1.4
	* @author 	Artem Oliynyk of Customhost
	* @copyright	Copyright (c), Customhost  2013
	* @license	GNU GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
	* @link		http://cuho.eu/
	*
	* 
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	* GNU General Public License for more details.
	*/
	
	class cuho_geoip {
		private $available = false;
		private $third_party = false;
		
		private $third_party_instance = null;
		
		private $geoip_db = '';
		
		public function __construct() {
			
			$this->third_party_path = dirname( __FILE__ ) . "/geoip-api-php/";
			$this->geoip_db = "{$this->third_party_path}/GeoIP.dat";
			
			// check for the native pecl-geoip and include 3-rd party libarary if there are no native lib
			if( function_exists( 'geoip_country_code_by_name' ) ) {
				$this->available = true;
			}
			else {
				
				include_once( "{$this->third_party_path}/geoip.inc" );
				include_once( "{$this->third_party_path}/geoipregionvars.php" );
				
				// if 3-rd party lib was included -- check for the valid database
				if( function_exists( 'geoip_country_code_by_name' ) ) {
					
					// check for the GeoIP database
					if( file_exists( $this->geoip_db ) && is_readable( $this->geoip_db ) && is_file( $this->geoip_db ) ) {
						$this->third_party_instance = geoip_open( $this->geoip_db, GEOIP_STANDARD );
					}
					
					if( !is_null( $this->third_party_instance ) && is_object( $this->third_party_instance ) ) {
						$this->available = true;
						$this->third_party = true;
					}
				}
			}
		}
		
		public function isAvailable() {
			return $this->available;
		}
		
		public function __call( $name, $arguments ) {
			if( 0 === strpos( $name, 'geoip_' ) && function_exists( $name ) ) {
				
				if( $this->third_party ) {
					array_unshift( $arguments, $this->third_party_instance );
					
					if( $name == 'geoip_country_code_by_name' ) {
						$name = 'geoip_country_code_by_addr';
					}
					
				}
				
				return call_user_func_array( $name, $arguments );
			}
			
			trigger_error( "No such function: {$name}", E_USER_WARNING );
			return false;
		}
	}