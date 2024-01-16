<?php

namespace App\Http\Controllers\Panel\Stocks;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\ProductTransactions;
use App\Models\StockProducts;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Psr\Log\NullLogger;
use Yajra\DataTables\DataTables;

class StockTransactions extends Controller
{
    public function stockTransactionFetch($id){
        //İşlemlerin listesini döndüren fonksiyon
        $transactions = ProductTransactions::where('product_id',$id)->where('deleted_at',NULL)->get();

        return DataTables::of($transactions)
            ->editColumn('transaction_type', function ($data) {
                if($data->transaction_type == 0){
                    return "Alma";
                }
                return "Harcama";
            })
            ->editColumn('price', function ($data) {
                if($data->price){
                    return $data->price;
                }
                return "-";
            })
            ->addColumn('delete', function ($data) {
                $inputs = [
                    'transaction_id' => $data->id,
                    'stock_id' => $data->product_id,
                ];
                return '<a class="btn btn-danger" href="' . route('panel.stockTransactionDelete', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Sil</a>';
            })
            ->addIndexColumn()
            ->rawColumns(['transaction_type','price','delete'])
            ->make(true);

    }


    public function stockTransactionAdd(Request $request){
        //İşlem ekleme fonksiyonu
        $validatedData = $request->validate([
            'stock_id' => 'required',
            'transaction_type' => 'required',
            'amount' => 'required',
        ],
            [
                'transaction_type.required' => 'İşlem türü boş bırakılamaz.',
                'amount.required' => 'Adet alanı boş bırakılamaz.',
            ]
        );

        if($validatedData){

            $security = new Security();

            $transaction = new ProductTransactions();
            $transaction->product_id = $security->scriptStripper($request->stock_id);
            $transaction->transaction_type = $security->scriptStripper($request->transaction_type);
            $transaction->amount = $security->scriptStripper($request->amount);
            $transaction->price = $security->scriptStripper($request->price);

            $stock = StockProducts::find($request->stock_id);

            if ($request->transaction_type == 1 && $stock->used_stock < $request->amount) {
                throw ValidationException::withMessages([
                    'amount' => 'Stokta harcanmak istenden az miktarda ürün bulunmaktadır!',
                ]);
            }
            $transaction->save();

            $stock->total_spent += $security->scriptStripper($request->price);

            if($request->transaction_type == 0){
                $stock->current_stock += $stock->current_stock + $security->scriptStripper($request->amount);
            }else{
                $stock->current_stock -= $security->scriptStripper($request->amount);
                $stock->used_stock += $security->scriptStripper($request->amount);
            }
            $stock->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => 'error']);
        }

    }

    function stockTransactionDelete(Request $request)
    {
        $data = $request->data;
        $decryptedData = decrypt($data);

        $transaction = ProductTransactions::find($decryptedData['transaction_id']);
        $transaction->deleted_at = now();

        $stock = StockProducts::find($decryptedData['stock_id']);

        $stock->total_spent -= $transaction->price;

        if($transaction->transaction_type == 0){
            $stock->current_stock -= $transaction->amount;
        }else{
            $stock->current_stock += $transaction->amount;
            $stock->used_stock -=  $transaction->amount;
        }
        $stock->save();

        $transaction->save();

        return redirect()->back()->with('success', 'Silme işlemi Başarılı!');

    }
}
