<?php

/*
 * 	This class file can be downloaded from Alex Web Develop "PHP Login and Authentication Tutorial":
 * 	
 * 	https://alexwebdevelop.com/user-authentication/
 * 	
 * 	You are free to use and share this script as you like.
 * 	If you want to share it, please leave this disclaimer inside.
 * 	
 * 	Subscribe to my free newsletter and get my exclusive PHP tips and learning advice:
 * 	
 * 	https://alexwebdevelop.com/
 * 	
*/


class Account
{
	/* Class properties (variables) */
	
	/* The ID of the logged in account (or NULL if there is no logged in account) */
//	private $id;
	
	/* The name of the logged in account (or NULL if there is no logged in account) */
//	private $name;
	
	/* TRUE if the user is authenticated, FALSE otherwise */
//	private $authenticated;



	//properties
  private $firstName;
  private $lastName;
  private $email;
  private $accountType;
  private $userName;
  private $password;
  private $confirmpassword;
	
	
	/* Public class methods (functions) */
	
	/* Constructor */
	public function __construct()
	{
		/* Initialize the $id and $name variables to NULL */
		//properties
	    $this->$firstName = NULL;
	    $this->$lastName = NULL;
	    $this->$email = NULL;
	    $this->$accountType = NULL;
	    $this->$userName = NULL;
	    $this->$password = NULL;
	    $this->$confirmpassword = NULL;
	/*	$this->id = NULL;
		$this->name = NULL;
		$this->authenticated = FALSE;*/
	}
	
	/* Destructor */
	public function __destruct()
	{
		
	}
  //get firstname
  public function getfirstName(){
    //$fname= $this->firstName;
    return $this->firstName;
  }

  //get lastname
  
  public function getlastName(){
    //$lname= $this->lastName;
    return $this->lastName;
  }

  //get email
  public function getemail(){
    return $this->email;
  }

  //get username
  public function getusername(){
    return $this->userName;
  }

  //get password
  public function getpassword(){
    return $this->password;
  }

  //get accountType
  public function getaccountType(){
    return $this->accountType;
  }

  //check the username and email from the database

  public function validateusername(){
    $userName=$this->getusername();
    $query="SELECT username From user where username='$userName'";
    return $query;
  }

  public function validateemail(){
    $email=$this->getemail();
    $query="SELECT email From user where email='$email'";
    return $query;
  }


	/* Add a new account to the system and return its ID (the account_id column of the accounts table) */
	public function addAccount(string $name, string $passwd): int
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Trim the strings to remove extra spaces */
		$name = trim($name);
		$passwd = trim($passwd);
		
		/* Check if the user name is valid. If not, throw an exception */
		if (!$this->isNameValid($name))
		{
			throw new Exception('Invalid user name');
		}
		
		/* Check if the password is valid. If not, throw an exception */
		if (!$this->isPasswdValid($passwd))
		{
			throw new Exception('Invalid password');
		}
		
		/* Check if an account having the same name already exists. If it does, throw an exception */
		if (!is_null($this->getIdFromName($name)))
		{
			throw new Exception('User name not available');
		}
		
		/* Finally, add the new account */
		
		/* Insert query template */
		$query = "INSERT INTO myschema.accounts (firstName, lastName, email,accountType, username, password) VALUES (':firstName',':lastName',':email',':accountType',':userName',':password')";

		/* Password hash */
		$hash = password_hash($passwd, PASSWORD_DEFAULT);
		
		/* Values array for PDO */
		$values = array(':name' => $name, ':passwd' => $hash);
		
		/* Execute the query */
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
		
