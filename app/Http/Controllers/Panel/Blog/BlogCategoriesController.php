<?php

namespace App\Http\Controllers\Panel\Blog;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogCategoriesController extends Controller
{

    public function listCategory()
    {
        $category = BlogCategory::all();
        return view('panel.pages.siteSettings.blog.blogCategories', compact('category'));
    }
    public function fetch(){
        //Kategorilerin listesini döndüren fonksiyon
        $patients = BlogCategory::get();
        return DataTables::of($patients)
            ->addColumn('detail', function ($data) {
                $inputs = [
                    "id" => $data->id
                ];
                return '<a class="btn btn-info" href="' . route('panel.categoryDetail', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteCategory(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['detail', 'delete'])
            ->make(true);

    }
    public function addCategory(Request $request)
    {
        // Kategori ekleme fonksiyonu (create)
        $validatedData = \Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Kategori Adı boş bırakılamaz.',
        ]);

        if (!$validatedData->fails()) {
            $security = new Security();

            $newCategory = new BlogCategory();
            $newCategory->name = $security->scriptStripper($request->name);

            // Slug kısmı boş ise rastgele bir UUID oluştur
            if (empty($request->slug_name)) {
                $newCategory->slug_name = \Illuminate\Support\Str::uuid()->toString();
            } else {
                $newCategory->slug_name = $security->scriptStripper($request->slug_name);
            }

            $newCategory->status = $security->scriptStripper($request->status);

            // Parent kategorisi belirtilmişse
            if ($request->has('parent_category')) {
                $newCategory->parent_category = $security->scriptStripper($request->parent_category);
            } else {
                $newCategory->parent_category = 0; // Ana kategori olarak işaretleniyor
            }

            $newCategory->save();

            return response()->json(['Success' => 'success']);
        } else {
            return response()->json(['Error' => $validatedData->errors()]);
        }
    }

    public function categoryDetail(Request $request){
        $data = decrypt($request->data);
        $category = BlogCategory::find($data["id"]);
        return view('panel.pages.siteSettings.blog.categoryDetail',compact('category'));
    }

    public function categoryUpdate(Request $request){
        //Kategori ekleme fonksiyonu (create)
        $validatedData = \Validator::make($request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Kategori Adı boş bırakılamaz.',
            ]
        );

        if(!$validatedData->fails()){

            $security = new Security();

            $newCategory = new BlogCategory();
            $newCategory->name = $security->scriptStripper($request->name);
            $newCategory->parent_category = $security->scriptStripper($request->parent_category);
            $newCategory->slug_name = $security->scriptStripper($request->slug_name);
            $newCategory->status = $security->scriptStripper($request->status);

            $newCategory->save();

            return response()->json(['Success' => 'success']);
        }else{
            return response()->json(['Error' => $validatedData->errors()]);
        }
    }

    function categoryDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        BlogCategory::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }

}
