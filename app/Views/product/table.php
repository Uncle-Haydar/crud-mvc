<div class="container">

  <h1 class="text-center p-4">View All Products</h1>
  <table class="table text-center">
    <thead class="table-dark">
      <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($product = mysqli_fetch_assoc($products)): ?>
      <tr>
        <td><?php echo $product['id'] ?></td>
        <td><?php echo $product['name'] ?></td>
        <td>$<?php echo $product['price'] ?></td>
        <td><?php echo $product['description'] ?></td>
        <td><?php echo $product['qty'] ?></td>
        <td>
          <a class="btn btn-success btn-sm" href="product/edit/<?php echo $product['id'] ?>">Edit</a>
          <a class="btn btn-danger btn-sm" href="product/delete/<?php echo $product['id'] ?>">Delete</a>
        </td>
      </tr>
      <?php
        endwhile;
        mysqli_free_result($products);
      ?>
    </tbody>
  </table>
    <a class="btn btn-primary btn-sm" href="product/add">Add New Product</a>

</div>
