<main class="container">
 
  <!-- Left Column / Image -->
    <?php $show_img = base64_encode($product['Image']) ?>
    <img src="data:image/png;base64, <?= $show_img ?>" alt="">
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span><?= $product['type'] ?></span>
      <h1><?= $product['Title'] ?></h1>
      <p><?= $product['Description'] ?></p>
    </div>
 
    <!-- Product Configuration -->
    <form action="/catalog/product/add-to-cart" method="POST">
      <div class="product-configuration">
  
        <!-- Cable Configuration -->
        <div class="cable-config">
          <span>Cable configuration</span>
          <div class="cable-choose">
            <input id="quantity-input" name="quantity" type="number" min="1" placeholder="1" value="1">
          </div>
        </div>
      </div>
  
      <!-- Product Pricing -->
      <div class="product-price">
      <div class="message">
        <div class="mesg">
            <?php
                if (isset($_SESSION['message'])) {
                echo '
                    <div class = msg-cover>
                    <p class="msg"> ' . $_SESSION['message'] .'</p>
                    </div>';
                }
                unset($_SESSION['message']);
            ?>
        </div>
      </div>
        <input type="hidden" name="prodID" value="<?= $product['prodID'] ?>">
        <span><?= $product['Price'] ?></span>
        <input id="add-to-cart-link" type="submit" class="cart-btn" value="Add to cart">
      </div>
    </form>
  </div>
</main>

<script>
  const quantityInput = document.getElementById("quantity-input");
  const addToCartLink = document.getElementById("add-to-cart-link");

  quantityInput.addEventListener("input", () => {
    const quantity = quantityInput.value;
    const href = `/catalog/product/add-to-cart?prodID=<?= $product['prodID'] ?>&quantity=${quantity}`;
    addToCartLink.href = href;
  });
</script>