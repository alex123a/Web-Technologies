<?php
try {
  $error = 'Always throw this error';
  throw new Exception($error);
  
  echo 'Never executed';
}catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
	echo "Executed after try/catch \n";
}


echo "Hello World\n";

class MyException extends Exception {}


try {
  throw new MyException('test');
}catch (MyException $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
