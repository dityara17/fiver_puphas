<?php
if (isset($_GET['delete'])) {
    $use->destoryPv($_GET['id']);
    echo "<script>location='./?page=pv'</script>";
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Transactions</h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table datatable table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Varian</th>
                            <th width="">Message</th>
                            <th width="">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getTransaction() as $key => $pvValue): ?>
                            <tr>
                                <td><?= $key += 1; ?></td>
                                <td><?= $pvValue['tname'] ?></td>
                                <td><?= $pvValue['phone'] ?></td>
                                <td><?= $pvValue['address'] ?></td>
                                <td><?= $pvValue['pvname'] ?></td>
                                <td><?= $pvValue['message'] ?></td>
                                <td><?= date('F, d Y ', strtotime($pvValue['date'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div
</div>
