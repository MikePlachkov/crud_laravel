<?php

namespace App\Http\Controllers;

use App\Models\TestUser;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        $contacts = TestUser::all();
        return view ('index')->with('contacts', $contacts);
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        TestUser::create($input);
        return redirect('contact')->with('flash_message', 'Пользователь добавлен');
    }


    public function show($id)
    {
        $contact = TestUser::find($id);
        return view('show')->with('contacts', $contact);
    }


    public function edit($id)
    {
        $contact = TestUser::find($id);
        return view('edit')->with('contacts', $contact);
    }


    public function update(Request $request, $id)
    {
        $contact = TestUser::find($id);
        $input = $request->all();
        $contact->update($input);
        return redirect('contact')->with('flash_message', 'Данные обновлены');
    }


    public function destroy($id)
    {
        TestUser::destroy($id);
        return redirect('contact')->with('flash_message', 'Contact deleted!');
    }
}
