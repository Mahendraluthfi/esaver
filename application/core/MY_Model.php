<?php

class MY_Model extends CI_Model{
    protected $tb_name;
    protected $relation;
    protected $pk;
    private $result;

    function __construct(){
        parent::__construct();
        $this->result = $this->db;
        if(!$this->pk){
            $this->pk = 'id';
        }
    }

    function limit($limit,$index = 0){
        $this->result->limit($limit,$index);
        return $this;
    }

    function select(){
        $this->result->select('*');
        $this->result->from($this->tb_name);
        return $this;
    }

    function condition($condition, $logic = 'where'){
        if(in_array($logic,['where','where_in','or_where','like'])){
            $this->result->$logic($condition);
        }
        return $this;
    }
    
    function with($dest){
        $this->join($dest,$this->tb_name . '.' . $this->relation[$dest]['ours'] . '=' . $dest . '.' . $this->relation[$dest]['theirs']);
        return $this;
    }

    function join($dest,$cond){
        $this->db->join($dest,$cond);
        return $this;
    }

    function get($row = false){
        $data = $this->result->get();
        if($row){
            return $data->row();
        }else{
            return $data->result();
        }
    }
    function getFirst(){
        return $this->get(true);
    }

    function find($id){
        return $this->select()->condition([$this->pk => $id])->get(true);
    }
    function update($id,$data){
        $this->result->where($this->pk, $id);
        $this->result->update($this->tb_name, $data);
        return $this->find($id);
    }

    function insert($data){
        $this->result->insert($this->tb_name, $data);
        $this->result = $this->db;
        $newData = $this->select()->condition($data)->get(true);
        return $newData;
    }
}