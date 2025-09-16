const headerFixed = () =>{
  const header = document.querySelector('header.wp-block-template-part');
  
  const className = 'js-scrolled';

  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 0) {
        if (!header.classList.contains(className)) {
          header.classList.add(className);
        }
      } else {
        if (header.classList.contains(className)) {
          header.classList.remove(className);
        }
      }
    });
  }
}

document.addEventListener('DOMContentLoaded', function() {
  headerFixed()
});