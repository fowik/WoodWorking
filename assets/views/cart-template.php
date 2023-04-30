<div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Produkts</td>
                    <td>Daudzums</td>
                    <td>Cena</td>
                    <td>Kopēja cena</td>
                    <td></td>
                </tr>
            </thead>

            
                <tbody>
                <?php foreach ($cart as $c) { ?>
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5><?= $c['Title'] ?></h5>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5><input type="number" min="1" class="product-quantity" value="<?= $c['Quantity'] ?>" data-product-id="<?= $c['prodID'] ?>"></h5>
                        </td>

                        <td class="activee">
                            <h5><?= $c['Price'] ?></h5>
                        </td>
                        
                        <td class="activee activee-total">
                            <h5 data-product-id="<?= $c['prodID'];?>" class="product-total" data-price="<?= $c['Price'] ?>" data-quantity="<?= $c['Quantity'] ?>"> <?= $c['Total'] ?></h5>
                        </td>

                        <td class="edit">
                            <form action="/cart/delete" method="POST">
                                <input type="hidden" name="prodID" value="<?= $c['prodID'] ?>"></input>
                                <input type="submit" value="Delete"></input>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            
            <form action="cart/confirm" method="POST">
                <tfoot>
                    <td>Kopēja cena</td>
                    <td>
                        <?php $cartTotal = 0; ?>
                        <?php foreach ($cart as $c) {
                            $cartTotal += $c['Total'];
                        }?>
                        <h5 id="cart-total"><?= $cartTotal ?></h5>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        
                            <input class="submit-cart" type="submit" value="Nopirkt">
                        
                    </td>
                </tfoot>
            </form>
        </table>
    </form>        
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).on('change', '.product-quantity', function() {
    var quantity = $(this).val();
    var productId = $(this).data('product-id');

    $.ajax({
        url: '/cart/update',
        method: 'POST',
        data: {productId: productId, quantity: quantity},
        success: function(response) {                
            console.log(response);

            const prodID = response.prodID;
            const cartID = response.orderID;
            let CartTotal = 0;
                
            $('td.activee-total > h5').each(function() {
                CartTotal += parseFloat($(this).text());
                    
                if ($(this).data('product-id') === prodID) {
                    $(this).text(response.ProductTotal);
                    $('#cart-total').text(CartTotal);
                }
            });
            updateCartTotal();
        }
    });

    // Call the same function to update the cart total immediately after the user changes the quantity input
    updateCartTotal();
});

function updateCartTotal() {
    let CartTotal = 0;

    $('td.activee-total > h5').each(function() {
        CartTotal += parseFloat($(this).text());
    });

    $('#cart-total').text(CartTotal.toFixed(2));
}
</script>
