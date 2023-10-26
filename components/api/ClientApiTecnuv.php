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

    protected function request($body, $headers = [])
    {
        $options = [];

        $options['headers'] = [
            'Content-Type' => 'application/json'
        ];

        if ($headers) {
            foreach ($headers as $header => $value) {
                $options['headers'][$header] = $value;
            }
        }


        $options['json'] = $body;
        $response = $this->getClient()->request($this->method, $this->buildUrl(), $options);
        if (in_array($response->getStatusCode(), [200, 201])) {
            return Json::decode($response->getBody()->getContents());
        }

        return false;
    }

    protected function buildUrl(): string
    {
        return ArrayHelper::getValue(\Yii::$app->params, 'api') . '/' . $this->service;
    }
}