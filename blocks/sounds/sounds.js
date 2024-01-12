function sounds(fn) {
    // see if DOM is already available
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

sounds(function() {
  // play sound when clicking on sound button
  const soundsContainer = document.querySelector('.sounds');
  const soundsItems = soundsContainer.querySelectorAll('.sounds__item');
  
  soundsItems.forEach((soundsItem) => {
    const soundButton = soundsItem.querySelector('.sounds__btn__play');
    const soundAudio = soundsItem.querySelector('audio');
    
    soundButton.addEventListener('click', () => {
      soundAudio.play();
      console.log('Eep!');
    })
  });

  // play Sosumi sound when clicking on Sosumi link
  const sosumi = document.querySelector('.sosumi');
  const sosumiAudio = document.querySelector('.sounds__item.sosumi audio');
  if (sosumi) {
    const sosumiLinks = sosumi.querySelectorAll('a');

    sosumiLinks.forEach((sosumiLink) => {
      if (sosumiLink.textContent === 'Sosumi') {
        sosumiLink.addEventListener('click', (e) => {
          sosumiAudio.play();
          console.log('Eep!');
          e.preventDefault();
        });
      }
    });
  }
});