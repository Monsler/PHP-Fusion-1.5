<?php
namespace devstudio\forms;

use std, gui, framework, devstudio;


class build extends AbstractForm
{

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $this->icons->add(new UXImage("res://.data/img/logo.png"));
    }

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
                $t = $this->FileChooser->execute();
        if($t){
            fs::copy("res://.data/build/win/Sim_run.exe", $this->FileChooser->file."/Project.exe");
            alert("Сборка завершена! Для использования необходимо установить jre 1.8.0.");
            global $code;
            foreach ($code as $v){
                $compile .= $v;
            }
            file_put_contents($this->FileChooser->file."/phpModule.dll", '
use framework, gui, std;
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    
}
function placeErr($v){
}
function msg_construct_($v){

}
set_error_handler([$this, "myErrorHandler"], E_ALL);            
global $___compile; $___compile = true;
'.$compile);
        }
        $this->hide();
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
               $t = $this->FileChooser->execute();
        if($t){
            fs::copy("res://.data/build/ino/Sim_run.jar", $this->FileChooser->file."/Project.jar");
            alert("Сборка завершена! Для использования необходимо установить jre 1.8.0.");
            global $code;
            foreach ($code as $v){
                $compile .= $v;
            }
            file_put_contents($this->FileChooser->file."/phpModule.dll", '
use framework, gui, std;
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    
}
function placeErr($v){
}
function msg_construct_($v){

}
set_error_handler([$this, "myErrorHandler"], E_ALL);            
global $___compile; $___compile = true;
'.$compile);
        }
        $this->hide();
    }

}
