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

	'jedaJadwal'	=> 30,

	'pesanJadwal' 	=> array(
		'indonesia'		=> "Perhatian, perhatian. pesawat %s dengan kode %s akan segera berangkat.",
		'inggris'		=> "%s plane with flight number %s leaving soon."
	)
);