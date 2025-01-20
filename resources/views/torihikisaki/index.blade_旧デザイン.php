<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>取引先マスタメンテナンス</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>取引先マスタメンテナンス</h2>
        
        <!-- 取引先追加フォーム -->
        <form method="post" action="/torihikisaki">
            @csrf
            <div class="form-row">
                <div class="col">
                    <input type="text" name="torihiki_cd" class="form-control" placeholder="取引先コード" required>
                </div>
                <div class="col">
                    <input type="text" name="client_name" class="form-control" placeholder="取引先名" required>
                </div>
                <div class="col">
                    <input type="text" name="client_name_kana" class="form-control" placeholder="取引先名（カナ）" required>
                </div>
                <div class="col">
                    <input type="text" name="department_name" class="form-control" placeholder="部署名" required>
                </div>
                <div class="col">
                    <input type="text" name="postal_cd" class="form-control" placeholder="郵便番号" required>
                </div>
                <div class="col">
                    <input type="text" name="address1" class="form-control" placeholder="住所１" required>
                </div>
                <div class="col">
                    <input type="text" name="address2" class="form-control" placeholder="住所２" required>
                </div>
                <div class="col">
                    <input type="text" name="main_phone_number" class="form-control" placeholder="代表電話番号" required>
                </div>
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
                @foreach ($torihikisaki as $row)
                <tr>
                    <td>{{ $row->torihiki_cd }}</td>
                    <td>{{ $row->client_name }}</td>
                    <td>{{ $row->client_name_kana }}</td>
                    <td>{{ $row->department_name }}</td>
                    <td>{{ $row->postal_cd }}</td>
                    <td>{{ $row->address1 }}</td>
                    <td>{{ $row->address2 }}</td>
                    <td>{{ $row->main_phone_number }}</td>
                    <td>
                        <form method="POST" action="/torihikisaki/{{ $row->torihiki_cd }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
