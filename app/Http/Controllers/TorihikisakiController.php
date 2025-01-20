<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorihikisakiRequest;
use App\Models\Torihikisaki;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TorihikisakiController extends Controller
{
    // 取引先一覧を表示
    public function index()
    {
        $torihikisaki = Torihikisaki::orderBy('torihiki_cd', 'asc')->get();
        return view('torihikisaki.index', compact('torihikisaki'));
    }

    // 新しい取引先をデータベースに保存
    public function store(TorihikisakiRequest $request)
    {
        Torihikisaki::create($request->validated());

        return redirect()->route('torihikisaki.index');
    }

    // 既存の取引先データを更新
    public function update(TorihikisakiRequest $request, $id)
    {
        $torihikisaki = Torihikisaki::findOrFail($id);
        $torihikisaki->update($request->validated());

        return redirect()->route('torihikisaki.index');
    }

    // 指定した取引先を削除
    public function destroy($id)
    {
        Torihikisaki::findOrFail($id)->delete();
        return redirect()->route('torihikisaki.index');
    }

    // 取引先データをCSV形式でダウンロード
    public function downloadCsv()
    {
        $data = DB::connection('pgsql')->table('torihikisaki')->orderBy('torihiki_cd')->get();

        $response = new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($handle, ['torihiki_cd', 'client_name', 'client_name_kana', 'department_name', 'postal_cd', 'address1', 'address2', 'main_phone_number']);
            foreach ($data as $row) {
                fputcsv($handle, [$row->torihiki_cd, $row->client_name, $row->client_name_kana, $row->department_name, $row->postal_cd, $row->address1, $row->address2, $row->main_phone_number]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="torihikisaki_' . date('Y-m-d') . '.csv"');

        return $response;
    }

    // 編集画面を表示
    public function edit($torihiki_cd)
    {
        $torihikisaki = Torihikisaki::findOrFail($torihiki_cd);
        return view('torihikisaki.edit', compact('torihikisaki'));
    }
}
