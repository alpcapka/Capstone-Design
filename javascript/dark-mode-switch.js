var darkSwitch = document.getElementById("darkSwitch");

window.addEventListener("load", function () {
  if (darkSwitch) {
    initTheme();
    darkSwitch.addEventListener("change", function () {
      resetTheme();
    });
  }
});

/**
 * Summary: function that adds or removes the attribute 'data-theme' depending if
 * the switch is 'on' or 'off'.
 *
 * Description: initTheme is a function that uses localStorage from JavaScript DOM,
 * to store the value of the HTML switch. If the switch was already switched to
 * 'on' it will set an HTML attribute to the body named: 'data-theme' to a 'dark'
 * value. If it is the first time opening the page, or if the switch was off the
 * 'data-theme' attribute will not be set.
 * @return {void}
 */
function initTheme() {
  var darkThemeSelected =
    localStorage.getItem("darkSwitch") !== null &&
    localStorage.getItem("darkSwitch") === "dark";
  darkSwitch.checked = darkThemeSelected;
  darkThemeSelected
    ? document.body.setAttribute("data-theme", "dark")
    & $('.navbar, #sidenav').removeClass("bg-light")
    & $('.navbar, #sidenav').addClass("bg-dark")
    & $('#dropbox').addClass("dropdown-menu-dark")
    & $('.custom-control-label').html("White mode")

    : document.body.removeAttribute("data-theme")
    & $('.navbar, #sidenav').removeClass("bg-dark")
    & $('.navbar, #sidenav').addClass("bg-light")
    & $('#dropbox').removeClass("dropdown-menu-dark")
    & $('.custom-control-label').html("Dark mode");
}

/**
 * Summary: resetTheme checks if the switch is 'on' or 'off' and if it is toggled
 * on it will set the HTML attribute 'data-theme' to dark so the dark-theme CSS is
 * applied.
 * @return {void}
 */
function resetTheme() {
  if (darkSwitch.checked) {
    document.body.setAttribute("data-theme", "dark");
    localStorage.setItem("darkSwitch", "dark");
    localStorage.setItem("ColorMode", "night");
    $('.navbar, #sidenav').removeClass("bg-light");
    $('.navbar, #sidenav').addClass("bg-dark");
    $('#dropbox').addClass("dropdown-menu-dark");
    $('.custom-control-label').html("White mode");
  } else {
    document.body.removeAttribute("data-theme");
    localStorage.removeItem("darkSwitch");
    localStorage.removeItem("ColorMode");
    $('.navbar, #sidenav').removeClass("bg-dark");
    $('.navbar, #sidenav').addClass("bg-light");
    $('#dropbox').removeClass("dropdown-menu-dark");
    $('.custom-control-label').html("Dark mode");
  }
}

