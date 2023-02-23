<?php
namespace devstudio\forms;

use std, gui, framework, devstudio;


class setting extends AbstractForm
{

    /**
     * @event listView.click-2x 
     */
    function doListViewClick2x(UXMouseEvent $e = null)
    {    
        if($this->listView->selectedIndex == 0){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->x";
            }
        }
        if($this->listView->selectedIndex == 1){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->y";
            }
        }
        
        if($this->listView->selectedIndex == 2){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->width";
            }
        }
        if($this->listView->selectedIndex == 3){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->height";
            }
        }
        if($this->listView->selectedIndex == 4){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->height";
            }
        }
        if($this->listView->selectedIndex == 5){
                $this->edit->text .= " . ";
        }
        if($this->listView->selectedIndex == 6){
            $ask = UXDialog::input("Имя объекта:");
            if($ask){
                $this->edit->text .= " $".$ask."->selectedIndex";
            }
        }
        #end
    }

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        $this->edit->text .= " + ";
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $this->edit->text = "";
        $this->icons->add(new UXImage("res://.data/img/logo.png"));
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {
        $this->edit->text .= " - ";
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    {
       UXClipboard::setText($this->edit->text);
       alert("Скопировано!");
    }

    /**
     * @event button4.action 
     */
    function doButton4Action(UXEvent $e = null)
    {
        $this->edit->text .= " / ";
    }

    /**
     * @event button5.action 
     */
    function doButton5Action(UXEvent $e = null)
    {
        $this->edit->text .= " / ";
    }


}
