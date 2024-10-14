<h2>Create New Item</h2>
<form action="<?= base_url('crud/' . strtolower($modelName) . '/create') ?>" method="post">
    <?= csrf_field() ?>
    <label>Name</label>
    <input type="text" name="name">
    <label>Description</label>
    <textarea name="description"></textarea>
    <label>Price</label>
    <input type="text" name="price">
    <button type="submit">Create</button>
</form>
