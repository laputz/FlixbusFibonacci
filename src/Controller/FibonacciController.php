<?php
declare(strict_types=1);

namespace Src\Controller;

use Src\Model\Fibonacci;
use Src\Model\FibonacciImpl;
use Src\View\FibonacciView;

class FibonacciController {
  public Fibonacci $fibonacciModel;

  public array $params;

  public function __construct(
    array $params
  ) {
      $this->fibonacciModel = new FibonacciImpl();;
      $this->params = $params;
  }

  public function ProcessRequest() {
      try{
          if (!isset($this->params['fibonacciNumber']) || !preg_match('/^\d+$/', $this->params['fibonacciNumber'])) {
              throw new \Exception("Invalid input parameter");
          }
          $response = new FibonacciView($this->fibonacciModel->getNumber((int)$this->params['fibonacciNumber']));
      } catch(\Exception $e) {
          $response = new FibonacciView(null, $e->getMessage());
      }
      echo $response->toJson();
  }
}
