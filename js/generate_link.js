function generateLink()
  {
    // get the default URL string
    var div = document.getElementById('final');
    // first string to replace
    var first_target_string = 'id_value'
    //var pasted_url = "https://bucks.healthwatchcrm.co.uk/civicrm/contact/view?reset=1&cid=2000"
    var pasted_url = document.getElementById('civicrm-url').value;

    // check what URL has been pasted - CiviCRM Client URL
    regex_client = /https\:\/\/bucks\.healthwatchcrm\.co\.uk\/civicrm\/contact\/view\?reset=1&cid=([\d]{3,})(&.*)?/;
    if (pasted_url.match(regex_client))
    {
      // if match, capture id
      id_client = pasted_url.match(regex_client)[1]; // id = '2000'
    }
    else {
      id_client = false
    }

    // check what URL has been pasted - CiviCRM Case view URL
    regex_case = /https\:\/\/bucks\.healthwatchcrm\.co\.uk\/civicrm\/contact\/view\/case\?reset=1&id=([\d]{3,})&cid=([\d]{3,})(&.*)?/;
    if (pasted_url.match(regex_case))
    {
      // if match, capture id
      id_case = pasted_url.match(regex_case)[2]; // id = '2000'
    }
    else {
      id_case = false
    }

    var re_first_target_string = new RegExp(first_target_string, 'gi');
    // replace first_target_string with id_
    if (id_client)
      {
      div.innerHTML = div.innerHTML.replace(re_first_target_string, id_client);
      }
    else if (id_case)
      {
      div.innerHTML = div.innerHTML.replace(re_first_target_string, id_case);
      }
    else // there URL didn't match either expected format
      {
        // show error
      }
   }
