<?php
require 'core/C_Model.php';

class AboutModel extends C_Model
{


	public function users()
  {
    $result = $this->connect()->from('users')
                 ->select()
                 ->all();

    return $result;
  }
	public function schools()
  {
    $result = $this->connect()->from('school')
                 ->select()
                 ->all();

    return $result;
  }

	public function hello()
	{
		echo "Hello Woeld";
	}

}
