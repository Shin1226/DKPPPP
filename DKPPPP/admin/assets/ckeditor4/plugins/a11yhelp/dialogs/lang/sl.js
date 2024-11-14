/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * CKEditor 4 LTS ("Long Term Support") is available under the terms of the Extended Support Model.
 */

CKEDITOR.plugins.setLang( 'a11yhelp', 'sl', {
	title: 'Navodila za dostopnost',
	contents: 'Vsebina pomoči. Če želite zapreti pogovorno okno, pritisnite ESC.',
	legend: [
		{
		name: 'Splošno',
		items: [
			{
			name: 'Orodna vrstica urejevalnika',
			legend: 'Pritisnite ${toolbarFocus} za pomik v orodno vrstico. Z TAB in SHIFT+TAB se pomikate na naslednjo in prejšnjo skupino orodne vrstice. Z DESNO PUŠČICO ali LEVO PUŠČICO se pomikate na naslednji in prejšnji gumb orodne vrstice. Pritisnite SPACE ali ENTER, da aktivirate gumb orodne vrstice.'
		},

			{
			name: 'Urejevalno Pogovorno Okno',
			legend:
				'Inside a dialog, press TAB to navigate to the next dialog element, press SHIFT+TAB to move to the previous dialog element, press ENTER to submit the dialog, press ESC to cancel the dialog. When a dialog has multiple tabs, the tab list can be reached either with ALT+F10 or with TAB as part of the dialog tabbing order. With tab list focused, move to the next and previous tab with RIGHT and LEFT ARROW, respectively. Press ESC to discard changes and close the dialog. The focus will be moved back to the editing area upon leaving the dialog.'  // MISSING
		},

			{
			name: 'Kontekstni meni urejevalnika',
			legend: 'Pritisnite ${contextMenu} ali APPLICATION KEY, da odprete kontekstni meni. Nato se premaknite na naslednjo možnost menija s tipko TAB ali PUŠČICA DOL. Premakniti se na prejšnjo možnost z SHIFT + TAB ali PUŠČICA GOR. Pritisnite SPACE ali ENTER za izbiro možnosti menija. Odprite podmeni trenutne možnosti menija s tipko SPACE ali ENTER ali DESNA PUŠČICA. Vrnite se na matični element menija s tipko ESC ali LEVA PUŠČICA. Zaprite kontekstni meni z ESC.'
		},

			{
			name: 'Urejevalno Seznamsko Polje',
			legend: 'Znotraj seznama, se premaknete na naslednji element seznama s tipko TAB ali PUŠČICO DOL. Z SHIFT+TAB ali PUŠČICO GOR se premaknete na prejšnji element seznama. Pritisnite tipko SPACE ali ENTER za izbiro elementa. Pritisnite tipko ESC, da zaprete seznam.'
		},

			{
			name: 'Urejevalna vrstica poti elementa',
			legend: 'Pritisnite ${elementsPathFocus} za pomikanje po vrstici elementnih poti. S TAB ali DESNA PUŠČICA se premaknete na naslednji gumb elementa. Z SHIFT+TAB ali LEVO PUŠČICO se premaknete na prejšnji gumb elementa. Pritisnite SPACE ali ENTER za izbiro elementa v urejevalniku.'
		}
		]
	},
		{
		name: 'Ukazi',
		items: [
			{
			name: 'Razveljavi ukaz',
			legend: 'Pritisnite ${undo}'
		},
			{
			name: 'Ponovi ukaz',
			legend: 'Pritisnite ${redo}'
		},
			{
			name: 'Krepki ukaz',
			legend: 'Pritisnite ${bold}'
		},
			{
			name: 'Ležeči ukaz',
			legend: 'Pritisnite ${italic}'
		},
			{
			name: 'Poudarni ukaz',
			legend: 'Pritisnite ${underline}'
		},
			{
			name: 'Ukaz povezave',
			legend: 'Pritisnite ${link}'
		},
			{
			name: 'Skrči Orodno Vrstico Ukaz',
			legend: 'Pritisnite ${toolbarCollapse}'
		},
			{
			name: 'Dostop do prejšnjega ukaza ostrenja',
			legend: 'Pritisnite ${accessPreviousSpace} za dostop do najbližjega nedosegljivega osredotočenega prostora pred strešico, npr.: dva sosednja HR elementa. Ponovite kombinacijo tipk, da dosežete oddaljene osredotočene prostore.'
		},
			{
			name: 'Dostop do naslednjega ukaza ostrenja',
			legend: 'Pritisnite ${accessNextSpace} za dostop do najbližjega nedosegljivega osredotočenega prostora po strešici, npr.: dva sosednja HR elementa. Ponovite kombinacijo tipk, da dosežete oddaljene osredotočene prostore.'
		},
			{
			name: 'Pomoč dostopnosti',
			legend: 'Pritisnite ${a11yHelp}'
		},
			{
			name: ' Paste as plain text', // MISSING
			legend: 'Press ${pastetext}', // MISSING
			legendEdge: 'Press ${pastetext}, followed by ${paste}' // MISSING
		}
		]
	}
	],
	tab: 'Tab',
	pause: 'Pause',
	capslock: 'Caps Lock',
	escape: 'Escape',
	pageUp: 'Page Up',
	pageDown: 'Page Down',
	leftArrow: 'Puščica levo',
	upArrow: 'Puščica gor',
	rightArrow: 'Puščica desno',
	downArrow: 'Puščica dol',
	insert: 'Insert',
	leftWindowKey: 'Leva tipka Windows',
	rightWindowKey: 'Desna tipka Windows',
	selectKey: 'Select tipka',
	numpad0: 'Numpad 0',
	numpad1: 'Numpad 1',
	numpad2: 'Numpad 2',
	numpad3: 'Numpad 3',
	numpad4: 'Numpad 4',
	numpad5: 'Numpad 5',
	numpad6: 'Numpad 6',
	numpad7: 'Numpad 7',
	numpad8: 'Numpad 8',
	numpad9: 'Numpad 9',
	multiply: 'Zmnoži',
	add: 'Dodaj',
	subtract: 'Odštej',
	decimalPoint: 'Decimalna vejica',
	divide: 'Deli',
	f1: 'F1',
	f2: 'F2',
	f3: 'F3',
	f4: 'F4',
	f5: 'F5',
	f6: 'F6',
	f7: 'F7',
	f8: 'F8',
	f9: 'F9',
	f10: 'F10',
	f11: 'F11',
	f12: 'F12',
	numLock: 'Num Lock',
	scrollLock: 'Scroll Lock',
	semiColon: 'Podpičje',
	equalSign: 'Enačaj',
	comma: 'Vejica',
	dash: 'Vezaj',
	period: 'Pika',
	forwardSlash: 'Desna poševnica',
	graveAccent: 'Krativec',
	openBracket: 'Oklepaj',
	backSlash: 'Leva poševnica',
	closeBracket: 'Zaklepaj',
	singleQuote: 'Opuščaj'
} );