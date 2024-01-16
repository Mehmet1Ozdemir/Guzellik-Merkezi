<?php

namespace App\Http\Controllers\Panel\Blog;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contacts;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function fetch() {
        //Blog sayfası listesini döndüren fonksiyon
        $blogs = Blog::get();
        return DataTables::of($blogs)
            ->editColumn('image',function ($data){
                return "<img width='100' src='$data->image' />";
            })
            ->addColumn('detail', function ($data) {
                return '<a class="btn btn-info" href="' . route('panel.blogDetail', ['id'=>$data->id]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteBlog(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addIndexColumn()
            ->rawColumns(['image' ,'detail', 'delete'])
            ->make(true);
    }

    public function listBlog()
    {
        $blog = Blog::all();
        return view('panel.pages.siteSettings.blog.blogList', compact('blog'));
    }

    public function listBlogAdd()
    {
        return view('panel.pages.siteSettings.blog.blogCreate');
    }

    public function listBlogUpdate(Request $request)
    {   $dentists = Dentist::select('id', 'name', 'surname')->get();
        $categories = BlogCategory::select('id', 'name')->get();
        $blog = Blog::find($request->id);
        return view('panel.pages.siteSettings.blog.blogUpdate', compact('blog', 'dentists','categories'));
    }

    // doktorun giriş yaptığı ve dentist_id göre listeleme yapılmak istenirse kullanılabilecek listeleme fonksiyonu
    public function getBlogList()
    {
        $dentistId = auth()->user()->dentist_id;
        $bloglar = Blog::where('dentist_id', $dentistId)->get();
        $blog = Blog::get();
        return view('panel.pages.siteSettings.blog.blogList', compact('bloglar', 'dentistId', 'blog'));
    }

    // kategorileri döndüren işlev
    public function getCategories()
    {
        $categories = BlogCategory::select('id', 'name')->get();
        return response()->json($categories);
    }

    // doktorları döndüren işlev
    public function getDentists()
    {
        $dentists = Dentist::select('id', 'name', 'surname')->get();
        return response()->json($dentists);
    }

    public function blogAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'dentist_id' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'title.required' => 'Başlık alanı boş bırakılamaz.',
            'dentist_id.required' => 'Doktor alanı boş bırakılamaz.',
            'category_id.required' => 'Kategori alanı boş bırakılamaz.',
            'image.image' => 'Geçerli bir resim dosyası yükleyin.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('panel.listBlogAdd')->withInput()->with('error',$validator->errors()->first());
        }

                $security = new Security();

                $blog = new Blog();

                $blog->title = $security->scriptStripper($request->title);
                $blog->slug = $security->scriptStripper($request->slug) ?? Str::uuid()->toString();
                $blog->dentist_id = $security->scriptStripper($request->dentist_id);
                $blog->category_id = $security->scriptStripper($request->category_id);
                $blog->description = $request->description;
                $blog->status = $security->scriptStripper($request->status);

                if ($request->hasFile('image')) {
                    $validator = Validator::make($request->all(), [
                        'image' => 'image',
                    ]);

                    if ($validator->fails()) {
                        return response()->json(['errors' => $validator->errors()], 400);
                    }

                    $isDoc = Security::isImage($request->image);
                    if ($isDoc['status'] != "ok") {
                        return abort(500);
                    }

                    $imageName = time() . rand(0, 100) . '.' . $request->image->getClientOriginalExtension();
                    $imagePath = public_path('images/blogs/');
                    $request->image->move($imagePath, $imageName);
                    $blog->image = '/images/blogs/' . $imageName;
                }

                $blog->save();

        return redirect()->route('panel.getBlogList')->with('success',"Kayıt oluşturuldu.");
    }




    public function update(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'nullable|image',
            'blogID' => 'required'
        ], [
            'title.required' => 'Başlık alanı boş bırakılamaz.',
            'image.image' => 'Geçerli bir resim dosyası yükleyin.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $security = new Security();

        $blog = Blog::find($request->blogID);
        if (!$blog) {
            return response()->json(['error' => 'Blog bulunamadı.'], 404);
        }

        $blog->title = $security->scriptStripper($request->title);
        $blog->dentist_id = $security->scriptStripper($request->dentist_id);
        $blog->category_id = $security->scriptStripper($request->category_id);
        $blog->description = $security->scriptStripper($request->description);
        $blog->status = $security->scriptStripper($request->status);

        if ($request->hasFile('image')) {
            $validator = \Validator::make($request->all(), [
                'image' => 'image',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $isDoc = Security::isImage($request->image);
            if ($isDoc['status'] != "ok") {
                return abort(500);
            }

            if ($blog->image) {
                // Eski resmi unlink et
                $imagePath = public_path($blog->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imageName = time() . rand(0, 100) . '.' . $request->image->getClientOriginalExtension();
            $imagePath = public_path('images/blogs/');
            $request->image->move($imagePath, $imageName);
            $blog->image = '/images/blogs/' . $imageName;
        }

        $blog->save();

        return response()->json(['success' => 'Blog güncellendi.']);
    }


    public function blogDetail(Request $request){
        $dentists = Dentist::select('id', 'name', 'surname')->get();
        $categories = BlogCategory::select('id', 'name')->get();
        $blog = Blog::find($request->id);
        return view('panel.pages.siteSettings.blog.blogDetail',compact('blog', 'dentists', 'categories'));

    }

    public function deleteBlog(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:blogs,id',
        ]);

        try {
            DB::beginTransaction();

            $blog = Blog::findOrFail($request->id);
            $categoryId = $blog->category_id;

            // İlgili blogu sil
            $blog->delete();
            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Blog silinirken bir hata oluştu.']);
        }
        return response()->json(['success' => 'Blog başarıyla silindi.']);

    }





}
