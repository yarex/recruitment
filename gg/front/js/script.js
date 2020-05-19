(function () {
  const endDate = new Date("June 30, 2020 00:00:00").getTime();

  const countdown = () => {
    const now = new Date().getTime();
    const timeLeft = endDate - now;

    // Calculate units
    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    let hours = Math.floor(
      (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Leading zeros
    // hours = hours < 10 ? "0" + hours : hours;
    // minutes = minutes < 10 ? "0" + minutes : minutes;
    // seconds = seconds < 10 ? "0" + seconds : seconds;

    // Set units
    let firstUnit = "0";
    let secondUnit = "0";
    let thirdUnit = "0";

    if (timeLeft > 0) {
      firstUnit = days <= 0 ? hours : days;
      secondUnit = days <= 0 ? minutes : hours;
      thirdUnit = days <= 0 ? seconds : minutes;
    }

    const firstLabel = days <= 0 ? "hours" : "days";
    const secondLabel = days <= 0 ? "minutes" : "hours";
    const thirdLabel = days <= 0 ? "seconds" : "minutes";

    // DOM
    document.getElementById("first").innerHTML = firstUnit;
    document.getElementById("second").innerHTML = secondUnit;
    document.getElementById("third").innerHTML = thirdUnit;

    document.getElementById("first-label").innerHTML = firstLabel;
    document.getElementById("second-label").innerHTML = secondLabel;
    document.getElementById("third-label").innerHTML = thirdLabel;

    return timeLeft;
  };

  // Onload
  const x = countdown();

  const daysToEnd = setInterval(function () {
    let timeLeft = countdown();

    if (timeLeft <= 0) {
      clearInterval(daysToEnd);
    }
  }, 1000);
})();
