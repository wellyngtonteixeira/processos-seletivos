<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class CursoModel extends JModelItem
{
	/**
	 * @var string message
	 */
	protected $cod_curso;
	protected $nome_curso;
 
	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getNome()
	{
		if (!isset($this->message))
		{
			$this->nome_curso = 'Hello World!';
		}
 
		return $this->nome_curso;
	}
}