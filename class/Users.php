<?php

// require("Database.php");
class Users extends Database {


    public function getUserswith($phone){

        $req=$this->getPDO()->prepare("SELECT * FROM users WHERE phone_n=?");
		$req->execute(array($phone));
		$res=$req->fetchAll(PDO::FETCH_OBJ);
		return $res;
    }


    public function insertUser($first_name,$last_name,$id_reg,$number,$email){

        $req=$this->getPDO()->prepare("INSERT INTO users (first_name,last_name,id_reg,email,phone_n,dateOfReg) values (?,?,?,?,?,NOW())");
		$req->execute(array($first_name,$last_name,$id_reg,$email,$number));
		return $req;
    }
}