<?php
require_once "config.php";

function adminLogin($post)
{
    extract($post);
    $errors = [];

    //Checking for email...
    if (!empty($email)) {
        $tmpEmail = sanitize($email);

        if ($tmpEmail) {
            $mail = $tmpEmail;
        } else {
            $errors[] = "Invalid email address!";
        }
    } else {
        $errors[] = "Please enter your email address!";
    }


    //Checking for password...
    if (!empty($password)) {
        $password = sanitize($password);
    }else {
        $errors[] = "Please enter your password!";
    }


    //The Sql Statement...
    if (!$errors) {
        $sql = "SELECT * FROM admins WHERE email = '$mail'";
        $result = executeQuery($sql);
        if ($result) {
            $encryptedpassword = $result['password'];
            if (decrypt($encryptedpassword, $password)) {
                $_SESSION['admin'] = $result['id'];
                    // if (isset($rememberMe)) {
                    //     setcookie("admin_password", $password, time() + (86400 * 30), "/");
                    //     setcookie("admin_email", $mail, time() + (86400 * 30), "/");
                    // }
                return true;
            }
        }
        $errors[] = "Invalid Login Details!";
    }
    return $errors;

}

// Function for adding news
function AddNews($post) {
    extract($post);
    $errors = [];

    if (!empty($title)) {
        $tmp_title = sanitize($title);
        if (!check_duplicate("news", "title", $tmp_title)) {
            $tmp_title2 = $tmp_title;
            $title = str_replace("'", "&apos;", $tmp_title2);
        } else {
            $errors[] = "This news already exists";
        }
    } else {
        $errors[] = "News Title is empty";
    }

    if (isset($_FILES['image'])) {
        $image = sanitize($_FILES['image']['name']);
        $tmp_image = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_image, "../assets/images/news/$image");
    } else {
        $errors[] = "News Image is empty";
    }

    if (!empty($body)) {
        $tmp_description = $body;
        $description = str_replace("'", "&apos;", $tmp_description);
    } else {
        $errors[] = "News Description is empty";
    }

    $posted_by = $_SESSION['adminId'];

    if (!$errors) {
        $sql = "INSERT INTO news (title, body, image_url, post_by, date_posted) VALUES ('$title', '$description', '$image', '$posted_by', now())";

        $result = validateQuery($sql);
        if ($result) {
            return true;
        } else {
            $errors[] = "Operation Failed! Try Again";
        }
    } else {
        return $errors;
    }
}

// Function for adding class
function AddClass($post)
{
    extract($post);
    $errors = [];

    if (!empty($cname)) {
        $tmp_cname = sanitize($cname);
        if (!check_duplicate("classes", "class", $tmp_cname)) {
            $tmp_cname2 = $tmp_cname;
            $cname = str_replace("'", "&apos;", $tmp_cname2);
        } else {
            $errors[] = "This class already exists";
        }
    } else {
        $errors[] = "Class name is empty";
    }

    if (!$errors) {
        $sql = "INSERT INTO classes (class, date_added) VALUES ('$cname', now())";

        $result = validateQuery($sql);
        if ($result) {
            return true;
        } else {
            $errors[] = "Operation Failed! Try Again" . "<br>";
        }
    } else {
        return $errors;
    }
}

function AddAcadYear($post)
{
    extract($post);
    $errors = [];

    if (!empty($acad)) {
        $tmp_acad = sanitize($acad);
        if (!check_duplicate("academic_years", "academic_year", $tmp_acad)) {
            $tmp_acad2 = $tmp_acad;
            $acad = str_replace("'", "&apos;", $tmp_acad2);
        } else {
            $errors[] = "This year already exists";
        }
    } else {
        $errors[] = "Academic year is empty";
    }

    if (!$errors) {
        $sql = "INSERT INTO academic_years (academic_year, date_added) VALUES ('$acad', now())";

        $result = validateQuery($sql);
        if ($result) {
            return true;
        } else {
            $errors[] = "Operation Failed! Try Again" . "<br>";
        }
    } else {
        return $errors;
    }
} 
// end of acad

// Set Acad Year
function setAcadYear($post) {
    extract($post);
    $errors = [];

    if (!empty($acadYear)) {
        $active_acad = sanitize($acadYear);
    } else {
        $errors[] = "Select One Year";
    }

    if (!$errors) {
        $sql = "UPDATE academic_years SET active = 0";
        $query = validateQuery($sql);

        if ($query) {
            $sql2 = "UPDATE academic_years SET active = 1 WHERE id = $active_acad";
            $query2 = validateQuery($sql2);

            if ($query2) {
                return true;
            } else {
                return false;
            }
        }
    } else {
        return $errors;
    }
}
// End of active acad.


function AddAdmin($post) {
    extract($post);
    $errors = [];


    if (!empty($name)) {
        $name = sanitize($name);
    }else {
        $errors[] = "Admin name is empty!"  . "<br>";
    }


    //Checking for email...
    if (!empty($email)) {
        $tmpEmail = sanitize($email);

        if ($tmpEmail) {
            $mail = $tmpEmail;
        } else {
            $errors[] = "Invalid email address!"  . "<br>";
        }
    } else {
        $errors[] = "Admin email address is empty!"  . "<br>";
    }


    //Checking for password...
    if (!empty($password)) {
        $tmp_password = sanitize($password);
        $password = encrypt($tmp_password);
    }else {
        $errors[] = "Enter preferred password!"  . "<br>";
    }

    if (!$errors) {
        $sql = "INSERT INTO admins (name, email, password) VALUES ('$name', '$mail', '$password')";

        $result = validateQuery($sql);
        if ($result) {
            return true;
        } else {
            $errors[] = "Operation Failed! Try Again" . "<br>";
        }
    } else {
        return $errors;
    }
}