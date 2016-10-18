<?php

require 'core/C_Model.php';

class AdminModel extends C_Model
{
  public function getClients()
  {
      $posts = $this->connect()->from('clients')
                              ->orderBy('clients.client_id', 'desc')
                               ->select()
                               ->all();

      return $posts;
  }

  // public function countReceipt($id){
  //   $count = $this->connect()->from('receipts')
  //                             ->where('receipts.client_id')->eq($id)
  //                             ->count();
  //   return $count;
  // }
  public function getFaults()
  {
      $posts = $this->connect()->from('diagnosis')
                              ->orderBy('diagnosis.diag_id', 'desc')
                               ->select()
                               ->all();
      return $posts;

  }

  public function getClientsById($id)
  {
      $posts = $this->connect()->from('clients')
                              ->where('clients.client_id')->eq($id)
                               ->select()
                               ->all();

      return $posts;
  }
  public function getFaultsById($id)
  {
      $posts = $this->connect()->from('diagnosis')
                              ->where('diagnosis.diag_id')->eq($id)
                               ->select()
                               ->all();
      return $posts;

  }


}
 ?>
