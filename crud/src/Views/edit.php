<h2>Edit Item</h2>
<form action="<?= base_url('crud/' . strtolower($modelName) . '/edit/' . $item['id']) ?>" method="post">
    <?= csrf_field() ?>
    <label>Name</label>
    <input type="text" name="name" value="<?= $item['name'] ?>">
    <label>Description</label>
    <textarea name="description"><?= $item['description'] ?></textarea>
    <label>Price</label>
    <input type="text" name="price" value="<?= $item['price'] ?>">
    <button type="submit">Update</button>
</form>
