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
	
	class cuho_georedirect_upd {
    	public $version = '1.0';
    	private $ee;
    	
    	function __construct() {
    		$this->ee = &get_instance();
    	}
    	
    	function install() {
			// Install module
			$module = array(
				'module_name' => 'Cuho_georedirect',
				'module_version' => $this->version,
				'has_cp_backend' => 'y',
				'has_publish_fields' => 'n',
			);
			
			$this->ee->db->insert( 'modules',  $module );
			
			
			$this->ee->db->query( "
				CREATE TABLE `exp_cuho_georedirect_settings` (`key` VARCHAR( 100 ) NOT NULL ,
					`value` VARCHAR( 100 ) NOT NULL ,
					PRIMARY KEY ( `key` ) 
				) ENGINE = InnoDB;
			");
			
			$this->ee->db->query( "INSERT INTO `exp_cuho_georedirect_settings` (`key`, `value` ) VALUES ('method', '0') ");
			
			$this->ee->db->query( "
				CREATE TABLE `exp_cuho_georedirect_rules` (`uid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
					`country` VARCHAR( 2 ) NOT NULL,
					`url` VARCHAR( 255 ) NOT NULL,
					`title` VARCHAR( 255 ) NOT NULL,
					`text` TEXT NOT NULL,
					UNIQUE (
						`country`
					)
				) ENGINE = InnoDB;
			");
			
			// Install actions
			$actions = array(
				'class' => 'Cuho_georedirect',
				'method' => 'checkRedirect',
			);
			
			$this->ee->db->insert( 'actions', $actions );
		
			return true;
		}
		
		
		function update( $current = '' ) {
			return true;
		}
		
		function uninstall() {
			$this->ee->db->query( "DELETE FROM exp_modules WHERE module_name = 'Cuho_georedirect'" );
			$this->ee->db->query( "DELETE FROM exp_actions WHERE class = 'Cuho_georedirect'" );
			
			$this->ee->db->query( "DROP TABLE `exp_cuho_georedirect_settings`");
			$this->ee->db->query( "DROP TABLE `exp_cuho_georedirect_rules`" );
			
			return true;
		}
	}