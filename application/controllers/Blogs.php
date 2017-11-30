<?php
  class Blogs extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('blog');
      $this->load->model('product');
      //共通ナビ用
      $data['all_category'] = $this->product->get_category_list();
      $data['item_count'] = count(get_cookie('items'));
      $data['sidebar'] = $this->load->view('sidebar', $data, TRUE);
      $this->load->view('header', $data);
    }

    /*投稿記事一覧ページ*/
    function index() {
      $data['articles'] = $this->blog->get_all_posts();
      $this->load->view('blog', $data);
    }

    /*記事投稿ページ*/
    function add() {
      $this->form_validation->set_rules('entry_title', 'タイトル', 'required|max_length[100]');
      $this->form_validation->set_rules('entry_text', '本文', 'required|max_length[400]');

      if($this->form_validation->run() == FALSE) {
        $this->load->view('add-entry');
      }
      else {
        $title = $this->input->post('entry_title');
        $text = $this->input->post('entry_text');
        $this->blog->add_new_post($title, $text);
        redirect('blogs/index');
      }
    }

    /*記事個別ページ*/
    function post($id) {
      $data['article'] = $this->blog->get_the_post($id);
      $data['post_id'] = $id;
      $data['comments'] = $this->blog->get_post_comments($id);
      $data['total_comments'] = $this->blog->count_post_comments($id);
      $this->load->view('post', $data);
    }

  }
