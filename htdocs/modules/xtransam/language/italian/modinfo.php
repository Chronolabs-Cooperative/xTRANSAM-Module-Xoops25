<?php

// Translation done by xtransam & admin TXMod Xoops - 2011-03-13 17:38

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2009 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  --  Author: Simon Roberts (simon@chronolabs.org.au)                   -- //
//  ------------------------------------------------------------------------ //
	define("_MI_XTRANSAM_XTRANSAM_NAME","L-Traduttore");
	define("_MI_XTRANSAM_XTRANSAM_DESC","L-Translator &#232; utilizzato per tradurre file di lingua in XOOPS. <br> <em>Scritto in memoria di John Milner (Microsoft Australia)</em>");	
	
	// Menu 1.12 by (Timgno)
    define("_MI_XTRANSAM_ADMENU1","Cruscotto");
	define("_MI_XTRANSAM_ADMENU2","Traduzione guidata");
	define("_MI_XTRANSAM_ADMENU3","Fai la traduzione");
	define("_MI_XTRANSAM_ADMENU4","Matrice Lingua");
	define("_MI_XTRANSAM_ADMENU5","Circa");	
	
	//Preferences
	define("_MI_XTRANSAM_STORE_METHOD","Metodo di immagazzinaggio");
	define("_MI_XTRANSAM_STORE_METHOD_DESC","Questo &#232; il metodo usato con i database per memorizzare la lingua");	
	define('_MI_XTRANSAM_STORE_METHOD_URLENCODE','URL Codice metodo store');
	define('_MI_XTRANSAM_STORE_METHOD_UUCODE','UU Codice Conservare Metodo');
	define('_MI_XTRANSAM_STORE_METHOD_BASE64','Codice base64 Metodo Conservare');
	define('_MI_XTRANSAM_STORE_METHOD_HEX','Conservare Metodo esadecimale');
	define('_MI_XTRANSAM_STORE_METHOD_OPEN','Conservare metodo aperto');
	define('_MI_XTRANSAM_PROVIDER','Traduzione provider da utilizzare');
	define('_MI_XTRANSAM_PROVIDER_DESC','Si tratta di un\'opzione fornitore di traduzione in cui è possibile selezionare l\'API e il metodo da usare');
	define('_MI_XTRANSAM_PROVIDER_REST_GOOGLE','REST API di Google di accesso');
	define('_MI_XTRANSAM_PROVIDER_OAUTH2_GOOGLE','OAuth 2,0 API di Google di accesso');
	define('_MI_XTRANSAM_PROVIDER_REST_MYMEMORY','MyMemory traduzione API');	
	define("_MI_XTRANSAM_GOOGLE_APIKEY","La tua chiave API di Google Maps");
	define("_MI_XTRANSAM_GOOGLE_APIKEY_DESC","Questa &#232; la tua chiave API di Google per le API &#232; possibile ottenere uno da <a href='https://code.google.com/apis/console/?api=translate&pli=1#welcome' target='_blank'>google api signup</a>");
	define('_MI_XTRANSAM_GOOGLE_CHAR_SECONDS','I tuoi personaggi per utente al secondo su Google Traduttore Lingua API');
	define('_MI_XTRANSAM_GOOGLE_CHAR_SECONDS_DESC','Questo è il numero di caratteri vostro \'Per-User Limit\' è impostato su: <a href="https://code.google.com/apis/console/?api=translate&pli=1" target="_blank">informazioni sulle quote di google </a>');
	define('_MI_XTRANSAM_GOOGLE_CHAR_DAY','I tuoi personaggi limite di cortesia al giorno su Google Traduttore Lingua API');
	define('_MI_XTRANSAM_GOOGLE_CHAR_DAY_DESC','o è il numero di caratteri \'Limite di cortesia\' tuo è impostato su: <a href="https://code.google.com/apis/console/?api=translate&pli=1" target="_blank">informazioni sulle quote di google </a>');
	define('_MI_XTRANSAM_PHP_EXECUTE_FOR','Numero di secondi uno script PHP in questo modulo verranno eseguiti per!');
	define('_MI_XTRANSAM_PHP_EXECUTE_FOR_DESC','Questo è il numero totale di secondi uno script PHP in questo modulo verrà eseguito per!');
	define('_MI_XTRANSAM_WAIT_IN_CASE','Secondi di attesa per lo slot limite per aprire');
	define('_MI_XTRANSAM_WAIT_IN_CASE_DESC','Questo è il numero di secondi la routine traduzione aspetterà di vedere se si aprirà uno slot per ulteriori traduzione.');
	define('_MI_XTRANSAM_MICROTIME_SECONDS_DIFF','Differenza secondi per il bilanciamento di slot');
	define('_MI_XTRANSAM_MICROTIME_SECONDS_DIFF_DESC','Questo è il numero di secondi per una differenza elemento della cache storico con limitazione di CompAir essere quello per la rimozione e l\'apertura di uno slot traduzione sulla seconda limiti secondo');
	define('_MI_XTRANSAM_MICROTIME_DAY_DIFF','Secondi in un giorno per il bilanciamento differenza di slot');
	define('_MI_XTRANSAM_MICROTIME_DAY_DIFF_DESC','Questo è il numero di secondi per una differenza elemento della cache storico con limitazione di CompAir essere quello per la rimozione e l\'apertura di uno slot di traduzione su limiti giornalieri');
	
	// Version 1.18
	// Preferences
	define('_MI_XTRANSAM_PROVIDER_REST_BING','Microsoft Bing API');
	define('_MI_XTRANSAM_BING_APIKEY','Your Application ID for Microsoft Bing\'s API');
	define('_MI_XTRANSAM_BING_APIKEY_DESC','This is your Application ID for Bing API you can get one from <a href="https://ssl.bing.com/webmaster/Developers/Home?FORM=R5FD2" target="_blank">Application ID Signup</a>');
?>