<?php

/**
 * Class User - model for working with users
 */
class User
{

    /**
     * User registration 
     */
    public static function register($name, $address, $email, $mobnumber, $login, $password)
    {
        // Connection DB
        $db = Db::getConnection();

        // test DB
        $sql = 'INSERT INTO user (name, address, email, mobnumber, login, password) '
                . 'VALUES (:name, :address, :email, :mobnumber, :login, :password)';

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':mobnumber', $mobnumber, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Editing user data
     */
    public static function edit($id, $name, $address, $email, $mobnumber, $login, $password)
    {
        // Connect to DB
        $db = Db::getConnection();

        // Test DB
        $sql = "UPDATE user 
            SET name = :name, address = :address, email = :email, mobnumber = :mobnumber, login = :login, password = :password
            WHERE id = :id";

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':mobnumber', $mobnumber, PDO::PARAM_STR);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Check if the user exists with the specified $ email and $ password
     */
    public static function checkUserData($login, $password)
    {
        // Connect DB
        $db = Db::getConnection();

        // Request DB
        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';

        // Results
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Let's address to record
        $user = $result->fetch();

        if ($user) {
            // If the record exists, return the user id
            return $user['id'];
        }
        return false;
    }

    /**
     * Remember user
     */
    public static function auth($userId)
    {
        // Write the user ID to the session
        $_SESSION['user'] = $userId;
    }

    /**
     * Returns the user ID if it is authorized
     */
    public static function checkLogged()
    {
        // If there is a session, return the user ID
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Checks whether the user is a guest
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Checks the name and address: no less than 4 characters
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 4) {
            return true;
        }
        return false;
    }

     public static function checkAddress($address)
    {
        if (strlen($address) >= 4) {
            return true;
        }
        return false;
    }

    /**
     * Checks phone: not less than 10 characters
     */
    public static function checkMobNum($mobnumber)
    {
        if (strlen($mobnumber) >= 10) {
            return true;
        }
        return false;
    }

     /**
     * Checks Day which specified user: not less than 10 characters
     */
    public static function checkDay($user_day)
    {
        if (strlen($user_day) == 10) {
            return true;
        }
        return false;
    }

     /**
     * Checks Time which specified user: not less than 10 characters
     */
    public static function checkTime($user_time)
    {
        if (strlen($user_time) == 5 ) {
            return true;
        }
        return false;
    }

    /**
     * Checks the name: no less than 4 characters
     */
    public static function checkLogin($login)
    {
        if (strlen($login) >= 4) {
            return true;
        }
        return false;
    }

    /**
     * Checks the name: no less than 6 characters
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Check E mail
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if the login is not occupied by another user
     */
     
    public static function checkLoginExists($login)
    {
        // Connect to DB       
        $db = Db::getConnection();

        // TEst
        $sql = 'SELECT COUNT(*) FROM user WHERE login = :login';

        // Take Result
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Checks if the email is not occupied by another user
     */
    public static function checkEmailExists($email)
    {
        // Connect to Db       
        $db = Db::getConnection();

        // Test Db
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Take Result
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Returns the user with the specified id
     */
    public static function getUserById($id)
    {
        // Connect to DB
        $db = Db::getConnection();

        // Test 
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // We indicate that we want to get data in the form of an array
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}
