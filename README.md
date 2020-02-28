# wordpress-hello-plugin
wordpressのpluginのひな型

# information

## [プラグインの作成](https://wpdocs.osdn.jp/%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3%E3%81%AE%E4%BD%9C%E6%88%90)

## [本気で作りたい人向け、WordPressプラグインの作成方法](https://oxynotes.com/?p=9321)

プラグインディレクトリ
├ lib（メインファイルから分離したPHPファイル）
├ images（画像ファイル）
├ js（JavaScriptファイル）
├ style（CSS）
└ languages（翻訳ファイル）
 plugin.php（プラグインのメインファイル）
 readme.txt（READMEフィアル）


## [初めてGitHubリポジトリにpushしたらrejectedエラーになったときの対応メモ](https://qiita.com/takanatsu/items/fc89de9bd11148da1438)
'--allow-unrelated-histories'

# VCCW

[![Build Status](https://travis-ci.org/vccw-team/vccw.svg?branch=master)](https://travis-ci.org/vccw-team/vccw)

This is a Vagrant configuration designed for development of WordPress plugins, themes, or websites.

To get started, check out <http://vccw.cc/>

## Configuration

1. Copy `provision/default.yml` to `site.yml`.
1. Edit the `site.yml`.
1. Run `vagrant up`.

### Note

* The `site.yml` has to be in the same directory with Vagrantfile.
* You can put difference to the `site.yml`.
