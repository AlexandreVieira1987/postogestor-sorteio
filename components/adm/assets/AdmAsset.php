<?php


namespace app\components\adm\assets;


use yii\web\AssetBundle;

class AdmAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web';

    public $css = [
        'css/admin/adm.css',
        'css/admin/custom.css',
        'css/admin/site.css',
        'css/admin/datepicker.css',
        'css/text.css',
        'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css'
    ];

    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/locale/pt-br.js',
        '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js',
        'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js',
        'js/summernote-PTBR.js',
        'js/script.js',
//        'js/adm.js',
//        'js/fullcalendar/main.js',
//        'js/fullcalendar/intereaction.js',
//        'js/fullcalendar/daygrid.js',
//        'js/fullcalendar/list.js',
//        'js/json-viewer.js'

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
