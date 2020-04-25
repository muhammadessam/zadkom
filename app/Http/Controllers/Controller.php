<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeFile($requestFileName, $userId)
    {
        $fileName = time() . request()->file($requestFileName)->getClientOriginalName();
        $path = request()->file($requestFileName)->move(public_path('Profiles/') . $userId . '/', $fileName);
        return '/Profiles/' . $userId . '/' . $fileName;
    }
}
