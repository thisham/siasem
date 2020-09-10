<?php

class Database_PDO
{
    private $host = NAMA_NH;
	private $user = NAMA_UN;
	private $pass = NAMA_KS;
	private $name   = NAMA_PD;

	private $dbh;
	private $stmt;
	private $result;

    function __construct($stmt = null) {
        try {
            $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->name . "", $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            print $th->getMessage();
        }
        $this->stmt = $stmt;
    }

    function kueri($kueri)
    {
        $this->stmt = $this->dbh->prepare($kueri);
        return $this;
    }

    function ikat($var = [])
    {
        $valarr = array_values($var);
        $keyarr = array_keys($var);
        for ($i=0; $i < count($valarr); $i++) { 
            $valarr[$i] = htmlspecialchars($valarr[$i]);
            $this->stmt->bindParam($keyarr[$i], $valarr[$i]);
        }

        return $this;
    }

    function eksekusi()
    {
        $this->stmt->execute();
        return $this;
    }

    function hasil_jamak()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->tutup();
    }

    function hasil_tunggal()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
        $this->tutup();
    }

    function baris_terefek()
    {
        return $this->stmt->rowCount();
        $this->tutup();
    }

    function tutup()
    {
        $this->stmt->closeCursor();
    }
}
