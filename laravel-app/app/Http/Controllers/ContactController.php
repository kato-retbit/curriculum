<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        return view('contact.thanks', ['name' => $validated['name']]);
    }
}
