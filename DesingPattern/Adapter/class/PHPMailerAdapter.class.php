<?php
    class PHPMailerAdapter{

        //Adapta os métodos já existentes de um objeto
        private $pm;

        public function __construct(){
            $this->pm = new PHPMailer;
            $thisp->pm->CharSet =  'utf-8';
        }

        public function setDebug($bool){
            $this->pm->SMTPDebug = bool;
        }

        public function setFrom($from, $name){
            $this->pm->From = $from;
            $this->pm->FromName = $name;    
        }

        public function setSubject($subject){
            $this->pm->Subject = $subject;
        }

        public function setTextBody($body){
            $this->pm->Body = $body;
            $this->pm->IsHtml(false);
        }

        public function setHtmlBody($html){
            $this->pm->MsgHTML($html);
        }

        public function addAddress($address, $name = ''){
            $this->pm->addAddress($address, $name);
        }

        public function addAttach($path, $name = ''){
            $this->pm->addAttach($path, $name);
        }
    }
?>