<?php
if (isset($_POST['submit'])) {
    $use->storePv($_POST['name']);
    echo "<script>location='./?page=pv'</script>";
}
if (isset($_GET['delete'])) {
    $use->destoryPv($_GET['id']);
    echo "<script>location='./?page=pv'</script>";
}
?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Product Variation</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <button name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Product Variations</h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Name</th>
                            <th width="40">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getPv() as $key => $pvValue): ?>
                            <tr>
                                <td><?= $key += 1; ?></td>
                                <td><?= $pvValue['name'] ?></td>
                                <td>
                                    <a href="./?page=pv&delete&id=<?=$pvValue['id_pv']?>" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <a href="./?page=pv-edit&id=<?= $pvValue['id_pv'] ?>"
                                       class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div
</div>
