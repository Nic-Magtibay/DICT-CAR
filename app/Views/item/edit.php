<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('item/layout/main')?>
<?= $this->section('content')?>
<div class="container">


    <h1>Edit Item</h1>
    <a class="btn btn-primary" href="<?= base_url()?>item/index" role="button">Back</a>
    <div class="row">

<form action ="<?= base_url()?>item/edit/<?=$item->id?>" method="POST">

    <?php if(isset($validation)):?>
        <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors()?>
        </div>
        <?php endif;?>

    <div class="form-group row">
    <label for="name" class="col-4 col-form-label">ID</label> 
    <div class="col-8">
      <input id="name" name="id" readonly value="<?= set_value('name',$item->id)?>" type="text" class="form-control" >
    </div>
  </div>

  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Item Name</label> 
    <div class="col-8">
      <input id="name" name="name"  value="<?= set_value('name',$item->name)?>" type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-4 col-form-label">Item Price</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">PHP</div>
        </div> 
        <input id="price" name="price"  value="<?= set_value('price',$item->price)?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-4 col-form-label">Description</label> 
    <div class="col-8">
      <textarea id="description" name="description" cols="40" rows="5" class="form-control" value="<?= set_value('description',$item->description)?>" ></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
    </div>
   
</div>

<?= $this->endSection('content')?>