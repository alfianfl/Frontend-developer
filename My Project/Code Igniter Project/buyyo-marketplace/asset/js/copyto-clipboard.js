// fungsi copy to clipboard
function copyto_clipboard(targetId, tooltipId) {
  document.getElementById(targetId).select();
  document.execCommand("copy");

  let tooltip = document.getElementById(tooltipId);
  tooltip.innerText = 'Tersalin ke clipboard!';
}

// fungsi saat mouse out
function onMouseOut(targetId, tooltipId) {
  let tooltip = document.getElementById(tooltipId);
  tooltip.innerText = `salin ${targetId}`;
}