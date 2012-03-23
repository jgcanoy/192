var newDefs = new Object;
newDefs.overimg = '/home/graphics/arrow1.gif';
flyDefs (newDefs);
makeLayer (
    "menu1",
    "First title=#",
    "Item 1=#",
    "Item 2=#>menu2a",
	 "Item 2 submenu=#",
	 "Subitem 1=#",
	 "Subitem 2=#",
	 "Subitem 3=#>menu2a3",
	      "Subitem 3 submenu=#",
	      "Sub Subitem 1=#",
	      "Sub Subitem 2=#",
	      "<menu2a3",
	 "Subitem 4=#",
	 "<menu2a",
    "Item 3=#",
    "Item 4=#>menu4a",
	 "Item 4 submenu=#",
	 "Subitem 1=#",
	 "subitem 2=#",
	 "<menu4a"
);