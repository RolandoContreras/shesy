function show_second(){
    $email = document.getElementById("email").value;
    $pass = document.getElementById("pass").value;
    $phone = document.getElementById("phone").value;
    if($email != "" && $pass != "" && $phone != ""){
      var a = document.getElementById('button-second'); //or grab it by tagname etc
      a.href = "#designer"
    }
  }
  function change_title_designer(){
    $email = document.getElementById("email").value;
    $pass = document.getElementById("pass").value;
    $phone = document.getElementById("phone").value;
    if($email != "" && $pass != "" && $phone != ""){ 
      $designer_tab = document.getElementById("designer-tab").classList.add("active");
      $user_tab = document.getElementById("user-tab").classList.remove("active");
    }else{
      document.getElementById("alert_message").style.display = "block";
    }
  }
   function change_title_user(){
    $designer_tab = document.getElementById("designer-tab").classList.remove("active");
    $user_tab = document.getElementById("user-tab").classList.add("active");
  }