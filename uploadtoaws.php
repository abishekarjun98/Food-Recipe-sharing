<?php

	session_start();	
	require './vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	$bucketName = 'recipe789828292929';
	$IAM_KEY = 'AKIAJIWAVANIYLASDCOQ';
	$IAM_SECRET = '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';

	try {
		
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'ap-south-1'
			)
		);
	} catch (Exception $e) {
		
		die("Error: " . $e->getMessage());
	}

	
	
	$keyName = 'profile-pics/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;

	$_SESSION["profile-pic"]=$pathInS3;
	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["fileToUpload"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}


	echo 'Done';

?>