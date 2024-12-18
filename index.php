<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>走行距離、給油記録表🚗</legend>
                <label>日付：<input type="date" name="date"></label><br>
                <label>メータ走行距離：<input type="number" name="mileage"></label><br>
                <label>給油量：<span id="refueling_value"></span><br><input type="range" min="5" max="40" name="refueling" id="refueling"></label><br>
                <label>販売単価：<span id="price_value"></span><br><input type="range"  min="110.0" max="190.0" step="0.1" name="price" id="price"></label><br>
                <label>給油場所<textArea name="content" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->

<script>

// refuelingのrangeを表示する
// input要素
const inputElem = document.getElementById('refueling');

// 埋め込む先の要素
const currentValueElem = document.getElementById('refueling_value');

// 現在の値を埋め込む関数
const setCurrentValue = (val) => {
  currentValueElem.innerText = val;
}
// inputイベント時に値をセットする関数
const rangeOnChange = (e) =>{
  setCurrentValue(e.target.value);
}

window.onload = () => {
  // 変更に合わせてイベントを発火する
  inputElem.addEventListener('input', rangeOnChange);
  // ページ読み込み時の値をセット
  setCurrentValue(inputElem.value);
}

// priceのrangeを表示する
// input要素
const inputElem_02 = document.getElementById('price');


// 埋め込む先の要素
const currentValueElem_02 = document.getElementById('price_value');

// 現在の値を埋め込む関数
const setCurrentValue_02 = (val_02) => {
  currentValueElem_02.innerText = val_02;
}
// inputイベント時に値をセットする関数
const rangeOnChange_02 = (e) =>{
  setCurrentValue_02(e.target.value);
}

window.onload = () => {
  // 変更に合わせてイベントを発火する
  inputElem_02.addEventListener('input', rangeOnChange_02);
  // ページ読み込み時の値をセット
  setCurrentValue_02(inputElem_02.value);
}


</script>

</body>

</html>