<!-- <?php
// Assuming you have CodeIgniter's database functionality loaded
// Adjust the database connection and query according to your actual setup

// Load the database library (this might be autoloaded in your setup)
$builder = \Config\Database::connect()->table('tblitem');
$query = $builder->get();

// Fetch the results as an array of objects
$items = $query->getResult();
?> -->

<?= $this->extend('item/layout/main')?>
<?= $this->section('content')?>
<div class="container">

    <div class="row">
    <h1>List of Items</h1>
    <div>
    <a class="btn btn-primary" href="<?= base_url()?>item/add" role="button">Add</a></div>
    <br><br>
    <table class="table table-striped">
        <thead>
          
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>

        </tr>
        </thead>
    <?php foreach($items as $item):?>
        <tr>
        <td><?= $item->id ?></td>
        <td><?= $item->name ?></td>
        <td><?= $item->price ?></td>

        <td>
            <a class="btn btn-primary" href="<?= base_url()?>item/view/<?= $item->id ?>" role="button">View</a>
            <a class="btn btn-warning" href="<?= base_url()?>item/edit/<?= $item->id ?>" role="button">Edit</a>
            <a class="btn btn-danger" href="<?= base_url()?>item/delete/<?= $item->id ?>" role="button">Delete</a>
        </td>

        </tr>
        <?php endforeach;?>
    </table>
    </div>
</div>
<?= $this->endSection('content')?>