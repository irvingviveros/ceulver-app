<?php
declare(strict_types = 1);

namespace App\Upload\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Infrastructure\TemporaryFile\Model\TemporaryFile;


class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->header("_method") === 'DELETE') {

            $temporaryFolder = TemporaryFile::pluck('folder')->last(); //TODO: modificar esto porque no va a funcionar
            $path = 'app/public/resumes/tmp/' . $temporaryFolder;
            Storage::disk('local')->deleteDirectory($path);
            $temporaryFile = TemporaryFile::where('folder', $temporaryFolder);
            $temporaryFile->delete();
        } else {

            if ($request->hasFile('resume')) {

                $file = $request->file('resume');
                $filename = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp;
                $file->storeAs('public/resumes/tmp/' . $folder, $filename);

                TemporaryFile::create([
                    'folder' => $folder,
                    'filename' => $filename
                ]);

                return $folder;
            }
        }

        return '';
    }
}
