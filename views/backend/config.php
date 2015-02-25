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
	
	$countries_list = array(
		'' => "-- select --",
		"AD" => "Andorra",
		"AE" => "United Arab Emirates",
		"AF" => "Afghanistan",
		"AG" => "Antigua and Barbuda",
		"AI" => "Anguilla",
		"AL" => "Albania",
		"AM" => "Armenia",
		"AO" => "Angola",
		"AP" => "Asia/Pacific Region",
		"AQ" => "Antarctica",
		"AR" => "Argentina",
		"AS" => "American Samoa",
		"AT" => "Austria",
		"AU" => "Australia",
		"AW" => "Aruba",
		"AX" => "Aland Islands",
		"AZ" => "Azerbaijan",
		"BA" => "Bosnia and Herzegovina",
		"BB" => "Barbados",
		"BD" => "Bangladesh",
		"BE" => "Belgium",
		"BF" => "Burkina Faso",
		"BG" => "Bulgaria",
		"BH" => "Bahrain",
		"BI" => "Burundi",
		"BJ" => "Benin",
		"BL" => "Saint Bartelemey",
		"BM" => "Bermuda",
		"BN" => "Brunei Darussalam",
		"BO" => "Bolivia",
		"BQ" => "Bonaire, Saint Eustatius and Saba",
		"BR" => "Brazil",
		"BS" => "Bahamas",
		"BT" => "Bhutan",
		"BV" => "Bouvet Island",
		"BW" => "Botswana",
		"BY" => "Belarus",
		"BZ" => "Belize",
		"CA" => "Canada",
		"CC" => "Cocos (Keeling) Islands",
		"CD" => "Congo, The Democratic Republic of the",
		"CF" => "Central African Republic",
		"CG" => "Congo",
		"CH" => "Switzerland",
		"CI" => "Cote d'Ivoire",
		"CK" => "Cook Islands",
		"CL" => "Chile",
		"CM" => "Cameroon",
		"CN" => "China",
		"CO" => "Colombia",
		"CR" => "Costa Rica",
		"CU" => "Cuba",
		"CV" => "Cape Verde",
		"CW" => "Curacao",
		"CX" => "Christmas Island",
		"CY" => "Cyprus",
		"CZ" => "Czech Republic",
		"DE" => "Germany",
		"DJ" => "Djibouti",
		"DK" => "Denmark",
		"DM" => "Dominica",
		"DO" => "Dominican Republic",
		"DZ" => "Algeria",
		"EC" => "Ecuador",
		"EE" => "Estonia",
		"EG" => "Egypt",
		"EH" => "Western Sahara",
		"ER" => "Eritrea",
		"ES" => "Spain",
		"ET" => "Ethiopia",
		"EU" => "Europe",
		"FI" => "Finland",
		"FJ" => "Fiji",
		"FK" => "Falkland Islands (Malvinas)",
		"FM" => "Micronesia, Federated States of",
		"FO" => "Faroe Islands",
		"FR" => "France",
		"GA" => "Gabon",
		"GB" => "United Kingdom",
		"GD" => "Grenada",
		"GE" => "Georgia",
		"GF" => "French Guiana",
		"GG" => "Guernsey",
		"GH" => "Ghana",
		"GI" => "Gibraltar",
		"GL" => "Greenland",
		"GM" => "Gambia",
		"GN" => "Guinea",
		"GP" => "Guadeloupe",
		"GQ" => "Equatorial Guinea",
		"GR" => "Greece",
		"GS" => "South Georgia and the South Sandwich Islands",
		"GT" => "Guatemala",
		"GU" => "Guam",
		"GW" => "Guinea-Bissau",
		"GY" => "Guyana",
		"HK" => "Hong Kong",
		"HM" => "Heard Island and McDonald Islands",
		"HN" => "Honduras",
		"HR" => "Croatia",
		"HT" => "Haiti",
		"HU" => "Hungary",
		"ID" => "Indonesia",
		"IE" => "Ireland",
		"IL" => "Israel",
		"IM" => "Isle of Man",
		"IN" => "India",
		"IO" => "British Indian Ocean Territory",
		"IQ" => "Iraq",
		"IR" => "Iran, Islamic Republic of",
		"IS" => "Iceland",
		"IT" => "Italy",
		"JE" => "Jersey",
		"JM" => "Jamaica",
		"JO" => "Jordan",
		"JP" => "Japan",
		"KE" => "Kenya",
		"KG" => "Kyrgyzstan",
		"KH" => "Cambodia",
		"KI" => "Kiribati",
		"KM" => "Comoros",
		"KN" => "Saint Kitts and Nevis",
		"KP" => "Korea, Democratic People's Republic of",
		"KR" => "Korea, Republic of",
		"KW" => "Kuwait",
		"KY" => "Cayman Islands",
		"KZ" => "Kazakhstan",
		"LA" => "Lao People's Democratic Republic",
		"LB" => "Lebanon",
		"LC" => "Saint Lucia",
		"LI" => "Liechtenstein",
		"LK" => "Sri Lanka",
		"LR" => "Liberia",
		"LS" => "Lesotho",
		"LT" => "Lithuania",
		"LU" => "Luxembourg",
		"LV" => "Latvia",
		"LY" => "Libyan Arab Jamahiriya",
		"MA" => "Morocco",
		"MC" => "Monaco",
		"MD" => "Moldova, Republic of",
		"ME" => "Montenegro",
		"MF" => "Saint Martin",
		"MG" => "Madagascar",
		"MH" => "Marshall Islands",
		"MK" => "Macedonia",
		"ML" => "Mali",
		"MM" => "Myanmar",
		"MN" => "Mongolia",
		"MO" => "Macao",
		"MP" => "Northern Mariana Islands",
		"MQ" => "Martinique",
		"MR" => "Mauritania",
		"MS" => "Montserrat",
		"MT" => "Malta",
		"MU" => "Mauritius",
		"MV" => "Maldives",
		"MW" => "Malawi",
		"MX" => "Mexico",
		"MY" => "Malaysia",
		"MZ" => "Mozambique",
		"NA" => "Namibia",
		"NC" => "New Caledonia",
		"NE" => "Niger",
		"NF" => "Norfolk Island",
		"NG" => "Nigeria",
		"NI" => "Nicaragua",
		"NL" => "Netherlands",
		"NO" => "Norway",
		"NP" => "Nepal",
		"NR" => "Nauru",
		"NU" => "Niue",
		"NZ" => "New Zealand",
		"OM" => "Oman",
		"PA" => "Panama",
		"PE" => "Peru",
		"PF" => "French Polynesia",
		"PG" => "Papua New Guinea",
		"PH" => "Philippines",
		"PK" => "Pakistan",
		"PL" => "Poland",
		"PM" => "Saint Pierre and Miquelon",
		"PN" => "Pitcairn",
		"PR" => "Puerto Rico",
		"PS" => "Palestinian Territory",
		"PT" => "Portugal",
		"PW" => "Palau",
		"PY" => "Paraguay",
		"QA" => "Qatar",
		"RE" => "Reunion",
		"RO" => "Romania",
		"RS" => "Serbia",
		"RU" => "Russian Federation",
		"RW" => "Rwanda",
		"SA" => "Saudi Arabia",
		"SB" => "Solomon Islands",
		"SC" => "Seychelles",
		"SD" => "Sudan",
		"SE" => "Sweden",
		"SG" => "Singapore",
		"SH" => "Saint Helena",
		"SI" => "Slovenia",
		"SJ" => "Svalbard and Jan Mayen",
		"SK" => "Slovakia",
		"SL" => "Sierra Leone",
		"SM" => "San Marino",
		"SN" => "Senegal",
		"SO" => "Somalia",
		"SR" => "Suriname",
		"SS" => "South Sudan",
		"ST" => "Sao Tome and Principe",
		"SV" => "El Salvador",
		"SX" => "Sint Maarten",
		"SY" => "Syrian Arab Republic",
		"SZ" => "Swaziland",
		"TC" => "Turks and Caicos Islands",
		"TD" => "Chad",
		"TF" => "French Southern Territories",
		"TG" => "Togo",
		"TH" => "Thailand",
		"TJ" => "Tajikistan",
		"TK" => "Tokelau",
		"TL" => "Timor-Leste",
		"TM" => "Turkmenistan",
		"TN" => "Tunisia",
		"TO" => "Tonga",
		"TR" => "Turkey",
		"TT" => "Trinidad and Tobago",
		"TV" => "Tuvalu",
		"TW" => "Taiwan",
		"TZ" => "Tanzania, United Republic of",
		"UA" => "Ukraine",
		"UG" => "Uganda",
		"UM" => "United States Minor Outlying Islands",
		"US" => "United States",
		"UY" => "Uruguay",
		"UZ" => "Uzbekistan",
		"VA" => "Holy See (Vatican City State)",
		"VC" => "Saint Vincent and the Grenadines",
		"VE" => "Venezuela",
		"VG" => "Virgin Islands, British",
		"VI" => "Virgin Islands, U.S.",
		"VN" => "Vietnam",
		"VU" => "Vanuatu",
		"WF" => "Wallis and Futuna",
		"WS" => "Samoa",
		"YE" => "Yemen",
		"YT" => "Mayotte",
		"ZA" => "South Africa",
		"ZM" => "Zambia",
		"ZW" => "Zimbabwe",
	);
	
	asort( $countries_list );
