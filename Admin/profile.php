<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include("topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <!-- Content Row -->
					<br>
					<div class="page-wrapper">
						<div class="content container-fluid">
							<div class="container-fluid p-0">
								<div class="row">
									<div class="col-md-3 col-xl-2">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title mb-0">Profile Settings</h5>
											</div>

											<div class="list-group list-group-flush" role="tablist">
												<a class="list-group-item list-group-item-action active" href="profile.php">
													Account
												</a>
												<a class="list-group-item list-group-item-action" href="change-password.php">
													Password
												</a>
											</div>
										</div>
									</div>

									<div class="col-sm-7">
										<div class="tab-content">
											<div class="tab-pane fade show active">
												<div class="card">
													<div class="card-header">
														<h5 class="card-title mb-0">Personal Details</h5>
													</div>
													<div class="card-body">
														<h5 class="card-title d-flex justify-content-between">
															<div class="col-auto profile-btn"></div>
															<button class="btn btn-success" data-toggle="modal" data-target="#editProfile"><i class="fa fa-edit mr-1"></i>Edit</button>
                                                            <?php include("edit-profile.php"); ?>
														</h5>
														<div>
                                                            <?php
                                                                $adm_id = $_SESSION["admin_id"];
                                                                $result = mysqli_query($connect, "SELECT * FROM admin WHERE adm_id = '$adm_id'");
                                                                $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <style>
                                                                .circle {
                                                                    position: relative;
                                                                    width: 150px;
                                                                    height: 150px;
                                                                    border-radius: 50%;
                                                                    overflow: hidden;
                                                                    margin: auto;
                                                                }
                                                                .image {
                                                                    position: absolute;
                                                                    top: 0;
                                                                    left: 0;
                                                                    width: 100%;
                                                                    height: 100%;
                                                                    background: rgb(0, 0, 0, 0.3);
                                                                    color: #ffffff;
                                                                    font-family: 'Quicksand';
                                                                    font-size: 10px;
                                                                    display: flex;
                                                                    flex-direction: column;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    opacity: 0;
                                                                    transition: opacity 0.25s;
                                                                    cursor: pointer;
                                                                }
                                                                .image > * {
                                                                    transform: translateY(20px);
                                                                    transition: transform 0.25s;
                                                                }
                                                                .image:hover {
                                                                    opacity: 1;
                                                                }
                                                                .image:hover > * {
                                                                    transform: translateY(0);
                                                                }
                                                                .image-title {
                                                                    font-size: 2em;
                                                                    font-weight: bold;
                                                                }
                                                            </style>
                                                            <a href="#" data-toggle="modal" data-target="#changeProfilePic">
																<div class ="circle">
																	<?php
																	if(empty($row['adm_profile_pic'])){
                                                                        echo '<img class="rounded-circle img-responsive" src="img/undraw_profile.svg" alt="Admin Image"  width="150px" height="150px">';
                                                                    } else {
																		echo '<img class="rounded-circle img-responsive" src="Profile Pic/'.$row['adm_profile_pic'].'" alt="Admin Image" width="150px" height="150px">';
                                                                    }
																	?>
																	<div class="image">
																		<div class="image-title"><i class="fa">&#xf03e;</i> Select</div>
																	</div>
																</div>
															</a>
                                                            <?php include('change-profile-pic.php'); ?>
															
															<table class="mt-3 text-left">
																<tr>
																	<td class="w-25 px-3 font-weight-bold">Admin ID</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo $row["adm_id"]; ?></td>
																</tr>
																	
																<tr>
																	<td class="w-25 px-3 font-weight-bold">Name</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo $row["adm_name"]; ?></td>
																</tr>
																
																
																<tr>
																	<td class="w-25 px-3 font-weight-bold">Role</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo $row["adm_role"]; ?></td>
																</tr>
																
																<tr>
																	<td class="w-25 px-3 font-weight-bold">Email</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo $row["adm_email"]; ?></td>
																</tr>
	
																<tr>
																	<td class="w-25 px-3 font-weight-bold">Phone Number</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo $row["adm_phone"]; ?></td>
																</tr>


																<tr>
																	<td class="w-25 px-3 font-weight-bold">Joined Date</td>
																	<td><span class="font-weight-bold pr-2">:</span> <?php echo date('d M Y', strtotime($row['adm_signup_date'])); ?></td>
																</tr>
															</table>
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
				</div>
			</div>
			<br><br><br>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->

		</div>
        <!-- End of Content Wrapper -->

	</div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("logout-modal.php"); ?>

    <!-- Plugins-->
    <?php include("plugins.php"); ?>

</body>

</html>