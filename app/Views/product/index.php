<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            List Product
            <a class="btn btn-success btn-sm float-right" href="<?php echo base_url('cart'); ?>"><i class="fa fa-cart-plus"></i> <?php echo count($total); ?></a>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success') != null) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('error') != null) { ?>
                <div class="alert alert-danger">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php } ?>
            <div class="row">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($items as $key => $item) : ?>
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img src="/images/<?= $item['photo'] ?>" class="card-img-top" width="300px">
                            <div class="card-body">
                                <p class="card-title"><?= $item['name'] ?></p>
                                <p class="card-text"> <b>Rp <?= $item['price'] ?></b></p>
                            </div>
                            <div class="card-footer">
                                <div class="row-mb-3">
                                    <a href="<?= base_url('product/detail/' . $item['slug']) ?>" class="btn btn-info">Detail</a>
                                    <a href="<?php echo base_url('cart/beli/' . $item['id']); ?>" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>