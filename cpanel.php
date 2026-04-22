<?php session_start();
 include('connection.php'); 
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='admin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cpanel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        :root {
            --cp-surface: #ffffff;
            --cp-ink: #1f2937;
            --cp-muted: #6b7280;
            --cp-accent: #c8a33a;
            --cp-accent-dark: #8f6d11;
            --cp-line: rgba(31, 41, 55, 0.08);
            --cp-shadow: 0 24px 50px rgba(31, 41, 55, 0.10);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--cp-ink);
            background:
                radial-gradient(circle at top left, rgba(200, 163, 58, 0.20), transparent 28%),
                radial-gradient(circle at bottom right, rgba(31, 41, 55, 0.10), transparent 30%),
                linear-gradient(135deg, #fcfbf6 0%, #f1ead8 100%);
        }

        .panel-layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 100vh;
        }

        nav {
            padding: 28px 22px;
            background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
            color: #fff;
        }

        .brand {
            margin-bottom: 28px;
        }

        .brand-badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(200, 163, 58, 0.18);
            color: #f5df9a;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
        }

        .brand h2 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 800;
            color: #fff;
        }

        .brand p {
            margin: 0;
            color: rgba(255, 255, 255, 0.72);
            line-height: 1.6;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 10px;
        }

        nav a {
            display: block;
            padding: 14px 16px;
            border-radius: 16px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: transform 0.2s ease, background 0.2s ease;
        }

        nav a:hover {
            color: #fff;
            background: rgba(200, 163, 58, 0.18);
            transform: translateX(4px);
        }

        .panel-main {
            padding: 32px;
        }

        .hero {
            background: linear-gradient(135deg, #ffffff 0%, #f8f1db 100%);
            border: 1px solid rgba(200, 163, 58, 0.20);
            border-radius: 28px;
            box-shadow: var(--cp-shadow);
            padding: 30px;
            margin-bottom: 24px;
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: 34px;
            font-weight: 800;
        }

        .hero p {
            margin: 0;
            color: var(--cp-muted);
            line-height: 1.7;
        }

        .panel-card {
            background: rgba(255, 255, 255, 0.90);
            border: 1px solid var(--cp-line);
            border-radius: 24px;
            box-shadow: 0 16px 38px rgba(31, 41, 55, 0.08);
            padding: 26px;
        }

        .panel-card h1,
        .panel-card h3 {
            margin-top: 0;
            color: var(--cp-ink);
        }

        .panel-card h1 {
            margin-bottom: 18px;
            font-size: 28px;
            font-weight: 800;
        }

        .panel-card h3 {
            margin-bottom: 14px;
            font-size: 22px;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 18px;
            background: #fff;
            margin-bottom: 26px;
        }

        th,
        td {
            padding: 16px 14px;
            text-align: left;
            border-bottom: 1px solid rgba(31, 41, 55, 0.08);
        }

        th {
            background: #f8f3e3;
            color: #6b5b22;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        tr:hover td {
            background: rgba(248, 243, 227, 0.65);
        }

        td a {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            background: #fef2f2;
            color: #b42318;
            border: 1px solid #fecaca;
        }

        form {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        input[type="text"] {
            flex: 1 1 260px;
            padding: 14px 16px;
            border-radius: 14px;
            border: 1px solid rgba(31, 41, 55, 0.12);
            background: #fff;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--cp-accent);
            box-shadow: 0 0 0 4px rgba(200, 163, 58, 0.14);
        }

        input[type="submit"] {
            padding: 14px 20px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--cp-accent) 0%, var(--cp-accent-dark) 100%);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 24px rgba(143, 109, 17, 0.20);
        }

        .placeholder-sections {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .placeholder-box {
            min-height: 120px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px dashed rgba(31, 41, 55, 0.12);
            border-radius: 20px;
            padding: 20px;
            color: var(--cp-muted);
        }

        .placeholder-box strong {
            display: block;
            margin-bottom: 8px;
            color: var(--cp-ink);
        }

        @media (max-width: 991px) {
            .panel-layout {
                grid-template-columns: 1fr;
            }

            .panel-main {
                padding: 22px 16px 28px;
            }

            .placeholder-sections {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .hero,
            .panel-card {
                padding: 22px;
                border-radius: 20px;
            }

            .hero h1,
            .panel-card h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="panel-layout">
        <nav>
            <div class="brand">
                <span class="brand-badge">Admin Space</span>
                <h2>Abito Panel</h2>
                <p>Un tableau de bord plus propre pour la gestion quotidienne.</p>
            </div>
            <ul>
                <li><a href="categorie.php">Categories</a></li>
                <li><a href="commentaire.php">commentaires</a></li>
                <li><a href="cpanel.php">Dashboard</a></li>
                <li><a href="utilisateur.php">Users</a></li>
                <li><a href="produit.php">Products</a></li>
                <li><a href="deconnecter.php">Disconnect</a></li>
            </ul>
        </nav>

        <main class="panel-main">
            <section class="hero" id="cpanel.php">
                <h1>Dashboard administrateur</h1>
                <p>Cette page rassemble les actions essentielles du panneau d'administration avec une presentation plus moderne, plus lisible et adaptee au mobile.</p>
            </section>

            <section class="panel-card" id="categorie.php">
                <h1> gestion des categories </h1>
                <table>
                    <tr>          
                        <th>titre</th>
                        <th>action</th>
                    </tr>
                     <?php
                    $req_cat=mysqli_query($conn,"select * from categorie");
                    while($data_cat=mysqli_fetch_assoc($req_cat)){
                    ?>

                    <tr>          
                        <td><?php echo $data_cat['titrec'] ?></td>
                        <td><a href="sup_cat.php?idc=<?php echo $data_cat['idc'] ?>">delete</a></td>
            

                    </tr>

                   <?php } ?>
                   
                </table>
                <div>
                    <h3> Ajouter une categories</h3>
                    <form action="" method="post">
                        <input type="text" name="titrec" placeholder="Nom de la categorie" required>
                        <input type="submit" name="btn" value="Ajouter">
                    </form>
                    <?php
                    if(isset($_POST['btn'])){
                        $titrec = $_POST['titrec'];
                        $ajt=mysqli_query($conn,"insert into categorie (titrec) values ('$titrec')");
                        if($ajt){
                            echo "<script>window.location.href='cpanel.php'</script>";
                        }
                        else{
                            echo "error error ";
                        }
                    }
                    ?>
                </div>
            </section>

            <section class="placeholder-sections">
                <section class="placeholder-box" id="commentaire.php">
                    <strong>Commentaires</strong>
                    Zone reservee pour la moderation et le suivi des retours.
                </section>
                <section class="placeholder-box" id="utilisateur.php">
                    <strong>Utilisateurs</strong>
                    Espace prevu pour la gestion des comptes et profils.
                </section>
                <section class="placeholder-box" id="produit.php">
                    <strong>Produits</strong>
                    Bloc de navigation rapide vers le catalogue et les actions produit.
                </section>
            </section>
        </main>
    </div>
</body>
</html>
