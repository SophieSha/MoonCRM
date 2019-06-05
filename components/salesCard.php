<?php

if ($rslt = mysqli_query($link,"Select sum(total_price) FROM orders")) {
    while ($row = mysqli_fetch_assoc($rslt)) {
        echo "<div class=\"card bg-light mb-3 w-100 mx-2\" style=\"height:250px;\">
        <div class=\"card-body d-flex justify-content-center flex-column h-100 dash\">
        <h3 class=\"card-title text-center mb-4\">Weekly Sales</h3>
                    <p class=\" h5 card-text text-center\">$". $row['sum(total_price)']."</p>
                </div>
            </div>";
}}
?>



