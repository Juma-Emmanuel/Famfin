
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
       
      selectedSection.style.display = 'flex';
      selectedSection.style.flexDirection = 'column';

    }
  }

  function checkPasswordMatch() {
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirm_password");
    if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords do not match");
    } else {
    confirm_password.setCustomValidity("");
    }
    }
