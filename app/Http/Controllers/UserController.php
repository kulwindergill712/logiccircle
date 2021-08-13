<?php

namespace App\Http\Controllers;

use App\Product;
use App\Traits\goteso;
use App\User;
use App\UserProducts;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use goteso;
    public function signup()
    {
        return view('signup');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'product' => 'required|exists:products,id',
            'password' => 'required',
        ], [], []);
        if ($validator->fails()) {
            return $this->kFailed($validator->errors()->first());
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        // if we have multple choose product but o dont get classfiractaon from the sheet how to buid logic

        $product['product_id'] = $request->product;
        $product['product_name'] = Product::where('id', $product)->first()->product_name;
        $product['user_id'] = $user->id;
        UserProducts::create($product);

        $user['email'] = $user->email;
        $user['name'] = $user->name;
        $user['product_name'] = $product['product_name'];

        $this->sendmail($user);

        return view('welcome1', ['name' => $user->name, 'product' => $product['product_name']]);
    }
    public function sendmail($user, $body = null)
    {
        $name = $user['name'];
        $email = $user['email'];
        $product = $user['product_name'];

        $path = public_path();
        $ext = 'pdf';
        $name = 'pdf' . time() . '.' . $ext;
        $download = env('APP_URL') . '/download?file=' . $name;
        $details = [
            'body' => "Hello " . $name . "!
            Thank you for signing up for " . $product . ". We're really happy to have you! Click the link below to login to your account:",
            'name' => 'welcome To  ' . $product,
            'link' => $download,
        ];

        $pdf = PDF::setPaper('a4', 'potrait')->loadView('email', $details);

        Storage::put($name, $pdf->output());

        Mail::send('email', $details, function ($message) use ($email) {

            $title = 'From logic circle';
            $message->to($email)->subject($title);
            $message->from('logiccircle@gmail.com', 'Logic');

        });
    }

    public function download(Request $request)
    {
        $file = storage_path() . '/app/' . $request->file;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, 'logiccircle.pdf', $headers);
    }

}
