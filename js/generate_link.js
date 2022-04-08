function generateLink()
  {
    var div = document.getElementById('final');
    var find = 'id_value'
    //var replace = "https://bucks.healthwatchcrm.co.uk/civicrm/contact/view?reset=1&cid=2000"
    var replace = document.getElementById('civicrm_url').value;

    regex_1 = /https\:\/\/bucks\.healthwatchcrm\.co\.uk\/civicrm\/contact\/view\?reset=1&cid=([\d]{3,})(&.*)?/;
    if (replace.match(regex_1))
    {
      id_1 = replace.match(regex_1)[1]; // id = '2000'
    }
    else {
      id_1 = false
    }

    regex_2 = /https\:\/\/bucks\.healthwatchcrm\.co\.uk\/civicrm\/contact\/view\/case\?reset=1&id=([\d]{3,})&cid=([\d]{3,})(&.*)?/;
    if (replace.match(regex_2))
    {
      id_2 = replace.match(regex_2)[2]; // id = '2000'
    }
    else {
      id_2 = false
    }

    var re_Find = new RegExp(find, 'gi');

    if (id_1)
      {
        div.innerHTML = div.innerHTML.replace(re_Find, id_1);
      }
    else (id_2)
      {
        div.innerHTML = div.innerHTML.replace(re_Find, id_2);
      }
   }
