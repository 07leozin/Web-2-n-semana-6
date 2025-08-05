const btn = document.getElementById('confirmarPedido');
const modal = document.getElementById('modalConfirm');
const btnSim = document.getElementById('btnSim');
const btnNao = document.getElementById('btnNao');

if (btn && modal && btnSim && btnNao) {
  btn.addEventListener('click', () => {
    modal.style.display = 'flex'; 
  });

  btnSim.addEventListener('click', () => {
    window.location.href = 'manutencao.php'; 
  });

  btnNao.addEventListener('click', () => {
    modal.style.display = 'none'; 
  });

  window.addEventListener('click', e => {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });
}
