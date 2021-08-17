<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php';
    $signup = false;


// Sign up functions
function emptyInputSignup($name, $surname, $email, $username, $pwd, $pwdrepeat){
    $result;
    if (empty($name) || empty($email) || empty($surname) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if (!preg_match ('/^[a-zA-Z0-9 ]*$/', $username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdLength($pwd){
    $result;
    if (strlen($pwd) < 8) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $surname, $email, $username, $pwd){
    $sql = "INSERT INTO users (userName, userSurname, userEmail, userUid, userPwd, codeVerif, regDate) VALUES (?,?,?,?,?,?, NOW());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "<span id='message' class='error_message'> Une erreur est survenue ! Veuillez réessayer. </span>";
        //header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    

    $codeverif = "azertyuiopqsdfghjklmwxcvbn";
    $codeverif = str_shuffle($codeverif);
    $codeverif = strtoupper(substr($codeverif, 0, 8));
    $ecodeverif = password_hash($codeverif, PASSWORD_BCRYPT);

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $email, $username, $hashedPwd, $codeverif);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    ?>
    <?php
     // Load Composer's autoloader
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                   // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.hostinger.fr';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contact@ovalxv.com';                     // SMTP username
            $mail->Password   = 'OvalXV75016';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom('contact@ovalxv.com', 'OvalXV');
            $mail->addAddress($email);     // Add a recipient
    
            $body = "Bonjour! <br> Veuillez cliquer sur le lien ci-dessous pour valider votre compte :
            <br><br>
            
            <a href='http://www.ovalxv.com/verification.php?code=$ecodeverif&username=$username'> Cliquer ici pour vérifier votre compte ! </a><br><br>
    
            A bientôt sur la plateforme OvalXV!
            ";
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'OvalXV | Vérification de votre compte';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);
    
            if ($mail->send()){
                echo"<script language='javascript'>
                    window.location = '../login.php?error=signupcomplete&mail=sent';
                    window.location = newLocation;
                </script>
                ";
            }
            else{
                echo"<script language='javascript'>
                window.location = '../login.php?error=signupcomplete&mail=notsent';
                    window.location = newLocation;
                </script>
                ";
            }
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {
            $mail->ErrorInfo
        }";
        }
    exit();
}



// Login functions 
function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        $_SESSION["useremail"] = $uidExists["userEmail"];
        $_SESSION["username"] = $uidExists["userName"];
        $_SESSION["usersurname"] = $uidExists["userSurname"];
        $_SESSION["userclub"] = $uidExists["userClub"];
        $_SESSION["userbirthdate"] = $uidExists["userBirthDate"];
        $_SESSION["plan"] = $uidExists["plan"];
        $_SESSION["startsub"] = $uidExists["startSub"];
        $_SESSION["endsub"] = $uidExists["endSub"];
        $_SESSION["planid"] = $uidExists["planId"];
        $_SESSION["stripeid"] = $uidExists["stripeId"];
        $_SESSION["regdate"] = $uidExists["regDate"];
        $_SESSION["compteverif"] = $uidExists["compteVerif"];

        if($_SESSION["compteverif"] == "1"){
            header("location: ../espace-membre/espace_membre.php");
            exit();
        }
        else{
            header("location: ../login.php?error=tryaccountnotverified");
            exit();
        }
        
    }
}

//mail
function sendMail($conn, $email, $password, $ePassword){
    $uidExists = uidExists($conn, $email, $email);

    if ($uidExists === false){
        header("location: ../mot_de_passe.php?error=emailinvalide");
        exit();
    }

    else {
        // Load Composer's autoloader
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                   // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.hostinger.fr';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'contact@ovalxv.com';                     // SMTP username
            $mail->Password   = 'OvalXV75016';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom('contact@ovalxv.com', 'OvalXV');
            $mail->addAddress($email);     // Add a recipient
    
            $body = "Bonjour! <br> Voici vos informations:
            <br><br>
            Identifiant: $email <br>
            Mot de Passe: $password <br><br>

            Ce mot de passe peut être cangé dans la rubrique 'Mon compte' de votre espace OvalXV.
            
            <a href='www.ovalxv.com/login.php'> Cliquez ici pour vous connecter! </a><br><br>
    
            A bientôt sur la plateforme OvalXV!
            ";
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'OvalXV | Nouveau mot de passe!';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);
    
            if ($mail->send()){
                $sql=$conn->query("UPDATE users SET userPwd ='$ePassword' WHERE userEmail='$email'");

                echo"<script language='javascript'>
                    var newLocation = '../mot_de_passe.php?error=none';
                    window.location = newLocation;
                </script>
                ";
            }
            else{
                echo"<script language='javascript'>
                    var newLocation = '../mot_de_passe.php?error=mailnonenvoyé';
                    window.location = newLocation;
                </script>
                ";
            }
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {
            $mail->ErrorInfo
        }";
        }
    
    }
}
