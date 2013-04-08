<?php

$quotes = array(
	'Travel is fatal to prejudice, bigotry, and narrow-mindedness.#Mark Twain',
	'A traveler without observation is a bird without wings.#Moslih Eddin Saadi',
	'Two roads diverged in a wood and I – I took the one less traveled by.#Robert Frost',
	'One’s destination is never a place, but a new way of seeing things.#Henry Miller',
	'Tourists don’t know where they’ve been, travelers don’t know where they’re going.#Paul Theroux',
	'Twenty years from now you will be more disappointed by the things you didn’t do than by the ones you did do. So throw off the bowlines, sail away from the safe harbor. Catch the trade winds in your sails. Explore. Dream. Discover.#Mark Twain',
	'The world is a book and those who do not travel read only one page.#St. Augustine',
	'For my part, I travel not to go anywhere, but to go. I travel for travel’s sake. The great affair is to move.#Robert Louis Stevenson',
	'A journey is best measured in friends, rather than miles.#Tim Cahill'
);

shuffle($quotes);

for($i = 0; $i < 3; $i++)
{
	$quote = explode('#', array_pop($quotes));
	echo('
		<div class="quotationWrap">
			<div class="quotation" quote="&#8220;">
				' . $quote[0] . '
			</div>
			<br/>
			<div class="quotationAuthor">
				' . $quote[1] . '
			</div>
		</div>'
	);
}
	
?>