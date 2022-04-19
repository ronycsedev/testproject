<?php
    $fonts = "verdana";

    $errname = $erremail = $errwebs = $errgender = "";
    $name = $email = $website = $comment = $gender = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"])){
            $errname="<span style='color:red'>Name is required.</span>";
        } else{
            $name = validate($_POST["name"]);
            }
        if(empty($_POST["email"])){
            $erremail="<span style='color:red'>E-mail is required.</span>";
        } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $erremail="<span style='color:red'>Invalid E-mail format.</span>";
        }else{
            $email = validate($_POST["email"]);
            }
        if(empty($_POST["website"])){
            $errwebs="<span style='color:red'>Website is required.</span>";
        } elseif(!filter_var($_POST["website"], FILTER_VALIDATE_URL)){
            $errwebs="<span style='color:red'>Invalid Website format.</span>";
        } else{
            $website = validate($_POST["website"]);
            }
            if(empty($_POST["gender"])){
                $errgender="<span style='color:red'>Website is required.</span>";
            } else{
                $gender = validate($_POST["gender"]);
                }
        
        $comment = validate($_POST["comment"]);
        

        // echo "Name: ".$name."<br/>";
        // echo "E-mail: ".$email."<br/>";
        // echo "Website: ".$website."<br/>";
        // echo "Comment: ".$comment."<br/>";
        // echo "Gender: ".$gender;
    }
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <title>PHP</title>
    <style>
        body{font-family:<?php echo $fonts; ?>}
    </style>
</head>
<body>
    <section>
        <h1>webtricker.com</h1>
    </section>
    <section class="REQUEST-method">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Username: <input type="text" name="username">
            <input type="submit" value="Submit">
        </form>
    </section>

    <section class="GET-method">
        <a href="text.php?msg=from&txt=rony">Sent Data</a>
    </section>

    <!-- <?php
        echo "Now today i will tray practice work";
        echo "<br/>";
        echo $_SERVER['SCRIPT_NAME'];
        echo "<br/>";
        echo $_SERVER['HTTP_USER_AGENT'];
        echo "<br/>";
        echo $_SERVER['SERVER_ADDR'];
        echo "<br/>";
        echo $_SERVER['PHP_SELF'];
        echo "<br/>";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_REQUEST['username'];
            if(empty($name)){
                echo "<span style='color:red;'> Username  field must not be empty !</span>";
            } else{
                echo "<span style='color: green;'>You have submitted: ".$name."</span>";
            }
        }
        echo "<br/>";

    ?> -->

        <section class="form-validation">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <table>
                    <p style="color:red">* Required field</p>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name">*<?php echo "$errname"; ?></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="email">*<?php echo "$erremail"; ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td><input type="text" name="website">*<?php echo "$errwebs"; ?></td>
                    </tr>
                    <tr>
                        <td>Comment</td>
                        <td><textarea name="comment" id="" cols="30" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="female">Female
                            *<?php echo "$errgender"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="submit"></td>
                    </tr>
                </table>
            </form>
        </section>

    <section>
        <h2>footer</h2>
    </section>
</body>
</html>