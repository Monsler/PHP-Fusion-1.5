<?php
namespace devstudio\modules;

use std, gui, framework, devstudio;


class MainModule extends AbstractModule
{

    /**
     * @event timer.action 
     */
    function doTimerAction(ScriptEvent $e = null)
    {
        global $code;
        foreach ($code as $v){
            $save .= $v;
        }
        $v = 0;
        file_put_contents("save.bin", base64_encode($save));
        file_put_contents("brick.bin", base64_encode($this->listViewAlt->itemsText));
        
        #print_r($code);
    }

    /**
     * @event timerAlt.action 
     */
    function doTimerAltAction(ScriptEvent $e = null)
    {    
        $text = str_ireplace("[ ОШИБКА ] - Ошибка на строке 6 - [ expects parameter 1 to be valid callback ]
", "", $this->textArea->text);
$this->textArea->text = $text;

    }

    /**
     * @event search.action 
     */
    function doSearchAction(ScriptEvent $e = null)
    {    
    global $list, $tx__var;
        if($this->edit->text == ""){
            $this->listView->itemsText = $list;
        }else{
        $this->listView->items->clear();
      
            $arr = str::lines($list);
            $in = "".$this->edit->text;
            $res = array();
            

            foreach ($arr as $v){
                if(stripos($v, $in)){
                    $resc = count($res)+1;
                    $res[$resc] = $v;
                }
               
            }
             #var_dump($res);
             $resc = 0;
             foreach ($res as $m){
                 $result .= $m."
";
             }
             $this->listView->itemsText .=       $this->listView->items->insert(0,"Результаты поиска по '".$in."':
".$result);
             $result = "";
         
        }
    }

    /**
     * @event scriptor.action 
     */
    function doScriptorAction(ScriptEvent $e = null)
    {    
        $this->search->call();
        $this->scriptor->enable = false;
    }








}
