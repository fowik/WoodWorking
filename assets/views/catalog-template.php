<?php

?>

<?php foreach ($types as $type) { ?>
    <div id="dropdown-1" class="dropdownn dropdown-processed">
    <a class="dropdown-link" href="#"><?= $type['type'] ?></a>
        <div class="dropdown-containerr" style="display: none;">
            <ul>
                <?php foreach ($products as $product) { ?>
                    <?php if ($product['catID'] == $type['catID']) { ?>
                        <li><a href="/catalog/product?prodID=<?= $product['prodID'] ?>"><?= $product['Title'] ?></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('div.dropdownn').each(function() {
            var $dropdown = $(this);

            $("a.dropdown-link", $dropdown).click(function(e) {
                e.preventDefault();
                $div = $("div.dropdown-containerr", $dropdown);
                $div.toggle();
                $("div.dropdown-containerr").not($div).hide();
                return false;
            });

        });

        $('html').click(function(){
            $("div.dropdown-containerr").hide();
        });

    });
</script>