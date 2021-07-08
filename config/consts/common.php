<?php

return [

    // ユーザ種別
    'USER_CLASSIFICATIONS' => [
        'purchaser' => [
            'label' => '購入者',
            'value' => 1,
        ],
        'exhibitor' => [
            'label' => '出品者',
            'value' => 2,
        ],
        'admin' => [
            'label' => '管理者',
            'value' => 3,
        ],
    ],

    // 発送状態
    'SHIPMENT_STATUSES' => [
        'before_shipping' => [
            'lavel' => '発送前',
            'value' => 1,
        ],
        'shipping' => [
            'lavel' => '発送中',
            'value' => 2,
        ],
        'shipped' => [
            'lavel' => '発送済み',
            'value' => 3,
        ],
    ],
];
