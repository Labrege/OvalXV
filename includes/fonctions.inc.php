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
    $sql = "INSERT INTO users (userName, userSurname, userEmail, userUid, userPwd, regDate) VALUES (?,?,?,?,?, NOW());";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "<span class='error_message'> Une erreur est survenue ! Veuillez réessayer. </span>";
        //header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<span class='error_message' style='color: rgb(50,205,50);'> Votre inscription a bien été validée ! </br></br> Afin de finaliser votre inscription, veuillez cliquer sur le lien envoyé par mail. </span>";
    //header("location: ../signup.php?error=none");
    ?>
    <script>
        console.log("true");
        $(".name").val("");
        $(".surname").val("");
        $(".email").val("");
        $(".username").val("");
        $(".pwd").val("");
        $(".pwdrepeat").val("");
    </script>
    <?php
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
        $_SESSION["plan"] = $uidExists["plan"];
        header("location: ../espace-membre/espace_membre.php");
        exit();
    }
}

//mail
function sendMail($conn, $email, $password, $ePassword){

    $result;

    $uidExists = uidExists($conn, $email, $email);
    if ($uidExists === false){
        //header("location: ../mot_de_passe.php?error=emailinvalide");
        echo "<span class='error-message'> L'addresse email saisie n'est rattachée à aucun compte ! </span>";
        exit();
    }

    else {
        // Load Composer's autoloader
        $mail = new PHPMailer(true);

        $sql=$conn->query("UPDATE users SET userPwd ='$ePassword' WHERE userEmail='$email'");
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
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
            
            <a href='www.ovalxv.com/login.php'> Cliquez ici pour vous connecter! </a><br><br>
    
            A bientôt sur la plateforme OvalXV!
            ";
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'OvalXV | Nouveau mot de passe!';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);
    
            if ($mail->send()){
                echo "<span class='error-message'> Mail envoyé ! </span>";
                exit();
                /*echo "<script language='javascript'>
                    var newLocation = '../mot_de_passe.php?error=none';
                    window.location = newLocation;
                </script>
                ";*/
            }
            else{
                echo "<span class='error-message'> Problème ! </span>";
                exit();
                /*echo"<script language='javascript'>
                    var newLocation = '../mot_de_passe.php?error=mailnonenvoyé';
                    window.location = newLocation;
                </script>
                ";*/
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {
                $mail->ErrorInfo
            }";
        }
    }
}
