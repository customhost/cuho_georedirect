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
	
	class Cuho_georedirect {
		private $EE;
		
		private $enabled = false;
		private $show_popup = false;
		
		private $message = '';
		private $url = '';
		
		function __construct() {
			$this->EE = &get_instance();
			$this->EE->lang->loadfile( 'cuho_georedirect' );
			
			require_once( dirname( __FILE__ ) . "/cuho_geoip.php" );
			
			$this->cuho_geoip = new cuho_geoip();
			
			if( $this->cuho_geoip->isAvailable() ) {
				
				$country = @$this->cuho_geoip->geoip_country_code_by_name( $_SERVER['REMOTE_ADDR'] );
				
				if( !empty( $country ) ) {
					
					// Get redirect rule for the country
					$country = $this->EE->db->escape( $country );
					
					$rule_sql = $this->EE->db->query( "SELECT * FROM `exp_cuho_georedirect_rules` WHERE `country` = {$country}" );
					
					$rule = null;
					if( $rule_sql->num_rows() > 0 ) {
						$rule = $rule_sql->row_array();
					}
					
					if( !is_null( $rule ) ) {
						
						$this->url = $rule['url'];

						// Rules should fire ONCE
						if( isset( $_COOKIE['cuho_georedirect'] ) && $_COOKIE['cuho_georedirect'] == 79 ) {
							$this->enabled = false;
							return;
						}

						// User choose "never"
						if( isset( $_COOKIE['cuho_georedirect'] ) && $_COOKIE['cuho_georedirect'] == 78 ) {
							$this->enabled = false;
							return;
						}
						
						// User choose "redirect"
						$autoredirect = false;
						if( isset( $_COOKIE['cuho_georedirect'] ) && $_COOKIE['cuho_georedirect'] == 77 ) {
							$autoredirect = true;
						}
						
						
						// Get redirect method
						$method_sql = $this->EE->db->query( "SELECT `value` FROM `exp_cuho_georedirect_settings` WHERE `key` = 'method'" );
						
						if( $method_sql->num_rows() > 0 ) {
							$method = intval( $method_sql->row('value') );
						}
						
						// Redirect once
						if( $method == 2 ) {
							$cookies_live = 86400 * 30 * 12 ;
							setcookie( 'cuho_georedirect', 79, time() + $cookies_live );
							$this->EE->functions->redirect( $this->url );
							die();
						}
						elseif( $method == 1 || $autoredirect ) {
							$this->EE->functions->redirect( $this->url );
							die();
						}
						else {
							$this->enabled = true;
							
							if( isset( $_GET['cuho_georedirect'] ) ) {
								$cookies_live = 86400 * 30 * 12 ;
								if( $_GET['cuho_georedirect'] == 'redirect' ) {
									setcookie( 'cuho_georedirect', 77, time() + $cookies_live );
									
									$this->EE->functions->redirect( $this->url );
									die();
								}
								
								if( $_GET['cuho_georedirect'] == 'never' ) {
									setcookie( 'cuho_georedirect', 78, time() + $cookies_live );
									
									$this->EE->functions->redirect( $this->EE->functions->fetch_current_uri() );
									die();
								}
							}
							
							$this->title = $rule['title'];
							$this->message = $rule['text'];
							$this->show_popup = true;
						}
					}
				}
			}
			
		}
		
		function checkRedirect() {
			
			if( $this->enabled && $this->show_popup ) {
				
				$vars = array(
					'url' => $this->url,
					'title' => $this->title,
					'message' => $this->message,
				);
				
				return $this->EE->load->view('frontend/popup', $vars, TRUE);
			}
		}
	}