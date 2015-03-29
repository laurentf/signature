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

 //Helpers functions.

function sendHeaders($type='json'){
	switch($type){
		case 'json':
			header("Content-Type: application/json");
		break;
		case 'jpeg':
			header("Content-Type: image/jpeg");
		break;
		case 'png':
			header("Content-Type: image/png");
		break;
		case 'gif':
			header("Content-Type: image/gif");
		break;
		default:
			header("Content-Type: application/json");
		break;
	}
}

function errorJSON($message){
	echo json_encode(array('error' => $message));
	exit;
}

function successJSON($message){
	echo json_encode(array('success' => $message));
	exit;
}
?>