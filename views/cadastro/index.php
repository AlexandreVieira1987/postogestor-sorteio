<?php
/** @var Promocao $promocao */
/** @var Cliente $model */

use app\components\ConfigSite;
use app\models\City;
use app\models\Cliente;
use app\models\Promocao;
use kartik\select2\Select2;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$nome = Yii::$app->session->get('posto_slug');
$imagem = '/web/images/' . $nome . '/' . $promocao->imagem;
$host = Yii::$app->params['host'];

$this->registerJs('__form()');
?>
<div class="col-sm-12" style="background: #fff; padding: 20px" id="historia">
    <div class="container">

        <div class="col-sm-8">
            <div class="row">
                <div class="text-center" style="margin-top: 100px; margin-bottom: 50px">
                    <h2 class="title-section text-center" style="color: var(--color-blue-1);"><?= $promocao->name ?></h2>
                    <h5>Informe os dados abaixo para participar da promoção</h5>
                </div>
            </div>



            <?php $form = ActiveForm::begin();

                $fields = [
                    'first_name' => ['type' => 'input', 'class' => ''],
                    'last_name' => ['type' => 'input', 'class' => ''],
                    'cpfFormatted' => ['type' => 'input', 'class' => 'control-cpf'],
                    'birthDateFormatted' => ['type' => 'input', 'class' => 'control-date'],
                    'phoneFormatted' => ['type' => 'input', 'class' => 'control-phone_2'],
                    'email' => ['type' => 'input', 'class' => ''],
                    'placa' => ['type' => 'input', 'class' => ''],
                    'zipCodeFormatted' => ['type' => 'input', 'class' => 'control-cep'],
                    'city' => ['type' => 'select', 'class' => ''],
                    'street' => ['type' => 'input', 'class' => ''],
                    'neighbourhood' => ['type' => 'input', 'class' => '']
                ];

                $i = 1;
                foreach ($fields as $field => $options) {
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';

                    if ($options['type'] == 'input') {
                        echo $form->field($model, $field)->textInput(['class' => 'form-control ' . $options['class']]);
                    } else {
                        echo $form->field($model, 'city')->widget(Select2::class)->dropDownList(City::items(), ['class' => 'form-control ' . $options['class']]);
                    }
                    echo '</div>';
                    echo '</div>';

                    $i++;
                }
            ?>

            <div class="col-sm-12" style="margin-top: 30px">
                <div class="text-center">
                    <button type="submit" class="text-center btn btn-primary" style="color: #fff; padding: 30px; font-size: 20px">
                        EFETUAR CADASTRO
                    </button>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>


        <div class="col-sm-4">
            <div class="text-center" style="margin-top: 100px">
                <img class="images" src="<?= $host . '/' . $imagem ?>" alt="<?= ConfigSite::getTitle() ?>">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function __form() {

        $('#cliente-zipcodeformatted').on('blur', function () {
            var value = $(this).val()

            // if (value.length() === 9) {
                getAddressByZipCode(value)
            // }
        })

        function getAddressByZipCode(value) {
            $.ajax({
                type: 'post',
                url: '<?=Url::to(['cadastro/postal-code'])?>?code=' + value,
                success: function (data) {
                    Object.keys(data).forEach(function (key) {
                        $('#cliente-' + key).val(data[key]);
                    });

                    $("#cliente-city").trigger("change");
                }
            });
        }
    }
</script>

<style>
    .form-control {
        height: 55px;
        font-size: 18px;
    }

    .select2-container--krajee .select2-selection--single {
        height: 55px;
        padding-top: 15px;
    }
    .select2-container--krajee .select2-selection--single .select2-selection__arrow {
        height: 54px !important;
    }
</style>