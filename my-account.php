<?php
include 'header.php';
if(isset($_SESSION["uid"])){
                                $sql = "SELECT * FROM user_info WHERE user_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
	$userid=$row["user_id"];
?>
<style>
   /*CSS*/
   * {
      box-sizing: border-box;
   }
   .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      
   }
   /* Style the buttons that are used to open the tab content */
   .tab button {
      display: block;
	   border-color: #211D1D;
      background-color: inherit;
      color: black;
      padding: 22px 16px;
      width: 100%;
      border: 1;
      
      cursor: pointer;
      transition: 0.3s;
   }
   .tab button:hover{
      background-color:#ffa62e;
   }
   .tabcontent {
      float: left;
      padding: 0px 12px;
      
      width: 80%;
	   height: auto;
      border-left: none;
      height: 180px;
      display: none;
      text-align: center;
      background-color: antiquewhite;
   }
	.button {
	border-color: #211D1D;	
	border-bottom-color: #211D1D;	
		
	}
</style>


<div class="my-account-area ptb-100">
<div style=" width: 50%; background-color:antiquewhite" class="container">
<div style=" width: 100%; background-color:antiquewhite" class="tab account-tab">
	
<div style=" width: 100%; background-color:antiquewhite" class="row align-items-center">
	
<div class="col-lg-4">
	<div style=" width: 100%; background-color:antiquewhite" class="tab">
   <button class="tablinks" onclick="JavaScript:selectTab('tab1');">
      Dashboard
   </button>
		 <button class="tablinks" onclick="JavaScript:selectTab('tab4');">
      Addresses
   </button>
   <button class="tablinks" onclick="JavaScript:selectTab('tab5');">
      Apply for Promotions Code
   </button>
   <button class="tablinks" onclick="JavaScript:selectTab('tab3');">
      Account Settings
   </button>
		<button class="tablinks">
      <a href="logout.php">Log Out</a>
   </button>
   </div>
</div>
<div class="col-lg-8">
	
<div  class="tab_content current active pl-20">
	<div class="account-details">
<h3>Hello! <?php echo $row["first_name"];   ?></h3>
<p></div>
<div  id="tab1" class="tabcontent">
<div class="account-details">
<h2>Hello <?php echo $row["first_name"];   ?></h2>
<p>
From your account dashboard. you can easily check & view your recent orders,
manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details</a>.
</p>
</div>
</div>
<div id="tab2" class="tabcontent">
<div class="invoice-area">
<div class="invoice-table table-responsive">
	
	
<table class="table table-bordered">
 <thead>
<tr>
<th>#</th>
<th>Description</th>
<th>Unit Price</th>
<th>Total</th>
</tr>
</thead>
<tbody>
<tr>
<td>01</td>
<td>Midnight Musk</td>
<td class="text-end">$100.00</td>
<td class="text-end">$100.00</td>
</tr>
<tr>
<td>02</td>
<td>Moisture Balm</td>
<td class="text-end">$25.00</td>
<td class="text-end">$50.00</td>
</tr>
<tr>
<td>03</td>
<td>Oil Foundation</td>
<td class="text-end">$15.00</td>
<td class="text-end">$45.00</td>
</tr>
<tr>
<td>04</td>
<td>Sensual Skin Trio</td>
<td class="text-end">$15.00</td>
<td class="text-end">$45.00</td>
</tr>
<tr>
<td class="text-end" colspan="3"><strong>Subtotal</strong></td>
<td class="text-end">$195.00</td>
</tr>
<tr>
<td class="text-end" colspan="3"><strong>Sales Tax 5.0%</strong></td>
<td class="text-end">$9.75</td>
</tr>
<tr>
<td class="text-end total" colspan="3"><strong>Total</strong></td>
<td class="text-end total-price"><strong>$204.75</strong></td>
</tr>
</tbody>
</table>
</div>

</div>
</div>
<div id="tab4" class="tabcontent">
<div class="invoice-area">
 <div class="invoice-middle">
<div class="row">
<div class="col-lg-6">
<div class="text mb-30">
<h4 class="mb-2">Billing Address</h4>
<span class="d-block mb-1"><?php echo $row["address2"];   ?></span>
<span class="d-block mb-1"><?php echo $row["address1"];   ?></span>

</div>
</div>
<div class="col-lg-6">
<div class="text">
<h4 class="mb-2">Shipping Address</h4>
<span class="d-block mb-1"><?php echo $row["address2"];   ?></span>
<span class="d-block mb-1"><?php echo $row["address1"];   ?></span>

</div>
</div>
</div>
</div>
</div>
</div>
 <div id="tab3" class="tabcontent">
<div class="contact-form">
<!--<h3>Change Password</h3>-->
<p>Here is you contact details! change your Settings</p>
<form id="contactForm">
<div class="row">

<div class="col-lg-12">
<div class="form-group">
<input type="email" name="email" id="email" value=" <?php echo $row["email"];?>" class="form-control"  placeholder="<?php echo $row["email"];?>" readonly>
</div>
</div>

<div class="col-lg-12">
<div class="form-group">
<input type="password" class="form-control" placeholder="Current Password">
</div>
</div>
 <div class="col-lg-12">
<div class="form-group">
<input type="password" class="form-control" placeholder="New Password">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="password" class="form-control" placeholder="Confirm Password">
</div>
</div>
<div class="col-lg-12 col-md-12">
<button type="submit" class="default-btn border-radius-5">
Save Change
</button>
</div>
</div>
</form>
</div>
</div>
 <div id="tab5" class="tabcontent">
<div class="user-all-form">
<div class="contact-form">
<div class="col-md-6">
	    		

			    <form action="generate-coupon.php" id="generateCouponCodeForm">
			    	<div class="form-group">
					    <label for="email">Coupon Code for new users</label>
					    <input class="form-control" type="text" name="coupon-code" readonly="readonly">
				  	</div>
				  	<button type="button" class="btn btn-primary" id="btnSubmit">Generate Coupon</button>
				</form>
	    	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php }else{ 
                                echo"User is not log In!";
} ?>
<?php
include 'footer.php';
?>
<!-- Java script -->
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