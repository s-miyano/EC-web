<?php

class Contacts extends CI_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('blog');
    $this->load->model('product');

    /*共通ナビ*/
    $data['all_category'] = $this->product->get_category_list();
    $data['item_count'] = count(get_cookie('items'));
    $data['sidebar'] = $this->load->view('sidebar', $data, TRUE);
    $this->load->view('header', $data);

    /*バリデーション*/
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_message('lastname', '姓を入力してください');
    $this->form_validation->set_message('firstname', '名前を入力してください');
    $this->form_validation->set_message('email', 'メールアドレスを入力してください');
    $this->form_validation->set_message('comments', 'お問い合わせ内容を入力してください');
    $this->form_validation->set_rules('lastname', '姓', 'trim|required|max_length[64]');
    $this->form_validation->set_rules('firstname', '名', 'trim|required|max_length[64]');
    $this->form_validation->set_rules('email', 'メールアドレス', 'trim|required|valid_email');
    $this->form_validation->set_rules('comments', 'お問い合わせ内容', 'required|max_length[400]');
  }

  /*入力画面*/
  function index() {
    $this->ticket = password_hash(uniqid(mt_rand()), PASSWORD_DEFAULT);
    $this->session->set_userdata('ticket', $this->ticket);
    $this->load->view('input');
  }

  /*確認画面*/
  function confirm() {
    $this->ticket = $this->session->userdata('ticket');
    if ($this->form_validation->run() == TRUE) {
      $this->load->view('confirm');
    }elseif(! $this->input->post('ticket')) {
      echo 'クッキーを有効にしてください'
      exit;
    }else {
      $this->load->view('input');
    }
  }

  /*送信画面*/
  function send() {
    $this->ticket = $this->session->userdata('ticket');
    if (! $this->input->post('ticket')) {
      echo 'クッキーを有効にしてください';
      exit;
    }elseif($this->form_validation->run() == TRUE) {
      $mail['name'] = set_value('lastname');
      $mail['from'] = set_value('email');
      $mail['to'] = set_value('');
      $mail['subject'] = 'コンタクトフォーム';
      $mail['comments'] = set_value('comments');
      if ($this->send_mail($mail)) {
        $this->load->view('complete');
        $this->session->sess_destroy();
      }else {
        echo '送信エラー';
      }
    }else {
      $this->load->view('input');
    }
  }

  /*メール送信*/
  function send_mail($mail) {
    
  }
}
