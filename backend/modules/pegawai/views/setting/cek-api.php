    <?php  
    function alphanumericAndSpace($string) {  
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);  
    }  
      
      
    function alphaAndSpace($string) {  
        return preg_replace('/[^a-zA-Z\s]/', '', $string);  
    }  
      
      
    function numonly($string) {  
        return preg_replace('/[^0-9]/', '', $string);  
    }  
      
      
    function cek_nip($nip) {  
           
      # curl  
      $ch = curl_init();  
      curl_setopt($ch, CURLOPT_USERAGENT, "Googlebot/2.1 (http://www.googlebot.com/bot.html)");  
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
       // URL yg akan di cURL  
      curl_setopt($ch, CURLOPT_URL,'http://bkn.go.id/profil-pns');  
       // mengirm request method POST dengan parameter seperti dibawah  
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'nip='.$nip);  
      # end curl  
           
      // data array untuk output nanti  
      $array = array();  
      
       // Gagal curl  
      if(!$html = curl_exec($ch)) {  
         $array['status'] = "error";  
         $array['pesan'] = "website sedang offline";  
      }        
      else  
      { // sukses curl  
      
        // status sukses  
        $array['status'] = "success";  
        $array['pesan'] = "data ada";  
      
        $dom = new DOMDocument;  
        // suppress errors  
        libxml_use_internal_errors(true);  
        // load the html source from a string  
        $dom->loadHTML($html);  
      
        $nodelist = $dom->getElementsByTagName('span');  
      
        $data = array(  
             'nama' => substr($nodelist[1]->nodeValue, 2),  
             'jabatan' => trim(alphanumericAndSpace($nodelist[12]->nodeValue)),  
             'nip' => numonly($nodelist[14]->nodeValue),  
             'nip_lama' => numonly($nodelist[16]->nodeValue),  
             'tgl_lahir' => trim(alphanumericAndSpace($nodelist[18]->nodeValue)),  
             'tmt_cpns' => trim(alphanumericAndSpace($nodelist[20]->nodeValue)),  
             'tmt_pns' => trim(alphanumericAndSpace($nodelist[22]->nodeValue)),  
             'gr' => substr($nodelist[24]->nodeValue, 2),  
             'pendidikan_akhir' => substr($nodelist[26]->nodeValue, 2),  
             'instansi_kerja' => trim(alphanumericAndSpace($nodelist[28]->nodeValue)),  
             'unit_kerja' => trim(alphanumericAndSpace($nodelist[30]->nodeValue)),  
             'unit_kerja_induk' => trim(alphanumericAndSpace($nodelist[32]->nodeValue)),  
             'kedudukan_pns' => trim(alphaAndSpace($nodelist[34]->nodeValue))  
           );  
        $array['data'] = $data;        
      }  
      
      return $array;  
      
    } 
    if (isset($_GET['nip'])) {  
      $nip = numonly($_GET['nip']);  
      
      $data = cek_nip($nip);  
         
      // merubah data array menjadi json  
      header('Content-Type: application/json');  
      header('Access-Control-Allow-Origin: *');  
      echo json_encode($data, JSON_PRETTY_PRINT); 
      
    } else {  
      echo '<p>Maaf, NIP masih kosong</p>';  
      echo '<p><a href="?nip=195806091987031005">Klik contoh</a>';  
    }  