?>

<script>
	$(document).ready( function() {
		var tpl = $("#record_tpl").clone();
		tpl.show(0);
		
		$("#record_tpl").remove();
		
		$("#add").click( function() {
			$("#redirects").append( tpl.clone() );
		});
		
		$("#rules_form").submit( function() {
			var empty_urls = false;
			var empty_countries = false;
			
			$.each( $(".countries"), function( i, e ) {
				if( $(e).val().length == 0 ) {
					empty_countries = true;
				}
			});
			
			$.each( $(".urls"), function( i, e ) {
				if( $(e).val().length == 0 ) {
					empty_urls = true;
				}
			});
			
			if( empty_urls && !empty_countries ) {
				alert( '<?=lang( 'cuho_georedirect_module_url_alert' ); ?>' );
				return false;
			}
			
			if( empty_countries && !empty_urls ) {
				alert( '<?=lang( 'cuho_georedirect_module_country_alert' ); ?>' );
				return false;
			}
			
			if( empty_countries && empty_urls ) {
				alert( '<?=lang( 'cuho_georedirect_module_url_country_alert' ); ?>' );
				return false;
			}
			
			return true;
		});
	});
	
	function ruleDel( el ) {
		if( confirm( '<?=lang( 'cuho_georedirect_module_confirm_entry_delete' ); ?>' ) ) {
			$(el).parents("div.record").remove();
		}
	}
	
