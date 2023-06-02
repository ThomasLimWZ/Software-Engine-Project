<!DOCTYPE html>
<html lang="en">

<?php include('head.php') ?>	

<head>
	<style>
		@media screen and (max-width: 430px){
			select.form-control{
				width: 80%!important;
			}
		}
		td:first-child { 
			border-right: double #fcb941; 
		}
	</style>
</head>
<?php
			if(isset($_GET["view"])){
				$prod1 = $_GET['code1'];
				$prod2 = $_GET['code2'];

				$result1 = mysqli_query($connect, "SELECT * FROM product JOIN product_specification ON product.prod_id=product_specification.prod_id
				JOIN product_detail ON product_specification.prod_id=product_detail.prod_id 
				JOIN product_color ON product_detail.prod_detail_id=product_color.prod_detail_id
				JOIN category ON product.cat_id=category.cat_id
				WHERE product.prod_id='$prod1'");
				$row1 = mysqli_fetch_assoc($result1);
				$cat1 = $row1['cat_name'];

				$result2 = mysqli_query($connect, "SELECT * FROM product JOIN product_specification ON product.prod_id=product_specification.prod_id
				JOIN product_detail ON product_specification.prod_id=product_detail.prod_id 
				JOIN product_color ON product_detail.prod_detail_id=product_color.prod_detail_id
				JOIN category ON product.cat_id=category.cat_id
				WHERE product.prod_id='$prod2'");
				$row2 = mysqli_fetch_assoc($result2);
				$cat2 = $row2['cat_name'];
			}
		?>
<body>
<div class="page-wrapper">
	<?php include('header.php') ?>

	<main class="main">
		<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
			<div class="container">
				<h1 class="page-title">Compare<span>Product</span></h1>
			</div><!-- End .container -->
		</div><!-- End .page-header -->
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Compare</li>
				</ol>
			</div><!-- End .container -->
		</nav><!-- End .breadcrumb-nav -->

		<div class="container">
				<div class="my-4 mx-auto">
					<h2 class="text-center">Choose Products to Compare</h2>
						<div class="col-lg-12 mt-5">
							<div class="table-responsve overflow-scroll">
							<form method="GET">
								<table class="table table-striped">
									<thead class="thead-inverse">
										<tr>
											<th class="w-25"></th>
											<th class="d-flex justify-content-xl-center">
												<select id="compare_prod1" name="compare_prod1" class="form-control w-50" onchange="changeProd()" reqiured>
													<option value="<?php echo $row1['prod_id'];?>"><?php echo $row1['prod_name'];?></option>
													<!--<option>-- Select Product --</option>-->
													<?php
													$prod_res1 = mysqli_query($connect,"SELECT * FROM product JOIN category ON product.cat_id=category.cat_id 
													JOIN brand ON product.brand_id=brand.brand_id
													WHERE category.cat_name='$cat1' ");

													#EXCEPT SELECT * FROM product WHERE prod_id='$prod1' OR prod_id='$prod2' ORDER BY brand_name ASC");

													while($prod_row1 = mysqli_fetch_assoc($prod_res1)){
													?>
														<option value="<?php echo $prod_row1['prod_id'];?>"><?php echo $prod_row1['prod_name'];?></option>
													<?php
													}
													?>
												</select>
											</th>
											<th class="justify-content-xl-center">
												<select id="compare_prod2" name="compare_prod2" class="form-control w-50" style="display: inherit" onchange="changeProd()"> 
												<option value="<?php echo $row2['prod_id'];?>"><?php echo $row2['prod_name'];?></option>
													<!--<option>-- Select Product --</option>-->
													<?php
													$prod_res2 = mysqli_query($connect,"SELECT * FROM product JOIN category ON product.cat_id=category.cat_id 
													JOIN brand ON product.brand_id=brand.brand_id
													WHERE category.cat_name='$cat2' ");

													#EXCEPT SELECT * FROM product WHERE prod_id='$prod1' OR prod_id='$prod2' ORDER BY brand_name ASC");

													while($prod_row2 = mysqli_fetch_assoc($prod_res2)){
													?>
														<option value="<?php echo $prod_row2['prod_id'];?>"><?php echo $prod_row2['prod_name'];?></option>
													<?php
													}
													?>
												</select>
												<script>
										function changeProd(){
											var prod1 = document.getElementById("compare_prod1");
											var prod1_selected = prod1.options[prod1.selectedIndex].value;
											
											var prod2 = document.getElementById("compare_prod2");
											var prod2_selected = prod2.options[prod2.selectedIndex].value;
											$.ajax({
												type:'post',
												url:'compare-prod-onchange.php',
												data: {
													prod1_selected,prod2_selected
												},
												success:function(data){
													window.location = data;
													console.log(data);
												}
											})
										}
									</script>
											</th>
										</tr>
									</thead>
									
									<style>
									td, th{padding:2%;}
									</style>
									<tbody>
										<tr>
											<td class="w-25 font-weight-bold">Product Name</td>
											<td class=""><?php echo $row1['prod_name'];?></td>
											<td class=""><?php echo $row2['prod_name'];?></td>
										</tr>
										<?php
										if($row1['cat_name'] == 'Phone' || $row1['cat_name'] == 'Tablet' || $row1['cat_name'] == 'Watch'){
										?>
										<tr style="text-align:center;">
											<td class="w-25 font-weight-bold">Capacity & Price</td>
											<td>
												<div style="display: inline-block; text-align: left;">
												<?php
													$prod1_cap = mysqli_query($connect,"SELECT * FROM product_detail WHERE prod_id='$prod1'");
													while($cap1_row = mysqli_fetch_assoc($prod1_cap)){
														echo $cap1_row['prod_detail_name']." (RM ".$cap1_row['prod_detail_price'].")<br>";
													}
												?>
												</div>
											</td>
											<td>
												<div style="display: inline-block; text-align: left;">
												<?php
													$prod2_cap = mysqli_query($connect,"SELECT * FROM product_detail WHERE prod_id='$prod2'");
													while($cap2_row = mysqli_fetch_assoc($prod2_cap)){
														echo $cap2_row['prod_detail_name']." (RM ".$cap2_row['prod_detail_price'].")<br>";
													}
												?>
												</div>
											</td>
										</tr>
										<?php
										}
										else{
										?>
										<tr>
											<td class="font-weight-bold">Price</td>
											<td>RM <?php echo $row1['prod_detail_price'];?></td>
											<td>RM <?php echo $row2['prod_detail_price'];?></td>
										</tr>
										<?php
										}
										?>
										<tr>
											<td class="font-weight-bold">Product Image</td>
											<td>
												<img alt="<?php echo $row1['prod_name'];?>" src="../Product/<?=$row1['prod_color_img']?>" style="height:400px; margin:auto; object-fit:contain"> 
												
											</td>
											<td>
												<img alt="<?php echo $row2['prod_name'];?>" src="../Product/<?=$row2['prod_color_img']?>" style="height:400px; margin:auto; object-fit:contain"> </td>
										</tr>
										<?php
											if(!empty($row1['prod_spec_display']) && !empty($row2['prod_spec_display'])){
											?>
											<tr style="text-align:center;">
												<td class="font-weight-bold">Display</td>
												<td>
													<div style="display: inline-block; text-align: left; margin-left: 5%; margin-right: 5%;"><?php echo $row1['prod_spec_display'];?></div>
												</td>
												<td>
													<div style="display: inline-block; text-align: left; margin-left: 5%; margin-right: 5%;"><?php echo $row2['prod_spec_display'];?></div>
												</td>
											</tr>
											<?php
											}

											if(!empty($row1['prod_spec_chipset']) && !empty($row2['prod_spec_chipset'])){
											?>
											<tr style="text-align:center;">
												<td class="font-weight-bold">Chip</td>
												<td><div style="display: inline-block; text-align: left;"><?php echo $row1['prod_spec_chipset'];?></td></div>
												<td><div style="display: inline-block; text-align: left;"><?php echo $row2['prod_spec_chipset'];?></td></div>
											</tr>
											<?php
											}

											if(!empty($row1['prod_spec_back_cam']) && !empty($row2['prod_spec_back_cam'])){
											?>
											<tr style="text-align:center;">
												<td class="font-weight-bold">Back Camera</td>
												<td><div style="display: inline-block; text-align: left;"><?php echo $row1['prod_spec_back_cam'];?></td></div>
												<td><div style="display: inline-block; text-align: left;"><?php echo $row2['prod_spec_back_cam'];?></td></div>
											</tr>
											<?php
											}

											if(!empty($row1['prod_spec_front_cam']) && !empty($row2['prod_spec_front_cam'])){
											?>
												<tr style="text-align:center;">
													<td class="font-weight-bold">Front Camera</td>
													<td><div style="display: inline-block; text-align: left;"><?php echo $row1['prod_spec_front_cam'];?></td></div>
													<td><div style="display: inline-block; text-align: left;"><?php echo $row2['prod_spec_front_cam'];?></td></div>
												</tr>
											<?php
											}
											
											if(!empty($row1['prod_spec_battery']) && !empty($row2['prod_spec_battery'])){
												?>
												<tr style="text-align:center;">
													<td class="font-weight-bold">Battery</td>
													<td><div style="display: inline-block; text-align: left;"><?php echo $row1['prod_spec_battery'];?></td></div>
													<td><div style="display: inline-block; text-align: left;"><?php echo $row2['prod_spec_battery'];?></td></div>
												</tr>
											<?php
											}

											if(!empty($row1['prod_spec_others']) && !empty($row2['prod_spec_others'])){
											?>
											<tr>
												<td class="font-weight-bold">Others</td>
												<td><?php echo $row1['prod_spec_others'];?></td>
												<td><?php echo $row2['prod_spec_others'];?></td>
											</tr>
											<?php
											}
											?>
									</tbody>
									<tfoot class="thead-inverse">
										<tr>
											<th class="w-25"></th>
											<th class=""><span class="btn btn-primary"><a href="../Customer/product.php?view&code=<?php echo $row1['prod_id'];?>" style="color:white;">View Details</span></th>
											<th class=""><span class="btn btn-primary"><a href="../Customer/product.php?view&code=<?php echo $row2['prod_id'];?>" style="color:white;">View Details</span></th>
										</tr>
									</tfoot>
								</table>
								</form>
							</div>
						</div>
				</div>
		</div>
		<hr>
	</main>
</div>
<?php include('footer.php') ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
    <?php include('mobile-menu-container.php') ?>

    <!-- Sign in / Register Modal -->
    <?php include('signin-register-modal.php') ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
	<!-- fa fa icon link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>