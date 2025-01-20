<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- HTMLドキュメントの文字コードをUTF-8に設定 -->
    <meta charset="UTF-8">
    <!-- ビューポート設定（レスポンシブデザイン対応） -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ページのタイトル -->
    <title>取引先マスタメンテナンス</title>
    <!-- Googleフォントの読み込み -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSSの読み込み -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ベースフォント設定 */
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f4f6f9; /* 背景色 */
            color: #333; /* テキストカラー */
        }

        /* 見出しのデザイン */
        h2 {
            font-weight: 700;
            color: #2c3e50;
        }

        /* テーブル全体のデザイン設定 */
        table {
            width: 100%; /* テーブル幅100% */
            table-layout: fixed; /* 固定レイアウト */
            border-collapse: collapse; /* 境界線の重複を防ぐ */
        }

        /* テーブルヘッダーのスタイル */
        th {
            padding: 15px;
            background-color: #2980b9; /* 背景色 */
            color: white; /* テキスト色 */
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
        }

        /* テーブルセルのスタイル */
        td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd; /* セルの境界線 */
            word-wrap: break-word; /* テキストの折り返し */
            background-color: #ecf0f1; /* 背景色 */
        }

        /* 操作列の文字位置を中央揃えにする */
        th:nth-child(9), td:nth-child(9) {
            text-align: center; /* 中央揃え */
            width: 120px; /* 操作列の幅 */
            white-space: nowrap; /* 改行を許可しない */
        }

        /* 代表電話番号列の改行を許可しない */
        th:nth-child(8), td:nth-child(8) {
            white-space: nowrap;
        }

        /* 郵便番号列のヘッダー幅を設定 */
        th:nth-child(5), td:nth-child(5) {
            width: 10ch;
        }

        /* 取引先列のヘッダー幅を設定 */
        th:nth-child(1), td:nth-child(1) {
            width: 8ch;
        }

        /* 取引先名(カナ)列のヘッダー幅を設定 */
        th:nth-child(3), td:nth-child(3) {
            width: 16ch;
        }

        /* 操作列のヘッダー幅を設定 */
        th:nth-child(9), td:nth-child(9) {
            width: 9ch;
        }

        /* 編集ボタンのデザイン */
        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease; /* ホバー時のトランジション */
        }

        /* 編集ボタンホバー時のデザイン */
        .btn-primary:hover {
            background-color: #1f6fa2;
        }

        /* 削除ボタンのデザイン */
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
            color: white;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        /* 削除ボタンホバー時のデザイン */
        .btn-danger:hover {
            background-color: #c0392b;
        }

        /* CSVダウンロードボタンのデザイン */
        .btn-secondary {
            background-color: #f39c12;
            border-color: #f39c12;
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        /* CSVダウンロードボタンホバー時のデザイン */
        .btn-secondary:hover {
            background-color: #e67e22;
        }

        /* 追加フォームの余白設定 */
        .form-row .col {
            margin-bottom: 15px;
        }

        /* コンテナの背景色と影の設定 */
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- ページの見出し -->
        <h2 class="text-center">取引先マスタメンテナンス</h2>

        <!-- 取引先追加フォーム -->
        <form method="post" action="/torihikisaki">
            @csrf <!-- CSRFトークンの挿入 -->
            <div class="form-row">
                <!-- 取引先コード入力欄 -->
                <div class="col">
                    <input type="text" name="torihiki_cd" class="form-control" placeholder="取引先コード" required>
                </div>
                <!-- 取引先名入力欄 -->
                <div class="col">
                    <input type="text" name="client_name" class="form-control" placeholder="取引先名" required>
                </div>
                <!-- 取引先名（カナ）入力欄 -->
                <div class="col">
                    <input type="text" name="client_name_kana" class="form-control" placeholder="取引先名（カナ）" >
                </div>
                <!-- 部署名入力欄 -->
                <div class="col">
                    <input type="text" name="department_name" class="form-control" placeholder="部署名" >
                </div>
                <!-- 郵便番号入力欄 -->
                <div class="col">
                    <input type="text" name="postal_cd" class="form-control" placeholder="郵便番号" >
                </div>
                <!-- 住所1入力欄 -->
                <div class="col">
                    <input type="text" name="address1" class="form-control" placeholder="住所１" >
                </div>
                <!-- 住所2入力欄 -->
                <div class="col">
                    <input type="text" name="address2" class="form-control" placeholder="住所２" >
                </div>
                <!-- 代表電話番号入力欄 -->
                <div class="col">
                    <input type="text" name="main_phone_number" class="form-control" placeholder="代表電話番号" >
                </div>
                <!-- 追加ボタン -->
                <div class="col">
                    <button type="submit" class="btn btn-primary">追加</button>
                </div>
            </div>
        </form>

        <!-- CSVダウンロードボタン -->
        <form action="/download_csv" method="post">
            @csrf
            <button type="submit" class="btn btn-secondary">CSVダウンロード</button>
        </form>

        <!-- 取引先一覧テーブル -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <!-- テーブルのヘッダー -->
                    <th>取引先コード</th>
                    <th>取引先名</th>
                    <th>取引先名（カナ）</th>
                    <th>部署名</th>
                    <th>郵便番号</th>
                    <th>住所１</th>
                    <th>住所２</th>
                    <th>代表電話番号</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <!-- 取引先データをループで表示 -->
                @foreach ($torihikisaki as $row)
                <tr>
                    <!-- 各取引先のデータを表示 -->
                    <td>{{ $row->torihiki_cd }}</td>
                    <td>{{ $row->client_name }}</td>
                    <td>{{ $row->client_name_kana }}</td>
                    <td>{{ $row->department_name }}</td>
                    <td>{{ $row->postal_cd }}</td>
                    <td>{{ $row->address1 }}</td>
                    <td>{{ $row->address2 }}</td>
                    <td>{{ $row->main_phone_number }}</td>
                    <td>
                        <!-- 編集ボタン -->
                        <div>
                            <a href="{{ route('torihikisaki.edit', $row->torihiki_cd) }}" class="btn btn-primary">編集</a>
                        </div>
                        <!-- 削除フォーム -->
                        <div>
                            <form method="POST" action="/torihikisaki/{{ $row->torihiki_cd }}" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- HTTP DELETEメソッドを使用 -->
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
