<?php

class Transaksi_Model extends MY_Model{
    protected $tb_name = 'transaksi';
    protected $pk = 'kode_transaksi';
    protected $relation = [
        'client'=>[
            'ours'=>'user_id',
            'theirs'=>'user_id'
        ]
    ];
}