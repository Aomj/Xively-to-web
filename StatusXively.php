<?php

include('XivelyAPI.php');

define( "COSMAPIKEY", "MJ5wFELHdgBtj35u9CQfpETwhgMZ1OCniZATwSqLSHUZnOCf" );
define( "FEEDID", 117535 );

// Define & Init the Object
$cosmFeed = new PachubeAPI(COSMAPIKEY);


//change $ver to swap between current version and history
$ver = 'Hist';

		switch($ver){ 
		
		//get the current value 
		case 'current':

			// Get the feed
			$jsonResult =  $cosmFeed->getDatastream('json', FEEDID, '0102');
			
			// Decoding the feed to get the result
			$jsonDecoded = json_decode($jsonResult);
			

			// Output the result 
			header( 'Content-Type: application/json' );
			header( 'Cache-Control: no-cache' );
			
			echo "current value: $jsonDecoded->current_value";
			break;


	
		// History call
		case 'Hist':
			// Retrieve the log for the past 24 hours with
			// an interval of 30 minutes between each
			// datapoint, change the interval to get different range 
			$startTime 		= date( 'Y-m-d\TG:i:s', strtotime('-24 hours') );
			$endTime 		= date( 'Y-m-d\TG:i:s' );

			// Get the feed history
			$jsonResult = $cosmFeed->getFeedHistory('json', FEEDID, $startTime, $endTime, $duration=false, $page=false, $per_page=false, $time=false, 				$find_previous=false, $interval_type='discrete', $interval=3600);
			
			// Get the datapoints array from the result set only
			$jsonDecoded = json_decode($jsonResult);
			$datapoints = $jsonDecoded->datastreams[0]->datapoints;
			

			// Outpout the Result
			foreach( $datapoints as $dp )
			{
				if(property_exists($dp, "value") && property_exists($dp, "at"))	{
				$va = $dp->value;
				$at = $dp->at;
			
				echo "value:   $va at $at <br/>";
				}
			}
			break;
		}


?>

