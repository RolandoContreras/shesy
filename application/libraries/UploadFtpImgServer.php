<?php
class UploadFtpImgServer {
    protected $_hostFtp;
    protected $_userFtp;
    protected $_passwordFtp;
    protected $_file;
    protected $_conecFtp;
    
    
    function __construct()
    {
        $this->_ci =& get_instance();
        $this->_hostFtp = "wavelinetwork.com";
        $this->_userFtp = "ftp.waveline";
        $this->_passwordFtp = "Erb1u?14";
        $this->_file = "/imagenes/";
        $this->_conecFtp = ftp_connect($this->_hostFtp); 
    }
    
    
    function connect(){
        $resultado = ftp_login($this->_conecFtp, $this->_userFtp, $this->_passwordFtp);
        $result = ! ((! $this->_conecFtp) || (! $resultado));
        ftp_pasv($this->_conecFtp, true);
        return $result;
    }
    function upFile($remoteFile, $localFile)
    {
        ftp_put($this->_conecFtp, $remoteFile, $localFile, FTP_BINARY);
        ftp_chmod($this->_conecFtp, 0777, $remoteFile);
    }
    
    function newDirectory($ruta, $nomdir)
    {
        ftp_chdir($this->_conecFtp, $ruta);
        if (!@ftp_chdir($this->_conecFtp, $nomdir)) {
                @ftp_mkdir($this->_conecFtp, $nomdir);
                @ftp_chmod($this->_conecFtp, 0777, $nomdir);
        }
    }
    function existe($remote_file){
        return (@ftp_chdir($this->_conecFtp, $remote_file));
    }
    
    function delete ($remote_file)
    {
    	return ftp_delete($this->_conecFtp, $remote_file);
    }
    function closeConect()
    {
        ftp_close($this->_conecFtp);
    }
    
    
}