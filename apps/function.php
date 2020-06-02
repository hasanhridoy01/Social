<?php 
    
    function Uploadsystem($file,$location,$file_format,$file_type = null){

        //file upload
        $file_name = $_FILES['photo']['name'];
        $file_name_tmp = $_FILES['photo']['tmp_name'];

        //file name ganarate
        $file_array = explode('.', $file_name);
        $file_name_extention = strtolower(end($file_array));

        //file type with value deafult
        if ( !isset($file_type['type']) ) {
        	
             $file_type['type'] = 'image';

        }
        if ( !isset($file_type['file_name']) ) {
        	
             $file_type['file_name'] = '';

        }
        if ( !isset($file_type['fname']) ) {
        	
             $file_type['fname'] = '';

        }
        if ( !isset($file_type['lname']) ) {
        	
             $file_type['lname'] = '';

        }

        //file type with value
        if ( $file_type['type'] == 'image' ) {
        	
        	 //file name extention
             $file_name = md5(time().rand()).'.'.$file_name_extention; 

        }elseif ( $file_type['type'] == 'file' ) {
        	
        	 $file_name = date('d_m_Y_g_h_s').'_'. $file_type['file_name'].'_'.$file_type['fname'].'_'.$file_type['lname'].'.'.$file_name_extention;

        }

       

        //file format
        if ( in_array($file_name_extention, $file_format) == false ) {
        	
        	$massage = '<p class="alert alert-warning mt-3" style="text-align: center;"> Invalid File Format! </p>';

        }else{


        	 //file upload
             move_uploaded_file( $file_name_tmp, $location . $file_name);

        }

        return[
            
            'mass' => $massage,
            'file_name' => $file_name,

        ];

    }

    //data check function
    function datacheck($conn,$col_name,$data,$table){
       
       $sql = "SELECT * FROM $table WHERE $col_name='$data'";
       $data = $conn -> query($sql);
       $num = $data -> num_rows;

       if ( $num > 0 ) {
           
           return false;

       }else{
         
          return true;

       }

    }

    //old function
    function old($fild_name){
      
       if ( isset($fild_name) ) {
           
           if ( isset($_POST[$fild_name]) ) {
               
               echo $_POST[$fild_name];

           }

       }


    }

    //falsh msg
    function setMsg($msg){
        
        setcookie('msg', $msg, time() + 20);

    }

    function getMsg(){
        
        if ( isset($_COOKIE['msg']) ) {
            
            echo '<p class="alert alert-success mt-2">'.$_COOKIE['msg'].'</p>';

        }
       
    }



 ?>