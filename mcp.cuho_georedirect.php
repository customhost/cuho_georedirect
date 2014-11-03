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
	
	if( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
	
	class cuho_georedirect_mcp {
		
		function __construct() {
    		
    		$this->EE = &get_instance();
    		
    		if( ! class_exists('EE_Template') ) {
				require APPPATH.'libraries/Template.php';
			}
			
    		$this->EE->TMPL = new EE_Template;
    		
    		$this->method = 0;
    		
    		// init GeoIP
    		require_once( dirname( __FILE__ ) . "/cuho_geoip.php" );
    		$this->cuho_geoip = new cuho_geoip();
    	}
		
		function index() {
			
			$this->EE->load->helper('form');
			
			$current_base = str_replace( 'index.php', '', $this->EE->functions->fetch_current_uri() );
			
			$module_cp_url = "{$current_base}{$_SERVER['REQUEST_URI']}";
			
			$form = $this->EE->functions->form_declaration(
				array(
					'action' => $module_cp_url,
					'id' => 'rules_form',
					'hidden_fields' => array(
						'XID' => XID_SECURE_HASH,
					)
				)
			);
			
			$vars = array( 'ee' => $this->EE );
			
			// Get redirect method
    		$result = $this->EE->db->query( "SELECT `value` FROM `exp_cuho_georedirect_settings` WHERE `key` = 'method'" );
    		
    		if( $result->num_rows() > 0 ) {
				$this->method = intval( $result->row('value') );
			}
			
			// Get redirect rules
    		$rules_sql = $this->EE->db->query( "SELECT * FROM `exp_cuho_georedirect_rules`" );
    		
    		$rules = array();
    		if( $rules_sql->num_rows() > 0 ) {
    			foreach( $rules_sql->result_array() as $row ) {
    				$rules[] = $row;
    			}
			}
			
			$vars['no_geoip'] = !$this->cuho_geoip->isAvailable();
			$vars['method'] = $this->method;
			$vars['formtag'] = $form;
			
			$vars['rules'] = $rules;
			
			if( !$vars['no_geoip'] ) {
				if( $this->EE->input->post('save') ) {
					
					// Save redirect method
					$method = intval( $_POST['method'] );
					if( $method > 2 || $method < 0 ) {
						$method = 0;
					}
					$method = strval( $method );
					
					$this->EE->db->query( "UPDATE `exp_cuho_georedirect_settings` SET `value` = '{$method}' WHERE `key` = 'method'" );
					
					// Save rules
					$this->EE->db->query( "TRUNCATE `exp_cuho_georedirect_rules`" );
					
					if( isset( $_POST['countries'] ) && count( $_POST['countries'] ) ) {
						foreach( $_POST['countries'] as $id => $country ) {
							$country = $this->EE->db->escape( $country );
							$url = $this->EE->db->escape( $_POST['urls'][ $id ] );
							$title = $this->EE->db->escape( $_POST['title'][ $id ] );
							$text = $this->EE->db->escape( $_POST['text'][ $id ] );
							
							
							$this->EE->db->query(  "INSERT INTO `exp_cuho_georedirect_rules` SET `country` = {$country}, `url` = {$url}, `title` = {$title}, `text` = {$text}" );
						}
					}
					
					$this->EE->functions->redirect( $module_cp_url );
				}
			}
			
			return $this->EE->load->view('backend/config', $vars, TRUE);
		}

	}