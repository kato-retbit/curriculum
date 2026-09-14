<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // ログイン機能が未実装のため、暫定的に固定ユーザーを編集対象とする(設計書の「実装方針(簡易版)」参照)
    private const FIXED_USER_ID = 1;

    public function show()
    {
        return view('profile.show', ['user' => $this->currentUser()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => $this->currentUser()]);
    }

    public function update(Request $request)
    {
        $user = $this->currentUser();

        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('profile.show')->with('success', 'プロフィールを更新しました');
    }

    private function currentUser(): User
    {
        return User::findOrFail(self::FIXED_USER_ID);
    }
}
