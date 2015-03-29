<?php
/**
 * WildRatsSignature - WRS API for your WILDSTAR signatures
 *
 * @author      Laurent Bonnet <laurentf.bonnet@gmail.com>
 * @copyright   2014 Laurent Bonnet
 * @link        www.wildrats.fr
 * @license     www.wildrats.fr
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

//Here is all the configuration part.

//images and fonts dir constant
define('FONTS_DIR', '../fonts/');
define('IMG_DIR', '../img/');

//images path
define('CLASSES_PATH','../img/icon-classes-64.png');
define('FACTIONS_PATH','../img/icon-main-64.png');
define('ROLES_PATH','../img/icon-main-64.png');
define('PATHS_PATH','../img/icon-paths-64.png');
define('RACES_PATH','../img/icon-factions-64.png');

define('GORE_PATH','../img/blood.png');
define('NEON_PATH','../img/neon.png');
define('DRUG_PATH','../img/drug.png');

define('WARRIOR_BG_PATH','../img/bg_warrior.jpg');
define('ENGINEER_BG_PATH','../img/bg_engineer.jpg');
define('ESPER_BG_PATH','../img/bg_esper.jpg');
define('STALKER_BG_PATH','../img/bg_stalker.jpg');
define('SPELLSLINGER_BG_PATH','../img/bg_spellslinger.jpg');
define('MEDIC_BG_PATH','../img/bg_medic.jpg');

//error messages constants
define('ERROR_404', 'Unknown route.');
define('ERROR_500', 'Oops, something went wrong.');
define('ERROR_PARAMETER', 'You need to specify valid parameters - |faction|guild_name|race|name|class|role|path|server_name|.');
define('ERROR_FACTION', 'You need to specify a valid faction - |exiles|dominion|.');
define('ERROR_GUILD_NAME', 'You need to specify a valid guild name, empty or length between 3 and 50.');
define('ERROR_NAME', 'You need to specify a valid name, alphanumeric only, length between 3 and 50.');
define('ERROR_SERVER_NAME', 'You need to specify a valid server name, empty or alphanumeric only, length between 5 and 50.');
define('ERROR_CLASS', 'You need to specify a valid class - |warrior|spellslinger|esper|engineer|stalker|medic|.');
define('ERROR_PATH', 'You need to specify a valid path - |soldier|explorer|settler|scientist|.');
define('ERROR_RACE', 'You need to specify a valid race - |human|granok|aurin|mordesh|cassian|mechari|draken|chua|.');
define('ERROR_ROLE', 'You need to specify a valid role - |melee_dps|ranged_dps|tank|healer|.');
define('ERROR_EFFECT', 'You need to specify a valid effect (or no effect) - |no_effect|blood|.');
define('ERROR_SIZE', 'You need to specify a valid signature size - |normal|small|.');

//factions positions
define('EXILES_X', 64);
define('EXILES_Y', 0);

define('DOMINION_X', 0);
define('DOMINION_Y', 0);

//roles positions
define('MELEE_DPS_X', 576);
define('MELEE_DPS_Y', 0);

define('RANGED_DPS_X', 704);
define('RANGED_DPS_Y', 0);

define('TANK_X', 512);
define('TANK_Y', 0);

define('HEALER_X', 640);
define('HEALER_Y', 0);

//races positions
define('HUMAN_X', 0);
define('HUMAN_Y', 128);

define('GRANOK_X', 128);
define('GRANOK_Y', 128);

define('AURIN_X', 64);
define('AURIN_Y', 128);

define('MORDESH_X', 192);
define('MORDESH_Y', 128);

define('CASSIAN_X', 384);
define('CASSIAN_Y', 128);

define('MECHARI_X', 320);
define('MECHARI_Y', 128);

define('DRAKEN_X', 448);
define('DRAKEN_Y', 128);

define('CHUA_X', 256);
define('CHUA_Y', 128);

//classes positions
define('SPELLSLINGER_X', 128);
define('SPELLSLINGER_Y', 128);

define('ENGINEER_X', 320);
define('ENGINEER_Y', 128);

define('ESPER_X', 256);
define('ESPER_Y', 128);

define('MEDIC_X', 192);
define('MEDIC_Y', 128);

define('STALKER_X', 64);
define('STALKER_Y', 128);

define('WARRIOR_X', 0);
define('WARRIOR_Y', 128);

//paths positions
define('SOLDIER_X', 192);
define('SOLDIER_Y', 128);

define('EXPLORER_X', 0);
define('EXPLORER_Y', 128);

define('SCIENTIST_X', 64);
define('SCIENTIST_Y', 128);

define('SETTLER_X', 128);
define('SETTLER_Y', 128);

//possible parameters list
function getAllowedOperations(){
	return array(
		'name',
		'guild_name',
		'server_name',
		'faction',
		'class',
		'vocation',
		'role',
		'race'
	);
}

function getAllowedPaths(){
	return array(
		'soldier',
		'explorer',
		'settler',
		'scientist'
	);
}

function getAllowedRoles(){
	return array(
		'healer',
		'tank',
		'melee_dps',
		'ranged_dps'
	);
}

function getAllowedClasses(){
	return array(
		'spellslinger',
		'engineer',
		'warrior',
		'esper',
		'medic',
		'stalker'
	);
}

//possible factions list
function getAllowedFactions(){
	return array(
		'exiles',
		'dominion'
	);
}

//possible races list
function getAllowedRaces(){
	return array(
		'human',
		'granok',
		'aurin',
		'mordesh',
		'cassian',
		'mechari',
		'draken',
		'chua'
	);
}

//possible effects list
function getAllowedEffects(){
	return array(
		'no_effect',
		'gore',
		'neon',
		'drug'
	);
}

//possible sizes list
function getAllowedSizes(){
	return array(
		'normal',
		'small'
	);
}