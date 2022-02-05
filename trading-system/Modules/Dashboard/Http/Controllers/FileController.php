<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\File as FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{

    public function __construct()
    {
    }


    public function index($rel_type, $rel_id)
    {
        $items = FileModel::where('rel_type', $rel_type)->where('rel_id', $rel_id)->get();

        if ($items) {
            return response()->json([ 'model' => $items, 'access' => true]);
        };

        return response()->json([ 'access' => false ]);
    }


    public function upload(Request $request)
    {
        $logged = auth()->user();
        if($request->hasFile('file'))
        {
            $returnFile = uploadFiles($request->file('file'), 'images', true);

            if (count($returnFile) > 0) {

                $item = new FileModel();
                $item->user_id = auth()->user()->id;
                $item->rel_id   = $request->rel_id;
                $item->rel_type = $request->rel_type;
                $item->name     = $returnFile[0]['name'];
                $item->mime_type = $returnFile[0]['mime_type'];

                if($item->save()) {
                    return ['success' => true, 'id' => $item->id, 'name' => $item->name, 'mime_type' => $item->mime_type ];
                }

            }

        }

        return ['success' => false ];

    }


    public function destroy(Request $request)
    {
        $this->validate($request, [
            'file_id'  => 'required',
        ]);
        $file = FileModel::find($request->file_id);
        if($file) {
            $filename = public_path()."/uploads/".$file->name;
            if($file->delete()) {
                if( File::exists($filename)) {
                    unlink($filename);
                }
                return ['success' => true ];
            }
        }
        return ['success' => false ];
    }


    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('uploads'),$imageName);
        
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }
}
