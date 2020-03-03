<?php

class Client_Model extends MY_Model{
    protected $tb_name = 'client';
    protected $relation = [
        'transaksi'=>[
            'ours'=>'user_id',
            'theirs'=>'user_id'
        ]
    ];
}