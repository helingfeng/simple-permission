<?php

return [
    [
        'slug' => 'platform',
        'name' => '平台管理',
        'children' => [
            [
                'slug' => 'dashboard',
                'name' => '应用总览',
                'icon' => 'fa-dashboard',
                'children' => [
                    [
                        'slug' => 'orders',
                        'name' => '订单总览',
                        'route' => 'orders/dashboard',
                        'expect' => 1,
                        'permission' => [
                            'view' => '查看',
                            'export' => '导出'
                        ]
                    ]
                ]

            ],
            [
                'slug' => 'excel',
                'name' => '数据报表',
                'icon' => 'fa-chart',
                'children' => [
                    [
                        'slug' => 'bar',
                        'name' => '订单趋势',
                        'route' => 'orders/trending',
                        'expect' => 1,
                        'permission' => [
                            'view' => '查看',
                            'export' => '导出'
                        ]
                    ],
                    [
                        'slug' => 'pie',
                        'name' => '订单来源',
                        'route' => 'orders/become',
                        'expect' => 1,
                        'permission' => [
                            'view' => '查看',
                            'export' => '导出'
                        ]
                    ],
                ]

            ],
        ],
    ],
    [
        'slug' => 'website',
        'name' => '网站设置',
        'children' => [
            [
                'slug' => 'setting',
                'name' => '站点设置',
                'icon' => 'fa-cogs',
                'children' => [
                    [
                        'slug' => 'nav',
                        'name' => '页面导航',
                        'route' => 'website/nav'
                    ],
                    [
                        'slug' => 'adv',
                        'name' => '广告投放',
                        'route' => 'website/adv'
                    ]
                ]
            ],
        ],
    ],
];