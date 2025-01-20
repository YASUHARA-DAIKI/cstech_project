<?php

use App\Http\Controllers\TorihikisakiController;

// 取引先一覧の表示ルート
Route::get('/torihikisaki', [TorihikisakiController::class, 'index'])->name('torihikisaki.index');
// 新しい取引先の保存ルート
Route::post('/torihikisaki', [TorihikisakiController::class, 'store']);
// 取引先の更新ルート
Route::put('/torihikisaki/{id}', [TorihikisakiController::class, 'update']);
// 取引先の削除ルート
Route::delete('/torihikisaki/{id}', [TorihikisakiController::class, 'destroy']);
// CSVダウンロードのルート
Route::post('/download_csv', [TorihikisakiController::class, 'downloadCsv']);
// 編集画面の表示ルート
Route::get('/torihikisaki/{torihiki_cd}/edit', [TorihikisakiController::class, 'edit'])->name('torihikisaki.edit');
// 取引先の更新ルート (編集画面からの送信)
Route::put('/torihikisaki/{torihiki_cd}', [TorihikisakiController::class, 'update'])->name('torihikisaki.update');
