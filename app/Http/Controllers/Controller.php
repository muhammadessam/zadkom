<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeFile($folderName, $requestFileName, $userId)
    {
        $fileName = time() . request()->file($requestFileName)->getClientOriginalName();
        request()->file($requestFileName)->move(public_path("/$folderName/") . $userId . '/', $fileName);
        return "/$folderName/" . $userId . '/' . $fileName;
    }

}
