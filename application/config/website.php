<?php 
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-04-02 20:04:56
	**/

$config = array(
	'title' 	=> "Airline Flight Schedule",
	'footer' 	=> "2016 &copy; Six Airports template Metronic by keenthemes.",

	// Maskapai penerbangan
	'maskapai'	=> array(
		"GARUDA INDONESIA",
		"AIR ASIA",
		"CITILINK",
		"SUSI AIR",
		"EXPRESS AIR",
		"LION AIR",
		"WINGS AIR"
	),
	// Tujuan penerbangan
	'tujuan'	=> array(
		"BALI",
		"JAKARTA",
		"SURABAYA",
		"NUSAWIRU",
		"DENPASAR",
		"BANJARMASIN",
		"MEDAN",
		"YOGYAKARTA",
		"BATAM",
		"PONTIANAK"
	),
	// Keterangan jadwal
	'keterangan' => array(
		"Scheduled",
		"Estimated"
	),

	'jedaJadwal'	=> 180,

	'pesanJadwal' 	=> array(
		'indonesia'		=> "Mohon perhatian. maskapai %s dengan kode maskapai %s dengan tujuan %s pada pukul %s akan segera berangkat. kepada para penumpang segera menuju maskapai. terima kasih",
		'inggris'		=>  "airport announcement. %s  plane with flight number %s with destination %s on the time %s .for the passanger to leaving soon . thank you"
	)
);