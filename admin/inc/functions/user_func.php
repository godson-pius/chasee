<?php
require_once "config.php";


function user_register($post) {
    extract($_POST);
    $errors = [];

    if (!empty($fullname)) {
        $fullname = sanitize($fullname);
    } else {
        $errors[] = "Enter fullname!";
    }
    
    if (!empty($username)) {
        $username = sanitize($username);
    } else {
        $errors[] = "Enter username!";
    }
    
    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "Enter email!";
    }
    
    if (!empty($address)) {
        $address = sanitize($address);
    } else {
        $errors[] = "Enter address!";
    }
    
    if (!empty($dob)) {
        $dob = sanitize($dob);
    } else {
        $errors[] = "Enter date of birth!";
    }
    
    if (!empty($acc_type)) {
        $acc_type = sanitize($acc_type);
    } else {
        $errors[] = "Enter account type!";
    }
    
    if (!empty($password)) {
        $tmp_password = sanitize($password);
    } else {
        $errors[] = "Enter password!";
    }

    if (!empty($confirm_pwd)) {
        $confirm_pwd = sanitize($confirm_pwd);
    } else {
        $errors[] = "Confirm password!";
    }
    
    if (!isset($terms)) {
        $errors[] = "Confirm password!";
    }

    if ($tmp_password === $confirm_pwd) {
        $password = encrypt($tmp_password);
    } else {
        $errors[] = "Passwords do not match!";
    }


    if (!$errors) {
        // generating account number...
        $account_number = rand(6578900, null) * 1236;

        $sql = "INSERT INTO users (fullname, email, username, address, dob, acc_type, acc_number, password, created_at, updated_at) VALUES ('$fullname', '$email', '$username', '$address', '$dob', '$acc_type', '$account_number', '$password', now(), now())";

        $result = validateQuery($sql);
        if ($result === true) {
            return true;
        } else {
            $errors[] = "Check form inputs";
        }
    } else {
        return $errors;
    }






} // end of user registration

// User Login
function user_login($post)
{
    extract($post);
    $errors = [];

    //Checking for email...
    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "Please enter your email!";
    }


    //Checking for password...
    if (!empty($password)) {
        $password = sanitize($password);
    } else {
        $errors[] = "Please enter your password!";
    }


    //The Sql Statement...
    if (!$errors) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = executeQuery($sql);
        if ($result) {
            $encryptedpassword = $result['password'];
            if (decrypt($encryptedpassword, $password)) {
                if ($result['access'] == 1) {
                    $_SESSION['user'] = $result['id'];
                    return true;    
                } else {
                    $acc_blocked_err = "Your account have been blocked!";
                    return $acc_blocked_err;
                }
                
            }
        }
        $errors[] = "Invalid Login Details!";
    }
    return $errors;
}

function cardLogin($post) {
    extract($post);
    $errors = [];

    if (!empty($username)) {
        $username = sanitize($username);
    } else {
        $errors[] = "Username is empty";
    }

    if (!empty($pin)) {
        $pin = sanitize($pin);
    } else {
        $errors[] = "Pin is empty";
    }

    if (isset($_SESSION['studentId'])) {
        $student_id = $_SESSION['studentId'];
    }

    if (!$errors) {
        $sql = "SELECT * FROM students WHERE id = $student_id";
        $row = executeQuery($sql);

        if ($username === $row['username']) {
            $sql2 = "SELECT * FROM student_cards WHERE card_pin = '$pin'";
            $row2 = executeQuery($sql2);

            if ($row2) {
                $stusentIdFromDb = $row2['student_id_fk'];
                $validStatus = $row2['valid'];

                // echo "<pre>";
                // print_r($row2);
                // echo "<br>student-id: $student_id";
                // echo "<br>valid status: $validStatus";

                // die();

                if ($stusentIdFromDb == $student_id && $validStatus == 1) {
                    $_SESSION['cardSet'] = $row2['card_pin'];
                    return true;
                } else {

                    if(empty($validStatus)){
                        $changeToInvalid = "UPDATE student_cards SET student_id_fk = '$student_id', valid = '1' WHERE card_pin = '$pin'";
                        $invalidQuery = validateQuery($changeToInvalid);

                        if ($invalidQuery) {
                            $_SESSION['cardSet'] = $row2['card_pin'];
                            return true;
                        } else {
                            $invalid = "Invalid card details";
                            return $invalid;
                        }
                    }else{
                        $invalid = "This card does not belong to you! Please check for your card";
                        return $invalid;
                    }

                }
            } else {
                $invalid = "Invalid card details";
                return $invalid;
            }
            
        } else {
            $invalid = "Invalid card details";
            return $invalid;
        }
    } else {
        return $errors;
    }
}

