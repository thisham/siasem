<?php 

class p_berkas
{

    function __construct($var = '') 
    {
        $this->var = (object) $var;
    }

    function setFolder($var = '')
    {
        if ($var != '') {
            $var = $var . '/';
        }
        $this->var = 'assets/files/' . $var;
        return $this;
    }

    function setFile($var = '')
    {
        $this->var = DIREKTORI . '/' . $var;
    }

    function upload($name = '', $file = '')
    {
        $fileType = explode('.', $file['name']);
        $fileAddr = $this->var . $name . '.' . end($fileType);
        move_uploaded_file($file['tmp_name'], DIREKTORI . '/' . $fileAddr);
        return $fileAddr;
    }

    function delete()
    {
        $fileCond = file_exists($this->var);
        if ($fileCond) {
            unlink($fileCond);
        }

        return $fileCond;
    }
}
