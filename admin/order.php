
    <?php
session_start();
include("../db.php");

error_reporting(0);
if($_GET['action']=='view')
{
$order_id=$_GET['order_id'];




///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders  / Detail of Order no:<?php echo $order_id;?> <?php echo $order;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Oder ID</th><th>Product ID</th><th>Product Name</th><th>Image</th><th>Quantity</th><th>Price</th><th>Discount</th><th>BUY x GET y</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select order_id, product_id, qty, amt from order_products where order_id=".$order_id." ")or die ("query 1 incorrect.....");

                        while(list($order_id,$p_id,$qty,$amt)=mysqli_fetch_array($result))
                        {
							$result2=mysqli_query($con,"select product_title, discount, product_image, buy_one_get_one, product_id from products where product_id=".$p_id." ")or die ("query 1 incorrect.....");	
							 while(list($product_title,$discount,$image,$buy_one_get_one,$product_id)=mysqli_fetch_array($result2))
                        {
						if($buy_one_get_one=='0'){$msg="No";}
						else {$msg="Yes";}	
                        echo "<tr><td>$order_id</td><td>$p_id</td><td>$product_title</td><td><img src='../product_images/$image' style='width:50px; height:50px; border:groove #000'></td><td>$qty</td><td>$$amt</td>
<td>$discount%</td><td>$msg</td>
                        <td>
                        <a class=' btn btn-danger' href='order.php?order_id=$order_id&p_id=$p_id&action=delete'>Delete</a>
                        </td></tr>";
                        }
						}
                        ?>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
}
else if($_GET['action']=='delete'){
$order_id=$_GET['order_id'];
$p_id=$_GET['p_id'];
/*this is delet query*/
mysqli_query($con,"delete from order_products where order_id=".$order_id." and product_id=".$p_id." ")or die("delete query is incorrect...");	
echo '<script type="text/javascript">';
echo ' alert("Deleted successfully")';  //not showing an alert box.
echo '</script>';
echo "<script>history.back();
</script>";
	}
?>