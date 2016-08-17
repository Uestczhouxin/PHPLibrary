<?php
class OnmpwCurl{
    private $config = array(
        'ALLOW_ORIGIN'=>false,   //是否开启允许跨域访问
        'ALLOW_ORIGIN_URL'=>array(  //允许跨域访问的网址
            'http://www.modernland.hk'
        ),
    );
    private $error_codes=array(
        0 => 'OK',
        1 => 'CURLE_UNSUPPORTED_PROTOCOL',
        2 => 'CURLE_FAILED_INIT',
        3 => 'CURLE_URL_MALFORMAT',
        4 => 'CURLE_URL_MALFORMAT_USER',
        5 => 'CURLE_COULDNT_RESOLVE_PROXY',
        6 => 'CURLE_COULDNT_RESOLVE_HOST',
        7 => '无法连接',
        8 => 'CURLE_FTP_WEIRD_SERVER_REPLY',
        9 => 'CURLE_REMOTE_ACCESS_DENIED',
        11 => 'CURLE_FTP_WEIRD_PASS_REPLY',
        13 => 'CURLE_FTP_WEIRD_PASV_REPLY',
        14=>'CURLE_FTP_WEIRD_227_FORMAT',
        15 => 'CURLE_FTP_CANT_GET_HOST',
        16 => 'CURLE_HTTP2',
        17 => 'CURLE_FTP_COULDNT_SET_TYPE',
        18 => 'CURLE_PARTIAL_FILE',
        19 => 'CURLE_FTP_COULDNT_RETR_FILE',
        21 => 'CURLE_QUOTE_ERROR',
        22 => 'CURLE_HTTP_RETURNED_ERROR',
        23 => 'CURLE_WRITE_ERROR',
        25 => 'CURLE_UPLOAD_FAILED',
        26 => 'CURLE_READ_ERROR',
        27 => 'CURLE_OUT_OF_MEMORY',
        28 => 'CURLE_OPERATION_TIMEDOUT',
        30 => 'CURLE_FTP_PORT_FAILED',
        31 => 'CURLE_FTP_COULDNT_USE_REST',
        33 => 'CURLE_RANGE_ERROR',
        34 => 'CURLE_HTTP_POST_ERROR',
        35 => 'CURLE_SSL_CONNECT_ERROR',
        36 => 'CURLE_BAD_DOWNLOAD_RESUME',
        37 => 'CURLE_FILE_COULDNT_READ_FILE',
        38 => 'CURLE_LDAP_CANNOT_BIND',
        39 => 'CURLE_LDAP_SEARCH_FAILED',
        41 => 'CURLE_FUNCTION_NOT_FOUND',
        42 => 'CURLE_ABORTED_BY_CALLBACK',
        43 => 'CURLE_BAD_FUNCTION_ARGUMENT',
        45 => 'CURLE_INTERFACE_FAILED',
        47 => 'CURLE_TOO_MANY_REDIRECTS',
        48 => 'CURLE_UNKNOWN_TELNET_OPTION',
        49 => 'CURLE_TELNET_OPTION_SYNTAX',
        51 => 'CURLE_PEER_FAILED_VERIFICATION',
        52 => 'CURLE_GOT_NOTHING',
        53 => 'CURLE_SSL_ENGINE_NOTFOUND',
        54 => 'CURLE_SSL_ENGINE_SETFAILED',
        55 => 'CURLE_SEND_ERROR',
        56 => 'CURLE_RECV_ERROR',
        58 => 'CURLE_SSL_CERTPROBLEM',
        59 => 'CURLE_SSL_CIPHER',
        60 => 'CURLE_SSL_CACERT',
        61 => 'CURLE_BAD_CONTENT_ENCODING',
        62 => 'CURLE_LDAP_INVALID_URL',
        63 => 'CURLE_FILESIZE_EXCEEDED',
        64 => 'CURLE_USE_SSL_FAILED',
        65 => 'CURLE_SEND_FAIL_REWIND',
        66 => 'CURLE_SSL_ENGINE_INITFAILED',
        67 => 'CURLE_LOGIN_DENIED',
        68 => 'CURLE_TFTP_NOTFOUND',
        69 => 'CURLE_TFTP_PERM',
        70 => 'CURLE_REMOTE_DISK_FULL',
        71 => 'CURLE_TFTP_ILLEGAL',
        72 => 'CURLE_TFTP_UNKNOWNID',
        73 => 'CURLE_REMOTE_FILE_EXISTS',
        74 => 'CURLE_TFTP_NOSUCHUSER',
        75 => 'CURLE_CONV_FAILED',
        76 => 'CURLE_CONV_REQD',
        77 => 'CURLE_SSL_CACERT_BADFILE',
        78 => 'CURLE_REMOTE_FILE_NOT_FOUND',
        79 => 'CURLE_SSH',
        80 => 'CURLE_SSL_SHUTDOWN_FAILED',
        81 => 'CURLE_AGAIN',
        82 => 'CURLE_SSL_CRL_BADFILE',
        83 => 'CURLE_SSL_ISSUER_ERROR',
        84 => 'CURLE_FTP_PRET_FAILED',
        85 => 'CURLE_RTSP_CSEQ_ERROR',
        86 => 'CURLE_RTSP_SESSION_ERROR',
        87 => 'CURLE_FTP_BAD_FILE_LIST',
        88 => 'CURLE_CHUNK_FAILED',
        89 => 'CURLE_NO_CONNECTION_AVAILABLE',
        90 => 'CURLE_SSL_PINNEDPUBKEYNOTMATCH',
        91 => 'CURLE_SSL_INVALIDCERTSTATUS',
        92 => 'CURLE_HTTP2_STREAM'
    );
    private $http_codes = array(
        0=>"Couldnt Connect",
        //[Informational 1xx]
        100=>"Continue",
        101=>"Switching Protocols",
        //[Successful 2xx]
        200=>"OK",
        201=>"Created",
        202=>"Accepted",
        203=>"Non-Authoritative Information",
        204=>"No Content",
        205=>"Reset Content",
        206=>"Partial Content",
        //[Redirection 3xx]
        300=>"Multiple Choices",
        301=>"Moved Permanently",
        302=>"Found",
        303=>"See Other",
        304=>"Not Modified",
        305=>"Use Proxy",
        306=>"(Unused)",
        307=>"Temporary Redirect",
        //[Client Error 4xx]
        400=>"Bad Request",
        401=>"Unauthorized",
        402=>"Payment Required",
        403=>"Forbidden",
        404=>"Not Found",
        405=>"Method Not Allowed",
        406=>"Not Acceptable",
        407=>"Proxy Authentication Required",
        408=>"Request Timeout",
        409=>"Conflict",
        410=>"Gone",
        411=>"Length Required",
        412=>"Precondition Failed",
        413=>"Request Entity Too Large",
        414=>"Request-URI Too Long",
        415=>"Unsupported Media Type",
        416=>"Requested Range Not Satisfiable",
        417=>"Expectation Failed",
        //[Server Error 5xx]
        500=>"Internal Server Error",
        501=>"Not Implemented",
        502=>"Bad Gateway",
        503=>"Service Unavailable",
        504=>"Gateway Timeout",
        505=>"HTTP Version Not Supported",
        521=>'Server Refused'
    );
    private $origin = '';
    private $ch;
    private $http_code = '';
    private $urlArr = array(
        'http://www.modernland.hk'
    );
    private $options = array(
        CURLOPT_URL=>'',
        CURLOPT_RETURNTRANSFER=>1,
    );
    private $errno = '';
    private $error = '';
    static private $static = array();
    public function __construct($config = array()){
        $this->config = array_merge($this->config,$config);
        $this->run();
    }
    private function run(){
        /*
         * 检测是否跨域
         */
        $this->parseOrigin();
        /*
         * 初始化curl句柄
         */
        $this->ch = curl_init();
    }
    private function parseOrigin(){
        if($this->config['ALLOW_ORIGIN']){
            $this->origin = $_SERVER['HTTP_ORIGIN'];
            if (in_array($this->origin, $this->config['ALLOW_ORIGIN_URL'])) {
                header("Access-Control-Allow-Origin:" . $this->origin);
                header("Access-Control-Allow-Credentials: true ");
            }
        }
    }
    public function get_http_code(){
        if($this->http_code != '') return $this->http_code;
        if(isset(self::$static['header'])){
            $this->http_code = self::$static['header']['http_code'];
            return $this->http_code;
        } 
        $http_code = curl_getinfo($this->ch,CURLINFO_HTTP_CODE);
        $this->http_code = $http_code;
        return $http_code;
    }
    public function error(){
        if($this->error) return $this->error;
        $errno = '';
        if(isset(self::$static['errno'])){
            $errno = self::$static['errno'];
        }else{
            $this->errno = $errno = curl_errno($this->ch);
        }
        if($errno == 0){
            $this->error = $this->http_codes[self::$static['header']['http_code']];
        }else{
            $this->error = $this->error_codes[$errno];
        }
        return $this->error;        
    }
    public function errno(){
//         if($this->errno != '') return $this->errno;
        if(isset(self::$static['errno'])){
            $errno = self::$static['errno'];
            return $errno;
        }
        self::$static['errno'] = $errno = curl_errno($this->ch);
        return $errno;
    }
    /**
     * 设置curl_setopt选项
     * 
     * @param array $options
     * @access public
     */
    public function setopt($options = array()){
        $this->options = empty($options)?$this->options:$this->onmpw_array_merge($this->options,$options);
        return $this;
    }
    private function allowOrigin(){
        $config = $this->config;
        if(!$config['ALLOW_ORIGIN']){
            return false;
        }else{
            
        }
    }
    /**
     * 检测url
     * 
     * @param array $options
     * @access public
     */
    public function checkUrl($options = array()){
        $this->options = empty($options)?$this->options:$this->onmpw_array_merge($this->options,$options);
        curl_setopt_array($this->ch, $this->options);
        $this->parseExecResult($this->ch);
    }
    private function parseExecResult($ch){
        $result = $this->exec($ch);
        if($result == curl_multi_getcontent($ch)){
            self::$static['execres'] = $result;
        }else{
            self::$static['execres'] = curl_multi_getcontent($ch);
        }
        if(!isset(self::$static['header'])){
            self::$static['header'] = curl_getinfo($ch);
            $this->http_code = self::$static['header']['http_code'];
        }
        if(!isset(self::$static['errno']))
            self::$static['errno'] = curl_errno($ch);
    }
    private function exec($ch){
        return curl_exec($ch);
    }
    private function onmpw_array_merge($arr1,$arr2){
        foreach($arr2 as $key=>$val){
            $arr1[$key] = $val;
        }
        return $arr1;
    }
    public function __destruct(){
        curl_close($this->ch);
    }
    
}
