<?php


namespace App\Repositories;


use App\Models\Media;
use Carbon\Carbon;

class Graph
{

    public static function lastDays($days = 10)
    {
        return [
            'title' => [
                'text' => 'Number of image uploads previous 10 days',
                'textStyle' => [
                    'color' => '#fff'
                ],
            ],
            'xAxis' => [
                'type' => 'category',
                'boundaryGap' => false,
                'data' => self::prevDays($days)['x'],
                'axisLabel' => [
                    'rotate' => 45,
                ]
            ],
            'yAxis' => [
                'type' => 'value',
                'minInterval' => 1,
                'axisLabel' => [
                    'showMinLabel' => false,
                ],
            ],
            'series' => [
                'data' => self::prevDays($days)['data'],
                'type' => 'line',
                'areaStyle' => []
            ],

        ];
    }

    public static function prevDays($days = 10)
    {
        $x = self::getDates($days);

        return [
            'x' => $x,
            'data' => self::getValues($x),
        ];
    }

    private static function getDates($days)
    {
        $result = [];

        for ($x = $days - 1; $x >= 0; $x--) {
            $result[] = Carbon::now()->subDays($x)->format('Y-m-d');
        }

        return $result;
    }

    private static function getValues($dates)
    {
        $result = [];

        foreach ($dates as $date)
        {
            $result[] = Media::whereDate('created_at', date($date))->count();
        }

        return $result;
    }

}
