<?php
    class Db_lapangan extends CI_Model
    {
        public function __construct(){
            parent::__construct();
            $this->chek_waktu_mulai();
            $this->chek_waktu_selesai();
        }


        function getAll($tbl)
        {
            return $this->db->get($tbl)->result_array();
        }

        function getField($tbl){
            return $this->db->list_fields($tbl);
        }

        public function getAllWhere($tbl, $where){
            return $this->db->get_where($tbl,$where)->result_array();
        }
        public function getById($tbl, $where){
            return $this->db->get_where($tbl,$where)->row();
        }
        public function getLast($tbl){
            return $this->db->order_by('id','desc')
            ->limit(1)
            ->get($tbl)
            ->row();
        }

        public function add($tbl, $data){
            return $this->db->insert($tbl,$data);
        }

        public function edit($tbl, $data, $where){
            return $this->db->update($tbl, $data, $where);
        }

        public function delete($tbl, $id){
            return $this->db->delete($tbl, $id);
        }

        public function like($field, $data,$tbl){
            $this->db->like($field, $data,'both');
            return $this->db->get($tbl)->result_array();
        }

        public function join2tbl($select='*',$tbl =[],$id = [],$where = null){
            $this->db->select($select);
            $this->db->from($tbl[0]);
            $this->db->join($tbl[1], $tbl[1].'.'.$id[1].'='.$tbl[0].'.'.$id[0]);

            if($where != null){
                
                $this->db->where($where);
            }


            $query = $this->db->get()->result_array();
            return$query;
        }

        public function order($id = null){
              $this->db->select('*');
              $this->db->from('order');
              $this->db->join('user','user.id = order.id_user','LEFT');
              $this->db->join('lapangan','lapangan.id = order.id_lapangan','LEFT');      
              $this->db->where(['user.id'=>$id,'status_main'=>'order']);
              $query = $this->db->get()->result_array();
              return $query;
        }

    }