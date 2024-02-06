
function showSection(sectionId) {
    
    var sections = document.getElementsByClassName('section-display');
    for (var i = 0; i < sections.length; i++) {
      sections[i].style.display = 'none';
    }

    var selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        // selectedSection.style.display = 'block';
      selectedSection.style.display = 'flex';
      selectedSection.style.flexDirection = 'column';

    }
  }

  function displayDiv(sectionId) {
    
    var sections = document.getElementsByClassName('display-div');
    for (var i = 0; i < sections.length; i++) {
      sections[i].style.display = 'none';
    }

    var selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        // selectedSection.style.display = 'block';
      selectedSection.style.display = 'flex';
      selectedSection.style.flexDirection = 'column';

    }
  }

  function toggle1Theme(theme){
    var darkmode = false;


    var isDarkMode = false;
    if (theme == "dark"){
        isDarkMode = true
    }
    if (theme == "light"){
        isDarkMode = false
    }
    document.getElementById('body').style.backgroundColor = isDarkMode ? "#25292E" : ""; // Use an empty string to revert to default
    document.getElementById('nav').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('topbar').style.backgroundColor = isDarkMode ? "#35393F" : "";
    document.getElementById('topbar-h1').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('search-container1').style.backgroundColor = isDarkMode ? "#25292E" : "";
    document.getElementById('search-box1').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('search-box1').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('i-search-btn1').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card1').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('card2').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('card3').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('card1h3').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card2h3').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card3h3').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card1i').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card2i').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('card3i').style.color = isDarkMode ? "#fff" : "";
    document.getElementById('jobs-list').style.backgroundColor = isDarkMode ? "#7C8085" : "";
    document.getElementById('jobs-list-h1').style.color = isDarkMode ? "#fff" : "";

  }
  function toggleTheme(){

    var selectedElement1 = document.getElementById('jobs');
    var topbar = document.getElementById(element2);
    var selectedElement3 = document.getElementById(element3);
    var body = document.getElementById('body')
   
        
        selectedElement1.style.backgroundColor = " #7C8085";
        topbar.style.backgroundColor =  "#35393F";
        selectedElement3.style.backgroundColor = " #25292E";
        body.style.backgroundColor = " #25292E";
        
        // "#25292E";
        // "#7C8085"
        // var elem = document.getElementsByClassName("topbar")
        // elem.style.backgroundColor = "#7C8085";
    
    
  }