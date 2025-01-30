<?php
// This file displays submitted form data.

<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Submissions</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url() ?>/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?= base_url() ?>/admin/pelayanan">Data Master Pelayanan</a></div>
                <div class="breadcrumb-item">Form Submissions</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Submitted Forms</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Form ID</th>
                                            <th>Submitted Data</th>
                                            <th>Submission Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($submissions)): ?>
                                            <?php foreach ($submissions as $submission): ?>
                                                <tr>
                                                    <td><?= $submission['id'] ?></td>
                                                    <td><?= $submission['form_id'] ?></td>
                                                    <td><?= json_encode($submission['data']) ?></td>
                                                    <td><?= date('Y-m-d H:i:s', strtotime($submission['created_at'])) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="4" class="text-center">No submissions found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>