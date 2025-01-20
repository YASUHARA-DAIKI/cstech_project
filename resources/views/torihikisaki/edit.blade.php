<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- 文字エンコーディングをUTF-8に設定 -->
    <meta charset="UTF-8">
    <!-- ビューポートの設定を行い、レスポンシブデザインをサポート -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ページタイトルを設定 -->
    <title>取引先編集</title>
    <!-- Google Fontsを読み込み、Noto Sans JPフォントを使用 -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- BootstrapのCSSを読み込み、スタイルを適用 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 全体のフォントスタイルと背景色を設定 */
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        /* コンテナのスタイルを設定 */
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        /* 見出しのスタイルを設定 */
        h2 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        /* フォームグループの間隔を調整 */
        .form-group {
            margin-bottom: 15px;
        }
        /* 入力フォームのスタイルを設定 */
        .form-control {
            border-radius: 5px;
        }
        /* 保存ボタンのスタイルを設定 */
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        /* ホバー時の保存ボタンの背景色を変更 */
        .btn-primary:hover {
            background-color: #2980b9;
        }
        /* キャンセルボタンのスタイルを設定 */
        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        /* ホバー時のキャンセルボタンの背景色を変更 */
        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>
<body>
    <!-- コンテナを作成し、フォームを配置 -->
    <div class="container">
        <!-- ページの見出しを表示 -->
        <h2>取引先情報の編集</h2>
        <!-- フォーム開始、PUTメソッドを使用し、取引先情報を更新 -->
        <form action="{{ route('torihikisaki.update', $torihikisaki->torihiki_cd) }}" method="POST">
            <!-- CSRFトークンを埋め込み、セキュリティを確保 -->
            @csrf
            <!-- PUTメソッドを指定 -->
            @method('PUT')
            <!-- 各入力フィールドのラベルと値を設定 -->
            <div class="form-group">
                <label for="torihiki_cd">取引先コード</label>
                <input type="text" id="torihiki_cd" name="torihiki_cd" class="form-control" value="{{ $torihikisaki->torihiki_cd }}" required>
            </div>
            <div class="form-group">
                <label for="client_name">取引先名</label>
                <input type="text" id="client_name" name="client_name" class="form-control" value="{{ $torihikisaki->client_name }}" required>
            </div>
            <div class="form-group">
                <label for="client_name_kana">取引先名（カナ）</label>
                <input type="text" id="client_name_kana" name="client_name_kana" class="form-control" value="{{ $torihikisaki->client_name_kana }}" >
            </div>
            <div class="form-group">
                <label for="department_name">部署名</label>
                <input type="text" id="department_name" name="department_name" class="form-control" value="{{ $torihikisaki->department_name }}" >
            </div>
            <div class="form-group">
                <label for="postal_cd">郵便番号</label>
                <input type="text" id="postal_cd" name="postal_cd" class="form-control" value="{{ $torihikisaki->postal_cd }}" >
            </div>
            <div class="form-group">
                <label for="address1">住所1</label>
                <input type="text" id="address1" name="address1" class="form-control" value="{{ $torihikisaki->address1 }}" >
            </div>
            <div class="form-group">
                <label for="address2">住所2</label>
                <input type="text" id="address2" name="address2" class="form-control" value="{{ $torihikisaki->address2 }}" >
            </div>
            <div class="form-group">
                <label for="main_phone_number">電話番号</label>
                <input type="text" id="main_phone_number" name="main_phone_number" class="form-control" value="{{ $torihikisaki->main_phone_number }}" >
            </div>
            <!-- ボタンを中央に配置し、保存とキャンセルの操作を提供 -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">保存</button>
                <a href="{{ route('torihikisaki.index') }}" class="btn btn-secondary">キャンセル</a>
            </div>
        </form>
    </div>
</body>
</html>
