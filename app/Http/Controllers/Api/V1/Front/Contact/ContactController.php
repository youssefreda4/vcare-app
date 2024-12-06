<?php

namespace App\Http\Controllers\Api\V1\Front\Contact;

use App\Models\Admin;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MessageNotification;
use App\Http\Requests\Api\V1\Front\Contact\ContactRequest;

class ContactController extends Controller
{
    public function sendMessage(ContactRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new MessageNotification($message));
        }

        return response()->json([
            'message' => 'Message send successfully'
        ]);
    }
}
