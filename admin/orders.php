
    <?php
session_start();
include("../db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders_info where order_id='$order_id'")or die("Warning! Delete query can not be processed this time, delete the products from order detail page first!!");
echo '<script type="text/javascript">';
echo ' alert("Deleted successfully")';  //not showing an alert box.
echo '</script>';
echo "<script>history.back();
</script>";
} 

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
                <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>ID</th><th>Customer ID</th><th>Customer Name</th><th>Address | Email</th><th>Amount Paid </th><th></th><th>Time</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"Select * from orders_info")or die ("query 1 incorrect.....");

                        while(list($order_id,$c_id,$cus_name,$email,$address,$city,$state,$zip,$cardname,$cardnumber,$expdate,$prod_count,$total_amt,$cvv,$time )=mysqli_fetch_array($result))
                        {
								
                        echo "<tr><td>$order_id</td><td>$c_id</td><td>$cus_name</td><td>$address , $city</br>$email</td><td>$$total_amt</td><td>$quantity</td><td>$time</td>

                        <td>
                        
						<a class='btn btn-success' href='order.php?order_id=$order_id&action=view'>View</a>
						<a class=' btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                        </td></tr>";
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
?>