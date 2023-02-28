<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\ApiResponseService;
use App\Services\FirebaseJwtToken;
use Closure;
use Exception;
use Illuminate\Support\Facades\Log;

class JwtMiddleware
{
    use ApiResponseService;

    public $firebaseJwtToken;

    public function __construct(FirebaseJwtToken $firebaseJwtToken)
    {
        $this->firebaseJwtToken = $firebaseJwtToken;
    }

    public function handle($request, Closure $next)
    {
        try {
            $payload = $this->firebaseJwtToken->validate($request->bearerToken());
            if (!empty($payload)) {
                $userId = $payload->id;
                $user = User::query()->where('id', $userId)->first();
                if (empty($user)) {
                    return response()->json(['error' => __('messages.unauthorized')], 401);
                }
                apiGuard()->login($user);
                return $next($request);
            }
        } catch (Exception $e) {
            Log::error($e);
        }
        return response()->json(['error' => __('messages.unauthorized')], 401);
    }
}
