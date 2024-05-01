<?php
session_start();
include("constant.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    if (!empty($loginUsername) && !empty($loginPassword)) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $loginUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Username exists, now check if the password matches
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            $userId = $row['username'];

            if (password_verify($loginPassword, $hashedPassword)) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username']; 
            $_SESSION['user_id'] = $row['id']; 

            header("Location: home.php?user_id=$userId");

            } else {
                echo '<script>alert("Incorrect password");</script>';
            }
        } else {
            echo '<script>alert("Username not found");</script>';
        }
    } else {
        echo '<script>alert("Please enter valid information");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style>

        body {
            background-color: #AD88C6;
            background-image: url('yellow-bg.png');
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            font-family: "Outfit", sans-serif;
        }

        .mb-3 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 8px;
        }

        .box {
            margin-top: 60px;
            display: grid;
            place-items: center;
            z-index: -1;
        }
        .box p {
            font-size: 180px; /* Increased font size */
            font-weight: bold; /* Added bold font weight */
            text-transform: uppercase;
            color: rgba(61, 21, 152, 0.8);
        }


        header {
            margin: 0;
            padding: 0;
        }
        h2{
            text-align: center;
            color: #FAF9F6;
            font-family: 'Varela Round', sans-serif;
            z-index: 2;
        }
        .or-divider {
            font-weight: bold;
            margin-left: 7px;
            margin-right: 7px;
            align-self: center;
            color: #FAF9F6; /* Set the text color to black or a color that contrasts well with your background */
            font-family: 'Varela Round', sans-serif;
        }
        .signcontainer {
            background-color: #000000;
        }

        .sign {
            position: relative;
            background: none;
            color: #303030;
            font-size: 4rem;
            display: inline-block;
            font-family: 'Varela Round', sans-serif;
        }

        .col-md-6 {
        text-align: center;
        margin: 50px; /* Add margin to the form container */
        }
        #signupForm {
            text-align: left; /* Align the text to the left within the form */
            max-width: 350px; /* Set a maximum width for the form if needed */
            margin: auto; /* Center the form horizontally */
            margin-top: -50px;
        }

        #signupForm label {
            color: #37062b;
        }
        :root {
    --clr-neon: hsl(346, 100%, 50%);
    --clr-bg: hsl(0, 0%, 0%);
    }
    .sign {
            position: relative;
            background: none;
            color: #303030;
            font-size: 4rem;
            display: inline-block;
            font-family: 'Varela Round', sans-serif;
        }

        .col-md-6 {
            text-align: center;
        }

        #signupForm {
            text-align: left;
            max-width: 350px;
            margin: auto;
            margin-top: -50px;
        }

        #signupForm label {
            color: #FAF9F6;
        }
        :root {
            --clr-neon: #C780FA;
            --clr-bg: hsl(0, 0%, 0%);
        }
        .signup {
            letter-spacing: 3px;
            text-transform: uppercase;
            background: #7F669D;
            font-size: 15px;
            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            color: #F3BCC8;
            border: #400E32;
            padding: 0.25em 1em;
            border-radius: 0.25em;
            margin-left: 11px;
            width: 130px;
            height: 50px;
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;
            position: relative;
        }

        .signup::before {
            pointer-events: none;
            content: "";
            position: absolute;
            background: var(--clr-neon);
            top: 90%;
            left: 0;
            width: 100%;
            height: 100%;
            transform: perspective(3em) rotateX(40deg) scale(1, 0.35);
            filter: blur(1em);
            opacity: 0.7;
        }

        .signup::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 0 2em 0.5em var(--clr-neon);
            opacity: 0;
            background-color: #7F669D;
            z-index: -1;
            transition: opacity 100ms linear;
        }

        .signup:hover,
        .signup:focus {
            color: #fff;
            text-shadow: none;
        }

        .signup:hover::before,
        .signup:focus::before {
            opacity: 1;
        }
        .signup:hover::after,
        .signup:focus::after {
            opacity: 1;
        }
    .login {
            letter-spacing: 3px;
            text-transform: uppercase;
            background: #7F669D;
            font-size: 15px;
            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            color: #F3BCC8;
            border: #400E32;
            padding: 0.25em 1em;
            border-radius: 0.25em;
            margin-left: 6px;
            width: 130px;
            height: 50px;
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;
            position: relative;
        }

        .login::before {
            pointer-events: none;
            content: "";
            position: absolute;
            background: var(--clr-neon);
            top: 90%;
            left: 0;
            width: 100%;
            height: 100%;
            transform: perspective(3em) rotateX(40deg) scale(1, 0.35);
            filter: blur(1em);
            opacity: 0.7;
        }

        .login::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            box-shadow: 0 0 2em 0.5em var(--clr-neon);
            opacity: 0;
            background-color: #7F669D;
            z-index: -1;
            transition: opacity 100ms linear;
        }

        .login:hover,
        .login:focus {
            color: #fff;
            text-shadow: none;
        }

        .login:hover::before,
        .login:focus::before {
            opacity: 1;
        }
        .login:hover::after,
        .login:focus::after {
            opacity: 1;
        }

h2 {
            margin-top: -30px;
            margin-bottom: 80px;
            display: grid;
            place-items: center;
             font-family: 'zen tokyo zoo', sans-serif;
             z-index: -1;
        }
        h2{
            font-size: 30px;
            text-transform: uppercase;
            color: #ffd9e2;
            text-shadow: 0 0 0 transparent,
                        0 0 10px #ff003c,
                        0 0 20px rgba(255, 0, 60, 0.5),
                        0 0 40px #ff003c,
                        0 0 100px #ff003c,
                        0 0 200px #ff003c,
                        0 0 300px #ff003c,
                        0 0 500px #ff003c,
                        0 0 1000px #ff003c;

                animation: animate 3s infinite alternate;
        }

@media (max-width: 768px) {
    .box {
        margin-top: 30px;
    }

    .box p {
        font-size: 70px;
    }
}

@media (max-width: 576px) {
    .box p {
        font-size: 60px;
    }
}

    </style>
</head>

<body>
    <div class="box">
        <p>SHOPHEAR</p>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 sample">
        <form id="signupForm" method="POST" action="login.php">
    <div class="mb-3">
        <label for="signupUsername" class="form-label">Username:</label>
        <input type="text" class="form-control" id="signupUsername" name="loginUsername" required>
    </div>
    <div class="mb-3">
        <label for="signupPassword" class="form-label">Password:</label>
        <input type="password" class="form-control" id="signupPassword" name="loginPassword" required>
    </div>
    <div class="mt-3 text-center d-flex flex-column align-items-center">
        <div class="btn-group mx-auto">
            <button type="submit" class="login" id="log">Login</button>
            <button type="button" onclick="window.location.href='signup.php'" class="signup">Sign Up</button>
        </div>
    </div>
    
</form>

        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>