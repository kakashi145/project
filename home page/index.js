
// Employee Composition Chart
// Pass the values fetched from PHP to JavaScript

function openNav() {
    document.getElementById("mysidenav").style.width = "250px";  // Set the width of the side navigation
    document.getElementById("main").style.marginLeft = "250px";  // Push the main content to the right
}

function closeNav() {
    document.getElementById("mysidenav").style.width = "0";  // Reset the side navigation width to 0
    document.getElementById("main").style.marginLeft = "0";  // Reset the margin of the main content
}
