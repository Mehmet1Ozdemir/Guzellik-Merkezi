<?php

namespace App\Http\Controllers\Panel;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use function PHPUnit\Framework\directoryExists;

class GalleryController extends Controller
{
    public function galleryList()
    {
        return view('panel.pages.gallery.galleryList');
    }


    public function galleryFetch()
    {

        $images = Gallery::where('status', 1)->get();
        return DataTables::of($images)
            ->addIndexColumn()
            ->addColumn('detail', function ($data) {
                $inputs = [
                    "id" => $data->id
                ];
                return '<a class="btn btn-info" href="' . route('panel.galleryDetail', ["data" => Security::encryptInputs($inputs)]) . '">' . 'Detay</a>';
            })
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteGallery(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . $data->image . '" width="95px"/>';
            })
            ->rawColumns(['delete', 'detail'])
            ->make(true);

    }

    public function galleryAdd()
    {
        return view('panel.pages.gallery.createPhoto');
    }

    public function galleryCreate(Request $request)
    {

        //Galleri ekleme fonksiyonu (create)
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',

        ],
            [
                'title.required' => 'Galeri Açıklaması boş bırakılamaz.',
                'image.required' => 'Fotoğraf boş bırakılamaz.',
                'image.mimes' => 'Fotoğraf jpg,jpeg,png formatında olmalıdır.',
                'image.max' => 'Fotoğraf en fazla 2mb olabilir.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('panel.galleryAdd')->withInput()->with('error', $validator->errors());
        }

        $gallery = new Gallery();
        $gallery->title = Security::scriptStripper($request->title);
        $gallery->status = Security::scriptStripper($request->status);
        $gallery->authorized_id = Auth::id();


        $gallery->save();

        if ($request->image) {
            if (Security::isImage($request->image)["status"] != "ok") {
                return redirect()->route('panel.galleryAdd')->with('error', "Fotoğraf doğru formatta değil.");
            }

            if (!directoryExists(public_path() . '/galleryPictures/')) {
                mkdir(public_path() . '/galleryPictures/', 0777, true);
                if (!directoryExists(public_path() . '/galleryPictures/' . $gallery->id)) {
                    mkdir(public_path() . '/galleryPictures/' . $gallery->id, true);
                }
            }
            $imageName = time() . rand(0, 100) . "." . $request->image->getClientOriginalExtension();
            $gallery->image = '/galleryPictures/' . $gallery->id . "/" . $imageName;
            $gallery->save();
            $path = '/galleryPictures/' . $gallery->id;
            $request->image->move(public_path($path), $imageName);
        }

        return redirect()->route('panel.galleryList')->with('success', "Kayıt oluşturuldu.");
    }

    function galleryDelete(Request $request)
    {

        $request->validate([
            'id' => 'distinct'
        ]);
        $gallery = Gallery::find($request->id);
        $gallery->delete();

        return response()->json(['Success' => 'success']);
    }


    public function galleryDetail(Request $request)
    {

        $data = $request->data;
        $decryptedData = decrypt($data);
        $gallery = Gallery::find($decryptedData['id']);


        return view('panel.pages.gallery.updatePhoto', compact('gallery', 'data'));
    }


    public function galleryUpdate(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            "image" => "required|mimes:jpg,jpeg,png|max:2048"
        ],
            [
                'title.required' => 'Galeri Açıklaması boş bırakılamaz.',
                'image.required' => 'Fotoğraf boş bırakılamaz.',
                'image.mimes' => 'Fotoğraf jpg,jpeg,png formatında olmalıdır.',
                'image.max' => 'Fotoğraf en fazla 2mb olabilir.',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('panel.galleryDetail')->withInput()->with('error', $validator->errors());
        }
        $data = $request->data;
        $galleryId = decrypt($data);
        $gallery = Gallery::find($galleryId['id']);
        $gallery->title = Security::scriptStripper($request->title);
        $gallery->status = Security::scriptStripper($request->status);
        $gallery->authorized_id = Auth::id();


        $gallery->update();
        if ($request->image) {

            if (Security::isImage($request->image)["status"] != "ok") {
                return redirect()->route('panel.galleryList', compact('data'))->with('error', "Fotoğraf doğru formatta değil.");
            }

            unlink(public_path($gallery->image));

            if (!directoryExists(public_path() . '/profilePictures/')) {
                mkdir(public_path() . '/profilePictures/', 0777, true);
                if (!directoryExists(public_path() . '/profilePictures/' . $gallery->id)) {
                    mkdir(public_path() . '/profilePictures/' . $gallery->id, true);
                }
            }
            $imageName = time() . rand(0, 100) . "." . $request->image->getClientOriginalExtension();
            $gallery->image = '/profilePictures/' . $gallery->id . "/" . $imageName;
            $gallery->save();
            $path = '/profilePictures/' . $gallery->id;
            $request->image->move(public_path($path), $imageName);
        }

        return redirect()->route('panel.galleryList', compact('data'))->with('success', "Kayıt oluşturuldu.");
    }

}
