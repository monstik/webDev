<?php


namespace php\classes;


class Data
{
    private $fileName;
    private $messages;

    public function getMessages()
    {
        return $this->messages;
    }

    public function __construct($fileName)
    {
        $this->fileName = $fileName;

    }


    function writeData($message)
    {
        file_put_contents($this->fileName, "{$message}", FILE_APPEND);

    }


    function readData()
    {
        $tempData = file_get_contents($this->fileName);
        $tempData = str_replace("\n", "", $tempData);
        $tempData = explode("***", $tempData);
        array_pop($tempData);

        foreach ($tempData as $datum) {
            $this->messages[] = mb_split("===", $datum);
        }

        return $this->messages;
    }

}