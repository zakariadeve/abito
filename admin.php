<?php session_start();  ?>
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(212, 176, 32, 0.22), transparent 30%),
                radial-gradient(circle at bottom right, rgba(34, 44, 66, 0.12), transparent 32%),
                linear-gradient(135deg, #fcfbf7 0%, #f2ecdd 100%);
        }

        .admin-shell {
            width: 100%;
            max-width: 460px;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(34, 44, 66, 0.08);
            border-radius: 24px;
            padding: 36px 30px;
            box-shadow: 0 24px 60px rgba(34, 44, 66, 0.14);
            backdrop-filter: blur(8px);
        }

        .admin-tag {
            display: inline-block;
            margin-bottom: 14px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(212, 176, 32, 0.14);
            color: #8a6a09;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 10px;
            color: #1f2937;
            font-size: 32px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .admin-text {
            margin: 0 0 24px;
            color: #6b7280;
            line-height: 1.6;
        }

        form {
            display: grid;
            gap: 16px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(31, 41, 55, 0.12);
            border-radius: 14px;
            background: #fff;
            color: #1f2937;
            font-size: 15px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #cda423;
            box-shadow: 0 0 0 4px rgba(205, 164, 35, 0.16);
            transform: translateY(-1px);
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px 16px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #d4b020 0%, #ae8617 100%);
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.02em;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(174, 134, 23, 0.26);
        }

        input::placeholder {
            color: #9ca3af;
        }

        .admin-card > form + * {
            display: block;
            margin-top: 18px;
            color: #b42318;
            font-weight: 600;
        }

        @media (max-width: 575px) {
            .admin-card {
                padding: 28px 22px;
                border-radius: 20px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-shell">
        <div class="admin-card">
            <span class="admin-tag">Administration</span>
            <h1>espace admin</h1>
            <p class="admin-text">Connectez-vous pour acceder a votre panneau d'administration.</p>
            <form  method="post">
                <input type="text" name="user" placeholder="user" required>
                <input type="password" name="mdpa" placeholder="password" required>
                <input type="submit" name ="btn" value="login">
            </form>
            <?php
            if(isset($_POST['btn'])){
                $user = $_POST['user'];
                $mdpa = $_POST['mdpa'];
                $req=mysqli_query($conn,"select * from admin 
                where user='$user' AND mdpa='$mdpa'");
                if(mysqli_num_rows($req)>=1){
                    $_SESSION['admin'] = 'admin';
                    echo "<script>window.location.href='cpanel.php'</script>";
               
            }
            else{
                echo "error error ";
            }
            }
            ?>
        </div>
    </div>

</body>

</html>
