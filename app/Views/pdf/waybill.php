<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: right;
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>

    <div style="float: left;">
        <img src="data:image/png;base64, <?= base64_encode(file_get_contents( $logo_path )) ?> "><br>
        <strong>Telephone : +22392683269</strong><br>
        <strong>Adresse : Djelibougou </strong><br>

    </div>

    <div style="float: right;">
        <h1>Bordereau de Sortie</h1>
        <strong>Ref : <?= $ref; ?></strong><br>
    </div>
    <!--<img src="<?= $logo_path; ?>" alt="Logo" height="50" style="float: left;">-->
  
    <p style="text-align:center; font-weight:bolder;text-decoration: underline;">Date de sortie : <?= $formatted_date; ?></p>
    <table>
        <thead>
            <tr>
                <th>Quantité</th>
                <th>Produit</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $value): ?>
                <tr>
                    <td><?= $value->quantity; ?></td>
                    <td><?= $value->product_name; ?></td>
                    <td><?= number_format($value->amount_total, 0, '.', ' ') . ' F CFA'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="total">Total</td>
                <td><?= number_format($total_amount, 0, '.', ' ') . ' F CFA'; ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
