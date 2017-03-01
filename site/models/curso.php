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
 
	
	public function getTable($type = 'Curso', $prefix = 'ProcSelTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Get the message
         *
	 * @return  string  The message to be displayed to the user
	 */
	public function getNome($cod_curso = '')
	{
		if (!is_array($this->nome_curso))
		{
			$this->nome_curso = array();
		}
 
		if (!isset($this->nome_curso[$cod_curso]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$cod_curso = $jinput->get('cod_curso', '', 'STRING');
 
			// Get a TableHelloWorld instance
			$table = $this->getTable();
 
			// Load the message
			$table->load($cod_curso);
 
			// Assign the message
			$this->nome_curso[$cod_curso] = $table->nome_curso;
		}
 
		return $this->nome_curso[$cod_curso];
	}
}