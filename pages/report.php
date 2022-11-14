<?php
include 'includes/header.php';
include 'database.php';

if (isset($_REQUEST['date_from']) && isset($_REQUEST['date_to']) && isset($_REQUEST['customer_id']))
{
    $date_from = $_REQUEST['date_from'];
    $date_to = $_REQUEST['date_to'];
    $customer_id = ($_REQUEST['customer_id'] == '') ? "":"customers.customer_id ='".$_REQUEST['customer_id']."'";

    $query = "SELECT sales.created_at, sales.sales_id, products.product_name, sales.quantity, sales.`rate`, customers.customer_id, customers.customer_name,
(sales.quantity * sales.`rate`) AS total, `currency`.unit,
(sales.quantity * sales.`rate` * currency.rate) AS totalinbdt
FROM sales
INNER JOIN products ON sales.product_id = products.product_id 
INNER JOIN currency ON sales.`currency_id` = currency.currency_id
INNER JOIN customers ON sales.`customer_id` = `customers`.`customer_id`
WHERE DATE_FORMAT(created_at,'%Y-%m-%d') BETWEEN '".$date_from ."'AND '".$date_to."' AND $customer_id
ORDER BY sales_id";

    $result = mysqli_query($connect, $query);
}
else
    {
        $query2 = "SELECT sales.created_at, sales.sales_id, products.product_name, sales.quantity, sales.`rate`, customers.customer_name,
(sales.quantity * sales.`rate`) AS total, `currency`.unit,
(sales.quantity * sales.`rate` * currency.rate) AS totalinbdt
FROM sales
INNER JOIN products ON sales.product_id = products.product_id 
INNER JOIN currency ON sales.`currency_id` = currency.currency_id
INNER JOIN customers ON sales.`customer_id` = `customers`.`customer_id`
ORDER BY sales_id";

        $result = mysqli_query($connect, $query2);
}
?>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Sales Report</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" autocomplete="off">
                                <div class="row mt-3">
                                    <label for="" class="col-md-1">Date From</label>
                                    <div class="col-md-2">
                                        <input type="date" name="date_from" value="<?php if (isset($_REQUEST['date_from'])) { echo $_REQUEST['date_from']; } ?>" class="form-control"/>
                                    </div>
                                    <label for="" class="col-md-1">Date To</label>
                                    <div class="col-md-2">
                                        <input type="date" name="date_to" value="<?php if (isset($_REQUEST['date_to'])) { echo $_REQUEST['date_to']; } ?>" class="form-control"/>
                                    </div>
                                    <label for="" class="col-md-1">Customer ID</label>
                                    <div class="col-md-2">
                                        <input type="text" name="customer_id" value="<?php if (isset($_REQUEST['customer_id'])) { echo $_REQUEST['customer_id']; } ?>" class="form-control"/>
                                    </div>
                                    <label for="" class="col-md-1"></label>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success">Click to Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered table-hover table-striped" id="report">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sales ID</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                    <th>Unit</th>
                                    <th>Total in BDT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ( $rows = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['created_at']?></td>
                                        <td><?php echo $rows['sales_id']?></td>
                                        <td><?php echo $rows['customer_name']; ?></td>
                                        <td><?php echo $rows['product_name']?></td>
                                        <td><?php echo $rows['quantity']?></td>
                                        <td><?php echo $rows['rate']; ?></td>
                                        <td><?php echo $rows['total']?></td>
                                        <td><?php echo $rows['unit']?></td>
                                        <td><?php echo $rows['totalinbdt']?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include "includes/footer.php"
?>