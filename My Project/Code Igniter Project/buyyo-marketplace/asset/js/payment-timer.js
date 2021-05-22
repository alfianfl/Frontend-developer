// Find timer value
const timers = document.querySelectorAll('#timer');
timers.forEach(element => {
  // The data/time we want to countdown to
  let untilDate = new Date(element.getAttribute('data-timer'));
  let statusValue = element.getAttribute('data-status');
  let countDownDate = addDays(untilDate, 1).getTime();

  myfunc(element, countDownDate, statusValue);
});




// Function addDays
function addDays(date, days) {
  let result = new Date(date);
  result.setDate(result.getDate() + days);
  return result;
}


// Run myfunc every second (async)
function myfunc(element, countDownDate, statusValue) {
  let myfunc = setInterval(function () {
    let now = new Date().getTime();
    let timeleft = countDownDate - now;
    // Calculating the days, hours, minutes and seconds left
    let days = Math.floor(1 + timeleft / (1000 * 60 * 60 * 24));
    let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    // Result is output to the specific element
    $(element).find('#days').html(days);
    $(element).find('#hours').html(hours);
    $(element).find('#mins').html(minutes);
    $(element).find('#secs').html(seconds);
    // Display the message when countdown is over
    if (timeleft < 0 || statusValue === 'approved' || statusValue === 'rejected') {
      clearInterval(myfunc);
      $(element).find('#days').html("0");
      $(element).find('#hours').html("0");
      $(element).find('#mins').html("0");
      $(element).find('#secs').html("0");
      $(element).find('#end').html("TIME UP!!");
    }
  }, 1000);
}