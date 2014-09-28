<?php

	class parser {
	
		private $handle;
		private $file_nbr_col;
	
	
		private $action;
		private $columne;
		private $columne_nbr;
		private $cond_columne;
		private $cond_operator;
		private $cond_value;
		
		private $sum_result;
		private $average_result;
		private $median_result;
		private $total_line;
		private $recherche_line;
		private $numbers;
		
		private $research;
		
		public function __construct() {
			//on ouvre le fichier csv
			$this->handle = fopen('calculation.csv', 'r');
			$this->cond_value = $this->countCol();
			
			$this->total_line = 0;
			$this->recherche_line = 0;
			$this->median_result = 0;
			$this->numbers = array();
		}
		
		public function __destruct() {
			fclose($this->handle);	
		}
		
		private function countCol() {
			//compter le nombre de colonnes
			$line1 = fgets( $this->handle );
			$out = explode(';',$line1);
			return count($out);
		}
		
		public function getFormula($formula) {
			
			$formula_explode = explode(' ', $formula);
			
			//test du of
			if ( strtolower($formula_explode[1]) != 'in' ) {
				exit('in is absent');
			}
			
			//test de la colonne
			$this->columne = $formula_explode[2];
			$this->columne = strtolower($this->columne);
			
			if ( substr( $this->columne, 0, 3 ) != 'col' ) {
				exit('Bad columne');
			}
			
			$this->columne_nbr = substr($this->columne, 3,strlen($this->columne));
			
			if ( $this->columne_nbr > $this->cond_value ) {
				exit('Bad Columne number');
			}
			
			//test de l'action
			$this->action = $formula_explode[0];
			$this->action = strtolower( $this->action );
			
			if ( $this->action == 'sum' ) {
				return $this->sum();
			} else if ( $this->action == 'average' ) {
				return $this->average();
			} else if ( $this->action == 'median' ) {
				return $this->median();
			} else if ( $this->action == 'percent' ) {
				if ( count($formula_explode) == 5 ) {
					//test de l'operateur
					if ( $formula_explode[3] != '=' ) {
						exit('bad operator');
					}
				} else {
					exit('bad query');
				}
			
				$this->research = $formula_explode[4];
				
				return $this->percent();
				
			} else {
				exit('Bad action');
			}
			
		}
		
		private function sum() {
			
			while ( !feof($this->handle) ) {
				$current_line = fgets($this->handle);
				
				if ( strlen($current_line) >= $this->cond_value ) {
					$out = explode(';', $current_line);
					if ( $this->columne_nbr >= $this->cond_value ) {
						$this->sum_result = ($this->sum_result + floatval( $out[$this->columne_nbr-1] ) );
					}
			
				}
				
			}
			
			return $this->sum_result;
		}
		
		private function average() {
			while ( !feof($this->handle) ) {
				$current_line = fgets($this->handle);
				
				if ( strlen($current_line) >= $this->cond_value ) {
					$out = explode(';', $current_line);
					if ( $this->columne_nbr <= $this->cond_value ) {
						$this->average_result = ($this->average_result + floatval( $out[$this->columne_nbr-1] ) );
					}
				}
				$this->total_line++;
			}
						
			return round( ($this->average_result/$this->total_line), 0);
		}

		private function median() {
			
			while ( !feof($this->handle) ) {
				$current_line = fgets($this->handle);
				
				if ( strlen($current_line) >= $this->cond_value ) {
					$out = explode(';', $current_line);
					if ( $this->columne_nbr <= $this->cond_value ) {
						array_push($this->numbers, floatval( $out[$this->columne_nbr-1] ) );
					}
				}
			}
			
			rsort($this->numbers);
			$middle = round(count($this->numbers) /2);
			$this->median_result = $this->numbers[$middle];
			return round($this->median_result, 0);
		}
		
		private function percent() {
			while ( !feof($this->handle) ) {
				$current_line = fgets($this->handle);
				
				if ( strlen($current_line) >= $this->cond_value ) {
					$out = explode(';', $current_line);
					
					if ( $this->columne_nbr <= $this->cond_value ) {
						
						if ( trim($this->research) == trim($out[$this->columne_nbr-1]) ) {
							$this->recherche_line++;
						}
					 
					}
				}
				$this->total_line++;
			}

			$ratio = round(($this->recherche_line/$this->total_line)*100, 0);
			return $ratio .'%';
			
		}
	
	
	}

?>