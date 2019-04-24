var validator = require('validator');

function validateDates(start, end) {
  todayDate = Date.now();

  if (!validator.isAfter(str[(start, todayDate)])) {
    start = todayDate;
  }
  if (!validator.isAfter(str[(start, end)])) {
    start = Date.now();
  }
}

console.log('RECIEVED');

var didClickIt = false;
document.getElementById('submit').addEventListener('click', function() {
  didClickIt = true;
});

setInterval(function() {
  if (didClickIt) {
    didClickIt = false;
    var start = document.getElementById('startDate').value;
    var end = document.getElementById('endDate').value;

    console.log(start);
    console.log(end);

    todayDate = Date.now();
    if (!validator.isAfter(str[(start, todayDate)])) {
      start = todayDate;
    }
    if (!validator.isAfter(str[(start, end)])) {
      start = Date.now();
    }

    // window.alert('start: ' + start + '\nend: ' + end);
  }
}, 500);

console.log('RECIEVED');
window.alert('111');
