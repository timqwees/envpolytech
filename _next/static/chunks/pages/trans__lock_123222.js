const bnt_menu = document.getElementById('btn_menu');
const op__cls = document.getElementById('op__cls');

bnt_menu.addEventListener('click', () => {
  if (op__cls.classList.contains("opacity-0")) {
    op__cls.classList.remove('-translate-x-full');
    op__cls.classList.remove('opacity-0');
  } else {
    op__cls.classList.add('-translate-x-full');
    op__cls.classList.add('opacity-0');
  }
});