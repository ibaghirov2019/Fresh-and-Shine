<?php

/**
 * CabinetController
 */
class CabinetController
{

    /**
     *Action for the User Cabinet page
     */
    public function actionIndex()
    {
        // Get the user ID from the session
        $userId = User::checkLogged();

        // We receive information about the user from the database
        $user = User::getUserById($userId);

        
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

    /**
     *Action for the Edit User Data page
     */
    public function actionEdit()
    {
        // Get the user ID from the session
        $userId = User::checkLogged();

        // We receive information about the user from the database
        $user = User::getUserById($userId);

        // Fill the variables for form fields
        $name = $user['name'];
        $address = $user['address'];
        $email = $user['email'];
        $mobnumber = $user['mobnumber'];
        $login = $user['login'];
        $password = $user['password'];

        
        $result = false;

        // Form processing
        if (isset($_POST['submit'])) {
            // Get the data from the edit form
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $mobnumber = $_POST['mobnumber'];
            $login = $_POST['login'];
            $password = $_POST['password'];

          
            $errors = false;

            // Validate the values
            if (!User::checkName($name)) {
                $errors[] = 'The name can not be shorter than 4 characters';
            }
            if (!User::checkAddress($address)) {
                $errors[] = 'The Address can not be shorter than 4 characters';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Invalid Email';
            }
            if (!User::checkMobNum($mobnumber)) {
                $errors[] = 'Mobile Number must look like (+994 51 123 45 67)';
            }
            if (!User::checkLogin($login)) {
                $errors[] = 'Login must not be shorter than 4 characters';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }

            if ($errors == false) {
                // Еif there are no errors, saves the profile changes
                $result = User::edit($userId, $name, $address, $email, $mobnumber, $login, $password);
            }
        }

     
        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }

}
