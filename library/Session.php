<?php

	class Session{
			
			/*
			Using static function we will not declare any object 
			of the class.We will access the function of this class 
			by scope resulotion operator (::)

			Init()=> called by the constructor. Help initialize without 
			having to rewrite the constructor.
			
			*/
			public static function init(){ 
				session_start();
			}
			
			
			/*Setting value in set method*/
			
			public static function set($key, $val){
				
				$_SESSION[$key]=$val;
				
			}
			
			/*Getting the setted value in get method*/
			
			public static function get($key){
				if(isset($_SESSION[$key])){
					
					return $_SESSION[$key];
				}
				else{
					
					return false;
				}
			}
				 
			
			/*For every page in the admin panel*/
			
			public static function checkSession(){
			
			self::init();	 /*Self refers non static member*/
			if( self :: get("adminlogin")== false){
				self :: destroy();
				header("Location: login.php");
				}
			}


			public static function checkLogin(){
				
			self::init();	
			if( self :: get("adminlogin")== true){
				header("Location: panel.php");
				}
			}
			
			
			public static function destroy(){
				
				session_destroy();
				header("Location:login.php");
			}
			
			
			
			
			
		}
	

?>
<!--
Coded by:
Name:Md.Mahmudul Hasan Robin;
ID:150201043;
Date:22.07.2019;
Last Updated:23.08.2019;
-->