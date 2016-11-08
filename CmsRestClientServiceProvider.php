<?php

/*
 * This file is part of the GLAVWEB.cms Rest Client package.
 *
 * (c) Andrey Nilov <nilov@glavweb.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glavweb\CmsRestClientSilexProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Glavweb\CmsRestClient\CmsRestClient;

/**
 * CmsRestClientServiceProvider
 *
 * @package Glavweb\CmsRestClientSilexProvider
 * @author Andrey Nilov <nilov@glavweb.ru>
 */
class CmsRestClientServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['cms_rest_client'] = function () use ($app) {
            return new CmsRestClient(
                $app['guzzle'],
                $app['api_base_url'],
                $app['api_username'],
                $app['api_password']
            );
        };
    }
}