		/* Return the new ID */
		return $pdo->lastInsertId();
	}
	
	/* Delete an account (selected by its ID) */
	public function deleteAccount(int $id)
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Check if the ID is valid */
		if (!$this->isIdValid($id))
		{
			throw new Exception('Invalid account ID');
		}
		
		/* Query template */
		$query = 'DELETE FROM myschema.accounts WHERE (account_id = :id)';
		
		/* Values array for PDO */
		$values = array(':id' => $id);
		
		/* Execute the query */
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
	}
	
	/* Edit an account (selected by its ID). The name, the password and the status (enabled/disabled) can be changed */
	public function editAccount(int $id, string $name, string $passwd, bool $enabled)
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Trim the strings to remove extra spaces */
		$name = trim($name);
		$passwd = trim($passwd);
		
		/* Check if the ID is valid */
		if (!$this->isIdValid($id))
		{
			throw new Exception('Invalid account ID');
		}
		
		/* Check if the user name is valid. */
		if (!$this->isNameValid($name))
		{
			throw new Exception('Invalid user name');
		}
		
		/* Check if the password is valid. */
		if (!$this->isPasswdValid($passwd))
		{
			throw new Exception('Invalid password');
		}
		
		/* Check if an account having the same name already exists (except for this one). */
		$idFromName = $this->getIdFromName($name);
		
		if (!is_null($idFromName) && ($idFromName != $id))
		{
			throw new Exception('User name already used');
		}
		
		/* Finally, edit the account */
		
		/* Edit query template */
		$query = 'UPDATE myschema.accounts SET account_name = :name, account_passwd = :passwd, account_enabled = :enabled WHERE account_id = :id';
		
		/* Password hash */
		$hash = password_hash($passwd, PASSWORD_DEFAULT);
		
		/* Int value for the $enabled variable (0 = false, 1 = true) */
		$intEnabled = $enabled ? 1 : 0;
		
		/* Values array for PDO */
		$values = array(':name' => $name, ':passwd' => $hash, ':enabled' => $intEnabled, ':id' => $id);
		
		/* Execute the query */
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
	}
	
	/* Login with username and password */
	public function login(string $name, string $passwd): bool
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Trim the strings to remove extra spaces */
		$name = trim($name);
		$passwd = trim($passwd);
		
		/* Check if the user name is valid. If not, return FALSE meaning the authentication failed */
		if (!$this->isNameValid($name))
		{
			return FALSE;
		}
		
		/* Check if the password is valid. If not, return FALSE meaning the authentication failed */
		if (!$this->isPasswdValid($passwd))
		{
			return FALSE;
		}
		
		/* Look for the account in the db. Note: the account must be enabled (account_enabled = 1) */
		$query = 'SELECT * FROM myschema.accounts WHERE (account_name = :name) AND (account_enabled = 1)';
		
		/* Values array for PDO */
		$values = array(':name' => $name);
		
		/* Execute the query */
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
		
		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		/* If there is a result, we must check if the password matches using password_verify() */
		if (is_array($row))
		{
			if (password_verify($passwd, $row['account_passwd']))
			{
				/* Authentication succeeded. Set the class properties (id and name) */
				$this->id = intval($row['account_id'], 10);
				$this->name = $name;
				$this->authenticated = TRUE;
				
				/* Register the current Sessions on the database */
				$this->registerLoginSession();
				
				/* Finally, Return TRUE */
				return TRUE;
			}
		}
		
		/* If we are here, it means the authentication failed: return FALSE */
		return FALSE;
	}
	
	/* A sanitization check for the account username */
	public function isNameValid(string $name): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($name);
		
		if (($len < 8) || ($len > 16))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	
	/* A sanitization check for the account password */
	public function isPasswdValid(string $passwd): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the length must be between 8 and 16 chars */
		$len = mb_strlen($passwd);
		
		if (($len < 8) || ($len > 16))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	
	/* A sanitization check for the account ID */
	public function isIdValid(int $id): bool
	{
		/* Initialize the return variable */
		$valid = TRUE;
		
		/* Example check: the ID must be between 1 and 1000000 */
		
		if (($id < 1) || ($id > 1000000))
		{
			$valid = FALSE;
		}
		
		/* You can add more checks here */
		
		return $valid;
	}
	

	
	/* Logout the current user */
	public function logout()
	{
		/* Global $pdo object */
		global $pdo;
		
		/* If there is no logged in user, do nothing */
		if (is_null($this->id))
		{
			return;
		}
		
		/* Reset the account-related properties */
		$this->id = NULL;
		$this->name = NULL;
		$this->authenticated = FALSE;

		// Finally, destroy the session.
		session_destroy();
	}

	
	/* Returns the account id having $name as name, or NULL if it's not found */
	public function getIdFromName(string $name): ?int
	{
		/* Global $pdo object */
		global $pdo;
		
		/* Since this method is public, we check $name again here */
		if (!$this->isNameValid($name))
		{
			throw new Exception('Invalid user name');
		}
		
		/* Initialize the return value. If no account is found, return NULL */
		$id = NULL;
		
		/* Search the ID on the database */
		$query = 'SELECT account_id FROM myschema.accounts WHERE (account_name = :name)';
		$values = array(':name' => $name);
		
		try
		{
			$res = $pdo->prepare($query);
			$res->execute($values);
		}
		catch (PDOException $e)
		{
		   /* If there is a PDO exception, throw a standard exception */
		   throw new Exception('Database query error');
		}
		
		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		/* There is a result: get it's ID */
		if (is_array($row))
		{
			$id = intval($row['account_id'], 10);
		}
		
		return $id;
	}
}
