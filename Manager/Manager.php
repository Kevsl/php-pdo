<?php
namespace Manager;
use DbConnexion\DbConnexion;

class Manager extends DbConnexion
{
	protected $db;
	function __construct(DbConnexion $connexion)
	{
		$this->db = $connexion;
	}
}
