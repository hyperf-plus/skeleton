<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Hyperf\ConfigCenter\Mode;

return [
    'enable' => (bool)env('CONFIG_CENTER_ENABLE', false),
    'driver' => env('CONFIG_CENTER_DRIVER', 'nacos'),
    'mode' => env('CONFIG_CENTER_MODE', Mode::PROCESS),
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_OVERWRITE,
            'interval' => 3,
            'default_key' => 'nacos_config',
            'listener_config' => [
                // dataId, group, tenant, type, content
                'nacos_config' => [
                    'tenant' => env('CONFIG_NACOS_TENANT'),
                    'group' => 'corp',
                    'data_id' => '*',
                ],
            ],
            'client' => [
                'uri' => env('CONFIG_NACOS_URI', null),
                // 'host' => 'nacos.api.sn.cn',
                // 'port' => 80,
                'username' => env('CONFIG_NACOS_USERNAME', null),
                'password' => env('CONFIG_NACOS_PASSWORD', null),
                'guzzle' => [
                    'config' => null,
                ],
            ],
        ],
    ],
];
