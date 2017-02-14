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
class ProcSelModelCurso extends JModelItem
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
		if (!isset($this->nome_curso))
		{
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');
 
			switch ($id)
			{
				case 2:
					$this->nome_curso = 'cURSO A';
					break;
				default:
				case 1:
					$this->nome_curso = 'cURSO N';
					break;
			}
		}
 
		return $this->nome_curso;
	}
}