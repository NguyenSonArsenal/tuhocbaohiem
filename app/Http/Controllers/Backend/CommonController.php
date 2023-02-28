<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use Illuminate\Support\Facades\Log;
use WisdomDiala\Cryptocap\Facades\Cryptocap;

class CommonController extends Controller
{
    public function coin()
    {
        $data = Coin::query();

        if (request('name')) {
            $data->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('rank')) {
            $data->orderBy('rank', request('rank'));
        }

        $data = $data->paginate(getConstant('BACKEND_PAGINATE'));

        return view('backend.coin.index', compact('data'));
    }

    public function getLastPriceCoin()
    {
        try {
            $coinApi = Cryptocap::getAssets();
            $data = $coinApi->data;
            foreach ($data as $item) {
                $symbol = $item->symbol;
                $entity = Coin::where('symbol', $symbol)->first();
                if (empty($entity)) {
                    // store
                    Coin::create([
                        'name' => $item->name,
                        'rank' => $item->rank,
                        'symbol' => $item->symbol,
                        'price' => $item->priceUsd,
                        'growth_rate' => $item->changePercent24Hr,
                        'explorer' => $item->explorer,
                    ]);
                } else {
                    Coin::where('symbol', $symbol)->update([
                        'name' => $item->name,
                        'rank' => $item->rank,
                        'price' => $item->priceUsd,
                        'growth_rate' => $item->changePercent24Hr,
                        'explorer' => $item->explorer,
                    ]);
                }
            }

            return redirect()->back()->with('notification_success', t('success'));
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('notification_error', t('system_error'));
        }

    }
}
