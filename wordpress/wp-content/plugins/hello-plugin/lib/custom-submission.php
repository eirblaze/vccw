<?php
/* カスタム投稿タイプのプラグイン化 */


// [WordPressプラグインの仕組みとクラスを利用したより実践的な解説](https://oxynotes.com/?p=9338)
// ダッシュボードのメニューに追加
function my_hello_world() {
  // [関数リファレンス/add menu page](https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_menu_page)
  add_menu_page(
    'hello-plugin', // （文字列） （必須） メニューが選択されたときにページのタイトルタグに表示されるテキスト 初期値： なし
    'hello-plugin', // （文字列） （必須） メニューに表示されるテキスト 初期値： なし
    'manage_options', // （文字列） （必須） メニューを表示するために必要な権限。ユーザーレベルは非推奨となっており、ここでは使用すべきではありません。 初期値： なし
    'eirblaze_hello-plugin-admin' // （文字列） （必須） メニューのスラッグ名（一意である必要があります）。 初期値： なし
  );
  // die("my_hello_world dieでadd_actionの動作検証");
}
add_action( 'admin_menu', 'my_hello_world' );

//======================================================================
//
// カスタム投稿タイプを自作 https://qiita.com/pman-maru/items/43b52bd1f006d81a7c9d
//
// [投稿タイプ](https://wpdocs.osdn.jp/%E6%8A%95%E7%A8%BF%E3%82%BF%E3%82%A4%E3%83%97)
//
//======================================================================
add_action( 'init', 'wpdocs_create_post_type' );
function wpdocs_create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'hello-pulgins' ),
        'singular_name' => __( 'hello-pulgin' )
      ),
      'public' => true, // これは予め定義されたフラグで、この投稿タイプを管理画面に表示するとともに、要求があったときにサイトのコンテンツとして表示されるようにします。
      'menu_position' => 5, //管理メニューの表示位置を指定
      'hierarchical' => true, //階層構造を持たせるか
      'has_archive' => true,
      // カスタム投稿タイプの識別子の名前空間をつける時にきれいな URL 構造を使用したい場合は、register_post_type() 関数の rewrite 引数をセットする必要があります。上記の ACME Widgets という例の場合は次のようにします：
      'rewrite' => array('slug' => 'hello-plugin'),
      'supports' => array( //編集画面で使用するフィールド
        'title',
        'editor',
        'thumbnail',
        'post-formats',
        'page-attributes',
        'revisions',
        'author'
      ),
    )
  );
  //die("wpdocs_create_post_type dieでadd_actionの動作検証");
}

/*
add_action( 'init', 'create_post_type');
function create_post_type() {
  register_post_type( 'eirblaze_hello-plugin', // スラッグ（識別子）
      array(
        'labels' => array(
            'name' => __( 'Products' ),
            'singular_name' => __( 'Product' )
        ),
        'public'        => true, // これは予め定義されたフラグで、この投稿タイプを管理画面に表示するとともに、要求があったときにサイトのコンテンツとして表示されるようにします。
        'exclude_from_search' => false, //検索対象に含めるか
        'show_ui' => true, //管理画面に表示するか
        'show_in_menu' => true, //管理画面のメニューに表示するか
        'menu_position' => 5, //管理メニューの表示位置を指定
        'hierarchical' => true, //階層構造を持たせるか
        'has_archive'   => true, //この投稿タイプのアーカイブを作成するか
        'supports' => array( //編集画面で使用するフィールド
            'title',
            'editor',
            'comments',
            'excerpt',
            'thumbnail',
            'custom-fields',
            'post-formats',
            'page-attributes',
            'trackbacks',
            'revisions',
            'author'
        ),
        // カスタム投稿タイプの識別子の名前空間をつける時にきれいな URL 構造を使用したい場合は、register_post_type() 関数の rewrite 引数をセットする必要があります。上記の ACME Widgets という例の場合は次のようにします：
        'rewrite' => array('slug' => 'hello-plugin')
      )
  );
  //die("create_post_type dieでadd_actionの動作検証");
}

*/

