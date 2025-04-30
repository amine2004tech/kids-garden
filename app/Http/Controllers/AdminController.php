<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Letter;
use App\Models\Number;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->is_admin = true;
        $user->save();
        return back()->with('success', 'User has been made an admin.');
    }

    public function removeAdmin(User $user)
    {
        if ($user->id !== auth()->id()) {
            $user->is_admin = false;
            $user->save();
            return back()->with('success', 'Admin privileges have been removed.');
        }
        return back()->with('error', 'You cannot remove your own admin privileges.');
    }

    public function content()
    {
        return view('admin.content');
    }

    public function addLetter(Request $request)
    {
        $request->validate([
            'letter' => 'required|string|size:1',
            'voice' => 'required|file|mimes:mp3,wav',
        ]);

        $voicePath = $request->file('voice')->store('voices', 'public');

        Letter::create([
            'letter' => strtoupper($request->letter),
            'voice' => $voicePath,
        ]);

        return response()->json(['message' => 'Letter added successfully']);
    }

    public function deleteLetter($id)
    {
        $letter = Letter::findOrFail($id);
        Storage::disk('public')->delete($letter->voice);
        $letter->delete();
        return response()->json(['message' => 'Letter deleted successfully']);
    }

    public function addNumber(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|min:1|max:20',
            'stars' => 'required|integer|min:1|max:5',
            'voice' => 'required|file|mimes:mp3,wav',
        ]);

        $voicePath = $request->file('voice')->store('voices', 'public');

        Number::create([
            'number' => $request->number,
            'stars' => $request->stars,
            'voice' => $voicePath,
        ]);

        return response()->json(['message' => 'Number added successfully']);
    }

    public function deleteNumber($id)
    {
        $number = Number::findOrFail($id);
        Storage::disk('public')->delete($number->voice);
        $number->delete();
        return response()->json(['message' => 'Number deleted successfully']);
    }

    public function addColor(Request $request)
    {
        $request->validate([
            'color' => 'required|string',
            'code' => 'required|string',
        ]);

        Color::create([
            'color' => $request->color,
            'code' => $request->code,
        ]);

        return response()->json(['message' => 'Color added successfully']);
    }

    public function deleteColor($id)
    {
        Color::findOrFail($id)->delete();
        return response()->json(['message' => 'Color deleted successfully']);
    }
}
