<?php

namespace App\Http\Controllers\Panel\Stocks;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\StockProducts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class StockProductsController extends Controller
{
    public function stockList(){
        return view('panel.pages.stocks.stocksList');
    }

    public function stockFetch(){
        //stok listesini döndüren fonksiyon
        $stocks = StockProducts::where('deleted_at',NULL)->get();
        return DataTables::of($stocks)
            ->addColumn('detail', function ($data) {
                $inputs = [
                    "id" => $data->id
                ];
                return '<a class="btn btn-info" href="' . route('panel.stocksDetail', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteStock(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['detail', 'delete'])
            ->make(true);
    }

    public function stockAdd(Request $request){
        //Stok ekleme fonksiyonu (create)
        $validatedData = Validator::make($request->all(),[
                'name' => 'required',
            ],[
                'name.required' => 'Stok Adı boş bırakılamaz.',
            ]
        );

        if(! $validatedData->fails()){

            $security = new Security();

            $stock = new StockProducts();
            $stock->name = $security->scriptStripper($request->name);

            $stock->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => $validatedData->errors()]);
        }

    }

    public function stockDetail(Request $request){

        $data = decrypt($request->data);

        $stock = StockProducts::find($data["id"]);
        return view('panel.pages.stocks.stocksDetail',compact('stock'));

    }

    public function stockUpdate(Request $request){
        //Stok güncelleme fonksiyonu


        $validatedData = $request->validate([
            'name' => 'required',
            'stockID' => 'required'
            ],[
                'name.required' => 'Hasta Adı boş bırakılamaz.',
            ]
        );

        if($validatedData){

            $security = new Security();

            $stock = StockProducts::find($request->stockID);
            $stock->name = $security->scriptStripper($request->name);

            $stock->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }


    }

    function stockDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);

        $stock = StockProducts::find($request->id);
        $stock->deleted_at = now();

        $stock->save();
        return response()->json(['Success' => 'success']);
    }
}
