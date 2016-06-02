<?php
// $Id: charset_utf8.php 0005 2011-01-30 13:07:28Z timgno $
//  ------------------------------------------------------------------------ //
//               TXMod XOOPS - Modules & Themes for XOOPS                    //
//                    Copyright (c) 2011 txmodxoops.org                      //
//                       <http://www.txmodxoops.org/>                        //
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
// Author: TXMod Xoops (AKA timgno)                                          //
// URL: www.txmodxoops.org                                                   //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

$GLOBALS['charset_utf8'] = array( '' => '&#20;', //Spazio
                              '!' => '&#33;', //Punto esclamativo
                              '"' => '&#34;', //&quot;', //Virgolette
                              '#' => '&#35;', //Cancelletto
                              '$' => '&#36;', //Dollaro
                              '%' => '&#37;', //Percentuale
                              '&' => '&#38;', //&amp;',	"e" commerciale
                              '\'' => '&#39;', //Apostrofo
                              '(' => '&#40;', //Parentesi aperta
                              ')' => '&#41;', //Parentesi chiusa
                              '*' => '&#42;', //Asterisco
                              '+' => '&#43;', //Più
                              ',' => '&#44;', //Virgola
                              '-' => '&#45;', //Meno
                              '.' => '&#46;', //Punto
                              '/' => '&#47;', //Barra
                              ':' => '&#58;', //Due punti
                              ';' => '&#59;', //Punto e virgola
                              '<' => '&#60;', //&lt;', //Minore di
                              '=' => '&#61;', //Uguale
                              '>' => '&#62;', //&gt;', //Maggiore di
                              '?' => '&#63;', //Punto interrogativo
                              '@' => '&#64;', //Chiocciola - "at"
                              '[' => '&#91;', //Parentesi quadra aperta
                              '\' => '&#92;', //Barra inversa
                              ']' => '&#93;', //Parentesi quadra chiusa
                              '^' => '&#94;', //Accento circonflesso
                              '_' => '&#95;', //Barra orizzontale
                              '`' => '&#96;', //Accento grave
                              '{' => '&#123;', //Parentesi graffa aperta
                              '|' => '&#124;', //Barra verticale
                              '}' => '&#125;', //Parentesi graffa chiusa
                              '~' => '&#126;', //Tilde
                              ' ' => '&#160;', //&nbsp;', //Spazio non interrompibile
                              '¡' => '&#161;', //&iexcl;', //Punto esclamativo invertito
                              '¢' => '&#162;', //&cent;', //Cent
                              '£' => '&#163;', //&puond;', //Sterlina
                              '¤' => '&#164;', //&curren;', //Simbolo di valuta generico
                              '¥' => '&#165;', //&yen;', //Yen
                              '¦' => '&#166;', //&brvbar;', //Barra verticale spezzata
                              '§' => '&#167;', //&sect;', //Sezione
                              '¨' => '&#168;', //&uml;', // o &die;', //Umlaut (dieresi)
                              '©' => '&#169;', //&copy;', //Copyright
                              'ª' => '&#170;', //&ordf;', //Ordinale femminile
                              '«' => '&#171;', //&laquo;', //Parentesi angolari aperte
                              '¬' => '&#172;', //&not;', //Not
                              '' => '&#173;', //&shy;', //Trattino opzionale
                              '®' => '&#174;', //&reg;', //Marchio registrato
                              '¯' => '&#175;', //&macr;', // o &hibar;', //Accento macron
                              '°' => '&#176;', //&deg;', //Gradi
                              '±' => '&#177;', //&plusmn;', //Più o meno
                              '²' => '&#178;', //&sup2;', //2 in apice
                              '³' => '&#179;', //&sup3;', //3 in apice
                              '´' => '&#180;', //&acute;', //Accento acuto
                              'µ' => '&#181;', //&micro;', //Micro
                              '¶' => '&#182;', //&para;', //Paragrafo
                              '·' => '&#183;', //&middot;', //Punto centrale
                              '¸' => '&#185;', //&cedil;', //Cedilla
                              '¹' => '&#185;', //&sup1;', //1 in apice
                              'º' => '&#186;', //&ordm;', //Ordinale maschile
                              '»' => '&#187;', //&raquo;', //Parentesi angolari chiuse
                              '¼' => '&#188;', //&frac14;', //Un quarto
                              '½' => '&#189;', //&frac12;', //Un mezzo
                              '¾' => '&#190;', //&frac34;', //Tre quarti
                              '¿' => '&#191;', //&iqurst;', //Punto interrogativo invertito
                              'À' => '&#192;', //&Agrave;', //A maiuscola con accento grave
                              'Á' => '&#193;', //&Aacute;', //A maiuscola con accento acuto
                              'Â' => '&#194;', //&Acirc;', //A maiuscola con accento 'circonflesso
                              'Ã' => '&#195;', //&Atilde;', //A maiuscola tilde
                              'Ä' => '&#196;', //&Auml;', //A maiuscola dieresi
                              'Å' => '&#197;', //&Aring;', //A maiuscola anello
                              'Æ' => '&#198;', //&AElig;', //Dittongo AE maiuscolo
                              'Ç' => '&#199;', //&Ccedil;', //C maiuscola cedilla
                              'È' => '&#200;', //&Egrave;', //E maiuscola con accento grave
                              'É' => '&#201;', //&Eacute;', //E maiuscola con accento acuto
                              'Ê' => '&#202;', //&Ecirc;', //E maiuscola con accento circonflesso
                              'Ë' => '&#203;', //&Euml;', //E maiuscola dieresi
                              'Ì' => '&#204;', //&Igrave;', //I maiuscola con accento grave
                              'Í' => '&#205;', //&Iacute;', //I maiuscola con accento acuto
                              'Î' => '&#206;', //&Icirc;', //I maiuscola con accento circonflesso
                              'Ï' => '&#207;', //&Iuml;', //I maiuscola dieresi
                              'Ð' => '&#208;', //&ETH;', //Eth maiuscola, Islandese;', //
                              'Ñ' => '&#209;', //&Ntilde;', //N maiscola tilde
                              'Ò' => '&#210;', //&Ograve;', //O maiuscola con accento grave
                              'Ó' => '&#211;', //&Oacute;', //O maiuscola con accento acuto
                              'Ô' => '&#212;', //&Ocirc;', //O maiuscola con accento circonflesso
                              'Õ' => '&#213;', //&Otilde;', //O maiuscola tilde
                              'Ö' => '&#214;', //&Ouml;', //O maiuscola dieresi
                              '×' => '&#215;', //&times;', //Moltiplicazione
                              'Ø' => '&#216;', //&Oslash;', //O maiuscola barrata
                              'Ù' => '&#217;', //&Ugrave;', //U maiuscola con accento grave
                              'Ú' => '&#218;', //&Uacute;', //U maiuscola con accento acuto
                              'Û' => '&#219;', //&Ucirc;', //U maiuscola con accento circonflesso
                              'Ü' => '&#220;', //&Uuml;', //U maiuscola dieresi
                              'Ý' => '&#221;', //&Yacute;', //Y maiuscola con accento acuto
                              'Þ' => '&#222;', //&THORN;', //Thorn maiuscola, Islandese
                              'ß' => '&#223;', //&szlig;', //S tedesca
                              'à' => '&#224;', //&agrave;', //A minuscola con accento grave
                              'á' => '&#225;', //&aacute;', //A minuscola con accento acuto
                              'â' => '&#226;', //&acirc;', //A minuscola con accento circonflesso
                              'ã' => '&#227;', //&atilde;', //A minuscola tilde
                              'ä' => '&#228;', //&auml;', //A minuscola dieresi
                              'å' => '&#220;', //&aring;', //A minuscola anello
                              'æ' => '&#230;', //&aelig;', //Dittongo ae minuscolo
                              'ç' => '&#231;', //&ccedil;', //C minuscola cedilla
                              'è' => '&#232;', //&egrave;', //E minuscola con accento grave
                              'é' => '&#233;', //&eacute;', //E minuscola con accento acuto
                              'ê' => '&#234;', //&ecirc;', //E minuscola con accento circonflesso
                              'ë' => '&#235;', //&euml;', //E minuscola dieresi
                              'ì' => '&#236;', //&igrave;', //I minuscola con accento grave
                              'í' => '&#237;', //&iacute;', //I minuscola con accento acuto
                              'î' => '&#238;', //&icirc;', //I minuscola con accento circonflesso
                              'ï' => '&#239;', //&iuml;', //I minuscola dieresi
                              'ð' => '&#240;', //&eth;', //Eth minuscola, Islandese
                              'ñ' => '&#241;', //&ntilde;', //N minuscola tilde
                              'ò' => '&#242;', //&ograve;', //O minuscola con accento grave
                              'ó' => '&#243;', //&oacute;', //O minuscola con accento acuto
                              'ô' => '&#244;', //&ocirc;', //O minuscola con accento circonflesso
                              'õ' => '&#245;', //&otilde;', //O minuscola tilde
                              'ö' => '&#246;', //&ouml;', //O minuscola dieresi
                              '÷' => '&#247;', //&divide;', //Divisione
                              'ø' => '&#248;', //&oslash;', //O minuscola barrata
                              'ù' => '&#249;', //&ugrave;', //U minuscola con accento grave
                              'ú' => '&#250;', //&uacute;', //U minuscola con accento acuto
                              'û' => '&#251;', //&ucirc;', //U minuscola con accento circonflesso
                              'ü' => '&#252;', //&uuml;', //U minuscola dieresi
                              'ý' => '&#253;', //&yacute;', //Y minuscola con accento acuto
                              'þ' => '&#254;', //&thorn;', //Thorn minuscola, Islandese
                              'ÿ' => '&#255;',  //&yuml;', //Y minuscola dieresi
                              // extra conversions
                              '"' => '\"',
                              '\"' => "'",
                              '="' => "='",
                              '">' => "'>",
                              'Ãˆ' => 'E&#39;',
                              'Ã¬' => '&#236;',
                              'Ã²' => '&#242;',
                              'Ã¨' => '&#232;',
                              'Ã¹' => '&#249;',
                              'Ã ' => '&#224;',
                              '% S' => '%s',
                              '%s  ' => '%s ',
                              '%s "' => '%s"',
                              ' / ' => '/'
                              );