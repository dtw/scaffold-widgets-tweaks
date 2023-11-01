function generateLink()
  {
    // get the default URL string
    var final_div = document.getElementById('final');
    // get the warning div
    var warning_div = document.getElementById('hwbucks-url-tool-form-alert');
    // first string to replace
    var first_target_string = 'id_value'
    //var pasted_url = "https://bucks.healthwatchcrm.co.uk/civicrm/contact/view?action=view&reset=1&cid=2000"
    var pasted_url = document.getElementById('hwbucks-url-tool-form-civicrm-url').value;

    // now it seems some of these URIs are encoded?! Since when?!
    var pasted_url = decodeURIComponent(pasted_url)
    // parse the URL
    const parsed_url = new URL(pasted_url);
    // check the hostname is bucks.healthwatchcrm.co.uk
    if (parsed_url.hostname != "bucks.healthwatchcrm.co.uk") {
      console.log("hostname: "+parsed_url.hostname);
      // show error
      var warning_div = document.getElementById('hwbucks-url-tool-form-alert');
      warning_div.style.display = "inline-block";
    } else {
      // parse the paramaters from the URL
      let parsed_url_params = new URLSearchParams(parsed_url.search);
      var id_client = parsed_url_params.get("cid")
      console.log("cid: "+id_client);

      // replace first_target_string with id_client
      var re_first_target_string = new RegExp(first_target_string, 'gi');
      final_div.innerHTML = final_div.innerHTML.replace(re_first_target_string, id_client);
      
      // second string to replace
      var second_target_string = 'src_value'
      //var pasted_url = "https://bucks.healthwatchcrm.co.uk/civicrm/contact/view?reset=1&cid=2000"
      var selected_src = document.getElementById('hwbucks-url-tool-form-civicrm-src').value;
      // replace second_target_string with civicrm-src
      var re_second_target_string = new RegExp(second_target_string, 'gi');
      final_div.innerHTML = final_div.innerHTML.replace(re_second_target_string, selected_src);
      // show the the final URL in a div
      final_div.style.display = "inline-block";
      // hide warning
      warning_div.style.display = "none";

      // disable the generate button
      generate_button = document.getElementById('hwbucks-url-tool-form-generate-button');
      generate_button.setAttribute('disabled', '')
      reset_button = document.getElementById('hwbucks-url-tool-form-reset-button');
      reset_button.style.display = "inline-block";
    }
   }
