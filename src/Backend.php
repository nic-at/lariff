<?php

namespace Nicat\Lariff;

use GuzzleHttp\Client;
use Heise\Shariff\Backend\BackendManager;
use Heise\Shariff\Backend\ServiceFactory;
use Heise\Shariff\Backend as ShariffBackend;
use Illuminate\Config\Repository as LaravelConfig;

/**
 * Created by NIC.at GmbH.
 * User: marioo
 * Date: 04.05.2016
 * Time: 14:13
 */
class Backend extends ShariffBackend
{
    protected $backendManager;

    public function __construct(LaravelConfig $config, Cache $cache)
    {
        $config = $config->get('lariff', []);

        $domains = $config['domains'];
        // stay compatible to old configs
        if (isset($config['domain'])) {
            array_push($domains, $config['domain']);
        }
        $clientOptions = [];
        if (isset($config['client'])) {
            $clientOptions = $config['client'];
        }
        $client = new Client($clientOptions);
        $baseCacheKey = md5(json_encode($config));

        $serviceFactory = new ServiceFactory($client);
        $this->backendManager = new BackendManager(
            $baseCacheKey,
            $cache,
            $client,
            $domains,
            $serviceFactory->getServicesByName($config['services'], $config)
        );

    }

}