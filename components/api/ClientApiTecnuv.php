<?php

namespace app\components\api;

use GuzzleHttp\Client;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

abstract class ClientApiTecnuv
{
    protected $method = '';
    protected $service = '';
    private $client = null;

    /**
     * @return Client
     */
    private function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = new Client();
        }
        return $this->client;
    }

    protected function request($body)
    {
        $options = [];

        $options['headers'] = [
            'Content-Type' => 'application/json'
        ];

        $body['apikey'] = ArrayHelper::getValue(\Yii::$app->params, 'whatsgw.apikey');

        $options['json'] = $body;
        $response = $this->getClient()->request($this->method, $this->buildUrl(), $options);
        if ($response->getStatusCode() == 200) {
            return Json::decode($response->getBody()->getContents());
        }

        return false;
    }

    protected function buildUrl(): string
    {
        return ArrayHelper::getValue(\Yii::$app->params, 'api') . '/' . $this->service;
    }
}