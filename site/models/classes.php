<?php

defined('_JEXEC') or die('Restricted access');

class Usuario extends JModelItem{

	$cpf;
	$nome_completo;
	$data_nascimento;
	$email;
	$telefone;
	$inscricoes;
	
	function getCpf(){
		if (!isset($this->message))
		{
			$this->cpf = 12345678900;
		}
		return $this->cpf;
	}
	
	function set_cpf($value){
		$this->cpf = $value;
	}

}

class Inscricao extends JModelItem{
	
	$id_inscricao;
	$usuario = new Usuario();
	$seletivo_curso = new ProcessoSeletivoCurso();
	$situacao;
}

class ProcessoSeletivoCurso extends JModelItem{
	$id;
	$processo_seletivo = new ProcessoSeletivo();
	$curso = new Curso();
}

class ProcessoSeletivo extends JModelItem{
	$id_processo_seletivo
	$nome;
	$semestre;
	$ano;
	$status;
	$cursos;
}

class Curso extends JModelItem{
	$id_curso;
	$codigo_curso;
	$nome_curso;
	$messages;
	
	public function getTable($type = 'Curso', $prefix = 'CursoTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getNomeCurso($id = 1)
	{
		if (!is_array($this->messages))
		{
			$this->messages = array();
		}
 
		if (!isset($this->messages[$id]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');
 
			// Get a TableHelloWorld instance
			$table = $this->getTable();
 
			// Load the message
			$table->load($id);
 
			// Assign the message
			$this->messages[$id] = $table->greeting;
		}
 
		return $this->messages[$id];
	}
}

class BD {
	
	$conf = self::getConfig();
	$host = $conf->get('host');
    $user = $conf->get('user');
    $password = $conf->get('password');
    $database = $conf->get('db');
    $prefix = $conf->get('dbprefix');
    $driver = $conf->get('dbtype');
    $debug = $conf->get('debug');
	$db;

    $options = array('driver' => $driver, 'host' => $host, 'user' => $user, 'password' => $password, 'database' => $database, 'prefix' => $prefix);
	try
    {
        $db = JDatabaseDriver::getInstance($options);
    }
    catch (RuntimeException $e)
    {
        if (!headers_sent())
        {
            header('HTTP/1.1 500 Internal Server Error');
        }

        jexit('Database Error: ' . $e->getMessage());
    }

    //$db->setDebug($debug);

    return $db;
}
?>