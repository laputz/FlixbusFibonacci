# FlixbusFibonacci
 Author: John Laputz
 
 ## Requirements
 * composer
 * phpunit
 
 ## To Run
 From within the pulled branch:
 * `composer install`
 * `php -S 127.0.0.1:8000 -t public`
 
 ## Request
 `http://127.0.0.1:8000/fibonacci?fibonacciNumber=6`
 
 Replace 6 with the number in the fibonacci series you would like to request.
 
 ## API Response
 `{
   "fibonacciNumber": 8,
   "errorMessage": null
 }`
 * fibonacciNumber - the fibonacci number requested
 * errorMessage - if no fibonacci number could be calculated, the message why
 
 ## Implementation
First, created the Fibonacci.php interface file that was supplied to me for the assignment. Then created the FibonacciImpl.php to implement the interface. The implementation is quite simple: use the last two numbers in the series to find the next. I only kept the last two numbers in the series and the counter to optimise storage. The series could not be lower than 0, so I put in that validation immediately.

I created the test file (using PhpUnit) to run through a few known test cases. Running through a few additional test cases, I quickly found that the version of PHP only uses 32-bit for integers. Running through some additional test cases, I found the 93nd fibonacci number would exceed 32-bits and created an additional validation there.

At this point, I wanted to create a REST API for this service. I have previous experience with composer and PHP and decided to use this framework for speed and efficiency. I spun up a quick composer and started called the FibonacciImpl class from within the index file. I was able to get the fibonacci number from the API. Knowing that this wasn't production ready code, I decided to use the MVC design pattern to structure the code better. I used the FibonacciImpl as the model, created a controller to handle the request, and a view to convert the data to json.
