  <?php
session_start();
include("../db.php");
$p_id=$_REQUEST['p_id'];
$result=mysqli_query($con,"select product_id, product_image, product_title,product_price, discount, product_cat, buy_one_get_one, product_desc, product_keywords from products where product_id='$p_id'")or die ("query 1 incorrect.......");

list($p_id,$image,$product_name,$price,$discount,$product_cat,$buy_one_get_one,$product_desc,$product_keywords)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$product_id=$_POST['product_id'];	
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$b_x_g_y=$_POST['b_x_g_y'];
$product_type=$_POST['product_type'];
$discount=$_POST['discount'];
$tags=$_POST['tags'];




		
		
mysqli_query($con,"UPDATE `products` SET `product_id`='$product_id',`product_cat`='$product_type',`product_title`='$product_name',`product_price`='$price',`product_desc`='$details',`product_keywords`='$tags',`discount`='$discount',`buy_one_get_one`='$b_x_g_y' WHERE product_id='$product_id'") or die ("query incorrect");

 echo '<script type="text/javascript">';
echo ' alert("updated successfully")';  //not showing an alert box.
echo '</script>';
echo "<script>history.back(-2);
</script>";
}

mysqli_close($con);

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                         <input style="color:#FFF" type="hidden" name="product_id" id="Product_id" value="<?php echo $p_id;?>" />
                        <input type="text" id="product_name" value="<?php echo $product_name; ?>"  required name="product_name" class="form-control">
                      </div>
                    </div>
                    
                     <div class="col-md-12">
                      <div class="form-group">
                     
                        <label>Description</label>
                        <textarea style="color:#FFF" rows="4" cols="80"  id="details" value="<?php echo $product_desc; ?>" required name="details" class="form-control"> <?php echo $product_desc; ?></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input style="color:#FFF" type="text" id="price" name="price" value="<?php echo $price;"%" ?>" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category</label>
                        <input style="color:#FFF" type="number" id="product_type" name="product_type"  value="<?php echo $product_cat; ?>"  required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Discount</label>
                        <input style="color:#FFF" type="number"  name="discount" value="<?php echo $discount; ?>" required class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">BUY x GET y</label>
                        
                        <select style="color:#FFF" value"<?php echo $buy_one_get_one; ?>"  name="b_x_g_y" required class="form-control">
                        <option value="1" style="background-color:#333333">Yes</option>
                        <option value="0" style="background-color:#333333">No</option>
                        </select>
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Product Tags</label>
                         
                        <input type="text" id="tags" name="tags" value="<?php echo $product_keywords; ?>"   class="form-control">
                      
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>