</script>

<?php echo form_open_multipart( "C=addons_modules{$AMP}M=show_module_cp{$AMP}module=cuho_georedirect"); ?>


<div>
	<h2>Configure your redirects</h2>
	
	<?php
		if( $no_geoip ) {
			echo '<br><h3>
				Error: your server has no GEOIP extension for PHP.<br>
				Please check <a href="http://www.php.net/manual/geoip.installation.php">GeoIP Installation section</a>
			</h3>';
		}
		else {
	?>
		
		<label>
			<?=lang( 'cuho_georedirect_module_redir_method' ); ?>:
			
			<select name="method">
				<option value="0" <?= ( $method == 0 ? 'selected="selected"' : '' ) ?>><?=lang( 'cuho_georedirect_module_method_popup' ); ?></option>
				<option value="1" <?= ( $method == 1 ? 'selected="selected"' : '' ) ?>><?=lang( 'cuho_georedirect_module_method_auto' ); ?></option>
				<option value="2" <?= ( $method == 2 ? 'selected="selected"' : '' ) ?>><?=lang( 'cuho_georedirect_module_method_auto_once' ); ?></option>
			</select>
			
		</label>
		
		<p>
		<hr>
		</p>
		<h3><?=lang( 'cuho_georedirect_module_rules_header' ); ?> <small>( <a href="#add" id="add"><?=lang( 'cuho_georedirect_module_add_title' ); ?></a> )</small></h3>
		
		<i><small><?=lang( 'cuho_georedirect_module_rules_duplicate_warn' ); ?></small></i>
	<?php
		}
	?>
	<div id="redirects">
		<?php
			if( !empty( $rules ) ) {
				foreach( $rules as $data ) {
				?>
				
				<div class="record" style="border: 1px solid #A4A4A4; padding: 5px 10px; margin-bottom: 10px;">
					<div align="right">
						<a href="#delete" onclick="javascript:ruleDel(this);"><?=lang( 'cuho_georedirect_module_remove_title' ); ?></a>
					</div>
					
					
					<h4><?=lang( 'cuho_georedirect_module_entry_title' ); ?>:</h4>
					
					<br>
					
					<label>
						<?=lang( 'cuho_georedirect_module_country_title' ); ?>:
						
						<?= drawCountries( $countries_list, $data['country'] ); ?>
					</label>
					
					<br><br>
					
					<label>
						URL:<br>
						<input type="text" name="urls[]" class="urls" value="<?=htmlspecialchars( $data['url'] ); ?>" required="required" />
					</label>
					
					<br><br>
					
					<label>
						<?=lang( 'cuho_georedirect_module_popup_title' ); ?>:<br>
						<input type="text" name="title[]" class="titles" value="<?=htmlspecialchars( $data['title'] ); ?>" />
					</label>
					
					<br><br>
					
					<label>
						<?=lang( 'cuho_georedirect_module_popup_text' ); ?>:<br>
						<textarea name="text[]"><?=htmlspecialchars( $data['text'] ); ?></textarea>
					</label>
				</div>
				
				<?php
				}
			}
		?>
		
		
		<div id="record_tpl" class="record" style="display: none; border: 1px solid #A4A4A4; padding: 5px 10px; margin-bottom: 10px;">
			<div align="right">
				<a href="#delete" onclick="javascript:remove(this);">remove</a>
			</div>
			
			
			<h4>Redirect entry:</h4>
			
			<br>
			
			<label>
				Country:
				
				<?= drawCountries( $countries_list ); ?>
			</label>
			
			<br><br>
			
			<label>
				URL:<br>
				<input type="text" name="urls[]" class="urls" required="required" />
			</label>
			
			<br><br>
			
			<label>
				Pop-up title:<br>
				<input type="text" name="title[]" class="titles" />
			</label>
			
			<br><br>
			
			<label>
				Pop-up message:<br>
				<textarea name="text[]"></textarea>
			</label>
		</div>
	</div>
	
	<br>
	<hr>
	<br>

	<?=form_submit('save', lang('Save changes'), 'class="submit"')?>
	&nbsp;
	<?=form_submit('cancel', lang('Cancel'), 'class="submit"')?>

</div>
<?php echo form_close(); ?>

<?php
	function drawCountries( $countries_list, $select_iso = null ) {
		
		$select = '<select name="countries[]" class="countries" required="required" />';
		
		foreach( $countries_list as $code => $name ) {
			
			$selected = ( $code == $select_iso ? 'selected="selected"' : '' );
			$select .= "<option {$selected} value=\"{$code}\">{$name}</option>";
		}
		
		$select .= '</select>';
		
		return $select;
	}
?>