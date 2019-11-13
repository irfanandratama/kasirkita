<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CategoryProduct;
use Auth;

class CategoryProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
        
    }
    
    public function index()
    {
        $bisnis = Auth::user()->business_id;
        $category_product = CategoryProduct::where('business_id', $bisnis)->orderBy('name', 'asc')->get();
        return view('management.product.kategori.index',
            compact(
                'category_product'
            ));
    }

    public function create()
    {
        return view('management.product.kategori.create');
    }

    public function store(Request $request)
    {
        $business_id = auth()->user()->business_id;

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255'
        ]);

        $category = new CategoryProduct();
        $category->name = $request->get('name');
        $category->business_id = $business_id;
        $category->save();

        \Session::flash('success', 'Berhasil Menambahkan Kategori');
        return redirect(route('management-category-product.index'));
    }

    public function delete($id)
    {
        $kategori = CategoryProduct::where('id', $id)->first();

        if(!$kategori){
            \Session::flash('danger', 'Data tidak ditemukan');
            return redirect(route('management-category-product.index'));
        }

        $kategori->delete();

        \Session::flash('danger', 'Data Dihapus');
        return redirect(route('management-category-product.index'));
    }

    public function edit($id)
    {
        $kategori = CategoryProduct::where('id', $id)->first();
        return view('management.product.kategori.edit',
            compact(
                'kategori'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $kategori = CategoryProduct::where('id', $id)->first();

        $this->validate($request, [
            'name' => 'required', 'string', 'max:255'
        ]);

        $kategori->name = $request->get('name');
        $kategori->save();

        \Session::flash('success', 'Data Berhasil Disimpan');
        return redirect(route('management-category-product.index'));
    }
}
