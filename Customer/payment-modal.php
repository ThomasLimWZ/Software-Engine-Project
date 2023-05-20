<div class="modal fade" id="staticBackdrop" aria-labelledby="staticBackdropLabel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="tabs mt-5">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill nav-border-anim" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                                    <img class="mx-auto" src="assets/images/visa-modal.png" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="master-tab" data-toggle="tab" href="#master" role="tab" aria-controls="master" aria-selected="false">
                                    <img class="mx-auto" src="assets/images/master-modal.png" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">
                                    <img class="mx-auto" src="assets/images/payment-fpx.jpg" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="mt-3 mx-5">
                                <form action="#">
                                    <div class="text-center"> 
                                        <h5>Credit card</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Cardholder Name</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Card Number</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" class="form-control" required> 
                                                <span>Expiration Date</span> 
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                            <input type="number" min="3" max="3" class="form-control" required> 
                                            <span>CVV</span>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" class="btn btn-outline-primary-2 btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </form></div>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="master" role="tabpanel" aria-labelledby="master-tab">
                                <div class="mt-3 mx-5">
                                <form action="#">
                                    <div class="text-center"> 
                                        <h5>Master card</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Cardholder Name</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Card Number</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" class="form-control" required> 
                                                <span>Expiration Date</span> 
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                            <input type="number" min="3" max="3" class="form-control" required> 
                                            <span>CVV</span>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" class="btn btn-outline-primary-2 btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </form></div>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                <div class="mt-3 mx-5">
                                <form action="#">
                                    <div class="text-center"> 
                                        <h5>Online Banking</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Username</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" value="Hint Here..." disabled>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" required> 
                                            <span>Password</span>
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" class="btn btn-primary btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </form></div>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->