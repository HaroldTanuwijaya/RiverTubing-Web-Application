<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;


class PostController extends Controller
{
    use App\Models\UserInput;
    use Illuminate\Http\Request;
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'text' => 'required',
            'date' => 'required|date',
        ]);
    
        UserInput::create($validatedData);
    
        return redirect()->route('user-input.create')->with('success', 'Input saved successfully!');
    }

}