<?php


namespace php\classes;


class Messages
{
    private $messages;
    private $data;
    public function __construct($filename)
    {
        $this->data = new Data($filename);
        $this->messages = $this->data->readData();
    }


    public function addMessage($message)
    {
        $this->data->writeData($message);
    }

    public function displayMessages(){
       $this->messages = array_reverse($this->messages);
       foreach ($this->messages as $message) {
           printf(" <li>
           <div class=\"comment\">
               <h2>$message[0]:</h2>
               <p>$message[1]</p>
               <p class=\"data\">$message[2]</p>
    
           </div>
       </li> ") ;
       }

    }

}