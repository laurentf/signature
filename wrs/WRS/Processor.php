<?php 
/**
 * WildRatsSignature - WRS API for your WILDSTAR signatures
 *
 * @author      Laurent Bonnet <laurentf.bonnet@gmail.com>
 * @copyright   2014 Laurent Bonnet
 * @link        http://www.wildrats.fr
 * @license     http://www.wildrats.fr
 * @version     1.0.0
 * @package     WRS
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace WRS;

use WRS\Validator;
use WRS\Signature;

require_once('Signature.php');

/**
 * Processor
 *
 * This class is used by WRS to handle the different API call (validation and processing)
 *
 * @package WRS
 * @author  Laurent Bonnet
 * @since   1.0.0
 */
class Processor{

	private $_imageData;
	private $_parameters;

	private $_faction;
	private $_guildName;
	private $_race;
	private $_name;
	private $_class;
	private $_role;
	private $_path;
	private $_serverName;
	private $_effect;
	private $_size;

	public function __construct($parameters){
		$this->_parameters = $parameters;
		$this->_faction = $parameters[0];
		$this->_guildName = $parameters[1];
		$this->_race = $parameters[2];
		$this->_name = $parameters[3];
		$this->_class = $parameters[4];
		$this->_role = $parameters[5];
		$this->_path = $parameters[6];
		$this->_serverName = $parameters[7];
		$this->_effect = $parameters[8];
		$this->_size = $parameters[9];

	}

	////////////////////////////////////////////////////////////////
	//
	// GENERATE SIGNATURE
	//
	//
	////////////////////////////////////////////////////////////////

	public function generateSignature(){
		$sig = new \WRS\Signature();
		$sig->initBackground($this->_class);
		$sig->addName($this->_name);
		if(trim($this->_guildName)!=""){
			$sig->addGuildName($this->_guildName);
		}
		if(trim($this->_serverName)!=""){
			$sig->addServerName($this->_serverName);
		}
		$sig->addFaction($this->_faction);
		$sig->addRace($this->_race);
		$sig->addClass($this->_class);
		$sig->addRole($this->_role);
		$sig->addPath($this->_path);
		if($this->_effect != "no_effect") {
			$sig->addEffect($this->_effect);
		}
		if($this->_size == "small") {
			$sig->small();
		}
		$sig->displayHTML();
	}

	////////////////////////////////////////////////////////////////
	//
	// TRANSPARENT TRICK 
	//
	//
	////////////////////////////////////////////////////////////////

	private function keepImageTransparencyForPNGandGIF($im){
		$background = imagecolorallocatealpha($im, 255, 255, 255, 127); 
		imagecolortransparent($im, $background); 
		imagealphablending($im, false); 
		imagesavealpha($im, true); 
		return $im;
	}
}

?>