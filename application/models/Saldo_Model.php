<?php

class Saldo_Model extends MY_Model{
    protected $tb_name = 'saldo';
    protected $pk = 'user_id';
    protected $relation = [
        'transaksi'=>[
            'ours'=>'user_id',
            'theirs'=>'user_id'
        ]
    ];

    function update_saldo($userId,$newSaldo){
        $saldoData = $this->find($userId);
        if($saldoData){
            $newSaldo = $this->update($userId,[
                'total_saldo' => ($saldoData->total_saldo + $newSaldo)
            ]);
        }else{
            $newSaldo = $this->insert([
                'user_id' => $userId,
                'total_saldo' => $newSaldo
            ]);
        }
    }
}