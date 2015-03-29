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

/**
 * Validator
 *
 * This class is used by WRS to validate the different parameters.
 *
 * @package WRS
 * @author  Laurent Bonnet
 * @since   1.0.0
 */
class Validator{
	//faction|guild_name|race|name|class|role|path|server_name
	//most important validation function (not so complicated, just a bit long)
	public static function validateParameters($parameters){
		if(is_null($parameters)){
			errorJSON(ERROR_PARAMETER);
		}

		if(!is_array($parameters)){
			errorJSON(ERROR_PARAMETER);
		}

		if(count($parameters) != 10){
			errorJSON(ERROR_PARAMETER);
		}

		if(!in_array(strtolower($parameters[0]), getAllowedFactions())){
			errorJSON(ERROR_FACTION);
		}

		if(trim($parameters[1]) != ""){
			if(mb_strlen($parameters[1]) < 3 || mb_strlen($parameters[1]) > 50) {
				errorJSON(ERROR_GUILD_NAME);
			}
		}

		if(!in_array(strtolower($parameters[2]), getAllowedRaces())){
			errorJSON(ERROR_RACE);
		}

		if(mb_strlen($parameters[3]) < 3 || mb_strlen($parameters[3]) > 50 || (!ctype_alnum($parameters[3]))){
			errorJSON(ERROR_NAME);
		}

		if(!in_array(strtolower($parameters[4]), getAllowedClasses())){
			errorJSON(ERROR_CLASS);
		}

		if(!in_array(strtolower($parameters[5]), getAllowedRoles())){
			errorJSON(ERROR_ROLE);
		}

		if(!in_array(strtolower($parameters[6]), getAllowedPaths())){
			errorJSON(ERROR_PATH);
		}

        if(trim($parameters[7]) != ""){
			if(mb_strlen($parameters[7]) > 50 || (!ctype_alnum($parameters[7]))){
				errorJSON(ERROR_SERVER_NAME);
			}	
		}
		if(!in_array(strtolower($parameters[8]), getAllowedEffects())){
			errorJSON(ERROR_EFFECT);
		}	
		if(!in_array(strtolower($parameters[9]), getAllowedSizes())){
			errorJSON(ERROR_SIZE);
		}	
	}

}

?>