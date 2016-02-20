<?php
/**
 * Created by PhpStorm.
 * User: Kali
 * Date: 19/02/2016
 * Time: 13:48
 */

class User{

    private $db;

    function __construct($dbConn){
        $this->db = $dbConn;
    }

    public function register($fname, $lname, $username, $address, $userpass){
        try{
            $new_password = password_hash($userpass, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("INSERT INTO cc_member(cc_memberID, surname, forename, address, password)
                                                    VALUES(:username, :lname, :fname, :address, :userpass)");

            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":password", $new_password);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function login($username, $userpass){
        try{
            $stmt = $this->db->prepare("SELECT * FROM cc_member WHERE cc_memberID=:username");
            $stmt -> execute(array(':username'=>$username));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount()>0){
                if(password_verify($userpass, $userRow['password'])){
                    $_SESSION['user_session'] = $userRow['cc_memberID'];
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function is_loggedin(){
        if(isset($_SESSION['user_session'])){
            return true;
        }
    }

    public function redirect ($url){
        header("location: $url");
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}
