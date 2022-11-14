<?php
include 'includes/header.php';
include 'database.php';

?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="text-center">
                        <h4>Select Your Product:</h4>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Currency</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-select form-control">
                                <option value="" disabled selected>Select Currency</option>
                                <option value="">BDT</option>
                                <option value="">USD</option>
                                <option value="">YEN</option>
                                <option value="">INR</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Product Name</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control form-select">
                                <option value="" disabled selected>Select Your Product</option>
                                <option value="">Google Pixel 7</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4">Quantity</label>
                        <div class="col-md-8">
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Save</button>
                            <a href="action.php?page=report" class="btn btn-primary" target="_blank">Generate Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "includes/footer.php"
?>