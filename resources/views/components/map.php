<?php if (isset($_GET["gov"])) : ?>
    <?php if ($_GET["gov"] == "Amman") : ?>
        <iframe title="map" style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسيين+عمان&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
    <?php  elseif ($_GET["gov"] == "Zarqa") : ?>
        <iframe title="map" style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسيين+زرقاء&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
    <?php  else : ?>
        <iframe title="map" style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسيين+اربد&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
<?php endif; else : ?>
    <iframe title="map" style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/search?q=اطباء+نفسيين+عمان&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
<?php endif ?>