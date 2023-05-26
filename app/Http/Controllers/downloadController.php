<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class downloadController extends Controller
{
    public function download($id){
        $data = DB::table('office_orders')->where('id', $id)->first();
        $filepath = storage_path("app/public/{$data->upload}");
        return Response()->download($filepath);
    }
    public function downloadmemo($id){
        $data = DB::table('office_memos')->where('id', $id)->first();
        $filepath = storage_path("app/public/{$data->upload}");
        return Response()->download($filepath);
    }
    public function downloadmemotoecs($id){
        $data = DB::table('memo_to_ecs')->where('id', $id)->first();
        $filepath = storage_path("app/public/{$data->upload}");
        return Response()->download($filepath);
    }
    public function downloadadv($id){
        $data = DB::table('advisories')->where('id', $id)->first();
        $filepath = storage_path("app/public/{$data->upload}");
        return Response()->download($filepath);
    }
}
