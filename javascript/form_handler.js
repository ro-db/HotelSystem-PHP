function processBookingForm(e) {
  if (e.preventDefault) e.preventDefault();

  var startDateString = document.getElementById('startdate').value;

  // start date to use in compareDatesarison
  var startDate = new Date(startDateString);

  var endDateString = document.getElementById('enddate').value;

  // end date to use in compareDatesarison
  var endDate = new Date(endDateString);

  var todayDate = new Date();

  // if start is before today, then start = today
  if (compareDates(startDate, todayDate) < 0) {
    startDate = todayDate;
  }
  // if end is before today, then end = today
  if (compareDates(endDate, startDate) < 0) {
    endDate = startDate;
  }

  console.log('Start date: ', startDate);
  console.log('End date: ', endDate);

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.open('POST', '/booking/search_result.php', true);
  xmlhttp.open('POST', '/employee/rent.php', true);

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      console.log(this.responseText);
      document.getElementById('resultsDiv').innerHTML = this.responseText;
    } else {
      console.log('Error:', this.statusText);
    }
  };

  xmlhttp.addEventListener('load', function() {});

  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xmlhttp.send(`startDate=${startDate}&endDate=${endDate}`);

  return false;
}

function compareDates(date1, date2) {
  return date1 - date2;
}
