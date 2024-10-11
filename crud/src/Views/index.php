<h2>List of Items</h2>
<a href="<?= base_url('crud/' . strtolower($modelName) . '/create') ?>">Create New</a>
<ul>
    <?php foreach ($items as $item): ?>
        <li>
            <?= $item['name'] ?>
            <a href="<?= base_url('crud/' . strtolower($modelName) . '/edit/' . $item['id']) ?>">Edit</a>
            <a href="<?= base_url('crud/' . strtolower($modelName) . '/delete/' . $item['id']) ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