function updateStudentProfile($post)
{
    extract($post);
    $errors = [];

    $studentId = $id;

    if (!empty($fullname)) {
        $fullname = sanitize($fullname);
    } else {
        $errors[] = "Name cannot be empty!";
    }

    if (!empty($oldpassword)) {
        $oldpassword = sanitize($oldpassword);

        $sql = "SELECT * FROM students WHERE id = $studentId";
        $gettingDetails = executeQuery($sql);
        if (!empty($gettingDetails)) {
            $db_pwd = $gettingDetails['password'];
            $check_pwd = decrypt($db_pwd, $oldpassword);
            if ($check_pwd === true) {
                if (!empty($newpassword)) {
                    $new_pwd_tmp = sanitize($newpassword);
                    $new_pwd = encrypt($new_pwd_tmp);

                    $update_pwd = "UPDATE students SET password = '$new_pwd' WHERE id = $studentId";
                    $update_pwd_query = validateQuery($update_pwd);
                }
            } else {
                $errors[] = "Incorrect Password";
            }
        }
    }

    if (isset($_FILES['pics'])) {
        $pics = sanitize($_FILES['pics']['name']);
        $tmp_pics = $_FILES['pics']['tmp_name'];
        move_uploaded_file($tmp_pics, "../assets/images/students/$pics");
    } else {
        $errors[] = "Profile Image is empty" . "<br>";
    }

    if (!$errors) {
        $update_profile = "UPDATE students SET name = '$fullname', image = '$pics' WHERE id = $studentId";
        $profile_query = validateQuery($update_profile);

        if ($profile_query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function make_transfer($post, $user_id) {
    extract($post);
    $errors = [];
    $err_flag = false;

    if (!empty($recipent)) {
        $acc_number = sanitize($recipent);
    } else {
        $err_flag = true;
        $errors[] = "Enter account number!";
    }
    
    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Enter account number!";
    }
    

    if ($err_flag === false) {
        $sql1 = "SELECT * FROM users WHERE id = $user_id";
        $query1 = executeQuery($sql1);

        if ($query1) {
            $details = $query1;
            $total_balance = $details['acc_balance'];

            if ($amount <= $total_balance) {
                $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, created_at) VALUES ($user_id, 1, $amount, '$acc_number', now())";
                $query2 = validateQuery($sql2);

                if ($query2) {
                    return true;
                }
            } else {
                $balance_err = "Insufficient Balance";
                return $balance_err;
            }
        } else {
            $err_user = "Error from getting users";
            return $err_user;
        }
    } else {
        return $errors;
    }
}


function credit_account($post, $user_id) {
    extract($post);
    $err_flag = false;
    $errors = [];

    if (!empty($amount)) {
        $amount = sanitize($amount);
    } else {
        $err_flag = true;
        $errors[] = "Amount is empty";
    }

    if ($err_flag === false) {
        $ql = "SELECT * FROM users WHERE id = $user_id";
        $qq = executeQuery($ql);

        if ($qq) {
            $details = $qq;
            $amount_in_db = $details['acc_balance'];
            $acc_number = $details['acc_number'];

            $update_balance = $amount + $amount_in_db;

            $sql = "UPDATE USERS SET acc_balance = '$update_balance' WHERE id = $user_id";
            $result = validateQuery($sql);

            if ($result) {
                $sql2 = "INSERT INTO transactions (user_id, type, amount, to_user, approved, created_at) VALUES ($user_id, 0, $amount, $acc_number, 1, now())";
                $query2 = validateQuery($sql2);

                if ($query2) {
                    return true;
                } else {
                    $err = "Error! try again";
                }
            } 
        }
    } else {
        return $errors;
    }
}