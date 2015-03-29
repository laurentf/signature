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

use PHPImageWorkshop\ImageWorkshop; //GD2 image processing package

require_once('PHPImageWorkshop/ImageWorkshop.php');

/**
 * Signature
 *
 * This class is used by WRS to transform images and/or apply the different elements. 
 *
 * @package WRS
 * @author  Laurent Bonnet
 * @since   1.0.0
 */
class Signature{

	private $_signature;

	//possible positions LT, MT, RT, LM, MM, RM, LB, MB, RB

	public function initBackground($class){
		$this->_signature = ImageWorkshop::initFromPath(IMG_DIR.'bg_'.$class.'.jpg');
	}

	public function addFaction($faction){
		$layer = ImageWorkshop::initFromPath(FACTIONS_PATH);

		switch($faction) {
			case 'exiles' : 
			$layer->cropInPixel(64, 64, EXILES_X, EXILES_Y, 'LT');
			break;
			case 'dominion' : 
			$layer->cropInPixel(64, 64, DOMINION_X, DOMINION_Y, 'LT');
			break;
		}
		$layer->cropInPixel(40, 40, 0, 0, 'MM');
		//$layer->resizeInPixel(30, null, true);
		$this->_signature->addLayerOnTop($layer, 10, 20, 'LM');
	}

	public function addGuildName($guildName){
		$textLayer = ImageWorkshop::initTextLayer(''.$guildName.'', FONTS_DIR.'Ethnic.ttf', 16, 'ffffff', 0);
		$this->_signature->addLayerOnTop($textLayer, 10, 10, 'LT');
	}

	public function addName($name){
		$textLayer = ImageWorkshop::initTextLayer($name, FONTS_DIR.'Space.ttf', 14, 'ffffff', 0);
		$this->_signature->addLayerOnTop($textLayer, 12, 40, 'LT');
	}

	public function addClass($class){
		$layer = ImageWorkshop::initFromPath(CLASSES_PATH);

		switch($class) {
			case 'warrior' : 
			$layer->cropInPixel(64, 64, WARRIOR_X, WARRIOR_Y, 'LT');
			break;
			case 'spellslinger' : 
			$layer->cropInPixel(64, 64, SPELLSLINGER_X, SPELLSLINGER_Y, 'LT');
			break;
			case 'esper' : 
			$layer->cropInPixel(64, 64, ESPER_X, ESPER_Y, 'LT');
			break;
			case 'engineer' : 
			$layer->cropInPixel(64, 64, ENGINEER_X, ENGINEER_Y, 'LT');
			break;
			case 'medic' : 
			$layer->cropInPixel(64, 64, MEDIC_X, MEDIC_Y, 'LT');
			break;
			case 'stalker' : 
			$layer->cropInPixel(64, 64, STALKER_X, STALKER_Y, 'LT');
			break;
		}
		$layer->cropInPixel(50, 50, 0, 0, 'MM');
		$layer->resizeInPixel(30, null, true);
		$this->_signature->addLayerOnTop($layer, 33, 5, 'RT');
	}

	public function addRole($role){
		$layer = ImageWorkshop::initFromPath(ROLES_PATH);
		switch($role) {
			case 'melee_dps' : 
			$layer->cropInPixel(64, 64, MELEE_DPS_X, MELEE_DPS_Y, 'LT');
			break;
			case 'ranged_dps' : 
			$layer->cropInPixel(64, 64, RANGED_DPS_X, RANGED_DPS_Y, 'LT');
			break;
			case 'tank' : 
			$layer->cropInPixel(64, 64, TANK_X, TANK_Y, 'LT');
			break;
			case 'healer' : 
			$layer->cropInPixel(64, 64, HEALER_X, HEALER_Y, 'LT');
			break;
		}
		$layer->cropInPixel(50, 50, 0, 0, 'MM');
		$layer->resizeInPixel(30, null, true);
		$this->_signature->addLayerOnTop($layer, 33, 5, 'RB');
	}

	public function addRace($race){
		$layer = ImageWorkshop::initFromPath(RACES_PATH);

		switch($race) {
			case 'human' : 
			$layer->cropInPixel(64, 64, HUMAN_X, HUMAN_Y, 'LT');
			break;
			case 'granok' : 
			$layer->cropInPixel(64, 64, GRANOK_X, GRANOK_Y, 'LT');
			break;
			case 'aurin' : 
			$layer->cropInPixel(64, 64, AURIN_X, AURIN_Y, 'LT');
			break;
			case 'mordesh' : 
			$layer->cropInPixel(64, 64, MORDESH_X, MORDESH_Y, 'LT');
			break;
			case 'cassian' : 
			$layer->cropInPixel(64, 64, CASSIAN_X, CASSIAN_Y, 'LT');
			break;
			case 'mechari' : 
			$layer->cropInPixel(64, 64, MECHARI_X, MECHARI_Y, 'LT');
			break;
			case 'draken' : 
			$layer->cropInPixel(64, 64, DRAKEN_X, DRAKEN_Y, 'LT');
			break;
			case 'chua' : 
			$layer->cropInPixel(64, 64, CHUA_X, CHUA_Y, 'LT');
			break;
		}
		$layer->cropInPixel(50, 50, 0, 0, 'MM');
		$layer->resizeInPixel(30, null, true);
		$this->_signature->addLayerOnTop($layer, 0, 5, 'RB');
	}

	public function addPath($path){
		$layer = ImageWorkshop::initFromPath(PATHS_PATH);

		switch($path) {
			case 'soldier' : 
			$layer->cropInPixel(64, 64, SOLDIER_X, SOLDIER_Y, 'LT');
			break;
			case 'explorer' : 
			$layer->cropInPixel(64, 64, EXPLORER_X, EXPLORER_Y, 'LT');
			break;
			case 'settler' : 
			$layer->cropInPixel(64, 64, SETTLER_X, SETTLER_Y, 'LT');
			break;
			case 'scientist' : 
			$layer->cropInPixel(64, 64, SCIENTIST_X, SCIENTIST_Y, 'LT');
			break;
		}
		$layer->cropInPixel(50, 50, 0, 0, 'MM');
		$layer->resizeInPixel(30, null, true);
		$this->_signature->addLayerOnTop($layer, 0, 5, 'RT');
	}

	public function addEffect($effect){
		switch($effect){
			case 'gore' : 
			$layer = ImageWorkshop::initFromPath(GORE_PATH);
			break;
			case 'neon' : 
			$layer = ImageWorkshop::initFromPath(NEON_PATH);
			break;
			case 'drug' : 
			$layer = ImageWorkshop::initFromPath(DRUG_PATH);
			break;
		}
		$layer->opacity(60);
		$this->_signature->addLayerOnTop($layer, 0, 0, 'LT');
	}

	public function addServerName($serverName){
		$textLayer = ImageWorkshop::initTextLayer(' on '.$serverName, FONTS_DIR.'Space.ttf', 10, 'ffffff', 0);
		$this->_signature->addLayerOnTop($textLayer, 10, 10, 'LB');
	}

	public function small(){
		$this->_signature->resizeInPixel(300, null, true);
	}

	public function display(){
		imagepng($this->_signature->getResult(null));
		//imagedestroy($this->_signature);
	}

	public function displayHTML(){
		ob_start();
		$im = $this->_signature->getResult(null);
		sendHeaders('png');
		imagepng($im);
		imagedestroy($im);
		exit;
	}
	
}
?>
