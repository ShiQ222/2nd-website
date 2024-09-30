<div class="box">
    <div class="box-header with-border">
        <div class="left">
            <h3 class="box-title"><?= esc($title); ?></h3>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                        <tr role="row">
                            <th><?= trans("id"); ?></th>
                            <th><?= trans("payment_id"); ?></th>
                            <th><?= trans("product_id"); ?></th>
                            <th><?= trans("payment_amount"); ?></th>
                            <th><?= trans("payment_status"); ?></th>
                            <th><?= trans("purchased_plan"); ?></th>
                            <th><?= trans("date"); ?></th>
                            <th class="max-width-120"><?= trans('options'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($transactions)): ?>
                            <?php foreach ($transactions as $transaction): ?>
                                <tr>
                                    <td style="width: 5%;"><?= $transaction->id; ?></td>
                                    <td><?= esc($transaction->payment_id); ?></td>
                                    <td><?= esc($transaction->product_id); ?></td>
                                    <td><?= esc($transaction->payment_amount); ?>&nbsp;(<?= esc($transaction->currency); ?>)</td>
                                    <td><?= getPaymentStatus($transaction->payment_status); ?></td>
                                    <td><?= esc($transaction->purchased_plan); ?></td>
                                    <td class="white-space-nowrap" style="width: 15%"><?= formatDate($transaction->created_at); ?></td>
                                    <td><a href="<?= langBaseUrl('invoice-promotion/' . $transaction->id); ?>" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-file-text"></i>&nbsp;&nbsp;<?= trans("view_invoice"); ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if (empty($transactions)): ?>
                    <p class="text-center">
                        <?= trans("no_records_found"); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if (!empty($transactions)): ?>
                    <div class="number-of-entries">
                        <span><?= trans("number_of_entries"); ?>:</span>&nbsp;&nbsp;<strong><?= $numRows; ?></strong>
                    </div>
                <?php endif; ?>
                <div class="table-pagination">
                    <?= $pager->links; ?>
                </div>
            </div>
        </div>
    </div>
</div>