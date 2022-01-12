<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Models\StreamPoint;
use App\Http\Controllers\Controller;

class LoadBalanceController extends Controller
{
    public function index()
    {

        $streamPoint = StreamPoint::active()
            ->byActive()
            ->byPriority()
            ->first();

        $setting = Setting::first();

        $payload = [
            'setting' => $setting->toArray(),
            'stream_point' => [
                'cdn_host' => $streamPoint->cdn_host,
                'name' => $streamPoint->name,
            ],
        ];

        return $payload;
    }
}
