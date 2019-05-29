<div class="card text-center" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Weekly Sales</h5>
    <p class="card-text">
    <?php
        $sales_query = "SELECT sum(price) as total_price FROM order_detail";
        $sales_result = mysqli_query($link,$sales_query);
        $sales_target = mysqli_fetch_array($sales_result,MYSQLI_ASSOC);
        echo"";
    ?>
    </p>
  </div>
</div>