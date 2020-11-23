<php
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);


?>
<div class="modal fade details-5" id="details-5" tableindex="-5" role="dialog" aria-labelledby="details-5" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> &times; </span>
        </button>
        <?php endwhile; ?>
        <h4 class='col-12 modal-title text-center'> <?= $products['title']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="conatainer-fluid">
          <div class="row">
            
            <div class="center-block">
              <img src="<?= $products['image']; ?>" alt="<?= $products['title']; ?>" id="images" />
            </div>
          </div>
          <div class="col-sm-6">
            <h4>Details</h4>
            <P> <br /> <?=$products['description']; ?></p>
            <?php endwhile; ?>
            </hr>
            <p> Price: $33.99 </p>
            <p> Brand: Levis </p>

            <form action="add_cart.php" method="post">
              <div class="form-group">
                <div class="col-xs-3">
                  <label for="quantity" id="quantity-label">Qunatity: </label>
                  <input type="text" class="form-control" id="quantity" name="quantity" />
                </div> <br /> <br />
                <div class="form-group">
                  <label for="size">Size: </label>
                  <select name="size" id="size" class"form-control">
                    <option value=""></option>
                    <option value="28">28</option>
                    <option value="32">32</option>
                    <option value="36">36</option>
                    <option value="42">42</option>
                  </select>
                </div>
              </div>

            </form>

        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-default" data-dismiss="modal"> Close </button>
      <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart </button>
     
    </div>

    </div>
  </div>
</div>
