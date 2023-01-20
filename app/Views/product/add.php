<?php include(VIEWS . 'inc/header.php'); ?>

<div class="container">

  <h1 class="text-center p-4">Add New Product</h1>

  <div class="card w-75">
    <div class="card-body">
      <form action="<?php url('product/store') ?>" method="POST">

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputEmail3" autofocus>
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
          <div class="col-sm-10">
            <input type="text" name="price" class="form-control" id="inputPassword3">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="text" name="desc" class="form-control" id="inputEmail3">
          </div>
        </div>

        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
          <div class="col-sm-10">
            <input type="text" name="qty" class="form-control" id="inputPassword3">
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>

<?php
include(VIEWS . 'inc/footer.php');
