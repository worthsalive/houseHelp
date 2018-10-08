<?php 
	if(isset($_POST)){
		if(isset($_POST['data'])){
			if(is_numeric($_POST['data'])){
				$engine = new NumToWord();
				echo "<p>" . $engine->formatNumber($_POST['data']) . "</p>";
				echo "<p>" . $engine->beautifyEngine($_POST['data'], $engine->wordEngine($_POST['data'])) . "</p>";
			}
			else{
				echo "<p>Not a number or not a properly formed number</p>";
			}
		}
	}

	class NumToWord{
		var $formatedNumbers = array();
		var $figureStandPoint = "";
		var $intrepreted = array();
		var $interpretedcounter = 0;
		var $arraycounter = 0;

		function __construct(){}

		/*This function starts the engine of the AI.... */
		function wordEngine($num){
			/*$data as a variables holds the formatted number of the system*/
			$data = $this->formatNumber($num);
			/*The processNumber is the real engine of the system because it calls other helpful function to perform the task*/
			$word = $this->processNumber($data);
			/*Trim the process word from the processNumber function... This trim is tring to remove any commas either
			located at the begining of the end of the string*/
			$word = trim($word, ",");
			/*Return the processed word*/
			return $word;
		}

		/*This function beutifies the the wordEngine...
		The wordEngine works very fine but comes with some extra words that seriously need to removed... Therefore
		the beautifyEngine is helping the wordEngine function properly*/
		public function beautifyEngine($raw, $word, $size){
			/*The $size variable which used for conditional test... The major reason for this test
			is to check for numbers as a string in size... For example, if the number been entered in more than
			15 then it is assumed that the number is out of range because this utity system marjorly test only until trillion
			
			In a situation where the size of the number been entered is just one in size, a very simple function will
			will get the word equivalent....... This goes on .................
			*/
			if($size <= 15){
				if($size <= 1){
					return $this->monitorSingleWord($raw);
				}
				elseif($size >= 2 && $size <= 2){
					return trim($word, " ,");
				}
				else{
					/*This is the marjor problem of the wordEngine......... The extra last words must be removed 
					to function properly*/
					$b = explode(" ", $word);
				 	$broken = array_slice($b, 0, count($b) - 2);
				 	return trim(implode(" ", $broken), " ,");
				}
			}
			else{
				/*If the size of the world is more than 15, then message will trigger*/
				echo "<h5>Oops!!! We don't recognize the size of this digit </h5>";
			}
		}
		
		/*This function is very important for the formatting of the number... 
		With this function... commas will be added to where eneccessary to any 
		kind of number regardless the limit of 15 size*/
		public function formatNumber($sum){
			$sum = str_replace(".00", "", $sum);
			$counter = 3;
			$numberFormatHolder = "";
			$temp = "";
			$normalNumber = "";

			/*First step is to rev the number.... i.e, putting the last number to the first one*/
			$sum = strrev($sum);
			for($i = 0; $i < strlen($sum); $i++){
				/*Check for even number......... The even number determines the comma position*/
			   if($i / $counter == 1){
			       $temp.=",";
			       $normalNumber.=$temp;
			       $counter+=3;
			   }
			   if($i / $counter != 1){
			   	   /*Officially appending the number along with the comma to a variable*/
			       $temp.=$sum[$i];
			   }
			}

			$temp = strrev($temp);
			return $temp;
		}

		private function interpreteFigure($data){
			/*Name every number size with the appropriate figures in words*/
			global $figureStandPoint;
			/*Replace all the commas with null and storing in a local or temp variable*/
			$clean = trim(str_replace(",", "", $data));
			/*If the size of the clean variable is three .... Assume its hundred*/
			if(strlen($clean) == 3){$figureStandPoint = "hundred";}
			/*If the size of the clean variable is greater than 4 and less than 6 .... Assume its thousand*/
			elseif(strlen($clean) >= 4 && strlen($clean) <= 6){$figureStandPoint = "thousand";}
			/*If the size of the clean variable is greater than 6 and less than 9 .... Assume its million*/
			elseif(strlen($clean) > 6 && strlen($clean) <= 9){$figureStandPoint = "million";}
			/*If the size of the clean variable is greater than 9 and less than 9 .... Assume its billion*/
			elseif(strlen($clean) > 9 && strlen($clean) <= 12){$figureStandPoint = "billion";}
			/*If the size of the clean variable is greater than 9 and less than 12 .... Assume its trillion*/
			elseif(strlen($clean) > 12 && strlen($clean) <= 15){$figureStandPoint = "trillion";}
			else{}

			return $figureStandPoint;
		}


		private function processNumber($data){
			global $intrepreted, $interpretedcounter;
			$counter = 0;
			$array = explode(",", $data);
			$rem = array();
			$remcounter = 0;
			for($i = 0; $i < count($array); $i++){
				$intrepreted[$counter] = $array[$i];
				$counter++;

				$reform = implode(",", array_slice($array, $i));
				$w_interprete = $this->interpreteFigure($reform);
				$intrepreted[$counter] = $w_interprete;
				$counter++;
			}

			return $this->wordPresentation($intrepreted);
		}

		private function wordPresentation($data){
			$word = "";
			for($i = 0; $i < count($data); $i+=2){
				$word .= $this->pronounceWord($data[$i]) . " " . $data[$i + 1] . ", ";
			}

			return $word;
		}

		private function pronounceWord($data){
			$storedWord = "";
			$store = $data + 0;
			if(strlen($store) == 1){
				$storedWord = $this->monitorSingleWord($store);
				return $storedWord;
			}
			elseif(strlen($store) == 2){
				/*converting interger value to string*/
				$store = $store . "";
				if($store[0] == "1"){
					$storedWord = $this->digit2Small($store);
					return $storedWord;
				}
				else{
					$storedWord = $this->digit2Big($store[0]) . " " . $this->monitorSingleWord($store[1]);
					return $storedWord;
				}
			}
			else{
				$storedWord = $this->digit3Big($store);
				return $storedWord;
			}
		}

		private function digit2Small($f_store){
			$storedWord = "";
			if($f_store == "10"){$storedWord = "ten";}
		 	if($f_store == "11"){$storedWord = "eleven";}
		 	if($f_store == "12"){$storedWord = "twelve";}
		 	if($f_store == "13"){$storedWord = "thirteen";}
		 	if($f_store == "14"){$storedWord = "fourteen";}
		 	if($f_store == "15"){$storedWord = "fifteen";}
		 	if($f_store == "16"){$storedWord = "sixteen";}
		 	if($f_store == "17"){$storedWord = "seventeen";}
		 	if($f_store == "18"){$storedWord = "eighteen";}
		 	if($f_store == "19"){$storedWord = "nineteen";}

		 	return $storedWord;
		}

		private function digit2Big($f_store){
			$storedWord = "";
		 	if($f_store == "2"){$storedWord = "twenty";}
		 	if($f_store == "3"){$storedWord = "thirty";}
		 	if($f_store == "4"){$storedWord = "forty";}
		 	if($f_store == "5"){$storedWord = "fifty";}
		 	if($f_store == "6"){$storedWord = "sixty";}
		 	if($f_store == "7"){$storedWord = "seventy";}
		 	if($f_store == "8"){$storedWord = "eighty";}
		 	if($f_store == "9"){$storedWord = "ninety";}

		 	return $storedWord;
		}

		private function digit3Big($data){
			$storedWord = "";
			$store = $data + 0;
			$store = $store . "";

			$f_word = $this->monitorSingleWord($store[0]);
			$s_word = $store[1] . "" . $store[2];
			$s_word = ($s_word + 0) . "";
			if($s_word == "0"){
				$storedWord = $f_word . " hundred";
			}
			else{
				if(strlen($s_word) == 1){
					$storedWord = $f_word . " hundred and " . $this->monitorSingleWord($s_word);
				}
				else{
					$storedWord = $f_word . " hundred and " . $this->digit2Big($s_word[0]) . " " . $this->monitorSingleWord($s_word[1]);
				}
			}

			return $storedWord;
		}

		private function monitorSingleWord($num){
			if($num == "1"){return "one";}
			if($num == "2"){return "two";}
			if($num == "3"){return "three";}
			if($num == "4"){return "four";}
			if($num == "5"){return "five";}
			if($num == "6"){return "six";}
			if($num == "7"){return "seven";}
			if($num == "8"){return "eight";}
			if($num == "9"){return "nine";}
		}
	}
?>