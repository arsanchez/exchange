<?php


	class exchanger
	{

		private $base_currency = '';
		
		private $yql_base_url = "http://query.yahooapis.com/v1/public/yql";  

	
		private $currencys = array();

		function __construct($currency)
		{
			$this->base_currency = $currency;
		}

		public function display()
		{
			$datos = $this->getDatos();

			echo "

			<table class='table'>
	<thead>
		<tr>
			<th colspan='2'>
				Exchange Rate of {$this->base_currency}
			</th>
		</tr>
		<tr>
			<th></th>
			<th>Buying</th>
			<th>Selling</th>
		</tr>
	</thead>
	<tbody>";
		

			

	if(count($this->currencys) > 1)
	{
		for ($i=0; $i < count($datos); $i++) { 
				
				
				$name = explode(' ',trim($datos[$i]['Name']));
				$name = $name[0];
				echo "<tr>
						<td>{$name}</td>
						<td>{$datos[$i]['Bid']}</td>
						<td>{$datos[$i]['Ask']}</td>
					</tr>";

			}
	}
	else
	{
		
		$name = explode(' ',trim($datos['Name']));
		$name = $name[0];
		echo "<tr>
				<td>{$name}</td>
				<td>{$datos['Bid']}</td>
				<td>{$datos['Ask']}</td>
			</tr>";

			
	}
	echo "		
		
	</tbody>
</table>";
		}

		public function addCurrency($type)
		{
			 array_push($this->currencys,$type);
		}

		private function getDatos()
		{
			$query = '';
			for ($i=0; $i < count($this->currencys); $i++) 
			{ 
				$this->currencys[$i]= $this->currencys[$i].$this->base_currency;
			}

			$query = implode(",", $this->currencys);


			$yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$query.'")'; 
			$yql_query_url = $this->yql_base_url . "?q=" . urlencode($yql_query);  
			$yql_query_url .= "&env=store://datatables.org/alltableswithkeys&format=json"; 



			$session = curl_init($yql_query_url);  
			curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
			$json = curl_exec($session); 


			$datos =  json_decode($json,true);  

			$results = $datos['query']['results']['rate'];
			return $datos['query']['results']['rate'];
		}

		public static function getCurrencies()
		{
			$yql_base_url = "http://query.yahooapis.com/v1/public/yql"; 
			$yql_query = 'select * from yahoo.finance.xchange where pair in ("USDDOP,EURDOP,ZMWDOP")'; 
			$yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);  
			$yql_query_url .= "&env=store://datatables.org/alltableswithkeys&format=json"; 



			$session = curl_init($yql_query_url);  
			curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
			$json = curl_exec($session); 


			$datos =  json_decode($json,true);
			echo $json; 
		}

	}


?>