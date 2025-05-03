<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.subscribers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|unique:subscribers,email',
            'address' => 'required|string|max:250',
            'phone' => 'required|string|max:15',
        ]);

        Subscriber::create($validated);
        return redirect()->route('subscribers.index')->with('success', 'Subscriber added.');
    }

    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    public function update(Request $request, Subscriber $subscriber)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:subscribers,email,' . $subscriber->id,
            'address' => 'required|string|max:250',
            'phone' => 'required|string|max:15',
        ]);

        $subscriber->update($validated);
        return redirect()->route('subscribers.index')->with('success', 'Subscriber updated.');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted.');
    }
}
