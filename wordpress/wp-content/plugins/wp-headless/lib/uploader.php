<?php
	include_once(dirname(__FILE__) . "/s3.php");

	class Uploader {

		var $settings;
		var $file;

		public function __construct( $file_name, $tmp_file, $dest ){
			$this->settings["bucket"] = get_site_option("tantan_wordpress_s3")["bucket"];
			
			$this->settings["awsAccessKey"] = get_site_option(Amazon_Web_Services::SETTINGS_KEY)["access_key_id"];
			$this->settings["awsSecretKey"] = get_site_option(Amazon_Web_Services::SETTINGS_KEY)["secret_access_key"];
			
			$this->settings["tmp_file"] = $tmp_file;
			$this->settings["file_name"] = $dest . $file_name;
			$this->settings["file_url"] = "http://". $this->settings["bucket"] . ".s3.amazonaws.com/" . $this->settings["file_name"];
		}

		function canUpload(){
			if( $this->settings["awsAccessKey"] != "" ){
				return true;
			} else {
				return false;
			}
		}

		function upload(){
			$s3 = new S3(
				$this->settings["awsAccessKey"],
				$this->settings["awsSecretKey"]
			);
			$s3->putBucket(
				$this->settings["bucket"],
				S3::ACL_PUBLIC_READ,
				0
			);
			return $s3->putObjectFile($this->settings["tmp_file"], $this->settings["bucket"], $this->settings["file_name"], S3::ACL_PUBLIC_READ, array(), "application/json");
		}
	}
?>
