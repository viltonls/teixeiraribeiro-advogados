/*
 Milonic DHTML Menu
 Written by Andy Woolley
 Copyright 2002 (c) Milonic Solutions. All Rights Reserved.
 Plase vist http://www.milonic.co.uk/menu or e-mail menu3@milonic.com
 You may use this menu on your web site free of charge as long as you place prominent links to http://www.milonic.co.uk/menu and
 your inform us of your intentions with your URL AND ALL copyright notices remain in place in all files including your home page
 Comercial support contracts are available on request if you cannot comply with the above rules.

 Please note that major changes to this file have been made and is not compatible with versions 3.0 or earlier.

 You no longer need to number your menus as in previous versions. 
 The new menu structure allows you to name the menu instead, this means that you can remove menus and not break the system.
 The structure should also be much easier to modify, add & remove menus and menu items.
 
 If you are having difficulty with the menu please read the FAQ at http://www.milonic.co.uk/menu/faq.php before contacting us.

 Please note that the above text CAN be erased if you wish as long as copyright notices remain in place.
*/

//The following line is critical for menu operation, and MUST APPEAR ONLY ONCE. If you have more than one menu_array.js file rem out this line in subsequent files
menunum=0;menus=new Array();_d=document;function addmenu(){menunum++;menus[menunum]=menu;}function dumpmenus(){mt="<script language=javascript>";for(a=1;a<menus.length;a++){mt+=" menu"+a+"=menus["+a+"];"}mt+="<\/script>";_d.write(mt)}
//Please leave the above line intact. The above also needs to be enabled if it not already enabled unless this file is part of a multi pack.



////////////////////////////////////
// Editable properties START here //
////////////////////////////////////

// Special effect string for IE5.5 or above please visit http://www.milonic.co.uk/menu/filters_sample.php for more filters
if(navigator.appVersion.indexOf("MSIE 6.0")>0)
{
	effect = "Fade(duration=0.2);Alpha(style=0,opacity=88);"
}
else
{
	effect = "Shadow(color='#777777', Direction=135, Strength=5)" // Stop IE5.5 bug when using more than one filter
}


timegap=500				// The time delay for menus to remain visible
followspeed=5			// Follow Scrolling speed
followrate=40			// Follow Scrolling Rate
suboffset_top=10;		// Sub menu offset Top position 
suboffset_left=10;		// Sub menu offset Left position

style1=[				// style1 is an array of properties. You can have as many property arrays as you need. This means that menus can have their own style.
"white",					// Mouse Off Font Color
"",				// Mouse Off Background Color
"silver",				// Mouse On Font Color
"",				// Mouse On Background Color
"",				// Menu Border Color 
11,						// Font Size in pixels
"normal",				// Font Style (italic or normal)
"bold",					// Font Weight (bold or normal)
"Arial",		// Font Name
3,						// Menu Item Padding
"",			// Sub Menu Image (Leave this blank if not needed)
,						// 3D Border & Separator bar
"",				// 3D High Color
"",				// 3D Low Color
"",				// Current Page Item Font Color (leave this blank to disable)
"",					// Current Page Item Background Color (leave this blank to disable)
"",			// Top Bar image (Leave this blank to disable)
"ffffff",				// Menu Header Font Color (Leave blank if headers are not needed)
"000099",				// Menu Header Background Color (Leave blank if headers are not needed)
]

style2=[				// style1 is an array of properties. You can have as many property arrays as you need. This means that menus can have their own style.
"white",					// Mouse Off Font Color
"8c0001",				// Mouse Off Background Color
"silver",				// Mouse On Font Color
"8c0001",				// Mouse On Background Color
"8c0001",				// Menu Border Color 
10,						// Font Size in pixels
"normal",				// Font Style (italic or normal)
"bold",					// Font Weight (bold or normal)
"Arial",		// Font Name
4,						// Menu Item Padding
"",			// Sub Menu Image (Leave this blank if not needed)
"",						// 3D Border & Separator bar
"",				// 3D High Color
"",				// 3D Low Color
"",				// Current Page Item Font Color (leave this blank to disable)
"",					// Current Page Item Background Color (leave this blank to disable)
"",			// Top Bar image (Leave this blank to disable)
"ffffff",				// Menu Header Font Color (Leave blank if headers are not needed)
"000099",				// Menu Header Background Color (Leave blank if headers are not needed)
]


