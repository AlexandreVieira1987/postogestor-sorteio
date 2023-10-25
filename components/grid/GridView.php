<?php
namespace app\components\grid;

class GridView extends \yii\grid\GridView
{
    
    public function init()
    {
        $this->tableOptions = [
            'class'=>'table table-gray table-hover',
        ];
        
        $this->summary = false;
        
        return parent::init();
    }
    
}