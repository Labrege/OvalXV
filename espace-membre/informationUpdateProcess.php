<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['includes']);

if (isset($_POST['submit'])) {
    $messageMdp = '';
    $updateOther = true;
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $email= $_POST['email'];
    $motdepasse= $_POST['motdepasse'];
    $hashedPwd = password_hash($motdepasse, PASSWORD_DEFAULT);
    $birthdate = $_POST['birthdate'];
    $club = $_POST['club'];
    $useruid = $_SESSION['useruid'];

    //Prénom
    if (empty($firstname)) {
        $message = "Veuillez remplir le champ 'Prénom'<span class='exit-message'>&times;</span>";
        echo "<p class='error_message'> $message </p>";
        ?>
        <script>
        $('#firstname').addClass('empty-input')
        </script>
        <?php
        
    }
    else {
        ?>
        <script>
        $('#firstname').removeClass('empty-input')
        </script>
        <?php
    }

    //Nom
    if (empty($lastname)) {
        $message = "Veuillez remplir le champ 'Nom'<span class='exit-message'>&times;</span>";
        echo "<p class='error_message'> $message </p>";
        ?>
        <script>
        $('#lastname').addClass('empty-input')
        </script>
        <?php
    }
    else {
        ?>
        <script>
        $('#lastname').removeClass('empty-input')
        </script>
        <?php
    }

    //Email
    if (empty($email)) {
        $message = "Veuillez remplir le champ 'Email'<span class='exit-message'>&times;</span>";
        echo "<p class='error_message'> $message </p>";
        ?>
        <script>
        $('#email').addClass('empty-input')
        </script>
        <?php
    }
    else {
        ?>
        <script>
        $('#email').removeClass('empty-input')
        </script>
        <?php
    }

    if (!empty($motdepasse) && strlen($motdepasse)<8) {
        $message = "Votre nouveau mot de passe doit contenir au moins 8 charactères<span class='exit-message'>&times;</span>";
        echo "<p class='error_message'> $message </p>";
        $updateOther = false;
        ?>
        <script>
            $('#motdepasse').addClass('empty-input')
        </script>
        <?php
    }

    if (empty($motdepasse)) {
        ?>
        <script>
            $('#motdepasse').removeClass('empty-input')
        </script>
        <?php
    }

    if (!empty($motdepasse) && strlen($motdepasse)>8) {
        ?>
        <script>
            $('#motdepasse').removeClass('empty-input')
            $('#motdepasse').val('')
        </script>
        <?php
        $sqlMdp= $conn->query("UPDATE users 
        SET userPwd = '$hashedPwd'
        WHERE userUid = '$useruid'");
        if ($sqlMdp) {
            $messageMdp = "Nouveau mot de passe enregistrée"; 
        }
        else {
            $messageMdp = "Un problème est survenu... Veuillez réessayer ulterieurement";
        }
    } 
    
    if (!empty($firstname) && !empty($lastname) && !empty($email) && $updateOther == true ) {
        $birthdate = date('Y-m-d', strtotime($birthdate));
        $sqlInformation = $conn->query("UPDATE users 
        SET userName = '$firstname' , userSurname = '$lastname', userEmail = '$email',  userBirthDate = '$birthdate' , userClub = '$club'
        WHERE userUid = '$useruid'");
        if ($sqlInformation) {
            $message = "Modifications enregistrées <span class='exit-message'>&times;</span>"; 
            echo "<p class='success_message'> $message </p>";
            $_SESSION["username"] = $firstname;
            $_SESSION["usersurname"] = $lastname;
            $_SESSION["useremail"] = $email;
            $_SESSION["userclub"] = $club;
            $_SESSION['userbirthdate'] = $birthdate;
        }
        else {
            $message = "Un problème est survenu... Veuillez réessayer ulterieurement! <span class='exit-message'>&times;</span>";
            echo "<p class='error_message'> $message </p>";
            
        }
    }
}