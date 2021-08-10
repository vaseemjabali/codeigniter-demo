<?php

class User_model extends CI_Model {

    function get_all()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->result();
        }
    }

    function create($post_data){
        $this->db->insert('users', $post_data);
    }
}