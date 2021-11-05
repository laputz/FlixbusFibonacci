<?php
declare(strict_types=1);

namespace Src\Controller;

use Src\Model\Fibonacci;
use Src\Model\FibonacciImpl;

class FibonacciController {
  public string $requestMethod;
    
  public Fibonacci $fibonacciModel;

  public int $fibonacciNumber;

  public function __construct(
    string $requestMethod,
    int $fibonacciNumber
  ) {
      $this->requestMethod = $requestMethod;
      $this->fibonacciModel = new FibonacciImpl();;
      $this->fibonacciNumber = $fibonacciNumber;
  }

  public function ProcessRequest() {
      if ($this->requestMethod === 'GET') {
          header('HTTP/1.1 200 OK');
          try{
              echo json_encode($this->fibonacciModel->getNumber($this->fibonacciNumber));
          } catch(\Exception $e) {
              echo $e->getMessage();
          }
      } else {
          header('HTTP/1.1 404 Not Found');
          echo null;
      }
  }
}
