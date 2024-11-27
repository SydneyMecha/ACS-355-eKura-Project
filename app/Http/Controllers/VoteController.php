<?php

namespace App\Http\Controllers;

use http\Env\Request;

class VoteController
{
    public function store(Request $request): void
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        $user = new User;
        $user->photo = 'images/' . $imageName;
        $user->save();

        // ...
    }
}
