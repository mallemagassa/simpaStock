<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { display: flex; justify-content: space-between; }
        .header div { margin: 10px; }
        .header img { width: 100px; height: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <div>
            <img src="data:image/png;base64, <?= base64_encode(file_get_contents($logo_path)) ?>" alt="Logo"><br>
            <strong>Telephone : +22392683269</strong><br>
            <strong>Adresse : Djelibougou </strong><br>
        </div>
        <div>
            <h1 style="text-align:center; font-weight:bolder;text-decoration: underline;">Liste des Stocks</h1>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Achat</th>
                <th>Montant Inv</th>
                <th>Prix Vente</th>
                <th>Montant Vte</th>
                <th>Niveau Critique</th>
                <th>Date Création</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $value): ?>
            <tr>
                <td><?= $value['product_name'] ?></td>
                <td><?= $value['quantity'] ?></td>
                <td><?= $value['purchase_price'] ?> F CFA</td>
                <td><?= number_format($value['purchase_price'] * $value['quantity'], 0, '.', ' ') ?> F CFA</td>
                <td><?= $value['sale_price'] ?> F CFA</td>
                <td><?= number_format($value['sale_price'] * $value['quantity'], 0, '.', ' ') ?> F CFA</td>
                <td><?= $value['critique'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['created_at'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
