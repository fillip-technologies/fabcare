<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetWeigthPriceController extends Controller
{
    public function setindex()
    {

        return view('setlaundryprices.index', compact('datas'));
    }

    public function setfroms()
    {
        return view('setlaundryprices.create');
    }

    public function setstore(Request $request) {}

    public function setedit($id)
    {

        return view('setlaundryprices.edit', compact('data'));
    }

    public function setupdate(Request $request, $id) {}

    public function setdelete($id) {}

    public function getvalue(Request $request) {}

    public function weigthinvform()
    {
        return view('setlaundryprices.weightinvoice');
    }
}
