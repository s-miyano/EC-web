<?php
  class Blog extends CI_Model {

    function __construct() {
      parent::__construct();
    }

    function get_all_posts() {
      $query = $this->db->get('articles');
      return $query->result();
    }

    function add_new_post($title, $text) {
      $data = array('entry_title' => $title, 'entry_text' => $text);
      $this->db->insert('articles', $data);
    }

    function get_the_post($id) {
      $this->db->where('entry_id', $id);
      $query = $this->db->get('articles');
      if ($query->num_rows() != 0) {
        return $query->result();
      }
      else {
        return FALSE;
      }
    }

    function get_post_comments($entry_id) {
      $this->db->where('entry_id', $entry_id);
      $query = $this->db->get('comments');
      return $query->result();
    }

    function count_post_comments($entry_id) {
      $this->db->like('entry_id', $entry_id);
      $this->db->from('comments');
      return $this->db->count_all_results();
    }

    function add_new_comment($entry_id, $commentor, $email, $comment) {
      $data = array('entry_id' => $entry_id, 'comment_name' => $commentor, 'comment_email' => $email, 'comment_text' => $comment);
      $this->db->insert('comment', $data);
    }
  }
