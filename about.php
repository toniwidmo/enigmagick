<?php
	$url = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

	define('BASE_PATH',realpath('.')); // For use in PHP if needed
	define('BASE_URL', $url); // For use in client output (css and js includes for example).
//echo BASE_URL;
	$search = 'Enigma Magick';

	require_once(BASE_PATH.'/config/config.php');

	$page->search = $search;
	$page->title = 'About EnigMagick';

	$content = new Content($page->search);
	$content->message .=  '<p>A tool for analysis English text, phrases and words using New Aeon English Qabala. 
	The name combines the words <a href="http://en.wikipedia.org/wiki/Enigma_machine">Enigma</a> and 
	<a href="http://en.wikipedia.org/wiki/Magick">Magick</a>. First version written between 27th and 
	30th December 2012 by <a href="http://antonchanning.com">Anton Channing</a>.</p>';

	$content->message .= '<p>It has been written as a replacement the excellent but aging DOS software,
	<a href="http://www.lightofthegnosis.org/eq6ormuslodge.htm">LEXICON</a> by <a href="http://lightofthegnosis.org/blog/2013/01/01/in-memoriam-soror-ishtaria-timtina-coutu/">Tim/Tina Coutu</a>. As fun as it was
	to run this using <a href="http://www.dosbox.com/">DOSBox</a>, Anton felt it was time to create something 
	easier to use.</p>';

	$content->message .= '<h3>Liber AL</h3>';

	$content->message .= '<p>The default text searched against for value matches is <a href="http://hermetic.com/crowley/libers/lib220.html">Liber AL vel LEGIS</a>, aka The Book
	of the Law.  The reason being that this is the "holy book" or channeled text that first mentions that the
	cipher exists, and which provided the clues which eventually lead to its discovery by Jim Lees.  From
	Lees, Jake Stratton Kent and Carol Smith learned of the cipher, and from there it passed on to Tim Coutu
	and others. If Crowley was aware of the cipher, he took the secret to his grave.</p>';

	$content->message .= '<h3>Allen Greenfield</h3>';

	$content->message .= '<p>Anton began working with the cipher after reading two books by Allen
	Greenfield, namely <a href="http://www.scribd.com/doc/52294856/Greenfield-Allen-Secret-Cipher-of-the-UFOnauts">Secret Cipher of the UFOnauts</a> and <a href="http://www.scribd.com/doc/3288689/The-Secret-Rituals-of-the-Men-in-Black">Secret Rituals of the
	Men in Black</a>. ';  

	$content->message .= "Anton became aware of Allen's work via involvement with the ";
	$content->message .= '<a href="http://kiamagic.com/wiki/index.php/Congregational_illuminism">In Free Communion</a> community.</p>';

	$content->message .= '<div class="quote"><p><em>"Fellow Star Anton, and Fellow Stars,</em></p>';

	$content->message .= "<p><em>I'm delighted that Secret Cipher and Secret Rituals proved inspirational - it is a case of passing along the development of a rich theoretical framework and valuable research tool.  I can say also that the late Tim Coutu first exposed me to the entire NAEQ idea, plus Lexicon. After initial polite skepticism on my part, when I applied the cipher via Lexicon and hand computation to the strange names that show up in contactees, MIB and Abduction lore, I had a great breakthrough in my own understanding. Coutu, in turn, was indebted to Bill Webb of QBLH and he, in turn, to Lees, Smith and Stratton-Kent for the discovery of this Qabalistic cipher.</em></p>";

	$content->message .= "<p><em>This is a huge step forward. One I have long hoped for.</em></p>"; 

	$content->message .= '<p><em>Agape, Allen G"</em></p></div>'; 

	$content->message .= '<h3>Free Cultural Magick</h3>';

	$content->message .= '<p>EnigMagick is a tool of <a href="http://kiamagic.com/wiki/index.php/Free_Cultural_Sorcery">Free Cultural 
	Magick</a>, released as both Creative Commons Attribution Share Alike and GPL3.  You can download it from
	<a href="https://sourceforge.net/projects/enigmagick/">sourceforge.net</a></p>';


	$content->message .= '<h3>Further reading on the cipher</h3>';

	$content->message .= '<p><ul>';

	$content->message .= '<li><a href="http://bookofthelaw.com/NAEQ.htm">NAEQ STAR SYSTEM AMEN 666</a></li>';
	$content->message .= '<li><a href="http://www.neworder.20m.com/how.html">Knowledge Lecture on the Qaballas in Liber AL</a></li>';
	$content->message .= '<li><a href="http://www.bluestwave.com/cipher_naeq.php">NAEQ Cipher</a></li>';
	$content->message .= '<li><a href="http://www.arcane-archive.org/occultism/divination/numerology/gematria/english-gematria-1.php">English Gematria</a></li>';
	$content->message .= '<li><a href="http://en.wikipedia.org/wiki/English_Qabalah#ALW_Cipher">ALW Cipher</a></li>';

	$content->message .= '</ul></p>';


	$content->message .= '<h3>Supporting Future Development</h3>';

	$content->message .= '<p>EnigMagick is a free download released on Creative Commons and GPL licences,
	but this does not mean it is developed with cost, both in terms of time spent coding and an actual
	financial cost in hosting the free to use demo site on kiamagic.com</p>'; 

	$content->message .= '<p>Therefore any financial support you can donate to the project will be most
	appreciated. We also have a range of tshirts and other products available to purchase, and profits
	from these items also go towards our running costs. See the <a href="http://kiamagic.com/supporting-kia/">Supporting 
	KIA</a> page for details.</p>'; 

	$content->message .= '<p>If you have coding skills or graphic art skills you may like to contribute
	to EnigMagick in others ways. We could do with a logo and icon for example.  PHP, html and css coders 
	could help actively develop new features and themes. 
	Please join the <a href="https://sourceforge.net/projects/enigmagick/">sourceforge project</a> if you 
	think you can help in any of these ways.'; 

	$content->message .= "If you have ideas of features you'd like to see developed, or spot 
	a bug you think needs fixing, you can also make a request via ";

	$content->message .= 'the <a href="https://sourceforge.net/p/enigmagick/tickets/?source=navbar">ticketing system</a>.</p>'; 



	$page->content[] = $content;

	$page->renderPage();
