<?php
if (isset($_POST['submit'])) {
    $use->updatePv($_POST['name'],$_GET['id']);
    echo "<script>location='./?page=pv'</script>";
}
$pv = $use->getPvById($_GET['id']);
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
                        <input type="text" name="name" class="form-control" value="<?= $pv['name'] ?>">
                    </div>
                    <button name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
