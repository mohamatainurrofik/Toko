<?php
require_once('connect.php');
class EntryClass extends connectionClass
{
    public function addEntry($name, $time)
    {
        $insert = "Insert into webentry (Name,Time) values ('$name','$time')";
        $this->query($insert);
    }
}
