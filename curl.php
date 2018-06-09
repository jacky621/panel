<?php
/*
* CURL LIBRARY
* GABUNGAN DARI GITHUB
* FB 	  : https://www.facebook.com/gilang.dandung
* TWITTER : https://twitter.com/dandung_whoami
* EMAIL	  : joywhan@array.ws 
* Donasi Pulsa  : 089 617 181 293 (Three)
*/ 
class Curl
{
    protected $response = '';       
    protected $session;            
    protected $url;                 
    protected $options = array();   
    protected $headers = array();   
    public $error_code;             
    public $error_string;           
    public $info;                   


    public function __construct($url = '')
    {
        if ( ! $this->isEnabled()) {
            throw new CurlException('cURL Class - PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
        }

        $url AND $this->create($url);
    }

   
    public function __call($method, $arguments)
    {
        if (in_array($method, array('simple_get', 'simple_post', 'simple_put', 'simple_delete'))) {
            // Take off the "simple_" and past get/post/put/delete to _simpleCall
            $verb = str_replace('simple_', '', $method);
            array_unshift($arguments, $verb);

            return call_user_func_array(array($this, '_simpleCall'), $arguments);
        }
    }

  
    private function _simpleCall($method, $url, $params = array(), $options = array())
    {
       
        if ($method === 'get') {
              
            $this->create($url.($params ? '?'.http_build_query($params, null, '&') : ''));
        } else {
               
                $this->create($url);

                $this->{$method}($params);
        }

      
        $this->options($options);

        return $this->execute();
    }

    
    public function simpleFtpGet($url, $file_path, $username = '', $password = '')
    {
     
        if ( ! preg_match('!^(ftp|sftp)://! i', $url)) {
                $url = 'ftp://' . $url;
        }

        
        if ($username != '') {
                $auth_string = $username;

            if ($password != '') {
                    $auth_string .= ':' . $password;
            }

        
                $url = str_replace('://', '://' . $auth_string . '@', $url);
        }


        $url .= $file_path;

        $this->option(CURLOPT_BINARYTRANSFER, true);
        $this->option(CURLOPT_VERBOSE, true);

        return $this->execute();
    }

   
    public function post($params = array(), $options = array())
    {
   
        if (is_array($params)) {
            $params = http_build_query($params, null, '&');
        }


        $this->options($options);

        $this->httpMethod('post');

        $this->option(CURLOPT_POST, true);
        $this->option(CURLOPT_POSTFIELDS, $params);
    }

    public function put($params = array(), $options = array())
    {
          
        if (is_array($params)) {
            $params = http_build_query($params, null, '&');
        }

       
            $this->options($options);

        $this->httpMethod('put');
        $this->option(CURLOPT_POSTFIELDS, $params);

     
        $this->option(CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT'));
    }

    public function delete($params, $options = array())
    {
      
        if (is_array($params)) {
            $params = http_build_query($params, null, '&');
        }

    
        $this->options($options);

        $this->httpMethod('delete');

        $this->option(CURLOPT_POSTFIELDS, $params);
    }

    public function setCookies($params = array())
    {
        if (is_array($params)) {
            $params = http_build_query($params, null, ';');
        }

        $this->option(CURLOPT_COOKIE, $params);
        return $this;
    }

    public function httpHeader($header, $content = null)
    {
        $this->headers[] = $content ? $header . ': ' . $content : $header;
        return $this;
    }

    public function httpMethod($method)
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
        return $this;
    }

    public function httpLogin($username = '', $password = '', $type = 'any')
    {
        $this->option(CURLOPT_HTTPAUTH, constant('CURLAUTH_' . strtoupper($type)));
        $this->option(CURLOPT_USERPWD, $username . ':' . $password);
        return $this;
    }

    public function proxy($url = '', $port = 80)
    {
        $this->option(CURLOPT_HTTPPROXYTUNNEL, true);
        $this->option(CURLOPT_PROXY, $url . ':' . $port);
        return $this;
    }

    public function proxyLogin($username = '', $password = '')
    {
        $this->option(CURLOPT_PROXYUSERPWD, $username . ':' . $password);
        return $this;
    }

    public function ssl($verify_peer = true, $verify_host = 2, $path_to_cert = null)
    {
        if ($verify_peer) {
            $this->option(CURLOPT_SSL_VERIFYPEER, false);
            $this->option(CURLOPT_SSL_VERIFYHOST, $verify_host);
            if (isset($path_to_cert)) {
                $path_to_cert = realpath($path_to_cert);
                $this->option(CURLOPT_CAINFO, $path_to_cert);
            }
        } else {
            $this->option(CURLOPT_SSL_VERIFYPEER, false);
        }
        return $this;
    }

    public function options($options = array())
    {
 
        foreach ($options as $option_code => $option_value) {
            $this->option($option_code, $option_value);
        }

 
        curl_setopt_array($this->session, $this->options);

        return $this;
    }

    public function option($code, $value)
    {
        if (is_string($code) && !is_numeric($code)) {
            $code = constant('CURLOPT_' . strtoupper($code));
        }

        $this->options[$code] = $value;
        return $this;
    }


    public function create($url)
    {

        if ( ! preg_match('!^\w+://! i', $url)) {
            $url = url($url);
        }

        $this->url = $url;
        $this->session = curl_init($this->url);

        return $this;
    }

  
    public function execute()
    {
     
        if ( ! isset($this->options[CURLOPT_TIMEOUT])) {
            $this->options[CURLOPT_TIMEOUT] = 30;
        }
        if ( ! isset($this->options[CURLOPT_RETURNTRANSFER])) {
            $this->options[CURLOPT_RETURNTRANSFER] = true;
            $this->options[CURLOPT_RETURNTRANSFER] = 1;
            $this->options[CURLOPT_RETURNTRANSFER] = TRUE;
            $this->options[CURLOPT_USERAGENT] = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:52.0) Gecko/20100101 Firefox/52.0";
            $this->options[CURLOPT_COOKIEJAR] = "cookie.txt";
            $this->options[CURLOPT_COOKIEFILE] = "cookie.txt";
        }
        if ( ! isset($this->options[CURLOPT_FAILONERROR])) {
            $this->options[CURLOPT_FAILONERROR] = true;
        }

    
        if ( ! ini_get('safe_mode') && ! ini_get('open_basedir')) {
 
            if ( ! isset($this->options[CURLOPT_FOLLOWLOCATION])) {
                $this->options[CURLOPT_FOLLOWLOCATION] = true;
            }
        }

        if ( ! empty($this->headers)) {
            $this->option(CURLOPT_HTTPHEADER, $this->headers);
        }

        $this->options();

      
        $this->response = curl_exec($this->session);
        $this->info = curl_getinfo($this->session);


        if ($this->response === false) {
            $errno = curl_errno($this->session);
            $error = curl_error($this->session);

            curl_close($this->session);
            $this->setDefaults();

            $this->error_code = $errno;
            $this->error_string = $error;

            $this->last_response = $this->response;

            return false;
        } else {

            curl_close($this->session);
            $this->last_response = $this->response;
            $this->setDefaults();
            return $this->last_response;
        }
    }

    public function isEnabled()
    {
        return function_exists('curl_init');
    }

    public function debug()
    {
        echo "=============================================<br/>\n";
        echo "<h2>CURL Test</h2>\n";
        echo "=============================================<br/>\n";
        echo "<h3>Response</h3>\n";
        echo "<code>" . nl2br(htmlentities($this->last_response)) . "</code><br/>\n\n";

        if ($this->error_string) {
                echo "=============================================<br/>\n";
                echo "<h3>Errors</h3>";
                echo "<strong>Code:</strong> " . $this->error_code . "<br/>\n";
                echo "<strong>Message:</strong> " . $this->error_string . "<br/>\n";
        }

        echo "=============================================<br/>\n";
        echo "<h3>Info</h3>";
        echo "<pre>";
        print_r($this->info);
        echo "</pre>";
    }

    public function debugRequest()
    {
        return array(
            'url' => $this->url
        );
    }

    public function setDefaults()
    {
        $this->response = '';
        $this->headers = array();
        $this->options = array();
        $this->error_code = null;
        $this->error_string = '';
        $this->session = null;
    }

}

Class CurlException extends Exception {}
