<?php

class Product extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  /*カテゴリ一覧(ヘッダーナビに使用)*/
  function get_category_list() {
    $query = $this->db->get('category');
    return $query->result();
  }

  /*商品一覧*/
  function get_items_list() {
    $query = $this->db->get('products');
    return $query->result();
  }

  /*カテゴリ名*/
  function get_category_name($category_id) {
    $this->db->where('id', $category_id);
    $query = $this->db->get('category');
    $row = $query->row();
    if($row) {
      return $row->name;//1個以上商品があればカテゴリ名を返す
    }
  }

  /*カテゴリ別商品一覧*/
  function divide_into_category($category_id) {
    $this->db->where('category_id', $category_id);
    $this->db->order_by('id');
    $query = $this->db->get('products');
    return $query->result();
  }

  /*商品詳細情報表示*/
  function get_detailed_information($id) {
    $this->db->where_in('id', $id);
    $query = $this->db->get('products');
    return $query->result();
  }

  /*キーワード検索結果*/
  function search_by_keywords($q) {
    $keywords = explode(" ", $q);
    foreach ($keywords as $keyword) {
      $this->db->like('name', $keyword);
    }
    $this->db->order_by('id');
    $query = $this->db->get('products');
    return $query->result();
  }

  /*検索ヒット数*/
  function count_search_results($q) {
    $keywords = explode(" ", $q);
    $this->db->select('name');
    foreach ($keywords as $keyword) {
      $this->db->like('name', $keyword);
    }
    $query = $this->db->get('products');
    $row = $query->num_rows();
    return $row;
  }

}
