<?php

return [
    [
        'label' => 'Dashboard',
        'url' => ['adm-dashboard/index'],
        'permission' => false
    ],
    [
        'label' => 'Afiliados',
        'url' => ['adm-affiliation/index']
    ],
    [
        'label' => 'Inscrições',
        'url' => ['adm-register-championship/index']
    ],
    [
        'label' => 'Site',
        'template' => '<span>{label}<i class="has-subnav"></i></span>',
        'class' => 'navbar',
        'items' => [
            [
                'label' => 'Sobre Nós',
                'url' => ['adm-about/index']
            ],
            [
                'label' => 'História da Liga',
                'url' => ['adm-history/index']
            ],
            [
                'label' => 'Campeonatos',
                'url' => ['adm-championship/index']
            ],
            [
                'label' => 'Copas Regionais',
                'url' => ['adm-cup/index']
            ],
        ]
    ],
    /*[
        'label' => 'Cadastros',
        'template' => '<span>{label}<i class="has-subnav"></i></span>',
        'class' => 'navbar',
        'items' => [
            [
                'label' => 'Clientes',
                'url' => ['adm-customer/index']
            ],
            [
                'label' => 'Cursos',
                'url' => ['adm-course/index']
            ]
        ]
    ],
    [
        'label' => 'Financeiro',
        'template' => '<span>{label}<i class="has-subnav"></i></span>',
        'class' => 'navbar',
        'items' => [
            [
                'label' => 'Vendas',
                'url' => ['adm-order/index']
            ],
            [
                'label' => 'Cobranças',
                'url' => ['adm-order-payment/index']
            ],
            [
                'label' => 'Cupons',
                'url' => ['adm-coupon/index']
            ],
            [
                'label' => 'Inscrições',
                'url' => ['adm-registration/index']
            ]
        ]
    ]*/
];
