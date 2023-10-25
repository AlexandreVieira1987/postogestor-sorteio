<?php
/** @var $itemQuery */
$this->registerJs('__filter()');

if (!isset($searchQuery)) {
    $searchQuery = '';
}

if (!isset($placeholder)) {
    $placeholder = '';
}

use yii\helpers\Html; ?>

<div class="section-nav">
    <?= Html::beginForm(Yii::$app->request->getUrl(), 'get', [
            'class' => 'form-inline',
            'id' => 'form-filter'
    ]); ?>

        <div class="col-sm-4 col-report">
            <?= Html::input('text', 'q', $searchQuery, [
                'class' => 'form-control',
                'placeholder' => $placeholder
            ])?>
            <button class="btn btn-icon" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <?php if (isset($items)) : ?>
            <div class="col-sm-4 col-report">
                <?= Html::dropDownList('s', $itemQuery, $items, ['class' => 'form-control control-select2']) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($this->blocks['otherFilter'])): ?>
            <div class="col-sm-3 col-report">
                <?= $this->blocks['otherFilter'] ?>
            </div>
        <?php endif; ?>

    <?= Html::endForm()?>
</div>

<script type="text/javascript">
    function __filter() {
        $(document).ready(function () {
            $('select').on('change', function () {
                $('#form-filter').submit();
            });
        });
    }
</script>

<style type="text/css">
    .col-report{
        padding: 2px 4px 2px 4px;
    }
</style>
