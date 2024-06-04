<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SessionService
{
    public function updateSession($sessionId, $payload, $lastActivity, $userId, $ipAddress, $userAgent, $maxRetries = 3)
    {
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($sessionId, $payload, $lastActivity, $userId, $ipAddress, $userAgent) {
                    DB::table('sessions')
                        ->where('id', $sessionId)
                        ->update([
                            'payload' => $payload,
                            'last_activity' => $lastActivity,
                            'user_id' => $userId,
                            'ip_address' => $ipAddress,
                            'user_agent' => $userAgent
                        ]);
                });

                // If we reach this point, the transaction was successful, so we can break the loop
                break;
            } catch (QueryException $e) {
                if ($e->getCode() == 1205) {
                    // Lock wait timeout exceeded
                    $attempts++;
                    if ($attempts >= $maxRetries) {
                        // If we've exceeded the maximum number of retries, rethrow the exception
                        throw $e;
                    }
                    // Otherwise, wait a bit before retrying
                    sleep(1);
                } else {
                    // If it's a different exception, rethrow it
                    throw $e;
                }
            }
        }
    }
}
