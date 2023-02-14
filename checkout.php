<?php
include "db.php";

include "header.php";


                         
?>
<!-- Sweetalert 2 CSS -->
	<link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
<style>

.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

					
<section class="section">       
	<div class="container-fluid">
    <div class="container">
    <div class="container-checkout">
				<h3>Apply Coupon Code</h3>
	    		<form action="copun/use-coupon.php" id="useCouponCodeForm">
			    	<div class="form-group">
					    <label for="email">Coupon Code</label>
					    <input class="form-control" type="text" name="coupon-code">
				  	</div>
				  	<button type="button" class="btn btn-primary"  id="btnUseCouponCode">Varify Coupon</button>
                    <button type="button" class="btn btn-primary" onClick="window.location.reload();">Apply Coupon</button>
                    
				</form>	
					</div>
    </div>
    </br>
		<div class="container">
		<?php
		if(isset($_SESSION["uid"])){
			
			$sql = "SELECT * FROM user_info WHERE user_id='$_SESSION[uid]'";
			$query = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($query);
		
		echo'
			<div class="col-75">
				<div class="container-checkout">
				<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

					<div class="row-checkout">
					
					<div class="col-50">
						<h3>Billing Address</h3>
						<label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="'.$row["first_name"].' '.$row["last_name"].'">
						<label for="email"><i class="fa fa-envelope"></i> Email</label>
						<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="'.$row["email"].'" required>
						<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="adr" name="address" class="form-control" value="'.$row["address1"].'" required>
						<label for="city"><i class="fa fa-institution"></i> City</label>
						<input type="text" id="city" name="city" class="form-control" value="'.$row["address2"].'" pattern="^[a-zA-Z ]+$" required>

						<div class="row">
						<div class="col-50">
							<label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
						</div>
						<div class="col-50">
							<label for="zip">Zip</label>
							<input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{6}(?:-[0-9]{4})?$" required>
						</div>
						</div>
					</div>
					
					
					<div class="col-50">
						<h3>Payment</h3>
						<label for="fname">Accepted Cards</label>
						<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
						
						
						<label for="cname">Name on Card</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
						
						<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                    </div>
						<label for="expdate">Exp Date</label>
						<input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22"required>
						

						<div class="row">
						
						<div class="col-50">
							<div class="form-group CVV">
								<label for="cvv">CVV</label>
								<input type="text" class="form-control" name="cvv" id="cvv" required>
						</div>
						</div>
						
					</div>
					</div>
					</div>
					<label><input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Shipping address same as billing
					</label>';
					
					
					$i=1;
					$total=0;
					
					$total_count=$_POST['total_count'];
					
					while($i<=$total_count){
						$item_name_ = $_POST['item_name_'.$i];
						$amount_ = $_POST['amount_'.$i];
						$quantity_ = $_POST['quantity_'.$i];
						$sql = "SELECT product_id, discount,buy_one_get_one FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
						$product_discount=$row["discount"];
						$buy_one_get_one=$row["buy_one_get_one"];
						 $p_dist=$product_discount/100;
						 $pdis=$p_dist*$amount_;
						 $amount_=$amount_-$pdis;
						
						$sql2 = "SELECT * FROM coupons WHERE userid='$_SESSION[uid]'";
			$query2 = mysqli_query($con,$sql2);
			$row2=mysqli_fetch_array($query2);
			$copun_status=$row2["status"];
			$avail=$row2["avail"];
			$userid=$row2["userid"];
			if($copun_status==1&&$avail=="no"){
			 $discount=$row2["discount"];
			}
			else if($copun_status==0){
				$discount=0;
				}
			else
			{ $discount=0;}
			
			  $total=$total+$amount_ ;	
			 $discount=	$total*$discount;
			
			 
						$sql = "SELECT product_id, discount, buy_one_get_one FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
						$product_discount=$row["discount"];
						$buy_one_get_one=$row["buy_one_get_one"];
						if($buy_one_get_one==1){
						$quantity_=$quantity_*2;}
					else
					$quantity_==$quantity_;
						echo "	
						<input type='hidden' name='prod_id_$i' value='$product_id'>
						<input type='hidden' name='prod_discount_$i' value='$product_discount'>
						
						<input type='hidden' name='prod_price_$i' value='$amount_'>
						<input type='hidden' name='prod_qty_$i' value='$quantity_'>
						";
						$i++;
					}
					
					 $total;
				
						
			}
						
		
		else{
			echo"<script>window.location.href = 'cart.php'</script>";
		}
		?>
			

			<div class="col-35">
				
				<div class="container-checkout">
				
				<?php
				if (isset($_POST["cmd"])) {
				
					$user_id = $_POST['custom'];
					
					
					$i=1;
					echo
					"
					<h3>Cart 
					<span class='price' style='color:black'>
					<i class='fa fa-shopping-cart'></i> 
					<b>$total_count</b>
					</span>
				</h3>

					<table class='table table-condensed'>
					<thead><tr>
					<th >no</th>
					<th >product title</th>
					<th >	qty	</th>
					<th >	dist	</th>
					<th >	discount	</th>
					<th >	amount</th></tr>
					</thead>
					<tbody>
					";
					$total=0;
					while($i<=$total_count){
						 $item_name_ = $_POST['item_name_'.$i];
						
						 $item_number_ = $_POST['item_number_'.$i];
						
						 $amount_ = $_POST['amount_'.$i];
						
						 $quantity_ = $_POST['quantity_'.$i];
						
						$sql = "SELECT product_id, discount,buy_one_get_one FROM products WHERE product_title='$item_name_'";
						$query = mysqli_query($con,$sql);
						$row=mysqli_fetch_array($query);
						$product_id=$row["product_id"];
						$buy_one_get_one=$row["buy_one_get_one"];
						
					if($buy_one_get_one==1){
						$quantity_=$quantity_*2;
						$amount_=$amount_/2;}
					else
					{$quantity_==$quantity_;}
					$product_discount=$row["discount"];
						 $p_dist=$product_discount/100;
						$pdis=$p_dist*$amount_;
						//calculate total discount * quantity (value calculate in dollars)
						$tpdiscount=$pdis*$quantity_;
						 $amount_=$amount_-$pdis;
						$amount_ =$quantity_*$amount_;
					$total=$total+$amount_ ;
						echo "	

						<tr><td><p>$item_number_</p></td><td><p>$item_name_</p></td><td ><p>$quantity_
						
						
						</p></td><td ><p>$product_discount%</p></td><td ><p>$$tpdiscount</p></td><td ><p>$$amount_</p></td></tr>";
						
						$i++;
					};
					 $ftotal=$total-$discount;
					 if($ftotal>100){
						echo"<h4 style='color:red'>*Shipping will be free</h4>";
						if($ftotal>500){
							
							$amt_dist= $ftotal*0.15;
							$ftotal=$ftotal-$amt_dist;
							echo"<h5 style='color:red'>You got 15% discount on your total spend</h5>";}
							
					 }
					 
					 else{
						 $ftotal=$ftotal+50;
						 echo"<h4 style='color:red'>*$50 Shipping charges will be added</h4>";} 
					 
					

				echo"

				</tbody>
				</table>
				<hr>
				<h4>Sub-Total<span class='price' style='color:black'><b>$$total</b></span></h4>
				<h4>Coupon Discount<span class='price' style='color:black'><b>$$discount</b></span></h4>
				<h3>Total<span class='price' style='color:black'><b>$$ftotal</b></span></h3>";
					
				}
				echo'	
				<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$ftotal.'">
					
					
					<input type="submit" id="submit" value="Continue to checkout" class="checkout-btn">
				</form>
				</div>
			</div>
			';
				?>
				</div>
			</div>
		</div>
	</div>
</section>
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
					
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		
<?php

include "footer.php";
?>
<!-- Sweetalert2 JS -->
	<script src="copun/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Page Script -->
	<script src="copun/assets/js/scripts.js"></script>
<script>

   function selectTab(tabIndex) {
      // Declare all variables
      var i, tabcontent;
     
      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
      }
      //Show the Selected Tab
      document.getElementById(tabIndex).style.display = "block";
   }
</script>