<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function save_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    function select_between($field, $table, $mulai, $sampai)
    {
        $this->db->where("$field BETWEEN '$mulai' AND '$sampai'");
        return $this->db->get($table);
    }

    public function fetch_data()
    {
        $this->db->order_by("id_konfirm", "DESC");
        $query = $this->db->get("trovi_konfirmpayment");
        return $query->result();
    }

    function tampil_data($table)
    {
        return $this->db->get($table);
    }

    function between($field, $awal, $sampai, $table)
    {
        $this->db->where("$field BETWEEN '$awal' AND '$sampai'");
        return $this->db->get($table);
    }

    function select_where_dashboard($field, $table, $where)
    {
        $this->db->order_by($field, "desc");
        return $this->db->get_where($table, $where);
    }

    function select_where_order_by($field, $table, $where)
    {
        $this->db->order_by("time_datang", "desc");
        $this->db->order_by($field, "desc");
        return $this->db->get_where($table, $where);
    }

    function tampil_data_order_by($field, $table)
    {
        $this->db->order_by($field, "desc");
        return $this->db->get($table);
    }

    function select_rekap_absensi($where, $table)
    {
        $this->db->order_by("tgl_hadir", "desc");
        return $this->db->get_where($table, $where);
    }

    function select_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function edit_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
                        
/* End of file Crud_model.php */
