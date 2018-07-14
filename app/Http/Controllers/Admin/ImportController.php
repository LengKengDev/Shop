<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Option;
use App\Product;
use App\Value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class ImportController extends Controller
{
    public function create()
    {
        return view('admin.import.create');
    }

    public function store(Request $request)
    {
        $sum = 0;

        if($request->hasFile('file')) {
            $path=$request->file('file')->getRealPath();
            $data = Excel::load($path)->get();

            foreach ($data as $key => $value) {
                if (is_null($value['ma_san_pham'])) {
                    continue;
                }

                $p = Product::where('sku', $value['ma_san_pham'])->first();

                if (!is_null($p)) {
                    continue;
                }

                $cate = Category::firstOrCreate(['name' => $value['menu_lon']], ['description' => $value['menu_lon']]);
                $sub = $cate->childs()->firstOrCreate(['name' => $value['menu_nho']], ['description' => $value['menu_nho']]);

                $product = Product::create([
                    'sku' => $value['ma_san_pham'],
                    'name' => $value['ten_san_pham'],
                    'status' => 'inStock',
                    'price' => (int) $value['gia'] ?? 0,
                    'sale_price' => (int) $value['gia_sale'] ?? 0,
                    'unit' => $value['don_vi_tinh'] ?? 'Cái',
                    'minimum_unit' => (int) $value['so_luong_mua_toi_thieu'] ?? 1,
                    'qty_per_unit' => (int) $value['so_luong_mua_moi_lan_tang'] ?? 1,
                    'summary' => $value['mo_ta_san_pham'],
                    'description' => $value['mo_ta_san_pham'],
                ]);

                $product->categories()->sync([$sub->id]);

                $sum++;

                if ($value['ten_option1'] != null) {
                    $option = Option::create(['product_id' => $product->id, 'name' => $value['ten_option1']]);

                    foreach (explode("\n", $value['gia_tri_option1']) as $v) {
                        $newValue = Value::create(['value' => $v, 'option_id' => $option->id]);
                    }
                }

                if ($value['ten_option2'] != null) {
                    $option = Option::create(['product_id' => $product->id, 'name' => $value['ten_option2']]);

                    foreach (explode("\n", $value['gia_tri_option2']) as $v) {
                        $newValue = Value::create(['value' => $v, 'option_id' => $option->id]);
                    }
                }

                if ($value['anh'] == null) {
                    $product->addMediaFromUrl('http://via.placeholder.com/400x600')
                        ->toMediaCollection('images');
                } else {
                    foreach (explode("\n", $value['anh']) as $url) {
                        if(filter_var($url, FILTER_VALIDATE_URL)) {
                            $product->addMediaFromUrl($url)
                                ->toMediaCollection('images');
                        }
                    }
                }

            }
        }
        toastr()->success(__("Import success! :sum product(s) added", ['sum' => $sum]));
        return back();
    }
}
