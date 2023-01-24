<?php include(VIEWS . 'inc/header.php'); ?>

<div class="container">

  <h1 class="text-center p-4">Edit Product</h1>

  <div class="card w-75">
    <div class="card-body">
      <form action="<?php url('product/update') ?>" method="POST">

        <?php while ($row = mysqli_fetch_assoc($product)) : ?>

          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="inputEmail3">
              <?php
              if (isset($_SESSION['errors']['name'])) :
                echo '<div class="text-danger">' . $_SESSION['errors']['name'] . '</div>';
                unset($_SESSION['errors']['name']);
              endif;
              ?>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input type="text" name="price" value="<?php echo $row['price'] ?>" class="form-control" id="inputPassword3">
              <?php
              if (isset($_SESSION['errors']['price'])) :
                echo '<div class="text-danger">' . $_SESSION['errors']['price'] . '</div>';
                unset($_SESSION['errors']['price']);
              endif;
              ?>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="text" name="description" value="<?php echo $row['description'] ?>" class="form-control" id="inputEmail3">
              <?php
              if (isset($_SESSION['errors']['description'])) :
                echo '<div class="text-danger">' . $_SESSION['errors']['description'] . '</div>';
                unset($_SESSION['errors']['description']);
              endif;
              ?>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
              <input type="text" name="qty" value="<?php echo $row['qty'] ?>" class="form-control" id="inputPassword3">
              <?php
              if (isset($_SESSION['errors']['qty'])) :
                echo '<div class="text-danger">' . $_SESSION['errors']['qty'] . '</div>';
                unset($_SESSION['errors']['qty']);
              endif;
              ?>
            </div>
          </div>

        <?php endwhile; ?>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>

<?php
include(VIEWS . 'inc/footer.php');
