<?php
/**
 * WayloShare Routes and MoRTH Cap Data
 */

return [
    // Pre-calculated routes for the calculator
    'calculator_routes' => [
        [
            'id'    => 0,
            'label' => 'Jammu → Chandigarh',
            'km'    => 368,
            'en'    => 'CHANDIGARH',
            'hi'    => 'चंडीगढ़',
            'nh'    => 'NH 44'
        ],
        [
            'id'    => 1,
            'label' => 'Delhi → Jaipur',
            'km'    => 280,
            'en'    => 'JAIPUR',
            'hi'    => 'जयपुर',
            'nh'    => 'NH 48'
        ],
        [
            'id'    => 2,
            'label' => 'Jammu → Srinagar',
            'km'    => 250,
            'en'    => 'SRINAGAR',
            'hi'    => 'श्रीनगर',
            'nh'    => 'NH 44'
        ],
        [
            'id'    => 3,
            'label' => 'Mumbai → Pune',
            'km'    => 150,
            'en'    => 'PUNE',
            'hi'    => 'पुणे',
            'nh'    => 'NH 48'
        ],
        [
            'id'    => 4,
            'label' => 'Bengaluru → Mysuru',
            'km'    => 145,
            'en'    => 'MYSURU',
            'hi'    => 'मैसूरु',
            'nh'    => 'NH 275'
        ]
    ],

    // MoRTH recommended maximum rates per passenger-km and CO2 factors
    'car_types' => [
        [
            'id'    => 'hatch',
            'label' => 'Hatchback',
            'rate'  => 2.50,
            'seats' => 3,
            'co2'   => 0.13
        ],
        [
            'id'    => 'sedan',
            'label' => 'Sedan',
            'rate'  => 3.20,
            'seats' => 3,
            'co2'   => 0.15
        ],
        [
            'id'    => 'suv',
            'label' => 'Compact SUV (5)',
            'rate'  => 3.50,
            'seats' => 4,
            'co2'   => 0.17
        ],
        [
            'id'    => 'muv',
            'label' => 'MUV (7-seater)',
            'rate'  => 3.80,
            'seats' => 6,
            'co2'   => 0.19
        ]
    ],

    // Popular routes marquee on homepage
    'popular_routes' => [
        ['from' => 'Delhi',     'to' => 'Jaipur',      'km' => 'About 280 km'],
        ['from' => 'Mumbai',    'to' => 'Pune',        'km' => 'About 150 km'],
        ['from' => 'Bengaluru', 'to' => 'Mysuru',      'km' => 'About 145 km'],
        ['from' => 'Jammu',     'to' => 'Chandigarh',  'km' => '368 km · ₹1,103 a seat'],
        ['from' => 'Chennai',   'to' => 'Puducherry',  'km' => 'About 150 km'],
        ['from' => 'Hyderabad', 'to' => 'Vijayawada',  'km' => 'About 275 km'],
        ['from' => 'Ahmedabad', 'to' => 'Vadodara',    'km' => 'About 110 km'],
        ['from' => 'Lucknow',   'to' => 'Kanpur',      'km' => 'About 90 km'],
        ['from' => 'Jammu',     'to' => 'Srinagar',    'km' => 'About 250 km on NH44']
    ]
];

