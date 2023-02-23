<?php
namespace devstudio\forms;

use game;
use Throwable;
use std, gui, framework, devstudio;


class MainForm extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
    
    global $code;
    foreach ($code as $v){
        $runner .= $v;
    }
        eval('use framework, gui, std;
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    $this->textArea->text .= "Ошибка на строке $errline - [ $errstr ]
";
}
function placeErr($v){
    global $ima_err;
    $ima_err->text .= "[ ОШИБКА ] - Ошибка - [ ".$v." ]
";
}
function msg_construct_($v){
    global $ima_err;
    $ima_err->text .= "[ ИНФО ] ".$v." 
";
}
set_error_handler([$this, "myErrorHandler"], E_ALL);
global $ima_err; $text = str_ireplace("
[ ОШИБКА ] - Ошибка на строке 16 - [ expects parameter 1 to be valid callback ]","",$ima_err->text );
$text1 = str_ireplace("[ ОШИБКА ] - Ошибка на строке 16 - [ expects parameter 1 to be valid callback ]
","",$ima_err->text );
$ima_err->text = $text1;'.$runner);

    }

    /**
     * @event listView.click-2x  
     */
    function doListViewClick2x(UXMouseEvent $e = null)
    {  
    #Добавить физику, списки
        if($this->listView->selectedItem == "Создать форму"){
            $ask = UXDialog::input("Имя формы (Только англ. буквы):");
            if($ask){
                $this->listViewAlt->items->add("Создать форму ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.' = new UXForm;$'.$ask.'->width=500;$'.$ask.'->height=400;'.'$'.$ask.'->title = "'.$ask.'"; global $'.$ask.'_0xfe; $'.$ask.'_0xfe = new UXPanel; $'.$ask.'_0xfe->backgroundColor = "white"; $'.$ask.'_0xfe->anchors = ["bottom" => true, "left" =>true, "top" => true, "right" => true]; $'.$ask.'_0xfe->minWidth = $'.$ask.'->width+2; $'.$ask.'_0xfe->minHeight = $'.$ask.'->height+2; $'.$ask.'->add($'.$ask.'_0xfe); $'.$ask.'_0xfe->borderStyle = "NONE"; $'.$ask.'_0xfe->x = -2; $'.$ask.'_0xfe->y = -2; $'.$ask.'->icons->add(new UXImage("res://.data/img/winform.png"));
';
            }
            
        }
        
        if($this->listView->selectedItem == "Показать форму"){
            $ask = UXDialog::input("Имя формы (Только англ. буквы):");
            if($ask){
                $this->listViewAlt->items->add("Показать форму ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = '$'.$ask.'->show();'.'
';
            }
            }
            if($this->listView->selectedItem == "Установить заголовок форме"){
            $ask = UXDialog::input("Имя формы (Только англ. буквы):");
            $ask1 = UXDialog::input("Текст:");
            if($ask){
                $this->listViewAlt->items->add("Установить форме ($ask) заголовок ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.'->title='.$ask1.';'.'
';
         }
        }
        if($this->listView->selectedItem == "При нажатии на объект"){
            $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
            if($ask){
                $this->listViewAlt->items->add("Нажат объект ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.'->on("click", function () use ($'.$ask.'){
';
         }
        }
        if($this->listView->selectedItem == "Закрыть событие"){            
                $this->listViewAlt->items->add("Закрыть событие");
                global $code;
                $count = count($code)+1;
                $code[$count] = '});'.'
';
        }
        if($this->listView->selectedItem == "Завершить приложение"){
       
                $this->listViewAlt->items->add("Закрыть программу");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $___compile; if($___compile == true){app::shutdown();}else{msg_construct_("Закрытие в симуляции недоступно.");}'.'
';

        }
         if($this->listView->selectedItem == "Создать кнопку"){
        $ask = UXDialog::input("Имя кнопки (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Создать кнопку ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.' = new UXButton;$'.$ask.'->width = 100;$'.$ask.'->height = 30;$'.$ask.'->text = "Кнопка";
';
}
        }
        if($this->listView->selectedItem == "Добавить объект на форму"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Добавить объект ($ask) на форму ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask1.', $'.$ask.';$'.$ask1.'->add($'.$ask.');
';
}
        }
        if($this->listView->selectedItem == "Установить курсор руки"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить курсор руки объекту ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.'->cursor = "HAND";
';
}
        }
       if($this->listView->selectedItem == "Установить мин. размер формы"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        $ask1 = UXDialog::input("X размер:");
        $ask2 = UXDialog::input("Y размер:");
        if($ask){
                $this->listViewAlt->items->add("Установить минимальный размер формы ($ask) размер: ($ask1, $ask2)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';$'.$ask.'->minWidth = '.$ask1.';$'.$ask.'->minHeight = '.$ask2.';
';
}
        } 
        
         if($this->listView->selectedItem == "Добавить код"){
        $ask = UXDialog::input("Код:");
        if($ask){
                $this->listViewAlt->items->add("PHP ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'eval('.$ask.');
';
}
        } 
        
        
         if($this->listView->selectedItem == "Глобализовать переменную"){
        $ask = UXDialog::input("Имя переменной (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Глобализовать переменную ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.';
';
}
        } 
        if($this->listView->selectedItem == "Добавить к переменной"){
        $ask = UXDialog::input("Имя переменной (Только англ. буквы):");
        $ask1 = UXDialog::input("Число:");
        if($ask){
                $this->listViewAlt->items->add("Добавить значение ($ask1) к переменной ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = '$'.$ask.' += '.$ask1.';
';
}
        } 
        if($this->listView->selectedItem == "Создать текст"){
        $ask = UXDialog::input("Имя текста (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Создать текст ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXLabel; $'.$ask.'->text = "Текст";
';
}
        } 
        
         if($this->listView->selectedItem == "Изменить текст объекта"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Текст:");
        if($ask){
                $this->listViewAlt->items->add("Изменить текст объекта ($ask) на ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->text = '.$ask1.';
';
}
        } 
        
        if($this->listView->selectedItem == "Переместить объект"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Позиция X:");
        $ask2 = UXDialog::input("Позиция Y:");
        if($ask){
                $this->listViewAlt->items->add("Поместить объект ($ask) в (X: $ask1, Y: $ask2)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->x = '.$ask1.'; $'.$ask.'->y = '.$ask2.';
';
}
        } 
        
        if($this->listView->selectedItem == "При закрытии формы"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("При закрытии формы ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->on("close", function () use($'.$ask.'){
';
}
        } 
        
         if($this->listView->selectedItem == "Показать сообщение"){
        $ask = UXDialog::input("Текст:");
        if($ask){
                $this->listViewAlt->items->add("Показать сообщение ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'alert('.$ask.');
';
}
        } 
        
        if($this->listView->selectedItem == "Создать таймер"){
        $ask = UXDialog::input("Имя таймера (Только англ. буквы):");
        $ask1 = UXDialog::input("Интервал (мс.):");
        if($ask){
                $this->listViewAlt->items->add("Создать таймер ($ask) с интервалом ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new TimerScript; $'.$ask.'->interval = '.$ask1.';$'.$ask.'->autoStart = true;
';
}
        } 
        
        if($this->listView->selectedItem == "При работе таймера"){
        $ask = UXDialog::input("Имя таймера (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("При работе таймера ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->on("action", function () use ($'.$ask.'){;
';
}
        } 
        
        if($this->listView->selectedItem == "Включить таймер"){
        $ask = UXDialog::input("Имя таймера (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Включить таймер ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->enable = true;
';
}
        } 
        
        
        
        if($this->listView->selectedItem == "Повторять вечно"){
     
                $this->listViewAlt->items->add("Повторять вечно:");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'while(true){
';

        } 
        
        if($this->listView->selectedItem == "Повторять N раз"){
        $ask = UXDialog::input("Кол-во раз:");
        if($ask){
                $this->listViewAlt->items->add("Повторять ($ask) раз:");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'for ($i = 0; $i < '.$ask.'; $i++ ){
';
}
        } 
        if($this->listView->selectedItem == "Закрыть событие управления"){
     
                $this->listViewAlt->items->add("Закрыть событие управления");
                global $code;
                $count = count($code)+1;
                $code[$count] = '}
';

        } 
        
              if($this->listView->selectedItem == "Создать скрипт"){
        $ask = UXDialog::input("Имя скрипта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Создать скрипт ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new MacroScript;
';
}
        } 
        
        if($this->listView->selectedItem == "Запустить скрипт"){
        $ask = UXDialog::input("Имя скрипта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Запустить скрипт ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->call();
';
}
        } 
        
        if($this->listView->selectedItem == "При старте скрипта"){
        $ask = UXDialog::input("Имя скрипта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("При старте скрипта ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->on("action", function () use ($'.$ask.'){
';
}
        } 
        
        if($this->listView->selectedItem == "Создать фигуру"){
        $ask = UXDialog::input("Имя фигуры (Только англ. буквы):");
        $ask1 = UXDialog::input("Ширина:");
        $ask2 = UXDialog::input("Высота:");
        if($ask){
                $this->listViewAlt->items->add("Создать фигуру ($ask) (W: $ask1, H: $ask2)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXPanel; $'.$ask.'->minWidth = '.$ask1.'; $'.$ask.'->minHeight = '.$ask2.';
';
}
        } 
        
        if($this->listView->selectedItem == "Отключить расширение формы"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Отключить расширение формы ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->resizable = false;
';
}
        } 
        
        if($this->listView->selectedItem == "Включить расширение формы"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Включить расширение формы ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->resizable = true;
';
}
        } 
        
        if($this->listView->selectedItem == "Установить иконку форме"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        $ask1 = UXDialog::input("Путь к иконке (PNG/JPG):");
        if($ask){
        
                $this->listViewAlt->items->add("Установить иконку из ($ask1) форме ($ask)");
                global $code;
                $count = count($code)+1;
               
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->icons->add(new UXImage("'.$ask1.'"));
';
}
        } 
        if($this->listView->selectedItem == "Установить цвет фона форме"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        $ask1 = UXDialog::input("Цвет (Напр. #FF0000):");
        if($ask){
                $this->listViewAlt->items->add("Установить форме ($ask) цвет ($ask1)");
                global $code;
                $count = count($code)+1;
               
                $code[$count] = 'global $'.$ask.'_0xfe; $'.$ask.'_0xfe->backgroundColor = UXColor::of("'.$ask1.'");
';
}
        } 
        
        if($this->listView->selectedItem == "При нажатии на задний фон"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("При нажатии на задний фон формы ($ask):");
                global $code;
                $count = count($code)+1;
               
                $code[$count] = 'global $'.$ask.'_0xfe; $'.$ask.'_0xfe->on("click", function () use ($'.$ask.'_0xfe){
';
}
        } 
        if($this->listView->selectedItem == "Скрыть форму"){
        $ask = UXDialog::input("Имя формы (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Скрыть форму ($ask):");
                global $code;
                $count = count($code)+1;
               
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->hide();
';
}
        } 
        
        if($this->listView->selectedItem == "Растягивание влево и вправо"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Растягивание влево и вправо ($ask)");
                global $code;
                $count = count($code)+1;
               
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["left" => true,"right" => true]; 
';
}
        } 
        
        if($this->listView->selectedItem == "Установить размер объекта"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Ширина:");
        $ask2 = UXDialog::input("Высота:");
        if($ask){
                $this->listViewAlt->items->add("Установить размер объекта ($ask) (W:$ask1, H:$ask2)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->size = ['.$ask1.', '.$ask2.'];
';
}
        } 
        
         if($this->listView->selectedItem == "Убрать растягивание"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Убрать растягивание объекту ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = [0];
';
}
        } 
        
         if($this->listView->selectedItem == "Растягивание вправо"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить растягивание вправо ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["right" => true];
';
}
        } 
        
        if($this->listView->selectedItem == "Растягивание влево"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить растягивание влево ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["left" => true];
';
}
        } 
        
        if($this->listView->selectedItem == "Создать звук"){
        $ask = UXDialog::input("Имя звука (Только англ. буквы):");
        $ask1 = UXDialog::input("Путь к звуку:");
        if($ask){
                $this->listViewAlt->items->add("Создать звук с именем ($ask) из файла ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new MediaPlayerScript(); $'.$ask.'->open('.$ask1.');
';
}
        } 
        
        if($this->listView->selectedItem == "Проиграть звук"){
        $ask = UXDialog::input("Имя звука (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Проиграть звук ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->play();
';
}
        }
        
        if($this->listView->selectedItem == "Остановить звук"){
        $ask = UXDialog::input("Имя звука (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Остановить звук ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->stop();
';
}
        }
        
        if($this->listView->selectedItem == "Курсор на объекте"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Курсор на объекте ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->on("mouseEnter", function () use ($'.$ask.'){
';
}
        }
        
        if($this->listView->selectedItem == "Приостановить звук"){
        $ask = UXDialog::input("Имя звука (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Приостановить звук ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->pause();
';
}
        }
        if($this->listView->selectedItem == "Установить переменной"){
        $ask = UXDialog::input("Имя переменной (Только англ. буквы):");
        $ask1 = UXDialog::input("Значение:");
        if($ask){
                $this->listViewAlt->items->add("Установить переменной ($ask) значение ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = '$'.$ask.' = '.$ask1.';
';
}
        }

        if($this->listView->selectedItem == "Если значения равны"){
        $ask = UXDialog::input("Значение 1:");
        $ask1 = UXDialog::input("Равняется:");
        if($ask){
                $this->listViewAlt->items->add("Если ($ask) == ($ask1):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'if ('.$ask.' == '.$ask1.'){
';
}
        }
        
        if($this->listView->selectedItem == "Выравнивание текста по центру"){
        $ask = UXDialog::input("Имя текста (Только англ. буквы):");
       
        if($ask){
                $this->listViewAlt->items->add("Выравнивание текста по центру ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->alignment = CENTER;
';
}
        }
        
if($this->listView->selectedItem == "Если иное"){
                $this->listViewAlt->items->add("Если иное:");
                global $code;
                $count = count($code)+1;
                $code[$count] = '}else{
';
        }
        
        if($this->listView->selectedItem == "Установить текст кнопке"){
        $ask = UXDialog::input("Имя кнопки (Только англ. буквы):");
        $ask1 = UXDialog::input("Текст:");
        if($ask){
                $this->listViewAlt->items->add("Установить кнопке ($ask) текст ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->text = '.$ask1.';
';
}
        }
        
        if($this->listView->selectedItem == "Установить громкость звука"){
        $ask = UXDialog::input("Имя звука (Только англ. буквы):");
        $ask1 = UXDialog::input("Громкость (Стандарт: 1):");
        if($ask){
                $this->listViewAlt->items->add("Установить звуку ($ask) громкость ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->volume = '.$ask1.';
';
}
        }
        
         if($this->listView->selectedItem == "Растягивание книзу"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) растягивание книзу");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["bottom"=>true];
';
}
        }
        
        if($this->listView->selectedItem == "Растягивание книзу и вправо"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) растягивание книзу и влево");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["bottom"=>true, "right"=>true];
';
}
        }
        
        if($this->listView->selectedItem == "Растягивание книзу и вверх"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) растягивание книзу и вверх");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["bottom"=>true, "top"=>true];
';
}
        }
        
        if($this->listView->selectedItem == "Растягивание во всю форму"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) растягивание во всю форму");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["bottom"=>true, "top"=>true, "left"=>true, "right"=>true];
';
}
        }
        
        if($this->listView->selectedItem == "Удалить объект"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Удалить объект ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->free();
';
}
        }
        
        if($this->listView->selectedItem == "Спросить у пользователя"){
        $ask = UXDialog::input("Имя переменной (Только англ. буквы):");
        $ask1 = UXDialog::input("Текст:");
        if($ask){
                $this->listViewAlt->items->add("Спросить ($ask1) у пользователя и сохранить в ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = UXDialog::input('.$ask1.');
';
}
        }
        
         if($this->listView->selectedItem == "Если значения не равны"){
        $ask = UXDialog::input("Значение 1:");
        $ask1 = UXDialog::input("Значение 2:");
        if($ask){
                $this->listViewAlt->items->add("Если ($ask) не равняется ($ask1):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'if('.$ask.' !== '.$ask1.'){
';
}
        }
        
        if($this->listView->selectedItem == "Создать текстовое поле"){
        $ask = UXDialog::input("Имя поля (Только англ. буквы):");
        $ask1 = UXDialog::input("Подсказка ввода:");
        if($ask){
                $this->listViewAlt->items->add("Создать текстове поле ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXTextField; $'.$ask.'->promptText = '.$ask1.';
';
}
        }
        
        if($this->listView->selectedItem == "Установить переменной текст из поля"){
        $ask = UXDialog::input("Имя поля (Только англ. буквы):");
        $ask1 = UXDialog::input("Имя переменной (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить переменной ($ask1) текст из поля ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask1.' = $'.$ask.'->text;
';
}
        }
        
        if($this->listView->selectedItem == "Открыть ссылку в браузере"){
        $ask = UXDialog::input("Ссылка:");
        if($ask){
                $this->listViewAlt->items->add("Открыть ссылку ($ask) в браузере");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'browse('.$ask.');
';
}
        }
        
        if($this->listView->selectedItem == "Создать флажок"){
        $ask = UXDialog::input("Имя флажка:");
        if($ask){
                $this->listViewAlt->items->add("Создать флажок ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXCheckbox;
';
}
        }
        
        if($this->listView->selectedItem == "Изменить позицию X"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("На:");
        if($ask){
                $this->listViewAlt->items->add("Изменить позицию X объекта ($ask) на ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->x .= '.$ask1.';
';
}
        }
        
        if($this->listView->selectedItem == "Установить позицию X"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("На:");
        if($ask){
                $this->listViewAlt->items->add("Установить позицию X объекта ($ask) на ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->x = '.$ask1.';
';
}
        }
        
         if($this->listView->selectedItem == "Включить флажок"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        
        if($ask){
                $this->listViewAlt->items->add("Включить флажок ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->selected = true;
';
}
        }
        
        if($this->listView->selectedItem == "Отключить флажок"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        
        if($ask){
                $this->listViewAlt->items->add("Отключить флажок ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->selected = false;
';
}
        }
        
       if($this->listView->selectedItem == "Изменить позицию Y"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("На:");
        if($ask){
                $this->listViewAlt->items->add("Изменить позицию Y объекта ($ask) на ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->y .= '.$ask1.';
';
}
        }
        
         if($this->listView->selectedItem == "Установить позицию Y"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("На:");
        if($ask){
                $this->listViewAlt->items->add("Установить позицию Y объекта ($ask) на ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->y = '.$ask1.';
';
}
        }
        
        if($this->listView->selectedItem == "Если флажок включён"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Если флажок ($ask) включён:");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; if($'.$ask.'->selected == true){
';
}
        }
        
        if($this->listView->selectedItem == "Если флажок выключен"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Если флажок ($ask) выключен:");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; if($'.$ask.'->selected == false){
';
}
        }
        
        if($this->listView->selectedItem == "Создать список"){
        $ask = UXDialog::input("Имя списка (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Создать список ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXListView; $'.$ask.'->width = 150; $'.$ask.'->height = 150;
';
}
        }
        
        if($this->listView->selectedItem == "Добавить элемент к списку"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Текст элемента:");
        if($ask){
                $this->listViewAlt->items->add("Добавить элемент ($ask1) к списку ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->items->add('.$ask1.');
';
}
        }
        
        if($this->listView->selectedItem == "Если выбран элемент списка"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Номер элемента:");
        if($ask){
                $this->listViewAlt->items->add("Если выбран элемент под номером ($ask1) в списке ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; if($'.$ask.'->selectedIndex == '.$ask1.'){
';
}
        }
        
        if($this->listView->selectedItem == "Повернуть объект"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Градус поворота (0-360):");
        if($ask){
                $this->listViewAlt->items->add("Повернуть объект ($ask) на ($ask1) градус(ов)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->rotate = '.$ask1.';
';
}
        }
        
        if($this->listView->selectedItem == "Удалить все элементы списка"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Удалить все элементы списка ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->items->clear();
';
}
        }
        
        if($this->listView->selectedItem == "Вывести ошибку в консоль"){
        $ask = UXDialog::input("Текст ошибки:");
        if($ask){
                $this->listViewAlt->items->add("Вывести ошибку ($ask) в консоль");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'placeErr('.$ask.');
';
}
        }
        
        if($this->listView->selectedItem == "Вывести сообщение в консоль"){
        $ask = UXDialog::input("Текст сообщения:");
        if($ask){
                $this->listViewAlt->items->add("Вывести сообщение ($ask) в консоль");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'msg_construct_('.$ask.');
';
}
        }
        
         if($this->listView->selectedItem == "Сохранить значение"){
        $ask = UXDialog::input("Имя файла:");
        $ask1 = UXDialog::input("Значение:");
        if($ask){
                $this->listViewAlt->items->add("Сохранить значение ($ask1) в файл ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $___compile; if($___compile == true){file_put_contents('.$ask.', '.$ask1.');}else{msg_construct_("Сохранение в симуляции недоступно.");}
';
}
        }
        
        if($this->listView->selectedItem == "Считать значение в переменную"){
        $ask = UXDialog::input("Имя файла:");
        $ask1 = UXDialog::input("Имя переменной:");
        if($ask){
                $this->listViewAlt->items->add("Считать значение ($ask) в переменную ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask1.'; $'.$ask1.' = false; $'.$ask1.' = file_get_contents('.$ask.');
';
}
        }
        
        if($this->listView->selectedItem == "Если значение считано"){
        $ask = UXDialog::input("Имя переменной:");
        if($ask){
                $this->listViewAlt->items->add("Считано значение ($ask):");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'if($'.$ask.'){
';
}
        }
        
        if($this->listView->selectedItem == "Получить версию среды"){
        $ask = UXDialog::input("Имя переменной:");
        if($ask){
                $this->listViewAlt->items->add("Получить версию среды в ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = phpversion();
';
}
        }
        
        if($this->listView->selectedItem == "Создать панель"){
        $ask = UXDialog::input("Имя панели (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Создать панель ($ask)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; use game; $'.$ask.' = new UXGamePane; $'.$ask.'->minWidth = 150; $'.$ask.'->minHeight = 150;
';
}
        }
        
        if($this->listView->selectedItem == "Установить цвет фона объекта"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Цвет (Напр. #FF0000):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) цвет фона ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->backgroundColor = UXColor::of("'.$ask1.'");
';
}
        }
        
        if($this->listView->selectedItem == "Растягивание вниз, влево, вправо"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        if($ask){
                $this->listViewAlt->items->add("Установить объекту ($ask) растягивание вниз, влево, вправо");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->anchors = ["left"=>true, "right"=>true, "bottom"=>true];
';
}
        }
        
        if($this->listView->selectedItem == "Установить размер интерфейса"){
        $ask = UXDialog::input("Имя объекта (Только англ. буквы):");
        $ask1 = UXDialog::input("Ширина:");
        $ask2 = UXDialog::input("Высота:");
        if($ask){
                $this->listViewAlt->items->add("Установить панели ($ask) размер (W: $ask1, H: $ask2)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.'->minWidth = '.$ask1.'; $'.$ask.'->minHeight = '.$ask2.';
';
}
        }
        
        if($this->listView->selectedItem == "--Интерфейс"){
    alert("Категория интерфейс включает в себя блоки для создания объектов.");
        }
        
        if($this->listView->selectedItem == "--Медиа"){
    alert("Категория медиа включает в себя блоки для управления медиа (звуки, видео).");
        }
        
        if($this->listView->selectedItem == "--Интернет"){
    alert("Категория интернет включает в себя блоки для вызова функций, и получения данных из интернета (картинки, файлы).");
        }
        
        if($this->listView->selectedItem == "--События"){
    alert("Категория события включает в себя блоки для управления событий объектов (напр. при нажатии на кнопку).");
        }
        
        if($this->listView->selectedItem == "--Перемещение"){
    alert("Категория перемещение включает в себя блоки для изменения пропорций объекта (напр. позиция Х).");
        }
        
        if($this->listView->selectedItem == "--Управление"){
    alert("Категория управление включает в себя блоки для управления свойствами объектов (напр. включить флажок).");
        }
        
        
                if($this->listView->selectedItem == "Комментарий, заметка"){
        $ask = UXDialog::input("Текст:");
        if($ask){
                $this->listViewAlt->items->add("^- $ask");
                global $code;
                $count = count($code)+1;
                $code[$count] = '#'.$ask.'
';
}
        }
        
         if($this->listView->selectedItem == "Создать панель с картинкой"){
        $ask = UXDialog::input("Имя панели (Только англ. буквы):");
        $ask1 = UXDialog::input("Путь к картинке:");
        if($ask){
                $this->listViewAlt->items->add("Создать панель ($ask) с картинкой ($ask1)");
                global $code;
                $count = count($code)+1;
                $code[$count] = 'global $'.$ask.'; $'.$ask.' = new UXImage('.$ask1.');
';
}
        }
        
                //block end
       
    }

function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if($errstr !== "Use of undefined constant setting - assumed 'setting'"){
    if($errstr !== "Use of undefined constant build - assumed 'build'"){
    if($errstr !== "Use of undefined constant collection - assumed 'collection'"){
    $this->textArea->text .= "[ ОШИБКА ] - Ошибка на строке $errline - [ $errstr ]
";
}
}
}
}
 
    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
   App()->addStyle("./dark.css");
   set_error_handler([$this, "myErrorHandler"], E_ALL);
   #$liner = file_get_contents("collection.bin");
   global $collection;
   #$collection = str::lines($liner);
        global $code;
        global $ima_err;
        $ima_err = $this->textArea;
        $this->minWidth = 590;
        $this->minHeight = 480;
        $this->icons->add(new UXImage("res://.data/img/logo.png"));
        if(file_exists("brick.bin")){
            if(file_exists("save.bin")){
                $f_brick = file_get_contents("brick.bin");
                $f_code = file_get_contents("save.bin");
                $codes = str::lines(base64_decode($f_code));
                foreach ($codes as $in){
                    $count = count($code)+1;
                    $code[$count] = ''.$in.'
';
                }
                $this->listViewAlt->itemsText = base64_decode($f_brick);
            }
            
        }
        
        global $list; $list = $this->listView->itemsText;
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {
    global $code;
    $count = count($code);
    unset($code[$count]);
    $this->listViewAlt->items->removeByIndex($count-1);
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    {
        global $code;
        $count = count($code);
        unset($code);
        $this->listViewAlt->items->clear();
    }
    
    /**
     * @event click-Left 
     */
    function doClickLeft(UXMouseEvent $e = null)
    {    
        
    }

    /**
     * @event button4.action 
     */
    function doButton4Action(UXEvent $e = null)
    {    
    $this->form(build)->show();
    
    }

    /**
     * @event listViewAlt.click-2x 
     */
    function doListViewAltClick2x(UXMouseEvent $e = null)
    {    
        global $code;
        foreach ($code as $v){
            $add .= $v;
        }
        alert($add);
    }

    /**
     * @event button5.action 
     */
    function doButton5Action(UXEvent $e = null)
    {    
        $this->textArea->text = "";
    }


    /**
     * @event edit.keyPress 
     */
    function doEditKeyPress(UXKeyEvent $e = null)
    {    
        $this->scriptor->enable = true;
    }

    /**
     * @event edit.step 
     */
    function doEditStep(UXEvent $e = null)
    {    
        
    }

    /**
     * @event button6.action 
     */
    function doButton6Action(UXEvent $e = null)
    {
        $this->form(setting)->show();
    }

    /**
     * @event button7.click-Left 
     */
    function doButton7ClickLeft(UXMouseEvent $e = null)
    {    
        $this->form(collection)->show();
    }














}
