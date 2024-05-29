<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\Contact\StoreRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactStoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();

        $message = Message::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
        ]);

        Mail::raw($message->message, function ($msg) use ($message) {
            $msg->to(config('mail.from.address'))
                ->subject('New Contact Message')
                ->from($message->email, $message->name);
        });

        return redirect()->route('photo.index');
    }
}
