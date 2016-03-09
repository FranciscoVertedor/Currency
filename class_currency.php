<?php 
class currency{
	protected $coins = array(75,15,3,1,0.5,0.25);
	protected $arrayChange = array();
	//Solution #1 using directly the values
	public function change($item_price,$paid){
			$change =  $paid - $item_price;
			$i = 0;
			while($change > 0){ 	
				if($change >= 75){
					$this->arrayChange[$i] = 75;
				}
				else if($change >= 15 and $change < 75){
					$this->arrayChange[$i] =  15;
				}
				else if($change >= 3 and $change < 15){
					$this->arrayChange[$i] =  3;
				}
				else if($change >= 1 and $change < 3){
					$this->arrayChange[$i] =  1;
				}
				else if($change >= 0.5 and $change < 1){
					$this->arrayChange[$i] =  0.5;
				}
				else if($change >= 0.25 and $change < 0.5){
					$this->arrayChange[$i] =  0.25;
				}
				$change = $change - $this->arrayChange[$i];
				$i++;
			}
		return $this->arrayChange;
	}

	//Solution #2 using the values retrieved from the array coins
	public function change_2($item_price,$paid){
			$change =  $paid - $item_price;
			$i = 0;
			$num_coins = count($this->coins);
			for($i=0;$i<$num_coins;$i++){	
				while( $this->coins[$i] <= $change ){
					$this->arrayChange[] = $this->coins[$i];
					$change = $change - $this->coins[$i];
				}
			}
			return $this->arrayChange;
	}

	public function get_change(){
		$html = "<pre>";
		$html .= print_r($this->arrayChange);
		$html .= "</pre>";
		return $html;
	}
}