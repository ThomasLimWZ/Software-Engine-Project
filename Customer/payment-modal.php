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
                            <li class="nav-item" role="presentation" onclick="useThisPayment('visa')">
                                <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                                    <img class="mx-auto" src="assets/images/visa-modal.png" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation" onclick="useThisPayment('master')">
                                <a class="nav-link" id="master-tab" data-toggle="tab" href="#master" role="tab" aria-controls="master" aria-selected="false">
                                    <img class="mx-auto" src="assets/images/master-modal.png" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                            <li class="nav-item" role="presentation" onclick="useThisPayment('fpx')">
                                <a class="nav-link" id="fpx-tab" data-toggle="tab" href="#fpx" role="tab" aria-controls="fpx" aria-selected="false">
                                    <img class="mx-auto" src="assets/images/payment-fpx.jpg" height="25px" style="object-fit:contain;">
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                                <div class="mt-3 mx-5">
                                    <div class="text-center"> 
                                        <h5>Credit card</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" name="cardHolder" id="visa-cardHolder"> 
                                            <span>Cardholder Name</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" name="cardNum" minlength="16" maxlength="16" id="visa-cardNum"> 
                                            <span>Card Number</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" class="form-control" pattern="^(0[1-9]|1[0-2])\/([2-9][0-9])$" name="expireDate" id="visa-expireDate"> 
                                                <span>Expiration Date</span> 
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" pattern="\d*" minlength="3" maxlength="3" class="form-control" name="cvv" id="visa-cvv"> 
                                                <span>CVV</span>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" name="visaPayBtn" class="btn btn-outline-primary-2 btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </div>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="master" role="tabpanel" aria-labelledby="master-tab">
                                <div class="mt-3 mx-5">
                                    <div class="text-center"> 
                                        <h5>Master card</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" name="cardHolder" id="master-cardHolder"> 
                                            <span>Cardholder Name</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" name="cardNum" minlength="16" maxlength="16" id="master-cardNum"> 
                                            <span>Card Number</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" class="form-control" minlength="5" maxlength="5" pattern="^(0[1-9]|1[0-2])\/([2-9][0-9])$" name="expireDate" id="master-expireDate"> 
                                                <span>Expiration Date</span> 
                                            </div> 
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="inputbox"> 
                                                <input type="text" pattern="\d*" minlength="3" maxlength="3" class="form-control" name="cvv" id="master-cvv"> 
                                                <span>CVV</span>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" name="masterPayBtn" class="btn btn-outline-primary-2 btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </div>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="fpx" role="tabpanel" aria-labelledby="fpx-tab">
                                <div class="mt-3 mx-5">
                                    <div class="text-center"> 
                                        <h5>Online Banking</h5> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox">
                                            <select class="form-control" name="bank" id="fpx-bank">
                                                <option value="" selected disabled>Select Bank</option>
                                                <option value="Maybank">Maybank</option>
                                                <option value="CIMB Bank">CIMB Bank</option>
                                                <option value="Public Bank<">Public Bank</option>
                                                <option value="RHB Bank">RHB Bank</option>
                                                <option value="Hong Leong Bank">Hong Leong Bank</option>
                                                <option value="Affin Bank">Affin Bank</option>
                                                <option value="Alliance Bank">Alliance Bank</option>
                                                <option value="Agro Bank">Agro Bank</option>
                                                <option value="AmBank">AmBank</option>
                                                <option value="Bank Islam">Bank Islam</option>
                                                <option value="Bank Kerjasama Rakyat">Bank Kerjasama Rakyat</option>
                                                <option value="Bank Muamalat">Bank Muamalat</option>
                                                <option value="BSN">BSN</option>
                                                <option value="HSBC">HSBC</option>
                                                <option value="KFH">KFH</option>
                                                <option value="OCBC Bank">OCBC Bank</option>
                                                <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                <option value="UOB">UOB</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="text" class="form-control" name="fpxUsername" id="fpx-username"> 
                                            <span>Username</span>
                                        </div> 
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="inputbox"> 
                                            <input type="password" class="form-control" name="fpxPass" id="fpx-pass"> 
                                            <span>Password</span>
                                        </div>
                                    </div>

                                    <div class="px-5 pay">
                                        <button type="submit" name="fpxPayBtn" class="btn btn-primary btn-block">Pay</button>
                                    </div><!-- End .form-footer -->
                                </div>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->