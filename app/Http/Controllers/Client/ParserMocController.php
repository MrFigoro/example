<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UrlRequest;

class ParserMocController extends Controller
{
	public function store(UrlRequest $request)
	{
		return response()->json([
			'url' => $request->get('url'),
			'id' => '1',
		], 200);

	}

	public function results(int $id)
	{
		if ($id == 1) {
			return response()->json([
				'status' => 'success',
				'result' => [
					'base' => [
						'fontSize' => [
							'18px', '24px', '36px'
						],
						'backgroundColor' => [
							'#a5a5a5', '#222222', '#555555'
						],
						'border' => [
							'none', '1px solid black', '2px solid yellow'
						],
						'borderRadius' => [
							'none', '5%', '8%'
						],
					],
                    'header' => [
                        'fontFamily' => [
                            'Roboto', 'Tahoma', 'Helvetica'
                        ],
                        'fontSize' => [
                            '36px', '24px', '16px'
                        ],
                        'color' => [
                            '#2F2F2F', '#d3d3d3', '#a1a1a1', '#d5d5d5'
                        ],
                        'lineHeight' => [
                            '46px', '38px'
                        ],
                        'textDecoration' => [
                            'none'
                        ],
                        'fontWeight' => [
                            'normal', 'bolder'
                        ],
                    ],
                    'paragraph' => [
                        'fontFamily' => [
                            'PT Serif', 'Tahoma', 'Helvetica'
                        ],
                        'fontSize' => [
                            '18px', '28px', '36px'
                        ],
                        'color' => [
                            '#222', '#555', '#000'
                        ]
                    ],
                    'button' => [
                        'normal' => [
                            'color' => [
                                '#f7f7f7', '#d1d1d1', '#f0f0f0', '#a0a0a0'
                            ],
                            'background' => [
                                '#94181E', '#a3a3a3', "#d1d1d1"
                            ],
                            'border' => [
                                '2px solid #94181E', '2px solid black', '3px solid red'
                            ],
                            'fontSize' => [
                                '18px', '20px', '18px'
                            ],
                            'fontFamily' => [
                                'Arial', 'Tahoma'
                            ],
                            'fontWeight' => [
                                'normal', 'bolder'
                            ]
                        ],
                        'hover' => [
                            'background' => [
                                '#f7f7f7', '#f6f6f1', '#a2a5a0'
                            ],
                            'color' => [
                                '#4C0000', '#a1a1a1', '#f5f5f5', '#d2d0d5'
                            ],
                            'border' => [
                                '2px solid #ff4b3c', '1px solid yellow', '2px solid green'
                            ]
                        ],
					],
                    'a' => [
                        'normal' => [
                            'color' => [
                                '#aaa', '#ddd', '#f0f0f0', '#a0a0a0'
                            ],
                            'background' => [
                                '#ddd', '#bbb', "#a7a7a7"
                            ],
                            'border' => [
                                '2px solid #94181E', '2px solid black', '3px solid red'
                            ],
                            'fontSize' => [
                                '18px', '20px', '18px'
                            ],
                            'fontFamily' => [
                                'Arial', 'Tahoma'
                            ],
                            'fontWeight' => [
                                'normal', 'bolder'
                            ]
                        ],
                        'hover' => [
                            'background' => [
                                '#bbb', '#a2a2a2', '#b2b2b2', '#d2d0d5'
                            ],
                            'color' => [
                                '#a4a4a4', '#b5b5b5', '#a2a5a0'
                            ],
                            'border' => [
                                '2px solid #ff4b3c', '1px solid yellow', '2px solid green'
                            ]
                        ],
					],
					'block' => [
						'background' => [
							'#343434', '#a3a3a3', '#a6a6a6'
						],
						'border' => [
							'none', '2px solid grey', '2px solid green'
						],
						'borderRadius' => [
							'none', '5%', '10%'
						],
					],
				]
			], 200);
		} else if ($id == 2) {
			return response()->json([
				'status' => 'process',
			], 200);
		} else {
			return response()->json([
				'status' => 'error',
				'message' => 'Something went wrong.'
			],400) ;
		}
	}
}