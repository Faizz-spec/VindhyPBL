<?php
namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class LicenseController extends Controller
{
    public function show($key)
{
    try {
        // Lakukan pencarian data berdasarkan kunci
        // Simulasi data tanpa database
        $license = [
            'id' => $key,
            'price' => 0,
            'license_price_id' => 110,
            'author_id' => 14,
            'buyer_id' => null,
            'expired_date' => 1716380434,
            'comment' => 'partner Tahiti',
            'order_detail_id' => null,
            'max_window' => 1,
            'price_usd' => 0,
            'enable' => 1,
            'duration' => 1,
            'created_at' => 1713788443,
            'updated_at' => 1713788443,
            'author' => [
                'id' => 14,
                'role_id' => 11,
                'name' => null,
                'username' => null,
                'email' => 'thanhloan071196@gmail.com',
                'phone' => null,
                'avatar' => 'users/default.png',
                'email_verified_at' => null
            ]
        ];

        if (!isset($license['id'])) {
            throw new \Exception('Data tidak ditemukan');
        }

        return response()->json(['license' => $license]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 404);
    }
}

}
