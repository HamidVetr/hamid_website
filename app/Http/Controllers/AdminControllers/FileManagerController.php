<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class FileManagerController extends Controller
{
    public function index($slug = null)
    {
        $current_path_array = explode('/', Route::getCurrentRequest()->path());
        array_pop($current_path_array);
        $previous_folder = implode('/', $current_path_array);
        if (!is_null($slug)) {
            $parent_folder_id = $this->getPreviousFolder('file_manager/' . $slug);
//            $folder_tree = explode('/', $slug);
//            $parent_folder = end($folder_tree);
//            $checked_ids = [];
//            do {
//                $prev_folder = Folder::with('parents')
//                    ->where('current_name', $parent_folder)
//                    ->select('id', 'parent_folder_id');
//
//                if (!empty($checked_ids)){
//                    $prev_folder->whereNotIn('id', $checked_ids);
//                }
//
//                $prev_folder = $prev_folder->first();
//
//                $checked_ids[] = $prev_folder->id;
//
//                $path_array = [];
//                do {
//                    $path_array[] = $prev_folder->current_name;
//                    $prev_folder = $prev_folder->parents;
//                } while (!is_null($prev_folder));
//
//            }while(implode('/', array_reverse($path_array)) . $parent_folder != Route::getCurrentRequest()->path());
//
//            $parent_folder_id = end($checked_ids);
        }else{
            $parent_folder = Folder::where('current_name', 'file_manager')->first();
            if (!is_null($parent_folder)){
                $parent_folder_id = $parent_folder->id;
            }
        }

        if (isset($parent_folder_id)) {
            $folders = Folder::with(['createdBy', 'updatedBy', 'files'])->where('parent_folder_id', $parent_folder_id)->get();
            $files = File::with(['createdBy', 'updatedBy'])->where('folder_id', $parent_folder_id)->get();
        }else{
            $folders = collect();
            $files = collect();
        }
        return view('file_manager.index', compact('folders', 'previous_folder', 'files'));
    }

    public function store(Request $request)
    {
        $input = trim($request->all()['new_folder'], ' \\/');
        $folders = explode('/', $input);

        $folders = array_map(function ($folder){
            return strtolower($folder);
        }, $folders);

        if ($this->checkPath('file_manager')){
            Folder::create([
                'current_name' => 'file_manager',
                'created_by' => auth()->user()->id,
            ]);
            mkdir(storage_path('app\\public\\file_manager'));
        }

        $path = 'app\\public\\file_manager';
        foreach ($folders as $folder){
            $prev_folder_id = $this->getPreviousFolder($path);
            $path .= '\\' . $folder;
            if ($this->checkPath($path)){
                Folder::create([
                    'current_name' => $folder,
                    'created_by' => auth()->user()->id,
                    'parent_folder_id' => $prev_folder_id,
                ]);
                Folder::findOrFail($prev_folder_id)->increment('number_of_files');
                mkdir(storage_path($path));
            }
        }

        return redirect(route('file_manager.index'));
    }

    /**
     * true means the folder does not exists
     *
     * @param string $path [required]
     * @return bool
     */
    private function checkPath($path)
    {
        return !file_exists(storage_path('app\\public\\' . $path)) && !is_dir(storage_path('app\\public\\' . $path));
    }

    /**
     * get previous folder id
     *
     * @param string $path [required]
     * @return integer
     */
    private function getPreviousFolder($path)
    {
        $path_array = explode('\\', $path);
        $prev_folder_name = end($path_array);
        $checked_ids = [];
        do {
            $prev_folder = Folder::with('parents')
                ->where('current_name', $prev_folder_name)
                ->select('id', 'parent_folder_id');

            if (!empty($checked_ids)){
                $prev_folder->whereNotIn('id', $checked_ids);
            }

            $prev_folder = $prev_folder->first();

            $checked_ids[] = $prev_folder->id;

            $path_array = [];
            do {
                $path_array[] = $prev_folder->current_name;
                $prev_folder = $prev_folder->parents;
            } while (!is_null($prev_folder));
        }while('app\\public\\' . implode('\\', array_reverse($path_array)) . $prev_folder_name != $path);

        return end($checked_ids);
    }

    public function upload(Request $request)
    {
        $path = 'app\\public\\' . trim($request->all()['path'], ' \\/');
        $prev_folder_id = $this->getPreviousFolder($path);

        if($file = $request->file('file')){
            $name = time() . $file->getClientOriginalName();
            $size = (int) round($file->getSize() / 1024);
            $file->move(storage_path($path), $name);
            File::create([
                'folder_id'    => $prev_folder_id,
                'current_name' => $name,
                'size'         => $size,
                'created_by'   => auth()->user()->id,
                'path'         => $path,
            ]);
            $folder = Folder::findOrFail($prev_folder_id);
            $folder->update([
                'number_of_files' => ++$folder->number_of_files,
                'size' => $size + $folder->size,
            ]);
        }
    }
}