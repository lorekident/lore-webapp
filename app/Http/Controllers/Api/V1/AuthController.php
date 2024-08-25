<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function attempt_login(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found'
                ], 401);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Credentials'
                ], 401);
            }

            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $token
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function register_user(Request $request)
    {

        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'first_name' => 'required|string',
                    'last_name' => 'required|string',
                    'phone_number' => 'required|unique:users',
                    'email' => 'required|email|unique:users,email',
                    'national_no' => 'required|unique:users',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ], 401);
            }

            // Retrieve form data
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $email = $request->input('email');
            $national_no = $request->input('national_no');
            $phone_number = $request->input('phone_number');
            $password = $request->input('password');

            //check if has files


            if ($request->input('user_type') == 'educator') {
                //check if identity number is aviailable from this api https://hinge.bosetu.org.bw/api/users


                $identity_number = $request->input('identity_number');

                $validateUser = Validator::make(
                    $request->all(),
                    [
                        'identity_number' => 'required|unique:users',
                        // 'identity_number' => 'required|unique:users',
                    ]
                );

                if ($validateUser->fails()) {
                    return response()->json([
                        'status' => false,
                        'message' => $validateUser->errors(),
                        'errors' => $validateUser->errors()
                    ], 401);
                }
                $apiUrl = env('EDUCATOR_ENDPOINT');
                $educator_request = Http::get($apiUrl);

                $educator_response = json_decode($educator_request);
                //if educator status request status is 200
                if ($educator_response) {
                    //get where identity number is equal to identity number
                    $educator = $educator_response->items;
                    $educator = array_filter($educator, function ($item) use ($identity_number) {
                        return $item->omang_passport_number == $identity_number;
                    });
                    //if educator is found
                    if (count($educator) > 0) {
                        //create user
                        $user = User::create([
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'email' => $email,
                            'username' => $first_name . $last_name,
                            'phone_number' => $phone_number,
                            'password' => Hash::make($password),
                            'user_type' => 'educator',
                            'identity_number' => $identity_number,
                            'status' => 'active',
                        ]);
                        //send verification code
                        $user->sendVerificationCode($user->generateVerificationCode());
                        //return response
                        return response()->json([
                            'status' => true,
                            'message' => 'Educator Account Created Successfully. Please Verify Your Account',
                            'user' => $user
                        ], 200);
                    } else {
                        //if educator is not found
                        return response()->json([
                            'status' => false,
                            'message' => 'Sorry it seems like you are not a registered educator with BOSETU.'
                        ], 401);
                    }
                } else {
                    //if educator status request status is not 200
                    return response()->json([
                        'status' => false,
                        'message' => 'Sorry, It seems like the service is currently unavailable. Please try again later'
                    ], 500);
                }
            } else {

                // return response()->json($request->all());

                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'username' => $request->first_name . $request->last_name,
                    'national_no' => $request->national_no,
                    'nationality' => $request->nationality,
                    'phone_number' => $request->phone_number,
                    'password' => Hash::make($request->password)
                ]);

                $user->sendVerificationCode($user->generateVerificationCode());

                return response()->json([
                    'status' => true,
                    'message' => 'User Created Successfully',
                    'user' => $user
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'status' => true,
                'message' => 'User Logged Out Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function verify_account(Request $request)
    {

        // $request->user,
        // $request->code

        try {

            $validateUser = Validator::make(
                $request->all(),
                [
                    'user' => 'required',
                    'code' => 'required|integer',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::where('email', $request->user['email'])->first();

            if ($user->otp && $user->otp == $request->code) {
                $user->email_verified_at = now();
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'User Verified Successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid Verification Code',
                ], 401);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

        return response()->json([
            $request->user
        ]);
    }

    public function resend_otp(Request $request)
    {

        try {

            $validateUser = Validator::make(
                $request->all(),
                [
                    'user' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::where('email', $request->user['email'])->first();

            $user->sendVerificationCode($user->generateVerificationCode());

            return response()->json([
                'status' => true,
                'message' => 'Verification Code Sent To Your Email',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update_profile(Request $request)
    {

        try {

            $validateUser = Validator::make(
                $request->all(),
                [
                    'phone_number' => 'required|unique:users,phone_number,' . $request->user()->id,
                    'dob' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::find($request->user()->id);
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->phone_number = $request->phone_number;

            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile Updated Successfully',
                'user' => $user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage()
                ],
                500
            );
        }
    }
}
