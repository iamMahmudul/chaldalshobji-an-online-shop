<?php include ('files/header.php');?>
<!--Bannersection-->
<section class="categorialproducts">
  <div class="container">
    <div class="row">
      <?php include('filteringproducts.php') ?>
      <div class="col-md-10">
        <div class="productshead">
          <a href="index.php"><span style="font-size: 15px;border-radius: 50px;background:transparent;margin: 5px;padding: 10px;border: 2px solid #EABEBE;">CD</span>ChalDalShobji</a>
          <h1>Quality and Freshness Guaranteed!</h1>
        </div>
 

            <div class="row filter_data" style="margin-top: 0px;">

             
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="demoimg">
  <img src="images/demo.png">
  <hr>
</section>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var category = get_filter('category');
       // var storage = get_filter('storage');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, category:category},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>




<?php include ('contact.php');?>
<?php include ('files/footer.php');?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:24.07.2019;
Last Updated:15.08.2019;
-->

