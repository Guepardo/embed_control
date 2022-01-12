<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\StreamPoint;
use Illuminate\Support\Facades\Cache;

class LoadBalanceController extends Controller
{
    public function index()
    {
        $payload = Cache::remember('payload', 5, function () {
            $streamPoint = StreamPoint::active()
                ->byActive()
                ->byPriority()
                ->first();

            $setting = Setting::first();

            return [
                'setting' => $setting->toArray(),
                'stream_point' => [
                    'cdn_host' => $streamPoint->cdn_host,
                    'name' => $streamPoint->name,
                ],
            ];
        });

        return $payload;
    }
}
