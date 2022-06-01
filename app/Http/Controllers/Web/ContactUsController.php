<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ContactUsMessage;

class ContactUsController extends Controller
{

    public function create() {

        return view('web.contact_us.create');
    }

    public function store(Request $request) {

        if (\Auth::check()) {

            return $this->createAuthMsg($request);
        }

        return $this->createGuestMsg($request);
    }


    protected function createAuthMsg($request) {

        $request->validate([
            'body' => 'required',
        ]);

        $message = new ContactUsMessage();

        $userId = \Auth::user()->id;

        $message->user_id = $userId;
        $message->body = $request->body;

        return $message->save() ?
            redirect()->route('home')->with('alert', 'تم إرسال رسالتك بنجاح, سوف يتم الرد عليها من قبل الأدمن') :
            redirect()->route('home')->with('alert', 'عفوًا لم يتم إريال الرسالة, برجاء المحاولة لاحقًا')->withInput();

    }

    protected function createGuestMsg($request) {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'body' => 'required',
        ]);

        $message = new ContactUsMessage();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->body = $request->body;

        return $message->save() ?
            redirect()->route('home')->with('alert', 'تم إرسال رسالتك بنجاح, سوف يتم الرد عليها من قبل الأدمن') :
            redirect()->route('home')->with('alert', 'عفوًا لم يتم إريال الرسالة, برجاء المحاولة لاحقًا')->withInput();
    }
}
