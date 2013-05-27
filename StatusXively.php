<?php

include('PachubeAPI.php');

define( "COSMAPIKEY", "MJ5wFELHdgBtj35u9CQfpETwhgMZ1OCniZATwSqLSHUZnOCf" );
define( "FEEDID", 117535 );

// Define & Init the Object
$cosmFeed = new PachubeAPI(COSMAPIKEY);


			// Get the feed
			$jsonResult =  $cosmFeed->getDatastream('json', FEEDID, '0102');
			
			var_dump($jsonResult);			
			//echo($jsonResult);
			
			// Get the current value and format output result
			//$currentValue = $jsonResult->current_value;
			
			$jsonDecoded = json_decode($jsonResult);
			

			// Output the result 
			header( 'Content-Type: application/json' );
			header( 'Cache-Control: no-cache' );
			
			echo "current value: $jsonDecoded->current_value";
		





	
		// This is a grab log call
	//case 'log':
			// Retrieve the log for the past 24 hours with
			// an interval of 30 minutes between each
			// datapoint
			//$startTime 		= date( 'Y-m-d\TG:i:s', strtotime('-24 hours') );
			//$endTime 		= date( 'Y-m-d\TG:i:s' );

			// Get the feed history
		//	$jsonResult = json_decode( $cosmFeed->getFeedHistory('json', FEEDID, $startTime, $endTime, $duration=false, $page=false, $per_page=false, $time=false, $find_previous=false, $interval_type='discrete', $interval=3600) );

			// Get the datapoints array from the result set only
	//		$datapoints = $jsonResult->datastreams[0]->datapoints;

			// BUG Here, that's why we need to revert back to UTC
			// needs to be fixed..
	//		date_default_timezone_set('Asia/Beirut');

			// Fix the time formatting
	//		foreach( $datapoints as &$dp )
	//		{	
//				$dp->at = date( "c", strtotime( $dp->at ) );
		//	}

		//	header( 'Content-Type: application/json' );
		//	header( 'Access-Control-Allow-Origin: *' );
		//	header( 'Cache-Control: no-cache' );
		//	echo json_encode( array( "log" => $datapoints ) );
		//	break;
//	}

//}


?>

