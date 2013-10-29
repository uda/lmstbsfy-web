(function($) {
  $(document).ready(function() {
    var have_qtips = ".has-qtip";
    var qtip_opts = {
      style: {
        classes: "qtip-blue qtip-shadow"
      },
      position: {
        my: "top center",
        at: "bottom center"
      }
    };
    if (!Modernizr.touch) {
      $(have_qtips).qtip(qtip_opts);
    }
    $("#lmstbsfy-form").on("submit", function(event) {
      event.preventDefault();
      var text = $("#lmstbsfy-query").val();
      console.log(text);
      if (text.length < 3) {
        if (!Modernizr.touch) $("#lmstbsfy-query").qtip('show');
        return;
      }

      var encoded_text = encodeURIComponent(text);

      var selected_se = $("#lmstbsfy-engine").val();
      if (!(selected_se in search_engines)) {
        selected_se = "google";
      }
      url = search_engines[selected_se].url.replace("%s", encoded_text + "%20AND%20(debunk%20OR%20fake%20OR%20hoax%20OR%20quack)");
      window.location.href = url;
    });
    $("#lmstbsfy-query").on("keypress", function(event) {
      $(this).qtip('hide');
    });
  });
})(jQuery);

var search_engines = {
  "google" : {
    name : "Google",
    url : "https://www.google.com/#q=%s"
  },
  "bing" : {
    name : "Bing",
    url : "http://www.bing.com/search?q=%s"
  },
  "ask" : {
    name : "Ask",
    url : "http://www.ask.com/web?q=%s"
  },
  "ddg" : {
    name : "DuckDuckGo",
    url : "https://duckduckgo.com/?q=%s"
  },
  "yahoo" : {
    name : "Yahoo",
    url : "http://search.yahoo.com/search?p=%s"
  }
};
