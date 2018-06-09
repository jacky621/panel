<?php
/*
Sadap AutoFollower Turki
By : Handika Pratama
Ig : handikaa_48
Original Script Sadap Like Facebook by : Gilang Dandung
*/ 
include 'curl.php';

class follower extends Curl
{
	public $username;
	public $password;
	public $id;
	public $qty;

	public function __construct($username,$password,$id,$qty)
	{
		$this->username = $username;
		$this->password = $password;
		$this->id    = $id;
		$this->qty    = $qty;
	}
	private function _xstring($string,$start,$end)
    {
       $str = explode($start,$string);
       $str = explode($end,$str[1]);
       return $str[0];
    }
	public function _copyright()
    {
                $w = '		<title>Sadap AutoFollower Instagram Turki</title>
				<style>
				@font-face {
  font-family: "Source Code Pro";
  font-style: normal;
  font-weight: 400;
  src: local("Source Code Pro"), local("SourceCodePro-Regular"), url(http://themes.googleusercontent.com/static/fonts/sourcecodepro/v4/mrl8jkM18OlOQN8JLgasDxM0YzuT7MdOe03otPbuUS0.woff) format("woff");
}

body {
    font-family: Source Code Pro;
    background:#000;
    color: #00FF00;
    margin:0;
    font-size: 13px;
}
</style>
				<body style="background-color:black">
               <font color="green" style="Times New Roman"><b>
               <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
               <pre>
Sadap AutoFollower Instagram Turki
By : Handika Pratama

NB : 
- Following Bertambah
- Sering" Cek Akun Instagramnya, Barangkali Reset password / Verif
- Jika Status Kosong, Berarti tidak tereksekusi. gk semua web work ,(di akun w aja cuma beberapa web yg bisa :v, syukur" akunmu bisa semua)
       </pre>';
        echo $w;
     }
	
	public function _takipcizevki()
	{	
		$curl = New Curl;;
		$curl->simple_get('http://takipcizevki.com/');
		$curl->create('http://takipcizevki.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "takipcizevki.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://takipcizevki.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _takipcipanelim()
	{	
		$curl = New Curl;
		$curl->simple_get('https://takipcipanelim.com/');
		$ch  =  curl_init('https://takipcipanelim.com/login');
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		  curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0");
		$xx=curl_exec($ch);curl_close($ch);
		$ea = explode('&antiForgeryToken=', $xx);
		$eaa = explode('",', $ea[1]);
		// echo $eaa[0];
		$curl->create('https://takipcipanelim.com/login?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		"antiForgeryToken" => $eaa[0],
		);
		echo "takipcipanelim.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://takipcipanelim.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		// echo $ea;
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _freetakipci()
	{	
		$curl = New Curl;
		$curl->simple_get('http://freetakipci.com/');
		$curl->create('http://freetakipci.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "freetakipci.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://freetakipci.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instagramtakipcim()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instagramtakipcim.com/');
		$curl->create('http://instagramtakipcim.com/login?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instagramtakipcim.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instagramtakipcim.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _organiktakipci()
	{	
		$curl = New Curl;
		$curl->simple_get('http://organiktakipci.com/');
		$curl->create('http://organiktakipci.com/hcegiris?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "organiktakipci.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://organiktakipci.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _silvertakip()
	{	
		$curl = New Curl;
		$curl->simple_get('https://silvertakip.com/');
		$curl->create('https://silvertakip.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "silvertakip.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://silvertakip.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instatakipmerkezi()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instatakipmerkezi.com/');
		$curl->create('http://instatakipmerkezi.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instatakipmerkezi.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instatakipmerkezi.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}


	public function _instagrambegenihilesi()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instagrambegenihilesi.com/');
		$ch  =  curl_init('http://instagrambegenihilesi.com/login');
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		  curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0");
		$xx=curl_exec($ch);curl_close($ch);
		$ea = explode('&antiForgeryToken=', $xx);
		$eaa = explode('",', $ea[1]);
		// echo $eaa[0];
		$curl->create('http://instagrambegenihilesi.com/login?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		"antiForgeryToken" => $eaa[0],
		);
		echo "instagrambegenihilesi.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instagrambegenihilesi.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _takipji()
	{	
		$curl = New Curl;
		$curl->simple_get('https://takipji.com/');
		$curl->create('https://takipji.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "takipji.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://takipji.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _takipcikazandim()
	{	
		$curl = New Curl;
		$curl->simple_get('http://www.takipcikazandim.xyz/');
		$curl->create('http://www.takipcikazandim.xyz/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "takipcikazandim.xyz ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://www.takipcikazandim.xyz/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _begenihilesi()
	{	
		$curl = New Curl;
		$curl->simple_get('https://www.begenihilesi.net/');
		$curl->create('https://www.begenihilesi.net/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "www.begenihilesi.net ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://www.begenihilesi.net/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _begenihilesi2()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instagram.begenihilesi.com/');
		$curl->create('http://instagram.begenihilesi.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instagram.begenihilesi.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instagram.begenihilesi.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}


	public function _begenapp()
	{	
		$curl = New Curl;
		$curl->simple_get('https://instagram.begenapp.net/');
		$curl->create('https://instagram.begenapp.net/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instagram.begenapp.net ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://instagram.begenapp.net/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instagrambayii()
	{	
		$curl = New Curl;
		$curl->simple_get('http://www.instagrambayii.com/');
		$curl->create('http://www.instagrambayii.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "www.instagrambayii.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://www.instagrambayii.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instagramservisleri()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instagramservisleri.com/');
		$curl->create('http://instagramservisleri.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instagramservisleri.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instagramservisleri.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instagramtakipcini()
	{	
		$curl = New Curl;
		$curl->simple_get('https://www.instagramtakipcini.com/');
		$curl->create('https://www.instagramtakipcini.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "www.instagramtakipcini.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://www.instagramtakipcini.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instatakipcim()
	{	
		$curl = New Curl;
		$curl->simple_get('http://instatakipcim.org/');
		$curl->create('http://instatakipcim.org/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instatakipcim.org ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://instatakipcim.org/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _takipciyuvam()
	{	
		$curl = New Curl;
		$curl->simple_get('http://takipciyuvam.com/');
		$curl->create('http://takipciyuvam.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "www.takipciyuvam.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('http://takipciyuvam.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _instalobi()
	{	
		$curl = New Curl;
		$curl->simple_get('https://instalobi.com/');
		$curl->create('https://instalobi.com/member?');
		$post = array(
		"username" => $this->username,
		"password" => $this->password,
		);
		echo "instalobi.com ".$curl->info['http_code']." <br />";
		echo "----------------------------------------------------<br />";
		$curl->post($post);
		$curl->execute();

		$curl->create('https://instalobi.com/tools/send-follower?formType=send');
		$post2 = array(
		"adet" => $this->qty,
		"userID" => $this->id,
		"userName" => $this->username,
		);
		$curl->post($post2);
		$ea = $curl->execute();
		$dc = json_decode($ea);
		echo $this->qty." Follower | Status : ".$dc->status;
		echo "<br /> Sisa Point : ".@$dc->takipKredi;
		echo "<br />----------------------------------------------------<br /><br />";

	}

	public function _follow()
	{
		echo $this->_copyright();
		echo $this->_takipcizevki();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_takipcipanelim();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_freetakipci();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_instagramtakipcim();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_organiktakipci();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_silvertakip();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_instatakipmerkezi();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_instagrambegenihilesi();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_takipji();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_takipcikazandim();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_begenihilesi();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_begenihilesi2();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_begenapp();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_instagrambayii();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_instagramservisleri();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_instagramtakipcini();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_instatakipcim();
		flush();
		ob_flush();
            	sleep(5);

            	echo $this->_takipciyuvam();
		flush();
		ob_flush();
            	sleep(5);

		echo $this->_instalobi();
		flush();
		ob_flush();
            	sleep(5);

	}
}
$username = ""; //Username IG
$password = ""; //Password IG
$id = ""; //ID IG 
$qty = 50; //Jumlah Follower Perweb

$run = new follower($username,$password,$id,$qty);
$run->_follow();
