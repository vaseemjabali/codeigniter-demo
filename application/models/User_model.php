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

    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return null;
        } else {
            return $query->row();
        }
    }

    function create($post_data){
        $this->db->insert('users', $post_data);
    }

    function update($post_data, $id){
        $this->db->where('id', $id);
        $this->db->update('users', $post_data);
    }
}