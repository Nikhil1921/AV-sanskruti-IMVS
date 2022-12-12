<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">REGISTER A NEW ACCOUNT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('register', 'id="register-form"') ?>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="text-center mb-4">
                        <?= img('assets/images/logo.png') ?>
                    </div>
                    <div class="col-sm-12" id="resigter-errors"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name:</label>
                                <input class="form-control" placeholder="Enter Your Full Name*" name="name" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="form-control" placeholder="Enter Your Email*" name="email" type="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address:</label>
                                <input class="form-control" placeholder="Enter Your Address*" name="address"
                                    type="textarea">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Country</label>
                                <select class="form-control" name="country" id="country" data-dependent="state"
                                    onchange="getStates(this)">
                                    <option disabled selected>Select Country</option>
                                    <?php foreach($this->main->getall('countries', 'id, name', ['is_deleted' => 0]) as $country): ?>
                                    <option value="<?= e_id($country['id']) ?>"><?= $country['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select state:</label>
                                <select class="form-control" name="state" id="state" data-dependent="city"
                                    onchange="getCities(this)" readonly="">
                                    <option readonly value="" selected> Select state</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select city:</label>
                                <select class="form-control" name="city" id="city" readonly="">
                                    <option readonly value="" selected> Select city</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mobile Number:</label>
                                <input class="form-control" placeholder="Enter Mobile*" maxlength="10" name="mobile"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password:</label>
                                <input class="form-control" placeholder="Enter Password*" name="password"
                                    type="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input class="form-control" placeholder="Enter Confirm Password*" name="password"
                                    type="password">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Current year STD:</label>
                                <select class="form-control" name="exams" id="exm_cat" onchange="getPapers(this)">
                                    <option readonly value="" selected> Select Current year STD</option>
                                    <?php foreach ($this->main->getCategory() as $cat): ?>
                                    <option data-price="<?= $cat['price'] ?>" value="<?= $cat['id'] ?>">
                                        <?= $cat['cat_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Exam board</label>
                                <select class="form-control" name="board" id="boards">
                                    <option disabled selected>Select Exam board</option>
                                    <option value="GSEB">GSEB</option>
                                    <option value="CBSE">CBSE</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Exam Paper Date</label>
                                <select class="form-control" name="exam_date" id="exm_date" data-dependent="exam_lang"
                                    onchange="getLang(this)" readonly="">
                                    <option disabled selected>Select Exam Paper Date</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Exam Language</label>
                                <select class="form-control" name="exam_lang" id="exam_lang" readonly="">
                                    <option disabled selected>Select Exam Language</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="terms">
                                <input type="checkbox" id="terms" name="terms"> Accept Terms & Condition
                                <br>
                                <span class="text-danger" id="show-terms-error">Please accept terms & conditions</span>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <div class="bottom-info">
                                <ul>
                                    <li>
                                        Exam Fees: <span id="new_price">100</span> Rs
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-lg" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary btn-lg">
                    Sign up
                </button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>