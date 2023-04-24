<main class="container">
 
  <!-- Left Column / Image -->
  <div class="left-column">
    <?php $show_img = base64_encode($product['Image']) ?>
    <img src="data:image/png;base64, <?= $show_img ?>" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span><?= $product['type'] ?></span>
      <h1><?= $product['Title'] ?></h1>
      <p><?= $product['Description'] ?></p>
    </div>
 
    <!-- Product Configuration -->
    <div class="product-configuration">
 
      <!-- Cable Configuration -->
      <div class="cable-config">
        <span>Cable configuration</span>
 
        <div class="cable-choose">
          <!-- <button>Straight</button>
          <button>Coiled</button>
          <button>Long-coiled</button> -->
        </div>
      </div>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span><?= $product['Price'] ?></span>
      <a href="#" class="cart-btn">Add to cart</a>
    </div>
  </div>
</main>