// http://stackoverflow.com/a/2819568

jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      //For browsers like Internet Explorer
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == '0') {
      //For browsers like Firefox and Webkit based
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)
                   +myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  })
}
});


Easysnippet= function init (uiVariant){
  return function (){
    var
      view = $("#easysnippet"),
      insert = function (e){

        try {  // this code is fragile, touches the DOM and must return false
        var snippet = 'select' == uiVariant
                      ? view.find("option:selected").text()
                      : e.target.textContent,
        php_left = "<",
        php_start = "?php",
        include_start = "$this->includeSnippet('",
        include_end = "');",
        php_end = "?>",
        space = " ",
        pagepart = $('.here')[1].hash;

        if ('select' == uiVariant){
          view.find("button") .css({display:'inline-block'});
          view.find("option:lt(1)").css({display:'none'});
        }

        $(pagepart).find('textarea').insertAtCaret(
            php_left + php_start + space + include_start
            + snippet + include_end + space + php_end + '\n'
        ).change();
        } catch (_) {;}  // if this fails the page gets saved

        return false
      };

    view.find("button").click(insert);

    if ('select' == uiVariant){
      view.find("option:lt(1)").attr("disabled", "disabled");
      view.find("select").change(insert);
    }
  }
}

