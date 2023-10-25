<?php

namespace app\components;

use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

abstract class Report extends Model
{
    public $pagination = 50;
    public $totalItems = 0;
    public $searchQuery = null;
    public $showFilterAdvanced = false;

    abstract protected function getData();
    abstract public function getFilters();
    abstract protected function getDataColumns();

    public function getColumns()
    {
        if (!$this->getData()) {
            return [];
        }

        $columns = [];
        foreach ($this->getDataColumns() as $attribute => $options) {
            $column = [];
            $column['attribute'] = $attribute;

            foreach ($options as $option => $value) {
                $column[$option] = $value;
            }

            if (!isset($options['label'])) {
                $column['label'] = $options['attribute'];
            } else {
                $column['label'] = $options['label'];
            }

            $columns[] = $column;
        }

        return $columns;
    }


    public function getArrayDataProvider()
    {
        return new ArrayDataProvider([
            'allModels' => $this->getData(),
            'pagination' => $this->getPagination(),
        ]);
    }

    public function getActiveDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->getData(),
            'pagination' => $this->getPagination(),
            'sort' => false
        ]);
    }

    protected function showFilterAdvanced()
    {
        if ($this->searchQuery) {
            $this->showFilterAdvanced = true;
        }
    }

    public function getPageSize()
    {
        return [
            10 => 10,
            25 => 25,
            50 => 50,
            75 => 75,
            100 => 100
        ];
    }

    private function getPagination()
    {
        if ($this->pagination > 0) {
            return [
                'pageSize' => $this->pagination,
            ];
        }

        return false;
    }

    protected function getTimeStamp($value)
    {
        $locale = strtolower(substr(\Yii::$app->formatter->locale, 0, 2));
        if ($locale == 'pt') {
            $value = \DateTime::createFromFormat('d/m/Y H:i:s', $value);
        }


        return \Yii::$app->formatter->asTimestamp($value);
    }
}
