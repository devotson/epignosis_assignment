  ajaxform.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch(document.location.origin + '/epignosis/wp-content/plugins/ajax-contact-form/process/', {
      method: 'POST',
      body: new FormData(ajaxform)
    });

    let result = await response.json();
    console.log(result);

    let messagediv = document.getElementById("response_div");

    messagediv.style.color = "#000";
    messagediv.style.padding = "20px";
    messagediv.innerHTML = result.message;

    result.success ? messagediv.classList.add("alert-success") : messagediv.classList.add("alert-danger");
  };