<?php

    function noParams($output, $instruction, $order) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_end_element($output);
    }

    function varParams($output, $instruction, $order, $arg) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "var");
        xmlwriter_end_attribute($output);
        if (preg_match("/^(GF@|LF@|TF@)/", $arg) == 0) {
            fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_text($output, $arg);
        xmlwriter_end_element($output);
        xmlwriter_end_element($output);
    }

    function symbParams($output, $instruction, $order, $arg) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg)) {
            xmlwriter_text($output, "var");
        }
        else if (preg_match("/^string@(\\\d{3}|\w)*\z/", $arg)) {
            $arg = preg_replace("/^(string@)/", "", $arg);
            xmlwriter_text($output, "string");    
            
        }
        else if (preg_match("/^int@[+-]?\d+\z/", $arg)) {
            $arg = preg_replace("/^(int@)/", "", $arg);
            xmlwriter_text($output, "int");     
        }
        else if (preg_match("/^bool@(true|false)\z/", $arg)) {
            $arg = preg_replace("/^(bool@)/", "", $arg);
            xmlwriter_text($output, "bool");     
        }
        else if (preg_match("/^nil@nil\z/", $arg)) {
            $arg = preg_replace("/^(nil@)/", "", $arg);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg);
        xmlwriter_end_element($output);
        xmlwriter_end_element($output);
    }
    
    function varTypeParams($output, $instruction, $order, $arg1, $arg2) {
     
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "var");
        xmlwriter_end_attribute($output);
        if (preg_match("/^(GF@|LF@|TF@)/", $arg1) == 0) {
             fwrite(STDERR, "Problem with variable\n"); 
            exit(23);
        }
        xmlwriter_text($output, $arg1);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg2");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(string|bool|int|nil)$/", $arg2)) {
            xmlwriter_text($output, "type");
        }
        else {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg2);
        xmlwriter_end_element($output);
        xmlwriter_end_element($output);
    }

    function varSymbParams($output, $instruction, $order, $arg1, $arg2) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "var");
        xmlwriter_end_attribute($output);
        if (preg_match("/^(GF@|LF@|TF@)/", $arg1) == 0) {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_text($output, $arg1);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg2");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg2)) {
            xmlwriter_text($output, "var");
        } else if (preg_match("/^string@(\\\d{3}|\w)*\z/", $arg2)) {
            $arg2 = preg_replace("/^(string@)/", "", $arg2);
            xmlwriter_text($output, "string");     
        }
        else if(preg_match("/^int@[+-]?\d+\z/", $arg2)) {
            $arg2 = preg_replace("/^(int@)/", "", $arg2);
            xmlwriter_text($output, "int");     
        }
        else if(preg_match("/^bool@(true|false)\z/", $arg2)) {
            $arg2 = preg_replace("/^(bool@)/", "", $arg2);
            xmlwriter_text($output, "bool");     
        }
        else if (preg_match("/^nil@nil\z/", $arg2)) {
            $arg2 = preg_replace("/^(nil@)/", "", $arg2);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n"); 
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg2);
        xmlwriter_end_element($output);
        xmlwriter_end_element($output);
    }


    function varSymb12Params($output, $instruction, $order, $arg1, $arg2, $arg3) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "var");
        xmlwriter_end_attribute($output);
        if (preg_match("/^(GF@|LF@|TF@)/", $arg1) == 0) {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_text($output, $arg1);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg2");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg2)) {
            xmlwriter_text($output, "var");
        } else if (preg_match("/^string@(\\\d{3}|\w)*\z/", $arg2)) {
            $arg2 = preg_replace("/^(string@)/", "", $arg2);
            xmlwriter_text($output, "string");     
        }
        else if (preg_match("/^int@[+-]?\d+\z/", $arg2)) {
            $arg2 = preg_replace("/^(int@)/", "", $arg2);
            xmlwriter_text($output, "int");     
        }
        else if (preg_match("/^bool@(true|false)\z/", $arg2)) {
            $arg2 = preg_replace("/^(bool@)/", "", $arg2);
            xmlwriter_text($output, "bool");     
        }
        else if (preg_match("/^nil@nil\z/", $arg2)) {
            $arg2 = preg_replace("/^(nil@)/", "", $arg2);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n"); 
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg2);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg3");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg3)) {
            xmlwriter_text($output, "var");
        } else if(preg_match("/^string@(\\\d{3}|\w)*\z/", $arg3)) {
            $arg3 = preg_replace("/^(string@)/", "", $arg3);
            xmlwriter_text($output, "string");     
        }
        else if (preg_match("/^int@[+-]?\d+\z/", $arg3)) {
            $arg3 = preg_replace("/^(int@)/", "", $arg3);
            xmlwriter_text($output, "int");     
        }
        else if (preg_match("/^bool@(true|false)\z/", $arg3)) {
            $arg3 = preg_replace("/^(bool@)/", "", $arg3);
            xmlwriter_text($output, "bool");     
        }
        else if (preg_match("/^nil@nil\z/", $arg3)) {
            $arg3 = preg_replace("/^(nil@)/", "", $arg3);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg3);
        xmlwriter_end_element($output);

        xmlwriter_end_element($output);
    }

    function varLabel12Params($output, $instruction, $order, $arg1, $arg2, $arg3) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "label");
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg1);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg2");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg2)) {
            xmlwriter_text($output, "var");
        } else if (preg_match("/^string@(\\\d{3}|\w)*\z/", $arg2)) {
            $arg2 = preg_replace("/^(string@)/", "", $arg2);
            xmlwriter_text($output, "string");     
        }
        else if (preg_match("/^int@[+-]?\d+\z/", $arg2)) {
            $arg2 = preg_replace("/^(int@)/", "", $arg2);
            xmlwriter_text($output, "int");     
        }
        else if (preg_match("/^bool@(true|false)\z/", $arg2)) {
            $arg2 = preg_replace("/bool@/", "", $arg2);
            xmlwriter_text($output, "bool");  
          
        }
        else if (preg_match("/^nil@nil\z/", $arg2)) {
            $arg2 = preg_replace("/^(nil@)/", "", $arg2);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n");
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg2);
        xmlwriter_end_element($output);
        xmlwriter_start_element($output, "arg3");
        xmlwriter_start_attribute($output, "type");
        if (preg_match("/^(GF@|LF@|TF@)/", $arg3)) {
            xmlwriter_text($output, "var");
        } else if (preg_match("/^string@(\\\d{3}|\w)*\z/", $arg3)) {
            $arg3 = preg_replace("/^(string@)/", "", $arg3);
            xmlwriter_text($output, "string");     
        }
        else if(preg_match("/^int@[+-]?\d+\z/", $arg3)) {
            $arg3 = preg_replace("/^(int@)/", "", $arg3);
            xmlwriter_text($output, "int");     
        }
        else if (preg_match("/^bool@(true|false)\z/", $arg3)) {
            $arg3 = preg_replace("/^(bool@)/", "", $arg3);
            xmlwriter_text($output, "bool");     
        }
        else if (preg_match("/^nil@nil\z/", $arg3)) {
            $arg3 = preg_replace("/^(nil@)/", "", $arg3);
            xmlwriter_text($output, "nil");     
        }
        else {
             fwrite(STDERR, "Error in variable\n"); 
            exit(23);
        }
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg3);
        xmlwriter_end_element($output);

        xmlwriter_end_element($output);
    }

    function labelParams($output, $instruction, $order, $arg) {
        xmlwriter_start_element($output, "instruction");
        xmlwriter_start_attribute($output, "order");
        xmlwriter_text($output, $order);
        xmlwriter_end_attribute($output);
        xmlwriter_start_attribute($output, "opcode");
        xmlwriter_text($output, $instruction);
        xmlwriter_end_attribute($output);
        xmlwriter_start_element($output, "arg1");
        xmlwriter_start_attribute($output, "type");
        xmlwriter_text($output, "label");
        xmlwriter_end_attribute($output);
        xmlwriter_text($output, $arg);
        xmlwriter_end_element($output);
        xmlwriter_end_element($output);
    }

    #funkcia na spracovanie napovedy
    function PrintHelp($argc){
        $auxilary= array("help");
        $auxilary2=getopt(NULL,$auxilary);
        if ($argc==2 && array_key_exists("help",$auxilary2)){
            fwrite(STDERR, " Skript parse.php nacita zo vstupu IPPcode19 skontroluje syntaxticku a lexikalnu spravnost kodu a pretransformuje do XML \n");
            exit;
        }
        else if ($argc>1){

            fwrite(STDERR, "wrong number of parameters or problem with parameters\n");
            exit(23);
        }

    }

    PrintHelp($argc);
   
    $line = trim(fgets(STDIN)); 

    if (preg_match("/^\s*.IPPcode19\s*$/i", $line) == 0) {
         fwrite(STDERR, "First line doesn't match .IPPcode19\n"); 
        exit(21);
    }

    $output = xmlwriter_open_uri("php://stdout");
    xmlwriter_set_indent($output, 1);
    xmlwriter_set_indent_string($output, '  ');
    xmlwriter_start_document($output, '1.0', 'UTF-8');  
    xmlwriter_start_element($output, "program");
    xmlwriter_start_attribute($output, "language");
    xmlwriter_text($output, "IPPcode19");
    xmlwriter_end_attribute($output);

    $order = 1;

    while (($line = fgets(STDIN))) {  
        $line = trim($line);
        $divided= preg_split('/#/', $line);
        if ($divided[0]=="") { 
            continue;
        }
        else {
            $line=$divided[0]; 
        }
        $line = trim($line);

        #line je riadok bez komentara a nie je prazdny riadok
        $divided = preg_split('/\s+/', $line);
        if ($divided[0]==""){
            continue;
        }

        $instruction = $divided[0];
        
        
        
        switch($instruction) {
            case 'MOVE':   #var symb
                if (count($divided)==3){
                varSymbParams($output,$instruction,$order,$divided[1],$divided[2]); 
                }  
                else{
                    exit(23);
                } 
                break;
            case 'INT2CHAR':
                if (count($divided)==3){
                    varSymbParams($output,$instruction,$order,$divided[1],$divided[2]); 
                    }  
                    else{
                        exit(23);
                    } 
                    break;
            case 'STRLEN':
                if (count($divided)==3){
                    varSymbParams($output,$instruction,$order,$divided[1],$divided[2]); 
                    }  
                    else{
                        exit(23);
                    } 
                    break;
            case 'TYPE':
                if (count($divided)==3){
                    varSymbParams($output,$instruction,$order,$divided[1],$divided[2]); 
                    }  
                    else{
                        exit(23);
                    } 
                    break;
            case 'CREATEFRAME': #nothing
                if (count($divided)==1){
                    noParams($output, $instruction, $order);
                }  
                else{
                    exit(23);
                } 
                break;
              
            case 'PUSHFRAME':
                if (count($divided)==1){
                    noParams($output, $instruction, $order);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'POPFRAME':
                if (count($divided)==1){
                    noParams($output, $instruction, $order);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'RETURN':
                if (count($divided)==1){
                    noParams($output, $instruction, $order);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'BREAK':
                if (count($divided)==1){
                    noParams($output, $instruction, $order);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'ADD': #var symb1 symb2
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'SUB':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'MUL':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;  
            case 'IDIV':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'LT':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'GT':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'EQ':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'AND':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;   
            case 'OR':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'NOT':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'STRI2INT':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'CONCAT':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'GETCHAR':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'SETCHAR':
                if (count($divided)==4){
                    varSymb12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'DEFVAR': #var
                if (count($divided)==2){
                    varParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
                
            case 'POPS':
                if (count($divided)==2){
                    varParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;  
            case 'CALL':  #label
                if (count($divided)==2){
                    labelParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'LABEL':
                if (count($divided)==2){
                    labelParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'JUMP':
                if (count($divided)==2){
                    labelParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'PUSHS': #symb
                if (count($divided)==2){
                    symbParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'DPRINT':
                if (count($divided)==2){
                    symbParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'EXIT':
                if (count($divided)==2){
                    symbParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'WRITE':
                if (count($divided)==2){
                    symbParams($output,$instruction,$order,$divided[1]);
                }  
                else{
                    exit(23);
                } 
                break;
            case 'READ': #var type
                if (count($divided)==3){
                    varTypeParams($output,$instruction,$order,$divided[1],$divided[2]); 
                    }  
                    else{
                        exit(23);
                    } 
                    break;
                
            case 'JUMPIFEQ':#LABEL SYMB1 SYMB2
                if (count($divided)==4){
                    varLabel12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break; 
            case 'JUMPIFNEQ':
                if (count($divided)==4){
                    varLabel12Params($output,$instruction,$order,$divided[1],$divided[2],$divided[3]);
                }  
                else{
                    exit(23);
                } 
                break;   
        }

        $order++;
    }

    xmlwriter_end_element($output);
    xmlwriter_end_document($output);
    xmlwriter_output_memory($output);
?>