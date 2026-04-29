<?php session_start(); ?>
<?php include ('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs - Impression</title>
    <style>
        /* Styles généraux pour l'écran */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .placeholder-box {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .placeholder-box strong {
            display: block;
            padding: 25px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8f9fc;
            color: #4a5568;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 14px 20px;
            color: #2d3748;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f7fafc;
        }

        /* ============================================ */
        /* STYLES SPÉCIFIQUES POUR L'IMPRESSION */
        /* ============================================ */
        @media print {
            /* Suppression des arrière-plans et dégradés */
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .placeholder-box {
                box-shadow: none;
                border-radius: 0;
                max-width: 100%;
            }

            .placeholder-box strong {
                background: white;
                color: black;
                padding: 20px 0 10px 0;
                font-size: 22px;
                border-bottom: 2px solid #000;
                margin-bottom: 15px;
            }

            /* Style professionnel pour l'impression */
            table {
                border: 1px solid #ccc;
                width: 100%;
                border-collapse: collapse;
            }

            th {
                background: #f0f0f0 !important;
                color: black;
                border: 1px solid #aaa;
                padding: 10px;
                font-size: 12px;
                font-weight: bold;
                text-transform: uppercase;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            td {
                border: 1px solid #ccc;
                padding: 8px 10px;
                font-size: 11px;
                color: black;
            }

            tr:hover {
                background: none;
            }

            /* Forcer les couleurs d'impression */
            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            /* Ajout d'en-tête et pied de page personnalisés */
            @page {
                size: A4;
                margin: 1.5cm;
                
                @top-center {
                    content: "Liste des Utilisateurs";
                    font-size: 12px;
                    font-weight: bold;
                    font-family: Arial, sans-serif;
                }
                
                @bottom-center {
                    content: "Page " counter(page) " / " counter(pages);
                    font-size: 10px;
                    font-family: Arial, sans-serif;
                }
                
                @bottom-right {
                    content: "Généré le " attr(datetime);
                    font-size: 9px;
                }
            }

            /* Éviter les coupures de page à l'intérieur des lignes */
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

            /* Supprimer les liens inutiles */
            a {
                text-decoration: none;
                color: black;
            }

            /* Pied de page avec date d'impression */
            body::after {
                content: "Document imprimé le " attr(data-date);
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                font-size: 9px;
                color: #666;
                padding: 10px;
                border-top: 1px solid #ccc;
                background: white;
            }
        }

        /* Bouton d'impression stylisé (visible uniquement à l'écran) */
        .print-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;
            z-index: 1000;
        }

        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        }

        .print-btn:active {
            transform: translateY(0);
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

        /* Informations d'impression (en-tête) */
        .print-header {
            display: none;
        }

        @media print {
            .print-header {
                display: block;
                text-align: center;
                margin-bottom: 20px;
            }
            .print-header h2 {
                margin: 0;
                font-size: 18px;
            }
            .print-header p {
                margin: 5px 0;
                font-size: 10px;
                color: #555;
            }
        }
    </style>
</head>
<body data-date="<?php echo date('d/m/Y à H:i:s'); ?>">
    
    <!-- Élément caché à l'écran mais visible à l'impression -->
    <div class="print-header">
        <h2>Liste des Utilisateurs</h2>
        <p>Date d'impression : <?php echo date('d/m/Y'); ?> à <?php echo date('H:i:s'); ?></p>
    </div>

    <section class="placeholder-box" id="utilisateur.php">
        <strong>📋 Liste des Utilisateurs</strong>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Signalements</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $req_ut = mysqli_query($conn, "select * from utilisateur order by signaler desc");
                
                while($data_ut = mysqli_fetch_assoc($req_ut)){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data_ut['nomu']); ?></td>
                    <td><?php echo htmlspecialchars($data_ut['emailu']); ?></td>
                    <td><?php echo htmlspecialchars($data_ut['telu']); ?></td>
                    <td style="text-align: center;"><?php echo $data_ut['signaler']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <!-- Bouton pour lancer l'impression -->
    <button class="print-btn" onclick="window.print();">
        🖨️ Imprimer / PDF
    </button>

    <script>
        // Afficher une notification avant impression
        window.onbeforeprint = function() {
            console.log('Préparation de l\'impression...');
        };
        
        window.onafterprint = function() {
            console.log('Impression terminée');
        };
    </script>
</body>
</html>