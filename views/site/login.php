<?php
/** @var User $model */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\User;
?>

<div class="col-sm-5"></div>
    <div class="col-sm-2" style="margin-top: 70px;">
        <h4 style="color: #888; " class="text-center">Área Restrita</h4>
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput([
                'autofocus' => true,
                'placeholder' => 'Usuário'
            ])->label(false) ?>
    
            <?= $form->field($model, 'password')->passwordInput([
                'placeholder' => 'Senha'
            ])->label(false) ?>
    
            <div class="form-group">
                <?= Html::submitButton('Acessar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
<div class="col-sm-5"></div>
