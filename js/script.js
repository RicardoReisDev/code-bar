const categoryCards = document.querySelectorAll('.category-card');

categoryCards.forEach(card => {
	card.addEventListener('mouseenter', () => {
      card.querySelector('img').style.transform = 'scale(1.2)';
card.querySelector('h3').style.bottom = '20px';
});
  card.addEventListener('mouseleave', () => {
	card.querySelector('img').style.transform = 'scale(1)';
	card.querySelector('h3').style.bottom = '0';
});
});
	
