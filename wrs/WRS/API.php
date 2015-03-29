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
use WRS\Processor;

require_once 'config/config.php';
require_once 'helpers/helpers.php';
require_once 'Validator.php';
require_once 'Processor.php'; 
require_once 'Slim/Slim.php'; //based on Slim Framework for routing

\Slim\Slim::registerAutoloader();

/**
 * WRS
 * @package WRS
 * @author  Laurent Bonnet
 * @since   1.0.0
 */
class API extends \Slim\Slim{

	/**
     * @const string
     */
    const VERSION = '1.0.0';

	public function start(){
		//404 not found json error

		$host = $this; //because of closure

		$this->notFound(function() use ($host){
			sendHeaders('json');
		    errorJSON(ERROR_404);
		});

		//every server errors (for security reasons never say why it crashed)
		$this->error(function(\Exception $e = null) use ($host){
		    sendHeaders('json');
		    errorJSON(ERROR_500);
		});

		//get route testing
		$this->get('/', function(){
			sendHeaders('json');
			echo '<h2>Cast this spell like this :</h2>';
			echo '<h4>http://'.$_SERVER["HTTP_HOST"].'/signature/wrs/[faction]/[guild_name]/[race]/name/[class]/[role]/[path]/[server_name]/[effect]/[size]</h4/>';
			echo '<li>param 1 : faction => exiles|dominion</li>';
			echo '<li>param 2 : guild_name => any string, can be empty</li>';
			echo '<li>param 3 : race => human|granok|aurin|mordesh|cassian|mechari|draken|chua</li>';
			echo '<li>param 4 :	name => any string<br />';
			echo '<li>param 5 : class => warrior|spellslinger|engineer|esper|stalker|medic</li>';
			echo '<li>param 6 : role => melee_dps|ranged_dps|healer|tank</li>';
			echo '<li>param 7 : path =>soldier|explorer|settler|scientist</li>';
			echo '<li>param 8 : server_name => any string, can be empty</li>';
			echo '<li>param 9 : effect => no_effect|gore|neon|drug</li>';
			echo '<li>param 10 : size => normal|small</li></ul>';
			echo '<h4><a href="http://'.$_SERVER["HTTP_HOST"].'/signature/wrs/dominion/WildRats/cassian/Furie/stalker/melee_dps/soldier/Lagos/drug/normal" target="_blank">Example</a></h4>';

		});

		//get dynamic route 
		$this->get('/:param+', function($parameters){
			sendHeaders('json');
			//successJSON($parameters);
			//validate
			\WRS\Validator::validateParameters($parameters);
			//get the shit done
		    $processor = new \WRS\Processor($parameters);
		    $processor->generateSignature();
		});

		$this->run();
	}
}
?>