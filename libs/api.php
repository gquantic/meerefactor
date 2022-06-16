<?
	class Leads extends Db{
		private $token = '8da5de493dd523a2d23d4130a3c3b9de';

		function __construct(){

		}
		
		function getVal($array, $need){
		    for($i = 0; $i < count($array); $i++){
		        # $returnValue =+ $array[$i][$need]; // Сумма уникальных кликов
		        $returnValue = $returnValue + $array[$i][$need];
		    }
		    
		    return $returnValue;
		}

		function getReportsStatic(){
			// Получаем данные пользователя
			$userData = $this->userSelect();
			$uid = $userData['id'];

			// Для начала получаем данные статистики в самой партнёрке
			$userStatistic = [
				'conversions' => mysqli_num_rows($this->query("SELECT * FROM `conversions` WHERE `webmaster_id`='$uid'")),
				'suc_conversion' => mysqli_num_rows($this->query("SELECT * FROM `conversions` WHERE `webmaster_id`='$uid' AND `agree`='1'"))
			];

			// Получаем по API статистику с Leads.su
			$userVarUrl = "aff_sub1=".$uid;
			$request = $this->request("reports", $userVarUrl);
			#var_dump($request);
			$request = $request["data"];
			
			
			
			#echo $this->getVal($request,"unique_clicks");
			
			/* array(6) { ["status"]=> string(7) "success" ["code"]=> int(200) ["count"]=> int(3) ["limit"]=> int(50) ["offset"]=> int(0) ["data"]=> array(3) { [0]=> array(24) { ["period_hour"]=> string(19) "2020-08-12 00:00:00" ["impressions"]=> int(0) ["unique_impressions"]=> int(0) ["clicks"]=> int(1) ["unique_clicks"]=> int(1) ["conversions"]=> int(0) ["unique_conversions"]=> int(0) ["add_conversions"]=> int(0) ["conversions_approved"]=> int(0) ["conversions_rejected"]=> int(0) ["conversions_pending"]=> int(0) ["payout"]=> int(0) ["pending_payout"]=> int(0) ["offer_id"]=> int(487) ["goal_id"]=> int(0) ["source"]=> string(0) "" ["aff_sub1"]=> string(1) "3" ["aff_sub2"]=> string(0) "" ["aff_sub3"]=> string(0) "" ["aff_sub4"]=> string(0) "" ["aff_sub5"]=> string(0) "" ["grouping"]=> string(3) "day" ["offer_name"]=> string(70) "Тинькофф. Кредитные системы [debit card][sale]" ["offer_status"]=> string(6) "active" } [1]=> array(24) { ["period_hour"]=> string(19) "2020-08-12 00:00:00" ["impressions"]=> int(0) ["unique_impressions"]=> int(0) ["clicks"]=> int(1) ["unique_clicks"]=> int(1) ["conversions"]=> int(0) ["unique_conversions"]=> int(0) ["add_conversions"]=> int(0) ["conversions_approved"]=> int(0) ["conversions_rejected"]=> int(0) ["conversions_pending"]=> int(0) ["payout"]=> int(0) ["pending_payout"]=> int(0) ["offer_id"]=> int(910) ["goal_id"]=> int(0) ["source"]=> string(0) "" ["aff_sub1"]=> string(1) "3" ["aff_sub2"]=> string(0) "" ["aff_sub3"]=> string(0) "" ["aff_sub4"]=> string(0) "" ["aff_sub5"]=> string(0) "" ["grouping"]=> string(3) "day" ["offer_name"]=> string(64) "Альфа банк "Перекресток" [credit_card][sale]" ["offer_status"]=> string(6) "active" } [2]=> array(24) { ["period_hour"]=> string(19) "2020-08-12 00:00:00" ["impressions"]=> int(0) ["unique_impressions"]=> int(0) ["clicks"]=> int(1) ["unique_clicks"]=> int(1) ["conversions"]=> int(0) ["unique_conversions"]=> int(0) ["add_conversions"]=> int(0) ["conversions_approved"]=> int(0) ["conversions_rejected"]=> int(0) ["conversions_pending"]=> int(0) ["payout"]=> int(0) ["pending_payout"]=> int(0) ["offer_id"]=> int(9547) ["goal_id"]=> int(0) ["source"]=> string(0) "" ["aff_sub1"]=> string(1) "3" ["aff_sub2"]=> string(0) "" ["aff_sub3"]=> string(0) "" ["aff_sub4"]=> string(0) "" ["aff_sub5"]=> string(0) "" ["grouping"]=> string(3) "day" ["offer_name"]=> string(29) "Citibank [credit_cards][sale]" ["offer_status"]=> string(6) "active" } } } */

			// Конвертируем и возвращаем всё это дело
			return $response = [
				'all' => [
					'conversions' => $userStatistic['conversions'],
					'unique_clicks' => intval($this->getVal($request, "unique_clicks")),
					'clicks' => intval($this->getVal($request, "clicks")),
					'suc_conversions' => $userStatistic['suc_conversions'] 
				],

				'api' => [
					'conversions' => $request["data"][0]['conversions']
				],

				'part' => [
					'conversions' => $userStatistic['conversions']
				]
			];
		}

		function urlGenerate($method, $object){
			# http://api.leads.su/webmaster/reports?start_date=2014-01-01&end_date=2014-02-20&offset=0&grouping=month&token=YOUR_TOKEN
			return "http://api.leads.su/webmaster/".$object."?".$method."&token=".$this->token."&response_type=Json";
		}

		function request($object, $method){
			$request = $this->urlGenerate($method, $object);
			$response = $this->result($request);
			return json_decode($response, true);
		}

		function result($url){
			return $result = file_get_contents($url, false, stream_context_create(array(
			    'http' => array(
			        'method'  => 'GET',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => 'application/json'
			    )
			)));
		}
	}