<?php

/**
 * UserController
 */
class UserController
{
    /**
     * Action for the "Register" page
     */
    public function actionRegister()
    {
        // Variables for the form
        $name = false;
        $address = false;
        $email = false;
        $mobnumber = false;
        $login = false;
        $password = false;
        $result = false;

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form is sent
            // Get the data from the form
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $mobnumber = $_POST['mobnumber'];
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Error flag
            $errors = false;

            // Field Validation
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
            if (User::checkLoginExists($login)) {
                $errors[] = 'This login is already in use';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'This email is already in use';
            }
            
            if ($errors == false) {
                // If there are no errors
                // We register the user
                $result = User::register($name, $address, $email, $mobnumber, $login, $password);
            }
        }

        // Connect the view
        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    
    /**
     * Action for the Login page
     */
    public function actionLogin()
    {
        // Variables for the form
        $login = false;
        $password = false;
        
        // Form processing
        if (isset($_POST['submit'])) {
            // If the form is sent
            // Get the data from the form
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Error flag
            $errors = false;

            // Field Validation
            if (!User::checkLogin($login)) {
                $errors[] = 'Invalid Login';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Password must not be shorter than 6 characters';
            }

            // Check if the user exists
            $userId = User::checkUserData($login, $password);

            if ($userId == false) {
                // If the data is incorrect, we show an error
                $errors[] = 'Invalid login data';
            } else {
                // If the data is correct, remember the user (session)
               User::auth($userId);

                // We redirect the user to the closed part - the cabinet
               header("Location: /cabinet");
           }
       }

        // Connect the view
       require_once(ROOT . '/views/user/login.php');
       return true;
   }

    /**
     * Delete user data from session
     */
    public function actionLogout()
    {
        
        //Delete user information from the session
        unset($_SESSION["user"]);
        
        // Redirecting the user to the main page
        header("Location: /");
    }

}
