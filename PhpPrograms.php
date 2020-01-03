<?php 
class Programs
{
	public $sum=0; 
	public $rem=0;
	public $num;
	

	function __construct()
	{

		
	}

	public function sumOfDigits($num){

		$this->num = $num;

		for ($i =0; $i<=strlen($num);$i++)  
		{  
		  $this->rem=$num%10;  
		  $this->sum = $this->sum + $this->rem;  
		  $num=$num/10;  
		}
		return  $this->sum;  
	}

	public function evenOddProgram($number)
	{		
		if($number%2==0)  
		{  
		 return "$number is Even Number.";   
		}  
		else  
		{  
		 return "$number is Odd Number.";  
		}   
	}

	public function primeNumber()
	{
		$count = 0;  
		$num = 2;  
		while ($count < 15 ){  
			$div_count=0;  
			for ( $i=1; $i<=$num; $i++){  
				if (($num%$i)==0){  
					$div_count++;  
				}  
			}  
			if ($div_count<3){  
				echo $num." , ";  
				$count=$count+1;  
			}  
			$num=$num+1;  
		}  
	}

	public function tableOfNumber($value)
	{
		define('a', $value);   
		for($i=1; $i<=10; $i++)   
		{   
		  echo a . " x " . $i . " = " . $i*a;   
		  echo '<br>';     
		}  
	}

	public function factorialProgram($value)
	{
		$num = $value;  
		$factorial = 1;  
		for ($x=$num; $x>=1; $x--)   
		{  
		  $factorial = $factorial * $x;  
		}  
		return "Factorial of $num is $factorial";  
	}

	public function armstrongNumber($value)
	{
		$num = $value;  
		$total=0;  
		$x=$num;  
		while($x!=0)  
		{  
		$rem=$x%10;  
		$total=$total+$rem*$rem*$rem;  
		$x=$x/10;  
		}  
		if($num==$total)  
		{  
		echo "Yes it is an Armstrong number";  
		}  
		else  
		{  
		echo "No it is not an armstrong number";  
		}  
	}

	public function palindrome($n){  
		$number = $n;  
		$sum = 0;  
		while(floor($number)) {  
			$rem = $number % 10;  
			$sum = $sum * 10 + $rem;  
			$number = $number/10;  
		}  
		return $sum;  
	}

	public function palindromeNumber($value)
	{
		$input = $value;  
		$num = $this->palindrome($input);  
		if($input==$num){  
		echo "$input is a Palindrome number";  
		} else {  
		echo "$input is not a Palindrome";  
		}  
	}
}

$program = new Programs();
?>