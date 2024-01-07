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
  const soundsContainer = document.querySelector('.sounds');
  const soundsItems = soundsContainer.querySelectorAll('.sounds__item');
  
  soundsItems.forEach((soundsItem) => {
    const soundButton = soundsItem.querySelector('button');
    const soundAudio = soundsItem.querySelector('audio');
    
    soundButton.addEventListener('click', () => {
      soundAudio.play();
    })
  });
  console.log('ok');
});