addmenu(menu=[		// This is the array that contains your menu properties and details
"mainmenu",			// Menu Name - This is needed in order for the menu to be called
52,					// Menu Top - The Top position of the menu in pixels
0,				// Menu Left - The Left position of the menu in pixels
,					// Menu Width - Menus width in pixels
0,					// Menu Border Width 
"center",					// Screen Position - here you can use "center;left;right;middle;top;bottom" or a combination of "center:middle"
style1,				// Properties Array - this is set higher up, as above
1,					// Always Visible - allows the menu item to be visible at all time (1=on/0=off)
"left",				// Alignment - sets the menu elements text alignment, values valid here are: left, right or center
effect,				// Filter - Text variable for setting transitional effects on menu activation - see above for more info
,					// Follow Scrolling - Tells the menu item to follow the user down the screen (visible at all times) (1=on/0=off)
1, 					// Horizontal Menu - Tells the menu to become horizontal instead of top to bottom style (1=on/0=off)
0,					// Keep Alive - Keeps the menu visible until the user moves over another menu or clicks elsewhere on the page (1=on/0=off)
,					// Position of TOP sub image left:center:right
,					// Set the Overall Width of Horizontal Menu to 100% and height to the specified amount (Leave blank to disable)
,					// Right To Left - Used in Hebrew for example. (1=on/0=off)
,					// Open the Menus OnClick - leave blank for OnMouseover (1=on/0=off)
,					// ID of the div you want to hide on MouseOver (useful for hiding form elements)
,					// Reserved for future use
,					// Reserved for future use
,					// Reserved for future use

,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",,"",1

/* @var $usuarioAtual Usuario */
<? if ($usuarioAtual->) ?>
/*,"Capta��o","show-menu=captacao",,"Exibir",1 // "Description Text", "URL", "Alternate URL", "Status", "Separator Bar"
,"&nbsp;|&nbsp;","",,"",1
,"Operacional","show-menu=operacional",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Inscri��es","show-menu=inscricoes",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Trabalhos","show-menu=trabalhos",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Comercial","show-menu=comercial",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Financeiro","show-menu=financeiro",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Relat�rios","show-menu=relatorios",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Admin","show-menu=admin",,"",1*/
,"Palestrantes","show-menu=palestrantes",,"Exibir",1 // "Description Text", "URL", "Alternate URL", "Status", "Separator Bar"
,"&nbsp;|&nbsp;","",,"",1
,"Temas","show-menu=temas",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Palestras","show-menu=Palestras",,"",1
,"&nbsp;|&nbsp;","",,"",1
,"Intervalos","show-menu=intervalos",,"",1
,"&nbsp;|&nbsp;","",,"",1

])

	addmenu(menu=["captacao",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Nova Organiza��o","organizacao_edit.php",,,1
	,"Listar Organiza��es","organizacao_list.php",,,1
	,"Novo Evento","evento_edit.php",,,1
	,"Listar Eventos","evento_list.php",,,1
	,"Ativar Evento Captado","ativa_evento_captado.php",,,1
	])
	
	addmenu(menu=["operacional",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Listar Eventos Captados","evento_captado_list.php",,,1
	])
	
	addmenu(menu=["inscricoes",
	,,180,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Nova Inscri��o","inscricao_edit.php",,,1
	,"Listar Inscri��es","inscricao_list.php",,,1
	,"Importar de CSV","inscricao_import_csv.php",,,1
	,"Exportar para CSV","inscricao_export_csv.php",,,1
	,"Exportar com Arq. de Coletor","inscricao_coletor_export_csv.php",,,1
	])
	
	
	addmenu(menu=["trabalhos",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Novo Trabalho","trabalho_edit.php",,,1
	,"Listar Trabalhos","trabalho_list.php",,,1
	])
	
	addmenu(menu=["comercial",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Nova Organiza��o","organizacao_edit.php",,,1
	,"Listar Organiza��es","organizacao_list.php",,,1
	])
	
	addmenu(menu=["financeiro",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Op��o A","http://www.google.com",,,1
	])
	
	addmenu(menu=["relatorios",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Op��o A","http://www.google.com",,,1
	])
	
	addmenu(menu=["admin",
	,,150,1,"",style2,,"left",effect,,,,,,,,,,,,
	,"Novo Usu�rio","usuario_edit.php",,,1
	,"Listar Usu�rios","usuario_list.php",,,1
	])

	

dumpmenus()