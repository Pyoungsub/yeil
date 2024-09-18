<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Redis;
class OauthController extends Controller
{
    //
    public function kakao()
    {
        /*
            $user = Socialite::driver('kakao')->user();
            SocialiteProviders\Manager\OAuth2\User {#532 ▼ // app/Http/Controllers/OauthController.php:22
                +id: 3627825123
                +nickname: null
                +name: null
                +email: "ps.shim87@gmail.com"
                +avatar: null
                +user: array:3 [▼
                    "id" => 3627825123
                    "connected_at" => "2024-07-18T13:56:12Z"
                    "kakao_account" => array:8 [▼
                    "has_email" => true
                    "email_needs_agreement" => false
                    "is_email_valid" => true
                    "is_email_verified" => true
                    "email" => "ps.shim87@gmail.com"
                    "has_phone_number" => true
                    "phone_number_needs_agreement" => false
                    "phone_number" => "+82 10-4688-3824"
                    ]
                ]
                +attributes: array:5 [▼
                    "id" => 3627825123
                    "nickname" => null
                    "name" => null
                    "email" => "ps.shim87@gmail.com"
                    "avatar" => null
                ]
                +token: "5qlxLpjL4QBZx8BOfu1iXODwPs8gK_uKAAAAAQo9c5oAAAGQxiphQ_6hmr4nKm-b"
                +refreshToken: "uSuuXhP_JCluemuoCHsE6lHDQn926okbAAAAAgo9c5oAAAGQxiphPf6hmr4nKm-b"
                +expiresIn: 7199
                +approvedScopes: array:1 [▼
                    0 => "account_email talk_message phone_number"
                ]
                +accessTokenResponseBody: array:6 [▼
                    "access_token" => "5qlxLpjL4QBZx8BOfu1iXODwPs8gK_uKAAAAAQo9c5oAAAGQxiphQ_6hmr4nKm-b"
                    "token_type" => "bearer"
                    "refresh_token" => "uSuuXhP_JCluemuoCHsE6lHDQn926okbAAAAAgo9c5oAAAGQxiphPf6hmr4nKm-b"
                    "expires_in" => 7199
                    "scope" => "account_email talk_message phone_number"
                    "refresh_token_expires_in" => 5183999
                ]
            }
         */
        try{
            $user = Socialite::driver('kakao')->user();
            $find_user = User::where('email', $user->email)->first();
            if($find_user)
            {
                Auth::login($find_user);
            }
            else
            {
                $new_user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make(Str::random(10)),
                    'profile_photo_path' => $user->avatar,
                ]);
                Auth::login($new_user);
            }
            if (session()->has('part_id') && auth()->user()->inquiries()->where('solved', false)->count() < 5) {
                auth()->user()->inquiries()->firstOrCreate([
                    'part_id' => session('part_id'),
                    'solved' => false
                ]);
                $request->session()->forget('part_id');
            }
            return redirect()->intended('/');
        }
        catch(Exception $e)
        {
            return redirect()->route('kakao.login');
        }
    }
}
