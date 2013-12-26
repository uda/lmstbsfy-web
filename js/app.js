/**
 * @file app.js
 * @package LMSTBSFY
 * @author Yehuda T. Deutsch <yeh@uda.co.il>
 * @copyright (C) 2013, Yehuda T. Deutsch <yeh@uda.co.il>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
(function($) {
  $.fn.extend({
    appendVal: function(val) {
      return this.each(function() {
        var self = $(this);
        if (typeof self.val != "undefined") {
          self.val(self.val() + val);
        }
      });
    },
    prependVal: function(val) {
      return this.each(function() {
        var self = $(this);
        if (typeof self.val != "undefined") {
          self.val(val + self.val());
        }
      });
    }
  });
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

    var lmstbsfy_query = $.url().param('q');
    if (lmstbsfy_query != undefined) {
      $("#lmstbsfy-query").val("");
      for (i in lmstbsfy_query) {
        setTimeout("$(\"#lmstbsfy-query\").appendVal(\"" + lmstbsfy_query[i] + "\")", i * 300);
      }
      setTimeout("$(\"#lmstbsfy-submit\").addClass(\"btn-success\");", (lmstbsfy_query.length * 300) + 500);
      setTimeout("$(\"#lmstbsfy-submit\").click();", (lmstbsfy_query.length * 300) + 1500);
    }
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
