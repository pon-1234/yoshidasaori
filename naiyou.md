
### 1. WordPress化の方針（PHPフォーム維持版）

*   **テーマの役割**: WordPressでトップページのHTMLを管理・表示します。
*   **ファイル構成**: `header.php`, `footer.php`, `front-page.php`に分割。これにより共通部分の管理が容易になります。
*   **コンテンツ管理**: `index.html`の内容はWordPressの**固定ページ**にHTMLとして直接貼り付けて管理します。
*   **お問い合わせフォーム**: 既存の`contactform`ディレクトリを**WordPressのテーマフォルダの外**に設置し、そのまま利用します。WordPressとは切り離して動作させることで、影響を最小限に抑えます。

---

### 2. ファイル構成の最終確認

WordPressをインストールする`yoshidasaori.jp`ディレクトリ直下は、以下のような構成になります。

```
/www/yoshidasaori.jp/
├── contactform/        <-- 既存のPHPフォームをここに設置
├── wp-admin/
├── wp-content/
│   └── themes/
│       └── yoshidasaori-theme/  <-- これから作成するテーマ
│           ├── assets/
│           ├── front-page.php
│           ├── footer.php
│           ├── functions.php
│           ├── header.php
│           └── style.css
├── wp-includes/
└── (WordPressのその他ファイル)
```

**【重要】**: `contactform`ディレクトリは、テーマフォルダの中ではなく、WordPressのルートディレクトリ（`wp-config.php`などがある場所）に配置してください。

---

### 3. WordPressテーマファイルの作成

作成するファイルは前回とほぼ同じですが、`functions.php`が少し変わります。

#### ① `style.css`
```css
/*
Theme Name: Yoshida Saori Official Theme (Static Form)
Author: Your Name
Description: 吉田沙保里オフィシャルサイトのシンプルなWordPressテーマ（既存PHPフォーム利用版）
Version: 1.0
*/
```

#### ② `functions.php`
`yubinbango.js`の読み込みを削除し、よりシンプルにします。（フォームページで直接読み込まれるため）

```php
<?php
// <title>タグをWordPressで管理
add_theme_support('title-tag');

// CSSとJavaScriptの読み込み
function yoshidasaori_simple_enqueue_scripts() {
    // CSS
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array(), null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0');
    wp_enqueue_style('yoshidasaori-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0');
    wp_enqueue_style('yoshidasaori-style', get_template_directory_uri() . '/assets/css/style.css', array('yoshidasaori-reset'), '1.0');
    wp_enqueue_style('yoshidasaori-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('yoshidasaori-style'), '1.0');
    wp_enqueue_style('yoshidasaori-theme-style', get_stylesheet_uri(), array(), '1.0');

    // JavaScript
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '3.2.1', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0', true);
    wp_enqueue_script('yoshidasaori-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'swiper-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'yoshidasaori_simple_enqueue_scripts');

/**
 * 固定ページに貼り付けられたHTML内の相対パス（assets/）を、
 * テーマの絶対パスに自動で変換する関数。
 */
function replace_asset_paths_in_content($content) {
    if (is_front_page()) {
        $theme_uri = get_template_directory_uri();
        // src="assets/ と href="assets/ を置換
        $content = str_replace('src="assets/', 'src="' . $theme_uri . '/assets/', $content);
        $content = str_replace('href="assets/', 'href="' . $theme_uri . '/assets/', $content);
        // index.htmlへのリンクをサイトルートへのリンクに置換
        $content = str_replace('href="index.html"', 'href="' . home_url('/') . '"', $content);
    }
    return $content;
}
add_filter('the_content', 'replace_asset_paths_in_content');
?>
```

#### ③ `header.php`, ④ `footer.php`, ⑤ `front-page.php`
これらは、前回の回答と**全く同じ内容**で作成してください。変更はありません。

---

### 4. 公開までの手順

1.  **サーバーへのファイル配置**:
    *   `README.md`記載のサーバー情報で接続します。
    *   `www/yoshidasaori.jp` ディレクトリに、**`contactform`ディレクトリ**と**`assets`ディレクトリ**を（念のため）アップロードしておきます。
        *   `assets`はテーマ内にも配置しますが、フォームページ(`confirmation.php`など)が`../assets/`という相対パスで参照しているため、WordPressルートにも必要です。

2.  **WordPressのインストール**:
    *   `www/yoshidasaori.jp` にWordPressの最新版をインストールします。

3.  **テーマのアップロードと有効化**:
    *   上記で作成したテーマファイル一式（`assets`フォルダも含む）を`yoshidasaori-theme`というフォルダにまとめ、ZIP圧縮します。
    *   WordPress管理画面 `外観` > `テーマ` > `新規追加` > `テーマのアップロード` からZIPをアップロードし、有効化します。

4.  **トップページの作成とHTMLの貼り付け**:
    *   管理画面 `固定ページ` > `新規追加` で「トップページ」を作成します。
    *   エディターを **「コードエディター」** に切り替えます。
    *   元の `index.html` ファイルを開き、**`<main>` タグから `</main>` タグまでの中身（94行目〜859行目）をすべてコピー**し、コードエディターに貼り付けます。
    *   `action`属性が`./contactform/confirmation.php`となっていることを確認します。これでフォームはWordPressとは独立して動作します。
    *   ページを**公開**します。

5.  **ホームページ表示設定**:
    *   管理画面 `設定` > `表示設定` を開きます。
    *   「ホームページの表示」で **「固定ページ」** を選択します。
    *   「ホームページ:」のドロップダウンから、先ほど作成した「トップページ」を選択し、変更を保存します。

これで作業は完了です。サイトのURLにアクセスすると、WordPressで管理されたトップページが表示され、お問い合わせフォームは既存のPHPプログラムで動作するようになります。

サイト内容の修正は、管理画面の固定ページ編集画面（コードエディター）で行ってください。