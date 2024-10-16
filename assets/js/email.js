document.getElementById("form-contact").addEventListener("submit", function(event){
    event.preventDefault();

    var formData = new FormData(this);

    fetch('assets/php/email1.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(data => {
        document.querySelector('.form-contact-status').innerHTML = data;
      }).catch(error => {
        document.querySelector('.form-contact-status').innerHTML = "An error occurred.";
      });
});
