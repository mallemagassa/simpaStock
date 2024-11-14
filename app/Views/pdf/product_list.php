<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .header div { margin: 10px; }
        .header img { width: 100px; height: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <div>
            <img src="data:image/png;base64, <?= base64_encode(file_get_contents($logo_path)) ?>" alt="Logo"><br>
            <strong>Téléphone : +22392683269</strong><br>
            <strong>Adresse : Djelibougou </strong><br>
        </div>
        <div>
            <h1>Liste des Produits</h1>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Code</th>
                <th>Unité</th>
                <th>Date Création</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $value): ?>
            <tr>
                <td><?= $value['name'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= $value['code'] ?></td>
                <td><?= $value['unit_name'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['created_at'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
