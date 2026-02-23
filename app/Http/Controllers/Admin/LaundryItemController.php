<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaundryItemController extends Controller
{
    public function ItemIndex()
    {
        return view('items.create');
    }

    public function ItemCreate(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'pices' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);


    }

    public function ItemList()
    {

    }

    public function ItemEdit($id)
    {

    }

    public function ItemUpdate(Request $request, $id)
    {


    }

    public function ItemDelete($id)
    {

    }

    public function itemImport(Request $request)
    {

    }

    public function itemexport()
    {

    }

    public function item_search(Request $request)
    {

    }
}
