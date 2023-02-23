<?php
namespace devstudio\forms;

use std, gui, framework, devstudio;


class collection extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        $this->hide();
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
    global $code, $collection;
        $asker = UXDialog::input("Введите имя новой ячейки коллекции: ");
        if($asker){
           #$this->listView->items->add($asker);
            #$this->label->hide();
            foreach ($code as $v){
                $comp_code .= "
".$v;
            }
            $collection[$asker."_compile"] = ":code:".$comp_code;
            $collection[$asker."_bricks"] = ":brick:".$this->form(MainForm)->listViewAlt->itemsText;
            foreach ($collection as $v){
                $is .= "
".$v;
            }
            file_put_contents("collection.bin", $is);
            #file_put_contents("collection_brick.bin");
        }
        
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        
    }


}
