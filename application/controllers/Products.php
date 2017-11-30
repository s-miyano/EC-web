<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('product');
    //共通ナビ用
    $data['all_category'] = $this->product->get_category_list();
    $data['item_count'] = count(get_cookie('items'));
    $data['sidebar'] = $this->load->view('sidebar', $data, TRUE);
    $this->load->view('header', $data);
  }

  /*商品一覧ページ*/
  function index() {
    $category_id = $this->uri->segment(3, 0);
    $data['all_items'] = $this->product->get_items_list();
    $data['category_name'] = $this->product->get_category_name($category_id);
    $data['items_by_category'] = $this->product->divide_into_category($category_id);
    $this->load->view('index', $data);
  }

  /*商品詳細ページ*/
  function show($id) {
    $data['items'] = $this->product->get_detailed_information($id);
    $this->load->view('details', $data);
  }

  /*商品をカートへ追加する*/
  private function add($id, $qty) {
    $id = $this->input->post('id');
    $qty = $this->input->post('qty');
    if ($qty <= 0) {
      delete_cookie('items['.$id.']');//数量0のときCookieから削除
    }
    else {
      set_cookie('items['.$id.']', $qty, 3600);
    }
    redirect('products/cart');
  }

  /*カート表示ページ*/
  function cart() {
    $cart_items = get_cookie('items');
    $data['cart_items'] = $cart_items;
    $item_keys = array_keys($cart_items);
    $items = $this->product->get_detailed_information($item_keys);

    $info = [];//商品情報
    $total = 0;//合計金額
    foreach ($items as $item) {
      $qty = $cart_items[intval($item->id)];
      $amount = $item->price * $qty;
      $item->qty = $qty;
      $item->amount = $amount;
      $total = $total + $amount;
      $info[] = $item;
    }
    $data['items'] = $info;
    $data['item_count'] = count($info);
    $data['total'] = $total;
    $this->load->view('cart', $data);
  }

  /*検索機能*/
  function search() {
    if ($this->input->post('q')) {
      $q = $this->input->post('q');
    }
    else {
      $q = $this->urei->segment(3, '');
    }
    $offset = (int) $this->uri->segment(4, 0);
    $q = trim(mb_convert_kana($q, 's'));
    if ($q == '-' || $q == '') {
      $q = '';
      $disp = '全商品';
      $uri = '-';
    }
    else {
      $disp = $q;
      $uri = $q;
    }

    $data['q'] = $disp;
    $data['result'] = $this->product->search_by_keywords($q);
    $total = $this->product->count_search_results($q);
    if ($total) {
      $data['total'] = $total.'点の商品がヒットしました。';
    }
    else {
      $data['total'] = $disp.'と一致する商品はありませんでした。';
    }
    $this->load->view('search', $data);
  }

}
