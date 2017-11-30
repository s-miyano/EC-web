<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" http-equiv="content-type" content="text/css">
    <!--Stylesheet-->
    <link rel="stylesheet/less" href="<?php echo base_url(); ?>css/default.less" type="text/css">
    <script src="<?php echo base_url();?>js/less.js"type="text/javascript"></script>
    <!--Googlefont-->
    <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <!--Javascript-->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/common.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.jpg" >
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/slick.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slick-theme.css" media="screen" />
    <title>Stationer's</title>
  </head>
  <body>

    <div id="header">
      <h1>オフィス用品から雑貨まで幅広く取り揃えています</h1>
      <section class="headerContainer">
        <div class="logoArea">
          <a href="<?php echo base_url(); ?>products">Stationer's</a>
        </div>

        <div class="infoArea">
          <p class="telNum">000-000-0000</p>
          <p class="address">〒000-0000　東京都新宿区6丁目00-0</p>
          <p class="businessHours"></p>
        </div>
      </section>

      <!--ヘッダーナビ-->
      <nav class="globalNavi">
        <ul class>
          <li>
            <a href="<?php echo base_url(); ?>products">
              <strong>ホーム</strong>
              <span>HOME</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>products">
              <strong>初めての方へ</strong>
              <span>ABOUT</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>blogs">
              <strong>ブログ</strong>
              <span>BLOG</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>products">
              <strong>お問い合わせ</strong>
              <span>CONTACT</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="sliderArea">
        <ul class="slick-box">
          <li>
            <img src="<?php echo base_url();?>images/mv_01.jpg" alt="">
          </li>
          <li>
            <img src="<?php echo base_url();?>images/mv_02.jpg" alt="">
          </li>
          <li>
            <img src="<?php echo base_url();?>images/mv_03.jpg" alt="">
          </li>
        </ul>
      </div>

    </div>
